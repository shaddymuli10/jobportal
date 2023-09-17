<?php
if (empty($_POST)) {
    exit;
}

$msg = array();
if (empty($_POST['nm']) || empty($_POST['email']) || empty($_POST['query'])) {
    $msg[] = "One of your fields is empty";
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
    $email = $mysqli->real_escape_string($_POST['email']);
    $query = $mysqli->real_escape_string($_POST['query']);

    $q = "INSERT INTO contact (cont_fnm, cont_email, cont_query)
         VALUES ('$nm', '$email', '$query')";

    if ($mysqli->query($q)) {
        header("location: contact.php");
    } else {
        echo "Error: " . $q . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
