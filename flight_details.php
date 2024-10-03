<?php
 $additionalCSS = ["styles/flight_details_styles.css"];
include 'header.php';
?>
<br>
<div class="container">
            <form>
                <fieldset>
               
                    Flight No : 
                   <input type = "text" class = "fname" name="name" placeholder="A330-x" ><br><br>

                   <label for="airline">Air Line Name :</label>

                    <select name="airlines" class="airlines">
                        <option value="srilankan_airlines">Srilankan Airlines</option>
                        <option value="emirates">Emirates</option>
                        <option value="singapore_airlines">Singapore Airlines</option>
                        <option value="qutar_airways">Qatar Airways</option>
                        <option value="japan_airlines">Japan Airlines</option>
                        <option value="air_france">Air France</option>
                        
                    </select><br><br>

                     Destination :<br><br>
                    <label for="destination">From :</label>

                    <select name="destination" class="destination">
                        <option value="srilanka">SriLanka</option>
                        <option value="dubai">Dubai</option>
                        <option value="singapore">Singapore</option>
                        <option value="qutar">Qatar</option>
                        <option value="japan">Japan</option>
                        <option value="france">France</option>
                        <option value="australia">Australia</option> 
                    </select> &emsp; &emsp; &emsp; &emsp;
                    
                    <label for="destination">To :</label>

                    <select name="destination" class="destination">
                        <option value="srilanka">SriLanka</option>
                        <option value="dubai">Dubai</option>
                        <option value="singapore">Singapore</option>
                        <option value="qutar">Qatar</option>
                        <option value="japan">Japan</option>
                        <option value="france">France</option>
                        <option value="australia">Australia</option>
                    </select><br><br>
                    
                    Departure Date :
                     <input type = "date" name="date" class = "fdate" > <br><br>

                    Departure Time :
                     <input type = "time" name="time" class = "ftime" > <br><br>

                     Arrivel Time :
                     <input type = "time" name="time" class = "ftime" > <br><br>

                     Description :<br><br>
                   <textarea id = "description" rows="7" cols="72"></textarea><br><br>

                   <input type="reset" class="cancelbtn" value ="Cancel" id="submitBtn" > &nbsp;
                   <input type="submit" class="submitbtn" value ="Save Changes" id="submitBtn" >
     


                </fieldset>
            </form>
        </div><br><br>
<?php
include 'footer.php';
?>