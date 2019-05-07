<?php

    require_once '../model/Admin.php';  
    require_once '../model/Participant.php'; 
    
    include 'session_test_admin.php';
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/style.css">
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
            <li class="active"><a href="V_Dashboard.php">Dashboard</a></li>
            <li><a onclick="update_file_badge()"> Files</a></li>
            <li><a onclick="update_participant_badge()"> Participants</a></li>
            <li><a href="V_Team.php"> Team</a></li>
            <li><a href="V_Speaker.php"> Speakers</a></li>
            <li><a href="V_Admins.php"> Admins</a></li>
            <li><a href="V_Conference.php"> Conference</a></li>
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
                    <h1><span class="ion-home" aria-hidden="true"></span> Dashboard <small>Manage your site now</small></h1>
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
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="V_Dashboard.php" class="list-group-item active main-color-bg"><span class="ion-home" aria-hidden="true"></span> Dashboard</a>
                        <a onclick="update_file_badge()"  class="list-group-item"><i class="ion-document-text"></i></span> Files<span class="badge"><?= Admin::newFile1() /*number of new files*/?></span></a>
                        <a onclick="update_participant_badge()" class="list-group-item"><span class="ion-android-contacts" aria-hidden="true"></span> Participants</span><span class="badge"><?= Admin::newPart1()?></span></a>
                        <a href="V_Team.php" class="list-group-item"><span class="ion-person-stalker" aria-hidden="true"></span> Team Members</span></a>
                        <a href="V_Speaker.php" class="list-group-item"><span class="ion-speakerphone" aria-hidden="true"></span> Speakers</span></a>
                        <a href="V_Admins.php" class="list-group-item"><span class="ion-android-person-add" aria-hidden="true"></span> Admins</a>
                        <a href="V_Conference.php" class="list-group-item"><span class="ion-android-create" aria-hidden="true"></span> Conference</span></a><a href="V_Sponsor.php" class="list-group-item"><span class="ion-android-star" aria-hidden="true"></span> Sponsors</span></a>
                        


                        <!-- Strart :Calendar -->
                                            <div class="panel panel-default" style="margin-top: 20px">
                                            <div class="panel-heading">
                                                Calendar
                                                <ul class="pull-right panel-settings panel-button-tab-right">
                                                    <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                                        <em class="fa fa-cogs"></em>
                                                    </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <ul class="dropdown-settings">
                                                                    <li><a href="#">
                                                                        <em class="fa fa-cog"></em> Settings 1
                                                                    </a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#">
                                                                        <em class="fa fa-cog"></em> Settings 2
                                                                    </a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#">
                                                                        <em class="fa fa-cog"></em> Settings 3
                                                                    </a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                                            <div class="panel-body">
                                                <div id="calendar"><div class="datepicker datepicker-inline"><div class="datepicker-days" style="display: block;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">March 2018</th><th class="next" style="visibility: visible;">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day">25</td><td class="old day">26</td><td class="old day">27</td><td class="old day">28</td><td class="day">1</td><td class="day">2</td><td class="day">3</td></tr><tr><td class="day">4</td><td class="day">5</td><td class="day">6</td><td class="day">7</td><td class="day">8</td><td class="day">9</td><td class="day">10</td></tr><tr><td class="day">11</td><td class="day">12</td><td class="day">13</td><td class="day">14</td><td class="day">15</td><td class="day">16</td><td class="day">17</td></tr><tr><td class="day">18</td><td class="day">19</td><td class="day">20</td><td class="day">21</td><td class="day">22</td><td class="day">23</td><td class="day">24</td></tr><tr><td class="day">25</td><td class="day">26</td><td class="day">27</td><td class="day">28</td><td class="day">29</td><td class="day">30</td><td class="day">31</td></tr><tr><td class="new day">1</td><td class="new day">2</td><td class="new day">3</td><td class="new day">4</td><td class="new day">5</td><td class="new day">6</td><td class="new day">7</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2018</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
                                            </div>
                                        </div>
                        <!-- END :Calendar -->


                     </div>
                </div>



                <div class="col-md-9">
                    <!--Some statisqtiques-->
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            </span><h3 class="panel-title"><span class="ion-stats-bars" aria-hidden="true"></span> Some Statistics</h3>
                        </div>
                        <div class="panel-body">
                            <!--MORABA3AT-->
                            <div class="col-md-3 center-box">
                                <div class="well">
                                    <h2><span class="ion-android-clipboard" aria-hidden="true"></span> <?= Admin::nbrTotalFile()  ?> </h2>
                                    <h4>Files</h4>
                                </div>
                            </div>
                            <div class="col-md-3 center-box">
                                    <div class="well">
                                        <h2><span class="ion-ios-people" aria-hidden="true"></span> <?= Admin::nbrTotalPart()  ?></h2>
                                        <h4>Participants</h4>
                                    </div>
                            </div>
                            <div class="col-md-3 center-box">
                                        <div class="well">
                                            <h2><span class="ion-mic-a" aria-hidden="true"></span> <?= Admin::nbrTotalSpeakes()  ?></h2>
                                            <h4>Speakers</h4>
                                        </div>
                            </div>
                            <div class="col-md-3 center-box">
                                    <div class="well">
                                        <h2><span class="ion-ios-stopwatch" aria-hidden="true"></span> <?= Admin::nbrTotalDay() ?></h2>
                                        <h4>Days</h4>
                                    </div>
                             </div>
                        </div>
                    </div>

                    <!--Latest users -->
                    <div class="panel panel-default ">
                            <div class="panel-heading main-color-bg">
                              <h3 class="panel-title"><span class="ion-wand" aria-hidden="true"></span> Latest 10 participants </h3>
                            </div>
                            <div class="panel-body">
                              <table class="table table-striped table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                </tr>
                                <?php 
                                    $aa =   array();
                                    $aa = Admin::nbrLastPart();
                                    foreach ($aa as $value) 
                                    {
                                    ?>
                                  <tr>
                                      <td><?php echo $value->getid(); ?></td>
                                      <td><?php echo $value->name; ?></td>
                                      <td><?php echo $value->lastname; ?></td>
                                      <td><?php echo $value->email; ?></td>
                                      <td><?php echo $value->phone_number; ?></td>
                                  </tr>
                                  <?php } ?>
                              </table>
                            </div>
                    </div>


                </div>
            </div>
        </div>
    </section>



    <footer id="footer">
        <p>Copyright ESTE-Conference, &copy; 2018</p>
    </footer>

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>    
    
    <script>
     function update_file_badge(){
        document.location.href="update_file_badge.php";
    }
    function update_participant_badge(){
        document.location.href="update_participant_badge.php";
    }
    </script>
</body>
</html>