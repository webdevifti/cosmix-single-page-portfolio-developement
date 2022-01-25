<?php 


function addBrand($request){
    global $con;
    $brandImage = $_FILES['brand_logo']['name'];
    $temp_name = $_FILES['brand_logo']['tmp_name'];
    $explode = explode('.',$brandImage);
    $end = end($explode);
    $imageNewName = date('Ydmhis').'.'.$end;

    if($brandImage == ''){
        $_SESSION['bir'] = 'Image Required!';
    }else if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){

        $userID = getLoggedUserId();

        $query = "INSERT INTO `brands_section`(`brand_logo`,`user_id`) VALUES ('$imageNewName','$userID')";
        $excute_query = mysqli_query($con, $query);
    
        
        if($excute_query){
            move_uploaded_file($temp_name,'../admin/uploads/brands/'.$imageNewName);
        
            $_SESSION['brands_success'] = "Brands Added has been successfully.";
        }else{
            $_SESSION['brands_error'] = "Something Went Wrong!";
        }
    }else {
        $_SESSION['image_type_error'] = "Image type must be jpeg, jpg and png";
    }
}

function getBrands(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `brands_section` ORDER BY `created_at` DESC");
    return $result;
}
function getActiveBrands(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `brands_section` WHERE `status` = 1 ORDER BY `created_at` DESC");
    return $result;
}
function deleteBrand($id){
    global $con;
    $select = "SELECT * FROM `brands_section` WHERE `id` = '$id'";
    $select_result = mysqli_query($con, $select);
    $select_result_fetch = mysqli_fetch_assoc($select_result);

    if($select_result_fetch['brand_logo']){
        $path = '../admin/uploads/brands/'.$select_result_fetch['brand_logo'];
        unlink($path);
    }

    $query = "DELETE FROM `brands_section` WHERE `id` = '$id'";
    $excute_query = mysqli_query($con, $query);
    if($excute_query){
       $_SESSION['brand_delete_success'] = '';
       ?>
        <script>window.location.href= 'brands.php';</script>   
    <?php 
    }else{
        $_SESSION['brand_delete_error'] = '';
    }
}

function brandBulkOperation($request){
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

            $select = "SELECT * FROM `brands_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['brand_logo']){
                $path = '../admin/uploads/brands/'.$select_result_fetch['brand_logo'];
                unlink($path);
            }

            $sql = "DELETE FROM `testimonial_section` WHERE `id`=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['brands_delete'] = '';
            }
        }
    }else if($bulk_options === 'active'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `brands_section` SET `status`= 1 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['brands_active'] = '';
            }
        }
        
    }else if($bulk_options === 'deactive'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `brands_section` SET `status`= 0 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['brand_deactive'] = '';
            }
        }
    }
}