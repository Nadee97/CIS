<?php

class user{ 
    
    function displayAllUsers(){ //creating a function with no parameters
        $con=$GLOBALS['con'];   //to get connection string
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id ORDER BY u.user_id DESC";
        $result=$con->query($sql);
        return $result;
         
    }
    //To add a new user to the user table
    function addUser($emp_id,$user_f_name,$user_l_name,$nic,$dob,$user_tel,$user_email,$address,$new_image,$user_title,$gender,$role_id,$created_user_id){
        $con=$GLOBALS['con'];  
        $sql="INSERT INTO user VALUES('','$emp_id','$user_f_name','$user_l_name','$nic','$dob','$user_tel','$user_email','$address','$new_image','active','$user_title','$gender','$role_id',NOW(),'$created_user_id')";
        $result=$con->query($sql);
        $user_id=$con->insert_id;
        return $user_id;
    } 
    
    function checkEmail($user_email){ // creating a function to check duplicate email addresses
        $con=$GLOBALS['con']; 
        $sql="SELECT * FROM user WHERE user_email='$user_email'";
        $result=$con->query($sql);
        return $result;
    }
    
    function checkNic($nic){ // creating a function to check duplicate Nic
        $con=$GLOBALS['con']; 
        $sql="SELECT * FROM user WHERE user_nic='$nic'";
        $result=$con->query($sql);
        return $result;
     
    } //get current user data from user table to show in update user page
    function updDisplayUsers($update_user_id){
        $con=$GLOBALS['con'];  
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id AND u.user_id='$update_user_id'";
        $result=$con->query($sql);
        return $result;
    }
    //creating a function to check user privilleges and display relevent functions
    function displayUserFunc($user_id,$fun_id){
        $con=$GLOBALS['con'];  
        $sql="SELECT * FROM user_privileges WHERE user_id='$user_id' AND fun_id='$fun_id'";
        $result=$con->query($sql);
        return $result;
        
    }
    // update user with new data
    function updateUserData($update_user_id,$emp_id,$user_f_name,$user_l_name,$nic,$dob,$user_tel,$user_email,$address,$user_title,$gender,$role_id){
         $con=$GLOBALS['con'];
         $sql="UPDATE user SET emp_id='$emp_id',user_f_name='$user_f_name',user_l_name='$user_l_name',user_nic='$nic',user_dob='$dob',user_tel='$user_tel',user_email='$user_email',user_address='$address',user_title='$user_title',user_gender='$gender',role_id='$role_id' WHERE user_id='$update_user_id'";
         $result=$con->query($sql);
         return $result;
         
     } 
     // to update user image
     function updateUserImage($update_user_id,$new_image){
        $con=$GLOBALS['con'];
        $sql="UPDATE user SET user_image='$new_image' WHERE user_id='$update_user_id'";
        $result=$con->query($sql);
        return $result;
    }
        //deactivate user
    function deactivateUser($dec_user_id){
         $con=$GLOBALS['con'];
         $sql="UPDATE user SET user_status='deactive' WHERE user_id='$dec_user_id'";
         $result=$con->query($sql);
         return $result;   
    }
    //activate user
    function activateUser($act_user_id){
         $con=$GLOBALS['con'];
         $sql="UPDATE user SET user_status='active' WHERE user_id='$act_user_id'";
         $result=$con->query($sql);
         return $result;   
    }
    //add privileges to the user
   function addPrivileges($e,$user_id){
         $con=$GLOBALS['con'];
         $sql="INSERT INTO user_privileges VALUES('$e','$user_id')";
         $result=$con->query($sql);
         return $result; 
         
        }
       // delete current user privileges from the table
    function deletePrivileges($update_user_id){
         $con=$GLOBALS['con'];
         $sql="DELETE FROM user_privileges WHERE user_id=$update_user_id";
         $result=$con->query($sql);
         return $result; 
        } 
        
     function searchUsers($keyword) { //to display results in search user page
         $con=$GLOBALS['con']; 
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id AND (user_f_name LIKE '%$keyword%' OR user_l_name LIKE '%$keyword%' OR user_email LIKE '%$keyword%' OR r.role_name LIKE '%$keyword%' OR user_tel LIKE '%$keyword%') ORDER BY u.user_id DESC";
        $result=$con->query($sql);
        return $result;
        
    }
}    
?>