<?php
$additionalCSS = ["styles/payment_success_styles.css"];
include 'addphp/header.php';
require_once 'config/db_config.php';
require_once 'addphp/phpfunction.php';

?>

<?php

if (isset($_POST['payment'])) {
  $total = $_POST['total'];
  $flight_no = $_POST['flight_no'];
  $class = $_POST['class'];
  $user_id = $_SESSION["user_id"];
  $seat_no = get_free_seat($conn, $class, $flight_no, 0);  // Get the free seat number


  $payment_query = "INSERT INTO payment(amount, payment_status) VALUES ('$total', 'pending')";
  $result = $conn->query($payment_query);

  if ($result) {
      // Get  last insert ID
      $payment_id = $conn->insert_id;

      $booking_query = "INSERT INTO booking(user_id, flight_no, seat_no, payment_id, booking_status) 
                        VALUES ('$user_id', '$flight_no', '$seat_no', '$payment_id', 'pending')";

      $booking_result = $conn->query($booking_query);

      if ($booking_result) {
          echo "Booking successful!";
      } else {
          echo "Error in booking: " . $conn->error;
      }
  } else {
      echo "Error in payment: " . $conn->error;
  }
}



?>


      <div class="card">
      <div class="class">
        <i class="checkmark">✓</i>
      </div>
        <h1>Payment Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
      </div>


<?php
include 'addphp/footer.php';
?>