<?php
$additionalCSS = ["styles/signin_up_style.css"];
include 'header.php';
?>
    <div class="form-container">
        <div class="form-box">
            <h2>Create Account</h2>

            <form action="register.php" method="POST" onsubmit="return validateForm()">
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
                <p id="error-msg" style="color: red; text-align: center;"></p>

                <div class="input-group">
                    <button type="submit" name = "submit" class="btn">Register</button>
                </div>
                
                <p>Already have an account? <a href="signin.php">Log In</a></p>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const repassword = document.getElementById('repassword').value;
            const errorMsg = document.getElementById('error-msg');

            if (password !== repassword) {
                errorMsg.textContent = "Passwords do not match!";
                return false;  
            }
            errorMsg.textContent = ""; 
            return true; 
        }
    </script>
</body>
</html>
