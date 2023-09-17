<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == 'admin')) {
    header("location:../index.php");
}
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
            <hr/>
            <!-- end #logo -->
            <div id="content">
                <div class="post">
                    <h2 class="title">Add category</h2>
                    <p class="meta"></p>
                    <div class="entry">
                        <form action="process_addcategories.php" method="POST">
                            Name <input type="text" name="nm"> <input type="submit" value="ok">
                        </form>
                    </div>
                </div>
                <h2 class="title">Delete category</h2>
                <p class="meta"></p>
                <div class="entry">
                    <form action="process_deletecategories.php" method="POST">
                        name
                        <select name="name" style="width:150px;">
                            <?php
                            $mysqli = new mysqli("localhost", "root", "", "jobscope");
                            if ($mysqli->connect_error) {
                                die("Connection failed: " . $mysqli->connect_error);
                            }

                            $q = "SELECT * FROM categories";

                            $result = $mysqli->query($q);
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option>" . $row['cat_nm'];
                                }
                            } else {
                                echo "Error: " . $mysqli->error;
                            }

                            $mysqli->close();
                            ?>
                        </select>
                        <input type="submit" value="ok">
                    </form>
                </div>
            </div><!-- end #content -->    
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
    <div> <br></div>
    <div> <br></div>
    <div> <br></div>
    <div> <br></div>
    <div> <br></div>
    <div> <br></div>
    <div> <br></div>
    <div> <br></div>
</div>

<div id="footer-bgcontent">

    <div id="footer">
        <?php
        include("includes/footer.inc.php");
        ?>    
    </div>
</div>
 <!-- end #footer  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>  
</body>
</html>
