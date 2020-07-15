<?php
    $dbhost = 'database-1.cofclfvd010p.us-east-1.rds.amazonaws.com';
    $dbuser = 'admin';
    $dbpass = 'whysoserious';
    $dbname = 'tsst';

    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_query($link, "SET NAMES 'UTF8'");
    mysqli_select_db($link, $dbname) or die("fail");

    $choose=$_POST['choose_table'];
    echo "<button onclick=javascript:location.href='choose.php'> 返回選擇頁 </button><br>";
?>
<?php
    if($choose == 'Township'){
        echo "<form method='post' action='insert_Township.php'>";
        echo "<p>新增地區</p>";
        echo "<input type='text' name='Township_Attraction' placeholder='縣市'>
            <input type='text' name='Township_Position' placeholder='地區'>
            <input type='text' name='Township_Postal' placeholder='郵遞區號'><br>";
        echo "<p></p><input type='submit' value='確定新增'></form>";    
    }
?>
<?php
    if($choose == 'item'){
        $sql = 'SELECT  Attraction FROM Sightseeing';
        $result = mysqli_query($link, $sql) or die('fail sent');
        echo "<p>新增道具</p>";
        echo "<form method='post' action='insert_Item.php'>
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
        echo "<p></p><input type='submit' value='確定新增'>";
    }

    if($choose == 'Sightseeing'){
        $sql = 'SELECT District ,Town ,Postal FROM Township';
        $result = mysqli_query($link, $sql) or die('fail sent');
        echo "<p>新增景點</p>";
        echo "<form method='post' action='insert_Sightseeing.php'>
            <select name='choose_Sightseeing'>
            <option value='null'>---請選擇表格---</option>";
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
        echo "<p></p><input type='submit' value='確定新增'>";
    }

    if($choose == 'Puzzle'){
        $sql = 'SELECT  Attraction FROM Sightseeing';
        $result = mysqli_query($link, $sql) or die('fail sent');
        echo "<p>新增謎題</p>";
        echo "<form method='post' action='insert_Puzzle.php'>
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
        echo "</select><p>答案是：</p>
            <select name'choose_answer'>
                <option value='1'>選項一</option>
                <option value='2'>選項二</option>
                <option value='3'>選項三</option>
            </select>";
        echo "<p></p><input type='submit' value='確定新增'>";
    }
?>