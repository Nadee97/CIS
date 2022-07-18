<?php      

if($rowuser['user_image']==""){
            $pathu="../../../images/user_images/user.png";        
                }else{
        
          $pathu="../../../images/user_images/".$rowuser['user_image'];
                }
?>
                   
                |    <img src="<?php echo $pathu; ?>" height="30" />
     <?php echo $rowuser['user_f_name']." ".$rowuser['user_l_name']; ?> |
     <a class="btn btn-outline-info" href="../../user/view/viewuser.php?view_user_id=<?php echo $rowuser['user_id'] ?>">View Profile</a> |
             <a class="btn btn-outline-danger" href="../../logout.php">Sign Out</a>       
                    