<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 2:48 PM
 */
include('mixDatabase.php');
$username = $_SESSION["username"];
$friends = "SELECT friend FROM friends WHERE username = '$username'";
$rows = $db->query($friends);
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

<div id="friends_list">
    <h1 id="welcomeback">Welcome back <?=$username?> ~~~~~~~~~~~~~~~~~~~~~~~~~~</h1>

    <div id="go_logged_out_f">
        <a id="go_logged_out_button_1" href="mixlogout.php?logout==true">Log out</a>
    </div>

    <form id="form" action="mixchatroom.php" method="post">
        <div>
            <h2>Choose friend you want to talk.</h2>
            <select id="friends_drop_down" name="friend" size="10" style="background-color: #abcdef;width: 100px;">
                <?php
                   foreach($rows as $row) { ?>
              <option onmouseover="change1('over',this)" onmouseout="change1('out',this)"><?= $row["friend"] ?></option>
            <?php  } ?>
            </select>
            <div>
                <br>
                <input type="submit" value="Let's chat">
                <a id="add_friend"href="mixadd_friend.php">Add friend</a>
            </div>


        </div>
        <input id="username" type="hidden" name='<?=$username?>' value="username">


    </form>

</div>

</body>
<script>
    function change1(val,obj){
        if(val=='over'){
            obj.style.color='red';
            obj.style.cursor='pointer';
        }else if(val=='out'){
            obj.style.color='black';
        }
    }
</script>
</html>
