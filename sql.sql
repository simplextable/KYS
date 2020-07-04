-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kys
-- ------------------------------------------------------
-- Server version	5.6.25-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dolasim`
--

DROP TABLE IF EXISTS `dolasim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dolasim` (
  `islem_id` int(11) NOT NULL AUTO_INCREMENT,
  `materyal_id` int(11) DEFAULT NULL,
  `odunc_tc_no` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `alis_tarihi` datetime DEFAULT NULL,
  `teslim_tarihi` datetime DEFAULT NULL,
  `rezerve_edis_tarihi` date DEFAULT NULL,
  `rezerve_bitis_tarihi` date DEFAULT NULL,
  `islem_turu` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `islem_sonucu` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`islem_id`),
  UNIQUE KEY `islem_id_UNIQUE` (`islem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dolasim`
--

LOCK TABLES `dolasim` WRITE;
/*!40000 ALTER TABLE `dolasim` DISABLE KEYS */;
INSERT INTO `dolasim` VALUES (1,1000,'123',NULL,NULL,'2015-08-10','2015-08-11','Rezerve',NULL),(2,1002,'123','2015-08-13 15:00:00','2015-08-23 15:00:00',NULL,NULL,'Ödünç','Geldi'),(3,1003,'123','2015-08-16 15:00:00','2015-08-26 15:00:00',NULL,NULL,'Ödünç',NULL),(4,1004,'123','2015-08-20 15:00:00','2015-08-30 15:00:00',NULL,NULL,'Ödünç','Geldi'),(5,1005,'123',NULL,NULL,'2015-08-22','2015-08-23','Rezerve',NULL),(6,1006,'123','2015-08-23 12:00:00',NULL,NULL,NULL,'Ödünç',NULL),(7,1000,'123',NULL,NULL,'2015-08-23','2015-09-05','Rezerve',NULL);
/*!40000 ALTER TABLE `dolasim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kullanici_dolasim_islem`
--

DROP TABLE IF EXISTS `kullanici_dolasim_islem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kullanici_dolasim_islem` (
  `islem_sira_id` int(11) NOT NULL,
  `materyal_barkod_no` int(11) DEFAULT NULL,
  `odunc_alma_tarihi` date DEFAULT NULL,
  `iade_edilecek_tarih` date DEFAULT NULL,
  `tc_kimlik_no` int(11) DEFAULT NULL,
  `gunun_tarihi` date DEFAULT NULL,
  `puan_degisimi` int(11) DEFAULT NULL,
  `puan_katsayisi` int(11) DEFAULT NULL,
  `Materyal_Ogesi_materyal_barkod_no` int(11) NOT NULL,
  `Materyal_Ogesi_Materyal_materyal_id` int(11) NOT NULL,
  `Kullanici_tc_kimlik_no` int(11) NOT NULL,
  PRIMARY KEY (`islem_sira_id`,`Materyal_Ogesi_materyal_barkod_no`,`Materyal_Ogesi_Materyal_materyal_id`,`Kullanici_tc_kimlik_no`),
  KEY `fk_Kullanici_Dolasim_Islem_Materyal_Ogesi1_idx` (`Materyal_Ogesi_materyal_barkod_no`,`Materyal_Ogesi_Materyal_materyal_id`),
  KEY `fk_Kullanici_Dolasim_Islem_Kullanici1_idx` (`Kullanici_tc_kimlik_no`),
  CONSTRAINT `fk_Kullanici_Dolasim_Islem_Kullanici1` FOREIGN KEY (`Kullanici_tc_kimlik_no`) REFERENCES `kullanici` (`tc_kimlik_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kullanici_Dolasim_Islem_Materyal_Ogesi1` FOREIGN KEY (`Materyal_Ogesi_materyal_barkod_no`, `Materyal_Ogesi_Materyal_materyal_id`) REFERENCES `materyal_ogesi` (`materyal_barkod_no`, `Materyal_materyal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kullanici_dolasim_islem`
--

LOCK TABLES `kullanici_dolasim_islem` WRITE;
/*!40000 ALTER TABLE `kullanici_dolasim_islem` DISABLE KEYS */;
/*!40000 ALTER TABLE `kullanici_dolasim_islem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kullanicilar` (
  `tc_kimlik_no` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `soyisim` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `eposta` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `puan` int(4) DEFAULT NULL,
  `ilgi_alanlari` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `alinan_materyal_sayisi` int(1) DEFAULT NULL,
  `rezerve_materyal_sayisi` int(1) DEFAULT NULL,
  `odunc_limiti` int(1) DEFAULT NULL,
  `rezerve_limiti` int(1) DEFAULT NULL,
  `parola` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `hesap_acilis_tarihi` date DEFAULT NULL,
  `aktiflik_durumu` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`tc_kimlik_no`),
  UNIQUE KEY `tc_kimlik_no_UNIQUE` (`tc_kimlik_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kullanicilar`
--

LOCK TABLES `kullanicilar` WRITE;
/*!40000 ALTER TABLE `kullanicilar` DISABLE KEYS */;
INSERT INTO `kullanicilar` VALUES ('1','Admin','Admin',' ','admin@kys.net',NULL,NULL,NULL,NULL,NULL,NULL,'c4ca4238a0b923820dcc509a6f75849b',NULL,NULL),('123','Mert','Sert','Ardahan','mert@sert.com',0,'Avcılık, Silahlar',0,0,1,1,'202cb962ac59075b964b07152d234b70','2015-10-10',0),('34908070601','Mehmet','Aslan','İzmir','mehmet@aslan.com',0,NULL,0,0,1,1,'1122','2015-05-05',1),('34908076543','Ali','Veli','Çorum','ali@veli.com',0,NULL,0,0,1,1,'123','2015-04-04',1),('34908756431','Aslıhan','Çarık','Ankra','aslihan@carik.com',0,'Evcil hayvanlar, Dünya mutfakları',0,0,1,1,'221133','2015-07-07',1),('34908757641','Murat','Çevik','Konya','murat@cevik.com',0,'Elektronik, Bilgisayar, Ekonomi',0,0,1,1,'113322','2015-08-08',1),('456','Mustafa','Türkcan','İstanbul','mustafa@turkcan.com',50,'Sinema, Gezi, Dalış, Yamaç paraşütü, Okçuluk',2,0,2,2,'250cf8b51c773f3f8dc8b4be867a9a02','2015-09-09',1),('688','Alp','Mesri','Ankara','alp@mesri.net',50,'Teknoloji',0,0,2,2,'f79921bbae40a577928b76d2fc3edc2a','2015-10-02',1),('9911589020','Derya','Moldibi',NULL,'derya.moldibi@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kullanicilar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materyal`
--

DROP TABLE IF EXISTS `materyal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materyal` (
  `materyal_id` int(11) NOT NULL AUTO_INCREMENT,
  `materyal_tur_id` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `yayinci` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sayfa_sayisi` int(11) DEFAULT NULL,
  `yazar` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dili` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `icerik_turu` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yonetmen` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yayin_sayisi` int(11) DEFAULT NULL,
  `anahtar_kelimeler` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yayin_yili` year(4) DEFAULT NULL,
  `durum` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`materyal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materyal`
--

LOCK TABLES `materyal` WRITE;
/*!40000 ALTER TABLE `materyal` DISABLE KEYS */;
INSERT INTO `materyal` VALUES (1000,'Kitap','Robinson Crusoe','Alfa Yayınları',178,'Ahmet Hakan','Türkçe','Roman',NULL,NULL,'Fantastik, Roman, Klasik',1978,'Rezerve'),(1001,'Kitap','Denizler Altında Yirmibin Fersah','Sefa Yayınları',175,'Jules Verne','Türkçe','Roman',NULL,NULL,'Fantastik, Roman, Klasik',1980,'Mevcut'),(1002,'Film','Lord of the Rings','Yılmaz Filmcilik',NULL,NULL,'Türkçe','Sinema Filmi','Peter Jackson',NULL,'Fantastik, Sinema, Roman',2003,'Mevcut'),(1003,'Süreli Yayın','Bilim Teknik Dergisi','Tübitak',120,NULL,'Türkçe','Süreli yayın',NULL,100,'Bilim, Teknoloji, Eğitim',2015,'Ödünç'),(1004,'Kitap','Haçlılar','Mesri Yayınları',150,'Halil İnalcık','Türkçe','Tarih',NULL,NULL,'Tarih, Haçlılar, Ortaçağ',2014,'Mevcut'),(1005,'Kitap','Java ve Java Teknolojileri','Alfa Yayınları',250,NULL,'Türkçe','Bilgi Teknojileri',NULL,NULL,'Java, Teknoloji, Yazılım',2013,'Ödünç'),(1006,'Süreli Yayın','Gezi Rehberi','Gezici Yayıncılık',90,NULL,'Türkçe','Seyahat',NULL,14,'Gezi, Seyahat, Tatil, Keşif',2015,'Ödünç'),(1007,'Kitap','Robinson\'ın Izdırabı','Alfa Yayınları',50,'Ahmet Hakan','Türkçe','Roman',NULL,NULL,'Fantastik, Roman, Klasik',1988,'Mevcut'),(1008,'Kitap','Robinson\'un Dönüşü','Alfa Yayınları',70,'Ahmet Hakan','Türkçe','Roman',NULL,NULL,'Fantastik, Roman, Kurgu',1993,'Ödünç');
/*!40000 ALTER TABLE `materyal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materyal_ogesi`
--

DROP TABLE IF EXISTS `materyal_ogesi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materyal_ogesi` (
  `materyal_barkod_no` int(11) NOT NULL,
  `materyal_id` int(11) DEFAULT NULL,
  `durum` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `odunc_tc_no` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rezerve_tc_no` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Materyal_materyal_id` int(11) NOT NULL,
  PRIMARY KEY (`materyal_barkod_no`,`Materyal_materyal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materyal_ogesi`
--

LOCK TABLES `materyal_ogesi` WRITE;
/*!40000 ALTER TABLE `materyal_ogesi` DISABLE KEYS */;
/*!40000 ALTER TABLE `materyal_ogesi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materyal_turu`
--

DROP TABLE IF EXISTS `materyal_turu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materyal_turu` (
  `materyal_tur_id` int(11) NOT NULL,
  `materyal_turu` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Materyal_materyal_id` int(11) NOT NULL,
  PRIMARY KEY (`materyal_tur_id`,`Materyal_materyal_id`),
  KEY `fk_Materyal_Turu_Materyal1_idx` (`Materyal_materyal_id`),
  CONSTRAINT `fk_Materyal_Turu_Materyal1` FOREIGN KEY (`Materyal_materyal_id`) REFERENCES `materyal` (`materyal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materyal_turu`
--

LOCK TABLES `materyal_turu` WRITE;
/*!40000 ALTER TABLE `materyal_turu` DISABLE KEYS */;
/*!40000 ALTER TABLE `materyal_turu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yonetici`
--

DROP TABLE IF EXISTS `yonetici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yonetici` (
  `admin_id` int(11) NOT NULL,
  `admin_parola` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yonetici`
--

LOCK TABLES `yonetici` WRITE;
/*!40000 ALTER TABLE `yonetici` DISABLE KEYS */;
/*!40000 ALTER TABLE `yonetici` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-29 13:55:33
