<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); // Error Handling
include '../../../common/session.php'; //To call session page
include '../../../common/dbconnection.php';
include '../../../common/commonQuery.php';
include '../../user/model/usermodel.php';
include '../../../common/logincheck.php';


$objcq = new commonQuery();
$resultrole = $objcq->viewRole(); //To get all role information
$rowmodule = $_SESSION['rowmodule'];

$ctid = time();
$sec18 = (60 * 60 * 24 * 365 * 18) + 60 * 60 * 24 * 4;
$ptid = $ctid - $sec18;
$max = date("Y-m-d", $ptid);
$sec60 = (60 * 60 * 24 * 365 * 60) + 60 * 60 * 24 * 15;
$pptid = $ctid - $sec60;
$min = Date("Y-m-d", $pptid);

$update_user_id=$_REQUEST['view_user_id'];
$objuser=new user();
$resuser=$objuser->updDisplayUsers($update_user_id);
$rowusera=$resuser->fetch_assoc();



?>


<html>
    <head>
      <title>CIS WORLD</title>
        
        <link rel="icon" href="../../../images/logo_images/logo.png" type="image/gif" />


        <link type="text/css" rel="stylesheet" href="../../../css/layout.css" />
        <link type="text/css" rel="stylesheet" href="../../../css/style.css" />
        <link type="text/css" rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">     

        <!--Validation-->
        <script type="text/javascript" src="../../../js/validateuser.js"></script>
        <!--Validation-->
    </head>
    <body>
        <div id="main">
            <div id="header">

                <?php include '../../../common/header.php'; ?>            
            </div>

            <div  style="height:25px">

                <div class="logalign">

                    <?php include '../../../common/loginbar.php'; ?> 
                </div>
            </div>

            &nbsp;  <div id="navi">      <!-- breadcrumb -->
                <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a  href="../../login/view/dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="user.php">Manage Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View User</li>  
                </ol>
                    &nbsp;</div>
            <div id="content">
                <h2 style="text-align:center; margin-top:10px">  View User</h2> 
           
                 <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>
          
                    <div class="container">
                        <!-- Start Row1 -->
                        <div class="row">                       
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px"> 
                                <h5>Employee ID</h5>
                            </div>    
                            <div class="col-md-3">
                                <input type="text" name="emp_id"  id="emp_id" placeholder="Enter Employee ID" value="<?php echo $rowusera['emp_id']; ?>" 
                                       class="form-control" readonly=""/>
                                
                                <input type="hidden" name="user_id"  id="user_id"  value="<?php echo $rowusera['user_id']; ?>" 
                                       class="form-control" />
                            </div> 
                            <div class="col-md-3"  style="padding-left:150px;padding-top:2px">
                                <h5>Title </h5>
                            </div> 
                            <div class="col-md-3">
                                <select name="user_title" id="user_title" class="form-control" 
                                        onchange="showFun(this.value)" readonly="">
                                    <option value="">Select a Title</option>
                                    <option value="Mr."<?php if($rowusera['user_title']=="Mr.") echo "SELECTED"?>>Mr.</option>                          
                            <option value="Miss."<?php if($rowusera['user_title']=="Miss.") echo "SELECTED"?>>Miss.</option>
                            <option value="Ms."<?php if($rowusera['user_title']=="Ms.") echo "SELECTED"?>>Ms.</option>
                            <option value="Mrs."<?php if($rowusera['user_title']=="Mrs.") echo "SELECTED"?>>Mrs.</option>

                                </select>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>
                        <!-- Finish Row1 -->
                        <!-- Start Row2 -->
                        <div class="row">                       
                            <div class="col-md-3"  style="padding-left:150px;padding-top:2px">
                                <h5>First Name</h5>
                            </div>    
                            <div class="col-md-3">
                                <input type="text" name="user_f_name"  id="user_f_name" placeholder="First Name" value="<?php echo $rowusera['user_f_name']; ?>"
                                       class="form-control" readonly="" />
                            </div> 
                            <div class="col-md-3" style="padding-left:150px"> 
                                <h5>Last Name </h5>
                            </div> 
                            <div class="col-md-3">
                                <input type="text" name="user_l_name"  id="user_l_name" placeholder="Last Name" value="<?php echo $rowusera['user_l_name']; ?>"
                                       class="form-control" readonly="" />
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>
                        <!-- Finish Row2 -->
                        <!-- Start Row3 -->
                        <div class="row">                       
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px"> 
                                <h5>Email</h5>
                            </div>    
                            <div class="col-md-3">
                                <input type="text" name="user_email"  id="user_email" placeholder="Email Addresss" value="<?php echo $rowusera['user_email']; ?>"
                                       class="form-control" onkeyup="showEmail(this.value)" readonly=""/>
                                <div id="showEmail"></div>
                            </div> 
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px"> 
                                <h5>Gender </h5>
                            </div> 
                            <div class="col-md-3" id="gen">
                                <h5>
                                    <input type="radio" name="gender" id="m" value="Male" disabled="" <?php  if($rowusera['user_gender']=="Male")echo "CHECKED"; ?>/> Male
                                    <input type="radio" name="gender" id="f" value="Female" disabled="" <?php  if($rowusera['user_gender']=="Female")echo "CHECKED"; ?>/> Female
                                </h5>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>
                        <!-- Finish Row3 -->
                        <!-- Start Row4 -->
                        <div class="row">                       
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px"> 
                                <h5>DOB</h5>
                            </div>    
                            <div class="col-md-3">
                                <input type="date" name="dob" id="dob"  class="form-control" value="<?php echo $rowusera['user_dob']; ?>" readonly="" />
                            </div> 
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px"> 
                                <h5>NIC </h5>
                            </div> 
                            <div class="col-md-3">
                                <input type="text" name="nic" value="<?php echo $rowusera['user_nic']; ?>" readonly=""
                                       id="nic" placeholder="NIC"
                                       class="form-control" />
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>

                        <!-- Finish Row4s -->
                        <!--STart Row5 -->
                        <div class="row">                       
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px">
                                <h5>Phone No</h5>
                            </div>    
                            <div class="col-md-3">
                                <input type="text" name="user_tel" value="<?php echo $rowusera['user_tel']; ?>"
                                       id="user_tel" placeholder="Phone No" readonly=""
                                       class="form-control" />
                            </div> 
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px">
                                <h5>Address </h5>
                            </div> 
                            <div class="col-md-3">
                                <textarea name="user_address" id="user_address" readonly=""
                                          class="form-control"   placeholder="Address"><?php echo $rowusera['user_address']; ?> </textarea>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>
                        <!-- Finish rOW5 -->
                        <!-- Start Row 6-->
                        <div class="row">                       
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px">
                                <h5>Role</h5>
                            </div>    
                            <div class="col-md-3">
                                <select name="role_id" id="role_id" class="form-control" readonly=""
                                        onchange="showFun(this.value)">
                                    <option value="">Select a Role</option>
                 <?php while($rowrole=$resultrole->fetch_assoc()) { ?>
             <option value="<?php echo $rowrole['role_id']?>"<?php if($rowusera['role_name']==$rowrole['role_name']) echo "SELECTED" ?>>
			 <?php echo $rowrole['role_name']?></option>
                        <?php } ?>   
             
                                </select>
                            </div> 
                            
                               <?php   if ($rowusera['user_image'] == "") {
                                        $path = "../../../images/user_images/user.png";
                                    } else {
                                        $path = "../../../images/user_images/" . $rowusera['user_image'];
                                    }
                                    
                                    ?>
                            
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px">
                                <h5>User Image </h5></div> 
                            <div class="col-md-3">
                               <img id="img_prev" src="<?php echo $path?>" width='80px'/>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>
                        <!-- Finish Row6s -->
                        <!-- Start Row7 -->
                        <div class="row">
                            <div class="col-md-12" id="showFun">

                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>                            
                        </div>
                        <!-- End of Row7 -->
                        <!--Start Of Row 8 -->
                       
                        <div class="row">
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-3">
                                
                                <a href="user.php" name="can" 
                                        class="btn btn-danger"> 
                                 
                                    Go Back</a>
                                &nbsp;</div>
                            <div class="col-md-3">&nbsp;</div>
                        </div>
                        <!-- End of Row 8 -->

                    </div>    
              

            </div>
           
        </div>


    </body>

    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js"></script>
   
</html>


