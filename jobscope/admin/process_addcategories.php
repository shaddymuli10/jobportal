<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == 'admin')) {
    header("location:../index.php");
}
if (empty($_POST)) {
    exit;
}
$msg = array();

if (empty($_POST['nm'])) {
    $msg[] = "One of the field is empty";
}

if (!empty($msg)) {
    echo "<b>Errors:</b><br>";
    foreach ($msg as $k) {
        echo "<li>" . $k;
    }
} else {
    $mysqli = new mysqli("localhost", "root", "", "jobscope");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $nm = $mysqli->real_escape_string($_POST['nm']);
    $q = "INSERT INTO categories (cat_nm) VALUES ('$nm')";
    if ($mysqli->query($q)) {
        $mysqli->close();
        header("location:category.php");
    } else {
        echo "Error: " . $mysqli->error;
    }
}
