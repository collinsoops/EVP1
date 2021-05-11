<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php


  for($i=0;$i<$count;$i++)
  {
     $sql="INSERT INTO users (p_id,po_name,po_val) VALUES ('$id','$data['data']['name_'.$i]','$data['data']['val_'.$i]')";
     $result = mysql_query($sql);
  }
?>


</body>
</html>