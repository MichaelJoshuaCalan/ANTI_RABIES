<?php
include"db_conn.php";

  $month = [];

  for($i=0; $i<=12; $i++){
    $query = "SELECT COUNT(*) as count FROM record_s WHERE MONTH(Date)='1' ";
    $result = mysqli_query($conn,$query);

    if(!$result){
      die("Connection Failed".mysqli_error($conn));
    }
    $months=mysqli_fetch_assoc($result);
    $total[$i] = $months['count'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?php echo $total[$i]?>;</p>
</body>
</html>