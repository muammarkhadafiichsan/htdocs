

CREATE TABLE `book` (
  `id` int(3) NOT NULL auto_increment,
  `nama` varchar(100) default NULL,
  `email` varchar(30) default NULL,
  `telp` varchar(15) default NULL,
  `prop` varchar(15) default NULL,
  `comment` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `book` */

insert  into `book`(`id`,`nama`,`email`,`telp`,`prop`,`comment`) values (1,'paijo','paijo@email.com','088888','Jawa Tengah','ini komentar ini komentar ini komentar ini komentar ini komentar '),(2,'joni','emailku@email.com','0888888888','Jawa Tengah','nyoba berkomentar ajaaahh...'),(3,'jono','emailku@email.com','038747474','Jawa Tengah','nyoba berkomentar ajaaahh...'),(4,'bayu','emailku@email.com','0888888888','Jawa Tengah','coba lagi'),(6,'upin','emailku@email.com','03773454','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(7,'ipin','emailku@email.com','354666','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(8,'juragan','emailku@email.com','4666','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(9,'cendol','emailku@email.com','556777','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(10,'kaskuser','emailku@email.com','44656','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(11,'agan','emailku@email.com','4666545','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(12,'cendoler','emailku@email.com','466777','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(13,'juragan','emailku@email.com','466666','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(14,'juragan','emailku@email.com','466666','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(15,'agan','emailku@email.com','4666545','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(16,'agan','emailku@email.com','4666545','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer'),(17,'ipin','emailku@email.com','354666','Jawa Tengah','sksjksjkjw ejkwrkewkrhewr werwerewrer');
