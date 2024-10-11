<?php
    require_once '../../config/db_config.php';
    if(!isset($_POST['manage_user_id']) && !isset($_POST['submit']))
    {
        header('Location: ../dashboard.php?error=notgetvalues');
        exit();
    }
    $manage_user_id = $conn->real_escape_string($_POST['manage_user_id']);
    $operation = $_POST['submit'];
    if($operation == 'suspend')
    {
        $status_up = " UPDATE user SET user_status = 'suspend' WHERE user_id = '$manage_user_id'";
        $status = $conn->query($status_up);
        if ($status) 
        {
            echo "User suspended successfully.";
            header('Location: ../dashboard.php?check=pass');
            exit();
        } 
        else 
        {
            echo "Error suspending user: " . $conn->error;
            header('Location: ../dashboard.php?check=fail');
            exit();
        }
    }
    elseif($operation == 'delete')
    {    
        $query = "SELECT * FROM user WHERE user_id = '$manage_user_id'";
        $result = $conn->query($query);
        $user = $result->fetch_assoc();
 
        $insert_query = "INSERT INTO deleted_user (user_id, user_name, user_email) 
                        VALUES ('". $user['user_id'] . "', '" . $user['user_name'] . "','" . $user['email'] . "');";
        

        /* $insert_query = "INSERT INTO deleted_user (user_id, user_name, user_email) 
                         VALUES ('01' , 'pawan' , 'pawan@gmail.com' )"; */


        $result = $conn->query($insert_query);
        if($result)
        {
            $delete_query = "DELETE FROM user WHERE user_id = '$manage_user_id'";
            $result = $conn->query($delete_query);
            if($result)
            {
                header('Location: ../dashboard.php?msg=deletionsuccessfull');
                exit();
            }
        }
        else
        { 
                header('Location: ../dashboard.php?msg=deletion_not_success');
                exit();
        }
    }
   
?>