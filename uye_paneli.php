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

<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/uikit.min.js" type="text/javascript"></script>
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
             echo "<h1>Hoşgeldiniz Sayın <strong>". $_SESSION['kullanici_ismi']." ". $_SESSION['kullanici_soyismi']."</h1>"; 
            ?>
            
            <p>Kişisel profil sayfanızdan ödünç aldığınız ya da rezerve ettiğiniz materyallerle ilgili bilgileri burada takip edebilirsiniz.</p>

            <?php include 'config.php';

            $sorgu_tum_alinmis = mysql_query("SELECT materyal_id FROM dolasim WHERE islem_tc_no='".$_SESSION['kullanici']."'");
            
            echo '<table border=1 cellpadding=5 cellspacing=0 width=100%>';
            echo '<tr><th>Materyal Adı</th><th>Alış tarihi</th><th>Teslim tarihi</th><th>Rezerve etme tarihi</th><th>Rezerve bitiş tarihi</th><th>İşlem Türü</th><th>İşlem Sonucu</th></tr>';
          
            while($tum_alinmis_1 = mysql_fetch_assoc($sorgu_tum_alinmis)){
            $tum_alinmis_2 = $tum_alinmis_1['materyal_id'];
            $tum_alinmis_3 = mysql_query("SELECT isim FROM materyal WHERE materyal_id='".$tum_alinmis_2."' ");
            $x1 = mysql_query("SELECT alis_tarihi,teslim_tarihi,rezerve_edis_tarihi,rezerve_bitis_tarihi,islem_turu,islem_sonucu FROM dolasim WHERE materyal_id='".$tum_alinmis_2."' ORDER BY alis_tarihi");
            $x2 = mysql_fetch_assoc($x1);
            $x3 = $x2['alis_tarihi'];
            $x4 = $x2['teslim_tarihi'];
            $x5 = $x2['rezerve_edis_tarihi'];
            $x6 = $x2['rezerve_bitis_tarihi'];
            $x7 = $x2['islem_turu'];
            $x8 = $x2['islem_sonucu'];
            $tum_alinmis_4 = mysql_fetch_assoc($tum_alinmis_3);
            $tum_alinmis = $tum_alinmis_4['isim'];
            echo '<tr>';
            echo '<td>'.$tum_alinmis.'</td><td>'.$x3.'</td><td>'.$x4.'</td><td>'.$x5.'</td><td>'.$x6.'</td><td align=center>'.$x7.'</td><td align=center>'.$x8.'</td>';
            echo '</tr>';
            }
            echo '</table><br>';
            
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