<?php
    session_start();
    ob_start();
    session_destroy();
    echo "<html><head><title>Uyarı: Çıkış Yapıldı...</title></head><body bgcolor='#999999' style='font-family:Helvetica, Garamond, Tahoma'><div style='margin:0 auto; text-align:center; font-size:18px; color:fff; font-weight:bold'><p style='margin-top:50px;'><img src='icons/warning.png' style='margin-right:20px; vertical-align:middle'>Çıkış yaptınız...</p><span style='font-size:12px; color:yellow; font-weight:normal'>Ana sayfaya yönlendiriliyorsunuz...</span></div></body></html>";
    header("Refresh: 2; url=index.php");
?>