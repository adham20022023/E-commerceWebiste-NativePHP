<?php
session_start();
// print_r($_SESSION);
// die;
unset($_SESSION['user']);
if(isset($_COOKIE['remember_me'])){
    setcookie('remember_me','',time()-100,'/');
}
header('location:../../login.php');

?>