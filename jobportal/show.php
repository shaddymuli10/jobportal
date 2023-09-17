<?php
session_start();

if (!isset($_SESSION['status'])) {
    header("location: index.php");
}

$mysqli = new mysqli("localhost", "root", "", "jobscope");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$q = "SELECT * FROM employees WHERE ee_id IN (SELECT a_uid FROM applicants WHERE a_jid = " . $_GET['id'] . ")";
$res = $mysqli->query($q);

include("includes/head.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
					<h2 class="title"><?php echo $_GET['nm']; ?></h2>
					<p class="meta"></p>
					<div class="entry">
						<table border="0" width="100%">
							<tr>
								<td width="10%">No
								<td width="50%">Name
								<td width="30%">Resume
							</tr>
							<?php
							$count = 1;
							while ($row = $res->fetch_assoc()) {
								echo '<tr> <td width="10%">' . $count . '
										<td width="50%">' . $row['ee_fnm'] . '
										<td width="30%"><a href="' . $row['ee_resume'] . '">resume</a>';
								$count++;
							}
							?>
						</table>
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
