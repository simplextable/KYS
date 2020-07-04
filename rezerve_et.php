<?php
    session_start();
	if(isset($_SESSION["oturum"])) {
    $rezerve = $_POST["rezerve_et"];
    include 'config.php';

    $query1 = mysql_query("UPDATE materyal SET durum = 'Rezerve' WHERE isim = '".$rezerve."'");
    $query2 = mysql_query("INSERT INTO dolasim
            (islem_id, materyal_id, islem_tc_no, alis_tarihi, rezerve_edis_tarihi, rezerve_bitis_tarihi, islem_turu, islem_sonucu)
            VALUES
            (DEFAULT,'1007','".$_SESSION['kullanici']."',NULL,NOW(),NOW() + INTERVAL 1 DAY,'Rezerve',NULL)");
    if ($query1 && $query2) { echo '
        
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
<script src="js/uikit.min.js" type="text/javascript"></script>
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
        <h2>Giriş Ekranı</h2>
      </div>
    </header>
    <nav>
    <?php include 'uye_menusu.php'; ?> 
    </nav>
    <section class="content">   
        <div class="content-container">
            <?php
             echo "<p>Sayın <strong>". $_SESSION['kullanici_ismi']." ". $_SESSION['kullanici_soyismi']."</p>";
            ?>
            
            <p>Seçmiş olduğunuz materyal adınıza rezerve edilmiştir. 1 gün içerisinde rezerve ettiğiniz materyali ödünç alabilirsiniz.</p>

            <?php include 'config.php';

            header('Refresh: 2; url=uye_paneli.php');
            ?>
            
        </div>
    </section>
    <footer> KYS Kütüphane Yönetim Sistemi v1.0 | (C) 2015 Bütün hakları saklıdır. </footer>
    </div>
  </div>
</div>
</body>
</html>
       ';
        } else { echo "<html><head><title>Rezerve İşlemi Tamamlanamadı!</title></head><body bgcolor='#999999' style='font-family:Helvetica, Garamond, Tahoma'><div style='margin:0 auto; text-align:center; font-size:18px; color:fff; font-weight:bold'><p style='margin-top:50px;'><img src='icons/warning.png' style='margin-right:20px; vertical-align:middle'>Bir sorun meydana geldi...</p><span style='font-size:12px; color:yellow; font-weight:normal'>Profil sayfanıza yönlendiriliyorsunuz...</span></div></body></html>";
    header("Refresh: 1; url=profil.php")';};
?>