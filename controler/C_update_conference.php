<?php

require_once '../model/Admin.php'; 
require_once '../model/DAO.php';

     // Update an admin
     if(isset($_POST['save']) )
     {
            $tab=array();
            $tab['title']=$_POST['title'];
            $tab['start_date']=$_POST['start_date'];
            $tab['end_date']=$_POST['end_date'];
            $tab['location']=$_POST['location'];
            $tab['description']=$_POST['desc'];
            $tab['logo']=basename($_FILES['picture']['name']);
            if(Admin::updateConference($tab))
              {
                header('location:../view/V_Conference.php');
             }
    }
?>