<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="pofile_styles.css">
    <title>User Profile</title>
</head>

<body>
   
   <div class="wrapper">
      <nav class="nav">
          <div class="nav-logo">
              <p>SkyWave Airlines</p>
          </div>
          <div class="nav-menu" id="navMenu">
              <ul>
                  <li><a href="#" class="link active">Home</a></li>
                  <li><a href="#" class="link">About us</a></li>
                  <li><a href="#" class="link">Contact us</a></li>
                  
              </ul>
          </div>
          <div class="nav-button">
              <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
              <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
          </div>
          <div class="nav-menu-btn">
              <i class="bx bx-menu" onclick="myMenuFunction()"></i>
          </div>
      </nav>

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



       <section class="footer">
          <div class="footer-row">
            <div class="footer-col">
              <h4>ABOUT US</h4>
              <ul class="links">
                <li><a href="#">About Airlines</a></li>
                <li><a href="#">Sri Lanka Tourism</a></li>
                <li><a href="#">Media Center</a></li>
              </ul>
            </div>
    
            <div class="footer-col">
              <h4>HELP</h4>
              <ul class="links">
                <li><a href="#">24 Hours Contact Center</a></li>
                <li><a href="#">Online Chat Support</a></li>
                <li><a href="#">FAQs</a></li>
              </ul>
            </div>
    
            <div class="footer-col">
              <h4>SERVICE</h4>
              <ul class="links">
                <li><a href="#">MICE</a></li>
                <li><a href="#">Cargo</a></li>
                <li><a href="#">Ground Handling</a></li>
                <li><a href="#">Holidays</a></li>
                <li><a href="#">Sky Wawe Catering</a></li>
              </ul>
            </div>
    
            <div class="footer-col">
                <h4>TERMS & CONDITIONS</h4>
                <ul class="links">
                  <li><a href="#">Online Booking Terms Of Use</a></li>
                  <li><a href="#">Condition of carriage</a></li>
                  <li><a href="#">Notices For Travel Agent</a></li>
                  <li><a href="#">Permission Center</a></li>
                </ul>
              </div>
    
            <div class="footer-col">
              <h4>Newsletter</h4>
              <p>
                Subscribe to our newsletter for a weekly dose
                of news, updates, helpful tips, and
                exclusive offers.
              </p>
              <form action="#">
                <input type="text" placeholder="Your email" required>
                <button type="submit">SUBSCRIBE</button>
              </form>
              <div class="icons">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-github"></i>
              </div>
            </div>
          </div>
        </section>
  
     
     
</body>

<?php
include 'footer.php';
?>