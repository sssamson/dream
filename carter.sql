/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost
 Source Database       : carter

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : utf-8

 Date: 02/04/2018 21:42:01 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `appointments`
-- ----------------------------
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `schedule` datetime DEFAULT NULL,
  `status` enum('pending','active','fulfilled','cancelled') DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `appointments_settings`
-- ----------------------------
DROP TABLE IF EXISTS `appointments_settings`;
CREATE TABLE `appointments_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('schedule','days_off') DEFAULT NULL,
  `weekdays` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start` varchar(50) DEFAULT NULL,
  `end` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `blog_categories`
-- ----------------------------
DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `blog_categories`
-- ----------------------------
BEGIN;
INSERT INTO `blog_categories` VALUES ('4', 'Cat 1'), ('5', 'Cat 2');
COMMIT;

-- ----------------------------
--  Table structure for `blogs`
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT NULL,
  `cat_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `intro` text,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `blogs`
-- ----------------------------
BEGIN;
INSERT INTO `blogs` VALUES ('7', '2018-02-03 22:18:00', '0', 'Blog Sample 1', '1517715563.jpg', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.', '&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px; background-color: rgb(250, 249, 249);&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;background-color: rgb(250, 249, 249); color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px;&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;background-color: rgb(250, 249, 249); color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px;&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;background-color: rgb(250, 249, 249); color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px;&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;'), ('8', '2018-02-03 22:39:00', '0', 'Blog Sample 2', '1517715928.jpg', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;'), ('9', '2018-02-03 22:45:00', '0', 'Blog Sample 3', '1517715951.png', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.', '&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px; background-color: rgb(250, 249, 249);&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&lt;/span&gt;&lt;span style=&quot;background-color: rgb(250, 249, 249); color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px;&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&lt;/span&gt;&lt;span style=&quot;background-color: rgb(250, 249, 249); color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px;&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&lt;/span&gt;&lt;span style=&quot;background-color: rgb(250, 249, 249); color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px; letter-spacing: 1px;&quot;&gt;Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;');
COMMIT;

-- ----------------------------
--  Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ci_sessions`
-- ----------------------------
BEGIN;
INSERT INTO `ci_sessions` VALUES ('0349s1lvspp4rba3gk4k4ggr91nn8ndp', '127.0.0.1', '1517789260', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738393236303b), ('0d21tnl3g32je5htbnj1sge890q5joal', '127.0.0.1', '1517708894', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730383839343b61646d696e5f69647c733a313a2235223b), ('0svm60tk9rkpauufcaupenpseuuuk31k', '127.0.0.1', '1517786243', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738363234333b61646d696e5f69647c733a313a2235223b), ('101vqb3ou5m13gg00im2sq8ueqq52i0l', '127.0.0.1', '1517795097', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739353039373b61646d696e5f69647c733a313a2235223b), ('13lqurrgr91fcvdjmsr3g70da6mjqqji', '127.0.0.1', '1517773746', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737333734363b), ('19467mvc3qhse5rstnd78j4p4ja1pm1q', '127.0.0.1', '1517784160', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738343136303b), ('1qa628ef6mjk8mm2fqvatv5g7js26m4s', '127.0.0.1', '1517790967', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739303936373b61646d696e5f69647c733a313a2235223b), ('27b1vllq55c07348jg4d5mu50o6futbc', '127.0.0.1', '1517794660', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739343636303b), ('3p95r3obpuelrhqgmr4mk8689fnh1uag', '127.0.0.1', '1517794840', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739343834303b), ('5ggjqvl206aoi9f8g3q4e4jh20hsnc7m', '127.0.0.1', '1517795691', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739353639313b61646d696e5f69647c733a313a2235223b), ('5vs642nj0lu0ee7kd0edco1pnqn8tu0u', '127.0.0.1', '1517783495', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738333439353b61646d696e5f69647c733a313a2235223b), ('6tgq5i7fvklqlh82k9e71perfnmp1paf', '127.0.0.1', '1517720775', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373732303737353b61646d696e5f69647c733a313a2235223b), ('75pd7ue9mrcdbe9ontidpahq89jljm68', '127.0.0.1', '1517716664', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731363636343b61646d696e5f69647c733a313a2235223b), ('78ta8onabp0sl2beg7il4obeboehm59n', '127.0.0.1', '1517715498', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731353439383b61646d696e5f69647c733a313a2235223b), ('7cb3qa2ctqo4p4vtfa8pa4gmbl05hgbf', '127.0.0.1', '1517793501', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739333530313b61646d696e5f69647c733a313a2235223b), ('7tf6a25cfu0fruqn925fpp093hm0447c', '127.0.0.1', '1517784808', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738343830383b61646d696e5f69647c733a313a2235223b), ('7v0dl39qg5qeefj6i8lkmb83k5a6lmkj', '127.0.0.1', '1517712026', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731323032363b61646d696e5f69647c733a313a2235223b), ('8aukm7m0aik9dnrhofqlhi4l2h4mbbqs', '127.0.0.1', '1517783440', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738333434303b), ('90s4m1cbib9njfmig5gp0oskcirbdcov', '127.0.0.1', '1517789260', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738393236303b), ('97jlq7bl0bfj5tbsjdkpp4pu294dg2p1', '127.0.0.1', '1517796746', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739363734363b61646d696e5f69647c733a313a2235223b), ('9etq7e6epdemoulgcjp0plosftodotvp', '127.0.0.1', '1517789469', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738393436393b61646d696e5f69647c733a313a2235223b), ('9lqc5g7fqlfhhj1m1prj6c0dtqk58u0p', '127.0.0.1', '1517774653', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737343635333b), ('9o7sso5cib45cipf0v6l8evgblc5qi2p', '127.0.0.1', '1517780956', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738303935363b61646d696e5f69647c733a313a2235223b), ('9uaubeherh4nuqbqshu1tbtjigo098kf', '127.0.0.1', '1517775370', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737353337303b), ('a3dm0dlum8o200st3pkp7k5gt2a526aa', '127.0.0.1', '1517705380', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730353338303b61646d696e5f69647c733a313a2235223b), ('akk2sq9vmosknhkdc36u4ntvrchku5a6', '127.0.0.1', '1517796003', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739363030333b61646d696e5f69647c733a313a2235223b), ('bhh48ro14hg1gkvhv7rtenb1385gveeo', '127.0.0.1', '1517707808', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730373830383b61646d696e5f69647c733a313a2235223b), ('c7hlol0tsr4ia794j78i53jij9bqshua', '127.0.0.1', '1517790538', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739303533383b61646d696e5f69647c733a313a2235223b), ('cjc95hpk3ndrhlcotnh6jrlq95orvrgu', '127.0.0.1', '1517789320', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738393332303b), ('cvj8kqn34rhv9j4fg4j70qtefurggshu', '127.0.0.1', '1517706343', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730363334333b61646d696e5f69647c733a313a2235223b), ('e0srp2ogfddrl3sk9kgnd2jrhbn946l9', '127.0.0.1', '1517783440', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738333434303b), ('e2ec5kpejm8pg3asptkdi7mes6k5qlv8', '127.0.0.1', '1517715928', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731353932383b61646d696e5f69647c733a313a2235223b), ('e2g2ohblbk925d8v6jeubrvm9o85vhro', '127.0.0.1', '1517711028', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731313032383b61646d696e5f69647c733a313a2235223b), ('f6m04begofsjkrvhbof424reql8qtopk', '127.0.0.1', '1517791371', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739313337313b61646d696e5f69647c733a313a2235223b), ('fcousvpj8tb7qmlqfvq3dov42e3329gm', '127.0.0.1', '1517792745', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739323734353b61646d696e5f69647c733a313a2235223b), ('ffk32lpaub0eag09fiekdq3okecmapmp', '127.0.0.1', '1517780488', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738303438383b61646d696e5f69647c733a313a2235223b), ('gb4f18cjelccmm4kp9240slb2ja5it6l', '127.0.0.1', '1517776527', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737363532373b61646d696e5f69647c733a313a2235223b), ('gc0is8s8nldjh3vec9bl2lcdln0m4f01', '127.0.0.1', '1517788780', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738383738303b), ('hb3f301oc88ufg4chg5p62ns7gf9bgs7', '127.0.0.1', '1517720417', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373732303431373b61646d696e5f69647c733a313a2235223b), ('ick3nc6lpemv15a9nlsqfc2920e81q8a', '127.0.0.1', '1517779765', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737393736353b61646d696e5f69647c733a313a2235223b), ('ika5aeai15255s8kpr3faar34hqpaiud', '127.0.0.1', '1517796438', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739363433383b61646d696e5f69647c733a313a2235223b), ('irtutgsc4cik0knere80enb46iauls5r', '127.0.0.1', '1517785638', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738353633383b61646d696e5f69647c733a313a2235223b), ('jomcgqeg3m5asnf02mkj9h2278lok7qi', '127.0.0.1', '1517776152', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737363135323b61646d696e5f69647c733a313a2235223b), ('jpv3lpv8m22oeses5gfhog6tsh729ef1', '127.0.0.1', '1517789260', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738393236303b), ('k395seii7226v8f7kk4rp72kfr4uj3rk', '127.0.0.1', '1517785110', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738353131303b61646d696e5f69647c733a313a2235223b), ('kivs0k7ue97714ijs8nv9uqhkgqnmbuu', '127.0.0.1', '1517778609', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737383630393b61646d696e5f69647c733a313a2235223b), ('krhk67mf8jhgvaocni958274h68k9j4h', '127.0.0.1', '1517709210', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730393231303b61646d696e5f69647c733a313a2235223b), ('lfk7oo47jqnuik9jjus4hc0pt99k6o88', '127.0.0.1', '1517778215', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737383231353b61646d696e5f69647c733a313a2235223b), ('ljgdccbik2mlc76knt1k2mbr5hv0i5r6', '127.0.0.1', '1517794197', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739343139373b61646d696e5f69647c733a313a2235223b), ('md5v0el0lg1tf2ohtvbjmgbkssd8dhov', '127.0.0.1', '1517718123', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731383132333b61646d696e5f69647c733a313a2235223b), ('mo7p8qa56gcuaqkb9bp8251f8rdc9gne', '127.0.0.1', '1517797413', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739373431333b61646d696e5f69647c733a313a2235223b), ('mvb4iakb1tomt9ksnq03j0ja2jueq2oq', '127.0.0.1', '1517791778', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739313737383b61646d696e5f69647c733a313a2235223b), ('ntns73mv0okcr1i9rt2b5l1dm58ngmp1', '127.0.0.1', '1517718953', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731383935333b61646d696e5f69647c733a313a2235223b), ('o11vhkudb1kl51adaiimjngbb1tn659f', '127.0.0.1', '1517721337', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373732313132353b61646d696e5f69647c733a313a2235223b), ('okgl0qft3i5qnap1ofnfmqffkscioi8b', '127.0.0.1', '1517797075', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739373037353b61646d696e5f69647c733a313a2235223b), ('oses8s350pkjq5f6rv1qheha6bhcbgks', '127.0.0.1', '1517721125', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373732313132353b61646d696e5f69647c733a313a2235223b), ('pja8tf1iu4h8rf99pcuk6avia4msp21c', '127.0.0.1', '1517784435', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738343433353b61646d696e5f69647c733a313a2235223b), ('pnkdolsh9och2oc66qm02m2hl7hoh1sv', '127.0.0.1', '1517710709', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731303730393b61646d696e5f69647c733a313a2235223b), ('qellnbcjvhhved1tmvd7mvu8b8en23d8', '127.0.0.1', '1517705715', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730353731353b61646d696e5f69647c733a313a2235223b), ('rqais0avat025cd7kic9c593jmsl22ic', '127.0.0.1', '1517711634', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731313633343b61646d696e5f69647c733a313a2235223b), ('rrjk379l31o54m123hmbqe0te6m9uu6i', '127.0.0.1', '1517708139', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730383133393b61646d696e5f69647c733a313a2235223b), ('sh4p9rikmco8o1clddap8diqngjdakld', '127.0.0.1', '1517714324', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731343332343b61646d696e5f69647c733a313a2235223b), ('t4ggen99dkf8bics4j8eeqma0d60r544', '127.0.0.1', '1517774175', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737343137353b), ('t8ljlucsq0q2clbfe8ula5isalcp4ma1', '127.0.0.1', '1517775702', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737353730323b61646d696e5f69647c733a313a2235223b), ('tbevhhqf0ps66oh4m101m76f5psu72df', '127.0.0.1', '1517780159', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373738303135393b61646d696e5f69647c733a313a2235223b), ('ue867g9n6i7r04s479oe4ik395u9apng', '127.0.0.1', '1517793164', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739333136343b61646d696e5f69647c733a313a2235223b), ('umrh7d0ktk635kqabo2t97rr9lf9gh12', '127.0.0.1', '1517797576', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739373431333b61646d696e5f69647c733a313a2235223b), ('v2924oii2ggsbdln5mifpli66qie0g6u', '127.0.0.1', '1517707422', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373730373432323b61646d696e5f69647c733a313a2235223b), ('v902tjo26ddq53ohf6bid7a5mjeiag5n', '127.0.0.1', '1517773422', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373737333432323b), ('vb85p18hlv6g34u8d7kejs42ad5ps1gk', '127.0.0.1', '1517716340', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731363334303b61646d696e5f69647c733a313a2235223b), ('ve4n9009djbeenr76dt5fh6qf41mf0kb', '127.0.0.1', '1517719547', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373731393534373b61646d696e5f69647c733a313a2235223b), ('vk9er8pcpi66imboucq05b4jas9k3hcn', '127.0.0.1', '1517792305', 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373739323330353b61646d696e5f69647c733a313a2235223b);
COMMIT;

-- ----------------------------
--  Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('admin','member') DEFAULT 'member',
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `street` text,
  `company` varchar(200) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unqemail` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `clients`
-- ----------------------------
BEGIN;
INSERT INTO `clients` VALUES ('5', 'admin', 'destinysage@gmail.com', 'justice', null, null, null, null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `order_items`
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `total` varchar(5) DEFAULT NULL,
  `status` enum('pending','active','fulfilled','cancelled') DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `orders_products`
-- ----------------------------
DROP TABLE IF EXISTS `orders_products`;
CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `subsection` text,
  `image` varchar(100) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `mediatype` char(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `page`
-- ----------------------------
BEGIN;
INSERT INTO `page` VALUES ('13', 'home', '0', 'WELCOME TO OUR KINGDOOM', 'HELLO, WE ARE SEO EXPERT!', '', '', ''), ('14', 'about', '0', 'WHO WE ARE!', 'Carter Media Group is a full-service Public Relations Firm that specializes in brand management, crisis management, marketing and social media exclusively to market lawyers. We focus on the power of the lawyer\'s story to connect clients with their firm to drive growth. Your brand is a promise to your clients. Our goal is to help you deliver on that promise consistently. We assist our clients in establishing relationships with the media. In an age where Social Media is one of the most influential modes of communication, we teach our clients how to build a robust brand across multiple Social Media platforms.', '', '', 'image'), ('15', 'services', '0', 'SERVICES', '', '', '', 'image'), ('16', 'blog', '0', 'LATEST BLOG', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Pellentesque vestibulum sapien non tincidunt', '', '', 'image'), ('17', 'contact_us', '0', 'CONTACT US', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.', '', '', 'image'), ('18', 'testimonials', '0', 'TESTIMONIALS', '', '', '', 'image'), ('19', 'portfolio', '0', 'PORTFOLIO', '', '', '', '');
COMMIT;

-- ----------------------------
--  Table structure for `page_categories`
-- ----------------------------
DROP TABLE IF EXISTS `page_categories`;
CREATE TABLE `page_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq` (`page_id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `page_elements`
-- ----------------------------
DROP TABLE IF EXISTS `page_elements`;
CREATE TABLE `page_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `subsection` text,
  `h1` text,
  `h2` text,
  `image` varchar(100) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `mediatype` char(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `page_elements`
-- ----------------------------
BEGIN;
INSERT INTO `page_elements` VALUES ('24', '15', '1', null, 'Media Relations and Coaching', 'Carter Media Group provides a platform for attorneys who want to increase their brand through media appearances through prepared press releases, media packages, and our extensive network to secure TV appearances for clients. \r\nCMG also provides media coaching to ensure TV appearances are optimized. A coaching session will last 2-hours and equips you with expert training for you and/or your partners to adequately prepare you for any media situation. ', null, null, '', null, 'fa-film', 'icon'), ('25', '15', '2', null, 'Digital Strategy', 'Carter Media Group helps lawyers engage with their clients online and through social media. Law firms do not have to advertise or \"sell\" all the time. Instead, social media (like its name implies) is a way to be social and network through an online platform. CMG helps businesses lose the stiff, salesman-like attitude and develop content that is casual, comfortable and tells a story about who the firm is and what they offer. \r\nTo develop the firm\'s story, Carter Media Group interviews past and current clients to hear in their words what they value and what they experienced when dealing with the business. Then we use this information to create social media content, draft content for the company\'s website, and prepare blog articles. \r\nTo track success, we offer reporting, data tracking, and analytics. ', null, null, '', null, 'fa-home', 'icon'), ('26', '15', '2', null, 'Crisis Management ', 'Any business can be the subject of a media storm, but specific industries are more likely to face a media issue at some point (e.g., law firms). CMG provides coaching and policies to ensure that everyone in the organization knows what should do in the event of a media crisis. Think of this as an insurance policy against future attacks. ', null, null, '', null, 'fa-camera', 'icon'), ('27', '18', '1', null, 'Stephen Hango', 'CEO, Sentel Inc', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\n\r\n', null, '1517775823.jpg', null, '', 'image'), ('28', '18', '2', null, 'Andrew Fixon', 'CEO, Elivo Inc.', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.', null, '1517775702.jpg', null, '', 'image'), ('29', '18', '3', null, 'Andrew Fixon', 'CEO, AmozoSoft Inc.', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.', null, '1517775773.png', null, '', 'image');
COMMIT;

-- ----------------------------
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `type` enum('product','service') DEFAULT 'product',
  `name` varchar(128) NOT NULL,
  `description` text,
  `price` varchar(32) NOT NULL,
  `image` varchar(128) NOT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `description` text,
  `status` enum('pending','active','fulfilled','cancelled') DEFAULT 'pending',
  `date_created` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
