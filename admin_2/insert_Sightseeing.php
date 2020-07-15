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

            
            $District_town=$_POST['choose_Sightseeing'];     //Sightseeing
            $Attraction_Sightseeing=$_POST['Sightseeing_Attraction'];
            $Picture=$_POST['Picture'];
            $Description=$_POST['Description'];
            $Address=$_POST['Address'];

           

            if($District_town!=NULL && $Attraction_Sightseeing!=NULL && $Picture != NULL && $Description != NULL && $Address != NULL)//新增景點
            {
                $sql_Sightseeing = "INSERT INTO Sightseeing
                (Postal,Attraction,Picture,Description,Address) 
                VALUES ('$District_town','$Attraction_Sightseeing','$Picture','$Description','$Address')";

                mysqli_select_db( $link, 'Sightseeing' );
                $retval_Sightseeing = mysqli_query( $link, $sql_Sightseeing );
                if(! $retval_Sightseeing )
                {
                die('無法新增景點: ' . mysqli_error($link));
                }
                echo "景點新增成功 新增景點";
            }
            else{
                echo"<p>Null 你有東西沒輸入</p><br>";
            }
           
        ?>
        <form action="delete_table.php" method="post">
    <input type="hidden" name="choose_table" value="Sightseeing">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>
    </body>
</html>