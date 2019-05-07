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
            include '_Navbar.php';
    ?>
    
    <!--*********************************
    start submition
    *********************************-->
    <section class="section about">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <figure>
                        <img alt="" class="img-responsive" src="assets/images/reg.png">
                    </figure>
                </div><!-- /.col-sm-6 -->
                <div class="col-sm-7">
                    <h3 class="section-title multiple-title">Registration</h3>
                    <p>
                        The registration fees for the Conference include admission to all oral sessions, proceedings, lunches, and coffee breaks.
                    </p>
                    <p>
                        Note for authors: Please note that contributions will only be published in the LOPAL'2018 Proceedings if at least one of the authors of the paper is registered. The registration fee covers only ONE paper. For every extra paper, an additional 60€ should be added.
                    </p>
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Registration Category</th>
                          <th scope="col">Early Bird Registration*</th>
                          <th scope="col">Standard Registration**</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Regular Participants</td>
                          <td><strong>350&nbsp;€</strong></td>
                          <td><strong>400 €&nbsp;</strong></td>
                        </tr>
                        <tr>
                          <td>African Participants</td>
                          <td><strong>300&nbsp;€&nbsp;</strong><strong>(3000 dhs)</strong></td>
                          <td><strong>400 €&nbsp;</strong></td>
                        </tr>
                        <tr>
                          <td>Students</td>
                          <td><strong>300 €&nbsp;</strong></td>
                          <td><strong>350&nbsp;€</strong></td>
                        </tr>
                        <tr>
                          <td>African Students</td>
                          <td><strong>250&nbsp;€ (2500 dhs)</strong></td>
                          <td><strong>300 € (3000 dhs)</strong></td>
                        </tr>
                      </tbody>
                    </table>
                </div><!-- /.col-sm-6 -->
        </div><!-- /.container -->
        <div class="container">
        <dir class="row">
                            <h3 class="section-title multiple-title"><center>Bank information</center></h3>
<br><br>
                        <div class="col-sm-6">
                            <p>
                                <b>Please transfer the registration fee to the following bank address:</b> 181  810 ESSAOUIRA EST
                                <p><b>Bank Name :</b> Banque Populaire.</p>
                                <p><b>Bank Address :</b> Banque Populaire de Rabat Kenitra, Agence 16 Novembre,              10 Rue 16 Novembre Agdal, Rabat, Morocco.</p>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p><b>Beneficiary Account Name :</b>Association Marocaine de l’Analyse de la Valeur.</p>
                            <p><b>Beneficiary Account Number :</b>181  810  2111600219350005 49.</p>
                            <p><b>Swift Code :</b>BCPOMAMC.</p>
                            <p><b>Transfer Reason :</b>LOPAL’2018 registration fee.</p>   
                        </div>
            </dir>
            <dir class="col-sm-1"></dir>
        </dir>
        <p>
            Please include Bank fees in the payment. Otherwise the conference attendee will be asked to pay this at the registration desk.
        </p>
        </div>
    </section>

    <!--*********************************
    end submition
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
