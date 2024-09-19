<?php
    if(isset($_POST["submit"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        require_once 'config/db_config.php';

        $sql = "SELECT * FROM user WHERE email='$email' AND user_password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            // Redirect to user dashboard
            header("Location: index.html");
        } 
        else 
        {
        echo "Invalid email or password";
        }

        $conn->close();
    }
    else
    {
        header('Location: pawan.html');
    }
?>
