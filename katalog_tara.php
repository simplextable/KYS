<?php
    $key=$_GET['key'];
    $array = array();
    include 'config.php';
    $query=mysql_query("SELECT * FROM materyal WHERE isim LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['isim'];
    }
    echo json_encode($array);
?>