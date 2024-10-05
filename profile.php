<?php
 $additionalCSS = ["styles/profile_styles.css"];
include 'header.php';
?>

<br>
    <div class="container">
          <!-- Left Profile Section -->
          <div class="profile">
           <div class="profile-header">
           <button type="button" onclick="window.location.href='booking_details.php'" class ="book">MY BOOKING</button>
              
           </div><br>
           <h2>MY PROFILE</h2><br>
           <div class="profile-picture">
               <img src="https://via.placeholder.com/100" alt="Profile">
           </div>
                <div class="profile-details">
               <h2 class = "details">Details</h2><br>
               <?php
                if(isset($_SESSION["user_id"]))
                {
            
                    echo "<p>User Name : " . $_SESSION["user_name"] . "</p><br>";
                    echo "<p>Email :  " . $_SESSION["email"] . "</p><br>";
                    echo "<p>Phone No :  " . $_SESSION["phone"] . "</p><br>";
                    echo "<p>Address :  " . $_SESSION["user_address"] . "</p><br>";
                }
                ?>

               

           </div>
         </div>
     
         <form action = "php.php" method = "post">
           <fieldset> <legend>Edit Profile</legend>

              <div class="fnamebox">
                  First Name : 
              <input type = "text" class = "fname" name="name" value="<?php echo $_SESSION['first_name']; ?>" >
              </div>
            
              <div class="lnamebox">
                   Last Name :
                   <input type = "text" class = "lname" name="name" value="<?php echo $_SESSION['last_name']; ?>" >
              </div>

            <div class="dobbox">      
                 DOB : 
                <input type = "date" name="age" class = "age"  pattern="[0-9]{2}1">
            </div>

             First Name : &emsp; &emsp; &emsp; &emsp;&emsp;&emsp; &emsp; &emsp;
             Last Name : <br>
                   <input type = "text" class = "name" name="name" value="<?php echo $_SESSION['first_name']; ?>" > &emsp; &emsp;&nbsp; &nbsp;
                   <input type = "text" class = "name" name="name" value="<?php echo $_SESSION['last_name']; ?>" > <br><br>

             DOB : <br>
             <input type = "date" name="age" class = "age"  pattern="[0-9]{2}1"> <br><br>


            <div class="addressbox">
             Address :<br>

                   <textarea id = "address"class = "address" rows="6" cols="72"><?php echo $_SESSION['user_address']; ?></textarea>
            </div>

                   <textarea id = "address"class = "address" rows="6" cols="72"><?php echo $_SESSION['user_address']; ?></textarea><br><br>
     
             Mobile No : &emsp; &emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&nbsp;&nbsp; Email : <br>
                   <input type = "phone" class = "mno" name="mobile" value="<?php echo $_SESSION['phone']; ?>" pattern="[0-9]{10}" required>&emsp;&emsp; &emsp;
                   <input type = "email" class = "email" name="email" value="<?php echo $_SESSION['email']; ?>" pattern="[a-z][@.][0-9]"><br><br>

     
             Mobile No : 
                <input type = "phone" class = "mno" name="mobile" value="<?php echo $_SESSION['phone']; ?>" pattern="[0-9]{10}" required>
             
            <div class="emailbox">
             Email :
                   <input type = "email" class = "email" name="email" value="<?php echo $_SESSION['email']; ?>" pattern="[a-z][@.][0-9]">
            </div>

             Description :
                   <textarea id = "description" rows="7" cols="72"></textarea><br><br>

            <div class="cpass">
             Current Password :
                   <input type = "password" class = "password" name="password" value="" required>
            </div>

            <div class="npass">
             New Password :
                   <input type = "password" class = "password" name="password" value="">
            </div><br>

                   <input type="reset" class="resetbtn" value ="Cancel" >
                   <input type="submit" class="submitbtn" value ="Save Changes">

     
     
     
           </fieldset>
           
         </form>
       </div><br><br>
      
<?php
include 'footer.php';
?>