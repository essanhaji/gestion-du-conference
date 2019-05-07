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
       .bs-callout {
    padding: 20px;
    margin: 20px 0;
    border: 1px solid #eee;
    border-left-width: 5px;
    border-radius: 3px;

}
.bs-callout h4 { 
    margin-top: 0;
    margin-bottom: 5px;
}
.bs-callout p:last-child {
    margin-bottom: 0;
}
.bs-callout-default {
    border-left-color: #000;
}
.team{
    margin-top: 50px;
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
        $info = Admin::showTeamMembers();
 
    ?>

<section class="team">
    <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Team Members</h3>
                </div>
            </div>
            <?php 
                foreach ($info as $value) 
                {
            ?>
        <div class="bs-callout bs-callout-default">
          <h3> <?php echo ($value->lastname.' '.$value->name);?> </h3>
          <B>Email : </B> <?php echo ($value->email);?>
          <br>
          <b>Function : </b> <?php echo ($value->function);?>
          <br><br>
          <?php echo ($value->description);?>
        </div>
        <?php } ?>
        
    </div>
</section>

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
