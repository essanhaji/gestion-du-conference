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





 <!--========== start register  ==========-->
       
    <section id="registration" class="section registration">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Create your account now</h3>
                </div>
            </div>
                
                <form method="POST" id='myfrom'>
                    <div class="row">
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name" id="fname" name="first_name" required>
                            </div>

                           
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" >
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" >
                            </div>

                            
                        </div>

                        <div class="col-sm-6">
                             <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name" id="lname" name="last_name" >
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" id="Username" name="username" >
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Repeat Password" id="password" name="password2" >
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone" id="cell" name="phone_number" >
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt20"  >
                        <button type="button" id='btn' class="btn btn-black" id="registration-submit-btn">Submit</button>
                    </div>
                </form>
                    <div class="response"></div>

        </div>
    </section>

        <!--========== END register ==========-->


    <?php
        include 'footer.php';
    ?>
    <!-- script -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
           
            $("#btn").click(function(){
            var form = $('#myfrom');
            // var username=$('#username');
            // var OldPassword=$('#OldPassword');
            // var NewPassword=$('#NewPassword');
            // var RePassword=$('#RePassword');

            $.ajax({
              type: "POST",
              url:  "../controler/Register.php" ,
              data: form.serialize(),
              success: function(data)
                {
                    $(".response").html(data);
                }
            });


            });
        });
    </script>
</body>
</html>