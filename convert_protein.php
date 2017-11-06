<?php
if(!isset($_POST['action'])){
    $concentration_mg="";
    $concentration_mm="";
    $mw="";
}else{
    $concentration_mg=$_POST['concentration_mg'];
    $mw=$_POST['mw'];
        $concentration_mm =number_format(1000*$concentration_mg/$mw/$_POST['unit'],3);
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
    <title>Convert Concentration</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<div id="header-wrapper">
    <?php include("header_buffer.php") ?>
    <div class="container">
        <form action="convert_protein.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="title"><h1>Convert concentration from mg/mL to mM</h1></div>

                <table>
                    <tr>
                        <td>
                            <div class="form_row">
                                <label class="label">Concentration in mg/ml</label>
                                <input type="number" step="0.001" name="concentration_mg" class="input" required
                                       value = "<?php echo $concentration_mg;?>" min= "0"/>
                            </div>
                        </td>
                        <td>
                            <div class="form_row">
                                <label class="label">Molecular Weight:</label>
                                <input type="number" step="0.1" name="mw" class="input" required
                                       value = "<?php echo $mw;?>" min= "0"/>
                            </div>
                            <div style="padding:8px 0 0 0;">
                                <select style="float:left; margin: 0; height: 22px;" name = "unit">
                                    <option value = "1000" <?php if(!isset($_POST['action'])||($_POST['unit'] == '1000')) echo 'selected="true"'?>>kDa</option>
                                    <option value = "1" <?php if($_POST['unit'] == '1') echo 'selected="true"'?>>Da</option>
                                </select>
                            </div>
                        </td>
                        <td><div class="form_row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
                        <td><div class="form_row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form_row">
                                <label class="label" >Concentration in mM</label>
                                <input type="number" style="width:70px;" step="0.001" name="concentration_mm" class="input"
                                       value = "<?php echo $concentration_mm;?>"/>
                            </div>
                        </td>
                        <td>

                        </td>
                        <td><div class="form_row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
                        <td><div class="form_row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
                    </tr>

                    <tr>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                        <td><div class="form_row">
                                <br>
                            </div></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "action" value = "Submit"></td>
                    </tr>
                </table>

            </fieldset>
        </form>
    </div>
</div>
</body>
</html>