<?php
 $additionalCSS = ["styles/index_styles.css"];
include 'header.php';
?>

    <form>
         <fieldset>
            <br>
                <div> 
                <button class="book-btn" href="#">BOOK A TRIP</button>
                <button class="mng-btn" href="#">MANAGE BOOKING</button>
                <button type ="button" class="check-btn" onclick="window.location.href='checkin.php'">CHECK IN</button>
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

                    
                    <div class="class">
                   Class :
                    <select name="class" class="classlist">
                        <option>Select Class &nbsp;<Option> 
                        <option>Economy Class</option>
                        <option>Business Class</option>
                    </select> 
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
                </div>
              
                    <div class = "dates">
                    <label for="date">Date &nbsp;:</label>
                    </div>

                    <div class="date-selection">
                        <div class="date-item">
                            <label for="departureDate">Departure</label>
                            <input type="date" id="departureDate">
                        </div>
                            <div class="date-item" id="returnDateContainer">
                            <label for="returnDate">Return</label>
                            <input type="date" id="returnDate">
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
                    <input type="button"  class="submitbtn" onclick="window.location.href='search_results.php'" value ="&nbsp; Search &nbsp;" > 
                    </div>
        
        </fieldset> <br><br><br>
    </form>s
    <script src="js/index.js"></script>
<?php
include 'footer.php';
?>
