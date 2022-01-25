<?php

function getMessages(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `message_from_user` ORDER BY `sended_at` DESC LIMIT 10");
    return $result;
}
function deleteMessage($id){
    global $con;
    $result = mysqli_query($con, "DELETE FROM `message_from_user` WHERE `id` = '$id'");
    if($result){
        $_SESSION['msg_delete_success'] = '';
        header('location: messages.php');
    }
}