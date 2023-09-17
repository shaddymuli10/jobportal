<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == 'admin')) {
    header("location:../index.php");
}

$mysqli = new mysqli("localhost", "root", "", "jobscope");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$q = "SELECT * FROM jobs WHERE j_active=0";
$res = $mysqli->query($q);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		<div id="search">
		<?php
		include("includes/search.inc.php");
		?>
		</div>
	</div>
</div>
<div id="logo">
	<?php
	include("includes/logo.inc.php");
	?>
	</div>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<hr />
			<div id="content">
				<div class="post">
					
					<h2 class="title"><center><font color="red">Verify</font></center></h2>
					<p class="meta"></p>
					<div class="entry">
					<table border="0" width="100%">
					<tr>
						<td>No</td>
						<td>Job Title</td>
						<td>Category</td>
						<td>Accept</td>
					</tr>
						<?php
						$count = 1;
						while ($row = $res->fetch_assoc()) {
                            $jId = $row['j_id'];
                            $jTitle = $row['j_title'];
                            $jCategory = $row['j_category'];

                            echo '<tr>
                                    <td>' . $count . '</td>
                                    <td>' . $jTitle . '</td>
                                    <td>' . $jCategory . '</td>
                                    <td><a href="process_verify.php?id=' . $jId . '">Accept</a></td>
                                </tr>';
                            $count++;
                        }
						?>
						</table>
					</div>
				</div>
				
			</div>
			<div id="sidebar">
			<div style="clear: both;">&nbsp;</div>
		</div>
	</div>
</div>
<div>
<p> <br></p>
</div>
<div>
<p><br></p>
</div>
<div>
<p><br></p>
</div>
<div>
<p><br></p>
</div>
<div>
<p><br></p>
</div>
<div>
<p><br></p>
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
