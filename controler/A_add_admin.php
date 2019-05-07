<?php

require_once '../model/Admin.php'; 


//Insert an admin : 

        $first_name=htmlentities($_POST['first_name']);
        $last_name=htmlentities($_POST['last_name']);
        $username=htmlentities($_POST['username']);
        $email=htmlentities($_POST['email']);
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];

        $tab=array();
        $tab['name']=$first_name;
        $tab['lastname']=$last_name;
        $tab['username']=$username;
        $tab['email']=$email;
        $tab['password']=$password1;

            if($password1==$password2){
                Admin::insertAdmin($tab);
                
            }
            else{
                echo "Passwords not the same !!";
            }
            header('location: ../view/V_Admins.php');


?>