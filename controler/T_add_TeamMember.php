<?php

require_once '../model/Admin.php'; 


//Insert an admin : 

        $first_name=htmlentities($_POST['first_name']);
        $last_name=htmlentities($_POST['last_name']);
        $email=htmlentities($_POST['email']);
        $function=htmlentities($_POST['function']);
        $desc=htmlentities($_POST['Description']);

        $tab=array();
        $tab['name']=$first_name;
        $tab['lastname']=$last_name;
        $tab['username']=$username;
        $tab['email']=$email;
        $tab['function']=$function;
        $tab['description']=$desc;

                Admin::insertTeamMember($tab);
                            header('location: ../view/V_Team.php');

        
?>