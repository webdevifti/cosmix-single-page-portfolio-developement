<?php 


function addService($request){
    global $con;
    $title = mysqli_real_escape_string($con, $request['title']);
    $icon = mysqli_real_escape_string($con, $request['icon']);
    $description = mysqli_real_escape_string($con, $request['description']);

    if(empty($icon)){
        $_SESSION['ic_required'] = 'Icon Class Required!';
    }elseif(empty($title)){
        $_SESSION['t_required'] = 'Title Required';
    }else if(empty($description)){
        $_SESSION['sd_required'] = 'Description required';
    }else{
        $logged_user_email = $_SESSION['USEREMAIL'];
        $getLoggedUser = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$logged_user_email'");
        $userInfo = mysqli_fetch_assoc($getLoggedUser);
        $userID = $userInfo['id'];

        $insert = mysqli_query($con, "INSERT INTO `services`(`title`,`icon`,`description`,`user_id`) VALUES('$title','$icon','$description','$userID')");
        if($insert){
            $_SESSION['service_success'] = '';
        }else{
            $_SESSION['service_error'] = '';
        }
    }
}
function getServices(){
    global $con;
    $query = "SELECT * FROM `services` ORDER BY `created_at` DESC";
    $excute = mysqli_query($con, $query);
    return $excute;
}
function getActiveServie(){
    global $con;
    $query = "SELECT * FROM `services` WHERE `status` = 1 LIMIT 6";
    $excute = mysqli_query($con, $query);
    return $excute; 
}
function serviceBulkOperation($request){
    global $con;
    $bulk_options = mysqli_real_escape_string($con, $request['bulk_options']);
    $selected_ids = $request['select_data'];
    
    if($bulk_options == ''){
        $_SESSION['bulk_error'] = '';
    }else if($selected_ids == ''){
        $_SESSION['bulk_error2'] = '';
    }

    if($bulk_options === 'delete'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
            $sql = "DELETE FROM `services` WHERE `id`=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['service_delete'] = '';
            }
        }
    }else if($bulk_options === 'active'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `services` SET `status`= 1 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['service_active'] = '';
            }
        }
        
    }else if($bulk_options === 'deactive'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `services` SET `status`= 0 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['service_deactive'] = '';
            }
        }
    }
}
function deleteService($id){
    global $con;

    $deleted =mysqli_query($con, "DELETE FROM `services` WHERE `id` = '$id'");
    if($deleted){
        $_SESSION['service_delete_success'] = '';
    }else{
        $_SESSION['service_delete_error'] = '';
    }
}


function addExperience($request){
    global $con;
    
    $title = mysqli_real_escape_string($con, $request['ex_title']);
    $ratio = mysqli_real_escape_string($con, $request['ratio']);

    $logged_user_email = $_SESSION['USEREMAIL'];
    $getLoggedUser = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$logged_user_email'");
    $userInfo = mysqli_fetch_assoc($getLoggedUser);
    $userID = $userInfo['id'];

    $insert = mysqli_query($con, "INSERT INTO `services_experience`(`exp_title`,`exp_ratio`,`user_id`) VALUES('$title','$ratio','$userID')");
    if($insert){
        $_SESSION['ex_added'] = '';
    }else{
        $_SESSION['ex_error'] = '';
    }
}

function getExperience(){
    global $con;
    $query = "SELECT * FROM `services_experience`";
    $excute = mysqli_query($con, $query);
    return $excute;
}
function getActiveExp(){
    global $con;
    $query = "SELECT * FROM `services_experience` WHERE `status` = 1";
    $excute = mysqli_query($con, $query);
    return $excute;
}
function editExp($id){
    global $con;
    $re = mysqli_query($con, "SELECT * FROM `services_experience` WHERE `id` = '$id'");
    return $re;
}
function deleteExp($id){
    global $con;
    $result = mysqli_query($con, "DELETE FROM `services_experience` WHERE `id` = '$id'");
    if($result){
        $_SESSION['dx'] = '';
        header('location: experience.php');
    }else{
        $_SESSION['dx_er'] = '';
    }
    // header('location: experience.php');
}

function updateExp($request){
    // print_r($request);
    // die();
    global $con;
    $id = mysqli_real_escape_string($con, $request['id']);
    $title = mysqli_real_escape_string($con, $request['ex_title']);
    $ratio = mysqli_real_escape_string($con, $request['ratio']);

    $update = mysqli_query($con, "UPDATE `services_experience` SET `exp_title` = '$title', `exp_ratio` ='$ratio' WHERE `id` = '$id'");
    if($update){
        header('location: experience.php');
    }else{
        $_SESSION['exp_up_err'] = '';
    }
}

function uploadFeature($request){
    global $con;
    
    $id = $request['id'];
    if($_FILES['experience_featrue_image']['name'] != ''){
        $bannerImage = $_FILES['experience_featrue_image']['name'];
        $temp_name = $_FILES['experience_featrue_image']['tmp_name'];
        $explode = explode('.',$bannerImage);
        $end = end($explode);
        $imageNewName = date('Ydmhis').'.'.$end;
    
        $imageType = $_FILES['experience_featrue_image']['type'];
        $imageSize = $_FILES['experience_featrue_image']['size'];
        if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){

            $select = "SELECT * FROM `feature_images` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['f_image']){
                $path = '../admin/uploads/experience/'.$select_result_fetch['f_image'];
                unlink($path);
            }

            $insert = mysqli_query($con, "UPDATE `feature_images` SET `section_name` = 'experience',`f_image` = '$imageNewName' WHERE `id` = '$id'");
            if($insert){
                $path = '../admin/uploads/experience/'.$imageNewName;
                move_uploaded_file($temp_name, $path);
                header('location: experience.php');

            }else{
                $_SESSION['exp_up_err'] = '';
            }

        }else{
            $_SESSION['exp_up_err'] = '';
        }

    }else {
        $_SESSION['exp_up_err'] = '';
    }
}

function getSectionFeatireImage($section){
    global $con;

    $result = mysqli_query($con, "SELECT * FROM `feature_images` WHERE `section_name` = '$section'");
    return $result;
}