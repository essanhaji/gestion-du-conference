<?php

require_once '../model/Admin.php'; 

 
     // Update an admin
     if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] =="XMLHttpRequest" )
     {
            $tab=array();
            $tab['name']=$_POST['first_name'];
            $tab['lastname']=$_POST['last_name'];
            $tab['email']=$_POST['email'];
            $tab['function']=$_POST['function'];
            $tab['description']=$_POST['description'];
            $tab['id']=$_POST['id'];
        /***********NOT WORKING THIS FUNCTION************/
            if(Admin::updateTeamMember($tab,$tab['id'])==2){
            ?>
             <div class="alert alert-success"><span class='ion-checkmark'></span> Successfully updated</div>
            <?php
            }   
            else{
              ?>
             <div class="alert alert-warning">error</div>
            <?php
            }    
        }
        else{
            header("Location: login.php");
        }
    
?>