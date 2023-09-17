<?php
session_start();

if (empty($_POST)) {
    exit;
}

if (empty($_POST['unm']) || empty($_POST['pwd']) || empty($_POST['cat'])) {
    echo "You must enter all fields";
} else {
    $mysqli = new mysqli("localhost", "root", "", "jobscope");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $unm = $mysqli->real_escape_string($_POST['unm']);
    $pwd = $_POST['pwd']; // No need to escape, as we're not hashing the password

    if ($_POST['cat'] == 'employee') {
        $table = 'employees';
        $pwd_column = 'ee_pwd'; // Replace with the actual column name for employee passwords
        $id_column = 'ee_id'; // Replace with the actual column name for employee IDs
        $username_column = 'ee_fnm'; // Use the actual column name for employee usernames
    } elseif ($_POST['cat'] == 'employer') {
        $table = 'employers';
        $pwd_column = 'er_pwd'; // Replace with the actual column name for employer passwords
        $id_column = 'er_id'; // Replace with the actual column name for employer IDs
        $username_column = 'er_fnm'; // Use the actual column name for employer usernames
    } else {
        echo "Invalid user category";
        $mysqli->close();
        exit;
    }

    // Prepare the query with placeholders
    $stmt = $mysqli->prepare("SELECT $pwd_column, $id_column FROM $table WHERE $username_column = ?");
    
    if ($stmt) {
        $stmt->bind_param("s", $unm);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($plain_password, $user_id);
            $stmt->fetch();

            if ($pwd === $plain_password) { // Compare plain text passwords
                // Login
                $_SESSION = array();
                $_SESSION['unm'] = $unm;
                $_SESSION['cat'] = $_POST['cat'];
                $_SESSION['status'] = 1;

                if ($_POST['cat'] == 'employee') {
                    $_SESSION['employee'] = 1;
                    $_SESSION['eeid'] = $user_id;
                } elseif ($_POST['cat'] == 'employer') {
                    $_SESSION['employer'] = 1;
                    $_SESSION['eid'] = $user_id;
                }

                header("location:index.php");
            } else {
                echo "Wrong Password";
            }
        } else {
            echo "No Such User";
        }

        $stmt->close();
    } else {
        echo "Query preparation failed: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
