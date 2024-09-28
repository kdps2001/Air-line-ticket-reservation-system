<?php

function user_access_check($role)
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
}