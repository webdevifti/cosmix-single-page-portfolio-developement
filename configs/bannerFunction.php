<?php
//  Add Banner
function addBanner($request){
    global $con;

    $heading = mysqli_real_escape_string($con,$request['banner_heading']);
    $subheading = mysqli_real_escape_string($con,$request['banner_subheading']);
    $desc = mysqli_real_escape_string($con,$request['banner_desc']);
    $bannerImage = $_FILES['banner_image']['name'];
    $temp_name = $_FILES['banner_image']['tmp_name'];
    $explode = explode('.',$bannerImage);
    $end = end($explode);
    $imageNewName = date('Ydmhis').'.'.$end;

    $imageType = $_FILES['banner_image']['type'];
    $imageSize = $_FILES['banner_image']['size'];

    if(empty($heading)){
        $_SESSION['h_required'] = 'Heading Required!';
    }else if(empty($subheading)){
        $_SESSION['sh_required'] = 'Sub Heading Required!';
    }else if(empty($desc)){
        $_SESSION['d_required'] = "Description Required!";
    }else if($bannerImage == ''){
        $_SESSION['bi_required'] = 'Banner Image Required!';
    }else if($imageType != 'jpeg' || $imageType != 'png' || $imageType != 'jpg'){
        $_SESSION['image_type_error'] = "Image type must be jpeg, jpg and png";
    }else if($imageSize <= 3145728){
        $_SESSION['image_size_error'] = "Image Size must be less then 3 mb";
    }else {

        $query = "INSERT INTO `banner`(`banner_heading`, `banner_subheading`, `banner_desc`, `banner_image`) VALUES ('$heading','$subheading','$desc','$imageNewName')";
        $excute_query = mysqli_query($con, $query);
    
        
        if($excute_query){
            move_uploaded_file($temp_name,'../admin/uploads/banners/'.$imageNewName);
        
            $_SESSION['banner_success'] = "Banner Added has been successfully.";
        }else{
            $_SESSION['banner_error'] = "Something Went Wrong!";
        }
    }


}

// get Banner
function getBanners(){
    global $con;
    $query = "SELECT * FROM `banner`";
    $excute_query = mysqli_query($con, $query);
    return $excute_query;
}

// Get actiev Banner
function getActiveSlider(){
    global $con;
    $query = "SELECT * FROM `banner` WHERE `status` = 1";
    $excute_query = mysqli_query($con, $query);
    return $excute_query;
}


// Delete Banner
function deleteBanner($id){
    global $con;
    $select = "SELECT * FROM `banner` WHERE `id` = '$id'";
    $select_result = mysqli_query($con, $select);
    $select_result_fetch = mysqli_fetch_assoc($select_result);

    if($select_result_fetch['banner_image']){
        $path = '../admin/uploads/banners/'.$select_result_fetch['banner_image'];
        unlink($path);
    }

    $query = "DELETE FROM `banner` WHERE `id` = '$id'";
    $excute_query = mysqli_query($con, $query);
    if($excute_query){
       $_SESSION['banner_delete_success'] = '';
       header('location: banner-slider.php');
    }else{
        $_SESSION['banner_delete_error'] = '';
    }
}

function updateBanner($request, $id){
    global $con;

    $heading = mysqli_real_escape_string($con,$request['banner_heading']);
    $subheading = mysqli_real_escape_string($con,$request['banner_subheading']);
    $desc = mysqli_real_escape_string($con,$request['banner_desc']);
    
    if($_FILES['banner_image']['name'] != ''){
        $bannerImage = $_FILES['banner_image']['name'];
        $temp_name = $_FILES['banner_image']['tmp_name'];
        $explode = explode('.',$bannerImage);
        $end = end($explode);
        $imageNewName = date('Ydmhis').'.'.$end;

        if($end === 'jpeg' || $end === 'jpg' || $end === 'png'){
            
            $select = "SELECT * FROM `banner` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['banner_image']){
                $path = '../admin/uploads/banners/'.$select_result_fetch['banner_image'];
                unlink($path);
            }
    
            $update = "UPDATE `banner` SET `banner_heading` = '$heading', `banner_subheading` = '$subheading', `banner_desc` = '$desc', `banner_image` = '$imageNewName' WHERE `id` = '$id'";
            $excute_update_query = mysqli_query($con, $update);
            if($excute_update_query){
                $newPath = '../admin/uploads/banners/'.$imageNewName;
                move_uploaded_file($temp_name,$newPath);
                $_SESSION['banner_success'] = '';
            }else{
                $_SESSION['banner_error'] = '';
            }
        }else{
            $_SESSION['banner_error'] = '';

        }


    }else{
        $update2 = "UPDATE `banner` SET `banner_heading` = '$heading', `banner_subheading` = '$subheading', `banner_desc` = '$desc' WHERE `id` = '$id'";
        $excute_update_query2 = mysqli_query($con, $update2);
        if($excute_update_query2){
            $_SESSION['banner_success'] = '';
        }else{
            $_SESSION['banner_error'] = '';
        }
    }
}

function bulkOperation($request){
    // print_r($request);
    // die();
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

            $select = "SELECT * FROM `banner` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['banner_image']){
                $path = '../admin/uploads/banners/'.$select_result_fetch['banner_image'];
                unlink($path);
            }

            $sql = "DELETE FROM `banner` WHERE `id`=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['bulk_delete'] = '';
            }
        }
    }else if($bulk_options === 'active'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `banner` SET `status`= 1 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['bulk_active'] = '';
            }
        }
        
    }else if($bulk_options === 'deactive'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `banner` SET `status`= 0 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['bulk_dactive'] = '';
            }
        }
    }
}

