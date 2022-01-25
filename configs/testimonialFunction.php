<?php

function addTestimonial($request){
    global $con;

    $name = mysqli_real_escape_string($con,$request['name']);
    $designation = mysqli_real_escape_string($con,$request['designation']);
    $testimonial = mysqli_real_escape_string($con,$request['testimonials']);

    $testimonialImage = $_FILES['testimonial_image']['name'];
    $temp_name = $_FILES['testimonial_image']['tmp_name'];
    $explode = explode('.',$testimonialImage);
    $end = end($explode);
    $imageNewName = date('Ydmhis').'.'.$end;

    if(empty($name)){
        $_SESSION['tn_required'] = 'Name Required!';
    }else if(empty($designation)){
        $_SESSION['td_required'] = 'Designation Required!';
    }else if(empty($testimonial)){
        $_SESSION['ut_required'] = "Description Required!";
    }else if($testimonialImage == ''){
        $_SESSION['bi_required'] = 'Testimonial Image Required!';
    }else if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){

        $userID = getLoggedUserId();

        $query = "INSERT INTO `testimonial_section`(`reviewer_name`, `reviewer_designation`, `reviewer_photo`, `review`, `user_id`) VALUES ('$name','$designation','$imageNewName','$testimonial','$userID')";
        $excute_query = mysqli_query($con, $query);
    
        
        if($excute_query){
            move_uploaded_file($temp_name,'../admin/uploads/testimonials/'.$imageNewName);
        
            $_SESSION['testimonial_success'] = "Testimonial Added has been successfully.";
        }else{
            $_SESSION['testimonial_error'] = "Something Went Wrong!";
        }
    }else {
        $_SESSION['image_type_error'] = "Image type must be jpeg, jpg and png";
    }
}

function getTestimonials(){
    global $con;
    $query = mysqli_query($con, "SELECT * FROM `testimonial_section` ORDER BY `created_at` DESC");
    return $query;
}

function getActiveTestimonials(){
    global $con;
    $query = mysqli_query($con, "SELECT * FROM `testimonial_section` WHERE `status` = 1 ORDER BY `created_at` DESC");
    return $query;
}


function updateTestimonial($request, $id){
    global $con;

    $name = mysqli_real_escape_string($con,$request['name']);
    $designation = mysqli_real_escape_string($con,$request['designation']);
    $testimonial = mysqli_real_escape_string($con,$request['testimonials']);
    
    if($_FILES['testimonial_image']['name'] != ''){
        $reviewerImage = $_FILES['testimonial_image']['name'];
        $temp_name = $_FILES['testimonial_image']['tmp_name'];
        $explode = explode('.',$reviewerImage);
        $end = end($explode);
        $imageNewName = date('Ydmhis').'.'.$end;

        if($end === 'jpeg' || $end === 'jpg' || $end === 'png'){
            
            $select = "SELECT * FROM `testimonial_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['reviewer_photo']){
                $path = '../admin/uploads/testimonials/'.$select_result_fetch['reviewer_photo'];
                unlink($path);
            }
    
            $update = "UPDATE `testimonial_section` SET `reviewer_name`='$name',`reviewer_designation`='$designation',`reviewer_photo`='$imageNewName',`review`='$testimonial' WHERE `id` = '$id'";
            $excute_update_query = mysqli_query($con, $update);
            if($excute_update_query){
                $newPath = '../admin/uploads/testimonials/'.$imageNewName;
                move_uploaded_file($temp_name,$newPath);
                $_SESSION['testimonial_success'] = '';
            }else{
                $_SESSION['testimonial_error'] = '';
            }
        }else{
            $_SESSION['testimonial_error'] = '';

        }


    }else{
        $update2 = "UPDATE `testimonial_section` SET `reviewer_name`='$name',`reviewer_designation`='$designation',`review`='$testimonial'  WHERE `id` = '$id'";
        $excute_update_query2 = mysqli_query($con, $update2);
        if($excute_update_query2){
            $_SESSION['testimonial_success'] = '';
        }else{
            $_SESSION['testimonial_error'] = '';
        }
    }
}


function deleteTestimonial($id){
    global $con;
    $select = "SELECT * FROM `testimonial_section` WHERE `id` = '$id'";
    $select_result = mysqli_query($con, $select);
    $select_result_fetch = mysqli_fetch_assoc($select_result);

    if($select_result_fetch['reviewer_photo']){
        $path = '../admin/uploads/testimonials/'.$select_result_fetch['reviewer_photo'];
        unlink($path);
    }

    $query = "DELETE FROM `testimonial_section` WHERE `id` = '$id'";
    $excute_query = mysqli_query($con, $query);
    if($excute_query){
       $_SESSION['testimonial_delete_success'] = '';
       header('location: testimonials.php');
    }else{
        $_SESSION['testimonial_delete_error'] = '';
    }
}

function testimonialBulkOperation($request){
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

            $select = "SELECT * FROM `testimonial_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['reviewer_photo']){
                $path = '../admin/uploads/testimonials/'.$select_result_fetch['reviewer_photo'];
                unlink($path);
            }

            $sql = "DELETE FROM `testimonial_section` WHERE `id`=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['testimonial_delete'] = '';
            }
        }
    }else if($bulk_options === 'active'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `testimonial_section` SET `status`= 1 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['testimonial_active'] = '';
            }
        }
        
    }else if($bulk_options === 'deactive'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `testimonial_section` SET `status`= 0 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['testimonial_deactive'] = '';
            }
        }
    }
}

function testimonialBgUpload($request){
    global $con;
    $testimoniaBglImage = $_FILES['testimonial_bg_image']['name'];
    $temp_name = $_FILES['testimonial_bg_image']['tmp_name'];
    $explode = explode('.',$testimoniaBglImage);
    $end = end($explode);
    $imageNewName = date('Ydmhis').'.'.$end;

    if($testimoniaBglImage == ''){
        $_SESSION['tfgjhi_required'] = 'Image Required!';
    }else if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){
        $query = "INSERT INTO `feature_images`(`section_name`, `f_image`) VALUES ('testimonial','$imageNewName')";
        $excute_query = mysqli_query($con, $query);
        if($excute_query){
            move_uploaded_file($temp_name,'../admin/uploads/bg/'.$imageNewName);
        
            $_SESSION['testimonial_bg_success'] = "Image Added has been successfully.";
        }else{
            $_SESSION['testimonial_bg_error'] = "Something Went Wrong!";
        }
    }else {
        $_SESSION['bg_type_error'] = "Image type must be jpeg, jpg and png";
    }
}

function getTestimonialsBg(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `feature_images` WHERE `section_name` = 'testimonial' ORDER BY id DESC");
    return $result;
}
function getActiveTestimonialsBg(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `feature_images` WHERE (`section_name` = 'testimonial' AND `status` = 1)");
    $data = mysqli_fetch_assoc($result);
    return $data;
}
function changeBgStatus($id, $status){
    global $con;
    if($status === 'false'){
        $query = mysqli_query($con, "UPDATE `feature_images` SET `status`= 0 WHERE `id`= '$id'");
        header('location: add-testimonial-bg.php');
    }
    if($status === 'true'){
        $query = mysqli_query($con, "UPDATE `feature_images` SET `status`= 0 WHERE NOT `id`= '$id'");
        $query = mysqli_query($con, "UPDATE `feature_images` SET `status`= 1 WHERE `id`= '$id'");
        header('location: add-testimonial-bg.php');
    }
}