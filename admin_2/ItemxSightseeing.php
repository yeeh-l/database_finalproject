<?php
include("connect_database.php");
$Array=array();

$sql="SELECT DISTINCT District FROM Township order by Postal";
$result= mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result))
{  
   $b=$row['District'];
   $_SESSION[$b]=0;
   $_SESSION["{$b}start"]=0;
}
$sql_2="SELECT District From Township order by Postal";
$result_2=mysqli_query($link,$sql_2);
while($row_2=mysqli_fetch_assoc($result_2))
{
   $b=$row_2['District'];
   $_SESSION[$b]++;
}
$sql_3="SELECT Town From Township order by Postal";
$result_3=mysqli_query($link,$sql_3);
while($row_3=mysqli_fetch_assoc($result_3))
{
   $b=$row_3['Town'];
   array_push($Array,$b);
}
$sql_4="SELECT DISTINCT District From Township order by Postal";
$result_4=mysqli_query($link,$sql_4);
$count=0;
while($row_4=mysqli_fetch_assoc($result_4))
{
   $b=$row_4['District'];
   $_SESSION["{$b}start"]=$count;
   $count+=$_SESSION[$b];

}

echo $_SESSION['台北市start']
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>URL.createObjectURL Example</title>
</head>
<body>
<form action="register.php" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">


  











  <input type='file' />
  <img />
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script>
    $('input').on('change', function(e){      
      const file = this.files[0];
      const objectURL = URL.createObjectURL(file);
      
      $('img').attr('src', objectURL);
    });
  </script>
  <button type="submit" id="submit">新增</button>
   </form>
</body>
</html>