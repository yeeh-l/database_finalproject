

<?php
    include("connect_database.php");
    if($_GET['edit']!=NULL)
    {
        $sql="SELECT * FROM Item WHERE Item_name='{$_GET['edit']}'";
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
    <style type="text/css">
        body{
            background-color:plum;
        }
        p,textarea{
            color: black;
            margin-top: 1%;
            font-family: sans-serif, "微軟正黑體";
            font-size: 20px;
        }
        #content{
            background-color:rgb(183, 61, 199);
            width: 270px;
            height: 60px;

            padding:20px 10px;        
        }
    </style>
</head>
<body>
    <form action="update_item.php" method="post">
        <input type="hidden"  value="<?php echo $row['Item_name'];?>" name="origin_item">
        <p>道具名稱 : <input name="new_Item_name" value="<?php echo $row['Item_name'];?>" ></p>
        <p>記憶碎片 : <input name="new_Memory" value="<?php echo $row['Memory'];?>"></p>
        <p>景點名稱 : <select name="new_Attraction" ></p>
        <option value="<?php echo $row['Attraction'];?>"> 原：<?php echo $row['Attraction'];?></option>
        <?php while($row_attraction=mysqli_fetch_array($result_attraction) )
        {
            echo "<option value='{$row_attraction['Attraction']}'>{$row_attraction['Attraction']}</option>";
        } 
        ?>
        <input type="submit" value="送出">
    </form>
</body>
</html>
