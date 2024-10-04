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

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:signup.php?error=stmtfailed");
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

    $sql = "INSERT INTO user (first_name, last_name, email, user_address, phone, user_name, user_password, role_id) VALUES(?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    $user_address = null;
    $phone = null;

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $email, $user_address, $phone, $user_name, $password, $roleid);
    if (mysqli_stmt_execute($stmt)) {
        // If the query was successful, redirect to the success page
        header("Location:signin.php?success=accountcreated");
    } else {
        // If the query failed, redirect with an error message
        header("Location:signup.php?error=executionfailed");
    }
    mysqli_stmt_close($stmt);
}

function user_login($conn, $user_name, $password)
{
    $sql = "SELECT * FROM user WHERE user_name = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:signin.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $user_name, $user_name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
   
    mysqli_stmt_close($stmt);

    if($row == false)
    {
        header("Location:signin.php?error=usernamenotexists");
        exit();
    }
    
    $userPassword = $row["user_password"];
    
    if($userPassword !== $password)
    {
        header("Location:signin.php?error=passwordnotmatch");
        exit();
    }
    else
    {
        session_start();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["first_name"] = $row["first_name"];
        $_SESSION["last_name"] = $row["last_name"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["phone"] = $row["phone"];
        $_SESSION["user_address"] = $row["user_address"];
        $_SESSION["user_name"] = $row["user_name"];
        $_SESSION["role_id"] = $row["role_id"];

        header("Location:index.php?success=loginsuccess");
    }

    if($row["role_id"] == 'role00')
    {
        header("Location:index.php?success=loginsuccess");
    }
    elseif($row["role_id"] == 'role01' || $row["role_id"] == 'role02' || $row["role_id"] == 'role03' || $row["role_id"] == 'role004' )
    {
        header("Location:dashboard/dashboard.php?success=loginsuccess");
    }
    else
    {
        header("Location:login.php?error=invalid_role");
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

                }
}
