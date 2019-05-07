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
        $password2=$_POST['password2'];

        if($password==$password2){
            $tab=array();
            $tab['name']=$first_name;
            $tab['lastname']=$last_name;
            $tab['username']=$username;
            $tab['email']=$email;
            $tab['phone_number']=$phone;
            $tab['password']=$password;

                if(Participant::insertParticipant($tab)==4){
                    echo "<div  class='alert alert-success' style='margin-top:10px;clear:both'>Your Account Created</div>";
                }
                elseif(Participant::insertParticipant($tab)==3){
                    echo "<div  class='alert alert-danger' style='margin-top:10px;clear:both'>email existed !!</div>";
                }
                elseif(Participant::insertParticipant($tab)==2){
                   echo "<div  class='alert alert-danger' style='margin-top:10px;clear:both'>username existed !!</div>";

                }
                elseif(Participant::insertParticipant($tab)==1){
                   echo "<div  class='alert alert-danger' style='margin-top:10px;clear:both'>email and username existed !!</div>";
                }

        }
        else
        {
                echo "Your Passwords not the same";
        }
        
?>