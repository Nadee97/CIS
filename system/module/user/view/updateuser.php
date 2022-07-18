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

$update_user_id=$_REQUEST['user_id'];
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
                    <li class="breadcrumb-item active" aria-current="page">Update User</li>  
                </ol>
                    &nbsp;</div>
            <div id="content">
                <h2 style="text-align:center; margin-top:10px">  Update User</h2> 
          
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div id="error_msg" style="text-align: center" >&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>

                    </div>

                </div>

                <form method="post" 
                      action="../controller/usercontroller.php?status=Update"
                      enctype="multipart/form-data">

                    <div class="container">
                        <!-- Start Row1 -->
                        <div class="row">                       
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px"> 
                                <h5>Employee ID</h5>
                            </div>    
                            <div class="col-md-3">
                                <input type="text" name="emp_id"  id="emp_id" placeholder="Enter Employee ID" value="<?php echo $rowusera['emp_id']; ?>" 
                                       class="form-control" />
                                
                                <input type="hidden" name="user_id"  id="user_id"  value="<?php echo $rowusera['user_id']; ?>" 
                                       class="form-control" />
                            </div> 
                            <div class="col-md-3"  style="padding-left:150px;padding-top:2px">
                                <h5>Title </h5>
                            </div> 
                            <div class="col-md-3">
                                <select name="user_title" id="user_title" class="form-control" 
                                        onchange="showFun(this.value)">
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
                                       class="form-control" />
                            </div> 
                            <div class="col-md-3" style="padding-left:150px"> 
                                <h5>Last Name </h5>
                            </div> 
                            <div class="col-md-3">
                                <input type="text" name="user_l_name"  id="user_l_name" placeholder="Last Name" value="<?php echo $rowusera['user_l_name']; ?>"
                                       class="form-control" />
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
                                       class="form-control" onkeyup="showEmail(this.value)" />
                                <div id="showEmail"></div>
                            </div> 
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px"> 
                                <h5>Gender </h5>
                            </div> 
                            <div class="col-md-3" id="gen">
                                <h5>
                                    <input type="radio" name="gender" id="m" value="Male" <?php  if($rowusera['user_gender']=="Male")echo "CHECKED"; ?>/> Male
                                    <input type="radio" name="gender" id="f" value="Female" <?php  if($rowusera['user_gender']=="Female")echo "CHECKED"; ?>/> Female
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
                                <input type="date" name="dob" id="dob"  class="form-control" value="<?php echo $rowusera['user_dob']; ?>"  />
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
                                       id="user_tel" placeholder="Phone No"
                                       class="form-control" />
                            </div> 
                            <div class="col-md-3" style="padding-left:150px;padding-top:2px">
                                <h5>Address </h5>
                            </div> 
                            <div class="col-md-3">
                                <textarea name="user_address" id="user_address" 
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
                                <select name="role_id" id="role_id" class="form-control" 
                                        onclick="showFun(this.value)">
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
                                <input type="file" name="user_image" 
                                       id="user_image" placeholder="User Image"
                                       class="form-control" onchange="readURL(this)" />
                               <img id="img_prev" src="<?php echo $path ?>" width='60px'/>
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
                                <button type="submit" name="sub" 
                                        class="btn btn-primary"> 
                                   
                                    Update</button>
                           
                                <a href="user.php" name="can" 
                                        class="btn btn-danger"> 
                                 
                                    Cancel</a>
                                &nbsp;</div>
                            <div class="col-md-3">&nbsp;</div>
                        </div>

                        <!-- End of Row 8 -->

                    </div>    
                </form>

            </div>
         
        </div>


    </body>

    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
                                       function showFun(str) {
                                           var xhttp;
                                           if (str == "") {
                                               document.getElementById("showFun").innerHTML = "";
                                               return;
                                           }
                                           xhttp = new XMLHttpRequest();
                                           xhttp.onreadystatechange = function () {
                                             
                                               if (this.readyState == 4 && this.status == 200) {
                                                   document.getElementById("showFun").innerHTML = this.responseText;
                                               }
                                           };
                                           xhttp.open("GET", "getfunction.php?q=" + str, true);
                                           xhttp.send();
                                       }
                                        //To check email
                                       function showEmail(str) {
                                           $('#error_msg').text('');
                                           $('#error_msg').removeClass('alert-danger');
                                           var xhttp;
                                           if (str == "") {
                                               document.getElementById("showEmail").innerHTML = "";
                                               return;
                                           }
                                           xhttp = new XMLHttpRequest();
                                           xhttp.onreadystatechange = function () {
                                          
                                               if (this.readyState == 4 && this.status == 200) {
                                                   document.getElementById("showEmail").innerHTML = this.responseText;

                                               }
                                           };
                                           xhttp.open("GET", "getEmail.php?q=" + str, true);
                                           xhttp.send();
                                       }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').submit(function () {
                var emp_id = $('#emp_id').val();
                var user_f_name = $('#user_f_name').val();
                var user_l_name = $('#user_l_name').val();
                var user_email = $('#user_email').val();
                var dob = $('#dob').val();
                var role_id = $('#role_id').val();
                var nic = $('#nic').val();
                var user_tel = $('#user_tel').val();
                var user_image = $('#user_image').val();

                var patnic = /^[0-9]{9}[vVxX]$/;
                var pattel = /^[0-9]{10}$/;
                var patemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;


                if (emp_id == "") {
                    $('#error_msg').text("Employee ID is empty");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#user_fname').focus();
                    return false; //
                    
                } 
                if (user_f_name == "") {
                    $('#error_msg').text("First Name is empty");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#user_fname').focus();
                    return false; //
                }
                if (user_l_name == "") {
                    $('#error_msg').text("Last Name is empty");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#user_lname').focus();
                    return false; //
                }
                if (user_email == "") {
                    $('#error_msg').text("Email Address is empty");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#user_email').focus();
                    return false; //
                }
                
                 if (nic == "") {
                    $('#error_msg').text("NIC is empty");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#user_email').focus();
                    return false; //
                    
                }   
                if (!(user_email.match(patemail))) { //To check email validity
                    $('#error_msg').text("Email Address is invalid");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#user_email').focus();
                    return false; //
                }

                var res = $('#res').val();
                if (res == 0) {
                    $('#user_email').select();
                    return false;
                }


                if ($('input[name=gender]:checked').length <= 0)
                {
                    $('#error_msg').text("Please select a Gender");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#gen').addClass('alert-danger');
                    return false;
                }
                if (dob == "") {
                    $('#error_msg').text("Date of Birth is empty");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#dob').focus();
                    return false; //
                }
                //To check dob range
                //Current Date
                var current = new Date();
                var cyear = current.getFullYear();
                var cmonth = current.getMonth();
                var cdate = current.getDate();
                //Birth Date
                var birth = new Date(dob);
                var byear = birth.getFullYear();
                var bmonth = birth.getMonth();
                var bdate = birth.getDate();

                var age = cyear - byear;
                var m = cmonth - bmonth;
                var d = cdate - bdate;

                if (m < 0 || (m == 0 && d < 0)) {
                    age--;
                }

                if (age < 18) {
                    $('#error_msg').text("Under Age");
                    $('#error_msg').addClass('alert-danger');
                    $('#dob').focus();
                    return false;

                }
                if (age > 60) {
                    $('#error_msg').text("over Age");
                    $('#error_msg').addClass('alert-danger');
                    $('#dob').focus();
                    return false;
                }
                if (nic != "" && !(nic.match(patnic))) {
                    $('#error_msg').text("NIC is invalid");
                    $('#error_msg').addClass('alert-danger');
                    $('#nic').focus();
                    return false; //              
                }

                if (user_tel != "" && !(user_tel.match(pattel))) {
                    $('#error_msg').text("Telephone No is invalid");
                    $('#error_msg').addClass('alert-danger');
                    $('#user_tel').focus();
                    return false; //        

                }


                if (role_id == "") {
                    $('#error_msg').text("Role Name is empty");//To display error
                    $('#error_msg').addClass('alert-danger');
                    $('#role_id').focus();
                    return false; //
                }

                if (user_image != "") {
                    var arr = user_image.split(".");
                    var last = arr.length - 1;
                    var iext = arr[last].toLowerCase();
                    var extarr = ['jpg', 'jpeg', 'gif', 'png', 'tiff', 'svg'];
                    if ($.inArray(iext, extarr) == -1) {
                        $('#error_msg').text("Invalid extension");
                        $('#error_msg').addClass('alert-danger');
                        $('#user_image').focus();
                        return false; //  

                    }
                }



            });

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_prev')
                            .attr('src', e.target.result)
                            .height(70);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


    </script>   
</html>


