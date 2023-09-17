<?php
session_start();

if (empty($_GET)) {
    header("location:index.php");
}

$mysqli = new mysqli("localhost", "root", "", "jobscope");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$q = "INSERT INTO applicants (a_uid, a_jid) VALUES (?, ?)";

$stmt = $mysqli->prepare($q);

if ($stmt) {
    $stmt->bind_param("ii", $_SESSION['eeid'], $_GET['jid']);
    $stmt->execute();
    $stmt->close();
    header("location:index.php");
} else {
    echo "Query preparation failed: " . $mysqli->error;
}

$mysqli->close();
?>
