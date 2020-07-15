<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body{
            background-color:plum;
        }
        form{
            margin-top: 1%;
            margin-left: 40%;
        }
        p{
            color: black;
            margin:0 auto;
            font-family: sans-serif, "微軟正黑體";
            font-size: 30px;
        }
        #content{
            background-color:rgb(183, 61, 199);
            width: 200px;
            height: 40px;

            padding:20px 10px;        
        }
        #content2{
            width: 300px;
            height: 40px; 
            margin-top: 14%;
            margin-left: 39%;    
        }
    </style>
</head>    
    <body>
        <p id="content2" >請選擇要操作的表格</p>
        <form action='delete_table.php' method='post' id="content">
        <select name="choose_table">
        <option value='NULL'>---請選擇表格---</option>
        <option value='Sightseeing'>景點&道具</option>
        <option value='Puzzle'>謎題</option>
        <option value='Township'>鄉鎮市區</option>
        <input type='submit' name='確定' onclick="javascript:location.href='delete_table.php'">
        </form>
    </body> 

</html>
