<?php
session_start();

if (empty($_POST)) {
    exit;
}

$msg = array();
if (empty($_POST['title']) || empty($_POST['cat']) || empty($_POST['hours']) ||
    empty($_POST['salary']) || empty($_POST['experience']) || empty($_POST['disc']) || empty($_POST['city'])) {
    $msg[] = "One of your fields is empty";
}

if (!is_numeric($_POST['salary'])) {
    $msg[] = "Only numeric value is valid for salary";
}

if (!is_numeric($_POST['hours'])) {
    $msg[] = "Only numeric value is valid for working hours";
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

    $title = $mysqli->real_escape_string($_POST['title']);
    $cat = $mysqli->real_escape_string($_POST['cat']);
    $hours = $mysqli->real_escape_string($_POST['hours']);
    $salary = $mysqli->real_escape_string($_POST['salary']);
    $experience = $mysqli->real_escape_string($_POST['experience']);
    $disc = $mysqli->real_escape_string($_POST['disc']);
    $city = $mysqli->real_escape_string($_POST['city']);

    $q = "INSERT INTO jobs (j_title, j_owner_name, j_category, j_hours, j_salary, j_experience, j_discription, j_city)
         VALUES ('$title', '" . $_SESSION['unm'] . "', '$cat', '$hours', '$salary', '$experience', '$disc', '$city')";

    if ($mysqli->query($q)) {
        header("location: postjob.php");
    } else {
        echo "Error: " . $q . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
