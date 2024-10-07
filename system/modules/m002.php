<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['approve_payment'])) {
        $payment_id = $_POST['payment_id'];

        $update_payment_query = "UPDATE payment SET payment_status = 'approved' WHERE payment_id = '$payment_id'";
        $conn->query($update_payment_query);

        $booking_query = "SELECT * FROM booking WHERE payment_id = '$payment_id'";
        $booking_result = $conn->query($booking_query);
        $booking = $booking_result->fetch_assoc();

        $create_ticket_query = "INSERT INTO ticket (booking_id, ticket_status) 
                         VALUES ('" . $booking['booking_id'] . "', '$ticket_status')";
        $conn->query($create_ticket_query);

        $update_booking_query = "UPDATE booking SET booking_status = 'completed' WHERE booking_id = '" . $booking['booking_id'] . "'";
        $conn->query($update_booking_query);
    }
}

$pending_bookings_query = "SELECT b.booking_id, b.user_id, b.flight_no, b.seat_no, b.payment_id, 
                            p.amount, p.payment_status 
                            FROM booking b , payment p
                            WHERE p.payment_id = b.payment_id AND b.booking_status = 'pending' AND p.payment_status = 'pending'";

$pending_bookings_result = $conn->query($pending_bookings_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Management</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

<center><h1>Pending Bookings</h1></center>

<table>
    <tr>
        <th>Booking ID</th>
        <th>User ID</th>
        <th>Flight No</th>
        <th>Seat No</th>
        <th>Payment Amount</th>
        <th>Payment Status</th>
        <th>Action</th>
    </tr>
<?php
    if($result->num_rows > 0)
    {

   
    while ($row = $pending_bookings_result->fetch_assoc()): ?>
    <tr>
        <br>
        <td><?php echo $row['booking_id']; ?></td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['flight_no']; ?></td>
        <td><?php echo $row['seat_no']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['payment_status']; ?></td>
        <td>
            <form method="POST">
                <input type="hidden" name="payment_id" value="<?php echo $row['payment_id']; ?>">
                <button type="submit" name="approve_payment">Approve Payment</button>
            </form>
        </td>
    </tr>
    <?php endwhile; 

    }
    else
    {
        echo "<tr><td colspan = '6'><center><h3><br>No pending approval<br></h3></center><td></tr>";
    }

    ?>
</table>


</body>
</html>
