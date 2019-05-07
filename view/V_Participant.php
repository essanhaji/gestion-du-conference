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
                    <li class="active"><a onclick="update_participant_badge();"> Participants</a></li>
                    <li><a href="V_Team.php"> Team</a></li>
                    <li><a href="V_Speakers.php"> Speakers</a></li>
                    <li><a href="V_Admins.php"> Admins</a></li>
                    <li><a href="V_Conference.php"> Conference</a></li>
                    <li><a href="V_Sponsors.php"> Sponsors</a></li>
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
                    <h1><span class="ion-android-contacts" aria-hidden="true"></span> Participant <small> Participants Management </small></h1>
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
                <li class="active">Dashboard / Admins</li>
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
                        <a onclick="update_participant_badge();" class="list-group-item  active main-color-bg"><span class="ion-android-contacts" aria-hidden="true"></span> Participants</span><span class="badge"><?= Admin::newPart1()?></span></a>
                        <a href="V_Team.php" class="list-group-item"><span class="ion-person-stalker" aria-hidden="true"></span> Team Members</span></a>
                        <a href="V_Speaker.php" class="list-group-item"><span class="ion-speakerphone" aria-hidden="true"></span> Speakers</span></a>
                        <a href="V_Participant.php" class="list-group-item"><span class="ion-android-person-add" aria-hidden="true"></span> Admins</a>
                        <a href="V_Conference.php" class="list-group-item"><span class="ion-android-create" aria-hidden="true"></span> Conference</span></a>
                        <a href="V_Sponsor.php" class="list-group-item"><span class="ion-android-star" aria-hidden="true"></span> Sponsors</span></a>
                        </div>
                </div>






                 <!--    PANEL  -->
                 <div class="col-md-9">
                    <!-- BUTTONS-->
                    <div class="row">
                            <div class="col-md-12">

                            <ul class="pager" style="margin-top:0;">
                                <li class="previous" style="cursor:pointer">
                                    <a type="button"  data-toggle="modal" data-target=".bd-example-modal-lg"><span class="ion-android-person-add"> Add Participant </span></a>
                                </li>
                                <li class="next" style="cursor:pointer">
                                    <a type="button"  onclick="delete_All_participants()"><span class="ion-trash-b" aria-hidden="true">  Delete All</span></a>
                                </li>
                            </ul>
                            </div>
                    </div>

                <div class="modal fade bd-example-modal-lg add2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog ">

                    <form action="../controler/P_add_participant.php" method="POST">
                    <div class="modal-content">
                      
                            <div class="modal-header">
                                    <h5 class="modal-title" style="display:inline-block;font-size:20px"><b>Add New Participant</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            
                                    <div class="form-group">
                                        <input type="text" name="first_name" placeholder="First Name:" required>
                                        <input type="text" name="last_name" placeholder="Last Name:" required style="float:none">
                                        <br>
                                        <input type="text" name="username" placeholder="Username:" required>
                                        <input type="email" name="email" placeholder="Email:" required>
                                        <input type="password" name="password" placeholder="Password:" required>
                                        <br>
                                        <input type="text" name="phone_number"  placeholder="Phone number:"   required>
                                    </div>
                            </div>
                            <div class="modal-footer" style="clear:both">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                            <button type="vv@c"  class="btn btn-primary" >Add</button>
                            </div>

                    </div>
                  </form>       
                  </div>
                </div>



                <!--LIST OF PARTICIPANTS-->
                <div class="panel panel-default ">
                    <div class="panel-heading main-color-bg">
                        </span><h3 class="panel-title"><span class="ion-android-arrow-dropdown" aria-hidden="true"></span> List Of Participants</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!--input for searching-->
                                <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Filter By Names"/>
                            </div>
                        </div>
                        <br>
                        <table id="myTable" class="table table-striped table-hover">
                            
                                <tr class="header">
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                
                                    <?php  /****** Start : Of List participants ******/
                                    $tab = array();
                                    $tab = Admin::showAllParticipant();
                                
                                    foreach($tab as $value){
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $value->getid() ?></td>
                                        <td><?php echo $value->name ?></td>
                                        <td><?php echo $value->lastname ?></td>
                                        <td><?php echo $value->email ?></td>
                                        <td>
                                            <button type="button" id="sub<?php echo $value->getid() ?>" class="btn btn-default show_admin" onClick="getModal(<?php echo $value->getid() ?>,'<?= $value->name.' '.$value->lastname ?>')" >Edit</button>
                                            <button  onclick="delete_participant(<?php echo $value->getid() ?>)"  type="submit" name="delete_admin_btn" class="btn btn-danger" id="<?php echo $value->getid() ?>">Delete</button>
                                        </td>
                                    </tr>
                                  
                                    
                                     <?php /** End Of List participants */
                                    }
                                    ?>
                                 

                            </table>
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
    <script src="js/jBox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajaxForm.js" ></script>
    <script type="text/javascript">
    var UserId = 3;
    var name;
    
    //Modal of updating
    var modal = new jBox('Modal', {
            width: 450,
            height: 'auto',
            closeButton: 'title',
            animation: false,
            title: 'Edit user',
            ajax: {
                url: 'V_participant_inputs.php',
                data: {
                    id: UserId,
                },
                reload: 'strict',
                setContent: false,
                beforeSend: function() {
                    this.setContent('');
                    this.setTitle('<div class="ajax-sending"><b>Edit participant: '+name+'</div>');
                },
                complete: function(response) {
                },
                success: function(response) {
                    this.setContent('<div class="ajax-success">Response:<tt>' + response + '</tt></div>');
                },
                error: function() {
                    this.setContent('<div class="ajax-error">Oops, something went wrong</div>');
                }
            }
        });
    function getModal(idd,n)
    {
        UserId = idd;
        name = n;
        modal.open();
        modal.ajax({
                url: 'V_participant_inputs.php',
                data: {
                    id: UserId,
                },
                reload: 'strict',
                setContent: false,
                beforeSend: function() {
                    this.setContent('');
                    this.setTitle('<div class="ajax-sending">Edit participant: '+name+'</div>');
                },
                complete: function(response) {
                },
                success: function(response) {
                    this.setContent('<div class="ajax-success"><tt>' + response + '</tt></div>');
                },
                error: function() {
                    this.setContent('<div class="ajax-error">Oops, something went wrong</div>');
                }
            });
    }
    function update_file_badge(){
        document.location.href="update_file_badge.php";
    }

    
    // searhing
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }



    //Delete an participant
        function delete_participant(data) {
            var conf = confirm("Are you sure that you want to do this operation ?!");
            if (conf == true) {
                var id=data;
                    $.ajax({
                        type:"POST", 
                        url:"../controler/P_delete_participant.php",
                        data:{id:+id},
                        success: function(data)
                        {
                            $("#main1").html(data);
                        }
                    }) 
                } 
        }
       
        function delete_All_participants() {
            var conf = confirm("Are you sure that you want to do this operation ?!");
            if (conf == true) {
                $.ajax({
                    url:"../controler/P_deleteALL_Participants.php",
                    success: function(data)
                        {
                            $("#main1").html(data);
                        }
                
                 }); 
                } 
            
        }

    </script>

</body>
</html>
