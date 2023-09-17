<?php
$mysqli = new mysqli("localhost", "root", "", "jobscope");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

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
            <div class="post">
                <h1 class="title">Recent Job Applicants</h1>
                <p class="byline"><small></small></p>

                <div class="entry">
                    <br>
                    <?php
                    $query = "SELECT a.a_id, j.j_title, j.j_category, e.ee_fnm, e.ee_email
                              FROM applicants a
                              JOIN jobs j ON a.a_jid = j.j_id
                              JOIN employees e ON a.a_uid = e.ee_id";

                    $result = $mysqli->query($query);

                    if ($result && $result->num_rows > 0) {
                        echo "<table border='1'>
                                <tr>
                                    <th>Application ID</th>
                                    <th>Job Title</th>
                                    <th>Job Category</th>
                                    <th>Employee First Name</th>
                                    <th>Employee Email</th>
                                </tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['a_id'] . "</td>
                                    <td>" . $row['j_title'] . "</td>
                                    <td>" . $row['j_category'] . "</td>
                                    <td>" . $row['ee_fnm'] . "</td>
                                    <td>" . $row['ee_email'] . "</td>
                                  </tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No applied jobs found.";
                    }

                    $mysqli->close();
                    ?>
                </div>
                <p class="meta"></p>
            </div>
        </div>
    </div>
    <div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
<div> <br></div>
</div><!-- end #page -->
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
