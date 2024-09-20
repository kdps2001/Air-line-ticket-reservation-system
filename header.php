<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky wave</title>
    <link rel="stylesheet" href="styles/web_style.css">
    <?php
    if (isset($additionalCSS)) {
        foreach ($additionalCSS as $cssFile) {
            echo "<link rel='stylesheet' href='$cssFile'>\n";
        }
    }
    ?>
    
</head>

<body>
    <nav class="nav">
        <div class="nav-logo">
            <p>SkyWave Airlines</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <?php
                $currentPage = basename($_SERVER['PHP_SELF']); // get current page name
                ?>

                <li><a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                <li><a href="about.php" class="<?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">About us</a></li>
                <li><a href="#" class="<?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact us</a></li>
                
            </ul>
        </div>
        <?php
            if(isset($_SESSION["user_name"]))
            {
                echo "<h1>" . $_SESSION["user_name"] . "</h1>";

            }
            else
            {
                echo '<div class="nav-button">
                    <button class="btn signin" id="loginBtn" onclick="window.location.href=\'signin.php\'">Sign In</button>
                    <button class="btn signup" id="registerBtn" onclick="window.location.href=\'signup.php\'">Sign Up</button>
                    </div>';
            }
        ?>

        
        
    </nav>