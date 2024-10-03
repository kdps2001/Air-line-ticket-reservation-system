<?php
 $additionalCSS = ["styles/search_results_styles.css"];

include 'header.php';
?>
<div class = "searchbox">
     <h1 class="firstbox">YOUR SEARCH</h1>
    <h2 class="secondbox">FROM :</h2>
    <h2 class="secondbox">TO :</h2>
    <h2>DATE :</h2>
    <h2>PASSENGER COUNT :</h2>
</div>
<br>
    
    <div class="booking-details">
        <h1>YOUR BOOKING</h1>
        <br>
        

        <h2 class="flight-class">SELECT CLASS :</h2><br>
            <h3><input type="radio" value="ec" name="class"> ECONOMY CLASS 
            <input type="radio" value="bc" name="class"> BUSINESS CLASS </h3>
    </div>

    <div class="selectflight">
        <h1>SELECT FLIGHT</h1>
        <br><br>
        <button class="fl">USD 515.00</button>
        <button class="fl">USD 615.00</button>
        <button class="fl">USD 815.00</button>
        <button class="fl">USD 1295.00</button>
        <button class="fl">USD 1355.00</button><br>

        <button type="button" class="continue-button"onclick="window.location.href='payment.php'">CONTINUE</button>
    </div>
<?php
include 'footer.php';
?>