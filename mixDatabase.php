<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 2:24 PM
 */
if(!isset($_SESSION)) {
    session_start();
}

// for connecting to database
$db = new PDO("mysql:host=localhost;dbname=chatroom","root","");

function check_password_correct($name,$password) {
    $db = new PDO("mysql:host=localhost;dbname=chatroom","root","");
    // give the $name quote mark
    $name = $db->quote($name);

    $rows = $db->query("SELECT * FROM users WHERE username = $name");

    if($rows) {
        foreach($rows as $row) {


            if($password == $row["password"]) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }

}


function check_already_logged_in($name, $password) {

    $db = new PDO("mysql:host=localhost;dbname=chatroom","root","");
    $name = $db->quote($name);

    $rows = $db->query("SELECT * FROM users WHERE username = $name");

    if($rows) {
        foreach($rows as $row) {


            if($row["online"] == 1) {
                //multiple logging in is now allowed
                return FALSE;
            }
            else {
                return TRUE;
            }
        }
    }
}





function redirect_helper($url, $message = NULL) {
    if($message) {
        $_SESSION["message"] = $message;
    }
    header("Location: $url");
    die;
}
?>
