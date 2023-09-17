<?php
session_start();

if (!isset($_SESSION['status'])) {
    header("location:index.php");
}

$mysqli = new mysqli("localhost", "root", "", "jobscope");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$q = "SELECT * FROM jobs WHERE j_owner_name='" . $_SESSION['unm'] . "'";

$res = $mysqli->query($q) or die("Wrong query");

include("includes/head.inc.php");
?>

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
        <div id="search">
            <?php include("includes/search.inc.php"); ?>
        </div>
    </div>
</div>
<div id="logo">
    <?php include("includes/logo.inc.php"); ?>
</div>
<div id="wrapper">
    <div id="page">
        <div id="page-bgtop">
            <hr />
            <div id="content">
                <div class="post">
                    <h2 class="title">Manage jobs</h2>
                    <p class="meta"></p>
                    <div class="entry">
                        <center><b>Your jobs</b></center>
                        <table border="0" width="100%">
                            <tr>
                                <td width="20%">No</td>
                                <td width="50%">Title</td>
                                <td width="20%">Show</td>
                                <td width="10%">Delete</td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <?php
                            $count = 1;
                            while ($row = $res->fetch_assoc()) {
                                echo '<tr> <td width="10%">' . $count . '
                                        <td width="50%"><a href="job_details.php?id=' . $row['j_id'] . '">' . $row['j_title'] . '
                                        <td width="10%"><a href="show.php?id=' . $row['j_id'] . '&nm=' . $row['j_title'] . '">show</a>
                                        <td><a href="process_del_job.php?id=' . $row['j_id'] . '"><img src="images/delete.png"></a></tr>';
                                $count++;
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <?php include("includes/sidebar.inc.php"); ?>
            </div>
            <div style="clear: both;">&nbsp;</div>
        </div>
    </div>
</div>
<div id="footer-bgcontent">
    <div id="footer">
        <?php include("includes/footer.inc.php"); ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
