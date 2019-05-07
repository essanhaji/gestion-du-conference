<?php

require_once '../model/Admin.php'; 


        $tab=array();

        $tab['name']=htmlentities($_POST['name']);
        $tab['website']=htmlentities($_POST['website']);
        $tab['logo']=basename($_FILES['picture']['name']);

      
        Admin::insertSponsor($tab);
        header('location: ../view/V_Sponsor.php');

        
?>