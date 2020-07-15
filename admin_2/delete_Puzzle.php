

<?php
    include("connect_database.php");
    if($_GET['del']!=NULL)
    {
        $sql="DELETE FROM Puzzle WHERE Q_id='{$_GET['del']}'";
        mysqli_query($link,$sql);
        $rowDeleted=mysqli_affected_rows($link);
        if($rowDeleted>0)
        {
            echo " DELETE Puzzle SUCCESS !";
        }
        else
        {
            echo"DELETE Puzzle FAIL";
        }
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