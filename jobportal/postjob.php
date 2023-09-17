<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include("includes/head.inc.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div id="header-wrapper">
    <div id="header">
        <div id="menu">
            <?php include("includes/menu.inc.php"); ?>
        </div>
        <!-- end #menu -->
        <div id="search">
            <?php include("includes/search.inc.php"); ?>
        </div>
        <!-- end #search -->
    </div>
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
    <?php include("includes/logo.inc.php"); ?>
</div>
<div id="wrapper">
    <div id="page">
        <div id="page-bgtop">
            <hr />
            <!-- end #logo -->
            <div id="content">
                <div class="post">
                    <h2 class="title">POST JOB</h2>
                    <p class="meta">JOB SPECIFICATION</p>
                    <div class="entry">
                        <form action="process_postjob.php" method="post">
                            TITLE<br> <input type="text" name="title" style="width:200px;">
                            <BR><BR>CATEGORIES
                            <br><SELECT name="cat" style="width:200px;">
                                <?php
                                $mysqli = new mysqli("localhost", "root", "", "jobscope");

                                if ($mysqli->connect_error) {
                                    die("Connection failed: " . $mysqli->connect_error);
                                }

                                $query = "SELECT * FROM categories";
                                $result = $mysqli->query($query);

                                if ($result) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option>" . $row['cat_nm'];
                                    }
                                } else {
                                    echo "Error: " . $mysqli->error;
                                }

                                $mysqli->close();
                                ?>
                            </SELECT>
                            <br><BR> WORKING HOURS <BR> <INPUT TYPE="TEXT" name="hours" style="width:200px;">
                            <BR><BR> SALARY<BR><INPUT TYPE="TEXT" name="salary" style="width:200px;">
                            <BR><BR> EXPERIENCE <BR> <INPUT TYPE="TEXT" name="experience" style="width:200px;">
                            <BR><BR>DISCRIPTION<BR> <TEXTAREA name="disc" style="width:200px;"></TEXTAREA >
                            <BR><BR>CITY<BR><INPUT TYPE="TEXT" name="city" style="width:200px;">
                           <br><br> <input type="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
            <!-- end #content -->
            <div id="sidebar">
                <?php include("includes/sidebar.inc.php"); ?>
            </div>
            <!-- end #sidebar -->
            <div style="clear: both;">&nbsp;</div>
        </div>
    </div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
    <div id="footer">
        <?php include("includes/footer.inc.php"); ?>
    </div>
</div>
<!-- end #footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
