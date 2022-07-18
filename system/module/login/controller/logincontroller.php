<?php

//Start the session
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set("Asia/Colombo"); //To change time zone
//
//Login Controller
//Server Side Include - to include a file

include '../../../common/dbconnection.php';
include '../model/loginmodel.php';

echo $uname = trim($_POST['uname']); //using trim to neglect garbage data
echo $passn = $_POST['pass'];
echo $pass = sha1($passn);   //encrypting password with sha1 method
//server side validation

if ($uname == "" OR $passn == "") {

    $msg = "Username/Password OR Both Fields Are Empty";
    $msg = base64_encode($msg);  //encoding the message
    header("location:../view/login.php?msg=$msg");  //redirecting to the login page
} else {

    $obj = new login(); //To creare object using login class
    $result = $obj->validatelogin($uname, $pass); //To call a function with the parameters
    echo $nor = $result->num_rows;

    if ($nor == 0) {
        $msg = "Please Cheack Your Credentials Again";
        $msg = base64_encode($msg); //To encode the message
        // Redirecting and passing message data through URL
        header("Location:../view/login.php?msg=$msg");
    } else {
       
            $obj=new login(); //To creare object using login class
            $result=$obj->checkStatus($uname, $pass); //To call a function with the parameters
            echo $nor=$result->num_rows;
    
            if($nor==0){
             $msg="This User Account Is Disabled. Please Contact An Admin";
             $msg= base64_encode($msg); //To encode the message
             header("Location:../view/login.php?msg=$msg");
             
            }else{

             $rowuser = $result->fetch_assoc();
             $role_id=$rowuser['role_id'];
             $obja=new module();
             $rowmodule=$obja->getModule($role_id);

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

        $objlog = new log();

        $log_id = $objlog->insertLog($log_ip, $rowuser['user_id']);

//create a session and store the user data for continue
            $_SESSION['rowcisuser'] = $rowuser;
            $_SESSION['rowcislog'] = $log_id;
             $_SESSION['rowcismodule'] = $rowmodule;
            header("Location:../view/dashboard.php");
        }
    }
}
?>