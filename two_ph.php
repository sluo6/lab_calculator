<?php
if(!isset($_POST['action'])){
    $desired_ph="";
    $desired_v="";
    $stocka_ph="";
    $stocka_v="";
    $stockb_ph="";
    $stockb_v="";
    $error="";
}else{
    $desired_ph=$_POST['desired_ph'];
    $desired_v=$_POST['desired_v'];
    $stocka_ph=$_POST['stocka_ph'];
    $stockb_ph=$_POST['stockb_ph'];

    $desired_h=pow(10,(-1*$desired_ph));
    $stocka_h=pow(10,(-1*$stocka_ph));
    $stockb_h=pow(10,(-1*$stockb_ph));

    if((min($stocka_ph, $stockb_ph)>$desired_ph)||(max($stocka_ph, $stockb_ph)<$desired_ph)){
        $error=$error."The desired pH should be between the pH of two buffer stocks!";
    }else{
$stockb_v =number_format ((($desired_v*$desired_h)-($desired_v*$stocka_h))/($stockb_h-$stocka_h),3);
$stocka_v = number_format($desired_v-$stockb_v,3);
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
    <title>Two pH</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header-wrapper">
    <?php include("lib/header_buffer.php") ?>
    <div class="container">
        <form action="two_ph.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="title"><h1>Mixing two buffer stocks to make your desired pH</h1></div>
                <table>
                    <tr><td>
                            <div class = "text">Two buffer stocks should have the same concentration.<br>
                            </div>
                            <div style ="color: #FF0000; font-size:15px; font-weight: bold;"><?php echo $error?>
                            <br>
                            </div>
                        </td></tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <div class="form_row">
                                <label class="label">Desired pH:</label>
                                <input type="number" step="0.1" name="desired_ph" class="input" required
                                       value = "<?php echo $desired_ph;?>" min= "2.0" max="13.0"/>
                            </div>
                        </td>
                        <td>
                            <div class="form_row">
                                <label class="label">Desired Final Vol. (mL):</label>
                                <input type="number" step="0.001" name="desired_v" class="input" required
                                       value = "<?php echo $desired_v;?>" min= "0"/>
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
                                <label class="label">Stock A pH:</label>
                                <input type="number" step="0.1" name="stocka_ph" class="input" required
                                       value = "<?php echo $stocka_ph;?>" min= "2.0" max="13.0"/>
                            </div>
                        </td>
                        <td>
                            <div class="form_row">
                                <label class="label">Stock A Vol. (mL):</label>
                                <input type="number" step="0.001" name="stocka_v" class="input"
                                       value = "<?php echo $stocka_v;?>" />
                            </div>
                        </td>
                        <td><div class="form_row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
                        <td><div class="form_row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form_row">
                                <label class="label">Stock B pH:</label>
                                <input type="number" step="0.1" name="stockb_ph" class="input" required
                                       value = "<?php echo $stockb_ph;?>" min= "2.0" max="13.0"/>
                            </div>
                        </td>
                        <td>
                            <div class="form_row">
                                <label class="label">Stock B Vol. (mL):</label>
                                <input type="number" step="0.001" name="stockb_v" class="input"
                                       value = "<?php echo $stockb_v;?>" />
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
                        <td><input type = "submit" name = "action" value = "Submit"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>