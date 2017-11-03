<?php
if(!isset($_POST['action'])){
    $vector_size = 5000;
    $insert_size = 1000;
    $error = "";
}
elseif($_POST['action']=="Submit"&&(empty($_POST['vector_conc'])||empty($_POST['insert_conc']))){
    $vector_size = $_POST['vector_size'];
    $insert_size = $_POST['insert_size'];
    $error = "Please enter your vector concentration and insert concentration.";
}else{
    $error = "";
    $vector_size = $_POST['vector_size'];
    $insert_size = $_POST['insert_size'];
    $vector_conc = $_POST['vector_conc'];
    $insert_conc = $_POST['insert_conc'];
    $ratio = $_POST['ratio'];
    $vol = $_POST['vol'];

    $vector_wt = 2.5*$vol;
    $vector_vol = number_format($vector_wt/$vector_conc,2);
    $insert_wt = $vector_wt*$insert_size*$ratio/$vector_size;
    $insert_vol = number_format($insert_wt/$insert_conc,2);
    $gibson_vol = number_format($vol/2,2);
    $water_vol = number_format($vol-$vector_vol-$insert_vol-$gibson_vol,2);
}
function isReady(){
    if($_POST['action']=="Submit"&&!empty($_POST['vector_conc'])&&!empty($_POST['insert_conc']))
        return TRUE;
    else return FALSE;
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
    <title>Gibson</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header-wrapper">
    <?php include("lib/header.php") ?>
    <div class="container">

        <form action="gibson.php" method="post" enctype="multipart/form-data">

            <table style="padding:0px 0px 15px 0px">
                <tr><td>
                        <div style ="color: #FF0000; font-size = 18px; font-weight: bold;"><?php echo $error?></div>
                    </td></tr>
                <tr>
                    <td>Please select your vector : insert molar ratio</td>
                </tr>
                <tr>
                    <td>
                        1 : 3<input type="radio" name="ratio" value="3"
                            <?php if(isset($_POST['ratio']) && $_POST['ratio'] == '3') echo ' checked="checked"'?>>
                        &nbsp;&nbsp;&nbsp;&nbsp;1 : 10<input type="radio" name="ratio" value="10"
                            <?php if(!isset($_POST['ratio']) || (isset($_POST['ratio']) && $_POST['ratio'] == '10')) echo ' checked="checked"'?>>
                    </td>
                </tr>
            </table>
            <table style="padding:0px 0px 15px 0px">
                <tr>
                    <td>Please select your reaction volume (uL)</td>
                </tr>
                <tr>
                    <td>
                        5<input type="radio" name="vol" value="5"
                            <?php if(!isset($_POST['vol']) || (isset($_POST['vol']) && $_POST['vol'] == '5')) echo ' checked="checked"'?>>
                        &nbsp;&nbsp;&nbsp;&nbsp;10<input type="radio" name="vol" value="10"
                            <?php if(isset($_POST['vol']) && $_POST['vol'] == '10') echo ' checked="checked"'?>>
                    </td>
                </tr>
            </table>
            <table>
                <tr style="font-size:16px; font-weight: bold;">
                    <td>Component</td>
                    <td>Size (bps)</td>
                    <td>Concentration (ng/uL)</td>
                    <td>Volume (uL)</td>
                </tr>
                <tr>
                    <td><div class = "form_row2">Vector</div></td>
                    <td><div class="form_row2">
                            <input type="text" name="vector_size" class="input"
                                   value = <?php echo $vector_size;?> />
                        </div></td>
                    <td><div class="form_row2">
                            <input type="text" name="vector_conc" class="input"
                                   <?php if(isReady()&&isset($_POST['action'])) echo "value = ". $vector_conc;?> />
                        </div></td>
                    <td><div class="form_row2">
                            <input type="text" name="vector_vol" class="input"
                                   <?php if(isReady()&&isset($_POST['action'])) echo "value = ". $vector_vol;?> />
                        </div></td>
                </tr>
                <tr>
                    <td><div class = "form_row2">Insert</div></td>
                    <td><div class="form_row2">
                            <input type="text" name="insert_size" class="input"
                                   value = <?php echo $insert_size;?> />
                        </div></td>
                    <td><div class="form_row2">
                            <input type="text" name="insert_conc" class="input"
                                   <?php if(isReady()&&isset($_POST['action'])) echo "value = ". $insert_conc;?> />
                        </div></td>
                    <td><div class="form_row2">
                            <input type="text" name="insert_vol" class="input"
                                   <?php if(isReady()&&isset($_POST['action'])) echo "value = ". $insert_vol;?> />
                        </div></td>
                </tr>
                <tr>
                    <td><div class = "form_row2">GibsonMix (2x)</div></td>
                    <td><div class="form_row2"></div></td>
                    <td><div class="form_row2"></div></td>
                    <td><div class="form_row2">
                            <input type="text" name="gibson_vol" class="input"
                                   <?php if(isReady()&&isset($_POST['action'])) echo "value = ". $gibson_vol;?> />
                        </div></td>
                </tr>
                <tr>
                    <td><div class = "form_row2">Water</div></td>
                    <td><div class="form_row2"></div></td>
                    <td><div class="form_row2"></div></td>
                    <td><div class="form_row2">
                            <input type="text" name="water_vol" class="input"
                                   <?php if(isReady()&&isset($_POST['action'])) echo "value = ". $water_vol;?> />
                        </div></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><input type = "submit" name = "action" value = "Submit"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>

</div>

</body>
</html>
