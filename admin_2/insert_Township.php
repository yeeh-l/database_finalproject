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

            $Township_Attraction=$_POST['Township_Attraction'];     //Township
            $Township_Position=$_POST['Township_Position'];
            $Township_Postal=$_POST['Township_Postal'];
            
          
        
            if($Township_Attraction!=NULL&&$Township_Position!=NULL&&$Township_Postal!=NULL)//新增地區
            {
                $sql_Township = "INSERT INTO Township 
                (District,Town,Postal) 
                VALUES ('$Township_Attraction','$Township_Position','$Township_Postal')";
    
                mysqli_select_db( $link, 'Township' );
                $retval_Township = mysqli_query( $link, $sql_Township );
                if(! $retval_Township )
                {
                die('無法新增地區: ' . mysqli_error($link));
                }
                echo "地區新增成功 新增地區";
            }
            else{
                echo"<p>Null 你有東西沒輸入</p><br>";
            }
       
        ?>

<form action="delete_table.php" method="post">
    <input type="hidden" name="choose_table" value="Township">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>
    </body>
</html>