<?php $pagelink = $_SERVER['REQUEST_URI']; ?>

<?php
include '../../../common/session.php'; //To call session page
include '../../../common/dbconnection.php';
include '../../../common/commonQuery.php';
include '../../../common/logincheck.php';
include '../model/usermodel.php';

$objcq = new commonQuery();
$rowmodule = $_SESSION['rowcismodule'];
$rowuser=$_SESSION['rowcisuser'];
$user_id=$rowuser['user_id'];

$objusers = new user();
$resultusers = $objusers->displayAllUsers();
$nousers = $resultusers->num_rows;
?>
<html>
    <head>
       <title>CIS WORLD</title>
        
        <link rel="icon" href="../../../images/logo_images/logo.png" type="image/gif" />


        <link type="text/css" rel="stylesheet" href="../../../css/layout.css" />
        <link type="text/css" rel="stylesheet" href="../../../css/style.css" />
        <link type="text/css" rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../../css/fontawesome/css/all.css"/>

        <script src="../../../js/jquery-1.12.4.js"></script>

        <script>
            function disConfirm(str) {
                var r = confirm("Do You want to " + str + "?");
                if (!r) {
                    return false;
                }
            }
        </script>
        <style>
            th, td {
                
                 border-collapse: collapse;
               }
                    th {
                background-color: #cccccc;
               }
              
        </style>
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
                    <li class="breadcrumb-item"><a href="../../login/view/Dashboard.php"> Dashboard</a> </li>
                    <li class="breadcrumb-item active" aria-current="page" > Manage Users </li>
                </ol>
            </div>

            <div id="content">
                <h2 style="text-align:center; margin-top:10px"> Manage Users</h2>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                <?php
                             $fun_id=2;
                    $resultuserfun=$objusers->displayUserFunc($user_id,$fun_id);
                    $nouserfun=$resultuserfun->num_rows;
                    
                    if($nouserfun==1) { ?>
                            <a href="adduser.php">
                                <button class="btn btn-primary"> 
                                  <i class="fas fa-user-plus"></i>
                                   Add User
                                </button>
                            </a>
                 <?php }?>
                        </div>
                        <div class="col-md-6">
                            <form action="searchuser.php" method="post">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" 
                                               name="keyword"  placeholder="Search" required="required">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                             Search
                                        </button>
                                    </div>

                                </div>  
                            </form>                                                
                        </div>  
                         </div> 
                        <div class="row">
                            <div class="col-md-12"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <?php
                                if (isset($_REQUEST['msg'])) {
                                    $msg = base64_decode($_REQUEST['msg']);
                                    ?>
                                    <span class="alert alert-success"><?php echo $msg; ?></span>

                                <?php } ?>

                                &nbsp;</div>
                        </div>
               
                    <div>&nbsp;</div>
             </div>

                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>&nbsp;</th>  
                                    <th><h5>User Name&nbsp;</h5></th>  
                                    <th><h5>Email&nbsp;</h5></th> 
                                    <th><h5>Role&nbsp;</h5></th> 
                                    <th><h5>Contact No&nbsp;</h5></th> 
                                    <th ><h5>Actions</h5></th> 
                                </tr>   

                                <?php
                                $count = 0;
                                while ($rowusers = $resultusers->fetch_assoc()) {
                                    $count++;

                                    if ($rowusers['user_image'] == "") {
                                        $path = "../../../images/user_images/user.png";
                                    } else {
                                        $path = "../../../images/user_images/" . $rowusers['user_image'];
                                    }

                                    if ($rowusers['user_status'] == "active") {
                                        $status = "Deactivate";
                                        $color = "btn-danger";
                                    } else {
                                        $status = "Activate";
                                         $color = "btn-success";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $path; ?>" width="50px" height="40px" />
                                        </td>
                                        <td><?php echo $rowusers['user_f_name'] . " " . $rowusers['user_l_name']; ?></td>                                  
                                        <td><?php echo $rowusers['user_email']; ?></td>
                                        <td><?php echo $rowusers['role_name']; ?></td>
                                        <td><?php echo $rowusers['user_tel']; ?></td>
                                      
                                        <td>
                                   <?php   
                                             $fun_id=4;

                                    $resultuserfun=$objusers->displayUserFunc($user_id,$fun_id);
                                    $nouserfun=$resultuserfun->num_rows;
                    
                                    if($nouserfun==1) { ?>
                                            <a href="../controller/usercontroller.php?user_id=<?php echo$rowusers['user_id']; ?>&status=View">
                                                <button class="btn btn-dark">View</button>
                                            </a>
                                     <?php }  
                                             $fun_id=3;

                                    $resultuserfun=$objusers->displayUserFunc($user_id,$fun_id);
                                    $nouserfun=$resultuserfun->num_rows;
                    
                                    if($nouserfun==1) { ?>
                                            <a href="../view/updateuser.php?user_id=<?php echo$rowusers['user_id']; ?>&status=Update">
                                                <button class="btn btn-warning">Update</button>
                                            </a>
                                        <?php }  
                                             $fun_id=5;

                                    $resultuserfun=$objusers->displayUserFunc($user_id,$fun_id);
                                    $nouserfun=$resultuserfun->num_rows;
                    
                                    if($nouserfun==1) { ?> 
                                            <a href="../controller/usercontroller.php?user_id=<?php echo$rowusers['user_id']; ?>&status=<?php echo $status; ?>">
                                                <button class="btn <?php echo $color; ?>" style="width:100px"
                                                        onclick="return disConfirm('<?php echo $status . "  " . $rowusers['user_f_name']; ?>')">
                                 <?php echo $status; ?></button>
                                            </a>
                                        <?php }?>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>
                            <nav class="container">

                                <ul class="pagination pagination-sm">

                                </ul>

                            </nav>
                        </div>




                    </div>


                </div>



            </div>


        </div>


    </body>

    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js"></script>
    
</html>