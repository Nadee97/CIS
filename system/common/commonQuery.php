<?php

class commonQuery{
    
    function viewModule($module_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module WHERE module_id='$module_id'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        return $row;
        
    }
    
    function viewRole(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM role";
        $result=$con->query($sql);
        return $result;               
    }
    function viewRoleModule($role_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module_role WHERE role_id='$role_id'";
        $result=$con->query($sql);
        return $result; 
        
    }
    
    function viewModuleFun($module_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM function WHERE module_id='$module_id'";
        $result=$con->query($sql);
        return $result; 
    }
    
     function viewModel($model_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM model WHERE model_id='$model_id'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        return $row;
        
    }
    
    
    
    
    
}

