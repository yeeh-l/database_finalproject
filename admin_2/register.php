<?php
        
        //限制圖片型別格式，大小
        if (((@$_FILES["file"]["type"] == "image/gif")
            || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg"))
         ) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            } else {
                echo "檔名: " . $_FILES["file"]["name"] . "<br />";
                echo "檔案型別: " . $_FILES["file"]["type"] . "<br />";
                echo "檔案大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                echo "快取檔案: " . $_FILES["file"]["tmp_name"] . "<br />";

            //設定檔案上傳路徑，選擇指定資料夾

                if (file_exists("Image/Picture/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"],
                        "Picture/" . $_FILES["file"]["name"]
                    );
                    echo "儲存於: " . "Image/Picture/" . $_FILES["file"]["name"];//上傳成功後提示上傳資訊
                }
            }
        } else {
            echo "上傳失敗！";//上傳失敗後顯示錯誤資訊
        }

        ?>

<form action="delete_table.php" method="post">
    <input type="hidden" name="choose_table" value="Sightseeing">
    <input type='submit' value='回到上一頁' onclick="javascript:location.href='delete_table.php'">

</form>