<?php

    require_once '../model/Admin.php';  
   
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/jBox.css">
    <link rel="stylesheet" href="css/style.css">

    
 <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    <link rel="stylesheet" href="css/style.css"/>
 -->
    <title>Admin System</title>
</head>
<body>

       <?php
            require_once "../model/DAO.php";
            $dao = new DAO('pfe');
            $var = array();
            $var = $dao->GetRow('admin', $_GET['id']);
            
       ?>

    <form class="add2" method="post" action="../controler/A_update_admin .php">                
        <div class="form-group">
            <input type="hidden" name="id_admin" value="<?= $var[0]->getid() ?>">  
            <input type="text" name="first_name" placeholder="First Name:" required value="<?= $var[0]->name ?>">  
            <input type="text" name="last_name" placeholder="Last Name:" required value="<?= $var[0]->lastname ?>" style="float:none">
            <br>
            <input type="text" name="username"  placeholder="Username:"  value="<?= $var[0]->getusername() ?>" required>
            <input type="email" name="email" value="<?= $var[0]->email ?>" placeholder="Email:" required>
            <input type="password" name="password" placeholder="Password:" value="<?= $var[0]->getpassword() ?>" required>
            <div id="msg" ></div>
        </div>
        <hr>
        <button class="btn btn-success" type="submit" name="update_admin_submit" style="float:right;background:#0089ff;border-color:#0089ff" ><span class="ion-paper-airplane"></span> Submit</button>
       
    </form>
                          

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jBox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajaxForm.js" ></script>
    <script type="text/javascript">
    
    $("form").ajaxForm({
        success:function(data)
        {
            $("#msg").html(data);
        }
    });
    function update_file_badge(){
        document.location.href="update_file_badge.php";
    }


       
       

    </script>

</body>
</html>
