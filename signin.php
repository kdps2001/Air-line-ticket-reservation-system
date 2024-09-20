
<?php
$additionalCSS = ["styles/signin_up_style.css"];
include 'header.php';
?>
    <div class="form-container">
        <div class="form-box">
            <h2>Sign In</h2>
            <form action="login.php" method="POST">
                
                <div class="input-group">
                    <label for="email">Email / User Name</label>
                    <input type="text" name="userName" id="UserName" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
               
                <button type="submit" name = "submit" class="btn">Log In</button>
            </form>
            <p class="go_in_up">Don't have an account ?  <a href="signup.php">Register</a></p>
        </div>
    </div>
</body>
</html>
