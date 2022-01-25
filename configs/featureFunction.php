<?php

function addFeature($request){
    global $con;
    $f_category = mysqli_real_escape_string($con, $request['f_category']);
    $f_category_icons = mysqli_real_escape_string($con, $request['f_category_icons']);
    $feature_description = mysqli_real_escape_string($con, $request['feature_description']);

    if(empty($f_category)){
        $_SESSION['f_required'] = 'Required!';
    }else if(empty($f_category_icons)){
        $_SESSION['f_i_r'] = "Required!";
    }else if(empty($feature_description)){
        $_SESSION['f_d'] = "Required!";
    }else{

        if($_FILES['feature_image']['name'] != ''){
            $featureImage = $_FILES['feature_image']['name'];
            $temp_name = $_FILES['feature_image']['tmp_name'];
            $explode = explode('.',$featureImage);
            $end = end($explode);
            $imageNewName = date('Ydmhis').'.'.$end;
        
            $imageType = $_FILES['feature_image']['type'];
            $imageSize = $_FILES['feature_image']['size'];
            if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){
    
                // $select = "SELECT * FROM `about_section` WHERE `id` = '$id'";
                // $select_result = mysqli_query($con, $select);
                // $select_result_fetch = mysqli_fetch_assoc($select_result);
            
                // if($select_result_fetch['about_feature_image']){
                //     $path = '../admin/uploads/about/'.$select_result_fetch['about_feature_image'];
                //     unlink($path);
                // }
                $userID = getLoggedUserId();
                $insert = mysqli_query($con, "INSERT INTO `feature_section`(`feature_category`, `feature_description`, `feature_tab_icons`, `feature_image`,`user_id`) VALUES ('$f_category','$feature_description','$f_category_icons','$imageNewName','$userID')");

                if($insert){
                    $path = '../admin/uploads/features/'.$imageNewName;
                    move_uploaded_file($temp_name, $path);
                    header('location: add-feature.php');
    
                }else{
                    $_SESSION['fe_up_err'] = '';
                }
    
            }else{
                $_SESSION['f_up_err'] = '';
            }
    
        }else {
            $_SESSION['f_up_err'] = '';
        }
    }

}

function getFeatures(){
    global $con;
    $query = mysqli_query($con, "SELECT * FROM `feature_section`");
     return $query;
}
function getFeatureData(){
    global $con;
    $query = mysqli_query($con, "SELECT * FROM `feature_section` WHERE `status`= 1");
     return $query;
}
function getFeatureTabClass(){
    global $con;
    $query = mysqli_query($con, "SELECT `id`,`feature_tab_icons` FROM `feature_section` WHERE `status`= 1");
     return $query;

}
function deleteFeature($id){
    global $con;
    $select = "SELECT * FROM `feature_section` WHERE `id` = '$id'";
    $select_result = mysqli_query($con, $select);
    $select_result_fetch = mysqli_fetch_assoc($select_result);

    if($select_result_fetch['feature_image']){
        $path = '../admin/uploads/features/'.$select_result_fetch['feature_image'];
        unlink($path);
    }

    $query = "DELETE FROM `feature_section` WHERE `id` = '$id'";
    $excute_query = mysqli_query($con, $query);
    if($excute_query){
       $_SESSION['feature_delete_success'] = '';
       header('location: add-feature.php');
    }else{
        $_SESSION['feature_delete_error'] = '';
    }
}

function updateFeature($request, $id){
    // print_r($request);
    // die();
    global $con;
    $f_category = mysqli_real_escape_string($con, $request['feature_category']);
    $f_icon = mysqli_real_escape_string($con, $request['fbi']);
    $f_desc = mysqli_real_escape_string($con, $request['feature_desc']);

    if($_FILES['feature_image']['name'] != ''){
        $bannerImage = $_FILES['feature_image']['name'];
        $temp_name = $_FILES['feature_image']['tmp_name'];
        $explode = explode('.',$bannerImage);
        $end = end($explode);
        $imageNewName = date('Ydmhis').'.'.$end;

        if($end === 'jpeg' || $end === 'jpg' || $end === 'png'){
            
            $select = "SELECT `feature_image` FROM `feature_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['feature_image']){
                $path = '../admin/uploads/features/'.$select_result_fetch['feature_image'];
                unlink($path);
            }
    
            $update = "UPDATE `feature_section` SET `feature_category`='$f_category',`feature_description`='$f_desc',`feature_tab_icons`='$f_icon',`feature_image`='$imageNewName' WHERE `id` = '$id'";
            $excute_update_query = mysqli_query($con, $update);
            if($excute_update_query){
                $newPath = '../admin/uploads/features/'.$imageNewName;
                move_uploaded_file($temp_name,$newPath);
                $_SESSION['feature_success'] = '';
            }else{
                $_SESSION['feature_error'] = '';
            }
        }else{
            $_SESSION['feature_error'] = '';

        }


    }else{
        $update2 = "UPDATE `feature_section` SET `feature_category`='$f_category',`feature_description`='$f_desc',`feature_tab_icons`='$f_icon' WHERE `id` = '$id'";
        $excute_update_query2 = mysqli_query($con, $update2);
        if($excute_update_query2){
            $_SESSION['feature_success'] = '';
        }else{
            $_SESSION['feature_error'] = '';
        }
    }


}


function featureBulkOperation($request){
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

            $select = "SELECT * FROM `feature_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['feature_image']){
                $path = '../admin/uploads/features/'.$select_result_fetch['feature_image'];
                unlink($path);
            }

            $sql = "DELETE FROM `feature_section` WHERE `id`=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['bulk_delete'] = '';
            }
        }
    }else if($bulk_options === 'active'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `feature_section` SET `status`= 1 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['bulk_active'] = '';
            }
        }
        
    }else if($bulk_options === 'deactive'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `feature_section` SET `status`= 0 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['bulk_dactive'] = '';
            }
        }
    }
}