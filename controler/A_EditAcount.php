<?php
require_once '../model/Admin.php'; 
require_once '../model/Participant.php'; 
include '../view/session_test_admin.php';
		
		$var = $_SESSION['Admin'];
        $user=htmlentities($_POST['username']);
        $old_pass=md5($_POST['OldPassword']);
        $NewPass=$_POST['NewPassword'];
        $RePass=$_POST['RePassword'];
//echo $var->getid();
// echo $user."<br>";
// echo $old_pass."<br>";
// echo $NewPass."<br>";
// echo $RePass."<br>";

        if(!empty($_POST['OldPassword']) and !empty($_POST['NewPassword']) and !empty($_POST['RePassword'])){
			if($NewPass == $RePass and $old_pass==$var->getpassword())
			{
		     	$rqt="UPDATE Admin SET username = '".$user."' , password = '".md5($NewPass)."' WHERE id = ".$var->getid();
		        if(Admin::EditAccount($rqt)){
		        	echo "<div  class='alert alert-success' style='margin-top:10px;clear:both'>Your Account updated</div>";
		        	?>
		        	<meta http-equiv="refresh" content="2;../view/_Login.php" />
		        	<?php
		        }
	  		}
	  		else{
	  			if($NewPass != $RePass){
	  				echo "<div  class='alert alert-danger' style='margin-top:10px;clear:both'>Passwords not the same !!</div>";
	  			}
	  			if($old_pass!=$var->getpassword()){
	  				echo "<div  class='alert alert-danger' style='margin-top:10px;clear:both'>Old password inccorect !!</div>";
	  			}
	  		}
		}
		else{
			if($old_pass==$var->getpassword())
			{
		     	$rqt="update admin set username ='".$user."' WHERE id = ".$var->getid();
		        if(Admin::EditAccount($rqt)){
					echo "<div  class='alert alert-success' style='margin-top:10px;clear:both'>Your Account updated</div>";
		        	?>
		        	<meta http-equiv="refresh" content="2;../view/_Login.php" />
		        	<?php		        }
		    }
  			elseif($old_pass!=$var->getpassword()){
  				echo "<div  class='alert alert-danger' style='margin-top:10px;clear:both'>Old password inccorect !!</div>";
  			}
		}
        
?>