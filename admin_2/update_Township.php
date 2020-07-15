<?php
    include("connect_database.php");
    
    $sql="UPDATE Township SET `District`='{$_POST['new_District']}' ,`Town`='{$_POST['new_Town']}' ,`Postal`='{$_POST['new_Postal']}' WHERE `Postal`='{$_POST['origin_Postal']}'";
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
    <input type="hidden" name="choose_table" value="Township">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>
</body>
</html>