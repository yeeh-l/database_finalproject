<?php
    session_start();
    $_SESSION['v']=$_POST['inputpassword'];
    if($_SESSION['v']!="123456")
    header("location:go_admin.html");
    if($_SESSION['v']=="123456")
    {
        header("location:insert.php");
    }
?>

