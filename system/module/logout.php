<?php
if(!(isset($_SESSION))){
    session_start();
 
}
    
    $rowuser=$_SESSION['rowcisuser'];
  $log_id = $_SESSION['rowcislog'];
    
    include '../common/dbconnection.php';
    include '../module/login/model/loginmodel.php';
    $objlog=new log();
    $objlog->updateLog($log_id); //To update log record
    
    unset($_SESSION['rowcisuser']);
    unset($_SESSION['rowcismodule']);
    
    
   header("refresh:3,url=login/view/login.php"); //Redirecting   

?>

<html>
    <head>
        <title>CIS WORLD</title>
        
        <link rel="icon" href="../images/logo_images/dribble_food_court_4x.png" type="image/gif" />
        
        <link type="text/css" rel="stylesheet" href="../css/layout.css" />
        <link type="text/css" rel="stylesheet" href="../css/style.css" />
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     </head>
    <body>
        <div id="main">
            <div id="header">
                
                 <?php include '../common/header.php'; ?>            
                
            </div>
            <div id="logged">&nbsp;</div>
            <div id="navi">&nbsp;</div>
            <div id="content">
                <p class="cen alert-success" style="margin-left: 500px;margin-right:500px">You Are Successfully Signed Out From The System</p>
                <p class="cen"><i>(You will be redirected to the Login page within 3 seconds)</i></p>
<!--                <p class="cen"><a href="login/view/login.php">Login Out</a></p>-->
            <div >      
                <p class="cen" >
                    <img src="../images/fluid-loader.gif" style="height:300px; width: 400px" />     
                </p>    
            </div>
        </div>
            
        <!--      <div id="footer" class="foo">
                
                <?php include '../common/footer.php'; ?>  
            </div>
        </div>-->
        
        
    </body>
     
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
    /*$(document).ready(function(){
    $('form').submit(function(){
        $('#msg').css('text-align','center');
       var uname=$('#uname').val(); //To get Username
       var pass=$('#pass').val(); //To get password
       if(uname=="" && pass==""){  //To check username and password          
           $('#msg').text("User Name and Password are empty");//To display error
           return false; //Stay at same page
       }else if(uname==""){
           $('#msg').text("User Name is empty");//To display error
           return false; //
           
       }else if(pass==""){
           $('#msg').text("Password is empty");//To display error
           return false; //
           
       }  
       
       
       
       
    });
    
});
    */
    </script>
    
    
</html>