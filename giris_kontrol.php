<?php
  $kullanici  = $_POST["kullanici"];
  $parola = $_POST["parola"];
 
include 'config.php'; 

$sorgu = mysql_query("SELECT parola FROM kullanicilar WHERE tc_kimlik_no = '".$kullanici."'");
  if( mysql_num_rows($sorgu) != 1 ){
    print "<html><head><title>Uyarı: Yetkilendirme Hatası!</title></head><body bgcolor='#999999' style='font-family:Helvetica, Garamond, Tahoma'><div style='margin:0 auto; text-align:center; font-size:18px; color:fff; font-weight:bold'><p style='margin-top:50px;'><img src='icons/warning.png' style='margin-right:20px; vertical-align:middle'>Bu sayfayı görüntüleme yetkiniz yoktur.</p><span style='font-size:12px; color:yellow; font-weight:normal'>Hesabınız varsa lütfen <a href='giris.php' style='color:#fff; text-decoration:underline;'>giriş</a> yaparak tekrar deneyiniz...</span></div></body></html>";

    exit;
  
  }else{ 
      $bilgi = mysql_fetch_assoc($sorgu);
  }

  if( md5( trim($parola) ) != $bilgi["parola"] ){
    print '<script>alert("Yanlış parola girdiniz!");history.back(-1);</script>';
    exit;
  }
 
if($kullanici=='112233'){
echo 'Başarıyla giriş yaptınız, yönetici sayfasına yönlendiriliyorsunuz...';
header('Refresh: 0; url=yonetici_paneli.php');
}else{
echo 'Başarıyla giriş yaptınız. Kullanıcı ana sayfasına yönlendiriliyorsunuz...';
header('Refresh: 0; url=uye_paneli.php');    
}

session_start();
$_SESSION["oturum"] = md5( "uye_oturumu" . md5( $bilgi["parola"] ) . "6f3f76a43807984b3ed20f2fdeb325e2" );

$sorgu_kimlik=mysql_query("SELECT * FROM kullanicilar WHERE tc_kimlik_no = '".$kullanici."'");
$kimlik = mysql_fetch_assoc($sorgu_kimlik);

$_SESSION["kullanici_ismi"] = $kimlik['isim'];
$_SESSION["kullanici_soyismi"] = $kimlik['soyisim'];
$_SESSION["kullanici"] = $kullanici;
$_SESSION["eposta"] = $kimlik['eposta'];
$_SESSION["adres"] = $kimlik['adres'];
$_SESSION["ilgi_alanlari"] = $kimlik['ilgi_alanlari'];

?>
