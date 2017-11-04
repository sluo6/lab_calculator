<?php
if(!isset($_POST['action'])){
    $salt_name="";
    $salt_stock="";
    $salt_desired="";
    $salt_volume="";

    $buffer_name="";
    $buffer_stock="";
    $buffer_desired="";
    $buffer_volume="";

    $precipitant_name="";
    $precipitant_stock="";
    $precipitant_desired="";
    $precipitant_volume="";

    $additive_name="";
    $additive_stock="";
    $additive_desired="";
    $additive_volume="";

    $additive2_name="";
    $additive2_stock="";
    $additive2_desired="";
    $additive2_volume="";

    $water_volume="";
    $total_volume="";
}elseif($_POST['action']=="Submit"){
    $total_volume=$_POST['total_volume'];

    $salt_name=$_POST['salt_name'];
    $salt_stock=$_POST['salt_stock'];
    $salt_desired=$_POST['salt_desired'];
    if(($salt_desired=="")||($salt_desired==0)){$salt_volume=0;}
    else{$salt_volume=$total_volume*$salt_desired/$salt_stock*1000;}

    $buffer_name=$_POST['buffer_name'];
    $buffer_stock=$_POST['buffer_stock'];
    $buffer_desired=$_POST['buffer_desired'];
    if(($buffer_desired=="")||($buffer_desired==0)){$buffer_volume=0;}
    else{$buffer_volume=$total_volume*$buffer_desired/$buffer_stock*1000;}

    $precipitant_name=$_POST['precipitant_name'];
    $precipitant_stock=$_POST['precipitant_stock'];
    $precipitant_desired=$_POST['precipitant_desired'];
    if(($precipitant_desired=="")||($precipitant_desired==0)){$precipitant_volume=0;}
    else{$precipitant_volume=$total_volume*$precipitant_desired/$precipitant_stock*1000;}

    $additive_name=$_POST['additive_name'];
    $additive_stock=$_POST['additive_stock'];
    $additive_desired=$_POST['additive_desired'];
    if(($additive_desired=="")||($additive_desired==0)){$additive_volume=0;}
    else{$additive_volume=$total_volume*$additive_desired/$additive_stock*1000;}

    $additive2_name=$_POST['additive2_name'];
    $additive2_stock=$_POST['additive2_stock'];
    $additive2_desired=$_POST['additive2_desired'];
    if(($additive2_desired=="")||($additive2_desired==0)){$additive2_volume=0;}
    else{$additive2_volume=$total_volume*$additive2_desired/$additive2_stock*1000;}

    $total_volume=number_format($_POST['total_volume'],3);

    $water_volume=$total_volume*1000-$salt_volume-$buffer_volume
        -$precipitant_volume-$additive_volume-$additive2_volume;

}elseif($_POST['action']=="Reset"){
    $salt_name="";
    $salt_stock="";
    $salt_desired="";
    $salt_volume="";

    $buffer_name="";
    $buffer_stock="";
    $buffer_desired="";
    $buffer_volume="";

    $precipitant_name="";
    $precipitant_stock="";
    $precipitant_desired="";
    $precipitant_volume="";

    $additive_name="";
    $additive_stock="";
    $additive_desired="";
    $additive_volume="";

    $additive2_name="";
    $additive2_stock="";
    $additive2_desired="";
    $additive2_volume="";

    $water_volume="";
    $total_volume="";
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
    <title>Dilution</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="stylesheet/main.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="header-wrapper">
    <?php include("header_buffer.php") ?>
    <div class="container">
        <form action="dilution.php" method="post" enctype="multipart/form-data">
            <div style="padding:0 0 0 110px;">
                <table class="dilution">
                    <tr class="dilution" style="border-bottom: 3px solid black;">
                        <td class="dilution">&nbsp;</td>
                        <td class="dilution">Name (Optional)</td>
                        <td class="dilution">Stock Conc.</td>
                        <td class="dilution">Desired Conc.</td>
                        <td class="dilution">Volume (uL)</td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Salt</td>
                        <td class="dilution"><input type="text" name="salt_name"
                                                    value = "<?php echo $salt_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="salt_stock" step="0.001"
                                                    value = "<?php echo $salt_stock;?>" min="0" class="dilution2"/>M</td>
                        <td class="dilution"><input type="number" name="salt_desired" step="0.001"
                                                    value = "<?php echo $salt_desired;?>" min="0" class="dilution2"/>M</td>
                        <td class="dilution"><?php echo $salt_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Buffer</td>
                        <td class="dilution"><input type="text" name="buffer_name"
                                                    value = "<?php echo $buffer_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="buffer_stock" step="0.001"
                                                    value = "<?php echo $buffer_stock;?>" min="0" class="dilution2"/>M</td>
                        <td class="dilution"><input type="number" name="buffer_desired" step="0.001"
                                                    value = "<?php echo $buffer_desired;?>" min="0" class="dilution2"/>M</td>
                        <td class="dilution"><?php echo $buffer_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Precipitant</td>
                        <td class="dilution"><input type="text" name="precipitant_name"
                                                    value = "<?php echo $precipitant_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="precipitant_stock" step="0.001"
                                                    value = "<?php echo $precipitant_stock;?>" min="0" class="dilution2"/>%</td>
                        <td class="dilution"><input type="number" name="precipitant_desired" step="0.001"
                                                    value = "<?php echo $precipitant_desired;?>" min="0" class="dilution2"/>%</td>
                        <td class="dilution"><?php echo $precipitant_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Additive (Optional)</td>
                        <td class="dilution"><input type="text" name="additive_name"
                                                    value = "<?php echo $additive_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="additive_stock" step="0.001"
                                                    value = "<?php echo $additive_stock;?>" min="0" class="dilution2"/>%</td>
                        <td class="dilution"><input type="number" name="additive_desired" step="0.001"
                                                    value = "<?php echo $additive_desired;?>" min="0" class="dilution2"/>%</td>
                        <td class="dilution"><?php echo $additive_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Additive2 (Optional)</td>
                        <td class="dilution"><input type="text" name="additive2_name"
                                                    value = "<?php echo $additive2_name;?>" class="dilution"/></td>
                        <td class="dilution"><input type="number" name="additive2_stock" step="0.001"
                                                    value = "<?php echo $additive2_stock;?>" min="0" class="dilution2"/>%</td>
                        <td class="dilution"><input type="number" name="additive2_desired" step="0.001"
                                                    value = "<?php echo $additive2_desired;?>" min="0" class="dilution2"/>%</td>
                        <td class="dilution"><?php echo $additive2_volume;?></td>
                    </tr>
                    <tr class="dilution" style="border-bottom: 3px solid black;">
                        <td class="dilution2">Water</td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"><?php echo $water_volume;?></td>
                    </tr>
                    <tr class="dilution">
                        <td class="dilution2">Total Volume (mL)</td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"></td>
                        <td class="dilution"><input type="number" name="total_volume" step="0.001" required
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