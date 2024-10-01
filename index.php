<?php
 $additionalCSS = ["styles/index_styles.css"];
include 'header.php';
?>
<<<<<<< HEAD

=======
>>>>>>> 00aeb0358f88a8d6a4bee0adae676f3d4b831a83
    <h3><marquee direction="right">Welcome To SKY WAVE AIRLINES</marquee></h3>
    <br><br>
    <form>
         <fieldset>
            <br>
                <div class="booking_buttons">  &emsp; &emsp;
                <button class="book-btn" href="#">BOOK A TRIP</button> &emsp; &emsp; &emsp; &emsp;&emsp; 
                <button class="mng-btn" href="#">MANAGE BOOKING</button> &emsp; &emsp; &emsp; &emsp;&emsp;&nbsp;&nbsp;
                <button class="check-btn" href="#">CHECK IN</button>
                 </div><br> &emsp; 
        
        
                    <img src ="img/from.png" width="12" height="10">  From :
                    <select name="from" id="from"class="loc1">
                        <option> Choose Option <Option> 
                        <option>SriLanka</option>
                        <option>Australia</option>
                        <option>India</option>
                        <option>China</option>
                        <option>Japan</option>
                        <option>Malaysia</option>
                    </select>
        
                    &emsp; &emsp; &emsp; &emsp;&nbsp;&nbsp;
        
                    <img src ="img/to.png" width="14" height="11"> To&nbsp;:
                    <select name="to" id="to"class="loc2">
                        <option>Choose Option &emsp; <option> 
                         <option>SriLanka</option>
                        <option>Australia</option>
                        <option>India</option>
                        <option>China</option>
                        <option>Japan</option>
                        <option>Malaysia</option>
                    </select> <br><br> &emsp; 
        
                    <img src ="img/calander.png" width="14" height="11">
                    <label for="date">Date &nbsp;:</label>
                    <input type="date" class="date" id="date" name="date">
                    
                    &emsp; &emsp; &emsp;  &emsp;
        
                    <img src ="img/pass.png" width="14" height="11"> PC :
                    <select name="to" id="to" class="pc">
                        <option>Passenger Count &nbsp;<Option> 
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select> <br><br>&emsp; &emsp;
        
                    <input type = "radio" value="rt" name="trip">One Way &emsp;
                    <input type = "radio" value="ow" name="trip">Round Trip
        
                    &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&nbsp;&nbsp;
        
                    <input type ="checkbox" class = "inputStyle" id="checkbox"> Flexible Dates 
                    &emsp;
                    <input type="submit" class="submitbtn" value ="&nbsp; Search &nbsp;" id="submitBtn" > 
            <br><br>
        
        </fieldset> <br><br><br>
    </form>
<?php
include 'footer.php';
?>
