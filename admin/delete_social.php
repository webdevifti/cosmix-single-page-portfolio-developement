<?php
session_start();
require '../configs/env.php';
require '../configs/db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $delete = mysqli_query($con, "DELETE FROM `site_social_share` WHERE `id`='$id'");
    if($delete){
        $_SESSION['social_delete_success'] = '';
        header('location: site_social_links.php');
    }else{
        $_SESSION['social_delete_error'] = '';
        header('location: site_social_links.php');
    }
}else{
    header('location: site_social_links.php');
}

?>