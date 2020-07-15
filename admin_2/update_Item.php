<?php
    include("connect_database.php");
    
    $sql="UPDATE Item SET `Attraction`='{$_POST['new_Attraction']}' ,`Memory`='{$_POST['new_Memory']}' ,`Item_name`='{$_POST['new_Item_name']}' WHERE `Item_name`='{$_POST['origin_item']}'";
    $result=mysqli_query($link,$sql);
    mysqli_error($link);
    $update=mysqli_affected_rows($link);
    
    if($update>0)
    {
        echo "UPDATE SUCCESS!";
    }
    else
    {
        echo "更新失敗，或輸入資料與原本相同";
    }
    
?>
<!DOCTYPE html>
<body>

<form action="delete_table.php" method="post">
    <input type="hidden" name="choose_table" value="item">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>
</body>
</html>