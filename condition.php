<?php if(!isset($_POST['action'])){
    $condition = "";
    $error = "";
}
/* If using mySQL, the following codde will work.
define('DB_HOST', "localhost");
define('DB_PORT', "3307");
define('DB_USER', "dummies");
define('DB_PASS', "123");
define('DB_SCHEMA', "screening_condition");

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA, DB_PORT);

if (mysqli_connect_errno()){
    $error = "Failed to connect to MySQL." ;
    exit();
}
if(isset($_POST['action'])) {

    $query =
        "SELECT tube, position, salt, buffer, precipitant " .
        "FROM {$_POST['block']} " .
        "WHERE position = '{$_POST['position']}'";


    $result = mysqli_query($db, $query);

    if (!is_bool($result) && (mysqli_num_rows($result) > 0)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $condition = strtoupper($_POST['position']). "; ". "Tube ".$row['tube'].";<br>".
            $row['salt']. ";<br>".
            $row['buffer'].";<br>".
            $row['precipitant'].".";
    } else {
        $error = "Can not retrieve condition info.";
    }
}
*/
if(($_POST['action'])=="Submit") {
    if(!isset($_POST['position'])||!isset($_POST['block'])){$error="Please choose your block and well position!";}
    else {
        $filename = "{$_POST['block']}" . ".xml";
        $xml = simplexml_load_file("$filename") or die("Error: Cannot retrieve condition info.");
        foreach ($xml->children() as $condition) {
            if ($condition->position != $_POST['position']) {
                continue;
            } else {
                $condition_parsed = strtoupper($condition->position) . "; " . "Tube " . $condition->tube . ";<br>" .
                    $condition->salt . ";<br>" .
                    $condition->buffer . ";<br>" .
                    $condition->precipitant . ".";
            }
        }
    }
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
    <title>Condition</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<div id="header-wrapper">
    <?php include("header.php") ?>
    <div class="container">
        <form action="condition.php" method="post" enctype="multipart/form-data">
            <table style="padding:0px 0px 15px 0px">
                <tr><td>
                        <div style ="color: #FF0000; font-size: 15px; font-weight: bold;"><?php echo $error?></div><br>
                        <div style ="color: lawngreen; font-size:18px; font-weight:bold;">Your condition is:<br><br>
                            <?php if(($_POST['action'])=="Submit") echo $condition_parsed?></div>
                    </td>
                </tr>
                <tr>
                    <td>Please select your condition block and well position</td>
                </tr>
                <tr>
                    <td>
                        <select name = "block">
                            <option selected disabled>Condition</option>
                            <option value = "crystal_screen" <?php if($_POST['block'] == 'crystal_screen') echo 'selected="true"'?>>Crystal Screen</option>
                            <option value = "index_screen" <?php if($_POST['block'] == 'index_screen') echo 'selected="true"'?>>Index</option>
                            <option value = "jcsg" <?php if($_POST['block'] == 'jcsg') echo 'selected="true"'?>>JCSG</option>
                            <option value = "morpheus" <?php if($_POST['block'] == 'morpheus') echo 'selected="true"'?>>Morpheus</option>
                            <option value = "natrixmemb" <?php if($_POST['block'] == 'natrixmemb') echo 'selected="true"'?>>NatrixMemb</option>
                            <option value = "procomplex" <?php if($_POST['block'] == 'procomplex') echo 'selected="true"'?>>Procomplex</option>
                            <option value = "salt" <?php if($_POST['block'] == 'salt') echo 'selected="true"'?>>Salt</option>
                            <option value = "wizard" <?php if($_POST['block'] == 'wizard') echo 'selected="true"'?>>Wizard</option>
                            <option value = "wizardcryo" <?php if($_POST['block'] == 'wizardcryo') echo 'selected="true"'?>>Wizard Cryo</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;<input type="submit" name = "action" value="Submit"/>
                    </td>
                </tr>
            </table>
            <table class="condition">
                <tr class="condition">
                    <td class="condition"></td>
                    <td class="condition">1</td>
                    <td class="condition">2</td>
                    <td class="condition">3</td>
                    <td class="condition">4</td>
                    <td class="condition">5</td>
                    <td class="condition">6</td>
                    <td class="condition">7</td>
                    <td class="condition">8</td>
                    <td class="condition">9</td>
                    <td class="condition">10</td>
                    <td class="condition">11</td>
                    <td class="condition">12</td>
                </tr>
                <tr class="condition">
                    <td class="condition">A</td>
                    <td class="condition"><input type="radio" name="position" value="a1"
                            <?php if($_POST['position'] == 'a1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a2"
                            <?php if($_POST['position'] == 'a2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a3"
                            <?php if($_POST['position'] == 'a3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a4"
                            <?php if($_POST['position'] == 'a4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a5"
                            <?php if($_POST['position'] == 'a5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a6"
                            <?php if($_POST['position'] == 'a6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a7"
                            <?php if($_POST['position'] == 'a7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a8"
                            <?php if($_POST['position'] == 'a8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a9"
                            <?php if($_POST['position'] == 'a9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a10"
                            <?php if($_POST['position'] == 'a10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a11"
                            <?php if($_POST['position'] == 'a11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="a12"
                            <?php if($_POST['position'] == 'a12') echo 'checked="checked"'?>></td>
                </tr>
                <tr class="condition">
                    <td class="condition">B</td>
                    <td class="condition"><input type="radio" name="position" value="b1"
                            <?php if($_POST['position'] == 'b1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b2"
                            <?php if($_POST['position'] == 'b2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b3"
                            <?php if($_POST['position'] == 'b3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b4"
                            <?php if($_POST['position'] == 'b4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b5"
                            <?php if($_POST['position'] == 'b5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b6"
                            <?php if($_POST['position'] == 'b6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b7"
                            <?php if($_POST['position'] == 'b7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b8"
                            <?php if($_POST['position'] == 'b8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b9"
                            <?php if($_POST['position'] == 'b9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b10"
                            <?php if($_POST['position'] == 'b10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b11"
                            <?php if($_POST['position'] == 'b11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="b12"
                            <?php if($_POST['position'] == 'b12') echo 'checked="checked"'?>></td>
                </tr>
                <tr class="condition">
                    <td class="condition">C</td>
                    <td class="condition"><input type="radio" name="position" value="c1"
                            <?php if($_POST['position'] == 'c1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c2"
                            <?php if($_POST['position'] == 'c2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c3"
                            <?php if($_POST['position'] == 'c3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c4"
                            <?php if($_POST['position'] == 'c4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c5"
                            <?php if($_POST['position'] == 'c5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c6"
                            <?php if($_POST['position'] == 'c6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c7"
                            <?php if($_POST['position'] == 'c7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c8"
                            <?php if($_POST['position'] == 'c8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c9"
                            <?php if($_POST['position'] == 'c9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c10"
                            <?php if($_POST['position'] == 'c10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c11"
                            <?php if($_POST['position'] == 'c11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="c12"
                            <?php if($_POST['position'] == 'c12') echo 'checked="checked"'?>></td>
                </tr>
                <tr class="condition">
                    <td class="condition">D</td>
                    <td class="condition"><input type="radio" name="position" value="d1"
                            <?php if($_POST['position'] == 'd1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d2"
                            <?php if($_POST['position'] == 'd2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d3"
                            <?php if($_POST['position'] == 'd3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d4"
                            <?php if($_POST['position'] == 'd4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d5"
                            <?php if($_POST['position'] == 'd5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d6"
                            <?php if($_POST['position'] == 'd6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d7"
                            <?php if($_POST['position'] == 'd7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d8"
                            <?php if($_POST['position'] == 'd8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d9"
                            <?php if($_POST['position'] == 'd9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d10"
                            <?php if($_POST['position'] == 'd10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d11"
                            <?php if($_POST['position'] == 'd11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="d12"
                            <?php if($_POST['position'] == 'd12') echo 'checked="checked"'?>></td>
                </tr>
                <tr class="condition">
                    <td class="condition">E</td>
                    <td class="condition"><input type="radio" name="position" value="e1"
                            <?php if($_POST['position'] == 'e1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e2"
                            <?php if($_POST['position'] == 'e2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e3"
                            <?php if($_POST['position'] == 'e3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e4"
                            <?php if($_POST['position'] == 'e4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e5"
                            <?php if($_POST['position'] == 'e5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e6"
                            <?php if($_POST['position'] == 'e6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e7"
                            <?php if($_POST['position'] == 'e7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e8"
                            <?php if($_POST['position'] == 'e8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e9"
                            <?php if($_POST['position'] == 'e9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e10"
                            <?php if($_POST['position'] == 'e10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e11"
                            <?php if($_POST['position'] == 'e11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="e12"
                            <?php if($_POST['position'] == 'e12') echo 'checked="checked"'?>></td>
                </tr>
                <tr class="condition">
                    <td class="condition">F</td>
                    <td class="condition"><input type="radio" name="position" value="f1"
                            <?php if($_POST['position'] == 'f1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f2"
                            <?php if($_POST['position'] == 'f2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f3"
                            <?php if($_POST['position'] == 'f3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f4"
                            <?php if($_POST['position'] == 'f4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f5"
                            <?php if($_POST['position'] == 'f5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f6"
                            <?php if($_POST['position'] == 'f6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f7"
                            <?php if($_POST['position'] == 'f7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f8"
                            <?php if($_POST['position'] == 'f8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f9"
                            <?php if($_POST['position'] == 'f9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f10"
                            <?php if($_POST['position'] == 'f10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f11"
                            <?php if($_POST['position'] == 'f11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="f12"
                            <?php if($_POST['position'] == 'f12') echo 'checked="checked"'?>></td>
                </tr>
                <tr class="condition">
                    <td class="condition">G</td>
                    <td class="condition"><input type="radio" name="position" value="g1"
                            <?php if($_POST['position'] == 'g1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g2"
                            <?php if($_POST['position'] == 'g2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g3"
                            <?php if($_POST['position'] == 'g3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g4"
                            <?php if($_POST['position'] == 'g4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g5"
                            <?php if($_POST['position'] == 'g5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g6"
                            <?php if($_POST['position'] == 'g6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g7"
                            <?php if($_POST['position'] == 'g7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g8"
                            <?php if($_POST['position'] == 'g8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g9"
                            <?php if($_POST['position'] == 'g9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g10"
                            <?php if($_POST['position'] == 'g10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g11"
                            <?php if($_POST['position'] == 'g11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="g12"
                            <?php if($_POST['position'] == 'g12') echo 'checked="checked"'?>></td>
                </tr>
                <tr class="condition">
                    <td class="condition">H</td>
                    <td class="condition"><input type="radio" name="position" value="h1"
                            <?php if($_POST['position'] == 'h1') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h2"
                            <?php if($_POST['position'] == 'h2') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h3"
                            <?php if($_POST['position'] == 'h3') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h4"
                            <?php if($_POST['position'] == 'h4') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h5"
                            <?php if($_POST['position'] == 'h5') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h6"
                            <?php if($_POST['position'] == 'h6') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h7"
                            <?php if($_POST['position'] == 'h7') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h8"
                            <?php if($_POST['position'] == 'h8') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h9"
                            <?php if($_POST['position'] == 'h9') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h10"
                            <?php if($_POST['position'] == 'h10') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h11"
                            <?php if($_POST['position'] == 'h11') echo 'checked="checked"'?>></td>
                    <td class="condition"><input type="radio" name="position" value="h12"
                            <?php if($_POST['position'] == 'h12') echo 'checked="checked"'?>></td>
                </tr>
            </table>

        </form>

    </div>
</div>
</body>
</html>