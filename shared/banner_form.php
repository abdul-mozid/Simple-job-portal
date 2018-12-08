<?php
include "db_connet.php";
?>
<div class="banner-form banner-form-full job-list-form">
    <form action="job_list.php" method="post">
        <!-- category-change -->						
        <select class="form-control" name="category">
            <option value="">Select Category</option>
            <?php
            $qeury_job_category = mysql_query("select * from job_category order by id asc");
            while ($row_job_category = mysql_fetch_array($qeury_job_category)) {
                ?>
            <option value="<?php echo $row_job_category['id'];?>"><?php echo $row_job_category['category_name'];?></option>
            <?php } ?>
        </select>			
        <select class="form-control" name="location">
            <option value="">Select Location</option>
            <?php
            $qeury_districts = mysql_query("select * from districts order by district_id asc");
            while ($row_districts = mysql_fetch_array($qeury_districts)) {
                ?>
            <option value="<?php echo $row_districts['district_id'];?>"><?php echo $row_districts['name'];?></option>
            <?php } ?>
        </select>

        <input type="text" class="form-control" name="keyword" placeholder="Type your key word">
        <button type="submit" class="btn btn-primary" value="Search">Search</button>
    </form>
</div><!-- banner-form -->