<?php
$additionalCSS = ["styles/mybooking_styles.css"];
include 'addphp/header.php';
require_once 'config/db_config.php';

// Use $_SESSION["user_id"] to retrieve the user-specific booking details
$user_id = $_SESSION["user_id"];

// Query to get all booking details for the logged-in user
$query = "SELECT 
    CONCAT(u.first_name, ' ', u.last_name) AS `User Name`,
    t.ticket_id AS `Ticket No`,
    f.flight_no AS `Flight No`,
    a.airline_name AS `Airline`,
    fc.class_id AS `Class`,
    b.seat_no AS `Seat No`,
    dep_airport.airport_name AS `From`,
    arr_airport.airport_name AS `To`,
    f.dip_date AS `Departure Date`,
    f.dip_time AS `Departure Time`,
    f.arr_date AS `Arrival Date`,
    f.arr_time AS `Arrival Time`,
    t.ticket_status AS `Ticket Status`
FROM 
    booking b, 
    ticket t, 
    flight f, 
    airline a, 
    seat s, 
    flight_class fc,
    user u, 
    airport dep_airport, 
    airport arr_airport
WHERE 
    b.booking_id = t.booking_id
    AND b.flight_no = f.flight_no
    AND f.airline_id = a.airline_id
    AND b.seat_no = s.seat_no
    AND f.flight_no = fc.flight_no 
    AND s.class_id = fc.class_id
    AND b.user_id = u.user_id
    AND f.departure = dep_airport.airport_id
    AND f.arrival = arr_airport.airport_id
    AND b.user_id = '$user_id';";  // Retrieve bookings for the logged-in user

// Execute the query
$result = $conn->query($query);
?>

<div class="detailbox">
    <div id="GFG">
        <h1 class="header">YOUR BOOKING DETAILS</h1>

        <?php 
       
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="details">
                    <h2>Passenger Name: <?php echo $row['User Name']; ?></h2>
                    <h2>Ticket No: <?php echo $row['Ticket No']; ?></h2>
                    <h2>Flight No: <?php echo $row['Flight No']; ?></h2>
                    <h2>Airline: <?php echo $row['Airline']; ?></h2>
                    <h2>Class: <?php echo $row['Class']; ?></h2>
                    <h2>Seat No: <?php echo $row['Seat No']; ?></h2>
                    <h2>From: <?php echo $row['From']; ?></h2>
                    <h2>To: <?php echo $row['To']; ?></h2>
                    <h2>Departure Date: <?php echo $row['Departure Date']; ?></h2>
                    <h2>Departure Time: <?php echo $row['Departure Time']; ?></h2>
                    <h2>Arrival Date: <?php echo $row['Arrival Date']; ?></h2>
                    <h2>Arrival Time: <?php echo $row['Arrival Time']; ?></h2>
                    <h2>Ticket Status: <?php echo $row['Ticket Status']; ?></h2>
                </div>
                <input type="button" class="print" value="Print Details" onclick="printDiv()"> <!-- Print button inside the loop -->
                <hr> 
            <?php 
            } 
        } else {
            echo "<h3>No bookings found.</h3>";
        }
        ?>
    </div>
</div>

<script src="scripts/my_booking.js"></script>

<?php
include 'addphp/footer.php';
?>