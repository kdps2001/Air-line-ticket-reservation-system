<?php
 $additionalCSS = ["styles/checkin_styles.css"];
include 'header.php';
?>
 <form>
            <fieldset>
               <br>
                   <div class="booking_buttons">  &emsp; &emsp;
                   <a href="index.php">
                   <button type ="button" class="book-btn" onclick="window.location.href='index.php'">BOOK A TRIP</button></a> &emsp; &emsp; &emsp; &emsp;&emsp; 
                   <button class="mng-btn" href="#">MANAGE BOOKING</button> &emsp; &emsp; &emsp; &emsp;&emsp;&nbsp;&nbsp;
                   <button class="check-btn">CHECK IN</button>
                  
                    </div><br> &emsp; 
                       &emsp;<br>
                        <div class = "box">
                       CHECK IN NO :
                       <input type = "text" class = "check" name="name" placeholder="#######"> <br><br><br>
                    </div>
                    <div class = "search">
                       <input type="submit" class="submitbtn" value ="&nbsp; Search &nbsp;"> 
                    </div><br><br>
           
           </fieldset> <br><br><br>
       </form>
<?php
include 'footer.php';
?>