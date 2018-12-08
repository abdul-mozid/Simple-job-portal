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
        ?>

        <div class="banner-job">
            <div class="banner-overlay"></div>
            <div class="container text-center">
                <h1 class="title">The Easiest Way to Get Your New Job</h1>
                <h3>We offer 12000 jobs vacation right now</h3>
                <?php
                include "shared/banner_form.php";
                ?>

                <ul class="banner-socail list-inline">
                    <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                </ul><!-- banner-socail -->
            </div><!-- container -->
        </div><!-- banner-section -->

        <div class="page">
            <div class="container">
                <div class="section category-items job-category-items  text-center">
                    <ul class="category-list">	
                        <?php
                        $qeury_job_category = mysql_query("select * from job_category order by id asc");
                        while ($row_job_category = mysql_fetch_array($qeury_job_category)) {
                            ?>
                            <li class="category-item">
                                <a href="job_list.php?category_id=<?php echo $row_job_category['id']; ?>">
                                    <div class="category-icon"><img src="images/icon/<?php echo $row_job_category['category_logo']; ?>" alt="images" class="img-responsive"></div>
                                    <span class="category-title"><?php echo $row_job_category['category_name']; ?></span>
                                    <span class="category-quantity">(
                                        <?php
                                        $qeury_count_category = mysql_query("select count(*) as counter from job_details where job_category='$row_job_category[id]'");
                                        $row_job_category = mysql_fetch_array($qeury_count_category);
                                        echo $row_job_category['counter'];
                                        ?>
                                        )</span>
                                </a>
                            </li><!-- category-item -->
                        <?php } ?>				
                    </ul>				
                </div><!-- category ad -->			

                <div class="section latest-jobs-ads">
                    <div class="section-title tab-manu">
                        <h4>Latest Jobs</h4>
                        <!-- Nav tabs -->      
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#recent-jobs" data-toggle="tab">10 New Jobs</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                            <?php
                            $sql = "select *,(select name from districts where district_id=job_details.district) as dist_name from job_details order by id desc limit 0,10";
                            $qeury_jobs = mysql_query($sql);
                            $num_row = mysql_num_rows($qeury_jobs);
                            if ($num_row > 0) {
                                while ($row_jobs = mysql_fetch_array($qeury_jobs)) {
                                    ?>
                                    <div class="job-ad-item">
                                        <div class="item-info">
                                            <div class="item-image-box">
                                                <div class="item-image">
                                                    <a href="job-details.php"><img src="<?php echo $row_jobs['company_logo']; ?>" alt="Image" class="img-responsive"></a>
                                                </div><!-- item-image -->
                                            </div>

                                            <div class="ad-info">
                                                <span><a href="job-details.php" class="title"><?php echo $row_jobs['title_for_your_job']; ?></a> @ <a href="#"><?php echo $row_jobs['company_name']; ?></a></span>
                                                <div class="ad-meta">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row_jobs['address'] . "," . $row_jobs['dist_name']; ?></a></li>
                                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row_jobs['job_type']; ?></a></li>
                                                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i><?php echo "$" . $row_jobs['salary_min'] . "-" . $row_jobs['salary_max']; ?></a></li>
                                                    </ul>
                                                </div><!-- ad-meta -->									
                                            </div><!-- ad-info -->
                                        </div><!-- item-info -->
                                    </div><!-- job-ad-item -->
                                <?php }
                            } else { ?>
                                <div class="job-ad-item">
                                    <div class="item-info">
                                        <div class="item-image-box">
                                        </div>

                                        <div class="ad-info">
                                            <span><a href="job-details.php" class="title"><font style="color:red;font-weight: bold;text-align: center;">Jobs Not Found.</font></span>
                                            <div class="ad-meta">
                                                <ul>
                                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                                </ul>
                                            </div><!-- ad-meta -->									
                                        </div><!-- ad-info -->
                                    </div><!-- item-info -->
                                </div><!-- job-ad-item -->	
<?php } ?>
                        </div><!-- tab-pane -->
                    </div><!-- tab-content -->
                </div><!-- trending ads -->			
                <div class="section cta cta-two text-center">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="single-cta">
                                <div class="cta-icon icon-jobs">
                                    <img src="images/icon/31.png" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->
                                <h3>
                                    <?php
                                    $qeury_job = mysql_query("select count(*) as counter from job_details");
                                    $row_job = mysql_fetch_array($qeury_job);
                                    echo $row_job['counter'];
                                    ?>
                                </h3>
                                <h4>Live Jobs</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div><!-- single-cta -->

                        <div class="col-sm-4">
                            <div class="single-cta">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-company">
                                    <img src="images/icon/32.png" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->
                                <h3>
                                    <?php
                                    $qeury_company = mysql_query("select count(distinct(company_name)) as counter from job_details");
                                    $row_company = mysql_fetch_array($qeury_company);
                                    echo $row_company['counter'];
                                    ?>
                                </h3>
                                <h4>Total Company</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div><!-- single-cta -->

                        <div class="col-sm-4">
                            <div class="single-cta">
                                <div class="cta-icon icon-candidate">
                                    <img src="images/icon/33.png" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->
                                <h3>
                                    <?php
                                    $qeury_candidate = mysql_query("select count(*) as counter from job_seeker");
                                    $row_candidate = mysql_fetch_array($qeury_candidate);
                                    echo $row_candidate['counter'];
                                    ?>
                                </h3>
                                <h4>Total Candidate</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div><!-- single-cta -->
                    </div><!-- row -->
                </div><!-- cta -->			

            </div><!-- conainer -->
        </div><!-- page -->

        <!-- download -->
        <section id="download" class="clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2>Download on App Store</h2>
                    </div>
                </div><!-- row -->

                <!-- row -->
                <div class="row">
                    <!-- download-app -->
                    <div class="col-sm-4">
                        <a href="#" class="download-app">
                            <img src="images/icon/16.png" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>Google Play</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    <!-- download-app -->
                    <div class="col-sm-4">
                        <a href="#" class="download-app">
                            <img src="images/icon/17.png" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>App Store</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    <!-- download-app -->
                    <div class="col-sm-4">
                        <a href="#" class="download-app">
                            <img src="images/icon/18.png" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>Windows Store</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- download -->

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