<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/profile_styles.css">
    <title>User Profile</title>
</head>

<body>
   
    <div class="container">
          <!-- Left Profile Section -->
          <div class="profile">
           <div class="profile-header">
               <button>&larr;</button>
               <span>MY PROFILE</span>
               <button>&#9881;</button>
           </div>
           <div class="profile-picture">
               <img src="https://via.placeholder.com/100" alt="Profile">
           </div>
           <div class="profile-details">
               <h2 class = "details">Details</h2><br><br>
               <p>Name: </p><br>
               <p>Email: </p> <br>
               <p>Phone No: </p> <br>
               <p>Address: </p>
           </div>
         </div>
     
         <form>
           <fieldset> <legend>Edit Profile</legend>
             First Name : &emsp; &emsp; &emsp; &emsp;&emsp;&emsp; &emsp; &emsp;
             Last Name : <br>
                   <input type = "text" class = "name" name="name" placeholder="Ex : Ruwan" > &emsp; &emsp;&nbsp; &nbsp;
                   <input type = "text" class = "name" name="name" placeholder="Ex : Karunarathne" > <br><br>

             DOB : <br>
             <input type = "date" name="age" class = "age" placeholder="ex : 35" pattern="[0-9]{2}1"> <br><br>

             Address :<br>
                   <textarea id = "address"class = "address" rows="6" cols="72"></textarea><br><br>
     
             Mobile No : &emsp; &emsp; &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&nbsp;&nbsp; Email : <br>
                   <input type = "phone" class = "mno" name="mobile" placeholder="+94 77xxxxxxx" pattern="[0-9]{10}" required>&emsp;&emsp; &emsp;
                   <input type = "email" class = "email" name="email" placeholder="abc@gmail.com" pattern="[a-z][@.][0-9]"><br><br>
     
             Description :<br>
                   <textarea id = "description" rows="7" cols="72"></textarea><br><br>

                   <input type="button" class="submitbtn" value ="Cancel" id="submitBtn" > &nbsp;
                   <input type="submit" class="submitbtn" value ="Save Changes" id="submitBtn" >
     
     
           </fieldset>
         </form>
       </div>
 
</body>

<?php
include 'footer.php';
?>