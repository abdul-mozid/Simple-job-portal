
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include "shared/header.php";
        ?>
        <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    </head>
    <body>
        <!-- header -->
        <header id="header" class="clearfix">
            <?php
            include "shared/nav.php";
            include "db_connet.php";
            if (!empty($_POST)) {
                //File Upload
                $target_dir = "uploads/";
                $time=time();
                $target_file = $target_dir .$time."_". basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $user_id = 1;
                        $insert_datetime = date('Y-m-d H:i:s');
                        $query_insert = mysql_query("INSERT INTO `job_details` (
                            `company_name`,
                            `company_logo`,
                            `job_category`,
                            `job_type`,
                            `title_for_your_job`,
                            `deadline`,
                            `description`,
                            `key_responsibilities`,
                            `requirements`,
                            `district`,
                            `address`,
                            `salary_min`,
                            `salary_max`,
                            `negotiable`,
                            `experience`,
                            `job_function`,
                            `job_post_by`,
                            `job_post_datetime`
                          ) 
                          VALUES
                            (
                              '$_POST[company_name]',
                              '$target_file',
                              '$_POST[job_category]',
                              '$_POST[job_type]',
                              '$_POST[title_for_your_job]',
                              '$_POST[deadline]',
                              '$_POST[description]',
                              '$_POST[key_responsibilities]',
                              '$_POST[requirements]',
                              '$_POST[district]',
                              '$_POST[address]',
                              '$_POST[salary_min]',
                              '$_POST[salary_max]',
                              '$_POST[negotiable]',
                              '$_POST[experience]',
                              '$_POST[job_function]',
                              '$user_id',
                              '$insert_datetime'
                            )");
                        if ($query_insert) {
                            echo "<script>location.replace('index.php');</script>";
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                //End
            }
            ?>

            <section class=" job-bg ad-details-page">
                <div class="container">
                    <div class="breadcrumb-section">
                        <!-- breadcrumb -->
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Job Post </li>
                        </ol><!-- breadcrumb -->						
                        <h2 class="title">Post Your Job</h2>
                    </div><!-- banner -->

                    <div class="job-postdetails">
                        <div class="row">	
                            <div class="col-md-8">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="section postdetails">
                                            <h4>Post Your Job<span class="pull-right">* Mandatory Fields</span></h4>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Company Name<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Ex: Google" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Company Logo<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
                                                </div>
                                            </div>
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Job Category</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="job_category" required>
                                                        <option value="">Select</option>
                                                        <?php
                                                        $query_category = mysql_query("select * from job_category order by category_name asc");
                                                        while ($row_category = mysql_fetch_array($query_category)) {
                                                            ?>
                                                            <option value="<?php echo $row_category['id']; ?>"><?php echo $row_category['category_name']; ?></option>
                                                        <?php } ?>
                                                    </select>	
                                                </div>
                                            </div>			
                                            <div class="row form-group">
                                                <label class="col-sm-3">Job Type<span class="required">*</span></label>
                                                <div class="col-sm-9 user-type">
                                                    <input type="radio"  name="job_type" value="Full time" id="full-time" Checked> <label for="full-time">Full Time</label>
                                                    <input type="radio" name="job_type" value="Part time" id="part-time"> <label for="part-time">Part Time</label>	
                                                    <input type="radio" name="job_type" value="Contract" id="contract"> <label for="contract">Contract</label>	
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Title for your job<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="title_for_your_job" name="title_for_your_job" placeholder="ex, Human Resource Manager" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Deadline<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="deadline" name="deadline" placeholder="ex, Human Resource Manager" required>
                                                </div>
                                            </div>
                                            <div class="row form-group item-description">
                                                <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="description" name="description" placeholder="Write few lines about your jobs" rows="8" required></textarea>		
                                                </div>
                                            </div>
                                            <div class="row form-group item-description">
                                                <label class="col-sm-3 label-title">Key Responsibilities<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="key_responsibilities" name="key_responsibilities" placeholder="Write few lines about your jobs" rows="8" required></textarea>		
                                                </div>
                                            </div>
                                            <div class="row form-group item-description">
                                                <label class="col-sm-3 label-title">Requirements<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="requirements" name="requirements" placeholder="Write few lines about your jobs" rows="8" required></textarea>		
                                                </div>
                                            </div>
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Location<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="district" required>
                                                        <?php
                                                        $query = mysql_query("select * from districts order by name asc");
                                                        while ($row = mysql_fetch_array($query)) {
                                                            ?>
                                                            <option value="<?php echo $row['district_id']; ?>"><?php echo $row['name']; ?></option>
                                                        <?php } ?>
                                                    </select>	
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Address<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="ex, 51/A, Kolabagan, Panthopath" required>
                                                </div>
                                            </div>
                                            <div class="row form-group select-price">
                                                <label class="col-sm-3 label-title">Salary<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <label>$</label>
                                                    <input type="text" class="form-control" id="Salary_min" name="salary_min" placeholder="Min">
                                                    <span>-</span>
                                                    <input type="text" class="form-control" id="Salary_max" name="salary_max" placeholder="Max">
                                                    <label for="negotiable"> </label>

                                                </div>
                                            </div>	
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Negotiable<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="negotiable">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Experience<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="experience" required>
                                                        <option value="Entry Level">Entry Level</option>
                                                        <option value="Mid Level">Mid Level</option>
                                                        <option value="Top Level">Top Level</option>
                                                    </select>	
                                                </div>
                                            </div>	
                                            <div class="row form-group brand-name">
                                                <label class="col-sm-3 label-title">Job Function</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="job_function" placeholder="human, reosurce, job, hrm">
                                                </div>
                                            </div>											
                                        </div><!-- postdetails -->





                                        <div class="checkbox section agreement">
                                            <button type="submit" class="btn btn-primary">Post Your Job</button>
                                        </div><!-- section -->

                                    </fieldset>
                                </form><!-- form -->	
                            </div>


                            <!-- quick-rules -->	
                            <div class="col-md-4">
                                <div class="section quick-rules">
                                    <h4>Quick rules</h4>
                                    <p class="lead">Posting an ad on <a href="#">jobs.com</a> is free! However, all ads must follow our rules:</p>

                                    <ul>
                                        <li>Make sure you post in the correct category.</li>
                                        <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                        <li>Do not upload pictures with watermarks.</li>
                                        <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                        <li>Do not put your email or phone numbers in the title or description.</li>
                                        <li>Make sure you post in the correct category.</li>
                                        <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                        <li>Do not upload pictures with watermarks.</li>
                                        <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                    </ul>
                                </div>
                            </div><!-- quick-rules -->	
                        </div><!-- photos-ad -->				
                    </div>	
                </div><!-- container -->
            </section><!-- main -->

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
            <script>
                //script for ckeditor
                CKEDITOR.replace('description');
                CKEDITOR.replace('key_responsibilities');
                CKEDITOR.replace('requirements');
            </script>
    </body>
</html>