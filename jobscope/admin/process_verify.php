<?php
if (empty($_GET)) {
    header("location:index.php");
}

$mysqli = new mysqli("localhost", "root", "", "jobscope");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$id = $mysqli->real_escape_string($_GET['id']);
$q = "UPDATE jobs
        SET j_active=1
        WHERE j_id='$id'";

if ($mysqli->query($q)) {
    $mysqli->close();
    header("location:verify.php");
} else {
    echo "Error: " . $mysqli->error;
}
?>
