<html>
    <head>
        <link rel="stylesheet" href="phonestyle.css">
    </head>
    <body>
        <div class="topnav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="addcontact.php">Add a new contact</a></li>
                <li class="right"><a href="logout.php">Log out</a></li>
            </ul>
        </div>


        <table>
            <tr>
                <th>
                    Phone number
                </th>
                <th>
                    First name
                </th>
                <th>
                    Last name
                </th>
            </tr>

            <?php
            include('auth_session.php');
            include 'db_connection.php';
            $conn = OpenCon();
            $sql = "SELECT * FROM records";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>0' . $row['number'] . '</td>';
                    echo '<td>' . $row['first_name'] . '</td>';
                    echo '<td>' . $row['last_name'] . '</td>';
                    echo '</tr>';
                    }
                } else {
                echo "There are no phone records found";
                }
            ?>
        </table>
    </body>
</html>




