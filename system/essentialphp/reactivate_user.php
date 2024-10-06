<?php

require_once '../../config/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
   
    if (isset($_POST['manege_user_id'])) 
    {
        $user_id = $conn->real_escape_string($_POST['manege_user_id']);

        $query = "UPDATE user SET user_status = 'active' WHERE user_id = '$user_id'";

        if ($conn->query($query) === TRUE)
        {
            
            header('Location: ../dashboard.php?msg=reactivation_success');
                exit();
        }
    
        else 
        {
            header('Location: ../dashboard.php?error=reactivation_success');
            exit();
        }
    } 
    else
    {
        header('Location: ../dashboard.php?error=userid_not_found');
    }    exit();
}
    
 
   $conn->close();   
?>
