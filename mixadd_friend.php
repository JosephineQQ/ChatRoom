<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 4:37 PM
 */
include('mixDatabase.php');
$username = $_SESSION["username"];

/*echo $_SESSION["username"];*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Friend List</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <script src="jquery-1.11.3.min.js"></script>
</head>
<body>

<div id="add_friend_area">

    <div id="form">

        <h2 id="addnewfriend">Add New Friend</h2>
        <input id="username" type="hidden" name="username" value="<?=$username?>">
        <input id="friendname" type="text" name="friend_name" placeholder="Friend's name">
        <button id="button">Add</button><br><br>

        <a id="friend_list_page" href="mixfriend_list.php">Back to friend list page</a>

    </div>
</div>

<div id="show_add_friend_message"></div>


<script src="js/mixadd_friend.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
