<?php
 $additionalCSS = ["styles/index_styles.css"];
include 'header.php';
?>

    <form action="search_results.php" method="post">


    <h3><marquee direction="right">Welcome To SKY WAVE AIRLINES</marquee></h3>
    <br><br>


    <form>

         <fieldset>
            <br>
                <div> 
                <button class="book-btn" href="#">BOOK A TRIP</button>
                <button class="mng-btn" href="#">MANAGE BOOKING</button>

                <button type ="button" class="check-btn" onclick="window.location.href='checkin.php'">CHECK IN</button>

                <a href="checkin.php">
                <button type ="button" class="check-btn" onclick="window.location.href='checkin.php'">CHECK IN</button></a>
                 </div><br> 
        
                    <div class="from">
                    From :

                    <select name="from" class="loc1" required>
                        <option disabled selected> Choose Option </Option> 
                        <option value="">SriLanka</option>
                        <option value="">Australia</option>
                        <option value="">India</option>
                        <option value="">China</option>
                        <option value="">Japan</option>

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

                    <select name="to" class="loc2" required>
                        <option disabled selected>Choose Option &emsp; </option> 
                         <option value="">SriLanka</option>
                        <option value="">Australia</option>
                        <option value="">India</option>
                        <option value="">China</option>
                        <option value="">Japan</option>
                        <option value="">Malaysia</option>
                    </select>

                    
                    <div class="class">
                   Class :
                    <select name="class" class="classlist" required>
                        <option disabled selected>Select Class</Option> 
                        <option value="">Economy Class</option>
                        <option value="">Business Class</option>
                    </select> 
                </div>

                    <div class="pscount">
                   PC :
                    <select name="to" id="to" class="pc" required>
                        <option disabled selected>Passenger Count &nbsp;</Option> 
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select> 
                </div>
              
                    <div class = "dates">
                    <label for="date">Date :</label>
                    </div>

                    <div class="date-selection">
                        <div class="date-item">
                            <label for="departureDate">Departure</label>
                            <input type="date" id="departureDate" required>
                        </div>
                            <div class="date-item" id="returnDateContainer">
                            <label for="returnDate">Return</label>
                            <input type="date" id="returnDate" required>
                        </div>
                    </div><br>

                    <div class="trip-type-selection">
                     <label>
                     <input type="radio" name="tripType" id="roundTrip" checked> Round Trip
                    </label>
                     <label>
                      <input type="radio" name="tripType" id="oneWay"> One Way
                     </label>
                    </div>

                   
            
                    <div class="subbtn">
                    <input type="submit"  class="submitbtn" value ="Search" > 

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
    <script src="js/index.js"></script>
<?php
include 'footer.php';
?>
