<?php

function updateProfile($request){
    global $con;
    $id = mysqli_real_escape_string($con, $request['id']);
    $fullname = mysqli_real_escape_string($con, $request['fullname']);
    $username = mysqli_real_escape_string($con, $request['username']);
    $email = mysqli_real_escape_string($con, $request['email']);
    $phone = mysqli_real_escape_string($con, $request['phone_number']);

    if($_FILES['user_image']['name'] != ''){
        $userImage = $_FILES['user_image']['name'];
        $temp_name = $_FILES['user_image']['tmp_name'];
        $explode = explode('.',$userImage);
        $end = end($explode);
        $imageNewName = 'user_'.date('Ydmhis').'.'.$end;

        if($end === 'jpeg' || $end === 'jpg' || $end === 'png'){
            
            $select = "SELECT * FROM `users` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['photo']){
                $path = '../admin/uploads/users/'.$select_result_fetch['photo'];
                unlink($path);
            }
    
            $update = "UPDATE `users` SET `full_name` = '$fullname',`username` = '$username',`email` = '$email',`phone_number` = '$phone', `photo` = '$imageNewName' WHERE `id` = '$id'";
            $excute_update_query = mysqli_query($con, $update);
            if($excute_update_query){
                $newPath = '../admin/uploads/users/'.$imageNewName;
                move_uploaded_file($temp_name,$newPath);
                $_SESSION['user_success'] = '';
            }else{
                $_SESSION['user_error'] = '';
            }
        }else{
            $_SESSION['user_error'] = '';

        }


    }else{
        $update2 = "UPDATE `users` SET `full_name` = '$fullname',`username` = '$username',`email` = '$email',`phone_number` = '$phone' WHERE `id` = '$id'";
        $excute_update_query2 = mysqli_query($con, $update2);
        if($excute_update_query2){
            $_SESSION['user_success'] = '';
        }else{
            $_SESSION['user_error'] = '';
        }
    }
}

function changePassword($request){
    global $con;
    $id = mysqli_real_escape_string($con, $request['id']);
    $current_password = mysqli_real_escape_string($con, $request['current_password']);
    $new_password = mysqli_real_escape_string($con, $request['new_password']);
    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    if(empty($id)){
        $_SESSION['er'] = '';
    }else if(empty($current_password)){
        $_SESSION['c_p_r'] = "Required";
    }else if(empty($new_password)){
        $_SESSION['n_p_r'] = "Required";
    }else {
        $select_password = "SELECT `password` FROM `users` WHERE `id` = '$id'";
        $select_password_excute = mysqli_query($con, $select_password);
        $password_result = mysqli_fetch_assoc($select_password_excute);
    
        if(password_verify($current_password,$password_result['password'])){
    
            $query = "UPDATE `users` SET `password` = '$password_hash' WHERE `id` = '$id'";
            $excute = mysqli_query($con,$query);
            if($excute){
                $_SESSION['password_changed'] = '';
            }
        }else{
            $_SESSION['current_password_not_match'] = '';
        }
    }


}