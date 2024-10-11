<?php
$additionalCSS = ["styles/profile_styles.css"];

include 'addphp/header.php';
require_once 'addphp/phpfunction.php';


if(!isset($_SESSION["user_id"]))
    {
        header('Location: index.php');
        exit();
    } 
?>

<div class="container">
    
    <div class="profile-header"> MY PROFILE </div>
    <div class="profile-picture">
            <img src="https://via.placeholder.com/100" alt="Profile">
    </div>
    

    <form action="addphp/update_profile.php" method="POST" class="edit-profile">
        <fieldset>
            <legend>Edit Profile</legend>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $_SESSION['first_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $_SESSION['last_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="dob">DOB:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $_SESSION['dob']; ?>" >
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required> <?php echo $_SESSION['user_address']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Mobile No:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone']; ?>" pattern="[0-9]{10}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
            </div>
            <p class ="error_msg" id="error_msg" >
                <?php if(isset($_GET["error"])) 
                { 
                    echo error_masseges($_GET["error"]); 
                } ?> </p> 
    
            <div class="form-actions">
                <input type="reset" class="btn resetbtn" value="Reset">
                <button type="submit" name = "submit" class="btn submitbtn" id="popup" onsubmit="confirmSubmission(event)">Save Changes </button>
            </div>
        </fieldset>
    </form>
</div>

<script>
        function confirmSubmission(event) 
        {
            var userConfirmed = confirm("Are you sure ?");

            if (!userConfirmed)
            {
                event.preventDefault();
            }
        }
    </script>

<?php
include 'addphp/footer.php';
?>
