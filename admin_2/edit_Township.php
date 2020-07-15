

<?php
    include("connect_database.php");
    if($_GET['edit']!=NULL)
    {
        $sql="SELECT * FROM Township WHERE Postal='{$_GET['edit']}'";
        $sql_District="SELECT District FROM Administration";
        $result=mysqli_query($link,$sql);
        $result_District=mysqli_query($link,$sql_District);
        $row=mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<head>
    <meta charset = "UTF-8">
    <title>edit_item</title>
</head>
<body>
    <form action="update_Township.php" method="post">
        <input type="hidden"  value="<?php echo $row['Postal'];?>" name="origin_Postal">
        <p>地區<select name="new_District" ></p>
        <option value="<?php echo $row['District'];?>"> 原：<?php echo $row['District'];?></option>
        <?php while($row_District=mysqli_fetch_array($result_District) )
        {
            echo "<option value='{$row_District['District']}'>{$row_District['District']}</option>";
        } 
        ?>
       
        <p>排版<input type="hidden"></p>
        <p>鄉鎮市區 :<input name="new_Town" value="<?php echo $row['Town'];?>"></p>
        <p>郵遞區號<input name="new_Postal" value="<?php echo $row['Postal'];?>"></p>
        <input type="submit" value="送出">
    </form>
</body>
</html>
