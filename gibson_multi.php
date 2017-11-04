<?php
define('VECTOR_WEIGHT', "50");

if(!isset($_POST['action'])){
    $one_name="Vector";
    $one_size="5000";
    $one_conc="";
    $one_volume="";

    $two_name="";
    $two_size="";
    $two_conc="";
    $two_volume="";

    $three_name="";
    $three_size="";
    $three_conc="";
    $three_volume="";

    $four_name="";
    $four_size="";
    $four_conc="";
    $four_volume="";

    $five_name="";
    $five_size="";
    $five_conc="";
    $five_volume="";

    $six_name="";
    $six_size="";
    $six_conc="";
    $six_volume="";

    $gibson_volume="";
    $water_volume="";
    $total_volume="20";
}elseif($_POST['action']=="Submit"){
    $total_volume=$_POST['total_volume'];
    $gibson_volume=$total_volume/2;
    $ratio=$total_volume/20;

    $one_name=$_POST['one_name'];
    $one_size=$_POST['one_size'];
    $one_conc=$_POST['one_conc'];
    $one_volume=VECTOR_WEIGHT/$one_conc*$ratio;

    $vector_molar=VECTOR_WEIGHT/$one_size;

    $two_name=$_POST['two_name'];
    $two_size=$_POST['two_size'];
    $two_conc=$_POST['two_conc'];
    if(($two_conc=="")||($two_conc==0)){$two_volume=0;}
    else{$two_volume=$vector_molar*$two_size/$two_conc*$ratio;}


    $water_volume=$total_volume-$one_volume-$two_volume
        -$three_volume-$four_volume-$five_volume-$six_volume-$gibson_volume;

}elseif($_POST['action']=="Reset"){
    $one_name="Vector";
    $one_size="5000";
    $one_conc="";
    $one_volume="";

    $two_name="";
    $two_size="";
    $two_conc="";
    $two_volume="";

    $three_name="";
    $three_size="";
    $three_conc="";
    $three_volume="";

    $four_name="";
    $four_size="";
    $four_conc="";
    $four_volume="";

    $five_name="";
    $five_size="";
    $five_conc="";
    $five_volume="";

    $six_name="";
    $six_size="";
    $six_conc="";
    $six_volume="";

    $gibson_volume="";
    $water_volume="";
    $total_volume="20";
}
?>

<!DOCTYPE html>
<!--
Design by Shangwen Luo
Lab Calculator for Dummies!
-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Multi-Piece Gibson</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header-wrapper">
    <?php include("header_gibson.php") ?>
    <div class="container">
        <form action="gibson_multi.php" method="post" enctype="multipart/form-data">
            <div style="padding:0 0 0 110px;">
                <table class="dilution">
                    <tr class="dilution" style="border-bottom: 3px solid black;">
                        <td class="dilution">&nbsp;</td>
                        <td class="dilution">Name (Optional)</td>
                        <td class="dilution">Size (bps)</td>
                        <td class="dilution">Conc. (ng/uL)</td>
                        <td class="dilution">Volume (uL)</td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">(Required) 1.</td>
                        <td class="dilution"><input type="text" name="one_name"
                                                    value = "<?php echo $one_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="one_size" required
                                                    value = "<?php echo $one_size;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><input type="number" name="one_conc" step="0.1" required
                                                    value = "<?php echo $one_conc;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><?php echo $one_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">2.</td>
                        <td class="dilution"><input type="text" name="two_name"
                                                    value = "<?php echo $two_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="two_size"
                                                    value = "<?php echo $two_size;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><input type="number" name="two_conc" step="0.1"
                                                    value = "<?php echo $two_conc;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><?php echo $two_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">3.</td>
                        <td class="dilution"><input type="text" name="three_name"
                                                    value = "<?php echo $three_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="three_size"
                                                    value = "<?php echo $three_size;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><input type="number" name="three_conc" step="0.1"
                                                    value = "<?php echo $three_conc;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><?php echo $three_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">4.</td>
                        <td class="dilution"><input type="text" name="four_name"
                                                    value = "<?php echo $four_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="four_size"
                                                    value = "<?php echo $four_size;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><input type="number" name="four_conc" step="0.1"
                                                    value = "<?php echo $four_conc;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><?php echo $four_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">5.</td>
                        <td class="dilution"><input type="text" name="five_name"
                                                    value = "<?php echo $five_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="five_size"
                                                    value = "<?php echo $five_size;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><input type="number" name="five_conc" step="0.1"
                                                    value = "<?php echo $five_conc;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><?php echo $five_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">6.</td>
                        <td class="dilution"><input type="text" name="six_name"
                                                    value = "<?php echo $six_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="six_size"
                                                    value = "<?php echo $six_size;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><input type="number" name="six_conc" step="0.1"
                                                    value = "<?php echo $six_conc;?>" min="0" class="dilution2"/></td>
                        <td class="dilution"><?php echo $six_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Gibson Mix</td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"><?php echo $gibson_volume;?></td>
                    </tr>
                    <tr class="dilution" style="border-bottom: 3px solid black;">
                        <td class="dilution2">Water</td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"><?php echo $water_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Total Volume (uL)</td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"><input type="number" name="total_volume" step="0.1" required
                                                    value = "<?php echo $total_volume;?>" min="0" class="dilution2"/></td>
                    </tr>


                </table>
                <table style="padding: 10px 0 0 0;">
                    <tr>
                        <td><input type = "submit" name = "action" value = "Submit">
                            <input type = "submit" name = "action" value = "Reset"></td>
                    </tr>
                </table>

            </div>
        </form>
    </div>
</div>
</body>
</html>