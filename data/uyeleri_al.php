<?php
	require("../codebase/connector/grid_connector.php");
	$res=mysql_connect("localhost","root","idea18");
		mysql_select_db("kys");
	
	$conn = new GridConnector($res,"MySQL");
	$conn->render_table("kullanicilar","tc_kimlik_no","tc_kimlik_no,isim,soyisim,eposta,ilgi_alanlari,puan,adres,alinan_materyal_sayisi,rezerve_materyal_sayisi,odunc_limiti,rezerve_limiti,parola,hesap_acilis_tarihi,aktiflik_durumu");
?>