
<!DOCTYPE html>
<html lang="en">
    <hrad>
        <?php
        include "shared/header.php";
        ?>
        <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    </head>
    <body>
        <?php
        include "shared/nav.php";
        include "db_connet.php";
        //Query for edit data view
        $query = mysql_query("select * from job_seeker where id='1'");
        $row = mysql_fetch_array($query);
        //Query for data update
        if (!empty($_POST['update'])) {
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
                    $update_datetime=date('Y-m-d H:i:s');
            $query_update = mysql_query("UPDATE 
                    `job_portal`.`job_seeker` 
                  SET
                    `name` = '$_POST[name]',
                    `photo` = '$target_file',
                    `career_objective` = '$_POST[career_objective]',
                    `company_name_1` = '$_POST[company_name_1]',
                    `designation_1` = '$_POST[designation_1]',
                    `time_period_from_1` = '$_POST[time_period_from_1]',
                    `time_period_to_1` = '$_POST[time_period_to_1]',
                    `job_description_1` = '$_POST[job_description_1]',
                    `company_name_2` = '$_POST[company_name_2]',
                    `designation_2` = '$_POST[designation_2]',
                    `time_period_from_2` = '$_POST[time_period_from_2]',
                    `time_period_to_2` = '$_POST[time_period_to_2]',
                    `job_description_2` = '$_POST[job_description_2]',
                    `institute_name_1` = '$_POST[institute_name_1]',
                    `degree_1` = '$_POST[degree_1]',
                    `education_time_period_from_1` = '$_POST[education_time_period_from_1]',
                    `education_time_period_to_1` = '$_POST[education_time_period_to_1]',
                    `education_description_1` = '$_POST[education_description_1]',
                    `institute_name_2` = '$_POST[institute_name_2]',
                    `degree_2` = '$_POST[degree_2]',
                    `education_time_period_from_2` = '$_POST[education_time_period_from_2]',
                    `education_time_period_to_2` = '$_POST[education_time_period_to_2]',
                    `education_description_2` = '$_POST[education_description_2]',
                    `special_qualification` = '$_POST[special_qualification]',
                    `language_name_1` = '$_POST[language_name_1]',
                    `language_efficiency_1` = '$_POST[language_efficiency_1]',
                    `language_name_2` = '$_POST[language_name_2]',
                    `language_efficiency_2` = '$_POST[language_efficiency_2]',
                    `language_name_3` = '$_POST[language_name_3]',
                    `language_efficiency_3` = '$_POST[language_efficiency_3]',
                    `father_name` = '$_POST[father_name]',
                    `mother_name` = '$_POST[mother_name]',
                    `date_of_birth` = '$_POST[date_of_birth]',
                    `permanent_address` = '$_POST[permanent_address]',
                    `nationality` = '$_POST[nationality]',
                    `declaration` = '$_POST[declaration]',
                    `update_datetime` = '$update_datetime'
                  WHERE `id` = '1'");
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>

        <section class=" job-bg ad-details-page">
            <div class="container">

                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Post Resume</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">Post My Resume</h2>
                </div><!-- banner -->

                <div class="job-postdetails post-resume">
                    <div class="row">	
                        <div class="col-md-8 clearfix">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="section express-yourself">
                                        <h4>Express Yourself</h4>
                                        <div class="row form-group">
                                            <label class="col-sm-4 label-title">Full Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="ex Jhon Doe">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-4 label-title">Photo</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
                                            </div>
                                        </div>
                                    </div><!-- postdetails -->

                                    <div class="section career-objective">
                                        <h4>Career Objective</h4>
                                        <div class="form-group">
                                            <textarea class="form-control" name="career_objective" placeholder="Write few lines about your career objective" rows="8"><?php echo $row['career_objective']; ?></textarea>		
                                        </div>
                                        <span>1000 characters left</span>
                                    </div><!-- career-objective -->

                                    <div class="section">
                                        <h4>Work History 1</h4>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Compnay Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="company_name_1" class="form-control" value="<?php echo $row['company_name_1']; ?>" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Designation</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="designation_1" class="form-control" value="<?php echo $row['designation_1']; ?>" placeholder="Human Resource Manager">
                                            </div>
                                        </div>
                                        <div class="row form-group time-period">
                                            <label class="col-sm-3 label-title">Time Period</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="time_period_from_1" class="form-control" value="<?php echo $row['time_period_from_1']; ?>" placeholder="dd/mm/yy"><span>-</span>
                                                <input type="date" name="time_period_to_1" class="form-control pull-right" value="<?php echo $row['time_period_to_1']; ?>" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                        <div class="row form-group job-description">
                                            <label class="col-sm-3 label-title">Job Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="job_description_1" class="form-control" placeholder="" rows="8"><?php echo $row['job_description_1']; ?></textarea>		
                                            </div>
                                        </div>
                                    </div><!-- work-history -->
                                    <div class="section">
                                        <h4>Work History 2</h4>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Compnay Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="company_name_2" class="form-control" value="<?php echo $row['company_name_2']; ?>" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Designation</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="designation_2" class="form-control" value="<?php echo $row['designation_2']; ?>" placeholder="Human Resource Manager">
                                            </div>
                                        </div>
                                        <div class="row form-group time-period">
                                            <label class="col-sm-3 label-title">Time Period</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="time_period_from_2" class="form-control" value="<?php echo $row['time_period_from_2']; ?>" placeholder="dd/mm/yy"><span>-</span>
                                                <input type="date" name="time_period_to_2" class="form-control pull-right" value="<?php echo $row['time_period_to_2']; ?>" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                        <div class="row form-group job-description">
                                            <label class="col-sm-3 label-title">Job Description</label>
                                            <div class="col-sm-9">
                                                <textarea  name="job_description_2" class="form-control" placeholder="" rows="8"><?php echo $row['job_description_2']; ?></textarea>		
                                            </div>
                                        </div>
                                    </div><!-- work-history -->

                                    <div class="section education-background">
                                        <h4>Education Background 1</h4>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Institute Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="institute_name_1" class="form-control" value="<?php echo $row['institute_name_1']; ?>" placeholder="ropbox">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Degree</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="degree_1" class="form-control" value="<?php echo $row['degree_1']; ?>" placeholder="Human Resource Manager">
                                            </div>
                                        </div>
                                        <div class="row form-group time-period">
                                            <label class="col-sm-3 label-title">Time Period</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="education_time_period_from_1" class="form-control" value="<?php echo $row['education_time_period_from_1']; ?>" placeholder="dd/mm/yy"><span>-</span>
                                                <input type="date" name="education_time_period_to_1" class="form-control pull-right" value="<?php echo $row['education_time_period_to_1']; ?>" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                        <div class="row form-group job-description">
                                            <label class="col-sm-3 label-title">Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="education_description_1" class="form-control" placeholder="" rows="8"><?php echo $row['education_description_1']; ?></textarea>		
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section education-background">
                                        <h4>Education Background 2</h4>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Institute Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="institute_name_2" class="form-control" value="<?php echo $row['institute_name_2']; ?>" placeholder="ropbox">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Degree</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="degree_2" class="form-control" value="<?php echo $row['degree_2']; ?>" placeholder="Human Resource Manager">
                                            </div>
                                        </div>
                                        <div class="row form-group time-period">
                                            <label class="col-sm-3 label-title">Time Period</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="education_time_period_from_2" class="form-control" value="<?php echo $row['education_time_period_from_2']; ?>" placeholder="dd/mm/yy"><span>-</span>
                                                <input type="date" name="education_time_period_to_2" class="form-control pull-right" value="<?php echo $row['education_time_period_to_2']; ?>" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                        <div class="row form-group job-description">
                                            <label class="col-sm-3 label-title">Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="education_description_2" class="form-control" placeholder="" rows="8"><?php echo $row['education_description_2']; ?></textarea>		
                                            </div>
                                        </div>
                                    </div>




                                    <!-- work-history -->

                                    <div class="section special-qualification">
                                        <h4>Special Qualification</h4>
                                        <div class="form-group item-description">
                                            <textarea class="form-control" name="special_qualification" id="special_qualification" placeholder="Write few lines about your special qualification" rows="8"><?php echo $row['special_qualification']; ?></textarea>
                                        </div>								
                                    </div><!-- special-qualification -->								

                                    <div class="section language-proficiency">
                                        <h4>Language Proficiency:</h4>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Language Name1</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="language_name_1" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="language_efficiency_1" class="form-control">
                                                    <option value="">Select Efficiency</option>
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Language Name1</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="language_name_2" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="language_efficiency_2" class="form-control">
                                                    <option value="">Select Efficiency</option>
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Language Name1</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="language_name_3" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="language_efficiency_3" class="form-control">
                                                    <option value="">Select Efficiency</option>
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- language-proficiency -->

                                    <div class="section company-information">
                                        <h4>Personal Deatils</h4>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Father's Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="father_name" class="form-control" value="<?php echo $row['father_name']; ?>" placeholder="Robert Doe">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Mother's Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="mother_name" class="form-control" value="<?php echo $row['mother_name']; ?>" placeholder="Ismatic Roderos Doe">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Date of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="date_of_birth" class="form-control" value="<?php echo $row['date_of_birth']; ?>" placeholder="26/01/1982">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Permanent Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="permanent_address" class="form-control" value="<?php echo $row['permanent_address']; ?>" placeholder="United State of America">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Nationality</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nationality" class="form-control" value="<?php echo $row['nationality']; ?>" placeholder="Canadian">
                                            </div>
                                        </div>
                                    </div><!-- section -->

                                    <div class="section special-qualification">
                                        <h4>Declaration</h4>
                                        <div class="form-group item-description">
                                            <textarea class="form-control" name="declaration" id="declaration" placeholder="" rows="8"><?php echo $row['declaration']; ?></textarea>
                                        </div>								
                                    </div><!-- special-qualification -->	
                                </fieldset>
                                <div class="buttons">
                                    <input type="submit" class="btn btn-success" name="update" value="Update"/>
                                </div>	
                            </form><!-- form -->
                        </div>

                        <!-- quick-rules -->	
                        <div class="col-md-4">
                            <div class="section quick-rules">
                                <h4>Quick rules</h4>
                                <p class="lead">Posting an ad on <a href="#">Jobs.com</a> is free! However, all ads must follow our rules:</p>

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
            CKEDITOR.replace('special_qualification');
            CKEDITOR.replace('declaration');
        </script>
    </body>
</html>