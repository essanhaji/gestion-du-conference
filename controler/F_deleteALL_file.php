<?php

require_once '../model/Admin.php'; 

    //Delete Admin
    if(Admin::deletAll('file'))
      {
        echo "<script>
        location.reload();
        </script>";
      }
  
    
?>