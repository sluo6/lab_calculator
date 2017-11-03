<?php
if(!isset($_POST['action'])){
    $concentration="";
    $read="";
}else{
    $read=$_POST['read'];
    if($read>0.52) {
        $error = $error . "Protein concentration may have exceeded linear range!";
    }

    $concentration =number_format(30.741*$read-0.388,3);
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
    <title>Bradford</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header-wrapper">
    <?php include("header_buffer.php") ?>
    <div class="container">
        <form action="bradford.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="title"><h1>Bradford Assay</h1></div>
                <table>
                    <tr><td>
                            <div class = "text">Standard curve taken from our GoogleDrive.<br>
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
                                <label class="label">BioPhotometer Read</label>
                                <input type="number" style="width:70px;" step="0.001" name="read" class="input" required
                                       value = "<?php echo $read;?>" min= "0"/>
                            </div>
                        </td>
                        <td>
                            <div class="form_row">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <label class="label" >Concentration in mg/mL</label>
                                <input type="number" style="width:70px;" step="0.001" name="concentration" class="input"
                                       value = "<?php echo $concentration;?>"/>
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