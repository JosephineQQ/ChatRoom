<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 2:15 PM
 *
 */
include("mixUpp.php");

if(isset($_SESSION["username"])) {?>

    <form id="logout" action="mixlogout.php" method="post">
        <input type="submit" value="Log out">
        <input type="hidden" name="logout" value="true">
    </form>

    <?php
}
else { ?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="loginform">
        <h2>Please login to start chatting~~~~~~~~.</h2>

        <form id="login" action="mixloginController.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" /><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" /><br>
            <input type="submit" name="enter" id="enter" value="Enter" />
    </div>


<?php }
?>