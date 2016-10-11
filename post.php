<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/6/2015
 * Time: 9:55 PM
 */
session_start();
if(isset($_SESSION['username'])){
    $text = $_POST['text'];

    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}