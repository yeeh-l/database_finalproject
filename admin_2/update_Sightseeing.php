<?php
    include("connect_database.php");
    
$sql="UPDATE Sightseeing SET `Postal`='{$_POST['new_Postal']}' ,`Attraction`='{$_POST['new_Attraction']}' ,`Picture`='{$_POST['new_Picture']}',`Description`='{$_POST['new_Description']}',`Address`='{$_POST['new_Address']}' WHERE `Postal`='{$_POST['origin_Postal']}' AND `Attraction`='{$_POST['origin_Attraction']}'";
    $result=mysqli_query($link,$sql);
    if(!$result){
        die(mysqli_error($link));
    }
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
    <input type="hidden" name="choose_table" value="Sightseeing">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>
</body>
</html>