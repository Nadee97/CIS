<?php

//login class

class login { //class name login
    //verify username and password

    function validatelogin($uname, $pass) {      //create a function to  pass parameters  //check login details
        $con = $GLOBALS['con'];                  //To get connectiion string
        //sql query to match username and password with database 
        $sql = "SELECT * FROM login l, user u, role r WHERE u.user_id=l.user_id AND u.role_id=r.role_id AND l.user_name='$uname' AND l.user_pwd='$pass'";
        $result = $con->query($sql);
        return $result;
        
    }
    // to check user active status
     function checkStatus($uname, $pass){ 
        $con=$GLOBALS['con'];  //To get connectiion string
        //sql query to match username and password as well as retrive user details and role values
        $sql="SELECT * FROM login l, user u, role r WHERE u.user_id=l.user_id AND u.role_id=r.role_id AND l.user_name='$uname' AND l.user_pwd='$pass' AND u.user_status='active'";
        $result=$con->query($sql);
        return $result;
        
    }
    
 // to add the new username and password to the login table
    function addlogin($new_u_name,$pwd,$user_id){ // Add a new login
        $con=$GLOBALS['con'];
        $sql="INSERT INTO login VALUES('','$new_u_name','$pwd','$user_id')";
        $result=$con->query($sql);
        return $result;
    }
}

class log {

    function insertLog($log_ip, $user_id) { //for login and tracking user 
        $con = $GLOBALS['con']; 
        $sql = "INSERT INTO log VALUES('',NOW(),'','$log_ip','in','$user_id')";
        $result = $con->query($sql);
        $log_id = $con->insert_id;
        return $log_id;
    }

    function updateLog($log_id) { //to update the log table
        $con = $GLOBALS['con']; 
        $sql = "UPDATE LOG SET logout_time=NOW(),login_status='out' WHERE log_id='$log_id' ";
        $result = $con->query($sql);
        return $result;
    }

}

class module {

    function getModule($role_id) { // to check available modules for particular user
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM module_role  WHERE role_id='$role_id'";
        $result = $con->query($sql);
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row['module_id']);
        }
        return $arr;
    }
}
   


?>