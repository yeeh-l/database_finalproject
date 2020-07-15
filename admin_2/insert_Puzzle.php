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



            $Attraction_Puzzle=$_POST['choose_Puzzle'];     //Puzzle
            $Question=$_POST['Question'];
            $Option_1=$_POST['Option_1'];
            $Option_2=$_POST['Option_2'];
            $Option_3=$_POST['Option_3'];
            $Answer=$_POST['choose_answer'];

           

            if($Attraction_Puzzle!=NULL && $Question!=NULL && 
                $Option_1!=NULL && $Option_2!=NULL && $Option_3!=NULL && $Answer!=NULL)//新增謎題
            {  
                mysqli_select_db( $link, 'Puzzle' );
                $get_id="SELECT MAX(Q_id) from Puzzle";
                $Q_id=mysqli_query($link,$get_id);
                
                
                $sql = "SELECT MAX(Q_id) AS NEXT_Q_id FROM Puzzle";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_object($result,true) ;
                $num=$row->NEXT_Q_id+1;
    
                $sql_Puzzle = "INSERT INTO Puzzle 
                (Q_id,Attraction,Question,Option_1,Option_2,Option_3,Answer) 
                VALUES ('$num','$Attraction_Puzzle','$Question','$Option_1','$Option_2','$Option_3','$Answer')";
    
                
                $retval_Puzzle = mysqli_query( $link, $sql_Puzzle );
                if(! $retval_Puzzle )
                {
                die('無法新增題目: ' . mysqli_error($link));
                }
                echo "題目新增成功 新增題目";
            }
            else{
                echo"<p>Null 你有東西沒輸入</p><br>";
            }
           

        ?>


<form action="delete_table.php" method="post">
    <input type="hidden" name="choose_table" value="Puzzle">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>

    </body>
</html>