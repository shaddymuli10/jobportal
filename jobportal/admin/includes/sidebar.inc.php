<ul>
    <li>
        <b>Login:</b><br> <input type="text">
        <br>
        <br>
        <b>Password:</b><br><input type="text">
    </li>
    <li>
        <h2>categories </h2>
        <ul>
            <?php
            $mysqli = new mysqli("localhost", "root", "", "jobscope");
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $q = "SELECT * FROM categories";
            $res = $mysqli->query($q);

            while ($row = $res->fetch_assoc()) {
                $catNm = $row['cat_nm'];
                echo '<li><a href="jobs_by_category.php">' . $catNm . '</a></li>';
            }

            $mysqli->close();
            ?>
        </ul>
    </li>
</ul>

						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
							<li><a href="jobs_by_category.php">IT-software service</a></li>
							<li><a href="jobs_by_category.php">IT-hardware service</a></li>
							<li><a href="jobs_by_category.php">Atomobile</a></li>
							<li><a href="jobs_by_category.php">Banking</a></li>
							<li><a href="jobs_by_category.php">Construction</a></li>
							<li><a href="jobs_by_category.php">Engineering design</a></li>
						    <li><a href="jobs_by_category.php">Export-Inport</a></li>
					        <li><a href="jobs_by_category.php">Travel</a></li>
							<li><a href="jobs_by_category.php">AirLine</a></li>
							<li><a href="jobs_by_category.php">Telecom</a></li>
							<li><a href="jobs_by_category.php">Insurance</a></li>



						</ul>
					</li>
					
				</ul>