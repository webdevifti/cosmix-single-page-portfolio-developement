<?php


function getSiteInfo(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `site_information`");
    return mysqli_fetch_assoc($result);
}

function updateSiteInfo($request){
    global $con;
    $id = $request['id'];
  $site_description = mysqli_real_escape_string($con, $request['site_description']);
  $site_keywords = mysqli_real_escape_string($con, $request['site_keywords']);

  $update = mysqli_query($con, "UPDATE `site_information` SET `site_description` = '$site_description', `site_keywords` = '$site_keywords' WHERE `id` = '$id'");
  if($update){
      $_SESSION['content_up'] = '';
  }else {
      $_SESSION['site_up_err'] = '';
  }
}

function uploadSiteLogo($request){
    global $con;
 
    $id = $request['id'];
    if($_FILES['site_logo']['name'] != ''){
        $featureImage = $_FILES['site_logo']['name'];
        $temp_name = $_FILES['site_logo']['tmp_name'];
        $explode = explode('.',$featureImage);
        $end = end($explode);
        $imageNewName = 'site_logo_'.date('Ydmhis').'.'.$end;
    
        if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){

            $select = "SELECT * FROM `site_information` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['site_logo']){
                $path = '../admin/uploads/sites/'.$select_result_fetch['site_logo'];
                unlink($path);
            }

            $update = mysqli_query($con, "UPDATE `site_information` SET `site_logo` = '$imageNewName' WHERE `id` ='$id'");
            if($update){
                $path = '../admin/uploads/sites/'.$imageNewName;
                move_uploaded_file($temp_name, $path);
                $_SESSION['site_up_logo'] = '';
            }else{
                $_SESSION['site_up_err'] = '';
            }

        }else{
            $_SESSION['site_up_err'] = '';
        }

    }else {
        $_SESSION['site_up_err'] = '';
    }
}

function uploadSiteIcon($request){
    global $con;
 
    $id = $request['id'];
    if($_FILES['site_icon']['name'] != ''){
        $featureImage = $_FILES['site_icon']['name'];
        $temp_name = $_FILES['site_icon']['tmp_name'];
        $explode = explode('.',$featureImage);
        $end = end($explode);
        $imageNewName = 'site_icon_'.date('Ydmhis').'.'.$end;
    
        if($end === 'jpeg' || $end === 'png' || $end === 'jpg'){

            $select = "SELECT * FROM `site_information` WHERE `id` = '$id'";
            $select_result = mysqli_query($con, $select);
            $select_result_fetch = mysqli_fetch_assoc($select_result);
        
            if($select_result_fetch['site_icon']){
                $path = '../admin/uploads/sites/'.$select_result_fetch['site_icon'];
                unlink($path);
            }

            $update = mysqli_query($con, "UPDATE `site_information` SET `site_icon` = '$imageNewName' WHERE `id` ='$id'");
            if($update){
                $path = '../admin/uploads/sites/'.$imageNewName;
                move_uploaded_file($temp_name, $path);
                $_SESSION['site_up_icon'] = '';
            }else{
                $_SESSION['site_up_err'] = '';
            }

        }else{
            $_SESSION['site_up_err'] = '';
        }

    }else {
        $_SESSION['site_up_err'] = '';
    }
}

function getLoggedInUserData($email){
    global $con;

    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $excute_query = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($excute_query);
    return $result;
   
}

function getLoggedUserId(){
    global $con;
    $logged_user_email = $_SESSION['USEREMAIL'];
    $query = "SELECT * FROM `users` WHERE `email` = '$logged_user_email'";
    $excute_query = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($excute_query);
    return $result['id'];
}


function getFunFact(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `fun_facts`");
   
    $data = mysqli_fetch_assoc($result);
    return $data;
    
}
function updateFunFact($request){
    global $con;
    $id = mysqli_real_escape_string($con, $request['id']);
    $clients = mysqli_real_escape_string($con, $request['clients']);
    $projects = mysqli_real_escape_string($con, $request['projects']);
    $coffees = mysqli_real_escape_string($con, $request['coffees']);
    $linesofcode = mysqli_real_escape_string($con, $request['linesofcode']);

    $query = mysqli_query($con, "UPDATE `fun_facts` SET `client_number`='$clients',`completed_project`='$projects',`cups_of_coffee`='$coffees',`line_of_code`='$linesofcode' WHERE `id`= '$id'");
    if($query){
        $_SESSION['fun_facts'] = '';
    }else{
        $_SESSION['fun_facts_eror'] = '';
    }

}


function getAddressInfo(){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `contact_address`");
   
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function updateInfo($request){
    global $con;
    $id = mysqli_real_escape_string($con, $request['id']);
    $address = mysqli_real_escape_string($con, $request['address']);
    $mail = mysqli_real_escape_string($con, $request['mail']);
    $phone = mysqli_real_escape_string($con, $request['phone']);
    $website = mysqli_real_escape_string($con, $request['website']);

    $query = mysqli_query($con, "UPDATE `contact_address` SET  `address`='$address',`mail_address`='$mail',`contact_phone`='$phone',`website`='$website' WHERE `id`= '$id'");
    if($query){
        $_SESSION['contact_address'] = '';
    }else{
        $_SESSION['contact_address_eror'] = '';
    }
}