-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: db_helpdesk
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('140bde6ff4290254ed46921d7a5f5fa9583e7840','127.0.0.1',1532581018,_binary '__ci_last_regenerate|i:1532581018;'),('b500439a0ec8235c69bab1c3650783d5979f20f2','127.0.0.1',1532581538,_binary '__ci_last_regenerate|i:1532581538;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('fd78361b55358cb642fc70498443c0aca0bf5d82','127.0.0.1',1532581580,_binary '__ci_last_regenerate|i:1532581538;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('31n90bhek95tio9qvarhnrgfe2g2q8cc','::1',1536274504,_binary '__ci_last_regenerate|i:1536274504;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('2ecj1v8moblmmgn6nrne66a2a4calgqd','127.0.0.1',1536275100,_binary '__ci_last_regenerate|i:1536275100;IS_LOGIN_MAHASISWA|b:1;name|N;email|N;password|N;user_id|N;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('or0ne7cofcrpfjl6r572a2gbebpispka','127.0.0.1',1536275960,_binary '__ci_last_regenerate|i:1536275960;IS_LOGIN_MAHASISWA|b:1;name|N;email|N;password|N;user_id|N;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('iogpiqv0k2gsgcmvqsoeb58mt9j3it6f','127.0.0.1',1536276278,_binary '__ci_last_regenerate|i:1536276278;IS_LOGIN_MAHASISWA|b:1;name|N;email|N;password|N;user_id|N;'),('qhf1hk6tnjbhisus3nol4nds6ktndsuf','127.0.0.1',1536276608,_binary '__ci_last_regenerate|i:1536276608;IS_LOGIN_MAHASISWA|b:1;name|N;email|N;password|N;user_id|N;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('qhaqm9nf1gbguvtnc6gtkmcgaij3815u','127.0.0.1',1536276910,_binary '__ci_last_regenerate|i:1536276910;IS_LOGIN_MAHASISWA|b:1;name|N;email|N;password|N;user_id|N;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('m58tivilqm5in5ieu626grmh9b6bv19m','127.0.0.1',1536277238,_binary '__ci_last_regenerate|i:1536277238;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}IS_LOGIN_ADMIN|b:1;'),('td8dvic5qoee6ajd5e5flsgvaif94k6g','127.0.0.1',1536277591,_binary '__ci_last_regenerate|i:1536277591;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;'),('he27ehgbohnubfspdgvtfn4c4hab26iu','127.0.0.1',1536277892,_binary '__ci_last_regenerate|i:1536277892;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('v6hcv6gn41tum7k6a2lca82vf65ldu1a','127.0.0.1',1536278203,_binary '__ci_last_regenerate|i:1536278203;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('j517c1875sn8f71upqopchudl07lqt43','127.0.0.1',1536278546,_binary '__ci_last_regenerate|i:1536278546;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('oq5h4qg2kcr55neacsmg755opnovcdts','127.0.0.1',1536279340,_binary '__ci_last_regenerate|i:1536279340;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('emtbcuebokf8j26t73fsma8uroqv7lij','127.0.0.1',1536279646,_binary '__ci_last_regenerate|i:1536279646;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('ls9lln3gt8nk15jsv6k2m6gn223p15c5','127.0.0.1',1536279976,_binary '__ci_last_regenerate|i:1536279976;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('tm5m6ttjf8bslqh8at4ruqd0s02gmdti','127.0.0.1',1536280147,_binary '__ci_last_regenerate|i:1536279976;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('376t1q8ll4i1c4ct766nsvt5dh35tdn8','127.0.0.1',1536287978,_binary '__ci_last_regenerate|i:1536287978;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('2ncg5jko114svdv3tkqepsc0iks963eo','127.0.0.1',1536288093,_binary '__ci_last_regenerate|i:1536287978;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('hb9c6h6hijal4epc5qt1u5uhdrp0ur9r','::1',1536312173,_binary '__ci_last_regenerate|i:1536312173;'),('3s2otmpccunbl9i5oqsbmobp5pi1p21l','127.0.0.1',1536316059,_binary '__ci_last_regenerate|i:1536316059;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('0hlr7naf9o5cv4f46fkm8dfs6s8i9h2u','127.0.0.1',1536316237,_binary '__ci_last_regenerate|i:1536316059;'),('p1nt5v1okpn01ks4l7qtccen0qd47erg','::1',1536570884,_binary '__ci_last_regenerate|i:1536570884;'),('io1914jgn8bep5ru9qu8erej6suu900n','127.0.0.1',1536571308,_binary '__ci_last_regenerate|i:1536571308;'),('3lvl1t4tfiqkv3n8nj220lcrtq77k479','127.0.0.1',1536571687,_binary '__ci_last_regenerate|i:1536571687;'),('h08tp66r07sjtsonaltspctnteh5qs4h','127.0.0.1',1536572152,_binary '__ci_last_regenerate|i:1536572152;'),('ucpt8jjpfn2kjid5dnp1d3gui7q2qpv2','127.0.0.1',1536572160,_binary '__ci_last_regenerate|i:1536572152;'),('21oaaovkas8u8qrgbbdjvlm7afmoq6n6','::1',1536751462,_binary '__ci_last_regenerate|i:1536751462;'),('sa1pfrq0a72kikf3b43q7oi705qcu8eq','127.0.0.1',1536751462,_binary '__ci_last_regenerate|i:1536751462;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('ncfb2bgffrhjghgmje7c7c40gspqoq0i','::1',1536852445,_binary '__ci_last_regenerate|i:1536852445;'),('2pgsjo6nhb51glp1k037juqhr95de6tb','127.0.0.1',1536852915,_binary '__ci_last_regenerate|i:1536852915;'),('vqoivsl0f0phiqf4cjtoqrik9rh11o32','127.0.0.1',1536853228,_binary '__ci_last_regenerate|i:1536853228;'),('2taj1cn38j9o5oldv0io20njn0prgbbu','127.0.0.1',1536853546,_binary '__ci_last_regenerate|i:1536853546;'),('lk6fv4nthjii9f1ffv7k81hpoorpggvf','127.0.0.1',1536853851,_binary '__ci_last_regenerate|i:1536853851;'),('2fvvqgl21rfbafagk88d734i919qh2sl','127.0.0.1',1536854219,_binary '__ci_last_regenerate|i:1536854219;'),('fd4pbcdrld3g5642feaq9tvlf7dh3brj','127.0.0.1',1536854576,_binary '__ci_last_regenerate|i:1536854576;'),('3v81m9rvr163000ip25ogaj57cp2cnoo','127.0.0.1',1536854977,_binary '__ci_last_regenerate|i:1536854977;'),('6o7q1bn7or6k6hnuts3vrfi6hu8gjhvd','127.0.0.1',1536855340,_binary '__ci_last_regenerate|i:1536855340;IS_LOGIN_MAHASISWA|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";nim|s:4:\"2015\";'),('fdp63vrapaql26n6rbri4g5p5per3l46','127.0.0.1',1536855677,_binary '__ci_last_regenerate|i:1536855677;IS_LOGIN_MAHASISWA|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";nim|s:4:\"2015\";'),('pfc695u7g1hpictfcd9m64vgg5a4ep0f','127.0.0.1',1536855983,_binary '__ci_last_regenerate|i:1536855683;IS_LOGIN_MAHASISWA|b:1;name|s:8:\"test aja\";email|s:24:\"diditriawan13s@gmail.com\";nim|s:6:\"123456\";'),('h78ka54seohmq284ihifeo5ofgqhlm40','::1',1537036354,_binary '__ci_last_regenerate|i:1537036354;'),('9sn3ovh05libukhs9jdio85ebinpomkd','127.0.0.1',1537036430,_binary '__ci_last_regenerate|i:1537036354;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('6g76eot1vpsfv1oq7ssaocoj9r545uk7','::1',1537082302,_binary '__ci_last_regenerate|i:1537082302;'),('fnc2rme6q4a06s630rqq2g5m9qgngt16','127.0.0.1',1537082612,_binary '__ci_last_regenerate|i:1537082612;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('cla55qjve8f7hdp679137rsmpbr51554','127.0.0.1',1537082988,_binary '__ci_last_regenerate|i:1537082988;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('42p4fuqduu652l8o6v04icopfkm2rkph','127.0.0.1',1537083331,_binary '__ci_last_regenerate|i:1537083331;name|s:8:\"test aja\";email|s:24:\"diditriawan13s@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_MAHASISWA|b:1;nim|s:6:\"123456\";'),('uechthjnjumkkd6ksfv5tjoq7od1r87l','127.0.0.1',1537083332,_binary '__ci_last_regenerate|i:1537083331;name|s:8:\"test aja\";email|s:24:\"diditriawan13s@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_MAHASISWA|b:1;nim|s:6:\"123456\";'),('6hdl31vn2u4f7qnefm5cg1v83168ctmt','127.0.0.1',1537092175,_binary '__ci_last_regenerate|i:1537092175;IS_LOGIN_MAHASISWA|b:1;name|s:8:\"test aja\";email|s:24:\"diditriawan13s@gmail.com\";nim|s:6:\"123456\";'),('ionjbakj50bkjkj782bgccd2nssnhgbs','127.0.0.1',1537093407,_binary '__ci_last_regenerate|i:1537093407;IS_LOGIN_MAHASISWA|b:1;name|s:8:\"test aja\";email|s:24:\"diditriawan13s@gmail.com\";nim|s:6:\"123456\";id|s:1:\"2\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";'),('hjhajtlugb39eaosa92a33vs0vc39mlr','127.0.0.1',1537093741,_binary '__ci_last_regenerate|i:1537093741;IS_LOGIN_MAHASISWA|b:1;name|s:8:\"test aja\";email|s:24:\"diditriawan13s@gmail.com\";nim|s:6:\"123456\";id|s:1:\"2\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('04gu7led3mb1j5qbf921uasif1lj5bnd','127.0.0.1',1537094032,_binary '__ci_last_regenerate|i:1537093741;IS_LOGIN_MAHASISWA|b:1;name|s:14:\"Mahasiswa kupu\";email|s:24:\"diditriawan13s@gmail.com\";nim|s:6:\"123456\";id|s:1:\"2\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";'),('s7r0bubbtqonqou9fp4i98cspg8856vg','127.0.0.1',1537106374,_binary '__ci_last_regenerate|i:1537106374;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:50:\"$2y$08$.tKOEbfZvvnzLY04bTQ2luFhufWAXDxaVNjLZnX53tn\";user_id|s:1:\"1\";'),('6pogbfh03u2efa90of1e3ta9il7te147','127.0.0.1',1537106675,_binary '__ci_last_regenerate|i:1537106675;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;'),('2drbmndv8hm54lv6ql08dlubvc6csq47','127.0.0.1',1537106770,_binary '__ci_last_regenerate|i:1537106675;name|s:14:\"Mahasiswa kupu\";email|s:24:\"diditriawan13s@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_MAHASISWA|b:1;nim|s:6:\"123456\";id|s:1:\"2\";'),('2h5l0t6tr3q8okfn3ju7dplv0rb8dk8p','::1',1537152191,_binary '__ci_last_regenerate|i:1537152191;'),('pdvoedu3mbbl1lkaabdvvs1bpqd7877v','127.0.0.1',1537152316,_binary '__ci_last_regenerate|i:1537152316;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('gr4d0l2p10bc57nmihelkpnlrr9npe01','::1',1537173370,_binary '__ci_last_regenerate|i:1537173366;'),('v42rqdujihn90h5a0o461hr7b6gus6mf','127.0.0.1',1537173370,_binary '__ci_last_regenerate|i:1537173366;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('ua6ifcrt60r1ousv0qbm5uiccjrsbk15','127.0.0.1',1537194235,_binary '__ci_last_regenerate|i:1537194235;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('ivues13nphaejjodhoqllg7tg1h477m9','127.0.0.1',1537194235,_binary '__ci_last_regenerate|i:1537194235;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('poivropbmdgkbc51ge57t7rt418s841f','127.0.0.1',1537196942,_binary '__ci_last_regenerate|i:1537196942;'),('lg2fjo3sa4c32sgkk21o1d09757mh0i6','127.0.0.1',1537198813,_binary '__ci_last_regenerate|i:1537198813;'),('691iuasl06vriaceiecarecd4q5eh77d','127.0.0.1',1537199148,_binary '__ci_last_regenerate|i:1537199148;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('mul93r8qher5rlcpkm4fe7u749cgitf9','127.0.0.1',1537199517,_binary '__ci_last_regenerate|i:1537199517;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('r1jt4g8j60lgb5e3mffp9uooqfn63nhb','127.0.0.1',1537199946,_binary '__ci_last_regenerate|i:1537199946;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('kd61jeu3iv3l8m2l827tej9rk9abugvg','127.0.0.1',1537200269,_binary '__ci_last_regenerate|i:1537200269;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('2accpeo21kkrba6a2vs5nn94g0ec84tr','127.0.0.1',1537200583,_binary '__ci_last_regenerate|i:1537200583;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('uv4sa4bl0t5qpa1o5j5tr1f0r23eq5hl','127.0.0.1',1537202028,_binary '__ci_last_regenerate|i:1537202028;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('5lrsej8ek733elconm281n152pbgl5jt','127.0.0.1',1537202414,_binary '__ci_last_regenerate|i:1537202414;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('e7utm8t8l122hn4qqt96fr86ck8jnkuf','127.0.0.1',1537202414,_binary '__ci_last_regenerate|i:1537202414;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('dhf90dfca32ach7eurvftlf82te2ug6a','::1',1537282215,_binary '__ci_last_regenerate|i:1537282215;'),('6d3a1d3gfct7hscs39vg03l2b5itadep','127.0.0.1',1537282578,_binary '__ci_last_regenerate|i:1537282578;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('4js2uubr7kggn6g0suq8n5ikqv3bb1t4','127.0.0.1',1537282900,_binary '__ci_last_regenerate|i:1537282900;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('0ncvon1nvh6cpmln2v1aqkds8bvi6khs','127.0.0.1',1537283219,_binary '__ci_last_regenerate|i:1537283219;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('qrcsrclek434juk9vajftgmaju58mv1j','127.0.0.1',1537283219,_binary '__ci_last_regenerate|i:1537283219;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('jb5ubospdrgpdu3ggbenj4680hfdo1rm','::1',1537457672,_binary '__ci_last_regenerate|i:1537457672;'),('97rvbjjufit7qhljm01uh1vlsl7t3v8k','127.0.0.1',1537457975,_binary '__ci_last_regenerate|i:1537457975;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('p8s8jijuarep1o4ulg5dbschh4t8409c','127.0.0.1',1537459657,_binary '__ci_last_regenerate|i:1537459657;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('l5sp98ar5j0jfa2j0rvc4vj4i1bmjnd5','127.0.0.1',1537459970,_binary '__ci_last_regenerate|i:1537459970;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('2vflj2gjk9mh74b6bjq51gci1jmfcr4b','127.0.0.1',1537460741,_binary '__ci_last_regenerate|i:1537460741;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('cdak2l2ho5pknfk2qb7aa9sggueg28kf','127.0.0.1',1537461061,_binary '__ci_last_regenerate|i:1537461061;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('kh2c8ontseu4idh1toljuiggv3f43m1b','127.0.0.1',1537461369,_binary '__ci_last_regenerate|i:1537461369;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('6supr1gil1sbfpmp72t8hm8rm9d36fca','127.0.0.1',1537462059,_binary '__ci_last_regenerate|i:1537462059;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('ev6c7n9sugpbjcc73vql8msm74hb647c','127.0.0.1',1537462413,_binary '__ci_last_regenerate|i:1537462413;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('7r20kcupt302ldo1d2kto2s94ogrr8qe','127.0.0.1',1537462821,_binary '__ci_last_regenerate|i:1537462821;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('gmld4ucvijkdts4tvoih42qlab36md3a','127.0.0.1',1537463188,_binary '__ci_last_regenerate|i:1537463188;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('rrcvrvpqrhmptr88o71a4ilpegtkth6j','127.0.0.1',1537463513,_binary '__ci_last_regenerate|i:1537463513;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('bg0i4mui3mouda50eqoe29oofc6ht6gf','127.0.0.1',1537465302,_binary '__ci_last_regenerate|i:1537465302;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('9a982gcbvlt7a9q820j5bs9s4muav95v','127.0.0.1',1537465816,_binary '__ci_last_regenerate|i:1537465816;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('u3s2c9pbd2iolhvk76f1a0fhjgugna3p','127.0.0.1',1537466173,_binary '__ci_last_regenerate|i:1537466173;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('aufgc57erlv554mtffmspgm6i10kmhml','127.0.0.1',1537466306,_binary '__ci_last_regenerate|i:1537466173;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7110eda4d09e062aa5e4a390b0a572ac0d2c0220\";user_id|s:1:\"1\";'),('sdbvfinqfre5cmtpgg9slb37lr3gqjhb','::1',1537484317,_binary '__ci_last_regenerate|i:1537484317;'),('0kt7j6vjvd0s44lt5uilq6lq44hvpvi8','::1',1537484317,_binary '__ci_last_regenerate|i:1537484317;'),('a2bfdevk4bkkge17fl5e14cjbtr9frtt','127.0.0.1',1537484317,_binary '__ci_last_regenerate|i:1537484317;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('s5oqotsl6btns0pj3hq9r5v8e72956q4','127.0.0.1',1537484758,_binary '__ci_last_regenerate|i:1537484758;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";'),('3jasnrje9pqjvf2s9qllohdj4prqvm9u','127.0.0.1',1537485084,_binary '__ci_last_regenerate|i:1537485084;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('bdfihig9fqd6g556sshr8i4qrlgl3h9r','127.0.0.1',1537486019,_binary '__ci_last_regenerate|i:1537486019;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('e6o4jmpba2op2ad6pm3lhb52su9gn78s','127.0.0.1',1537486592,_binary '__ci_last_regenerate|i:1537486592;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('7ucu1re71pvnqe4naton5ass7sccofgq','127.0.0.1',1537486975,_binary '__ci_last_regenerate|i:1537486975;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('lrdovo82r7ajsff7qislv3pit97p6hpk','127.0.0.1',1537487455,_binary '__ci_last_regenerate|i:1537487455;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('7nltmu6albe1iargth6pproafucemipu','127.0.0.1',1537487758,_binary '__ci_last_regenerate|i:1537487758;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('iks8pqp5uqfvml7l19cl4fsd11majesc','127.0.0.1',1537488125,_binary '__ci_last_regenerate|i:1537488125;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('in1ie31tt9cuvogs0l9cm3sk2utll6fk','127.0.0.1',1537489449,_binary '__ci_last_regenerate|i:1537489449;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('avghtdo6lcn7esfm77d6ni01f2tf5aeq','127.0.0.1',1537489802,_binary '__ci_last_regenerate|i:1537489802;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";IS_LOGIN_ADMIN|b:1;level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('n8t7nik18hgq7u9rfrd5987rlflmp4e6','127.0.0.1',1537490103,_binary '__ci_last_regenerate|i:1537490103;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('cts2r88o5l4f34sf7rr03se3sipoplpb','127.0.0.1',1537490459,_binary '__ci_last_regenerate|i:1537490459;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('k2vsfa2e2kdm1bvai5h6qjvuk2dhe355','127.0.0.1',1537490533,_binary '__ci_last_regenerate|i:1537490459;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('dhk1f8km69rjpgvngj9acj8odvaa4hnf','127.0.0.1',1537501310,_binary '__ci_last_regenerate|i:1537501310;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('pejquiovta4ht6c2tatvg3s1drsoh3cl','::1',1537499047,_binary '__ci_last_regenerate|i:1537499046;'),('cfur29in89injgldnoq8dphbo34d8a2k','127.0.0.1',1537501628,_binary '__ci_last_regenerate|i:1537501628;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('lfsemns70136089rc2f7pkvfbmn8sdp6','127.0.0.1',1537501628,_binary '__ci_last_regenerate|i:1537501628;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('tcrr0jjr71v9mai480nf57c5cufo42fn','127.0.0.1',1537511263,_binary '__ci_last_regenerate|i:1537511263;'),('nfaaoj5qm36i22emig86gnrj5opp8ffh','127.0.0.1',1537511646,_binary '__ci_last_regenerate|i:1537511646;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('sedg61h3p3qd6pogtfia7uohsecl3jc0','127.0.0.1',1537511653,_binary '__ci_last_regenerate|i:1537511646;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('8jbkec2rqne4qfvb3fo4bvafvcgn5qfr','127.0.0.1',1537628399,_binary '__ci_last_regenerate|i:1537628335;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('g5al1pma5kee1fh82suf4e79oq8g952l','::1',1537697285,_binary '__ci_last_regenerate|i:1537697285;'),('b9fii4pglfrklqieo3ovcm4mebqvdl46','127.0.0.1',1537697829,_binary '__ci_last_regenerate|i:1537697829;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('r4m2lkt5ibtl0vvab5i01ald8rmbfg27','127.0.0.1',1537697833,_binary '__ci_last_regenerate|i:1537697829;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('9v01aaalvbbtu8mjcvip383mign3tdul','::1',1537716227,_binary '__ci_last_regenerate|i:1537716227;'),('kfm6mps59ecdel1tfr7969un49n04jib','127.0.0.1',1537716431,_binary '__ci_last_regenerate|i:1537716231;IS_LOGIN_MAHASISWA|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";nim|s:4:\"2015\";id|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";'),('fuavnj3ojvuicjjdoet4i31lokmusso2','127.0.0.1',1537718397,_binary '__ci_last_regenerate|i:1537718386;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('i4ph5pmrlhtbi3te43copc1le95968bj','127.0.0.1',1537784144,_binary '__ci_last_regenerate|i:1537784144;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('d23d30qjj3qebvnigc8iij9nmfbl55nk','127.0.0.1',1537886680,_binary '__ci_last_regenerate|i:1537886680;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('l34000lj0vlrbi9m0fgjvriau4j06ki7','127.0.0.1',1537886433,_binary '__ci_last_regenerate|i:1537886433;'),('9pe4upj4cnppnm4fmmob1ciemj51loob','127.0.0.1',1537886433,_binary '__ci_last_regenerate|i:1537886433;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('ptkqd7ak93aqboa6vkoohn6jp6lk8apd','127.0.0.1',1537886982,_binary '__ci_last_regenerate|i:1537886982;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('ode4bn24jrdkhqfdnumjh4evcpjpvnqj','127.0.0.1',1537887422,_binary '__ci_last_regenerate|i:1537887422;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('8953hps4ksupbj6hl5d45qfm4kjv0efl','127.0.0.1',1537887033,_binary '__ci_last_regenerate|i:1537887033;'),('g5lj6qu5ggmotf16a6kceieh8nvgkb1l','127.0.0.1',1537887033,_binary '__ci_last_regenerate|i:1537887033;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"new\";}'),('d1gcoqetthr7tsh07oabd277iaf7718l','127.0.0.1',1537887748,_binary '__ci_last_regenerate|i:1537887748;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('2a5e3paj7fqoujp5gd5ka9oouva40ufu','127.0.0.1',1537888090,_binary '__ci_last_regenerate|i:1537888090;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('onorqfceldce48t4g8c65anmrildihe7','127.0.0.1',1537888454,_binary '__ci_last_regenerate|i:1537888454;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('0q1oos5ks3875doc8fvvpbdqodcuu6fh','127.0.0.1',1537888779,_binary '__ci_last_regenerate|i:1537888779;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('6otp6aqa5qv1ecpr7j73ktgof2obdk0m','127.0.0.1',1537889244,_binary '__ci_last_regenerate|i:1537889244;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('a9f2pov8rlrjq3nr9nkokmm6fgt5tqlf','127.0.0.1',1537889616,_binary '__ci_last_regenerate|i:1537889616;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('c5pbmo2u28n41lpc97e7s8etiensrdmm','127.0.0.1',1537889958,_binary '__ci_last_regenerate|i:1537889958;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('7q9n8ibggtk4pkigsmm4qq41hqf22ra1','127.0.0.1',1537890291,_binary '__ci_last_regenerate|i:1537890291;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('9ie9rhuoaonbpefjske5flnr9seil95d','127.0.0.1',1537890658,_binary '__ci_last_regenerate|i:1537890658;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('mm4ne5auotrahhfi2lfus1n25f0rbc86','127.0.0.1',1537890794,_binary '__ci_last_regenerate|i:1537890658;IS_LOGIN_ADMIN|b:1;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('382or3q296osdpelkdo1rpnp5c7fasdn','127.0.0.1',1538041011,_binary '__ci_last_regenerate|i:1538041011;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";IS_LOGIN_ADMIN|b:1;user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('qgbqab1q8hobjcnqadnmhvu1s2nnbecd','127.0.0.1',1538041377,_binary '__ci_last_regenerate|i:1538041377;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('m4apetuu6tfgjmrrbvnt3qu56gum8kjf','127.0.0.1',1538042036,_binary '__ci_last_regenerate|i:1538042036;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('pp6d773epmetfq8trvnv7i59kj96b1od','127.0.0.1',1538043250,_binary '__ci_last_regenerate|i:1538043250;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('hq51jnggjr2mahvq828ej8opigcmv033','127.0.0.1',1538043563,_binary '__ci_last_regenerate|i:1538043563;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('aihurf60a539rng154nudg7fpbtjgmbm','127.0.0.1',1538043901,_binary '__ci_last_regenerate|i:1538043901;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('4pg03v9u98s50u1bpdh3th4frg8qkpek','127.0.0.1',1538044206,_binary '__ci_last_regenerate|i:1538044206;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('lmqlts8f7hfndq7pu2utqou5v7052tpm','127.0.0.1',1538044551,_binary '__ci_last_regenerate|i:1538044551;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('jnu1sagvsbk3rbgblc5d87nnvhjv1fcs','127.0.0.1',1538044918,_binary '__ci_last_regenerate|i:1538044918;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('854hdb9s07pbm950bhog62eclqjo6da3','127.0.0.1',1538046896,_binary '__ci_last_regenerate|i:1538046896;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('up1oi7hc0q218n31vamnhrceihlrukek','127.0.0.1',1538047498,_binary '__ci_last_regenerate|i:1538047498;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('d7qnbfftkglqiclmp2e9tnt7bhqasnaj','127.0.0.1',1538047855,_binary '__ci_last_regenerate|i:1538047855;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('2vrk572ct14chqqracr53ru84qcjhhqu','127.0.0.1',1538048329,_binary '__ci_last_regenerate|i:1538048329;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('u5nk7g7m9rhlq4o0easm3f3bpdrjqim8','127.0.0.1',1538048527,_binary '__ci_last_regenerate|i:1538048329;IS_LOGIN_MAHASISWA|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";nim|s:4:\"2015\";id_mhs|s:1:\"1\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;IS_LOGIN_ADMIN|b:1;'),('tcsfel3clela52ft8kqplcstvqteff1p','127.0.0.1',1538057809,_binary '__ci_last_regenerate|i:1538057809;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('tc12iigl8547cad3j4qdu3940l0cvmiv','127.0.0.1',1538058116,_binary '__ci_last_regenerate|i:1538058116;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('5f0p3rh57kh7v32qouro3kptdf4gf0h7','127.0.0.1',1538058542,_binary '__ci_last_regenerate|i:1538058542;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('1marbu3ufta2ogqj1ifrr0gusqlk5c4h','127.0.0.1',1538058848,_binary '__ci_last_regenerate|i:1538058848;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('dvsqpnng8d4nn285uql0u00u997rve1v','127.0.0.1',1538059190,_binary '__ci_last_regenerate|i:1538059190;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('0bngtluq0g0kq0jsreckuht3uhpdiv51','127.0.0.1',1538060873,_binary '__ci_last_regenerate|i:1538060873;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('26sca88t57t7leemqc6fgdrep7vqie5l','127.0.0.1',1538061321,_binary '__ci_last_regenerate|i:1538061321;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('rdsorv7c2e57ja0gi753j2q1sku79e47','127.0.0.1',1538062037,_binary '__ci_last_regenerate|i:1538062037;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('lgf476pr42hgd1n761ugilmpokk7ni87','127.0.0.1',1538062423,_binary '__ci_last_regenerate|i:1538062423;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('65t1ncstm9fveccni5ancg34oksb5r4b','127.0.0.1',1538062790,_binary '__ci_last_regenerate|i:1538062790;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('ghe2j954qs1qlakbvopshatg41v197nk','127.0.0.1',1538063202,_binary '__ci_last_regenerate|i:1538063202;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('hdesb9u43dlj53rep33t1s1o32l4bf3m','127.0.0.1',1538063544,_binary '__ci_last_regenerate|i:1538063544;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('8752k05m0i6p803s7ro4i3la9r864gqk','127.0.0.1',1538063899,_binary '__ci_last_regenerate|i:1538063899;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('ff7eudfr86ul2g6lc6rt6s4p8q4afbed','127.0.0.1',1538064357,_binary '__ci_last_regenerate|i:1538064357;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('8ipo9im7v6hobfo1a1enn9ib9d98t4c4','127.0.0.1',1538064735,_binary '__ci_last_regenerate|i:1538064735;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('cnblhv5hco4udpkkal707h7dljt1nluq','127.0.0.1',1538065113,_binary '__ci_last_regenerate|i:1538065113;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('17baskkl0koorgevipk51vfaj5b5c746','127.0.0.1',1538065838,_binary '__ci_last_regenerate|i:1538065838;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('5m7n95lknao300rip1flbrm5hkqnchjm','127.0.0.1',1538066175,_binary '__ci_last_regenerate|i:1538066175;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('e6okj49qjvqlgqeet8na8a8lcldeljln','127.0.0.1',1538066497,_binary '__ci_last_regenerate|i:1538066497;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('ddjc8qh98602u474tgg3hdbp2283hree','127.0.0.1',1538066884,_binary '__ci_last_regenerate|i:1538066884;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('0mftbj2o4e43q81n0nhsjo5anoolguuc','127.0.0.1',1538067245,_binary '__ci_last_regenerate|i:1538067245;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('nrnmruk3nn7ju3069noglmu99i1eq2hl','127.0.0.1',1538067642,_binary '__ci_last_regenerate|i:1538067642;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('np6nj4m330gb8rntl7icsqjhiloi0f81','127.0.0.1',1538067958,_binary '__ci_last_regenerate|i:1538067958;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('hi75c70st5at9ibec9dtbiifmj69cr8b','127.0.0.1',1538068274,_binary '__ci_last_regenerate|i:1538068274;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('ohu627no3tckouvj1031hm5k4gf8qner','127.0.0.1',1538068274,_binary '__ci_last_regenerate|i:1538068274;IS_LOGIN_ADMIN|b:1;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;'),('mfli19cp91sakl93i4ul62dd9gttsjf5','127.0.0.1',1538102683,_binary '__ci_last_regenerate|i:1538102683;name|s:4:\"root\";email|s:13:\"root@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"1\";level|s:18:\"SYSTEM APPLICATION\";user_type|N;message|s:0:\"\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('janp9kbdpd7if352csvdli7htbkt4rrb','127.0.0.1',1538102986,_binary '__ci_last_regenerate|i:1538102986;name|s:5:\"staff\";email|s:14:\"staff@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_ADMIN|b:1;'),('jj6q38mlhh1p4tl0cmvu6epi98s4t6mo','127.0.0.1',1538103586,_binary '__ci_last_regenerate|i:1538103586;name|s:5:\"staff\";email|s:14:\"staff@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_ADMIN|b:1;'),('rct13oj3169leu12imvbcpf252mkrdgl','127.0.0.1',1538104085,_binary '__ci_last_regenerate|i:1538104085;name|s:5:\"staff\";email|s:14:\"staff@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_ADMIN|b:1;'),('v1gfb5jnmmi1t9omjdbhgjr53sk06sjr','127.0.0.1',1538104388,_binary '__ci_last_regenerate|i:1538104388;name|s:5:\"staff\";email|s:14:\"staff@mail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_ADMIN|b:1;'),('5vtn95vua70mu1cr52fjjm87qnbg6cbi','127.0.0.1',1538104722,_binary '__ci_last_regenerate|i:1538104722;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_ADMIN|b:1;IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('n20fnvod6cmslurjok1r4rtaabgikt8v','::1',1538104616,_binary '__ci_last_regenerate|i:1538104615;'),('37gmtrh7v32164km4369uhs0thb57sm7','127.0.0.1',1538105024,_binary '__ci_last_regenerate|i:1538105024;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('p94qnvtd2a9voh5skiq9bb32pgl1gv21','127.0.0.1',1538105716,_binary '__ci_last_regenerate|i:1538105716;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";'),('63slvdsufab259huj4jkabgsrmustoiq','127.0.0.1',1538105996,_binary '__ci_last_regenerate|i:1538105716;name|s:6:\"FAMILY\";email|s:23:\"diditriawan13@gmail.com\";password|s:40:\"7c4a8d09ca3762af61e59520943dc26494f8941b\";user_id|s:1:\"3\";level|s:13:\"ADMINISTRATOR\";user_type|s:15:\"BAGIAN KEUANGAN\";IS_LOGIN_MAHASISWA|b:1;nim|s:4:\"2015\";id_mhs|s:1:\"1\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_fakultas`
--

DROP TABLE IF EXISTS `mst_fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_fakultas` (
  `FakultasId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FakultasName` varchar(255) DEFAULT NULL,
  `FakultasDesc` varchar(255) DEFAULT NULL,
  `FakultasPicId` int(11) DEFAULT NULL,
  `FakultasIsActive` tinyint(3) DEFAULT '1',
  `FakultasCreatedDate` datetime DEFAULT NULL,
  `FakultasUpdatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`FakultasId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_fakultas`
--

LOCK TABLES `mst_fakultas` WRITE;
/*!40000 ALTER TABLE `mst_fakultas` DISABLE KEYS */;
INSERT INTO `mst_fakultas` VALUES (1,'FTKI','FAKULTAS TEKNIK DAN ILMU KOMPUTER',1,1,NULL,NULL),(3,'FTIPA','FAKULTAS IPA',NULL,1,'2018-09-27 21:42:38',NULL);
/*!40000 ALTER TABLE `mst_fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_jurusan`
--

DROP TABLE IF EXISTS `mst_jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_jurusan` (
  `JurusanId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `JurusanCode` varchar(100) DEFAULT NULL,
  `JurusanName` varchar(50) NOT NULL,
  `JurusanIsActive` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active;0=inactive',
  PRIMARY KEY (`JurusanId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_jurusan`
--

LOCK TABLES `mst_jurusan` WRITE;
/*!40000 ALTER TABLE `mst_jurusan` DISABLE KEYS */;
INSERT INTO `mst_jurusan` VALUES (1,'IT','TEKNIK INFORMATIKA',1);
/*!40000 ALTER TABLE `mst_jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_mahasiswa`
--

DROP TABLE IF EXISTS `mst_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_mahasiswa` (
  `MahasiswaId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MahasiswaName` varchar(50) NOT NULL,
  `MahasiswaNim` varchar(30) NOT NULL,
  `MahasiswaEmail` varchar(50) NOT NULL,
  `MahasiswaPassword` varchar(45) DEFAULT NULL,
  `MahasiswaPob` varchar(50) NOT NULL,
  `MahasiswaJurusanId` int(11) NOT NULL,
  `MahasiswaFakultasId` int(11) DEFAULT NULL,
  `MahasiswaIsActive` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive;1=active',
  `MahasiswaRegisterDate` datetime DEFAULT NULL,
  `MahasiswaCreatedDate` datetime DEFAULT NULL,
  `MahasiswaUpdatedDate` datetime DEFAULT NULL,
  `MahasiswaUniqueCode` varchar(40) DEFAULT NULL,
  `MahasiswaLastLogin` datetime DEFAULT NULL,
  `MahasiswaForgotPassTime` timestamp NULL DEFAULT NULL,
  `MahasiswaApprovedById` int(11) DEFAULT NULL,
  PRIMARY KEY (`MahasiswaId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_mahasiswa`
--

LOCK TABLES `mst_mahasiswa` WRITE;
/*!40000 ALTER TABLE `mst_mahasiswa` DISABLE KEYS */;
INSERT INTO `mst_mahasiswa` VALUES (1,'FAMILY','2015','diditriawan13@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','',1,1,1,'2018-09-13 18:09:36','2018-09-13 18:09:36',NULL,NULL,'2018-09-28 10:17:03',NULL,NULL),(2,'Mahasiswa kupu','123456','diditriawan13s@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','',1,1,1,'2018-09-13 18:24:07','2018-09-13 18:24:07',NULL,NULL,'2018-09-17 04:45:11',NULL,NULL);
/*!40000 ALTER TABLE `mst_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_broadcast`
--

DROP TABLE IF EXISTS `tbl_broadcast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_broadcast` (
  `broadcast_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `broadcast_name` varchar(255) NOT NULL,
  `broadcast_content` text NOT NULL,
  `broadcast_post_date` datetime NOT NULL,
  `broadcast_created_date` datetime NOT NULL,
  `broadcast_updated_date` datetime NOT NULL,
  `broadcast_created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`broadcast_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_broadcast`
--

LOCK TABLES `tbl_broadcast` WRITE;
/*!40000 ALTER TABLE `tbl_broadcast` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_broadcast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_complain`
--

DROP TABLE IF EXISTS `tbl_complain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_complain` (
  `ComplainId` bigint(20) NOT NULL AUTO_INCREMENT,
  `ComplainName` varchar(255) DEFAULT NULL,
  `ComplainFakultasId` int(11) DEFAULT NULL,
  `ComplainToId` int(11) DEFAULT NULL,
  `ComplainDesc` longtext,
  `ComplainImage` varchar(255) DEFAULT NULL,
  `ComplainMahasiswaId` int(11) DEFAULT NULL,
  `ComplainIsState` tinyint(4) DEFAULT '0' COMMENT '0=belumditerima;1=diterima;2=ditangani;3=done',
  `ComplainIsActive` tinyint(4) DEFAULT '1' COMMENT '0=inactive;1=active',
  `ComplainCreatedDate` datetime DEFAULT NULL,
  `ComplainUpdatedDate` datetime DEFAULT NULL,
  `ComplainDeletedDate` datetime DEFAULT NULL,
  `ComplainIsRead` tinyint(4) DEFAULT '0' COMMENT '0=unread;1=read',
  PRIMARY KEY (`ComplainId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_complain`
--

LOCK TABLES `tbl_complain` WRITE;
/*!40000 ALTER TABLE `tbl_complain` DISABLE KEYS */;
INSERT INTO `tbl_complain` VALUES (1,'test',1,2,'',NULL,1,1,1,'2018-09-25 22:53:12',NULL,NULL,0),(2,'testing',1,1,'testing keuangan',NULL,1,2,1,'2018-09-27 16:55:18',NULL,NULL,0),(4,'asd',1,1,'asda',NULL,1,2,1,'2018-09-27 16:55:18',NULL,NULL,0),(5,'asda',1,2,'asdas',NULL,1,2,1,'2018-08-27 16:55:18',NULL,NULL,0);
/*!40000 ALTER TABLE `tbl_complain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_nik` varchar(45) DEFAULT NULL,
  `user_full_name` varchar(55) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_fakultas_id` int(11) DEFAULT NULL,
  `user_is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=nonactive;1=active',
  `user_is_login` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=logout;1=login',
  `user_login_time` datetime DEFAULT NULL,
  `user_created_date` datetime DEFAULT NULL,
  `user_updated_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,NULL,'SYSTEM APPLICATION','root','7c4a8d09ca3762af61e59520943dc26494f8941b','root@mail.com',1,0,0,1,1,'2018-09-28 09:36:45','0000-00-00 00:00:00','2018-09-21 00:09:24'),(3,NULL,'TEST STAFF','staff','7c4a8d09ca3762af61e59520943dc26494f8941b','staff@mail.com',3,1,1,1,1,'2018-09-28 09:52:23','2018-09-21 00:10:24','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_role`
--

DROP TABLE IF EXISTS `tbl_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_role`
--

LOCK TABLES `tbl_user_role` WRITE;
/*!40000 ALTER TABLE `tbl_user_role` DISABLE KEYS */;
INSERT INTO `tbl_user_role` VALUES (1,'SYSTEM APPLICATION'),(2,'ADMINISTRATOR'),(3,'STAFF');
/*!40000 ALTER TABLE `tbl_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_type`
--

DROP TABLE IF EXISTS `tbl_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_type`
--

LOCK TABLES `tbl_user_type` WRITE;
/*!40000 ALTER TABLE `tbl_user_type` DISABLE KEYS */;
INSERT INTO `tbl_user_type` VALUES (1,'BAGIAN KEUANGAN'),(2,'BAGIAN KEMAHASISWAAN');
/*!40000 ALTER TABLE `tbl_user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_helpdesk'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-28 10:40:26
