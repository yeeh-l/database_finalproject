<?php
    include("connect_database.php");
    
    $sql="UPDATE Puzzle SET `Attraction`='{$_POST['new_Attraction']}' ,`Question`='{$_POST['new_Question']}' ,`Option_1`='{$_POST['new_Option_1']}',`Option_2`='{$_POST['new_Option_2']}',`Option_3`='{$_POST['new_Option_3']}',`Answer`='{$_POST['new_Answer']}' WHERE `Q_id`='{$_POST['Q_id']}'";
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
    <input type="hidden" name="choose_table" value="Puzzle">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>
</body>
</html>