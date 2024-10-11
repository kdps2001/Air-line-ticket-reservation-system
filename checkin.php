<?php
 $additionalCSS = ["styles/checkin_styles.css"];
include 'addphp/header.php';
$is_logged_in = isset($_SESSION['user_id']);
?>

<form action="" method="post">
            <fieldset>
               <br>
                   <div class="booking_buttons">
                   <button type ="button" class="book-btn" onclick="window.location.href='index.php'">BOOK A TRIP</button> 
                   <button class="check-btn">CHECK IN</button>
                  
                    </div><br> 
                       <br>
                        <div class = "box">
                       CHECK IN NO :
                       <input type = "text" class = "check" name="name" placeholder="#######" .required> <br><br><br>
                    </div>
                    <div class = "search">
                       <input type="submit" class="submitbtn" value ="Search"id="checkButton">
                    </div><br><br>
           
           </fieldset> <br><br><br>
       </form>
       <script>
        // Pass PHP session login status to JavaScript
        const isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
      </script>

      <script src="scripts/checkin.js"></script>


<?php
include 'addphp/footer.php';
?>

