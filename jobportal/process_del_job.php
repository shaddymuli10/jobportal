<?php
if (empty($_GET)) {
    header("location: index.php");
}

$mysqli = new mysqli("localhost", "root", "", "jobscope");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$id = $_GET['id'];
$q = "DELETE FROM jobs WHERE j_id = $id";

if ($mysqli->query($q)) {
    header("location: manage.php");
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>
