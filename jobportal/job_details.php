<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "jobscope");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$q = "select * from jobs where j_id =" . $_GET['id'];

$res = $mysqli->query($q);

if (!$res) {
    die("Wrong Query: " . $mysqli->error);
}

$row = $res->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Flowerily 
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20090906
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");
    ?>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
<body>
<div id="header-wrapper">
    <div id="header">
        <div id="menu">
            <?php
            include("includes/menu.inc.php");
            ?>
        </div>
        <!-- end #menu -->
        <div id="search">
            <?php
            include("includes/search.inc.php");
            ?>
        </div>
        <!-- end #search -->
    </div>
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
    <?php
    include("includes/logo.inc.php");
    ?>
</div>
<div id="wrapper">
    <div id="page">
        <div id="page-bgtop">
            <hr />
            <!-- end #logo -->
            <div id="content">
                <div class="post">
                    <h2 class="title"><center><?php echo $row['j_title']; ?></center></h2>
                    <p class="meta"></p>
                    <div class="entry">
                        <table width="100%" border="0">
                            <?php
                            echo '<tr><td width="30%"><b>Category:</b><br><td>' . $row['j_category'] . '</td></tr>
                                <tr><td><b>Salary:</b></td><td>' . $row['j_salary'] . '</td></tr>
                                <tr><td><b>Hours:</b></td><td>' . $row['j_hours'] . '</td></tr>
                                <tr><td><b>Experience:</b></td><td>' . $row['j_experience'] . '</td></tr>
                                <tr><td><b>City:</b></td><td>' . $row['j_city'] . '</td></tr>
                                <tr><td><b>Description:</b></td><td>' . $row['j_discription'] . '</td></tr>';
                            ?>
                        </table>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['status']) && $_SESSION['cat'] == "employee") {
                            echo '<center><a href="process_apply.php?jid=' . $row['j_id'] . '"><button>Apply</button></a></center>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- end #content -->
            <div id="sidebar">
                <?php
                include("includes/sidebar.inc.php");
                ?>
            </div>
            <!-- end #sidebar -->
            <div style="clear: both;">&nbsp;</div>
        </div>
    </div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
    <div id="footer">
        <?php
        include("includes/footer.inc.php");
        ?>
    </div>
</div>
<!-- end #footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
