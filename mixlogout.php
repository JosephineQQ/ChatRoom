<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 2:56 PM
 */
session_start();
include("mixDatabase.php");

$username = $_SESSION["username"];
$username = $db->quote($username);

$rows = $db->query("SELECT online FROM users "
    . "WHERE username =".$username);


foreach($rows as $row){
    ?>
    <p><?= $row["online"]?></p>


    <?php

}


// because the user wants to log out, so the online status needs to be set 0
$db->exec("UPDATE users SET online = 0 WHERE username =".$username);



//to destroy user's session, about to log out
session_destroy();
session_regenerate_id();
session_start();
redirect_helper("mixIndex.php","You just logged out.");

/*if(isset($_GET['logout'])){

    //Simple exit message
    //数据库数据库数据库数据库～～～～～～～～～～～～～～～～～～～～～～～～～～～～～
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['username'] ." has left the chat session.</i><br></div>");
    fclose($fp);

    session_destroy();
   /* header("Location: logon.php"); //Redirect the user*/

/*    session_regenerate_id();
    session_start();
    redirect_helper("mixIndex.php","You just logged out.");
}*/


?>