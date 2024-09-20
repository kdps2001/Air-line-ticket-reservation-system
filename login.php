<?php
    if(isset($_POST["submit"]))
    {
        $user_name = $_POST["userName"];
        $password = $_POST["password"];
        
        require_once 'config/db_config.php';
        require_once 'function_php/functions_form.php';

        user_login($conn, $user_name, $password);
    }
    else
    {
        header('Location: signin.php');
    }

