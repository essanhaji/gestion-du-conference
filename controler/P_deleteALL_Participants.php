<?php

require_once '../model/Admin.php'; 

    Admin::deletAll('participant');

    echo "<script>
        location.reload();
        </script>";
        
    
?>