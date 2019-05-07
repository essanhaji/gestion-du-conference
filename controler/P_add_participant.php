<?php

require_once '../model/Admin.php'; 
require_once '../model/Participant.php'; 


//Insert an admin : 

        $first_name=htmlentities($_POST['first_name']);
        $last_name=htmlentities($_POST['last_name']);
        $username=htmlentities($_POST['username']);
        $email=htmlentities($_POST['email']);
        $phone=htmlentities($_POST['phone_number']);
        $password=$_POST['password'];

        $tab=array();
        $tab['name']=$first_name;
        $tab['lastname']=$last_name;
        $tab['username']=$username;
        $tab['email']=$email;
        $tab['phone_number']=$phone;
        $tab['password']=$password;

                Participant::insertParticipant($tab);
                            header('location: ../view/V_Participant.php');

        
?>