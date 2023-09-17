<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == 'admin')) {
    header("location:../index.php");
}

$mysqli = new mysqli("localhost", "root", "", "jobscope");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$cat = $mysqli->real_escape_string($_GET['cat']);
$q = "DELETE FROM contact WHERE cont_fnm='$cat'";
if ($mysqli->query($q)) {
    $mysqli->close();
    header("location:contact.php");
} else {
    echo "Error: " . $mysqli->error;
}
