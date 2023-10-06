<?php
    if(!empty($_SESSION['user'])){
        header('location:index.php');die;
    }
    //$_server['http_referer'];

?>