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
        
        <div class="user-info">
            <?php
                if(isset($_SESSION["user_id"]))
                {
                    
                    echo "<p>Welcome " . $_SESSION["user_name"] . "</p>";
                    
                }
            ?>
            <?php 
                $currentPage = basename($_SERVER['PHP_SELF']);
                if($currentPage == 'dashprofile.php')
                {
                    echo '<button class="btn profile" onclick="window.location.href= \'dashboard.php\'">Back</button>';
                }
                else
                {
                    echo '<button class="btn profile" onclick="window.location.href=\'../system/dashprofile.php\'">Profile</button>';
                }
            ?>
            <button class="btn logout" onclick="window.location.href='../addphp/logout.php'">Logout</button>
        </div>  
    </nav>