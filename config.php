<?php 
         
$conn = mysql_connect('localhost', 'root', 'idea18');
    if (!$conn) {
    die('Veritabanına bağlanılamadı' . mysql_error());
}
    mysql_select_db('kys');
    mysql_query("SET NAMES 'utf8'  ");
    mysql_query("SET CHARACTER SET utf8");
    mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci' ");

?>