<?php
    $additionalCSS = ["styles/signin_up_style.css"];
    include 'addphp/header.php';
    require_once 'addphp/phpfunction.php';

?>
    <div class="form-container">
        <div class="form-box">
            <h2>Sign In</h2>
            <form action="addphp/login.php" method="POST">
                
                <div class="input-group">
                    <label for="email">Email / User Name</label>
                    <input type="text" name="userName" id="UserName" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                    <!-- error message  -->
                <p class ="error_msg" id="error_msg" >
                <?php if(isset($_GET["error"])) 
                { 
                    echo error_masseges($_GET["error"]); 
                } ?> </p>   

                <button type="submit" name = "submit" class="btn">Log In</button>
            </form>
            <p class="go_in_up">Don't have an account ?  <a href="signup.php">Register</a></p>
        </div>
    </div>
<?php
    include 'addphp/footer.php';
?>
