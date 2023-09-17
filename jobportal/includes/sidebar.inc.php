<ul>
    <li>
        <?php
        if (isset($_SESSION['status'])) {
            echo '<h2 class="title">Hello ' . $_SESSION['unm'] . '!</h2>';
        } else {
            echo '
                <form action="process_login.php" method="POST">
                    <h2><b>Members Login </b> </h2>
                    <b>Username:</b><br> <input type="text" name="unm">
                    <br>
                    <br>
                    <b>Password:</b><br><input type="password" name="pwd">
                    <br>
                    <br>
                    <b>TYPE:<br><br><select name="cat">
                        <option> employee
                        <option> employer
                    </select>
                    <br>
                    <br>
                    <b><input type="submit" value="login">
                </form>
            ';
        }
        ?>
    </li>
    <li>
        <h2><b>Job categories</b></h2>
        <ul>
            <?php
            $mysqli = new mysqli("localhost", "root", "", "jobscope");

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $query = "SELECT * FROM categories";
            $result = $mysqli->query($query);

            if (!$result) {
                die("Query failed: " . $mysqli->error);
            }

            while ($row = $result->fetch_assoc()) {
                echo '<li><a href="jobs_by_category.php?cat=' . $row['cat_nm'] . '">' . $row['cat_nm'] . '</a></li>';
            }

            $mysqli->close();
            ?>
        </ul>
    </li>
</ul>
