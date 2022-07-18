<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../../../common/session.php'; //To call session page
include '../../../common/dbconnection.php';
include '../../../common/commonQuery.php';
include '../../user/model/usermodel.php';
include '../../../common/logincheck.php';
include '../../login/model/loginmodel.php';
$objcq = new commonQuery();

$objuser = new user();

echo $status = trim($_REQUEST['status']);

//To get remote ip address - http://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
function get_ip_address() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = "UNKNOWN";
    }
    return $ipaddress;
}

$log_ip = get_ip_address();

switch ($status) {

    case 'Add';

        $emp_id = $_POST['emp_id'];
        $user_f_name = $_POST['user_f_name'];
        $user_l_name = $_POST['user_l_name'];
        $user_email = $_POST['user_email'];
        $user_title = $_POST['user_title'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $nic = $_POST['nic'];
        $user_tel = $_POST['user_tel'];
        $address= $_POST['user_address'];
        $role_id = $_POST['role_id'];
        $user_image = $_POST['user_image'];
        $created_user_id = $rowuser['user_id'];
        
        if ($_FILES['user_image']['name'] != "") {
            $user_image=$_FILES['user_image']['name'];
            $user_location=$_FILES['user_image']['tmp_name'];
            $new_image=time()."_".$user_image;
        } else {
            $new_image="";
        }
         
        $ue=$objuser->checkEmail($user_email);
        $uer=$ue->num_rows;
        $un=$objuser->checkNic($nic);
        $unr=$un->num_rows;
        
        if($uer==0 AND $unr==0){

       $user_id= $objuser->addUser($emp_id, $user_f_name, $user_l_name, $nic, $dob, $user_tel, $user_email, $address, $new_image, $user_title, $gender, $role_id, $created_user_id);
       
        $new_u_name=("cis"."$emp_id");
        $pwd=sha1($nic);
        
        $objlogin=new login();
        $objlogin->addlogin($new_u_name,$pwd,$user_id);
        
        $function=$_POST['fun'];
        foreach ($function as $e){
                $objuser->addPrivileges($e, $user_id);
        }
        
        //copying user image to the local folder
        if ($new_image!="") {
            $destination="../../../images/user_images/$new_image";
            move_uploaded_file($user_location, $destination);
        }
        
        $msg = "A User has been added successfully";
        $msg = base64_encode($msg);
        header("Location:../view/user.php?msg=$msg");
        
        } elseif($uer!=0 AND $unr!=0){
            
        $msg = "Email Address And NIC Both Not Available. Please Try Again With  different Email Address and NIC";
        $msg = base64_encode($msg);
        header("Location:../view/adduser.php?msg=$msg");
   
        } elseif($uer!=0){
            
        $msg = "Email Address Is Not Available. Please Try Again With A different Email Address";
        $msg = base64_encode($msg);
        header("Location:../view/adduser.php?msg=$msg");
                 
        }elseif($unr!=0){
            
        $msg = "NIC Is Not Available. Please Try Again With A Different NIC ";
        $msg = base64_encode($msg);
        header("Location:../view/adduser.php?msg=$msg");
           
        }

        break;
        
        case 'Update';
   echo     $update_user_id = $_POST['user_id'];
   echo     $emp_id = $_POST['emp_id'];
   echo     $user_f_name = $_POST['user_f_name'];
   echo     $user_l_name = $_POST['user_l_name'];
    echo    $user_email = $_POST['user_email'];
    echo    $user_title = $_POST['user_title'];
    echo    $gender = $_POST['gender'];
    echo    $dob = $_POST['dob'];
   echo     $nic = $_POST['nic'];
   echo     $user_tel = $_POST['user_tel'];
  echo      $address= $_POST['user_address'];
    echo    $role_id = $_POST['role_id'];
    echo    $user_image = $_POST['user_image'];
        
        if ($_FILES['user_image']['name'] != "") {
            $user_image=$_FILES['user_image']['name'];
            $user_location=$_FILES['user_image']['tmp_name'];
            $new_image=time()."_".$user_image;
        } else {
            $new_image="";
        }
        

        $objuser->updateUserData($update_user_id, $emp_id, $user_f_name, $user_l_name, $nic, $dob, $user_tel, $user_email, $address, $user_title, $gender, $role_id,);
        
        $objuser->deletePrivileges($update_user_id);
        $function=$_POST['fun'];
        foreach ($function as $e){
                $objuser->addPrivileges($e, $update_user_id);
        }
        
        //adding new user image into the user_images folder
       if($new_image!=""){
           $destination="../../../images/user_images/$new_image";
           move_uploaded_file($user_location,$destination);
           $objuser->updateUserImage($update_user_id,$new_image);
       }
        
        $msg = "A User has been updated successfully";
        $msg = base64_encode($msg);
        header("Location:../view/user.php?msg=$msg");

        break;
        
    case 'View':
     echo $view_user_id=$_REQUEST['user_id'];
     header("Location:../view/viewuser.php?view_user_id=$view_user_id");
        
     break;   
 
     case 'Deactivate': 
         echo $dec_user_id=$_REQUEST['user_id'];
        
        $objuser->deactivateUser($dec_user_id);
        $msg="A User has been Deactivated successfully";
        $msg=base64_encode($msg);
        $status=1;
        header("Location:../view/user.php?msg=$msg&status=$status");
        
        break;
    
     case 'Activate': 
         echo $act_user_id=$_REQUEST['user_id'];
        
        $objuser->activateUser($act_user_id);
        $msg="A User has been Activated successfully";
        $msg=base64_encode($msg);
        $status=1;
        header("Location:../view/user.php?msg=$msg&status=$status");
        
        break;
}
?>