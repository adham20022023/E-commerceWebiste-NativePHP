<?php
    //? allow autenticatied user and prevent guests
    if(!isset($_SESSION['user'])) {
        header('location:index.php');
        die;
    }