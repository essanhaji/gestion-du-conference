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
</head>
<body data-spy="scroll" data-target="#site-nav">

    
    <?php
        include '_Navbar.php';
    ?>
 


     <!--*********************************
    start about us
    *********************************-->
    <section id="about" class="section about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <figure>
                        <img alt="" class="img-responsive" src="assets/images/about_us.jpg">
                    </figure> 
                </div><!-- /.col-sm-6 -->
                <br>
<?php 
        require_once '../model/Admin.php';
        require_once '../model/Conference.php';
        $info = array();
        $info = Admin::showConference();

?>
                <div class="col-sm-6">
                    <h3 class="section-title multiple-title">What is Our Goal?</h3>
                    <p>ESTE Conference is a conference management system that is flexible, easy to use, and has many features to make it suitable for various conference models. It is currently probably the most commonly used conference management system.</p>
                    <h3 class="section-title">About Us</h3>
                    <p><?php echo $info[0]->description;?></p>
                </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!--*********************************
    end about us
    *********************************-->
<?php 
        require_once '../model/Admin.php';
        require_once '../model/Conference.php';
        $info = array();
        $info = Admin::showAllSponsor();
 
?>
<!--*********************************
    start sponsore
    *********************************-->
    <section id="partner" class="section partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event Partner</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo($info[0]->website); ?>" class="partner-box partner-box-1" style="background: url(<?php echo ($info[0]->logo);?>) no-repeat center center/contain;"></a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo($info[1]->website); ?>" class="partner-box partner-box-2" style="background: url(<?php echo ($info[1]->logo);?>) no-repeat center center/contain;"></a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo($info[2]->website); ?>" class="partner-box partner-box-3" style="background: url(<?php echo ($info[2]->logo);?>) no-repeat center center/contain;"></a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo($info[3]->website); ?>" class="partner-box partner-box-4" style="background: url(<?php echo ($info[3]->logo);?>) no-repeat center center/contain;"></a>
                </div>
            </div>
    </section>
    <!--*********************************
    end sponsore
    *********************************-->



     <!--*********************************
    start questions
    *********************************-->
    <section id="faq" class="section faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event FAQs</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> What is the price of the ticket ?</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>Answer Here ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> What is included in my ticket ?</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">Answer Here ...</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Office address ?</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">Answer Here ...</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> How should I dress ?</a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">Answer Here ...</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> I have specific questions that are not addressed here. Who can help me ?</a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">Answer Here ...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--*********************************
    end questions
    *********************************-->




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
