    
    
 <?php   
    $server = "database-1.cofclfvd010p.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
    $dbuser = "admin";       # 使用者帳號        
    $dbpassword = "whysoserious"; # 使用者密碼
    $dbname = "tsst";    # 資料庫名稱
    header("Content-Type:text/html; charset=utf-8");
    $link = mysqli_connect( $server , $dbuser , $dbpassword);
    mysqli_query($link , "SET NAMES 'UTF8'");
    mysqli_select_db($link ,$dbname) or die("fail");
?>