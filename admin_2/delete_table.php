
<p><a href="insert.php">返回選擇頁面</a><p>
<?php

    $server = "database-1.cofclfvd010p.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
    $dbuser = "admin";       # 使用者帳號        
    $dbpassword = "whysoserious"; # 使用者密碼
    $dbname = "tsst";    # 資料庫名稱
    header("Content-Type:text/html; charset=utf-8");
    $link = mysqli_connect( $server , $dbuser , $dbpassword);
    mysqli_query($link , "SET NAMES 'UTF8'");
    mysqli_select_db($link ,$dbname) or die("fail");
    $choose=$_POST['choose_table'];
?>


<?php
    if($choose == 'Township'){
        $sql_District="SELECT District FROM Administration";
        $result_District=mysqli_query($link,$sql_District);
        echo "<p>新增鄉鎮市區</p>";
        echo "<form method='post' action='insert_Township.php' id='content_item'>";
        echo "<select name='Township_Attraction' >";
        while($row_District=mysqli_fetch_array($result_District) )
        {
            echo "<option value='{$row_District['District']}'>{$row_District['District']}</option>";
        }
        
        echo"    <input type='text' name='Township_Position' placeholder='地區'>
            <input type='text' name='Township_Postal' placeholder='郵遞區號'><br>";
        echo "<p></p><input type='submit' value='確定新增'></form>";    
    }
?>
<?php
    if($choose == 'item'){
        $sql = 'SELECT  Attraction FROM Sightseeing';
        $result = mysqli_query($link, $sql) or die('fail sent');
        echo "<p>新增道具</p>";
        echo "<form method='post' action='insert_Item.php' id='content_item'>
            <select name='choose_Attraction'>
            <option value='null'>---請選擇表格---</option>";
        while($con = mysqli_fetch_assoc($result))
        {
            $b = $con['Attraction'];
            echo "<option value=".$b.">".$b."</option>";
        }
        echo "<input type='text' name='Item' placeholder='道具名稱' >
            <input type='text' name='Memory' placeholder='記憶片段內容'>";
        echo "</select><br>";
        echo "<p id='p2'></p><input type='submit' value='確定新增'>";
    }

    if($choose == 'Sightseeing'){
        $sql = 'SELECT Distinct District FROM Township';
        $result = mysqli_query($link, $sql) or die('fail sent');
        echo "<p>新增景點&道具</p>";
        echo "<form method='post' action='insert_Sightseeing.php' id='content_sightseeing'>
            <select name='choose_district'>
            <option value='null'>---選擇縣市---</option>";
        while($con = mysqli_fetch_assoc($result))
        {
            $b = $con['District'];
            $c = $con['Town'];
            $d = $con['Postal'];
            echo "<option value=".$d.">".$b.$c."</option>";
        }
        echo "<input type='text' name='Sightseeing_Attraction' placeholder='景點名稱'><br><br>
            <input type='text' name='Picture' placeholder='景點照片'><br><br>
            <input type='text' name='Description' placeholder='景點描述' style=width:600px><br><br>
            <input type='text' name='Address' placeholder='景點地址' style=width:600px>";
        echo "</select><br>";
        echo "<p id='p2'></p><input type='submit' value='確定新增'>";
    }

    if($choose == 'Puzzle'){
        $sql = 'SELECT  Attraction FROM Sightseeing';
        $result = mysqli_query($link, $sql) or die('fail sent');
        echo "<p>新增謎題</p>";
        echo "<form method='post' action='insert_Puzzle.php' id='content_puzzle'>
            <select name='choose_Puzzle'>
            <option value='null'>---請選擇表格---</option>";
        while($con = mysqli_fetch_assoc($result))
        {
            $b = $con['Attraction'];
            echo "<option value=".$b.">".$b."</option>";
        }
        echo "<input type='text' name='Question' placeholder='謎題' style=width:300px><br>
            <input type='text' name='Option_1' placeholder='選項一'>
            <input type='text' name='Option_2' placeholder='選項二'>
            <input type='text' name='Option_3' placeholder='選項三'>";
        echo "
            <select name='choose_answer'>答案是？
             <option value='1'>選項一</option>
             <option value='2'>選項二</option>
            <option value='3'>選項三</option>";
        echo "<p></p><input type='submit' value='確定新增'>";
    }
?>

    
<?php
    if($choose=='item')
    {
        $sql="SELECT * From Item";
        $result=mysqli_query($link,$sql);
        echo"<table border=3 id='content2_item'>";
        echo"<tr><td>道具名稱</td><td>記憶碎片</td><td>景點名稱</td><td>功能</td></tr>";
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr><td>{$row['Item_name']}</td>
                      <td>{$row['Memory']}</td>
                      <td>{$row['Attraction']}</td>
                      <td><a href='delete_Item.php?del={$row['Item_name']}'>delete</a>
                      <a href='edit_Item.php?edit={$row['Item_name']}'>edit</a></td></tr>";
        }
        echo "</table>";
    }
    if($choose=='Sightseeing')
    {
        $sql="SELECT * From Township natural join Sightseeing natural join Item order by Postal";
        $result=mysqli_query($link,$sql);
        echo"<table border=3 id='content2_sightseeing'>";
        echo"<tr><td>所在區域</td><td>景點名稱</td><td>照片</td><td>景點描述</td><td>景點地址</td><td>道具名稱</td><td>記憶碎片</td><td>功能</td></tr>";
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr><td>{$row['District']}{$row['Town']}</td>
                      <td>{$row['Attraction']}</td>
                      <td><img src='{$row['Picture']}'></td>
                      <td>{$row['Description']}</td>
                      <td>{$row['Address']}</td>
                      <td>{$row['Item_name']}</td>
                      <td>{$row['Memory']}</td>
                      <td><a href='delete_Sightseeing.php?del={$row['Attraction']}'>delete</a>
                      <a href='edit_Sightseeing.php?edit={$row['Attraction']}'>edit</a></td></tr>";
        }
        echo "</table>";
    }
    if($choose=='Puzzle')
    {
        $sql="SELECT * From Puzzle";
        $result=mysqli_query($link,$sql);
        echo"<table border=3 id='content2_puzzle'>";
        echo"<tr><td>景點名稱</td><td>謎題</td><td>選項一</td><td>選項二</td><td>選項三</td><td>答案</td><td>功能</td></tr>";
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr><td>{$row['Attraction']}</td>
                      <td>{$row['Question']}</td>
                      <td>{$row['Option_1']}</td>
                      <td>{$row['Option_2']}</td>
                      <td>{$row['Option_3']}</td>
                      <td>{$row['Answer']}</td>

                      <td><a href='delete_Puzzle.php?del={$row['Q_id']}'>delete</a>
                      <a href='edit_Puzzle.php?edit={$row['Q_id']}'>edit</a></td></tr>";
        }
        echo "</table>";
    }
    if($choose=='Township')
    {
        $sql="SELECT * From Township";
        $result=mysqli_query($link,$sql);
        echo"<table border=3 id='content2_town'>";
        echo"<tr><td>區域</td><td>鄉鎮市區</td><td>郵遞區號</td><td>功能</td></tr>";
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr><td>{$row['District']}</td>
                      <td>{$row['Town']}</td>
                      <td>{$row['Postal']}</td>
                      <td><a href='delete_Township.php?del={$row['Postal']}'>delete</a>
                      <a href='edit_Township.php?edit={$row['Postal']}'>edit</a></td></tr>";
        }
        echo "</table>";
    }



?>
