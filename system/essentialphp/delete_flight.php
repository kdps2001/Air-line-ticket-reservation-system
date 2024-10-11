<?php
require_once '../../config/db_config.php';

if (isset($_POST['delete']))
{
    $flight_no = $_POST['flight_no'];  

    

    $sql = "DELETE FROM flight WHERE flight_no = ?";
    $stmt = mysqli_stmt_init($conn);


    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../dashboard.php?error=stmtfailed");
        exit();
    }

   
    mysqli_stmt_bind_param($stmt, "s", $flight_no);


    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../dashboard.php?success=flightdeleted");
    } else {
        header("Location: ../dashboard.php?error=deletefailed");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 
else 
{
    header("Location: ../dashboard.php?error=noflightselected");
    exit();
}

?>