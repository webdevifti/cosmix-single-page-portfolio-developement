<?php 


function addAboutSection($request){
    global $con;
    $heading = mysqli_real_escape_string($con, $request['about_heading']);
    $description = mysqli_real_escape_string($con, $request['about_description']);

    if(empty($heading)){
        $_SESSION['about_heading_required'] = 'Heading is Required!';
    }else if(empty($description)){
        $_SESSION['about_description'] = 'Description is required!';
    }else{
        
        $userID = getLoggedUserId();

        $insert = mysqli_query($con, "INSERT INTO `about_section`(`about_heading`,`about_desc`,`user_id`) VALUES('$heading','$description','$userID')");

        if($insert){
            $_SESSION['about_section_success'] = '';
        }else{
            $_SESSION['about_section_error'] = '';
        }

    }
}

function addFeatureImage($request){
    global $con;
    $id = mysqli_real_escape_string($con, $request['id']);
    if($_FILES['about_featrue_image']['name'] != ''){
        $featureImage = $_FILES['about_featrue_image']['name'];
        $temp_name = $_FILES['about_featrue_image']['tmp_name'];
        $explode = explode('.',$featureImage);
        $end = end($explode);
        $imageNewName = date('Ydmhis').'.'.$end;
    
        $imageType = $_FILES['about_featrue_image']['type'];
        $imageSize = $_FILES['about_featrue_image']['size'];
        if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){

            $select = "SELECT * FROM `about_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['about_feature_image']){
                $path = '../admin/uploads/about/'.$select_result_fetch['about_feature_image'];
                unlink($path);
            }

            $insert = mysqli_query($con, "UPDATE `about_section` SET `about_feature_image` = '$imageNewName' WHERE `id` ='$id'");
            if($insert){
                $path = '../admin/uploads/about/'.$imageNewName;
                move_uploaded_file($temp_name, $path);
                header('location: about-section.php');

            }else{
                $_SESSION['about_up_err'] = '';
            }

        }else{
            $_SESSION['about_up_err'] = '';
        }

    }else {
        $_SESSION['about_up_err'] = '';
    }
}

function getAboutSection(){
    global $con;
    $query = mysqli_query($con, "SELECT * FROM `about_section`");
    if(mysqli_num_rows($query) > 0){
        $result = mysqli_fetch_assoc($query);
        return $result;
    }else {
        return false;
    }
}

function updateAboutSection($request){
    global $con;
    $id = mysqli_real_escape_string($con, $request['id']);
    $heading = mysqli_real_escape_string($con, $request['about_heading']);
    $description = mysqli_real_escape_string($con, $request['about_description']);

    if(empty($heading)){
        $_SESSION['about_heading_required'] = 'Heading is Required!';
    }elseif(empty($id)){
        $_SESSION['about_section_error'] = '';
    }else if(empty($description)){
        $_SESSION['about_description'] = 'Description is required!';
    }else{
        $insert = mysqli_query($con, "UPDATE `about_section` SET `about_heading` = '$heading',`about_desc` = '$description' WHERE `id` = '$id'");

        if($insert){
            $_SESSION['about_upsection_success'] = '';
        }else{
            $_SESSION['about_upsection_error'] = '';
        }

    }
}