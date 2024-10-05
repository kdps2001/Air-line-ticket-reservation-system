<?php
 $additionalCSS = ["styles/checkin_styles.css"];
include 'header.php';
?>
 <form action="" method="post">
            <fieldset>
               <br>
                   <div class="booking_buttons">
                   <button type ="button" class="book-btn" onclick="window.location.href='index.php'">BOOK A TRIP</button> 
                   <button class="mng-btn" href="#">MANAGE BOOKING</button>
                   <button class="check-btn">CHECK IN</button>
                  
                    </div><br> 
                       <br>
                        <div class = "box">
                       CHECK IN NO :
                       <input type = "text" class = "check" name="name" placeholder="#######" required> <br><br><br>
                    </div>
                    <div class = "search">
                       <input type="submit" class="submitbtn" value ="Search"> 
                    </div><br><br>
           
           </fieldset> <br><br><br>
       </form>
<?php
include 'footer.php';
?>