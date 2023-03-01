<?php 

    # Include the Config file (Database connection)
    include_once "./logic/config.php";
$error;

    # Get form data
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);
        

        # Validation of form data
        if(!preg_match("/^[a-zA-Z ]+$/",$name)) 
        {
            $name_error = "Name must contain only alphabets and space";
        }
   
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
        {
            $email_error = "Please Enter Valid Email ID";
        }
            
        if(strlen($pass) < 6) 
        {
            $pass_error = "Password must be minimum of 6 characters";
        } 

        if($pass != $cpass) 
        {
            $cpass_error = "Password and Confirm Password doesn't match"; 
        }

        if(!$error){
            if (mysqli_query($conn, "INSERT INTO tbl_user(name, email, password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) 
            {
                header("location: ./register.php");
                exit();
            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
    mysqli_close($conn);

    }



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



    <form action="register.php" method="post">

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
            <button type="submit" name="submit" class="btn btn-primary">Register user</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>