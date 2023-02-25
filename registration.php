<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>Registration</title>
        <link rel="stylesheet" href="phonestyle.css"/>
    </head>
    <body>

    <?php
    //Here we create the connection with the database through our connection file by creating a connection variable
    //that contains the OpenConn() function.
    require('db_connection.php');
    $conn = OpenCon();
    // The if statement checks if the form is submitted and a username is set
    if (isset($_POST['username'])) {
        // With stripslashes we remove backslashes from the entered username
        $username = stripslashes($_POST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        if(empty($password)){
            echo "<div class='form'>
                      <h3>Please fill in a password.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>try</a> again.</p>
                      </div>";
        }else {
            $query = "INSERT into `users` (username, password) VALUES ('$username', '$password')";
            $result = $conn->query($query);

            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
            }
        }
    } else {
        ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="password" class="login-input" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
        <?php
    }
    ?>

    </body>
</html>
