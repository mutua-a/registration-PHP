<?php 

    # Include the Config file (Database connection)
    include_once "./config.php";

    # Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);

    # Validation of form data
    if(empty($username) || empty($email) || empty($userpass))
    {
        die("Please fill in all the fields!");
    }

    # Hash password for security
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    # Insert user information into database
    $sql = "INSERT INTO tbl_user (username, email, password) VALUES ('$name', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "Registration successful.";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login | App</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="./styles/main.css" rel="stylesheet">
</head>

<body>

   
    <br />



    <form action="" method="post">

        <header>
            <p class="p">Account Sign Up!</p>
        </header>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="password_1">Password</label>
            <input type="password" name="pass" class="form-control" id="password" placeholder="Enter your password">
        </div>

        <div class="form-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="cpass" class="form-control" id="password" placeholder="Enter your password">
        </div>

        <br/>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary">Register user</button>
        </div>
    </form>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>