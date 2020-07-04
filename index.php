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
<script>
    $(document).ready(function(){
    $('input.tara').typeahead({
        name: 'typeahead',
        remote:'katalog_tara.php?key=%QUERY',
        limit : 10
    });
    });
</script>
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
        <li><a href="giris.php">Oturum Aç</a></li>
      </ul>
    </nav>
    <section class="content">
      <div class="content-container">
        <form id="katalog_tara" name="katalog_tara" method="get" action="arama_sonuclari.php" class="uk-form">
            <div class="typeahead-container">
                <div class="typeahead-field">
                    <span class="typeahead-query">
                        <input type="text" name="typeahead" class="tara" placeholder="Kataloğu tara..." autocomplete="off">
                    </span>
                    <span class="typeahead-button">
                        <button type="submit" value="Tara">
                            <i class="typeahead-search-icon"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>
      </div>
    </section>
    <footer> KYS Kütüphane Yönetim Sistemi v1.0 | (C) 2015 Bütün hakları saklıdır. </footer>
    </div>
  </div>
</div>
    
</body>
</html>