/**
 * Created by OTZ on 12/10/2015.
 */
$("#button").click(function(){
    var username = $("#username").val();
    var friendname = $("#friendname").val();
    $("#show_add_friend_message").empty();

  /* alert(username);
    alert(friendname);*/

    if(friendname == username){
        //alert('nonono');
        $("#show_add_friend_message").append("<p class=friend_message_f> You cannot add yourself as a new friend!</p><br/>");
        $('#friendname').val('');
    }
    else{

        $.post("mixprocessing_adding_friend_request.php",{username:username,friend: friendname}, function(data){

            //alert(username);
            //alert(friendname);
            //alert(data);
            /* already in your frined list */
            if(data == 1) {

                //alert("first one");
                $("#show_add_friend_message").append("<p class=friend_message_f>"+ friendname +
                    " is already in your friend list! </p><br/>");
            }

            /* be friend with each other now */
            else if(data == 2) {

                $("#show_add_friend_message").append("<p class=friend_message_r>"+ friendname +
                    " is your friend now! </p><br/>");
            }

            /* this person doesn't in the users table*/
            else if(data == 3) {

                if(friendname==""){
                    $("#show_add_friend_message").append("<p class=friend_message_f> Friend's name cannot be empty... </p><br/>");
                }
                else{
                    $("#show_add_friend_message").append("<p class=friend_message_f>"+ friendname +
                        " is not the member of the chatroom... </p><br/>");
                }

            }

        });

        //to clear the input area
        $('#friendname').val('');
    }



});

