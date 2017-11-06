<?php

if(!isset($_POST['action'])) {
    $volume_wash = number_format(2,2);
    $nacl_wash = number_format(116.8,2);
    $tris_wash = number_format(4.84,2);
    $immidazole_wash = number_format(4.08,2);
    $glycerol_wash = 100;

    $volume_elution = number_format(2,2);
    $nacl_elution = number_format(116.8,2);
    $tris_elution = number_format(4.84,2);
    $immidazole_elution = number_format(34,2);
    $immidazole_c_elution = 250;

    $volume_suspension = number_format(2,2);
    $nacl_suspension = number_format(58.4,2);
    $tris_suspension = number_format(4.84,2);
    $glycerol_suspension = 200;
}


if($_POST['action']=='Wash Buffer') {
    $volume_wash = number_format("{$_POST['volume_wash']}",2);
    $nacl_wash = number_format($volume_wash * 58.4, 2);
    $tris_wash = number_format($volume_wash * 2.42, 2);
    $glycerol_wash = number_format($volume_wash * 50,2);
    $immidazole_wash = number_format($volume_wash * 2.04, 2);

    $volume_elution = number_format(2,2);
    $nacl_elution = number_format(116.8,2);
    $tris_elution = number_format(4.84,2);
    $immidazole_elution = number_format(34,2);
    $immidazole_c_elution = 250;

    $volume_suspension = number_format(2,2);
    $nacl_suspension = number_format(58.4,2);
    $tris_suspension = number_format(4.84,2);
    $glycerol_suspension = 200;
}

if($_POST['action']=='Elution Buffer') {
    $immidazole_c_elution = $_POST['immidazole_c_elution'];
    $volume_elution = number_format("{$_POST['volume_elution']}",2);
    $nacl_elution = number_format($volume_elution * 58.4, 2);
    $tris_elution = number_format($volume_elution * 2.42, 2);
    $immidazole_elution = number_format($volume_elution * 17/250*$immidazole_c_elution,2);

    $volume_wash = number_format(2,2);
    $nacl_wash = number_format(116.8,2);
    $tris_wash = number_format(4.84,2);
    $immidazole_wash = number_format(4.08,2);
    $glycerol_wash = 100;

    $volume_suspension = number_format(2,2);
    $nacl_suspension = number_format(58.4,2);
    $tris_suspension = number_format(4.84,2);
    $glycerol_suspension = 200;
}

if($_POST['action']=='Suspension Buffer') {
    $volume_suspension = number_format("{$_POST['volume_suspension']}",2);
    $nacl_suspension = number_format($volume_suspension * 29.2, 2);
    $tris_suspension = number_format($volume_suspension * 2.42, 2);
    $glycerol_suspension = number_format($volume_suspension*100,2);

    $volume_wash = number_format(2,2);
    $nacl_wash = number_format(116.8,2);
    $tris_wash = number_format(4.84,2);
    $immidazole_wash = number_format(4.08,2);
    $glycerol_wash = 100;

    $volume_elution = number_format(2,2);
    $nacl_elution = number_format(116.8,2);
    $tris_elution = number_format(4.84,2);
    $immidazole_elution = number_format(34,2);
    $immidazole_c_elution = 250;
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
    <title>Nickel Buffer</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<div id="header-wrapper">
    <?php include("header_buffer.php") ?>
    <div class="container">
        <form action="nickel_buffer.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="title"><h1>Wash Buffer Calculator</h1></div>
                <table>
                    <tr><td><div class = "text">1 M NaCl, 30 mM Immidazole, 20 mM Tris pH 8.0, 5% Glycerol</div></td></tr>
                </table>
                <table>

                    <tr>
                        <td><div class="form_row">
                                <label class="label">Volume (L)</label>
                                <input type="text" name="volume_wash" class="input" required
                                       value = <?php echo $volume_wash;?> />
                            </div></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><div class="form_row">
                                <label class="label">NaCl (g)</label>
                                <input type="text" name="nacl_wash" class="input"
                                       value = <?php echo $nacl_wash;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Tris Base (g)</label>
                                <input type="text" name="tris_wash" class="input"
                                       value = <?php echo $tris_wash;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Immidazole (g)</label>
                                <input type="text" name="immidazole_wash" class="input"
                                       value = <?php echo $immidazole_wash;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Glycerol (mL)</label>
                                <input type="text" name="glycerol_wash" class="input"
                                       value = <?php echo $glycerol_wash;?> />
                            </div></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "action" value = "Wash Buffer"></td>

                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <div class="title"><h1>Elution Buffer Calculator</h1></div>
                <table>
                    <tr><td><div class = "text">1 M NaCl, Immidazole, 20 mM Tris pH 8.0</div></td></tr>
                </table>
                <table>

                    <tr>
                        <td><div class="form_row">
                                <label class="label">Immidazole Conc. (mM)</label>
                                <input type="text" name="immidazole_c_elution" class="input" required
                                       value = <?php echo $immidazole_c_elution;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Volume (L)</label>
                                <input type="text" name="volume_elution" class="input" required
                                       value = <?php echo $volume_elution;?> />
                            </div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><div class="form_row">
                                <label class="label">NaCl (g)</label>
                                <input type="text" name="nacl_elution" class="input"
                                       value = <?php echo $nacl_elution;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Tris Base (g)</label>
                                <input type="text" name="tris_elution" class="input"
                                       value = <?php echo $tris_elution;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Immidazole (g)</label>
                                <input type="text" name="immidazole_elution" class="input"
                                       value = <?php echo $immidazole_elution;?> />
                            </div></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "action" value = "Elution Buffer"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <div class="title"><h1>Suspension Buffer Calculator</h1></div>
                <table>
                    <tr><td><div class = "text">0.5 M NaCl, 20 mM Tris pH 8.0, 10% Glycerol</div></td></tr>
                </table>
                <table>

                    <tr>
                        <td><div class="form_row">
                                <label class="label">Volume (L)</label>
                                <input type="text" name="volume_suspension" class="input" required
                                       value = <?php echo $volume_suspension;?> />
                            </div></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><div class="form_row">
                                <label class="label">NaCl (g)</label>
                                <input type="text" name="nacl_suspension" class="input"
                                       value = <?php echo $nacl_suspension;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Tris Base (g)</label>
                                <input type="text" name="tris_suspension" class="input"
                                       value = <?php echo $tris_suspension;?> />
                            </div></td>
                        <td><div class="form_row">
                                <label class="label">Glycerol (mL)</label>
                                <input type="text" name="glycerol_suspension" class="input"
                                       value = <?php echo $glycerol_suspension;?> />
                            </div></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "action" value = "Suspension Buffer"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
