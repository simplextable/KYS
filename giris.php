<?php
	session_start();
	if(!isset($_SESSION["oturum"])){ 
	echo '
    
    <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>KYM Kütüphane Yönetim Sistemi</title>
<link rel="stylesheet" type="text/css" href="css/stil.css" />
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
      <ul>
        <li><a href="index.php">Ana Sayfa</a></li>
        <li><a href="kullanici_rehberi.php">KYS Kullanıcı Rehberi</a></li>
        <li><a href="giris.html" class="active">Oturum Aç</a></li>
      </ul>
    </nav>
    <section class="content">
      <div class="content-container">
        <form id="login" name="login" action="giris_kontrol.php" method="post" class="uk-form">
          <label for="kullanici">Kullanıcı Adı:</label>
          <input type="text" name="kullanici" id="kullanici"/>
          <br/>
          <br/>
          <label for="parola">Parola:</label>
          <input type="password" name="parola" id="parola"/><br/><br/>
            <input type="submit" name="giris" id="giris" value=" Giriş "/>
        </form>
      </div>
    </section>
    <footer> KYS Kütüphane Yönetim Sistemi v1.0 | (C) 2015 Bütün hakları saklıdır. </footer>
    </div>
  </div>
</div>
</body>
</html>
    
    ';
	}else{
        header("Refresh: 0; url=profil.php");
    }
?>