<?php
  require_once '../model/Admin.php';  
    require_once '../model/Participant.php'; 
    session_start();
    if(!isset($_SESSION['Participant'])){
        header("Location: _Login.php");
    }
?>
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
     <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
    <style type="text/css">
    .navbar-custom {
      border: 0;
      margin: 0;
      padding-top: 10px;
      padding-bottom: 10px;
      background-color: #000;
      -webkit-transition: all 0.2s linear 0s;
              transition: all 0.2s linear 0s;
    }
            .navbar-custom .navbar-nav li {
              margin: 0;
            }
            .navbar-custom .navbar-nav > li > a {
              color: #fff;
              font-size: 12px;
              font-weight: 400;
              border-bottom: 1px solid transparent;
            }
            .navbar-custom .navbar-nav > li > a:focus, .navbar-custom .navbar-nav > li > a:hover {
              background-color: transparent;
              border-color: rgba(255, 255, 255, 0.5);
            }
            .navbar-custom .navbar-nav > .active > a {
              border-color: rgba(255, 255, 255, 0.5);
            }

            .navbar-toggle {
              border: 0;
              border-radius: 0;
              margin-top: 2px;
            }
            .navbar-toggle .icon-bar {
              background-color: #fff;
            }

            .navbar-solid {
              background-color: #000 !important;
              padding: 0 !important;
              -webkit-transition: all 0.2s linear 0s;
                      transition: all 0.2s linear 0s;
            }
            .site-branding {
              float: left;
              margin-top: 0;
              margin-left: 10px;
            }
            .site-branding .logo {
              color: #fff;
              font-size: 14px;
              font-weight: 700;
              margin-right: 5px;
              letter-spacing: 3px;
              text-transform: uppercase;
            }
            .site-branding .logo:focus, .site-branding .logo:hover {
              text-decoration: none;
            }

        .form-control {
          border-radius: 0;
          box-shadow: none;
          height: 36px;
          padding: 10px 12px;
          font-size: 16px;
          line-height: 1.6;
        }
        .form-control:focus {
          box-shadow: none;
          border-color: #ccc;
          background-color: #f8f8f8;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#site-nav">

    <!--*********************************
    start navbar
    *********************************-->
    <nav id="site-nav" class="navbar navbar-custom" style="background:black">
        <div class="container">
            <div class="navbar-header">
                <!-- start logo -->
                <div class="site-branding">
                    <a class="logo" href="index.html">
                        <img src="assets/images/logo.png" alt="Logo">
                        ESTE Conference 2018
                    </a>
                </div>
                <!-- end logo -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--navbar header -->
            <div class="collapse navbar-collapse" id="navbar-items">
                <ul class="nav navbar-nav navbar-right">
                    <!-- navigation menu -->
                    <?php 
                        $obj=$_SESSION['Participant'];

                    ?>
                    <li><a data-scroll href="#" style="border: none"><span class="ion-person" style="font-size: 15px"></span> &nbsp Welcome : <?= $obj->name.' '.$obj->lastname.'  ('.$obj->email.')';  ?></a></li>
                    <li><a href="_Logout.php"  ><span class="ion-log-out" > &nbsp </span>Logout</a></li>
                 
                </ul>
            </div>
        </div><!-- /.container -->
    </nav>
    <!--*********************************
    end navbar
    *********************************-->




<div class="container"> <br />
    <div class="row">
        <form method="POST" action="../controler/Upload_File.php" enctype="multipart/form-data">



        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Upload file</strong> <small> </small></div>
                <div class="panel-body">
                    
                     <input type="text" name="title" class="form-control" placeholder="Enter File Title" required>
                     <br>
                     <input type="hidden" name="id" value="<?= $obj->getid() ?>">
                     <div class="input-group image-preview">


                        <span class="input-group-btn"> 
                        <!-- image-preview-clear button -->
                        <center><div class="btn btn-default image-preview-input" id="fake-file-button-browse">
                            <span class="glyphicon glyphicon-folder-open" >&nbspBrowse</span>
                            <input type="file" name="file" style="margin-left: 35px;margin-top: 10px" />
                        </div>
                        <button type="submit" class="btn btn-labeled btn-primary" style="display: block;margin-top: 30px;"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button></center>
                        </span> </div>
                    <!-- /input-group image-preview [TO HERE]--> 
                    
                    <br />
                    
                    
                    <br />

                </div>
            </div>
        </div>
        
        
        </form>
    </div>
</div>






    <!-- script -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        
    </script>
</body>
</html>
