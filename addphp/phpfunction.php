<?php

function invalidUserName($user_name)
{
    $result;
    if(preg_match("/^[a-zA-Z0-9]*$/", $user_name))
    {
        $result = false;
    }
    else
    {
        $result = true;
    }

    return $result;
}

//This can be cause sql injection attack

 /*   function loginExists($conn, $username, $email) {
        $sql = "SELECT * FROM users WHERE usersUid='$username' OR usersEmail='$email';";
        $result = mysqli_query($conn, $sql);  //$result = $conn->query($sql);

        if ($row = mysqli_fetch_assoc($result)) {
            return $row;
        } else {
            return false;
        }
    }
*/

//  This is safer version
function loginExists($conn, $user_name, $email)
{

    $sql = "SELECT * FROM user WHERE user_name = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    $currentPage = basename($_SERVER['PHP_SELF']);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../.$currentPage.?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $user_name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    
    mysqli_stmt_close($stmt);
}

function create_user($conn, $first_name, $last_name, $email, $user_name, $password, $roleid = 'role00')
{
    $user_status = 	'active';

    $sql = "INSERT INTO user (first_name, last_name, email, user_address, phone, user_name, user_password, role_id, user_status) VALUES(?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    $user_address = null;
    $phone = null;

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssss", $first_name, $last_name, $email, $user_address, $phone, $user_name, $password, $roleid, $user_status);
    if (mysqli_stmt_execute($stmt)) {
        // If the query was successful, redirect to the success page
        header("Location:../signin.php?success=accountcreated");
    } else {
        // If the query failed, redirect with an error message
        header("Location:../signup.php?error=executionfailed");
    }
    mysqli_stmt_close($stmt);
}

function user_login($conn, $user_name, $password)
{
    $sql = "SELECT * FROM user WHERE user_name = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signin.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $user_name, $user_name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
   
    mysqli_stmt_close($stmt);

    if($row == false)
    {
        header("Location:../signin.php?error=usernamenotexists");
        exit();
    }
    
    $userPassword = $row["user_password"];
    
    if($userPassword !== $password)
    {
        header("Location:../signin.php?error=passwordnotmatch");
        exit();
    }
    elseif($row["user_status"] == 'suspend' )
    {
        header("Location:../access_denied.php?error=accountsuspended");
        exit();
    }
    else
    {
        session_start();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["first_name"] = $row["first_name"];
        $_SESSION["last_name"] = $row["last_name"];
        $_SESSION["dob"] = $row["dob"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["phone"] = $row["phone"];
        $_SESSION["user_address"] = $row["user_address"];
        $_SESSION["user_name"] = $row["user_name"];
        $_SESSION["role_id"] = $row["role_id"];
        $_SESSION["user_status"] = $row["user_status"];


    }

    if($row["role_id"] == 'role00')
    {
        header("Location:../index.php?success=loginsuccess");
    }
    elseif($row["role_id"] == 'role01' || $row["role_id"] == 'role02' || $row["role_id"] == 'role03' || $row["role_id"] == 'role04' )
    {
        header("Location:../system/dashboard.php?success=loginsuccess");
    }
    else
    {
        header("Location:../signin.php.php?error=invalid_role");
        exit();
    }

}
function error_masseges($getpart)
{
    if(isset($getpart))
                {
                    
                    if($getpart =="stmtfailed")
                    {
                        return 'Database Error : stmt fails';
                    
                    }
                    if($getpart =="invalidUserName")
                    {
                        return 'Invalid User Name <BR> Use only - [a-z , A-Z, 0 - 9]';
                    }
                    if($getpart =="loginExists")
                    {
                        return 'User Name or Email already used';
                    }
                    if($getpart =="executionfailed")
                    {
                        return 'Database Error : query failed';
                    }
                    if($getpart =="usernamenotexists")
                    {
                        return 'User name/email not exists';
                    }
                    if($getpart =="passwordnotmatch")
                    {
                        return 'wrong password';
                    }
                    if($getpart =="emailexists")
                    {
                        return 'This Email already exists';
                    }
                   
                }
}

function get_free_seat($conn, $class, $flight_no, $option) {
    $seat_query = "SELECT seat_no FROM seat WHERE class_id = '$class'";
    $seat_result = $conn->query($seat_query);

    if ($seat_result->num_rows > 0) 
    {
        $available_seats = [];  

        while ($seat_row = $seat_result->fetch_assoc()) {
            $seat_no = $seat_row['seat_no'];

            $booking_query = "SELECT seat_no FROM booking WHERE flight_no = '$flight_no' AND seat_no = '$seat_no'";
            $booking_result = $conn->query($booking_query);

            if ($booking_result->num_rows == 0) {
        
                $available_seats[] = $seat_no;

                if ($option == 0) {
                    return $seat_no;
                }
            }
        }
        if ($option == 1) {
            return count($available_seats);
        }
    }
    return null;
}

