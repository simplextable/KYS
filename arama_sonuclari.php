<?php
	session_start();
	if(!isset($_SESSION["oturum"])){ 
	echo "<html><head><title>Uyarı: Yetkilendirme Hatası!</title></head><body bgcolor='#999999' style='font-family:Helvetica, Garamond, Tahoma'><div style='margin:0 auto; text-align:center; font-size:18px; color:fff; font-weight:bold'><p style='margin-top:50px;'><img src='icons/warning.png' style='margin-right:20px; vertical-align:middle'>Bu sayfayı görüntüleme yetkiniz yoktur.</p><span style='font-size:12px; color:yellow; font-weight:normal'>Hesabınız varsa lütfen <a href='giris.php' style='color:#fff; text-decoration:underline;'>giriş</a> yaparak tekrar deneyiniz...</span></div></body></html>"; 
	}else{
?>
    
<!doctype html>
<html>
<head>
<title>KYM Kütüphane Yönetim Sistemi</title>
<meta charset="utf-8" >
<link rel="stylesheet" type="text/css" href="css/stil.css">
<link rel="stylesheet" href="css/uikit.min.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.typeahead.css">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/uikit.min.js"></script>
<script src="js/typeahead.min.js" type="text/javascript"></script>
</head>
<body>
<div class="main">
  <div class="container">
    <div class="bg">
    <header>
      <div class="logo">
        <h1>KYS - Kütüphane Yönetim Sistemi</h1>
      </div>
      <div class="screen-name">
        <h2>Arama Sonuçları</h2>
      </div>
    </header>
    <nav>
      <?php include 'uye_menusu.php'; ?>
    </nav>
    <section class="content">   
        <div class="content-container">
            
<?php

include 'config.php';

$typeahead  = $_GET["typeahead"];

$s1= mysql_query("select * from materyal where isim LIKE '%{$typeahead}%'");  

echo '<table border=1 cellpadding=5 cellspacing=0 width=100%>';
echo '<tr><th>Materyal Adı</th><th>Yayıncı</th><th>Sayfa Sayısı</th><th>Yazar</th><th>Dili</th><th>İçerik Türü</th><th>Yönetmen</th><th>Yayın Sayısı</th><th>Yayın Yılı</th><th>Durum</th><th></th></tr>';
            
while($s2 = mysql_fetch_assoc($s1)){
            
$q1 = $s2['isim'];
$q2 = $s2['yayinci'];
$q3 = $s2['sayfa_sayisi'];
$q4 = $s2['yazar'];
$q5 = $s2['dili'];
$q6 = $s2['icerik_turu'];
$q7 = $s2['yonetmen'];
$q8 = $s2['yayin_sayisi'];
$q9 = $s2['yayin_yili'];
$q10= $s2['durum'];    
$q11 = 10;            
    
echo '<tr>';
echo '<td align="center">'.$q1.'</td><td align="center">'.$q2.'</td><td align="center">'.$q3.'</td><td align="center">'.$q4.'</td><td align="center">'.$q5.'</td><td align=center>'.$q6.'</td><td align=center>'.$q7.'</td><td align="center">'.$q8.'</td><td align="center">'.$q9.'</td><td align="center">'.$q10.'</td><td align="center">'
    
?>

<?php            
if($q10=="Mevcut"){
echo    '<form action="rezerve_et.php" method="post" name="rezerve_et"><input name="rezerve_et" type="hidden" value="'.$q1.'"><input type="submit" value="rezerve et"></form>';
}    
echo '</td></tr>';
}
echo '</table>';    
    
?>    
    
  </div>
    </section>
    <footer> KYS Kütüphane Yönetim Sistemi v1.0 | (C) 2015 Bütün hakları saklıdır. </footer>
      </div>
  </div>
</div>

</body>
</html>
    
<?php
    }
?>