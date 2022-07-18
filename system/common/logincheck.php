<?php

if (!$_SESSION['rowcisuser']){
	$msg='Please login and try again';
        $msg=base64_encode($msg);
	header("location:../../login/view/login.php?msg=$msg");
	die;
	}
	
	?>