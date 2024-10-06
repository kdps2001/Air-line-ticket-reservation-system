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
    <div class="selectseat" id="seat" required>
        <h2 class="selectS">SELECT SEATS</h2><br><br>
        <div class="Wseat">
        <label><input type="checkbox" />W1</label>
        <label><input type="checkbox" />W2</label>
        <label><input type="checkbox" />W3</label>
        <label><input type="checkbox" />W4</label>
        <label><input type="checkbox" />W5</label>
        <label><input type="checkbox" />W6</label>
        <label><input type="checkbox" />W7</label>
        <label><input type="checkbox" />W8</label>
        <label><input type="checkbox" />W9</label>
        <label><input type="checkbox" />W10</label>
        </div>

        <div class="Mseat">
        <label><input type="checkbox" />M1</label>
        <label><input type="checkbox" />M2</label>
        <label><input type="checkbox" />M3</label>
        <label><input type="checkbox" />M4</label>
        <label><input type="checkbox" />M5</label>
        <label><input type="checkbox" />M6</label>
        <label><input type="checkbox" />M7</label>
        <label><input type="checkbox" />M8</label>
        <label><input type="checkbox" />M9</label>
        <label><input type="checkbox" />M10</label>
        </div>

        <div class="Aseat">
        <label><input type="checkbox" />A1</label>
        <label><input type="checkbox" />A2</label>
        <label><input type="checkbox" />A3</label>
        <label><input type="checkbox" />A4</label>
        <label><input type="checkbox" />A5</label>
        <label><input type="checkbox" />A6</label>
        <label><input type="checkbox" />A7</label>
        <label><input type="checkbox" />A8</label>
        <label><input type="checkbox" />A9</label>
        <label><input type="checkbox" />A10</label>
        </div>

        <div class="Rseat">
        <label><input type="checkbox" />A11</label>
        <label><input type="checkbox" />A12</label>
        <label><input type="checkbox" />A13</label>
        <label><input type="checkbox" />A14</label>
        <label><input type="checkbox" />A15</label>
        <label><input type="checkbox" />A16</label>
        <label><input type="checkbox" />A17</label>
        <label><input type="checkbox" />A18</label>
        <label><input type="checkbox" />A19</label>
        <label><input type="checkbox" />A20</label>
        </div>

        <div class="RMseat">
        <label><input type="checkbox" />M11</label>
        <label><input type="checkbox" />M12</label>
        <label><input type="checkbox" />M13</label>
        <label><input type="checkbox" />M14</label>
        <label><input type="checkbox" />M15</label>
        <label><input type="checkbox" />M16</label>
        <label><input type="checkbox" />M17</label>
        <label><input type="checkbox" />M18</label>
        <label><input type="checkbox" />M19</label>
        <label><input type="checkbox" />M20</label>
        </div>

        <div class="RWseat">
        <label><input type="checkbox" />W11</label>
        <label><input type="checkbox" />W12</label>
        <label><input type="checkbox" />W13</label>
        <label><input type="checkbox" />W14</label>
        <label><input type="checkbox" />W15</label>
        <label><input type="checkbox" />W16</label>
        <label><input type="checkbox" />W17</label>
        <label><input type="checkbox" />W18</label>
        <label><input type="checkbox" />W19</label>
        <label><input type="checkbox" />W20</label>
        </div>



    </div>
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
                    echo '<td class="btn"><input type="radio" class="selectbtn" value ="'.$f_row['flight_no'].'" name="select"> </td>';
                    echo "</tr>";
                 }
            } 

            else 
            {
                echo "<tr><td colspan='7' ><h2>No flights available for the selected route and date</h2></td><tr>";   
            }
            
            ?>
        </table>

        <button type="submit" class="continue-button">CONTINUE</button>
    </div>

</form>

<?php
include 'addphp/footer.php';
?>
