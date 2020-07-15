<?php
include("connect.php");  //連結資料庫
session_start();
$account = $_SESSION['account'];      //post獲取表單裡的account
?>

<?php   
    if($_POST["userchoice"]==1)
    {
        $sql1 = "Delete FROM `Getitem` WHERE `Account`='$account'";
        $result1 = mysqli_query($link,$sql1) or die("fail sent");

        $sql2 = "Delete FROM `Getattraction` WHERE `Account`='$account'";
        $result2 = mysqli_query($link,$sql2) or die("fail sent");

        $sql = "Delete FROM `Userchoise` WHERE `Account`='$account'";
        $result = mysqli_query($link,$sql) or die("fail sent");

        header("refresh:0;url=Start.html");
        exit;
    }
    else{
        header("refresh:0;url=Start.html");
        exit;
    }
?>
