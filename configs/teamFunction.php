<?php 


function addTeamMember($request){
    global $con;
    $name = mysqli_real_escape_string($con,$request['name']);
    $designation = mysqli_real_escape_string($con,$request['designation']);
    $bio = mysqli_real_escape_string($con,$request['bio']);
    $memberPhoto = $_FILES['member_photo']['name'];
    $temp_name = $_FILES['member_photo']['tmp_name'];
    $explode = explode('.',$memberPhoto);
    $end = end($explode);
    $imageNewName = date('Ydmhis').'.'.$end;

    if(empty($name)){
        $_SESSION['tm_required'] = 'Required!';
    }else if(empty($designation)){
        $_SESSION['td_required'] = 'Required!';
    }else if(empty($bio)){
        $_SESSION['tb_required'] = "Required!";
    }else if($memberPhoto == ''){
        $_SESSION['tphoto_required'] = 'Image Required!';
    }else if($end  === 'jpeg' || $end === 'png' || $end === 'jpg'){
        $userID = getLoggedUserId();
        $query = "INSERT INTO `team_members`(`photo`, `name`, `designation`, `bio`, `user_id`) VALUES ('$imageNewName','$name','$designation','$bio','$userID')";
        $excute_query = mysqli_query($con, $query);
        if($excute_query){
            move_uploaded_file($temp_name,'../admin/uploads/teams/'.$imageNewName);
        
            $_SESSION['team_success'] = "";
        }else{
            $_SESSION['team_error'] = "";
        }
    }else {
        $_SESSION['team_image_type_error'] = "Image type must be jpeg, jpg and png";
        
    }
}


function addSocialMedia($request){
    global $con;

    $name = $request['forwho'];
    $social = $request['social'];
    $url = $request['url'];

    $insert = mysqli_query($con, "INSERT INTO `team_members_social_links`(`member_id`, `social_name`, `social_url`) VALUES ('$name','$social','$url')");

}

// function getTeamMemberSocialMedia(){
//     global $con;
//     $result = mysqli_query($con, "SELECT `team_members`.*,`team_members_social_links`.`id` as social_link_id, `team_members_social_links`.`social_name`,`team_members_social_links`.`social_url` FROM `team_members`
//      INNER JOIN `team_members_social_links` ON `team_members`.`id`=`team_members_social_links`.`member_id` GROUP BY `team_members`.`id`");
//     return $result;
// }
function getSocialByMemberId($memberid){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `team_members_social_links` WHERE `member_id`= '$memberid'");
    return $result;
}

function getActiveTeamMember(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `team_members` WHERE `status` = 1");
    return $result;
}

function getTeamMember(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `team_members`");
    // $result = mysqli_query($con, "SELECT `team_members`.*,`team_members_social_links`.`id` as social_link_id, `team_members_social_links`.`social_name`,`team_members_social_links`.`social_url` FROM `team_members`
    // INNER JOIN `team_members_social_links` ON `team_members`.`id`=`team_members_social_links`.`member_id`");
    return $result;
}