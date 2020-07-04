<?php
	session_start();
	if(!isset($_SESSION["oturum"])){ 
	echo "<html><head><title>Uyarı: Yetkilendirme Hatası!</title></head><body bgcolor='#999999' style='font-family:Helvetica, Garamond, Tahoma'><div style='margin:0 auto; text-align:center; font-size:18px; color:fff; font-weight:bold'><p style='margin-top:50px;'><img src='icons/warning.png' style='margin-right:20px; vertical-align:middle'>Bu sayfayı görüntüleme yetkiniz yoktur.</p><span style='font-size:12px; color:yellow; font-weight:normal'>Hesabınız varsa lütfen <a href='giris.php' style='color:#fff; text-decoration:underline;'>giriş</a> yaparak tekrar deneyiniz...</span></div></body></html>"; 
        exit;
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
        <h2>Kullanıcı Profil Sayfası</h2>
      </div>
    </header>
    <nav>
      <?php include 'uye_menusu.php'; ?>
    </nav>
    <section class="content">   
        <div class="content-container">
          
            <?php echo "<h1>Hoşgeldiniz Sayın <strong>". $_SESSION['kullanici_ismi']." ". $_SESSION['kullanici_soyismi']."</h1>" ; ?>
            
            <p>Üye bilgilerinizi bu sayfadan güncelleyebilirsiniz:</p>

            <?php          
            include 'config.php' ;
            
            echo '
            <form action="profil_guncelle.php" name="profil_guncelle" method="post">
            <table>
                <tr><td>Üye Adı Soyadı</td><td>Üye TC Kimlik No</td><td>E-posta Adresi</td><td>Adres</td><td>İlgi Alanları</td></tr>
                <tr><tr><td>'.$_SESSION['kullanici_ismi']." ".$_SESSION['kullanici_soyismi'].'</td><td>'.$_SESSION['kullanici'].'</td><td>'.$_SESSION['eposta'].'</td><td>'.$_SESSION['adres'].'</td><td>'.$_SESSION['ilgi_alanlari'].'</td></tr>
                <tr><td colspan="2"></td><td><input type="text" placeholder="E-postanızı güncelleyin..." name="eposta"></td><td><input type="text" placeholder="Adresinizi güncelleyin..." name="adres"></td><td><input type="text" placeholder="İlgi alanlarınızı güncelleyin..." name="ilgi_alanlari"></td></tr>
                <tr><td colspan="5" align="right"><input type="submit" value=" Güncelle " name="guncelle"></td></tr>
            </table>
            </form>
            ';
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