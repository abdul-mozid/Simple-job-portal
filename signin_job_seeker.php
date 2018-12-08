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
        ?>

        <!-- signin-page -->
        <section class="clearfix job-bg user-page">
            <div class="container">
                <div class="row text-center">
                    <!-- user-login -->			
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="user-account">
                            <h2>User Login</h2>




                            <?php
                            $msg = "";

                            if (!empty($_POST)) {

                                include "db_connet.php";
                                $sql = "select * from job_seeker where email_id='$_POST[email]' and password='$_POST[password]'";
                                $query = mysql_query($sql);
                                $count_row = mysql_num_rows($query);
                                if ($count_row > 0) {
                                    $result = mysql_fetch_array($query);
                                    $_SESSION['id'] = $result['id'];
                                    $_SESSION['name'] = $result['name'];
                                    $_SESSION['user_type'] = 'Job Seeker';

                                    echo "<script>location.replace('job_seeker_profile.php');</script>";
                                } else {


                                    echo "<div class='alert alert-danger' role='alert'>wrong username or password</div>";
                                }
                            }
                            echo $msg;
                            ?>

                            <form action="#" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="email" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" >
                                </div>
                                <button type="submit" class="btn" name="submit">Login</button>


                            </form>
                        </div>
                        <a href="job_seeker_signup.php" class="btn-primary">Create a New Account</a>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signin-page -->

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