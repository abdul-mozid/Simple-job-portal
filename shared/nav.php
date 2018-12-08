<!-- header -->
<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/logo.png" alt="Logo"></a>
            </div>
            <!-- /navbar-header -->

            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="job_list.php">Job list</a></li>
                        <!--
                        <li><a href="job_details.php">Job Details</a></li>
                        <li><a href="resume.php">Resume</a></li> 
                        -->
                        <?php
                        if ((!empty($_SESSION)) ) {
                            if($_SESSION['user_type']=='Employer'){
                            ?>
                            <li><a href="post.php">Post Job</a></li> 
                            <li><a href="posted_job.php">Posted Job</a></li>                         
                            <li><a href="profile_details_employeer.php">Profile</a></li> 
                            <?php } }
                            if ((!empty($_SESSION)) ) {
                            if($_SESSION['user_type']=='Job Seeker'){
                            ?>
                            <li><a href="job_seeker_profile.php">My Profile</a></li> 
                            <?php
                            }}
                            ?>
                            <!--
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Pages<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="post_resume.php">Post Resume</a></li>
                                    <li><a href="post.php">Job Post</a></li>
                                    <li><a href="post_resume.php">Edit Resume</a></li>
                                    <li><a href="profile_details.php">profile Details</a></li>
                                    <li><a href="applied_job.php">Applied Job</a></li>
                                    <li><a href="delete_account.php">Close Account</a></li>
                                    <li><a href="signup.php">Job Signup</a></li>
                                    <li><a href="signin.php">Job Signin</a></li>
                                </ul>
                            </li>
                            -->
                        </ul>
                    </div>
                </div><!-- navbar-left -->

                <!-- nav-right -->
                <div class="nav-right">	
                    <?php
                    if ((empty($_SESSION['id'])) && (empty($_SESSION['name']))) {
                    ?>
                    <ul class="sign-in">
                        <li><i class="fa fa-user"></i></li>
                        <li><a href="signin.php">Sign In</a></li>
                        <li><a href="signup.php">Register</a></li>
                    </ul><!-- sign-in -->	
                    <?php
                    }
                    if ((!empty($_SESSION['id'])) && (!empty($_SESSION['name']))) {
                        ?>
                        <a href="logout.php" class="btn">Logout</a>
                        <?php
                    }
                    ?>
            </div>
            <!-- nav-right -->
        </div><!-- container -->
    </nav><!-- navbar -->
</header><!-- header -->