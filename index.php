<?php
$additionalCSS = ["styles/search_flight_styles.css"];
include 'addphp/header.php';
require_once 'config/db_config.php';

$sql_airport = "SELECT * FROM airport";
$sql_class = "SELECT * FROM class"; 

?>

<form action="search_results.php" method="GET">
         <fieldset>
            <br>
                <div> 
                <button class="book-btn" href="#">BOOK A TRIP</button>
                <button type ="button" class="check-btn" onclick="window.location.href='checkin.php'">CHECK IN</button>
                 </div><br> 
        
                    <div class="from">
                    From :
                    <select name="from" class="loc1" required>
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
                    </select>
                    </div>
                
        
                    <div class="to">
                        TO :
                    <select name="to" class="loc2" required>
                        <option disabled selected value = ''>Choose Option </option> 
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
                    </select>

                    
                    <div class="class">
                   Class :
                    <select name="class" class="classlist" required>
                        <option disabled selected value = ''>Select Class</Option> 
                        <?php

                        $result = $conn->query($sql_class);

                        if ($result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                echo '<option value="'. $row['class_id']. '">' . $row['class_type'] .'</option>';
                            }
                        } 
                        else 
                        {
                            echo '<option disabled>No class available</option>';
                        }
                        ?>
                        
                    </select> 
                </div>

                    <div class="pscount">
                   PC :
                    <input class="passenger_count" type="text" id="passenger_count" name="passenger_count" value="1" required>
                </div>
              
                    <div class = "dates">
                    <label for="date">Date :</label>
                    </div>

                    <div class="date-selection">
                        <div class="date-item">
                            <label for="date"></label>
                            <input type="date" id="date" name="date" required>
                        </div>
                           
                    </div><br>

                    <div class="subbtn">
                    <input type="submit" name="submit" class="submitbtn" value ="Search" > 
                    </div>
        
        </fieldset> <br><br><br>
    </form>
    
<?php
include 'addphp/footer.php';
?>
