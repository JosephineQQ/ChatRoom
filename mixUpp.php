<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <script src="jquery-1.11.3.min.js"></script>
</head>
<body>
<?php
if(!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION["message"])) {
    ?>
    <div id="message" style="color: red"><?= $_SESSION["message"]?> </div>
    <?php
    unset($_SESSION["message"]);

}
?>
</body>
</html>

