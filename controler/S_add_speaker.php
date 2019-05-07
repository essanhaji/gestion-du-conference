<?php

require_once '../model/Admin.php'; 


//Insert an admin : 

        $first_name=htmlentities($_POST['first_name']);
        $last_name=htmlentities($_POST['last_name']);
        $email=htmlentities($_POST['email']);
        $phone=htmlentities($_POST['phone_number']);
        $description=htmlentities($_POST['description']);
        $picture=basename($_FILES['picture']['name']);
 
        $tab=array();
        $tab['name']=$first_name;
        $tab['lastname']=$last_name;
        $tab['email']=$email;
        $tab['phone_number']=$phone;
        $tab['description']=$description;
        $tab['picture']=$picture;
        if (Admin::insertSpeaker($tab)==true) 
        {
                //echo "<h1>true</h1>";
                header('location: ../view/V_Speaker.php');
        }
        else
        {
                //echo "<h1>fale</h1>";
                header('location: ../view/V_Speaker.php');

        }


        

        
?>