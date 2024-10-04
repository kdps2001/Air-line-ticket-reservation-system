<?php
 $additionalCSS = ["styles/index_styles.css"];
include 'header.php';
?>
<<<<<<< HEAD
    <h3><marquee direction="right">Welcome To SKY WAVE AIRLINES</marquee></h3>
    <br><br>
=======
>>>>>>> b202eef42b0538fbdcbf9f695e2b473466b94a24
    <form>
         <fieldset>
            <br>
                <div> 
                <button class="book-btn" href="#">BOOK A TRIP</button>
                <button class="mng-btn" href="#">MANAGE BOOKING</button>
                <a href="checkin.php">
                <button type ="button" class="check-btn" onclick="window.location.href='checkin.php'">CHECK IN</button></a>
                 </div><br> 
        
                    <div class="from">
                    From :
                    <select name="from" class="loc1">
                        <option> Choose Option <Option> 
                        <option>SriLanka</option>
                        <option>Australia</option>
                        <option>India</option>
                        <option>China</option>
                        <option>Japan</option>
                        <option>Malaysia</option>
                    </select>
                    </div>
                
        
                    <div class="to">
                        TO :
                    <select name="to" class="loc2">
                        <option>Choose Option &emsp; <option> 
                         <option>SriLanka</option>
                        <option>Australia</option>
                        <option>India</option>
                        <option>China</option>
                        <option>Japan</option>
                        <option>Malaysia</option>
                    </select>
                    </div>
                    <div class = "dates">
                    <label for="date">Date &nbsp;:</label>
                    <input type="date" class="date" id="date" name="date">
                    </div>

                    <div class="pscount">
                   PC :
                    <select name="to" id="to" class="pc">
                        <option>Passenger Count &nbsp;<Option> 
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select> 
                </div><br>
                    <div class="trip">
                    <input type = "radio" value="rt" name="trip" >One Way &emsp;
                    <input type = "radio" value="ow" name="trip">Round Trip
                    </div>
                    <div class="subbtn">
                    <input type="button"  class="submitbtn" onclick="window.location.href='search_results.php'" value ="&nbsp; Search &nbsp;" > 
                    </div>
        
        </fieldset> <br><br><br>
    </form>
<?php
include 'footer.php';
?>
