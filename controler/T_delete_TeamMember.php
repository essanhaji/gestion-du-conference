<?php

require_once '../model/Admin.php'; 

    //Delete Admin
    if(Admin::delete_one($_POST['id'],'equipe'))
      {
        echo "<script>
        location.reload();
        </script>";
      }
  
    
?>