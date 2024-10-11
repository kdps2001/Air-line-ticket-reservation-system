<?php
$sql_airport = "SELECT * FROM airport";
$sql_airline = "SELECT * FROM airline";
$sql_flight = "SELECT * FROM flight";
?>
<br>
<div class="container">
    <form action="essentialphp/add_flight.php" method="POST">
        <fieldset>
        <h2><center>Enter Flight Details<center></h2><br>
            Flight No : 
            <input type="text" class="fname" name="flight_no" placeholder="1" required><br><br>

            Flight Name : 
            <input type="text" class="fname" name="flight_name" placeholder="A330-x" required><br><br>

            <label for="airline">Air Line Name :</label>
            <select name="airline_id" class="airlines" required>
            <option disabled selected value = ''> Choose Option </Option> 
            <?php

            $result = $conn->query($sql_airline);

            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
            {
                echo '<option value="'. $row['airline_id']. '"> '. $row['airline_name'].'</option>';
             }
            } 
            else 
            {
                echo '<option disabled>No airports available</option>';
            }
            ?>
            </select><br><br>

            Destination :<br><br>
            <label for="departure">From :</label>
            <select name="departure" class="destination" required>
            <option disabled selected value = ''> Choose Option </Option> 
                        <?php

                        $result = $conn->query($sql_airport);

                        if ($result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                echo '<option value="'. $row['airport_id']. '">' . $row['airport_id'].' - '. $row['airport_name']. ' - ' . $row['country'].'</option>';
                            }
                        } 
                        else 
                        {
                            echo '<option disabled>No airports available</option>';
                        }
                        ?>
            </select> &emsp; &emsp; &emsp; &emsp;
            
            <label for="arrival">To :</label>
            <select name="arrival" class="destination" required>
            <option disabled selected value = ''> Choose Option </Option> 
                        <?php

                        $result = $conn->query($sql_airport);

                        if ($result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                echo '<option value="'. $row['airport_id']. '">' . $row['airport_id'].' - '. $row['airport_name']. ' - ' . $row['country'].'</option>';
                            }
                        } 
                        else 
                        {
                            echo '<option disabled>No airports available</option>';
                        }
                        ?>
            </select><br><br>

            Departure Date:
            <input type="date" name="dip_date" class="fdate" required><br><br>

            Departure Time:
            <input type="time" name="dip_time" class="ftime" required><br><br>

            Arrival Date:
            <input type="date" name="arr_date" class="fdate" required><br><br>

            Arrival Time:
            <input type="time" name="arr_time" class="ftime" required><br><br>

            <input type="reset" class="cancelbtn" value="Cancel" id="submitBtn">
            <input type="submit" class="submitbtn" name="submit" value="Save Changes" id="submitBtn" >
        </fieldset>
    </form>
</div><br><br>


<div class="container2">
    <form action="essentialphp/delete_flight.php" method="POST">
    <h3><center>Delete Flight Details<center></h3><br>
        <label for="flight_no">Flight :</label>
        <select id="flight_no" name="flight_no" class="flno" required>
            <option disabled selected value=''> Choose Option</option> 
            <?php
            $result = $conn->query($sql_flight);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="'. $row['flight_no']. '">' . $row['flight_no'].' - '. $row['flight_name']. ' - ' . $row['departure'].' to ' . $row['arrival'].' - '. $row['dip_date']. ' - ' . $row['dip_time'].'</option>';
                }
            } else {
                echo '<option disabled>No flights available</option>';
            }
            ?>
        </select>
        <input type="submit" class="removebtn" name="delete" value="Remove Flight" id="removeBtn">
    </form>
</div>
        
    </form>
</div>
