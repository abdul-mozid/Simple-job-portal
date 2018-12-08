
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include "shared/header.php";
        include "db_connet.php";
        ?>
    </head>
    <body>
        <?php
        include "shared/nav.php";
        ?>

        <section class="job-bg page job-list-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Job List</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">Job List</h2>
                </div>

                <?php
                include "shared/banner_form.php";
                ?>

                <div class="category-info">	
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="accordion">
                                <!-- panel-group -->
                                <div class="panel-group" id="accordion">




                                    <div id="accordion-four" class="panel-collapse collapse">
                                        <!-- panel-body -->
                                        <div class="panel-body">
                                            <label for="full-time"><input type="checkbox" name="full-time" id="full-time"> Full Time</label>
                                            <label for="part-time"><input type="checkbox" name="part-time" id="part-time"> Part Time</label>
                                            <label for="contractor"><input type="checkbox" name="contractor" id="contractor"> Contractor</label>
                                            <label for="intern"><input type="checkbox" name="intern" id="intern"> Intern</label>
                                            <label for="seasonal"><input type="checkbox" name="seasonal" id="seasonal"> Seasonal / Temp</label>
                                        </div><!-- panel-body -->
                                    </div>
                                </div><!-- panel -->


                                <div id="accordion-five" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <label for="training"><input type="checkbox" name="training" id="training"> Training</label>
                                        <label for="entry-level"><input type="checkbox" name="entry-level" id="entry-level"> Entry Level</label>
                                        <label for="mid-senior"><input type="checkbox" name="mid-senior" id="mid-senior"> Mid-Senior Level</label>
                                        <label for="top-level"><input type="checkbox" name="top-level" id="top-level"> Top Level</label>
                                    </div><!-- panel-body -->
                                </div>
                            </div> <!-- panel -->






                        </div><!-- panel-group -->
                    </div>
                </div><!-- accordion-->

                <!-- recommended-ads -->
                <div class="col-md-12">				
                    <div class="section job-list-item">
                        <?php
                        $condition=" 1=1";
                        if(!empty($_POST)){
                            if(!empty($_POST['category'])){
                                $condition.=" and job_category='$_POST[category]'";
                            }
                            if(!empty($_POST['location'])){
                                $condition.=" and district='$_POST[location]'";
                            }
                            if(!empty($_POST['keyword'])){
                                $condition.=" and ((company_name like '%$_POST[keyword]%') or (title_for_your_job like '%$_POST[keyword]%') or (description like '%$_POST[keyword]%') or (address like '%$_POST[keyword]%') or (job_function like '%$_POST[keyword]%'))";
                            }
                        }
                        if(!empty($_GET)){
                            $condition.=" and job_category='$_GET[category_id]'";
                        }
                        $sql="select *,(select name from districts where district_id=job_details.district) as dist_name from job_details where $condition order by id asc";
                        $qeury_jobs = mysql_query($sql);
                        $num_row=  mysql_num_rows($qeury_jobs);
                        if($num_row>0){
                        while ($row_jobs = mysql_fetch_array($qeury_jobs)) {
                            ?>
                            <div class="job-ad-item" onClick="window.location.href = 'job_details.php?job_id=<?php echo $row_jobs['id'];?>'" onMouseOver="this.style.cursor = 'pointer'">
                                <div class="item-info">
                                    <div class="item-image-box">
                                        <div class="item-image">
                                            <a href="job_details.php?job_id=<?php echo $row_jobs['id'];?>"><img src="<?php echo $row_jobs['company_logo'];?>" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div>

                                    <div class="ad-info">
                                        <span><a href="job_details.php?job_id=<?php echo $row_jobs['id'];?>" class="title"><?php echo $row_jobs['title_for_your_job'];?></a> @ <a href="#"><?php echo $row_jobs['company_name'];?></a></span>
                                        <div class="ad-meta">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row_jobs['address'].",".$row_jobs['dist_name'];?></a></li>
                                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row_jobs['job_type'];?></a></li>
                                                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i><?php echo "$".$row_jobs['salary_min']."-".$row_jobs['salary_max'];?></a></li>
                                            </ul>
                                        </div><!-- ad-meta -->									
                                    </div><!-- ad-info -->
                                </div><!-- item-info -->
                            </div><!-- job-ad-item -->
                        <?php } }else{ ?>
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
                        </div>
                    </div><!-- recommended-ads -->

                    <div class="col-md-2 hidden-xs hidden-sm">
                        <div class="advertisement text-center">
                            <a href="#"><img src="images/ads/1.jpg" alt="" class="img-responsive"></a>
                        </div>
                    </div>
                </div>	
            </div>
        </div><!-- container -->
    </section><!-- main -->


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
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ageview');

        </script>	
    </body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                          switcher.js"></script>
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
</html>                                                                                                                                                                                                                                                                                                            