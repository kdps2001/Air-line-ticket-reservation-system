<?php
    session_start();

    if(isset($_POST["submit"]))
    {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $dob = $_POST["dob"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
      
        require_once '../config/db_config.php';
        require_once '../addphp/phpfunction.php';

        if(loginExists($conn, $$email, $email) && $_SESSION["email"] != $email)
        {
            header("Location:dashprofile.php?error=emailexists");
            exit();
        }

        $sql = "UPDATE user SET first_name = ?, last_name = ?, dob = ?, user_address = ?, phone = ?, email = ? WHERE user_id = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) 
        {
            header("Location:dashprofile.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssssssi", $first_name, $last_name, $dob, $address, $phone, $email, $_SESSION["user_id"]);
            if (mysqli_stmt_execute($stmt)) 
            {
                // If the query was successful, redirect to the success page
                
                $_SESSION["first_name"] =  $first_name;
                $_SESSION["last_name"] =  $last_name;
                $_SESSION["dob"] =  $dob;
                $_SESSION["email"] =  $email;
                $_SESSION["phone"] = $phone;
                $_SESSION["user_address"] =  $address;
    
                header("Location:dashprofile.php?success=accountupdated");
            } 
            else 
            {
                // If the query failed, redirect with an error message
                header("Location:dashprofile.php?error=updatefails");
            }
            mysqli_stmt_close($stmt);    
    }

    else
    {
        header('location: ../index.php');
    }