
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include "shared/header.php";
        ?>
    </head>
    <body>
        <?php
        include "shared/nav.php";
        include "db_connet.php";
        $udate_datetime=date('Y-m-d H:i:s');
        $qeury_job_category = mysql_query("select * from employeer where id='$_SESSION[id]'");
        $row_job_category = mysql_fetch_array($qeury_job_category);
        if(!empty($_POST)){
            $sql="update `employeer` 
	set
	name= '$_POST[name]' , 
	email_id = '$_POST[email_id]' , 
	password= '$_POST[password]' , 
	mobile_number= '$_POST[mobile_number]' ,
	address= '$_POST[address]' , 
	update_datetime= '$udate_datetime' where id='$_SESSION[id]'";
            $qeury_job_category = mysql_query($sql);
        }
        ?>

        <section class="clearfix job-bg  ad-profile-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Profile Details</li>
                    </ol>						
                    <h2 class="title">My Profile</h2>
                </div><!-- breadcrumb-section -->

                <div class="job-profile section">	
                    <div class="user-profile">
                        <div class="user-images">
                            <img src="images/user.jpg" alt="User Images" class="img-responsive">
                        </div>
                        <div class="user">
                            <h2>Hello, <a href="#"><?php echo $row_job_category['name'];?></a></h2>
                        </div>							
                    </div><!-- user-profile -->

                    <ul class="user-menu">
                        <li class="active"><a href="profile_details.php">Profile Details</a></li>
                    </ul>
                </div><!-- ad-profile -->

                <div class="profile job-profile">
                    <div class="user-pro-section">
                        <!-- profile-details -->
                        <form action="#" method="POST">
                            <div class="profile-details section">
                                <h2>Profile Details</h2>                            
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row_job_category['name'];?>" placeholder="jhondoe@mail.com">
                                </div>
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="email" class="form-control" name="email_id" value="<?php echo $row_job_category['email_id'];?>" placeholder="jhondoe@mail.com">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" name="mobile_number" value="<?php echo $row_job_category['mobile_number'];?>" placeholder="jhondoe@mail.com">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $row_job_category['address'];?>" placeholder="jhondoe@mail.com">
                                </div>
                            </div><!-- profile-details -->

                            <!-- change-password -->
                            <div class="change-password section">
                                <h2>Change password</h2>
                                <!-- form -->
                                <div class="form-group">
                                    <label>New password</label>
                                    <input type="password" name="password" class="form-control">	
                                </div>

                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control">
                                </div>															
                            </div><!-- change-password -->

                            <!-- preferences-settings -->
                            <div class="preferences-settings section">
                                <div class="buttons">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>												
                            </div><!-- preferences-settings -->
                        </form>	
                    </div><!-- user-pro-edit -->
                </div>				
            </div><!-- container -->
        </section><!-- ad-profile-page -->

        <?php include "shared/footer.php";
        ?>




        <!-- JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/price-range.js"></script>   
        <script src="js/main.js"></script>
        <script src="js/switcher.js"></script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-73239902-1', 'auto');
            ga('send', 'pageview');

        </script>	
    </body>
</html>