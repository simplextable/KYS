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
        var layout,menu,toolbar,materyalGrid,detayForm;
        dhtmlx.image_path = "codebase/imgs/";
        dhtmlxEvent(window,"load",function(){                                          
            layout = new dhtmlXLayoutObject(document.body,"2U");
            layout.setSkin();
            layout.cells("a").setText("Kullanıcılar");
            layout.cells("b").setText("Kullanıcı Detayları");
            layout.cells("b").setWidth(360);

            menu = layout.attachMenu();
            menu.setIconsPath("icons/");
            menu.loadXML("data/menu_materyal.xml");

            toolbar = layout.attachToolbar();
            toolbar.setIconsPath("icons/");
            toolbar.loadXML("data/materyal_toolbar.xml");
            
            materyalGrid = layout.cells("a").attachGrid();
            materyalGrid.setHeader("Materyal No,Materyal Türü,İsim,Yayıncı,Sayfa Sayısı,Yazar,Dili,İçerik Türü,Yönetmen,Yayın Sayısı,Anahtar Kelimeler,Yayın Yılı,Durum");
            materyalGrid.setColumnIds("materyal_id,materyal_tur_id,isim,yayinci,sayfa_sayisi,yazar,dili,icerik_turu,yonetmen,yayin_sayisi,anahtar_kelimeler,yayin_yili,durum");
            materyalGrid.setInitWidths("100,100,100,100,*,*,*,*,*,*,*,*,*,*,*");
            materyalGrid.setColAlign("left,left,left,left,left,center,left,center,center,center,center,left,left,center,center");
            materyalGrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
            materyalGrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str,str,str,str,str");
            materyalGrid.attachHeader("#text_filter,#text_filter,#text_filter,#text_filter,,,,,,,,,,,,");
            materyalGrid.init();
            materyalGrid.load("data/materyalleri_al.php");
            materyalGrid.enableSmartRendering(true);
            
            detayForm = layout.cells("b").attachForm();
            detayForm.loadStruct("data/materyal_form.xml");
            detayForm.bind(materyalGrid);

            var materyalDP = new dataProcessor("data/materyalleri_al.php");
            materyalDP.init(materyalGrid);
            
            var durum_satiri = layout.attachStatusBar();
            durum_satiri.setText('KYS Kütüphane Yönetim Sistemi v0.1a | ODTÜ IDEA18 Web Projesi');

            materyalDP.attachEvent("onAfterUpdate", function(sid, action, tid, tag){
                if (action == "inserted"){
                    materyalGrid.selectRowById(tid);
                    detayForm.setFocusOnFirstActive();
                }
            })

            detayForm.attachEvent("onButtonClick", function(id){
                detayForm.save();
            });

            toolbar.attachEvent("onclick",function(id){
                if(id=="materyalEkle"){
                    var rowId=materyalGrid.uid();
                    var pos = materyalGrid.getRowsNum();
                    materyalGrid.addRow(rowId,["Yeni Materyal","",""],pos);
                };
                if(id=="materyalSil"){
                    var rowId = materyalGrid.getSelectedRowId();
                    var rowIndex = materyalGrid.getRowIndex(rowId);

                    if(rowId!=null){
                        materyalGrid.deleteRow(rowId);
                        if(rowIndex!=(materyalGrid.getRowsNum()-1)){
                            materyalGrid.selectRow(rowIndex+1,true);
                        } else{
                            materyalGrid.selectRow(rowIndex-1,true)
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