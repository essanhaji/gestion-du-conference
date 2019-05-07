<?php
   require_once '../model/Admin.php';  
    include 'session_test_admin.php';
   ?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/ionicons.min.css">
      <link rel="stylesheet" href="css/jBox.css">
      <link rel="stylesheet" href="css/style.css">

      <style type="text/css">
         @media (min-width: 1000px) {
            .thumbnail{
               float: left;
               height: 245px;
            }
            .img{
               width: 280px;
               height: 200px;
               overflow: hidden;
            }
         }
         .thumbnail span{
            float: right;
            font-size:20px;
         }
         @media (min-width: 1000px) {
            .Sponsors .col-md-3{
             width:23%;
            }
         }
      </style>

      <!--
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    <link rel="stylesheet" href="css/style.css"/>
         -->
      <title>Admin System</title>
   </head>
   <body>
      <nav class="navbar navbar-default">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">ESTE CONFERENCE</a>
            </div>
            <ul class="nav navbar-nav">
                    <li><a href="V_Dashboard.php">Dashboard</a></li>
                    <li><a onclick="update_file_badge();"> Files</a></li>
                    <li><a onclick="update_participant_badge();"> Participants</a></li>
                    <li><a href="V_Team.php"> Team</a></li>
                    <li><a href="V_Speaker.php"> Speakers</a></li>
                    <li><a href="V_Admins.php"> Admins</a></li>
                    <li><a href="V_Conference.php"> Conference</a></li>
                    <li class="active"><a href="V_Sponsor.php"> Sponsors</a></li>
            </ul>
            <div class="navbar-right" style="color:white;margin-top:15px;">
            	<span style="margin-right:20px">Welcome, <?php $admin_info=$_SESSION['Admin']; 
                echo $admin_info->name.' '.$admin_info->lastname;  ?></span>
            </div>
         </div>
      </nav>


      <header id="header">
         <div class="container">
            <div class="row">
               <div class="col-md-10">
                  <h1><span class="ion-android-star" aria-hidden="true"></span> Sponsors <small> Sponsors Management
                     </small>
                  </h1>
               </div>
               <div class="col-md-2">
                  <div class="dropdown create">
                     <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <span class="ion-gear-b" aria-hidden="true"></span> My Account
                     <span class="caret"></span>
                     </button>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="V_EditAccount.php"><span style="color:#262627 " class="ion-ios-gear-outline" aria-hidden="true"> </span> Edit Account</a></li>
                        <li><a href="_Logout.php"><span style="color:#262627 " class="ion-log-out" aria-hidden="true"> </span> Logout</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>


      <section class="breadcrumb">
         <div class="container">
            <ol class="breadcrumb" style="padding:0;margin:0;">
               <li class="active">Dashboard / Participants</li>
            </ol>
         </div>
      </section>



      <div id="main1"></div>
      <section id="main">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="list-group">
                     <a href="V_Dashboard.php" class="list-group-item"><span class="ion-home" aria-hidden="true"></span> Dashboard</a>
                     <a onclick="update_file_badge();"  class="list-group-item"><i class="ion-document-text"></i></span> Files<span class="badge"><?= Admin::newFile1() /*number of new files*/?></span></a>
                     <a onclick="update_participant_badge();" class="list-group-item"><span class="ion-android-contacts" aria-hidden="true"></span> Participants</span><span class="badge"><?= Admin::newPart1()?></span></a>
                     <a href="V_Team.php" class="list-group-item"><span class="ion-person-stalker" aria-hidden="true"></span> Team Members</span></a>
                     <a href="V_Speaker.php" class="list-group-item"><span class="ion-speakerphone" aria-hidden="true"></span> Speakers</span></a>
                     <a href="V_Admins.php" class="list-group-item "><span class="ion-android-person-add" aria-hidden="true"></span> Admins</a>
                     <a href="V_Conference.php" class="list-group-item"><span class="ion-android-create" aria-hidden="true"></span> Conference</span></a>
                     <a href="V_Sponsor.php" class="list-group-item active main-color-bg"><span class="ion-android-star" aria-hidden="true"></span> Sponsors</span></a>
                  </div>
               </div>



               <div class="Sponsors" >
                  <form action="../controler/_add_sponsor.php" method="POST" enctype="multipart/form-data">
                     <div class="input-group col-md-2" style="float:left;margin-right:20px">
                        <!-- Sponsor Name -->
                        <span class="input-group-addon ion-ios-compose" id="basic-addon1" style="font-size: 20px"></span>
                        <input type="text" class="form-control" placeholder="Sponsor name" name="name" aria-describedby="basic-addon1">
                     </div>
                     <div class="input-group col-md-3" style="float:left;margin-right:20px;">
                        <!-- Sponsor Website -->
                        <span class="input-group-addon ion-link" id="basic-addon1" style="font-size: 20px"></span>
                        <input type="text" class="form-control" placeholder="Website" name="website" aria-describedby="basic-addon1">
                     </div>
                     <div class="input-group col-md-3" style="float:left;margin-right:20px">
                        <!-- Sponsor Picture/logo -->
                        <span class="input-group-addon ion-upload" id="basic-addon1" style="font-size: 20px"></span>
                        <input type="file" class="form-control" placeholder="Logo" name="picture" aria-describedby="basic-addon1">

                     </div>
                     <button type="Submit" class="btn btn-primary" style="margin-right:10px;margin-bottom: 20px">Submit</button>
                  </form>



                  <div style="overflow: hidden;">
                     <?php 
                        $tab=array();
                        $tab=Admin::showAllSponsor();
                        $tabsize=count($tab);
                        
                        for ($i=0; $i <$tabsize ; $i++) { 
                           
                        ?>
                        
                        
                                            <div class='thumbnail'>
                                                <div class='img'>
                                                <a href="<?= $tab[$i]->website ?>">
                                                 <img src="<?= $tab[$i]->logo ?>" alt='Lights' style='width:100%'> </a>
                                                 </div>
                                                 <div class='caption'>
                                                     <p><?= $tab[$i]->name ?><span onclick="delete_sponsor_function(<?= $tab[$i]->getid() ?>)" class='ion-close-circled'></span></p>
                                                 </div>
                                          </div>
                        
                        <?php 

                        }

                        ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
            
        <div id="result"></div>


      <footer id="footer">
         <p>Copyright ESTE-Conference, &copy; 2018</p>
      </footer>



      <!-- Optional JavaScript -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jBox.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/ajaxForm.js" ></script>
      <script type="text/javascript">
         
         function delete_sponsor_function(data) {
                var conf = confirm("Are you sure that you want to do this operation ?!");
                if (conf == true) {
                    var id=data;

                    $.ajax({
                    type:"POST", 
                        url:"../controler/_delete_sponsor.php",
                        data:{id:+id},
                        success: function(data)
                        {
                            $("#result").html(data);
                        }

                    });
                } 
         }


         function update_file_badge(){
        document.location.href="update_file_badge.php";
          } 
          function update_participant_badge(){
              document.location.href="update_participant_badge.php";
          }

      </script>
   </body>
</html>