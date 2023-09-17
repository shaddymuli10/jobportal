<?php
if (empty($_POST)) {
    exit;
}

$msg = array();
if (empty($_POST['nm']) || empty($_POST['cnm']) || empty($_POST['addr']) ||
    empty($_POST['ph']) || empty($_POST['email']) || empty($_POST['profile']) || empty($_POST['pwd'])) {
    $msg[] = "One of your fields is empty";
}

if (strlen($_POST['pwd']) < 6) {
    $msg[] = "Please enter at least 6 character password";
}
if (strlen($_POST['ph']) != 10) {
    $msg[] = "Please enter a 10-digit phone number";
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
    $cnm = $mysqli->real_escape_string($_POST['cnm']);
    $addr = $mysqli->real_escape_string($_POST['addr']);
    $ph = $mysqli->real_escape_string($_POST['ph']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $profile = $mysqli->real_escape_string($_POST['profile']);
    $pwd = $mysqli->real_escape_string($_POST['pwd']); // Use plain text password

    $q = "INSERT INTO employers (er_fnm, er_pwd, er_company, er_add, er_ph, er_email, er_company_profile)
         VALUES ('$nm', '$pwd', '$cnm', '$addr', '$ph', '$email', '$profile')";

    if ($mysqli->query($q)) {
        header("location: employerregister.php");
    } else {
        echo "Error: " . $q . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
