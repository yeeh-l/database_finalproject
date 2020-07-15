<?php
include("connect.php");  //連結資料庫
session_start();
$account = $_SESSION['account'];      //post獲取表單裡的account
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>返台。</title>
    <link rel="stylesheet" href="gameover.css">
</head>

<body>
    <div class="background">
        <form action="Delete.php" method="post">
                <div class="again">
                    <p class="ask">本次遊戲已結束</p>
                    <p class="ask">是否需要清除此帳號的資料?</p>
                    <div class="yes_no_button">
                    <p class="choice_yes">是</p>
                    <p class="choice_no">否</p>
                    <input class="yes" type="submit" name="userchoice" value="1">
                    <input class="no" type="submit" name="userchoice"  value="0">
                    </div>
                </div>
            <form>
    </div>

</body>

</html>