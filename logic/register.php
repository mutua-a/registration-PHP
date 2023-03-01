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
    # $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    # Insert user information into database
    $sql = "INSERT INTO tbl_user (username, email, password) VALUES ('$name', '$email', 'pass')";

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
