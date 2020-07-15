<?php
    include("connect_database.php");

    $District = $_POST['District'];
    $sql = "SELECT Town FROM Township WHERE District = '$District'";
    $result = mysqli_query($link, $sql) or die("取出資料失敗！".mysqli_error($link));
    $res = "";//把準備回傳的變數res準備好
    while($data=mysqli_fetch_assoc($result)){
       $res .= "
          <option value='{$data["Town"]}'>{$data['Town']}</option>
       ";//將對應的型號項目遞迴列出
    };
    echo $res;//將型號項目丟回給ajax
?>