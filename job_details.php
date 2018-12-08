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
        $sql = "SELECT *,(SELECT NAME FROM districts WHERE district_id=jd.district) AS district_name, (SELECT category_name FROM job_category WHERE id=jd.job_category) AS job_category_name FROM job_details AS jd LEFT JOIN employeer AS e ON jd.job_post_by=e.id where jd.id='$_GET[job_id]'";
        $qeury_jobs = mysql_query($sql);
        $row = mysql_fetch_array($qeury_jobs);
        ?>

        <section class="job-bg page job-details-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="job-list.php">Job Details</a></li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">Job Details</h2>
                </div><!-- breadcrumb -->

                <?php
                include "shared/banner_form.php";
                ?>

                <div class="job-details">
                    <div class="section job-ad-item">
                        <div class="item-info">
                            <div class="item-image-box">
                                <div class="item-image">
                                    <img src="<?php echo $row['company_logo'];?>" alt="Image" class="img-responsive">
                                </div><!-- item-image -->
                            </div>

                            <div class="ad-info">
                                <span><span><a href="#" class="title"><?php echo $row['title_for_your_job'];?></a></span> @ <a href="#"> <?php echo $row['company_name'];?></a></span>
                                <div class="ad-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['address'].", ".$row['district_name'];?></a></li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row['job_type'];?></a></li>
                                        <li><i class="fa fa-money" aria-hidden="true"></i><?php echo $row['salary_min'];?> - <?php echo $row['salary_max'];?></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i><?php echo $row['job_category_name'];?></a></li>
                                        <li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : <?php echo date('j F, Y',strtotime($row['deadline']));?></li>
                                    </ul>
                                </div><!-- ad-meta -->									
                            </div><!-- ad-info -->
                        </div><!-- item-info -->
                        <div class="social-media">
                            <?php
                            if($_SESSION['user_type'] !='Employer'){
                            ?>
                            <div class="button">
                                <a href="apply.php?job_id=<?php echo $_GET['job_id'];?>" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
                            </div>
                            <?php
                            }
                            ?>
                            <ul class="share-social">
                                <li>Share this ad</li>
                                <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr-square" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>					
                    </div><!-- job-ad-item -->

                    <div class="job-details-info">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="section job-description">
                                    <div class="description-info">
                                        <h1>Description</h1>
                                        <p><?php echo $row['description'];?></p>
                                    </div>
                                    <div class="responsibilities">
                                        <h1>Key Responsibilities:</h1>
                                        <p><?php echo $row['key_responsibilities'];?></p>
                                    </div>
                                    <div class="requirements">
                                        <h1>Minimum Requirements</h1>
                                        <p><?php echo $row['requirements'];?></p>
                                    </div>							
                                </div>							
                            </div>
                            <div class="col-sm-4">
                                <div class="section job-short-info">
                                    <h1>Short Info</h1>
                                    <ul>
                                        <li><span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Job poster: <a href="#"><?php echo $row['name'];?></a></li>
                                        <li><span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>Experience: <a href="#"><?php echo $row['experience'];?></a></li>
                                    </ul>
                                </div>
                                <div class="section company-info">
                                    <h1>Company Info</h1>
                                    <ul>
                                        <li>Compnay Name: <a href="#"><?php echo $row['company_name'];?></a></li>
                                        <li>Address: <?php echo $row['address'].", ".$row['district_name'];?></li>
                                        <li>Industry: <a href="#"><?php echo $row['job_category_name'];?></a></li>
                                        <li>Phone: <?php echo $row['mobile_number'];?></li>
                                        <li>Email: <a href="#"><?php echo $row['email_id'];?></a></li>
                                    </ul>
                                    <ul class="share-social">
                                        <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                    </ul>								
                                </div>
                            </div>
                        </div><!-- row -->					
                    </div><!-- job-details-info -->				
                </div><!-- job-details -->
            </div><!-- container -->
        </section><!-- job-details-page -->

        <section id="something-sell" class="clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="title">Add your resume and let your next job find you.</h2>
                        <h4>Post your Resume for free on <a href="#">Jobs.com</a></h4>
                        <a href="post-resume.html" class="btn btn-primary">Add Your Resume</a>
                    </div>
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- something-sell -->

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
</html>    