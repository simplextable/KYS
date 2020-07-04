<?php
	session_start();
	if(!isset($_SESSION["oturum"])){ 
	echo "<html><head><title>Uyarı: Yetkilendirme Hatası!</title></head><body bgcolor='#999999' style='font-family:Helvetica, Garamond, Tahoma'><div style='margin:0 auto; text-align:center; font-size:18px; color:fff; font-weight:bold'><p style='margin-top:50px;'><img src='icons/warning.png' style='margin-right:20px; vertical-align:middle'>Bu sayfayı görüntüleme yetkiniz yoktur.</p><span style='font-size:12px; color:yellow; font-weight:normal'>Hesabınız varsa lütfen <a href='giris.php' style='color:#fff; text-decoration:underline;'>giriş</a> yaparak tekrar deneyiniz...</span></div></body></html>"; 
	}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>KYS | Kütüphane Yönetim Sistemi</title>
    
    <script src="codebase/dhtmlx.js" type="text/javascript"></script>
    <script src="codebase/connector/connector.js" type="text/javascript"></script>
    
    <link rel="stylesheet" type="text/css" href="codebase/dhtmlx.css">
    
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <style>
    html, body {
        height: 100%;
        width: 100%;
        margin: 0px;
        overflow: hidden;
        background-color:white;
        }
    </style>
   
    <script type="text/javascript">
        var layout,menu,toolbar,uyelerGrid,detayForm;
        dhtmlx.image_path = "codebase/imgs/";
        dhtmlxEvent(window,"load",function(){                                          
            layout = new dhtmlXLayoutObject(document.body,"2U");
            layout.setSkin();
            layout.cells("a").setText("Kullanıcılar");
            layout.cells("b").setText("Kullanıcı Detayları");
            layout.cells("b").setWidth(360);

            menu = layout.attachMenu();
            menu.setIconsPath("icons/");
            menu.loadXML("data/menu_kullanici.xml");

            toolbar = layout.attachToolbar();
            toolbar.setIconsPath("icons/");
            toolbar.loadXML("data/uye_toolbar.xml");
            
            uyelerGrid = layout.cells("a").attachGrid();
            uyelerGrid.setHeader("TC Kimlik No,İsim,Soyisim,Eposta,İlgi Alanları,Puan,Adres,Alınan Materyal,Rezerve Materyal,Ödünç Limiti,Rezerve Limiti,Parola,Hesap Açılış Tarihi,Aktiflik Durumu");
            uyelerGrid.setColumnIds("tc_kimlik_no,isim,soyisim,eposta,ilgi_alanlari,puan,adres,alinan_materyal_sayisi,rezerve_materyal_sayisi,odunc_limiti,rezerve_limiti,parola,hesap_acilis_tarihi,aktiflik_durumu");
            uyelerGrid.setInitWidths("100,100,100,100,*,*,*,*,*,*,*,*,*,*");
            uyelerGrid.setColAlign("left,left,left,left,left,center,left,center,center,center,center,left,left,center");
            uyelerGrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
            uyelerGrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str,str,str,str");
            uyelerGrid.attachHeader("#text_filter,#text_filter,#text_filter,#text_filter,,,,,,,,,,,");
            uyelerGrid.init();
            uyelerGrid.load("data/uyeleri_al.php");
            
            detayForm = layout.cells("b").attachForm();
            detayForm.loadStruct("data/uye_form.xml");
            detayForm.bind(uyelerGrid);

            var uyeDP = new dataProcessor("data/uyeleri_al.php");
            uyeDP.init(uyelerGrid);
            
            var durum_satiri = layout.attachStatusBar();
            durum_satiri.setText('KYS Kütüphane Yönetim Sistemi v0.1a | ODTÜ IDEA18 Web Projesi');

            uyeDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                if (action == "inserted"){
                    uyelerGrid.selectRowById(tid);
                    detayForm.setFocusOnFirstActive();
                }
            });

            detayForm.attachEvent("onButtonClick", function(id){
                detayForm.save();
            });

            toolbar.attachEvent("onclick",function(id){
                if(id=="kullaniciEkle"){
                    var rowId=uyelerGrid.uid();
                    var pos = uyelerGrid.getRowsNum();
                    uyelerGrid.addRow(rowId,["Yeni Kullanıcı","",""],pos);
                };
                if(id=="kullaniciSil"){
                    var rowId = uyelerGrid.getSelectedRowId();
                    var rowIndex = uyelerGrid.getRowIndex(rowId);

                    if(rowId!=null){
                        uyelerGrid.deleteRow(rowId);
                        if(rowIndex!=(uyelerGrid.getRowsNum()-1)){
                            uyelerGrid.selectRow(rowIndex+1,true);
                        } else {
                            uyelerGrid.selectRow(rowIndex-1,true);
                        }
                    }
                }
            });

        })
    </script>
</head>

<body>

</body>
</html>

<?php
    }
?>