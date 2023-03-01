<?php 

    # Include the Config file (Database connection)
    include_once "./config.php";

    # Get form data
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);

        # Validation of form data
        if (!preg_match("/^[a-zA-Z ]+$/",$name)) 
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

        if($password != $cpassword) 
        {
            $cpassword_error = "Password and Confirm Password doesn't match"; 
        }

        if(!$error){
            if (mysqli_query($conn, "INSERT INTO users(name, email, password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) 
            {
                header("location: ../register.html");
                exit();
            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
    mysqli_close($conn);

    }



?>
