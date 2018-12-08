
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
        if (!empty($_POST)) {
            $update_datetime = date('Y-m-d H:i:s');
            $sql = "insert into job_seeker (name,email_id,password,mobile_number,gender,address,update_datetime) values ( '$_POST[name]', '$_POST[email_id]', '$_POST[password]', '$_POST[mobile_number]', '$_POST[gender]', '$_POST[address]', '$update_datetime' )";
            $query = mysql_query($sql);
            if ($query) {
                echo "<script>location.replace('index.php');</script>";
            }
        }
        ?>

        <section class="job-bg user-page">
            <div class="container">
                <div class="row text-center">
                    <!-- user-login -->			
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="user-account job-user-account">
                            <h2>Create An Account</h2>
                            <ul class="nav nav-tabs text-center" role="tablist">
                                <li role="presentation" class="active"><a href="#find-job" aria-controls="find-job" role="tab" data-toggle="tab">Find A Job</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="find-job">

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email Id">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                        </div>
                                        <input type="submit" name="submit_btn" class="btn btn-success" value="Submit"/>	
                                    </form>
                                </div>
                            </div>				
                        </div>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signup-page -->

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