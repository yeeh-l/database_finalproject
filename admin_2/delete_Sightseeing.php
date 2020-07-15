

<?php
    include("connect_database.php");
    if($_GET['del']!=NULL)
    {
        $sql="DELETE FROM Sightseeing WHERE Attraction='{$_GET['del']}'";
        mysqli_query($link,$sql);
        $rowDeleted=mysqli_affected_rows($link);
        if($rowDeleted>0)
        {
            echo " DELETE Sightseeing SUCCESS !";
        }
        else
        {
            echo"DELETE Sightseeing FAIL";
        }
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