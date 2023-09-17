<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == 'admin')) {
    header("location:../index.php");
}

if (empty($_POST)) {
    exit;
}
$msg = array();

if (empty($_POST['name'])) {
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

    $name = $mysqli->real_escape_string($_POST['name']);
    $q = "DELETE FROM categories WHERE cat_nm='$name'";
    if ($mysqli->query($q)) {
        $mysqli->close();
        header("location:category.php");
    } else {
        echo "Error: " . $mysqli->error;
    }
}
