<?php
	require("../codebase/connector/grid_connector.php");
	$res=mysql_connect("localhost","root","idea18");
		mysql_select_db("kys");
	
	$conn = new GridConnector($res,"MySQL");
	$conn->render_table("materyal","materyal_id","materyal_id,materyal_tur_id,isim,yayinci,sayfa_sayisi,yazar,dili,icerik_turu,yonetmen,yayin_sayisi,anahtar_kelimeler,yayin_yili,durum");
?>