<?php
$additionalCSS = ["styles/signin_up_style.css"];
include 'addphp/header.php';
require_once 'addphp/phpfunction.php';
?>

    <div class="form-container">
        <div class="form-box">
            <h2>Create Account</h2>

            <form action="addphp/register.php" method="POST" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div class="input-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="input-group">
                    <label for="repassword">Re-enter Password</label>
                    <input type="password" id="repassword" name="repassword" required>
                </div>
                <!-- error message  -->
                <p class ="error_msg" id="error_msg" >
                <?php if(isset($_GET["error"])) 
                { 
                    echo error_masseges($_GET["error"]); 
                } ?> </p>
                

                <div class="input-group">
                    <button type="submit" name = "submit" class="btn">Register</button>
                </div>
                
                <p class="go_in_up" >Already have an account? <a href="signin.php">Log In</a></p>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const repassword = document.getElementById('repassword').value;
            const errorMsg = document.getElementById('error_msg');

            if (password !== repassword) {
                errorMsg.textContent = "Passwords do not match!";
                return false;  
            }
            return true; 
        }
    </script>

<?php
include 'addphp/footer.php';
?>
