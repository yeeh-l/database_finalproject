<?php
include("connect.php");

session_start();
$place = $_SESSION['place'];
$account = $_SESSION['account'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>返台。</title>
    <link rel="stylesheet" href="background.css">
    <script src="night_chooseAttraciton.js"></script>
</head>

<body>
    <div class="background">
        <?php
        include("notebook.php");
        ?>
        <div class="check_answer">
            <?php

            #把時間改成台北的 設定格式
            date_default_timezone_set("Asia/Taipei");
            $time = date("Y-n-j G:i:s");

            $sql = "SELECT * From Sightseeing Where Attraction='$place'";         //景點資訊
            $result = mysqli_query($link, $sql) or die("fail sent");
            $row_information = mysqli_fetch_array($result);

            $sql = "SELECT * From Puzzle natural join Sightseeing Where Attraction='$place'";      //正確答案
            $result = mysqli_query($link, $sql) or die("fail sent");
            $row = mysqli_fetch_array($result);
            $answer = $row['Answer'];     //正確答案
            $Q_id = $row['Q_id'];         //此題目id

            #把題目id,使用者選擇的答案,答題時間加到Userchoise裡面
            $addans = "INSERT INTO Userchoice(`Account`,`Q_id`,`User_answer`,`Time`) VALUES ('$account','$Q_id','$_POST[answer]','$time')";
            $result5 = mysqli_query($link, $addans) or die("fail sent1");

            $sql = "SELECT Item_name From Item Where Attraction='$place'";      //該景點道具
            $result = mysqli_query($link, $sql) or die("fail sent");
            $haveitem = mysqli_num_rows($result);                 //如果該景點沒有道具,$haveitem==0,如果有道具,$haveitem==1
            $row_item = mysqli_fetch_array($result);

            echo '
                        <!--顯示景點名稱[Sightseeing(Attaction)]-->
                        <p class="Attraction"> ' . $place . '</p> 
                    </div>

                    <div class="pic_background"></div>
                    <!--顯示背景圖片 [Sightseeing(Picture)]-->
                    <img src="image/picture/' . $row_information['Picture'] . '" class="backgroundImg">';

            if ($_POST['answer'] == $answer) {        //如果答對了

                if ($haveitem == 1) {        //如果這個景點"有道具"
                    $check = "SELECT * FROM Getitem WHERE Account = '$account' AND Item_name='$row_item[Item_name]'"; //檢測玩家是否已經拿過道具
                    $result = mysqli_query($link, $check);
                    $rows = mysqli_num_rows($result);

                    if ($rows == 0) {       //如果還沒有得到過此道具,就把它加進去Getitem中
                        $add_item = "INSERT INTO Getitem(Account,Item_name) VALUES ('$account','$row_item[Item_name]')";
                        $result = mysqli_query($link, $add_item) or die("fail sent");

                        echo '
                        <form action="morning.php" method="post">
                            <input class="success_G" type=submit name="item_name" value="' . $row_item['Item_name'] . '"> 
                            
                            <div class="item_word">
                            <strong>
                                <p id="item_alert">恭喜你獲得道具</p>
                            </strong>

                            <!--顯示獲得的道具[Item(Item_name)]-->
                            <strong>
                                <p id="get_item">『 ' . $row_item['Item_name'] . '』</p>   <!--把道具丟到背包裡(插入資料庫)-->
                            </strong>

                            <strong>
                                <p id="item_alert">已放入您的背包!!!</p>
                            </strong>
                            </div>
                        </form>';
                    } else {              //如果已經得到過此道具
                        echo '
                            <form action="night.php" method="post">
                                <input class="success_G" type=submit name="item_name" value="' . $row['Item_name'] . '"> 
                                
                                <div class="item_word">
                                <strong>
                                    <p id="item_alert">你已經獲得過</p>
                                </strong>
    
                                <!--顯示獲得的道具[Item(Item_name)]-->
                                <strong>
                                    <p id="get_item">『 ' . $row['Item_name'] . '』</p>   <!--把道具丟到背包裡(插入資料庫)-->
                                </strong>
    
                                <strong>
                                    <p id="item_alert">很貪心喔!!</p>
                                </strong>
                                </div>
                            </form>';
                    }
                } else {        //如果這個景點"沒有道具"
                    echo '
                        <form action="morning.php" method="post">
                            <input class="success_G" type=submit name="item_name" value="empty"> 
                            
                            <div class="item_word">
                            <strong>
                                <p id="item_alert">你答對了但是運氣不好</p>
                            </strong>

                            <!--顯示獲得的道具[Item(Item_name)]-->
                            <strong>
                                <p id="get_item">這一關沒有道具</p>
                            </strong>

                            <strong>
                                <p id="item_alert">:(</p>
                            </strong>
                            </div>
                        </form>';
                }
            } else {     //如果答錯了
                echo '
                    <form action="night.php">
                        <input class="fail_G" type=submit >
                            <div class="item_fail_word">
                                <strong>
                                    <p id="item_alert">挑戰失敗!!!!</p>
                                </strong>
                                <strong>
                                    <p id="item_alert">請重新選取你要的地區</p>
                                </strong>
                            </div>
                    </form>';
            }
            ?>

        </div>
    </div>
</body>

</html>