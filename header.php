<?php
$encodedStr = basename($_SERVER['REQUEST_URI']);
$current_filename = urldecode($encodedStr);
?>

<div id="header" class="container">
        <div id="logo">
            <h1><a>Lab Calculator for DUMMIES!</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li <?php if($current_filename=='index.php') echo "class='active'"; ?>><a href="index.php" accesskey="1" title="">Home</a></li>
                <li <?php if($current_filename=='buffer.php') echo "class='active'"; ?>><a href="buffer.php" accesskey="2" title="">Buffer/Conc.</a></li>
                <li <?php if($current_filename=='condition.php') echo "class='active'"; ?>><a href="condition.php" accesskey="3" title="">Conditions</a></li>
                <li <?php if($current_filename=='LIC_primers.php') echo "class='active'"; ?>><a href="LIC_primers.php" accesskey="4" title="">Primers</a></li>
                <li <?php if($current_filename=='gibson.php') echo "class='active'"; ?>><a href="gibson.php" accesskey="5" title="">Gibson</a></li>
                <li <?php if($current_filename=='contact.php') echo "class='active'"; ?>><a href="contact.php" accesskey="6" title="">Contact Us</a></li>
            </ul>
        </div>
    </div>
