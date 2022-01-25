<?php


function addSocialLink($request){
    global $con;
    $social_site_name = mysqli_real_escape_string($con, $request['social_site_name']);
    $social_link = mysqli_real_escape_string($con, $request['social_link']);

    if(empty($social_site_name)){
        $_SESSION['social_required'] = "Required!";
    }else if(empty($social_link) && !filter_var($social_link, FILTER_VALIDATE_URL)){
        $_SESSION['social_link_required'] = "Required!";
    }else{

        $insert = mysqli_query($con, "INSERT INTO `site_social_share`(`social_name`,`social_link`) VALUES('$social_site_name','$social_link')");
        if($insert){
            $_SESSION['social_added_success'] = '';
        }else{
            $_SESSION['social_added_error'] = '';
        }
    }
}

function getSocialLinks(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `site_social_share` ORDER BY `created_at` DESC");
    return $result;
}

function changeAction($id, $action){
    global $con;
    if($action == 'active'){
        $result = mysqli_query($con, "UPDATE `site_social_share` SET `status`=1 WHERE `id`=$id");
        ?><script>window.location.href = 'site_social_links.php';</script> <?php
    }
    if($action == 'deactive'){
        $result = mysqli_query($con, "UPDATE `site_social_share` SET `status`=0 WHERE `id`=$id");
        ?><script>window.location.href = 'site_social_links.php';</script> <?php
    }
}

function getActiveSocialLink(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `site_social_share` WHERE `status` = 1");
    return $result;
}