<?php 

function addPortfolio($request){
    global $con;
    $title = mysqli_real_escape_string($con,$request['title']);
    $p_category = mysqli_real_escape_string($con,$request['p_category']);
    $p_desc = mysqli_real_escape_string($con,$request['p_desc']);

    $portfolioImage = $_FILES['portfolio_image']['name'];
    $temp_name = $_FILES['portfolio_image']['tmp_name'];
    $explode = explode('.',$portfolioImage);
    $end = end($explode);
    $imageNewName = date('Ydmhis').'.'.$end;

    if(empty($title)){
        $_SESSION['pt_required'] = 'Heading Required!';
    }else if(empty($p_category)){
        $_SESSION['pc_required'] = 'Sub Heading Required!';
    }else if(empty($p_desc)){
        $_SESSION['psd_required'] = "Description Required!";
    }else if($portfolioImage == ''){
        $_SESSION['bi_required'] = 'Image Required!';
    }else if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){

        $userID = getLoggedUserId();

        $query = "INSERT INTO `portfolio_section`(`portfolio_category`, `portfolio_image`, `title`, `short_desc`,`user_id`) VALUES ('$p_category','$imageNewName','$title','$p_desc','$userID')";
        $excute_query = mysqli_query($con, $query);
        if($excute_query){
            move_uploaded_file($temp_name,'../admin/uploads/portfolio/'.$imageNewName);
        
            $_SESSION['p_success'] = "Portfolio Added has been successfully.";
        }else{
            $_SESSION['p_error'] = "Something Went Wrong!";
        }
    }else {
        $_SESSION['image_type_error'] = "Image type must be jpeg, jpg and png";
    }

}

function getPortfolio(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `portfolio_section` ORDER BY `created_at` DESC");
    return $result;
}

function getActivePortfolio(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `portfolio_section` WHERE `status` = 1 ORDER BY `created_at` DESC LIMIT 9");
    return $result;
}

function getActivePortfolioCategories(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `portfolio_section` WHERE `status` = 1 GROUP BY `portfolio_category`");
    return $result;
}

function portfolioBulkOperation($request){
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

            $select = "SELECT * FROM `portfolio_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['portfolio_image']){
                $path = '../admin/uploads/portfolio/'.$select_result_fetch['portfolio_image'];
                unlink($path);
            }

            $sql = "DELETE FROM `portfolio_section` WHERE `id`=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['p_delete'] = '';
            }
        }
    }else if($bulk_options === 'active'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `portfolio_section` SET `status`= 1 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['p_active'] = '';
            }
        }
        
    }else if($bulk_options === 'deactive'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `portfolio_section` SET `status`= 0 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['p_dactive'] = '';
            }
        }
    }
}


function updatePortfolio($request, $id){
    global $con;

    $title = mysqli_real_escape_string($con,$request['title']);
    $p_category = mysqli_real_escape_string($con,$request['p_category']);
    $p_desc = mysqli_real_escape_string($con,$request['p_desc']);
    
    if($_FILES['portfolio_image']['name'] != ''){
        $pImage = $_FILES['portfolio_image']['name'];
        $temp_name = $_FILES['portfolio_image']['tmp_name'];
        $explode = explode('.',$pImage);
        $end = end($explode);
        $imageNewName = date('Ydmhis').'.'.$end;

        if($end === 'jpeg' || $end === 'jpg' || $end === 'png'){
            
            $select = "SELECT * FROM `portfolio_section` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['portfolio_image']){
                $path = '../admin/uploads/portfolio/'.$select_result_fetch['portfolio_image'];
                unlink($path);
            }
    
            $update = "UPDATE `portfolio_section` SET  `portfolio_category`='$p_category',`portfolio_image`='$imageNewName',`title`='$title',`short_desc`='$p_desc' WHERE `id` = '$id'";
            $excute_update_query = mysqli_query($con, $update);
            if($excute_update_query){
                $newPath = '../admin/uploads/portfolio/'.$imageNewName;
                move_uploaded_file($temp_name,$newPath);
                $_SESSION['portfolio_success'] = '';
            }else{
                $_SESSION['portfolio_error'] = '';
            }
        }else{
            $_SESSION['portfolio_error'] = '';

        }


    }else{
        $update2 = "UPDATE `portfolio_section` SET `portfolio_category`='$p_category',`title`='$title',`short_desc`='$p_desc' WHERE `id` = '$id'";
        $excute_update_query2 = mysqli_query($con, $update2);
        if($excute_update_query2){
            $_SESSION['portfolio_success'] = '';
        }else{
            $_SESSION['portfolio_error'] = '';
        }
    }
}


function deletePortfolio($id){
    global $con;
    $select = "SELECT * FROM `portfolio_section` WHERE `id` = '$id'";
    $select_result = mysqli_query($con, $select);
    $select_result_fetch = mysqli_fetch_assoc($select_result);

    if($select_result_fetch['portfolio_image']){
        $path = '../admin/uploads/portfolio/'.$select_result_fetch['portfolio_image'];
        unlink($path);
    }

    $query = "DELETE FROM `portfolio_section` WHERE `id` = '$id'";
    $excute_query = mysqli_query($con, $query);
    if($excute_query){
       $_SESSION['p_delete_success'] = '';
       header('location: portfolio.php');
    }else{
        $_SESSION['p_delete_error'] = '';
    }
}