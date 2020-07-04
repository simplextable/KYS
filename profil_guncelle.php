<?php
    session_start();
	if(!isset($_SESSION["oturum"])){ 
	echo "<html><head><title>Uyarı: Yetkilendirme Hatası!</title></head><body bgcolor='#999999' style='font-family:Helvetica, Garamond, Tahoma'><div style='margin:0 auto; text-align:center; font-size:18px; color:fff; font-weight:bold'><p style='margin-top:50px;'><img src='icons/warning.png' style='margin-right:20px; vertical-align:middle'>Bu sayfayı görüntüleme yetkiniz yoktur.</p><span style='font-size:12px; color:yellow; font-weight:normal'>Hesabınız varsa lütfen <a href='giris.php' style='color:#fff; text-decoration:underline;'>giriş</a> yaparak tekrar deneyiniz...</span></div></body></html>"; 
	}else{
	echo ""; 
	}
$eposta = $_POST["eposta"];
$adres = $_POST["adres"];
$ilgi_alanlari = $_POST["ilgi_alanlari"];

include 'config.php';

$guncelle = mysql_query("UPDATE kullanicilar SET eposta = '".$eposta."', adres = '".$adres."', ilgi_alanlari = '".$ilgi_alanlari."' where tc_kimlik_no = '".$_SESSION['kullanici']."'");

if ($guncelle) { echo 'Güncellendi';
header("Refresh: 1; url=profil.php");
               } else { echo 'Güncelleme yapılamadı';
                      }
?>