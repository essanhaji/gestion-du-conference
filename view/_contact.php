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
            include '_Navbar.php';
    ?>
    
    
    <!--*********************************
    start map
    *********************************-->
    <section id="location" class="section location">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3 class="section-title">Event Location</h3>
                    <address>
                        <p>Km 9, Route d'Agadir <br>Essaouira Aljadida BP. 383<br>Ghazoua, Maroc<br>EST Essaouira</p>
                        <p>+2126878965<br>este@gmail.com</p>
                    </address>
                </div>
                <div class="col-sm-9">
                    <iframe src= "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3403.7332619996437!2d-9.732913785208137!3d31.449009481393315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x46dca5f5d7fd7be8!2sEcole+Sup%C3%A9rieure+de+Technologie+d&#39;Essaouira!5e0!3m2!1sfr!2s!4v1518732315243" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!--*********************************
    end map
    *********************************-->


    <!--*********************************
    start contact
    *********************************-->
    <section class="section registration">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Contact Us</h3>
                </div>
            </div>
            <form method="POST">
                <div class="row">
                    <div class="col-md-12" id="registration-msg" style="display:none;">
                        <div class="alert"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea class="form-control" rows="8" placeholder="Message" id="message" name="message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center mt20">
                    <button type="submit" name="submit" class="btn btn-black" id="registration-submit-btn">Send</button>
                </div>
            </form>
        </div>
    </section>
    <?php
        if (isset($_POST['submit'])) 
        {
            //echo "<h1>true</h1>";
            require_once '../model/Person.php'; 
            require_once '../model/Message.php'; 
            $mess = new Message();
            $mess->name = $_POST['fname'];
            $mess->lastname = $_POST['lname'];
            $mess->email = $_POST['email'];
            $mess->subject = $_POST['subject'];
            $mess->message = $_POST['message'];
            Person::sendEmail($mess);
        }
    ?>
    <!--*********************************
    end contact
    *********************************-->





      <!--*********************************
    start footer
    *********************************-->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="site-info">Designed and <br> Developed by <a href="#">ESSANHAJI, ESSOUBAKI</a></p>
                    <ul class="social-block">
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--*********************************
    end footer
    *********************************-->



    <!-- script -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
