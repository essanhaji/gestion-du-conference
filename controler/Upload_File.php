<?php
session_start();
require_once '../model/Admin.php'; 
require_once '../model/Participant.php'; 


		$var = $_SESSION['Participant'];

        $tab=array();
        $tab['id_part']=htmlentities($_POST['id']);
        $tab['title']=htmlentities($_POST['title']);
        $tab['file_pdf']=basename($_FILES['file']['name']);

      $a=array();
      $a = Admin::showAllFile();
      $aa = 0;
      if($aa == 0)
      { 
	      foreach ($a as $value) 
	      {
	      	if ($value->id_part == $tab['id_part']) 
	      	{
	        	$aa=1;
	      	}
	      }
      }
		if($aa==1)
		{
			if(Participant::updateFile($tab, $tab['id_part']))
				{
					echo "it's done";
					header('location:../view/_upload_successful.php');
				}

		}
      if ($aa == 0) 
      {
        if(Participant::insertFile($tab))
        	{
        	echo "it's done";
          header('location:../view/_upload_successful.php');
        }	
      }



        //header('location:../view/_upload_File.php')
        
?>