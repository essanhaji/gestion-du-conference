<?php

require_once '../model/Admin.php'; 

 
     // Update an admin
     if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] =="XMLHttpRequest" )
     {
            $tab=array();
            $tab['name']=$_POST['first_name'];
            $tab['lastname']=$_POST['last_name'];
            $tab['username']=$_POST['username'];
            $tab['email']=$_POST['email'];
            $tab['phone_number']=$_POST['phone_number'];
            $tab['password']=$_POST['password'];
            $tab['id']=$_POST['id_admin'];
        /***********NOT WORKING THIS FUNCTION************/
            if(Admin::updateSpeaker($tab,$tab['id'])==true){
            ?>
             <div class="alert alert-success"><span class='ion-checkmark'></span> Successfully updated</div>
            <?php
            }   
            else{
              ?>
             <div class="alert alert-success">error</div>
            <?php
            }    
        }
        else{
            header("Location: mainPage.php");
        }
    
?>