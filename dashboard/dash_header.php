<?php
    session_start();
    require_once 'dash_functions.php';
    user_access_check($_SESSION["role_id"],);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky wave</title>
    <link rel="stylesheet" href="../styles/header_styles.css">
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
        <div class="user-info">
            <?php
                if(isset($_SESSION["user_id"]))
                {
                    
                    echo "<p>Welcome " . $_SESSION["user_name"] . "</p>";
                    
                }
            ?>
            <button class="btn profile" onclick="window.location.href='profile.php'">Profile</button>
            <button class="btn logout" onclick="window.location.href='../logout.php'">Logout</button>
        </div>  
    </nav>