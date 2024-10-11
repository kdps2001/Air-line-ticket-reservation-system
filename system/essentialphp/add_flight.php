<?php
session_start();

if (isset($_POST["submit"])) {
 
    $flight_no = $_POST["flight_no"];
    $flight_name = $_POST["flight_name"];
    $departure = $_POST["departure"];
    $dip_date = $_POST["dip_date"];
    $dip_time = $_POST["dip_time"];
    $arrival = $_POST["arrival"];
    $arr_date = $_POST["arr_date"];
    $arr_time = $_POST["arr_time"];
    $airline_id = $_POST["airline_id"];

  
    require_once '../../config/db_config.php';


    $sql = "INSERT INTO flight (flight_no, flight_name, departure, dip_date, dip_time, arrival, arr_date, arr_time, airline_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

 
    $stmt = mysqli_stmt_init($conn);

  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../dashboard.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssssssss", $flight_no, $flight_name, $departure, $dip_date, $dip_time, $arrival, $arr_date, $arr_time, $airline_id);


    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../dashboard.php?success=flightsaved");
    } else {
        header("Location: ../dashboard.php?error=stmtfailed");
    }


    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
