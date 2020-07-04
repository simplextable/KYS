    <ul>
    <li><a href="index.php">KYS Ana Sayfa</a></li>
    <li><a href="kullanici_rehberi.php">KYS Kullanıcı Rehberi</a></li>
    <li><a href="uye_paneli.php">Materyallerim</a></li>
    <li><a href="profil.php">Üye Profili</a></li>
    <?php
    if(isset($_SESSION["oturum"])){ 
    echo '<li><a href="cikis.php">Çıkış</a></li>';
    }else{
    }
    ?>
    </ul>