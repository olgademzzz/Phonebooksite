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
    <?php
    include('auth_session.php');
    //Here we create the connection with the database through our connection file by creating a connection variable
    //that contains the OpenConn() function.
    require('db_connection.php');
    $conn = OpenCon();

    if (isset($_POST['firstname'])) {
        // With stripslashes we remove backslashes from the entered username
        $firstname = stripslashes($_POST['firstname']);
        //escapes special characters in a string
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname = stripslashes($_POST['lastname']);
        $lastname = mysqli_real_escape_string($conn, $lastname);
        $number = $_POST['phonenumber'];
        //Here we check if any fields are empty on submit. If so, the user will receive a message and the upload won't complete.
        if (empty($firstname)) {
            echo "<div class='form'>
                      <h3>Please insert a name.</h3><br/>
                      <p class='link'>Click here to <a href='addcontact.php'>try</a> again.</p>
                      </div>";
        } else {
            $query = "INSERT into `records` (number, first_name, last_name) VALUES ('$number', '$firstname','$lastname')";
            $result = $conn->query($query);

            if ($result) {
                echo "<div class='form'>
                      <h3>Your contact has been added to the phonebook successfully</h3><br/>
                      <p class='link'>Click here to <a href='home.php'>the phonebook</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='addcontact.php'>add the contact</a> again.</p>
                      </div>";
            }
        }
    }
    ?>
        <form class="form" method="post" name="addcontact">
            <h1 class="addcontact-title">Add a new contact</h1>
            <input type="text" class="add-input" name="firstname" placeholder="First name" autofocus="true"/>
            <input type="text" class="add-input" name="lastname" placeholder="Last name"/>
            <input type="number" class="add-input" name="phonenumber" placeholder="Phone number"/>
            <input type="submit" value="Add" name="Add" class="add-button"/>
            <p class="link"><a href="home.php">Go back to the phonebook</a></p>
        </form>
    </body>
</html>