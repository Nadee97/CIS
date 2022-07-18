<!DOCTYPE html>
<html lang="en">

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
        <!--background image-->
        <div><img class="login_bg" src="../../../images/students.png" alt="">                         
        </div>
        <div>
            <br>
            <!--header-->
            <h1 class="header1"> CIS WORLD </h1>
            <h1 class="header1"> Student Management System </h1>  
            <!--login form-->
            <div class="container">
                <div class="row align-items-center">
                    <div class="login_body">
                        <p style="color:black; font-weight:bold">Enter your Username and Password to Sign in</p>
                        <form method="post" name="login" action="../controller/logincontroller.php">
                            <div id="msg" class="alert-danger">
                                <?php
                                if (isset($_REQUEST['msg'])) {          //for display messages in login form
                                    echo base64_decode($_REQUEST['msg']);
                                }
                                ?>
                            </div>   
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="uname" id="uname" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                                <br>
                               
                              
                            </div>
                    </div>
                </div>


            </div>

        </div>
</body>

</html>