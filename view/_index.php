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
    </style>
</head>
<body data-spy="scroll" data-target="#site-nav">
<?php 
        require_once '../model/Admin.php';
        require_once '../model/Conference.php';
        $info = array();
        $info = Admin::showConference();

?>
    <!--*********************************
    start navbar
    *********************************-->
    <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom" style="padding-top:30px">
        <div class="container">
            <div class="navbar-header">
                <!-- start logo -->
                <div class="site-branding">
                    <a class="logo" href="_index.php">
                        <img src="<?php echo $info[0]->logo;?>" alt="Logo">
                        <?php echo $info[0]->title;?>
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
                    <li class="active"><a href="_index.php">Home</a></li>
                    <li><a href="_about.php">About Us</a></li>
                    <li><a href="_Registration.php">Registration</a></li>
                    <li><a href="_speakers.php">Speakers</a></li>
                    <li><a  href="_Team.php">Team Members</a></li>
                    <li><a  href="_Login.php">Submission</a></li>
                    <li><a  href="_contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div><!-- /.container -->
    </nav>
    <!--*********************************
    end navbar
    *********************************-->

    <!--*********************************
    start center
    *********************************-->
    <header id="site-header" class="site-header valign-center">
        <div class="intro">
            <h2>FROM <?php echo $info[0]->start_date;?> TO <?php echo $info[0]->end_date;?> / EST ESSAOUIRA</h2>
            <h1><?php echo $info[0]->title;?></h1>
            <p>First &amp; Largest Conference In cadi ayyad</p>
            <a class="btn btn-white" href="_New_Account.php">Register Now</a>
        </div>
    </header>
    <!--*********************************
    start center
    *********************************-->

    <!-- script -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
