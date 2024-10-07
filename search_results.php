<?php

$additionalCSS = ["styles/search_results_styles.css"];
include 'addphp/header.php';
require_once 'config/db_config.php';

if(!isset($_GET["submit"]))
{
    header('Location: index.php');
    exit();
}



// Sanitize input values to prevent SQL injection

$from = $conn->real_escape_string($_GET['from']);
$to = $conn->real_escape_string($_GET['to']);
$departureDate = $conn->real_escape_string($_GET["date"]);
$class = $conn->real_escape_string($_GET['class']);
$passenger = $conn->real_escape_string($_GET['passenger_count']);

$sql_fromairport = "SELECT * FROM airport where airport_id = '$from'";
$sql_toairport = "SELECT * FROM airport where airport_id = '$to'";
$sql_class = "SELECT * FROM class where class_id  = '$class'";
// this for get data using db table

$result = $conn->query($sql_fromairport);
$fromrow = $result->fetch_assoc();

$result = $conn->query($sql_toairport);
$torow = $result->fetch_assoc();

$result = $conn->query($sql_class);
$classrow = $result->fetch_assoc();

//flight search query

$sql_flight = "
    SELECT flight_no, flight_name, departure, dip_date, dip_time, arrival, arr_date, arr_time, airline_id 
    FROM flight 
    WHERE departure = '$from' 
    AND arrival = '$to' 
    AND dip_date = '$departureDate'
";


?>

<div class = "searchbox">
    <h1 class="search">YOUR SEARCH</h1><br>

    <h2>FROM : <?php echo $fromrow['airport_name']; ?></h2>
    <h2>TO : <?php echo $torow['airport_name'] ; ?></h2>
    <h2>DATE : <?php echo  $departureDate; ?></h2>
    <h2>CLASS : <?php echo $classrow['class_type']; ?><h2> 
    <h2>PASSENGER COUNT : <?php echo  $passenger; ?></h2>
</div>
<br>

<form action="payment.php"method="post">
    
    <div class="selectflight">
        <h1 class="selectheader">SELECT FLIGHT</h1>
        <br><br>
        <table>
            <tr >
                <th>Fight No</th>
                <th>Airline</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>1 ticket Price</th>
                <th>total price</th>
                <th>Select</th>
            </tr>
            <?php 
                $sql_flight = "SELECT flight_no, flight_name, departure, dip_date, dip_time, arrival, arr_date, arr_time, airline_id FROM flight 
                WHERE departure = '$from' 
                AND arrival = '$to' 
                AND dip_date = '$departureDate'";
            
            $flight_result = $conn->query($sql_flight);
            
            if ($flight_result->num_rows > 0) 
            {
                echo "<tr><td colspan='7'><h2>Available Flights:</td></h2><tr>";

                while ($f_row = $flight_result->fetch_assoc())
                 {
                    $flight_no = $f_row['flight_no'];

                    $sql_flight_price = "SELECT fee FROM flight_class WHERE flight_no = '$flight_no' AND class_id = '$class' ";

                    $price_result = $conn->query($sql_flight_price);
                    $p_row = $price_result->fetch_assoc();

                    echo "<tr><td>". $f_row['flight_no'] . "</td>";
                    echo "<td>". $f_row['flight_name'] ."</td>";
                    echo "<td>". $f_row['dip_time'] ."</td>";
                    echo "<td>". $f_row['arr_time'] ."</td>";
                    echo "<td>". "$ " . $p_row['fee'] ."</td>";
                    echo "<td>". "$ " . ($p_row['fee'] * $passenger)."</td>";
                    echo '<td class="submit"><button type="submit" name="submit" class="continue-button" value ="'.$f_row['flight_no'].'">CONTINUE</button></td>';
                    //echo '<td class="btn"><input type="radio" class="selectbtn" value ="'.$f_row['flight_no'].'" name="select"> </td>';
                    echo "</tr>";
                 }
            } 

            else 
            {
                echo "<tr><td colspan='7' ><h2>No flights available for the selected route and date</h2></td><tr>";   
            }
            
            ?>
        </table>
    </div>

</form>

<?php
include 'addphp/footer.php';
?>
