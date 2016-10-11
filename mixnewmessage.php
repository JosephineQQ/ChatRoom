<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 5:45 PM
 */
include("mixDatabase.php");

// to give the paramaters a quote, maing it easier to query in the sql statement
$username = $db->quote($_POST["username"]);

//SELECT distinct talker FROM messages WHERE receiver = 'michael' AND receiver_checked =0
$rows = $db->query("SELECT DISTINCT talker FROM messages "
    . "WHERE receiver =".$username." AND receiver_checked = 0");


if($rows){

    $row_num = 0;
    foreach($rows as $row){

        echo "<p>".$row["talker"]."</p>"  ;
        $row_num = 1;
    }
    if($row_num == 0){
        echo "0";
    }

}
else{
    echo "failed to extract message in periodically...";
}

?>