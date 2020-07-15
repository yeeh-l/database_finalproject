<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>insert</title>
    </head>
    <body>
        <?php 
            $server = "database-1.cofclfvd010p.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
            $dbuser = "admin";       # 使用者帳號
            $dbpassword = "whysoserious"; # 使用者密碼
            $dbname = "tsst";    # 資料庫名稱
            header("Content-Type:text/html; charset=utf-8");

        
            $link = mysqli_connect( $server , $dbuser , $dbpassword);
            mysqli_query($link , "SET NAMES 'UTF8'");
            mysqli_select_db($link ,$dbname) or die("fail");
            mysqli_options($link,MYSQLI_OPT_INT_AND_FLOAT_NATIVE,true);

            $item_name=$_POST['Item'];  //Item
            $Memory=$_POST['Memory'];
            $Attraction_item=$_POST['choose_Attraction'];

            if($item_name!=NULL && $Memory!=NULL && $Attraction_item != NULL)//新增道具
            {
                $sql_item = "INSERT INTO Item 
                (Item_name,Memory,Attraction) 
                VALUES ('$item_name','$Memory','$Attraction_item')";

                mysqli_select_db( $link, 'Item' );
                $retval_item = mysqli_query( $link, $sql_item );
                if(! $retval_item ){
                    die('無法新增道具: ' . mysqli_error($link));
                }
                echo "道具新增成功 新增道具<br>";

            }
            else{
                echo"<p>Null 你有東西沒輸入</p><br>";
            }
               
        ?>
        
<form action="delete_table.php" method="post">
    <input type="hidden" name="choose_table" value="item">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>

    </body>
</html>
