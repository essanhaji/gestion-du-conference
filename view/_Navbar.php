<!--*********************************
    start navbar
    *********************************-->
                <?php 
                        require_once '../model/Admin.php';
                        require_once '../model/Conference.php';
                        $info = array();
                        $info = Admin::showConference();

                ?>
    <nav id="site-nav" class="navbar navbar-custom" style="background:black">
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
                    <li><a  href="_index.php">Home</a></li>
                    <li><a  href="_about.php">About Us</a></li>
                    <li><a  href="_Registration.php">Registration</a></li>
                    <li><a  href="_speakers.php">Speakers</a></li>
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