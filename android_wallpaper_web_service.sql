/*
SQLyog Professional v12.5.1 (32 bit)
MySQL - 5.7.27-0ubuntu0.18.04.1 : Database - wallpaper_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallpaper_count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`thumbnail`,`wallpaper_count`,`created_at`,`updated_at`) values 
(1,'Abstract','thumbnail-abstract.jpg',20,'2019-08-03 22:07:20','2019-08-03 22:07:28'),
(2,'Amoled','thumbnail-amoled.jpg',14,'2019-08-03 22:07:59',NULL),
(3,'Black & White','thumbnail-black-and-white.png',13,'2019-08-03 22:08:17',NULL),
(4,'Flower','thumbnail-flower.jpg',21,'2019-08-03 22:08:33',NULL),
(5,'Music','thumbnail-music.jpg',32,'2019-08-03 22:08:49',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_07_16_150552_create_category_table',1),
(2,'2019_07_16_155850_create_wallpaper_table',1);

/*Table structure for table `wallpapers` */

DROP TABLE IF EXISTS `wallpapers`;

CREATE TABLE `wallpapers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` double NOT NULL DEFAULT '0',
  `resolution` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `downloads` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallpapers_category_id_foreign` (`category_id`),
  CONSTRAINT `wallpapers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `wallpapers` */

insert  into `wallpapers`(`id`,`category_id`,`file_name`,`file_size`,`resolution`,`downloads`,`views`,`created_at`,`updated_at`) values 
(1,1,'abstract-1.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(2,1,'abstract-2.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(3,1,'abstract-3.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(4,1,'abstract-4.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(5,1,'abstract-5.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(7,1,'abstract-7.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(8,1,'abstract-8.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(10,1,'abstract-10.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(11,1,'abstract-11.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(12,1,'abstract-12.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(13,1,'abstract-13.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL),
(14,1,'abstract-14.jpg',0,'-',0,0,'2019-08-01 00:00:00',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
