<?php
session_start();
require_once '../model/DAO.php'; 
require_once '../model/Admin.php'; 
require_once '../model/Participant.php'; 

    //Delete Admin
		
   if(isset($_POST['login']) ){
   		$user=$_POST['username'];
   		$pass=$_POST['password'];

   		$dao = new DAO('pfe');
   		$a = array();
   		$a = $dao->getlist('Participant');
   		foreach ($a as $value) 
   		{
   			if(strcmp($value->getusername(), $user) == 0 and strcmp($value->getpassword(), md5($pass)) == 0)
   			{
   				$_SESSION['Participant']=$value;
               echo "Participant :".$user;
               header("Location: ../view/_upload_File.php");
   			}
   		}
         $aa = array();
   		$aa = $dao->getlist('Admin');
   		foreach ($aa as $value) 
   		{
   			if(strcmp($value->getusername(), $user) == 0 and strcmp($value->getpassword(), md5($pass)) == 0)
   			{
   				$_SESSION['Admin']=$value;
               echo "Admin :".$user;
               header("Location: ../view/V_Dashboard.php");
   			}
   		}
   		echo "<div style='color:red'>Username or password are incorrect !!
   		<p>You will redirect to Login page after 3 second ...</p>
   		</div>";
   		?>
		   <meta http-equiv="refresh" content="2;../view/_Login.php" />
   		<?php

   }

    
?>