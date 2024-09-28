<?php

function user_access_check($conn,$role)
{
    if(! isset($role))
    {
        header('Location: ../index.php');
        exit();
    }

    if($role == 'role00')
    {
        header('Location: ../index.php');
        exit();
    }
    
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
        
    }

    $sql = "SELECT module_id FROM rolemodule WHERE role_id ='$role';";
    $result = $conn->query($sql);

    $module_ids = array(); //empty array
    $row = mysqli_fetch_assoc($result);

    if($row = mysqli_fetch_assoc($result))
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $module_ids[] = $row['module_id']; // append
        }
        return $module_ids;
    }
    
    return $module_ids;
}