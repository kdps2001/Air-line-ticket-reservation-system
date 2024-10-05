<?php
 $additionalCSS = ["styles/search_results_styles.css"];

include 'header.php';
?>
<div class = "searchbox">

     <h1 class="search">YOUR SEARCH</h1>
    <h2 class="secondbox">FROM :</h2>
    <h2 class="secondbox">TO :</h2>
    <h2>DATE :</h2>
    <h2>CLASS :<h2> 
    <h2>PASSENGER COUNT :</h2>
</div>
<br>
    <!--
    <div class="booking-details">
        <h1>YOUR BOOKING</h1>
        <br>


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

    </div> -->
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
                <th>Select</th>
            </tr>
            <tr>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td class="btn"><input type="radio" class="selectbtn" value ="Select" name="select"> </td>
            </tr>
            <tr>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td class="btn"><input type="radio" class="selectbtn" value ="Select" name="select"></td>
            </tr>
        </table>

        <button type="submit" class="continue-button">CONTINUE</button>
    </div>

</form>


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