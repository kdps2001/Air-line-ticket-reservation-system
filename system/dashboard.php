<?php
    session_start();
    require_once 'dash_functions.php';
    require_once '../config/db_config.php';
    $module_ids = user_access_check($conn,$_SESSION["role_id"],);
?>

<?php

    $additionalCSS = [];

    foreach ($module_ids as $module) 
    {
        $additionalCSS[] = 'module_styles/' . $module . '.css';
    }

    include 'dash_header.php';

    foreach ($module_ids as $module) 
    {
        include 'modules/'.$module.'.php';
    }

?>


</body>
</html>