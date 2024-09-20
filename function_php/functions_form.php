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
        $result = mysqli_query($conn, $sql);

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

    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:signup.html?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    
    mysqli_stmt_close($stmt);
}
function create_user($conn, $first_name, $last_name, $email, $user_name, $password, $roleid = 'role02')
{

    $sql = "INSERT INTO user (firstname, last_name, email, user_address, phone, user_name, user_password, role_id) VALUES(?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    $user_address = null;
    $phone = null;

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:signup.html?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $email, $user_address, $phone, $user_name, $password, $roleid);
    if (mysqli_stmt_execute($stmt)) {
        // If the query was successful, redirect to the success page
        header("Location:signin.html?success=accountcreated");
    } else {
        // If the query failed, redirect with an error message
        header("Location:signup.html?error=executionfailed");
    }
    mysqli_stmt_close($stmt);
}
