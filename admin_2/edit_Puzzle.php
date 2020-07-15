

<?php
    include("connect_database.php");
    if($_GET['edit']!=NULL)
    {
        $sql="SELECT * FROM Puzzle WHERE Q_id='{$_GET['edit']}'";
        $sql_getattraction="SELECT Attraction FROM Sightseeing";
        $result=mysqli_query($link,$sql);
        $result_attraction=mysqli_query($link,$sql_getattraction);
        $row=mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<head>
    <meta charset = "UTF-8">
    <title>edit_item</title>
</head>
<body>
    <form action="update_Puzzle.php" method="post">
        <input type="hidden"  value="<?php echo $row['Q_id'];?>" name="Q_id">
        <p>景點名稱<select name="new_Attraction" ></p>
        <option value="<?php echo $row['Attraction'];?>"> 原：<?php echo $row['Attraction'];?></option>
        <?php while($row_attraction=mysqli_fetch_array($result_attraction) )
        {
            echo "<option value='{$row_attraction['Attraction']}'>{$row_attraction['Attraction']}</option>";
        } 
        ?>
       
        <p>排版<input type="hidden"></p>
        <p>謎題 :<input name="new_Question" value="<?php echo $row['Question'];?>"></p>
        <p>選項一<input name="new_Option_1" value="<?php echo $row['Option_1'];?>"></p>
        <p>選項二<input name="new_Option_2" value="<?php echo $row['Option_2'];?>"></p>
        <p>選項三<input name="new_Option_3" value="<?php echo $row['Option_3'];?>"></p>
        <p>答案<select name='new_Answer'></p>
        <option value="<?php echo $row['Answer'];?>"> 原：<?php echo $row['Answer'];?></option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <input type="submit" value="送出">
    </form>
</body>
</html>
