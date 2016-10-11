<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 3:04 PM
 */

include('mixDatabase.php');
$username = $_SESSION["username"];
$friend = $_POST["friend"];

if(!isset($_SESSION['username'])){
    header("Location:mixIndex.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat Room</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
  <!--  <link rel="stylesheet" href="css/chatroom.css" type="text/css">-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
</head>
<body>

<!--go back to friend list-->
<div id="go_back_to_friend_list">
    <a id="go_back_to_friend_list_button" href="mixfriend_list.php">Back to friend list</a>
</div>

<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b>. You are chatting with <b><?php echo $_POST["friend"]; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox">
        <?php
        if(file_exists("log.html") && filesize("log.html") > 0){
            $handle = fopen("log.html", "r");
            $contents = fread($handle, filesize("log.html"));
            fclose($handle);

            echo $contents;
        }
        ?>
    </div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />

        <!--new new new-->
        <input id="username" type="hidden" value="<?=$username?>">
        <input id="friend" type="hidden" value="<?=$friend?>">
    </form>
</div>

<script>
    // jQuery Document
    $(document).ready(function(){
        //If user wants to end session
        $("#exit").click(function(){
            var exit = confirm("Are you sure you want to end the session?");
            /*if(exit==true){window.location = 'mixloginController.php?logout=true';}*/
            if(exit==true){window.location = 'mixlogout.php?logout==true';}
        });

        //If user submits the form
        $("#submitmsg").click(function(){
            var clientmsg = $("#usermsg").val();
            $.post("post.php", {text: clientmsg});
            $("#usermsg").attr("value", "");
            return false;
        });

        setInterval (loadLog, 2500);	//Reload file every 2500 ms or x ms i
        //Load the file containing the chat log
        function loadLog(){
            var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
            $.ajax({
                url: "log.html",
                cache: false,
                success: function(html){
                    $("#chatbox").html(html); //Insert chat log into the #chatbox div

                    //Auto-scroll
                    var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                    if(newscrollHeight > oldscrollHeight){
                        $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                    }
                },
            });
        }
    });
</script>
</body>
</html>