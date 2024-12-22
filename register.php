<?php
    include 'connect.php';

    if(isset($_POST['signUp'])){
        $fullName = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];

        if($password != $rePassword){
            echo "Please Re-Enter The Same Password";
        } else {
            $sqlQuery = "INSERT INTO users (fullname, email, password) VALUES ('$fullName', '$email', '$password');";

            if(mysqli_query($conn, $sqlQuery)){
                header("Location: index.php");
                exit(); 
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);
?>
