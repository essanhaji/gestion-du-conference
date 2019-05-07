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
 



<div class="pg-login">

 <!--========== start Login  ==========-->
        <div class="s-promo-block-v1 g-fullheight--md">
            <div class="container g-ver-center--md ">
                <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">
                    <div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
                            <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--black">Submission</h1>
                            <p class=" g-color--black"> Authors are invited to submit papers (up to 6 pages) in English (in Pdf or Word) that adhere to  the ACM WORD or LATEX template. Papers must be unpublished and must not be submitted for publication elsewhere. All submissions will be blind reviewed by the Technical Program Committee on the basis of technical quality, relevance to conference topics of interest, originality, significance, and clarity.
                            <br>
                            All accepted and presented papers at LOPAL’2018 will be published in the Conference Proceedings. All accepted Papers (regular, short and poster) will be published by ACM - International Conference Proceedings Series (ICPS) and will be available in the ACM Digital Library. The ISBN number assigned by ACM ICPS to LOPAL'2018 is 978-1-4503-5304-5.</p>
                            <br>
                            <P class="g-color--white"> For any question about submission, please contact us.</P>
                        </div>
                    </div>

                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 col-sm-4 g-hor-centered-row__col" style="background: black;margin-top: 50px">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <form action="../controler/login_controler.php" method="POST" class="center-block g-width-350--xs g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4">
                                <div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-30--xs g-color--white">Sign in now</h2>
                                </div>
                                <div class="g-margin-b-30--xs">
                                    <input type="text" name="username" class="form-control s-form-v3__input" placeholder="* USERNAME" autocomplete="off" required>
                                </div>
                                <div class="g-margin-b-30--xs">
                                    <input type="password" name="password" class="form-control s-form-v3__input" placeholder="* PASSWORD" required>
                                </div>
                                <div class="g-text-center--xs">
                                    <button type="submit" name="login" class=" text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs"><span class="ion-locked"></span> Login</button>
                                    <a class="g-color--white g-font-size-13--xs" href="_New_Account.php"><span class="ion-ios-personadd-outline"></span> Create New Account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== END login ==========-->

</div>

    <!-- script -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
</body>
</html>
