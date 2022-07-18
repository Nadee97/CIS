<?php $pagelink = $_SERVER['REQUEST_URI']; ?>

<?php
include '../../../common/session.php';   //To call session page
include '../../../common/dbconnection.php';
include '../../../common/commonQuery.php';
include '../../../common/logincheck.php';
include '../../login/model/loginmodel.php';
include '../../user/model/usermodel.php';

$objcq = new commonQuery();
$rowmodule = $_SESSION['rowcismodule'];
$rowuser=$_SESSION['rowcisuser'];
$user_id=$rowuser['user_id'];
$objusers=new user();


?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CIS WORLD</title>
        
        <link rel="icon" href="../../../images/logo_images/logo.png" type="image/gif" />
        <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../../css/style.css" />

    </head>

    <body>
        <!-- navigation bar -->
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" >
                <h5 style="margin-left:20px;margin-top: 4px;">
                    <img src="../../../images/logo_images/logo.png" alt="" height="30" width="30" /> CIS WORLD</h5> </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed " type="button" data-toggle="collapse" data-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="color:#FFF;">
                <ul class="navbar-nav navigation-cont px-3">
                    <li class="nav-item text-nowrap">
            <?php include '../../../common/loginbar.php'; ?> 

                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                     
                        <!-- sidebar -->
                        <ul class=" nav flex-column">
                            <li class="nav-item">
                                <h4 class="nav-link active">
                                    <span style="margin-bottom: 5px" data-feather="home"></span>
                                    Dashboard  <span class="sr-only">(current)</span> 
                                </h4>
                            </li>
                             <?php
                    $fun_id=1;
                    $resultuserfun=$objusers->displayUserFunc($user_id,$fun_id);
                    $nouserfun=$resultuserfun->num_rows;
                    
                    if($nouserfun==1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../../user/view/user.php" style="color:white">
                                    <span data-feather="users"></span>
                                    Manage Users 
                                </a>
                            </li>
                              <?php }?>
                         
                        </ul>
                    </div>
                </nav>
                <!-- main area  -->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class=" border-bottom"> 
                       
                        <div>
                            <h2 style="text-align:left">
                                <?php echo $rowuser['role_name']; ?> Dashboard</h2>
                        </div>
                    </div>
                </main>
               
            </div>
        </div>
        <script src="resources/jquery-3.6.0.min.js"></script>
        <!-- <script>
            window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"> <\/script>')
        </script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

        <script src="../../../js/feather.min.js"></script>

        <script src="../../../js/dashboard.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    </body>


</html>