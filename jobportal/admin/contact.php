<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == 'admin')) {
    header("location:../index.php");
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
                <h1 class="title">Recent Contact</h1>
                <p class="byline"><small></small></p>

                <div class="entry">
                    <br>
                    <table border="1" width="100%">

                        <tr>
                            <td width="25%"><b>NAME</b>
                            <td width="65%"><b>QUERY</b>
                            <td width="10%"><b>DEL</b>
                        </tr>

                        <?php
                        $mysqli = new mysqli("localhost", "root", "", "jobscope");
                        if ($mysqli->connect_error) {
                            die("Connection failed: " . $mysqli->connect_error);
                        }

                        $q = "SELECT * FROM contact";
                        $result = $mysqli->query($q);
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>
                                        ' . $row['cont_fnm'] . '<br><small>' . $row['cont_email'] . '</small><br><br>
                                        <td>' . $row['cont_query'] . '
                                        <td><a href="process_delete.php?cat=' . $row['cont_fnm'] . '"><img src="delete.png"></a>
                                    </tr>
                                ';
                            }
                        } else {
                            echo "Error: " . $mysqli->error;
                        }

                        $mysqli->close();
                        ?>
                    </table>
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
