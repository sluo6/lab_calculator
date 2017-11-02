<?php
/**
 * Written by Shangwen Luo.
 * This is a primer generator for dummies.
 * Can be applied for cloning into LIC vectors.
 */


$error = "";
//N-Term LIC vector overhangs.
$NF = strtolower(TACTTCCAATCCAATGCA);
$NR = strtolower(TTATCCACTTCCAATGTTATTA);
//C-Term LIC vector overhangs.
$CF = strtolower(TTTAAGAAGGAGATATAGTTC);
$CR = strtolower(GGATTGGAAGTAGAGGTTCTC);


function revcomp($gene){
    $complement_dict = array(
        "A" => "T",
        "T" => "A",
        "G" => "C",
        "C" => "G",
    );

    $nucleotides = str_split($gene, 1);
// Compute the complement sequence first
    $complement_sequence = "";
    foreach ($nucleotides as $nucleotide) {
        $complement_sequence = $complement_sequence . $complement_dict[$nucleotide];
    }

    $revcomp_sequence = strrev($complement_sequence); // This is the reverse complement sequence
    return $revcomp_sequence;
}

function isComplete($gene){
    if(strlen($gene)%3==0) return TRUE;
    else return FALSE;
}

function startisATG($gene){
    if(substr($gene, 0, 3)=="ATG")
        return TRUE;
    else return FALSE;
}

function endisStop($gene){
    if(substr($gene, -3,3)=="TAA" or substr($gene, -3,3)=="TAG"
        or substr($gene, -3,3)=="TGA")
        return TRUE;
    else return FALSE;
}

function tooLarge($primer){
    if(strlen($primer)>=60)
        return TRUE;
    else return FALSE;
}
function tooSmall($seq){
    if(strlen($seq)<100)
        return TRUE;
    else return FALSE;
}

function Acount($seq){
    return substr_count($seq,"A");
}
function Tcount($seq){
    return substr_count($seq,"T");
}
function Ccount($seq){
    return substr_count($seq,"C");
}
function Gcount($seq){
    return substr_count($seq,"G");
}
//Tm= 64.9 +41*(yG+zC-16.4)/(wA+xT+yG+zC)
function Tm($seq){
    $Tm = 64.9+41*(Gcount($seq)+Ccount($seq)-16.4)/(Acount($seq)+Tcount($seq)+Gcount($seq)+Ccount($seq));
    return round($Tm);
}

function forwardLength($seq, $T){
    $n = 10;
    while (Tm(substr($seq,0,$n))<$T){
        $n = $n + 1;
    }
    return $n;
}
function reverseLength($seq, $T){
    $n = 10;
    while (Tm(substr($seq, 3, $n))<$T){
        $n = $n + 1;
    }
    return $n;
}

//Default melting temperature is 58.
if(!isset($_POST['action'])){
    $Tm = 58;
    $forward = "";
    $reverse = "";
}

//Reset to return to original state.
if($_POST['action']=="Reset"){
    $Tm = 58;
    $forward = "";
    $reverse = "";
    $_POST = array();
}

//Calculate primer sequence according to provided gene sequence and desired Tm.
elseif (isset($_POST['sequence'])&& $_POST['action'] == "PrimerSequence") {
    $sequence_upper = strtoupper($_POST['sequence']);
    $sequence_revcom = revcomp($sequence_upper);
    $Tm = round($_POST['Tm']);
    if(tooSmall($sequence_upper)){
        $error = $error . "Your sequence is too short. <br>";
    }
    if(!tooSmall($sequence_upper)){
        $f_complimentary = substr($sequence_upper, 0, forwardLength($sequence_upper, $Tm));
        $r_complimentary = substr($sequence_revcom, 3, reverseLength($sequence_revcom, $Tm));
    }

    if (!isset($_POST['vector'])) {
        $error = $error . "Please choose your LIC vector. <br>";
    }


    if (!isComplete($sequence_upper)) {
        $error = $error . "Open reading frame is not complete. Please check your sequence. <br>";
    }
    if (!startisATG($sequence_upper)) {
        $error = $error . "NOTE: Start codon is not ATG! <br>";
    }
    if (!endisStop($sequence_upper)) {
        $error = $error . "ATTENTION! Stop codon is not found! <br>";
    }
    if ($_POST['vector'] == "nhis") {
        $forward = $NF . $f_complimentary;
        $reverse = $NR . $r_complimentary;
    }
    if ($_POST['vector'] == "chis") {
        $forward = $CF . $f_complimentary;
        $reverse = $CR . $r_complimentary;
    }
    if (tooLarge($forward) or tooLarge($reverse)) {
        $error = $error . "ATTENTION! Primer length more than 60 bps! <br>";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LIC Primer Design</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header-wrapper">
    <?php include('header.php')?>

    <div class = "container">
        <form action="LIC_primers.php" method="post" enctype="multipart/form-data">

            <div>Please select your LIC vector type: <br><select name = "vector">
                    <option selected disabled>Choose LIC Vector</option>
                    <option value = "nhis"
                        <?php if(isset($_POST['vector']) && $_POST['vector'] == 'nhis') echo ' selected="true"'?>>N-Terminal LIC</option>
                    <option value = "chis"
                        <?php if(isset($_POST['vector']) && $_POST['vector'] == 'chis') echo ' selected="true"'?>>C-Terminal LIC</option>
                </select>
            </div>
            <br>
            <div>

                <div>Please enter your desired melting temperature Tm (&#8451;):<br>
                    (50 ~ 72)
                </div>
                <input type = "number" name = "Tm" value = "<?php echo $Tm ?>" min = "50" max = "72"/>
                <br><br>
                <div style ="color: #FF0000; font-size = 18px; font-weight: bold;"><?php echo $error?></div>
                <br>
                <div>Please enter your gene sequence (from start to stop codon):</div>
                <textarea type = "text" name = "sequence" style = "width: 800px; height:110px;
    padding: 0 0 123px 0;" ><? if(isset($_POST['sequence'])){
                        echo $_POST['sequence'];}?></textarea>
            </div>
            <div><input type="submit" name = "action" value="PrimerSequence"/>
                <input type ="submit" name = "action" value = "Reset"</div>
            <br><br><br>

        </form>
        <div>Forward Primer: 5'
            <input type = "text" name = "forward" value = "<? echo $forward?>" style = "width: 600px;"/>3'
        </div><br>
        <div>Reverse Primer: 5'
            <input type = "text" name = "reverse" value = "<? echo $reverse?>" style = "width: 600px;"/>3'
        </div>
        <br><br>
    </div>
</div>
</body>
</html>
