<?php
    if(isset($_POST["submit"]))
    {
        $first_name = $_POST["firstname"];
        $last_name = $_POST["lastname"];
        $email = $_POST["email"];
        $user_name = $_POST["username"];
        $password = $_POST["password"];
        

        require_once '../config/db_config.php';
        require_once 'phpfunction.php';

        $invalidUserName = invalidUserName($user_name);
        $loginExists = loginExists($conn, $user_name, $email);

        if($invalidUserName !== false)
        {
            header("location: ../signup.php?error=invalidUserName");
            exit();
        }

        if($loginExists !== false)
        {
            header("location: ../signup.php?error=loginExists");
            exit();
        }

        create_user($conn, $first_name, $last_name, $email, $user_name, $password, $roleid = 'role00');

    }

    else
    {
        header('location: ../signup.php');
    }