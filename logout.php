<?php

class Logout
{
    public function Logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
