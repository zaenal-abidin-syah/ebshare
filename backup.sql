/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ebshare2
-- ------------------------------------------------------
-- Server version	10.6.18-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ebook`
--

DROP TABLE IF EXISTS `ebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(254) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `path` varchar(254) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `deskripsi` text NOT NULL DEFAULT '',
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT curdate(),
  `img` varchar(254) NOT NULL,
  `pages` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `ebook_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `ebook_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebook`
--

LOCK TABLES `ebook` WRITE;
/*!40000 ALTER TABLE `ebook` DISABLE KEYS */;
INSERT INTO `ebook` VALUES (130,'Buku Sakti Hacker','gerald','surya pustaka','/home/zaens/Documents/ebshare2/writable/uploads/1717419140_1242c4614804e859bbb0.pdf',419174,'2017','buku agar bisa jadi hacker, yang cocok untuk pemula',1,7,'application/pdf','2024-06-03','img/ebook/1717419140_1242c4614804e859bbb0.jpg',0),(131,'Operating System','harry','cahya permata','/home/zaens/Documents/ebshare2/writable/uploads/1717419209_b55f5ca43bc890425c31.pdf',899498,'2012','buku tentang sistem operasi',1,7,'application/pdf','2024-06-03','img/ebook/1717419209_b55f5ca43bc890425c31.jpg',0),(132,'How Linux Works What Every Superuser Should Know, 3rd Dition by','jonathan','lintang','/home/zaens/Documents/ebshare2/writable/uploads/1717512409_0358a881830833dafe02.pdf',170825,'2018','how linux work every superuser should know 3rd edition',2,7,'application/pdf','2024-06-04','img/ebook/1717512409_0358a881830833dafe02.jpg',0),(133,'Investigation using OSINT with a focus on Intelligence operations and Dark Web operations   Training','kelly','cahya permata','/home/zaens/Documents/ebshare2/writable/uploads/1717512600_5a227832b4ed0a9dd425.pdf',472411,'2011','Investigation using OSINT with a focus on Intelligence operations and Dark Web operations - Training',2,14,'application/pdf','2024-06-04','img/ebook/1717512600_5a227832b4ed0a9dd425.jpg',0),(134,'Shell Scripting    How to Automate Command Line Tasks Using Bash Scripting and Shell Programming','Cannon,Jason','Zaenal','/home/zaens/Documents/ebshare2/writable/uploads/1717591663_20cc0b21cf5abb565ee9.epub',151472,'2015','              Shell Scripting Made Easy If you want to learn how to write shell scripts like a pro, solve real-world problems, or automate repetitive and complex tasks, read on. Hello. My name is Jason Cannon and I\'m the author of  Linux for Beginners ,  Python Programming for Beginners , and an instructor to thousands of satisfied students. I started my IT career in the late 1990\'s as a Unix and Linux System Engineer and I\'ll be sharing my real-world shell scripting and bash programming experience with you throughout this book. By the end of this book you will be able to create shell scripts with ease. You\'ll learn how to take tedious and repetitive tasks and turn them into programs that will save you time and simplify your life on Linux, Unix, or MAC systems. Here is what you will get and learn by reading this  Shell Scripting  ebook: A step-by-step process of writing shell scripts that solve real-world problems. The #1 thing you must do every time you create a shell script. How to quickly find and fix the most shell scripting errors. How to accept input from a user and then make decisions on that input. How to accept and process command line arguments. What special variables are available, how to use them in your shell scripts, and when to do so. A shell script creation check list -- You\'ll never have to guess what to include in each of your shell scripts again. Just use this simple check list. A shell script template (boilerplate). Use this format for each of your shell scripts. It shows exactly what to include and where everything goes. Eliminate guesswork! Practice exercises with solutions so you can start using what you learn right away. Real-world examples of shell scripts from my personal collection. A download that contains the scripts used in the book and lessons. You\'ll be able to look at and experiment with everything you\'re learning. Learn to Program Using Any Shell Scirpting Language What you learn in this book can be applied to any shell, however the focus is on the bash shell and you\'ll learn some really advanced bash features. Again, whether you\'re using bash, bourne (sh), KornShell (ksh), C shell (csh), Z shell (zsh), or even the tcsh shell, you\'ll be able to put what you learn in this book to good use. Perfect for Linux, Unix, Mac and More! Also, you\'ll be able to use these scripts on any Linux environment including Ubuntu, Debian, Linux Mint, RedHat, Fedora, OpenSUSE, Slackware, Kali Linux and more. You\'re scripts will even run on other operating systems such as Apple\'s Mac OS X, Oracle\'s Solaris, IBM\'s AIX, HP\'s HP-UX, FreeBSD, NetBSD, and OpenBSD. Scroll up, click the Buy Now With 1 Click button and get started learning Linux today!              ',1,16,'epub','2024-06-05','/home/zaens/Documents/ebshare2/writable/uploads/img/ebook/1717591663_20cc0b21cf5abb565ee9.jpg',0),(135,'packet tracer 2.3.2','Suk-yi Pennock','Microsoft','/home/zaens/Documents/ebshare2/writable/uploads/1717594692_4824357b461c8d2ec5ab.docx',863852,'2017','                            ini deskripsi',1,1,'docx','2024-06-05','',0),(136,'Linux Command Line    FAST and EASY   Linux Commands, Bash Scripting Tricks, Linux Shell Programming Tips and Bash One Liners   Programming Is Easy Book 1 ','Gimson,Matthew','unknown','/home/zaens/Documents/ebshare2/writable/uploads/1717598292_67ffd2de328a007c5e00.epub',1498764,'2015','              Linux Command Line FAST and EASY! (Linux Commands, Bash Scripting Tricks, Linux Shell Programming Tips and Bash One-Liners) This book covers the Linux command line commands, Bash Scripting Tricks, Linux Shell Programming Tips and Bash One-liners. The book starts by explaining on the origin of Linux, the people behind its development and also the reason behind development of Linux. The commands for the Linux command line have been discussed. These range from the basic ones to the more complex ones. Once you have read this book, you will understand how to view the contents of files on the standard output, copy and move files while preserving the file permissions and as well as navigate through different directories via the command line. Searching is very important in Linux. The grep command used for searching in Linux has been explored in this book including its numerous option, thus, you will become an expert in this. Tail command, which is used for viewing and particularly the last parts of a file, has also been discussed. You will get to know how to update your system and adjust its date and time via the command line. The tricks behind bash scripting have also been discussed. These include brace expansion, command substitution, command history and loops. Shell scripting has also been discusses. You will be able to create an executable of a shell file and execute it via the command line. Variable, loops, case statement and decision making shell have been explored in detail. The last part of this book discusses bash on-liners and its emphasis is on how to work with files including backup and extraction of the same. The following are the topics explored in this book:  Definition  Linux Command Line Commands  Bash scripting Tricks  Linux Shell Programming  Bash On-liners Download your copy of **\" Linux Command Line \"** by scrolling up and clicking **\"Buy Now With 1-Click\"** button.              ',1,1,'epub','2024-06-05','img/ebook/1717598292_67ffd2de328a007c5e00.jpg',0),(137,'simulating iot device','Betty Staerk','Microsoft','/home/zaens/Documents/ebshare2/writable/uploads/1717598582_3372d451808baa4ca96a.docx',258056,'2017','                            simulating iot device',1,17,'docx','2024-06-05','/img/ebook/default-docx.png',0),(138,'Game Hacking 1     Anti Cheat BYPASS ','Joas Antonio dos Santos Barbosa','Microsoft® PowerPoint® para Microsoft 365','/home/zaens/Documents/ebshare2/writable/uploads/1717599120_92dabfe6ba473e60c5b7.pdf',652318,'2022','unknown',41,1,'pdf','2024-06-05','img/ebook/1717599120_92dabfe6ba473e60c5b7.jpg',0),(141,'The Feathers','Lott,Cynthia','Piscataqua Press','/home/zaens/Documents/ebshare2/writable/uploads/1717606207_edc72ecd3e77b0ae25b3.epub',402031,'2014','When thirty-five-year-old New Orleans detective Brenda Shapira discovers a murder victim in the historic Garden District, she realizes it is no ordinary case. The stakes are higher and the mystery is more thrilling. As more bodies pile up, the evidence points to a seemingly impossible conclusion: the killer may be Thomas Carpenter -- who died in 1878, a full century before the murders were committed. Could Carpenter really have found a way to return and seek vengeance against those he feels wronged him? But as Shapira and her partner unravel the long-ago mystery steeped in New Orleans history and the yellow fever epidemic, Brenda discovers she may be Carpenter\'s next target.',1,1,'epub','2024-06-05','img/ebook/1717606207_edc72ecd3e77b0ae25b3.jpg',273),(143,'Modern R Programming Cookbook','Abedin,Jaynal','Packt Publishing - ebooks Account','/home/zaens/Documents/ebshare2/writable/uploads/1718191171_f3b6e5be6114f1e9944f.epub',3396593,'2017','Key Features Develop strategies to speed up your R code Tackle programming problems and explore both functional and object-oriented programming techniques Learn how to address the core problems of programming in R with the most popular R packages for common tasks Book Description R is a powerful tool for statistics, graphics, and statistical programming. It is used by tens of thousands of people daily to perform serious statistical analyses. It is a free, open source system whose implementation is the collective accomplishment of many intelligent, hard-working people. There are more than 2,000 available add-ons, and R is a serious rival to all commercial statistical packages. The objective of this book is to show how to work with different programming aspects of R. The emerging R developers and data science could have very good programming knowledge but might have limited understanding about R syntax and semantics. Our book will be a platform develop practical solution out of real world problem in scalable fashion and with very good understanding. You will work with various versions of R libraries that are essential for scalable data science solutions. You will learn to work with Input / Output issues when working with relatively larger dataset. At the end of this book readers will also learn how to work with databases from within R and also what and how meta programming helps in developing applications. What you will learn Install R and its various IDE for a given platform along with installing libraries from different repositories and version control Learn about basic data structures in R and how to work with them Write customized R functions and handle recursions, exceptions in R environments Create the data processing task as a step by step computer program and execute using dplyr Extract and process unstructured text data Interact with database management system to develop statistical applications Formulate and implement parallel processing in R About the Author Jaynal Abedin is currently doing research as a PhD student at Unit for Biomedical Data Analytics (BDA) of INSIGHT at the National University of Ireland Galway. His research work is focused on the sports science and sports medicine area in a targeted project with ORRECO --an Irish startup company that provides evidence-based advice to individual athletes through biomarker and GPS data. Before joining INSIGHT as a PhD student he was leading a team of statisticians at an international public health research organization (icddr,b). His primary role there was to develop internal statistical capabilities for researchers who come from various disciplines. He was involved in designing and delivering statistical training to the researchers. He has a bachelors and masters degree in statistics, and he has written two books in R programming: Data Manipulation with R and R Graphs Cookbook (Second Edition) with Packt. His current research interests are predictive modeling to predict probable injury of an athlete and scoring extremeness of multivariate data to get an early signal of an anomaly. Moreover, he has an excellent reputation as a freelance R programmer and statistician in an online platform such as upwork. Table of Contents Installing and Configuring R and its Libraries Data Structures in R Writing Customized Functions Conditional and Iterative Operations R Objects and Classes Querying, Filtering, and Summarization R for Text Processing',1,15,'epub','2024-06-12','img/ebook/1718191171_f3b6e5be6114f1e9944f.jpg',176),(144,'Modern R Programming Cookbook','Abedin,Jaynal','Packt Publishing - ebooks Account','/home/zaens/Documents/ebshare2/writable/uploads/1718191284_9c4e61b45c55e26c163c.epub',3396593,'2017','Key Features Develop strategies to speed up your R code Tackle programming problems and explore both functional and object-oriented programming techniques Learn how to address the core problems of programming in R with the most popular R packages for common tasks Book Description R is a powerful tool for statistics, graphics, and statistical programming. It is used by tens of thousands of people daily to perform serious statistical analyses. It is a free, open source system whose implementation is the collective accomplishment of many intelligent, hard-working people. There are more than 2,000 available add-ons, and R is a serious rival to all commercial statistical packages. The objective of this book is to show how to work with different programming aspects of R. The emerging R developers and data science could have very good programming knowledge but might have limited understanding about R syntax and semantics. Our book will be a platform develop practical solution out of real world problem in scalable fashion and with very good understanding. You will work with various versions of R libraries that are essential for scalable data science solutions. You will learn to work with Input / Output issues when working with relatively larger dataset. At the end of this book readers will also learn how to work with databases from within R and also what and how meta programming helps in developing applications. What you will learn Install R and its various IDE for a given platform along with installing libraries from different repositories and version control Learn about basic data structures in R and how to work with them Write customized R functions and handle recursions, exceptions in R environments Create the data processing task as a step by step computer program and execute using dplyr Extract and process unstructured text data Interact with database management system to develop statistical applications Formulate and implement parallel processing in R About the Author Jaynal Abedin is currently doing research as a PhD student at Unit for Biomedical Data Analytics (BDA) of INSIGHT at the National University of Ireland Galway. His research work is focused on the sports science and sports medicine area in a targeted project with ORRECO --an Irish startup company that provides evidence-based advice to individual athletes through biomarker and GPS data. Before joining INSIGHT as a PhD student he was leading a team of statisticians at an international public health research organization (icddr,b). His primary role there was to develop internal statistical capabilities for researchers who come from various disciplines. He was involved in designing and delivering statistical training to the researchers. He has a bachelors and masters degree in statistics, and he has written two books in R programming: Data Manipulation with R and R Graphs Cookbook (Second Edition) with Packt. His current research interests are predictive modeling to predict probable injury of an athlete and scoring extremeness of multivariate data to get an early signal of an anomaly. Moreover, he has an excellent reputation as a freelance R programmer and statistician in an online platform such as upwork. Table of Contents Installing and Configuring R and its Libraries Data Structures in R Writing Customized Functions Conditional and Iterative Operations R Objects and Classes Querying, Filtering, and Summarization R for Text Processing',1,1,'epub','2024-06-12','img/ebook/1718191284_9c4e61b45c55e26c163c.jpg',176),(145,'programming','dfsd','dfds','/home/zaens/Documents/ebshare2/writable/uploads/1718191828_f4130afc2213fee9ec67.pdf',2544964,'2012','sdf',1,1,'pdf','2024-06-12','img/ebook/1718191828_f4130afc2213fee9ec67.jpg',99),(146,'30 days of Practice PenTest','unknown','unknown','/home/zaens/Documents/ebshare2/writable/uploads/1718191907_b745e345ae4d174b54b1.pdf',58693,'unkn','unknown',1,1,'pdf','2024-06-12','img/ebook/1718191907_b745e345ae4d174b54b1.jpg',4),(147,'ChatGPT for Cybersecurity  2','Joas Antonio dos Santos Barbosa','Microsoft® PowerPoint® para Microsoft 365','/home/zaens/Documents/ebshare2/writable/uploads/1718192107_8b8dab8693f35a478d39.pdf',1913651,'2023','',1,1,'pdf','2024-06-12','img/ebook/1718192107_8b8dab8693f35a478d39.jpg',40),(148,'Comptia Pentest    tips and tricks','Joas Barbosa','Microsoft® PowerPoint® para Microsoft 365','/home/zaens/Documents/ebshare2/writable/uploads/1718192317_b7c9e3d2d40580c14edf.pdf',121378,'2021','comptiia pentest tips and tricks',1,1,'pdf','2024-06-12','img/ebook/1718192317_b7c9e3d2d40580c14edf.jpg',11),(149,'judul 1','unknown','Zamzar','/home/zaens/Documents/ebshare2/writable/uploads/1719990375_958ebe230b1dc73b10a4.pdf',25207930,'2018','deskripsi ebook',51,13,'pdf','2024-07-03','img/ebook/1719990375_958ebe230b1dc73b10a4.jpg',670);
/*!40000 ALTER TABLE `ebook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ebook_statistik`
--

DROP TABLE IF EXISTS `ebook_statistik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ebook_statistik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ebook` int(11) NOT NULL,
  `jumlah_unduhan` int(11) NOT NULL DEFAULT 0,
  `jumlah_favorite` int(11) NOT NULL DEFAULT 0,
  `jumlah_komentar` int(11) NOT NULL DEFAULT 0,
  `rating_rata_rata` decimal(3,1) NOT NULL DEFAULT 0.0,
  PRIMARY KEY (`id`),
  KEY `id_ebook` (`id_ebook`),
  CONSTRAINT `ebook_statistik_ibfk_1` FOREIGN KEY (`id_ebook`) REFERENCES `ebook` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebook_statistik`
--

LOCK TABLES `ebook_statistik` WRITE;
/*!40000 ALTER TABLE `ebook_statistik` DISABLE KEYS */;
INSERT INTO `ebook_statistik` VALUES (53,130,6,2,3,3.5),(54,131,4,0,0,4.0),(55,132,2,2,2,3.3),(56,133,0,0,0,0.0),(57,134,0,0,0,0.0),(58,135,0,0,0,0.0),(59,136,0,0,0,0.0),(60,137,0,0,0,0.0),(61,138,0,0,0,0.0),(64,141,0,0,0,0.0),(66,143,1,0,0,0.0),(67,144,1,0,0,0.0),(68,145,1,0,0,0.0),(69,146,0,0,0,0.0),(70,147,0,0,0,0.0),(71,148,2,1,16,3.5),(72,149,0,0,0,0.0);
/*!40000 ALTER TABLE `ebook_statistik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ebook_tag`
--

DROP TABLE IF EXISTS `ebook_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ebook_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ebook` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ebook` (`id_ebook`),
  KEY `id_tag` (`id_tag`),
  CONSTRAINT `ebook_tag_ibfk_1` FOREIGN KEY (`id_ebook`) REFERENCES `ebook` (`id`),
  CONSTRAINT `ebook_tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebook_tag`
--

LOCK TABLES `ebook_tag` WRITE;
/*!40000 ALTER TABLE `ebook_tag` DISABLE KEYS */;
INSERT INTO `ebook_tag` VALUES (220,130,57),(222,131,58),(223,132,59),(224,132,60),(225,132,61),(226,133,62),(227,133,63),(232,134,64),(233,134,65),(234,134,66),(235,135,67),(236,135,68),(237,135,36),(238,136,59),(239,136,69),(240,137,36),(241,137,68),(242,138,70),(243,138,71),(245,130,1),(248,141,72),(251,143,74),(252,143,8),(253,144,33),(254,145,33),(255,146,33),(256,147,33),(257,148,75),(258,149,54),(259,149,1);
/*!40000 ALTER TABLE `ebook_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ebook` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_ebook` (`id_ebook`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`id_ebook`) REFERENCES `ebook` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite`
--

LOCK TABLES `favorite` WRITE;
/*!40000 ALTER TABLE `favorite` DISABLE KEYS */;
INSERT INTO `favorite` VALUES (48,2,130,'2024-05-07'),(49,2,132,'2024-06-04'),(61,43,148,'2024-06-12'),(62,1,130,'2024-06-13'),(63,52,132,'2024-07-03');
/*!40000 ALTER TABLE `favorite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'novel'),(2,'komik'),(3,'manga'),(4,'manhua'),(5,'manhwa'),(6,'cerpen'),(7,'drama'),(8,'horror'),(9,'fiksi ilmiah'),(10,'fiksi sejarah'),(11,'fiksi fantasi'),(12,'fiksi romantis'),(13,'klasik'),(14,'puisi'),(15,'biografi'),(16,'autobiografi'),(17,'fantasi'),(18,'romansa'),(19,'misteri');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ebook` int(11) NOT NULL,
  `content` text NOT NULL,
  `tanggal` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_ebook` (`id_ebook`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_ebook`) REFERENCES `ebook` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
INSERT INTO `komentar` VALUES (4,1,130,'halo','2024-06-04'),(5,1,130,'saya sangat merekomendasikan ebook ini untuk pemula','2024-06-04'),(6,2,130,'buku ini sungguhan bagus. kalian harus coba','2024-06-04'),(7,1,148,'menurut saya buku ini bagus tapi','2024-06-12'),(8,1,148,'jadi pertama-tama menurut saya adalah','2024-06-12'),(9,1,148,'halo ini percobaan','2024-06-12'),(10,1,148,'percobaan','2024-06-12'),(11,1,148,'percobaan 2','2024-06-12'),(12,1,148,'percobaan3','2024-06-12'),(13,1,148,'percobaan 4','2024-06-12'),(14,1,148,'percobaan 5','2024-06-12'),(15,1,148,'percobaan 6','2024-06-12'),(16,1,148,'percobaan 7','2024-06-12'),(17,1,148,'halo percobaan','2024-06-12'),(18,1,148,'fix percobaan','2024-06-12'),(19,1,148,'oke percobaan','2024-06-12'),(20,1,148,'oke percobaan lagi','2024-06-12'),(21,1,148,'menghilanglah','2024-06-12'),(22,43,148,'wow buku ini cukup menarik untuk dibaca','2024-06-12'),(23,1,130,'ini komentar','2024-01-03'),(24,1,131,'ini komentar','2024-01-06'),(25,2,130,'ini komentar','2024-01-13'),(26,1,135,'ini komentar','2024-01-23'),(28,1,130,'ini komentar','2024-02-03'),(29,1,131,'ini komentar','2024-02-06'),(30,2,130,'ini komentar','2024-03-13'),(31,1,135,'ini komentar','2024-04-23'),(33,4,130,'ini komentar','2024-05-03'),(34,2,131,'ini komentar','2024-05-06'),(35,1,130,'ini komentar','2024-05-13'),(36,5,135,'ini komentar','2024-05-23'),(38,1,135,'ini komentar','2024-04-23'),(40,3,130,'ini komentar','2024-05-03'),(41,2,131,'ini komentar','2024-05-06'),(42,3,130,'ini komentar','2024-05-13'),(43,2,135,'ini komentar','2024-05-23'),(45,3,130,'ini komentar','2024-02-03'),(46,4,131,'ini komentar','2024-02-06'),(47,2,130,'ini komentar','2024-03-13'),(48,1,135,'ini komentar','2023-12-23'),(50,1,132,'halo','2024-07-03'),(51,52,132,'ini komentar','2024-07-03');
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ebook` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_ebook` (`id_ebook`),
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_ebook`) REFERENCES `ebook` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` VALUES (1,1,131,4,'2024-06-03'),(2,2,130,3,'2024-06-03'),(3,2,131,4,'2024-06-03'),(4,1,130,4,'2024-06-04'),(5,2,132,3,'2024-06-04'),(6,1,148,3,'2024-06-12'),(7,43,148,4,'2024-06-12'),(8,1,130,4,'2024-01-03'),(9,1,134,4,'2024-01-06'),(10,2,130,3,'2024-01-13'),(11,1,135,4,'2024-01-23'),(13,1,130,4,'2024-02-03'),(14,1,131,2,'2024-02-06'),(15,2,134,3,'2024-03-13'),(16,1,135,4,'2024-04-23'),(18,4,137,1,'2024-05-03'),(19,2,131,4,'2024-05-06'),(20,1,130,3,'2024-05-13'),(21,5,135,4,'2024-05-23'),(22,1,144,4,'2024-06-03'),(23,1,135,5,'2024-04-23'),(24,1,143,4,'2024-05-03'),(25,3,130,4,'2024-05-03'),(26,2,134,3,'2024-05-06'),(27,3,137,3,'2024-05-13'),(28,2,132,4,'2024-05-23'),(29,1,141,3,'2024-06-03'),(30,3,131,4,'2024-02-03'),(31,4,131,4,'2024-02-06'),(32,2,130,4,'2024-03-13'),(33,1,135,4,'2024-04-23'),(35,52,132,3,'2024-07-03');
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_unduhan`
--

DROP TABLE IF EXISTS `riwayat_unduhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riwayat_unduhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ebook` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_ebook` (`id_ebook`),
  CONSTRAINT `riwayat_unduhan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `riwayat_unduhan_ibfk_2` FOREIGN KEY (`id_ebook`) REFERENCES `ebook` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_unduhan`
--

LOCK TABLES `riwayat_unduhan` WRITE;
/*!40000 ALTER TABLE `riwayat_unduhan` DISABLE KEYS */;
INSERT INTO `riwayat_unduhan` VALUES (1,2,130,'2024-06-04'),(2,2,130,'2024-06-04'),(3,2,130,'2024-06-04'),(4,2,132,'2024-06-04'),(5,1,131,'2024-06-05'),(6,1,131,'2024-06-05'),(7,1,131,'2024-06-06'),(8,1,131,'2024-06-06'),(9,1,143,'2024-06-12'),(10,1,144,'2024-06-12'),(11,1,145,'2024-06-12'),(12,1,148,'2024-06-12'),(13,43,148,'2024-06-12'),(14,1,130,'2024-06-13'),(15,52,132,'2024-07-03');
/*!40000 ALTER TABLE `riwayat_unduhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'python'),(2,'php'),(3,'pemrograman'),(4,'ai'),(5,'romansa'),(6,'sejarah'),(7,'horor'),(8,'programming'),(9,'modern'),(10,'django'),(11,'web'),(12,'cyber-security'),(13,'cyber'),(14,'text mining'),(15,'mining'),(16,'text'),(17,'analisis'),(18,'intelejen'),(22,'brand'),(23,'medsos'),(27,'web application'),(29,'halo'),(30,'textmining'),(31,'pentesting'),(32,'bug-bounty'),(33,''),(34,'ebook22'),(35,'history'),(36,'iot'),(37,'traffic'),(38,'klasifikasi'),(39,'bugbounty'),(40,'training'),(41,'network'),(42,'go'),(43,'golang'),(44,'it'),(45,'systemdesign'),(46,'blueprint'),(47,'guide'),(48,'security'),(49,'tools'),(50,'emulasi'),(51,'buffer'),(52,'blue'),(53,'red'),(54,'comptia'),(55,'practical'),(56,'crack'),(57,'hacker'),(58,'os'),(59,'linux'),(60,'sudo'),(61,'superuser'),(62,'osint'),(63,'darkweb'),(64,'shell'),(65,'script'),(66,'bash'),(67,'packet-tracer'),(68,'simulasi'),(69,'xli'),(70,'game-hacking'),(71,'bypass'),(72,'feathers'),(73,'cli'),(74,'R'),(75,'tipandtrick'),(76,'owasp'),(77,'mobile');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `role` int(11) DEFAULT 0,
  `tanggal_bergabung` date DEFAULT curdate(),
  `img` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'zaenal','zaenal123@gmail.com','ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f',1,'2023-01-15',''),(2,'john_doe','john.doe@example.com','ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f',0,'2023-01-15',''),(3,'jane_smith','jane.smith@example.com','a58c692433619486f3493e25eb9f9a65b5fd1ef83497f3d1b5a9248c3dcd0b55',0,'2022-11-30',''),(4,'sam_jackson','sam.jackson@example.com','6ca13d52ca70c883e0f0bb101e425a89e8624de51db2d2392593af6a84118090',0,'2023-04-05',''),(5,'emma_watson','emma.watson@example.com','a075d17f3d453073853f813838c15b8023b8c487038436354fe599c3942e1f95',0,'2023-02-20',''),(6,'michael','michael.johnson@example.com','12a1ddb4d380f1fbef089e4d13cb9fbc173856c8ff357eec24a43b83a840bdd2',0,'2023-03-10',''),(7,'sarah_adams','sarah.adams@example.com','5ef21ceb2aa783e2bfd1c0e8bdf85d6d1724708501328c9336450398adb4a3df',0,'2023-05-25',''),(8,'chris_evans','chris.evans@example.com','144e7d43677c73c43823288da04f9de256c40d6003c513f8551c2d9fd1ab8c58',0,'2022-09-18',''),(11,'olivia_taylor','olivia.taylor@example.com','0ec27619cfc302f2fccb40e7b07fe093ae237ed9f587f041194ae9d07c904774',0,'2022-12-03',''),(12,'matthew_wil','matthew.williams@example.com','785268db46ff48923979844b32d0e9549d72b30d2252a7592e16470e3b2a8b59',0,'2023-01-28',''),(13,'emily_brown','emily.brown@example.com','2b10588451cfe7ee1527a708b7c86186566097fa980635fd12a14438ea937a26',0,'2023-04-20',''),(14,'ryan_thomas','ryan.thomas@example.com','5c2a7dd1907c6ffd9a7f9647439a32234e558cedd257ef15a5f65cbf871eb3cf',0,'2023-02-15',''),(15,'sophia_mill','sophia.miller@example.com','bfec78da27ffd8bd19f613da693c8dcea76fe08b537fe6aedb38ca9e3fa6bb38',0,'2023-03-05',''),(16,'daniel_clar','daniel.clark@example.com','78bb44cc13e6582194e1325714ee4db0bf65f415fa3cf370abfe746fe2240ab7',0,'2022-10-30',''),(17,'mia_wilson','mia.wilson@example.com','73f85d1d024cdab6e2109314ed22e1a95664258a6ea62c8ee973b523ca42acb7',0,'2023-05-10',''),(18,'ethan_and','ethan.anderson@example.com','55d280e097d8e19bd8649b380da2c4bb6b3cc4483e843556df47e35cd00cab29',0,'2023-07-20',''),(19,'ava_mart','ava.martinez@example.com','a2c6ae7bb9359c91fd8dc6f6738e16c977730344755a711b8898628f2f685aa6',0,'2022-11-08',''),(20,'noah_taylor','noah.taylor@example.com','a583c29d060cbc95d18ed8c83126351fe1e5bed13dd319c94969e5d73823944c',0,'2023-01-02',''),(21,'oliver_mart','oliver.martin@example.com','a8396aabf6adc86511eb8763affeb140e87dbd52bd52ba94e8690c922387c6af',0,'2023-03-18',''),(22,'emma_garcia','emma.garcia@example.com','6fd9907dc23cb4ac79700365f476d5893822aa1b5c0ec76ab7898efb949fdd07',0,'2023-04-30',''),(23,'isabella','isabella.lopez@example.com','0fe30fcf991e8c98d404dcc379c74518b1fa528fe5bd466895c87e3cc122e3a9',0,'2023-06-25',''),(24,'james_her','james.hernandez@example.com','7d74474d43ce094f3e2991d0314a5c0b0c5495e4fb7ed82678dce06ab4c868e3',0,'2022-09-10',''),(25,'charlotte','charlotte.young@example.com','91af1155aa56bc0b9a66963e33ebd6a3976ccb9c97e656d909d31d547e621060',0,'2023-02-05',''),(26,'liam_king','liam.king@example.com','683b52ee9ec10f5e5b88320ac9307dce33c06cef2149a98bb2d8446e81ab11a8',0,'2023-03-28',''),(27,'amelia_lee','amelia.lee@example.com','a261841bce24f301f012a7e6684e5aa4517b2acff3460162e7e8c3e6c38f01a2',0,'2022-10-15',''),(28,'lucas_rob','lucas.robinson@example.com','a3075633c9eae46de0b5dd3f4f338154782ab08211fe484b4e192bf7f931debf',0,'2023-01-20',''),(29,'mia_hall','mia.hall@example.com','52bfb5c9d1cfd7b66e4e3cefaef1cb2757bfbe7b83132fcecaf5647bf8bbdc3b',0,'2023-05-05',''),(30,'amelia_goz','amelia.gonzalez@example.com','a261841bce24f301f012a7e6684e5aa4517b2acff3460162e7e8c3e6c38f01a2',0,'2023-07-15',''),(31,'benjamin','benjamin.martinez@example.com','9161557dc9faa7e32579cc866c207ab77ff9cec0ddece36674d48a76280fbee5',0,'2022-12-28',''),(32,'harper_wood','harper.wood@example.com','48667ddb5c01c56f8dcba6ecfd4032a5566ec91b110a93e2b19ad4928857e221',0,'2023-04-10',''),(34,'mason_young','mason.young@example.com','13d6684543f5164a4385329f367a56738c5451f06f27f1a05ea4135c0460e5c0',0,'2022-09-25',''),(35,'mia_carter','mia.carter@example.com','2e6d52bbcb157fb2c29969ced1333f8463e2e532d4c9909587cd5121b2ec965b',0,'2023-01-10',''),(36,'amelia_gomez','amelia.gomez@example.com','a261841bce24f301f012a7e6684e5aa4517b2acff3460162e7e8c3e6c38f01a2',0,'2023-03-15',''),(37,'emily_bell','emily.bell@example.com','2b10588451cfe7ee1527a708b7c86186566097fa980635fd12a14438ea937a26',0,'2023-05-30',''),(38,'vmessb','aszaenal618@gmail.com','f30e64047d358bcc79a33cca4e08c877eb5e3d831d22db123b468c1a450f0fad',0,'0000-00-00',''),(40,'syah','enaldinsyah1028@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',0,'2024-05-28',''),(41,'rizki','rizki@gmail.com','6aa107b5118bc17ddfaf4b84f8efc7e76711b5e6e851ac61b7bf8f3557313a22',0,'2024-06-05',NULL),(42,'rizki','rizki123@gmail.com','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',0,'2024-06-12',NULL),(43,'iza','iza@gmail.com','bff6dfb654e7585184273eaa5b4b9d67277ce6b1c436b6365a2435096d765f99',0,'2024-06-12',NULL),(44,'coba','coba@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',0,'2024-06-12',NULL),(45,'dsfdf','rizki123@gmail.com','328c5022ccc950d0bc9ce3e3f752cc0b9363ab949d46c63ddc4c95ff2d2f2609',0,'2024-06-12',NULL),(46,'210411100186','iza@gmail.com','328c5022ccc950d0bc9ce3e3f752cc0b9363ab949d46c63ddc4c95ff2d2f2609',0,'2024-06-12',NULL),(47,'210411100186','iza@gmail.com','9279fa6a314fb0728f7cfd93669cf7f35cc01b6389fd220664919f455b307203',0,'2024-06-12',NULL),(48,'dsfads','iza@gmail.com','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',0,'2024-06-12',NULL),(50,'coba1234','coba1234@gmail.com','b0d007419ffb4cba1eec1f0aa824e41cf8585d5363236477d4b1f200dcbaadc8',0,'2024-06-19',NULL),(51,'usercoba','usercoba@gmail.com','1c60eb7b70e7c6ebb1fb69e7ec8d6c38ab5d43a53fc00e274ad6577c2738ecb8',0,'2024-07-03',NULL),(52,'cobauser','cobauser@gmail.com','efa78abe468e865208e927555952b2a69bf5cd75ac5b5e1c8101c3261c78503c',0,'2024-07-03',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_detail`
--

LOCK TABLES `user_detail` WRITE;
/*!40000 ALTER TABLE `user_detail` DISABLE KEYS */;
INSERT INTO `user_detail` VALUES (1,1,'081234568765','Surabaya, no. 90 Mulyorejo Tengah halo','Surabaya','Jawa Timur','Indonesia'),(2,2,'081234564235','Malang, no. 99 Sukoharjo','Malang','Jawa Timur','Indonesia'),(3,3,'081234568765','','','',''),(4,4,'081234568765','Malang, no. 99 Sukoharjo','Malang','Jawa Timur','Indonesia'),(5,5,'081234568765','','','',''),(6,6,'081234568765','','','',''),(7,7,'081234568765','','','',''),(8,8,'081234568765','','','',''),(9,50,'0812165348464','bojonegoro','Bojonegoro','Jawa Timur','Indonesia'),(10,51,'0848768734347','bojonegoro','bojonegoro','jawa timur','indonesia'),(11,52,'081927368362','bojonegoro','bojonegoro','jawa timur','indonesia');
/*!40000 ALTER TABLE `user_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-23  1:59:08
