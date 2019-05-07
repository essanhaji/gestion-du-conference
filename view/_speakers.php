<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ESTE Conference</title>

    <!-- css -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <style type="text/css">
        .form-control {
          border-radius: 0;
          box-shadow: none;
          height: 48px;
          padding: 10px 12px;
          font-size: 16px;
          line-height: 1.6;
        }
        .form-control:focus {
          box-shadow: none;
          border-color: #ccc;
          background-color: #f8f8f8;
        }
        .speakers{
            margin-top: 50px;
            margin-bottom: 50px;
        }

    </style>
</head>
<body data-spy="scroll" data-target="#site-nav">

    <?php
            include '_Navbar.php';
    ?>
    <?php 
        require_once '../model/Admin.php';
        require_once '../model/Conference.php';
        $info = array();
        $info = Admin::showAllSpeakers();
 
    ?>

<div class="speakers">
        <?php 
            foreach ($info as $value) 
            {
        ?>
      <div class="container">
        <div class="col-md-4" >             
            <img src="<?php echo ($value->picture);?> " alt="" class="img-responsive" />                   
        </div>
        <div class="col-md-8" >
              <h3> <?php echo ($value->lastname.' '.$value->name);?> </h3>
              <B>Email : </B> <?php echo ($value->email);?>
              <br>
              <b>Phone Number : </b> <?php echo ($value->phone_number);?>
              <br> 
                <p>
                  <?php echo ($value->description);?>  
                </p>                
        </div>
      </div>

    <hr>
    <hr>
        <?php 
        }
        ?>


</div>


    <?php
        include 'footer.php';
    ?>

    <!-- script -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
