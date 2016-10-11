<?php
/**
 * Created by PhpStorm.
 * User: OTZ
 * Date: 12/10/2015
 * Time: 5:17 PM
 */

// this php part is for processing adding friend request
include('mixDatabase.php');



// to give the paramaters a quote, maing it easier to query in the sql statement
$username = $db->quote($_POST["username"]);
$friendname = $_POST["friend"];
$friendname_q = $db->quote($_POST["friend"]);

//echo "hello";
// to extract the row which tell if user has already had this friend
$rows1 = $db->query("SELECT * FROM friends "
    . "WHERE username = ".$username." AND friend = ".$friendname_q);


// if you username doesn't have this friend yet, to search if there's this person in the users table
$rows2 = $db->query("SELECT username FROM users "
    . "WHERE username = ".$friendname_q);
//echo $rows2;

if($rows1){

    $go_to_check_rows2 = "YES";
    // already in your frined list
    foreach($rows1 as $row){


        if($friendname == $row["friend"]) {
            // print out 1, meaning that friend already
            echo "1";

            $go_to_check_rows2 = "NO";
        }
    }



    // not friend yet, search him/her in the users table
    // not friend yet, want to add to each other
    if($go_to_check_rows2 == "YES"){

        $is_rows2_empty = "YES";


        //situation 1
        foreach($rows2 as $row){
            // about to be friend, add each other respectively



            $db->exec("INSERT INTO friends VALUES (".$username.",".$friendname_q.")");

            $db->exec("INSERT INTO friends VALUES (".$friendname_q.",".$username.")");

            echo "2";

            $is_rows2_empty = "NO";
        }


        //situation 2
        // doesn't find this person user wants to add
        if($is_rows2_empty == "YES"){

            // print out 2, meaning add friend successfully
            echo "3";
        }

    }

}





/*
 else{
    echo "failed to extract any information...";
}

 */
?>

