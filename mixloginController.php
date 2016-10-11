<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 2:23 PM
 */
include("mixDatabase.php");
if(isset($_POST["username"]) && isset($_POST["password"])) {
    $name = $_POST["username"];
    $password = $_POST["password"];

    if(check_password_correct($name, $password)) {

        // not login
        if(check_already_logged_in($name, $password)) {
            $_SESSION["username"] = $name;
            redirect_helper("mixfriend_list.php","Logged in successfully!!");
        }
        // not allowed multiple login
        else {
            redirect_helper("mixIndex.php","You are already online!");
        }


    }
    else {
        redirect_helper("mixIndex.php","You might type in wrong username or password...");
    }
}

?>