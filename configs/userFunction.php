<?php 

function addUser($request){
    // echo "<pre>";
    // print_r($request);
    // die();
    global $con;

    $fullname = mysqli_real_escape_string($con, $request['fullname']);
    $username = mysqli_real_escape_string($con, $request['username']);
    $email = mysqli_real_escape_string($con, $request['email']);
    $phone = mysqli_real_escape_string($con, $request['phone']);
    $role = mysqli_real_escape_string($con, $request['role']);
    $password = mysqli_real_escape_string($con, $request['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $status = mysqli_real_escape_string($con, $request['status']);

    $userImage = $_FILES['user_image']['name'];
    $temp_name = $_FILES['user_image']['tmp_name'];
    $explode = explode('.',$userImage);
    $end = end($explode);
    $imageNewName = 'user_'.date('Ydmhis').'.'.$end; 
    // echo $imageSize;
    // die();

    if(empty($fullname)){
        $_SESSION['fullname_required'] = 'Fullname is required!';
    }else if(empty($username)){
        $_SESSION['username_required'] = 'Username is required!';
    }else if(empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['email_required'] = 'Email is required!';
    }else if(empty($phone)){
        $_SESSION['phone_required'] = "Phone Number is required!";
    }else if(empty($role)){
        $_SESSION['role_required'] = 'Role is required!';
    }else if(empty($password)){
        $_SESSION['password_required'] = 'Password is required!';
    }else if($userImage == ''){
        $_SESSION['bi_required'] = 'Image Required!';
    }else if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){
        $checkUserExistance = "SELECT `email`, `phone_number`,`username` FROM `users` WHERE `username` = '$username' OR `email` = '$email'";
        $r = mysqli_query($con, $checkUserExistance);
        $re = mysqli_fetch_assoc($r);
        if($re['email'] == $email){
            $_SESSION['email_exist_error'] = "Email Already exists.";
        }else if($re['phone_number'] == $phone){
            $_SESSION['phone_exist_error'] = "Phone Number already exists";
        }else if($re['username'] == $username){
            $_SESSION['username_exist_error'] = "Username already exists.";
        }else{

            $query = "INSERT INTO `users`(`full_name`, `username`, `email`, `password`, `role`, `status`, `photo`, `phone_number`) VALUES ('$fullname','$username','$email','$password_hash','$role','$status','$imageNewName','$phone')";
            $excute_query = mysqli_query($con, $query);
            if($excute_query){
                move_uploaded_file($temp_name,'../admin/uploads/users/'.$imageNewName);
            
                $_SESSION['user_success'] = "";
            }else{
                $_SESSION['user_error'] = "";
            }
        }

    }else {
        $_SESSION['image_type_error'] = "Image type must be jpeg, jpg and png";
    }
}
function getUsers(){
    global $con;
    $query = "SELECT * FROM `users` WHERE NOT `role` = 'admin'";
    $excute_query = mysqli_query($con, $query);
    return $excute_query;
}

function deleteUser($id,$email){
    global $con;
    $select = "SELECT * FROM `users` WHERE `id` = '$id'";
    $select_result = mysqli_query($con, $select);
    $select_result_fetch = mysqli_fetch_assoc($select_result);

    $select2 = "SELECT * FROM `users` WHERE `email` = '$email'";
    $select_result2 = mysqli_query($con, $select2);
    $select_result_fetch2 = mysqli_fetch_assoc($select_result2);
    if($select_result_fetch['id'] == $select_result_fetch2['id']){
        $_SESSION['suicide'] = '';
        header('location: users.php');
    }else{

        if($select_result_fetch['photo']){
            $path = '../admin/uploads/users/'.$select_result_fetch['photo'];
            unlink($path);
        }
    
        $query = "DELETE FROM `users` WHERE `id` = '$id'";
        $excute_query = mysqli_query($con, $query);
        if($excute_query){
           $_SESSION['user_delete_success'] = '';
           header('location: users.php');
        }else{
            $_SESSION['user_delete_error'] = '';
        }
    }

}

function userBulkOperation($request){
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

            $select = "SELECT * FROM `users` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['photo']){
                $path = '../admin/uploads/users/'.$select_result_fetch['photo'];
                unlink($path);
            }

            $sql = "DELETE FROM `users` WHERE `id`=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['user_delete'] = '';
            }
        }
    }else if($bulk_options === 'active'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `users` SET `status`= 1 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['user_active'] = '';
            }
        }
        
    }else if($bulk_options === 'deactive'){
        foreach ($selected_ids as $key => $selected_id) {
            $id = intval($selected_id);
        
            $sql = "UPDATE `users` SET `status`= 0 WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if ($result) {
                $_SESSION['user_deactive'] = '';
            }
        }
    }
}