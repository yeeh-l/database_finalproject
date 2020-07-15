

<?php
    include("connect_database.php");
    if($_GET['edit']!=NULL)
    {
        $sql="SELECT * FROM Sightseeing WHERE Attraction='{$_GET['edit']}'";
        $sql_Postal="SELECT Postal FROM Township ORDER BY Postal";
        $result=mysqli_query($link,$sql);
        $result_Postal=mysqli_query($link,$sql_Postal);
        $row=mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<head>
    <meta charset = "UTF-8">
    <title>edit_Sightseeing</title>
</head>
<body>
    
    <form action="update_Sightseeing.php" method="post">
        <input type="hidden"  value="<?php echo $row['Postal'];?>" name="origin_Postal">
        <input type="hidden"  value="<?php echo $row['Attraction'];?>" name="origin_Attraction">
        <p>郵遞區號<select name="new_Postal" ></p>
        <option value="<?php echo $row['Postal'];?>"> 原：<?php echo $row['Postal'];?></option>
        <?php while($row_Postal=mysqli_fetch_array($result_Postal) )
        {
            echo "<option value='{$row_Postal['Postal']}'>{$row_Postal['Postal']}</option>";
        } 
        ?>
        <p>排版<select name="" ></p>
        <p>景點名稱<input name="new_Attraction" value="<?php echo $row['Attraction'];?>"></p>
        <p>照片網址<input name="new_Picture" value="<?php echo $row['Picture'];?>"></p>
        <p>照片：<img src="<?php echo $row['Picture'];?>"></p>
        <p>景點介紹<input name="new_Description" value="<?php echo $row['Description'];?>"></p>
        <p>景點地址<input name="new_Address" value="<?php echo $row['Address'];?>"></p>
        <input type="submit" value="送出">
    </form>
</body>
</html>
