/*
Navicat MySQL Data Transfer

Source Server         : phpConnection
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : rsd

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2018-05-21 14:38:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `realname` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `login_count` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin', '8', '1', '2017-03-03 06:37:43', '2018-05-02 09:16:50', '8');

-- ----------------------------
-- Table structure for admin_advanced
-- ----------------------------
DROP TABLE IF EXISTS `admin_advanced`;
CREATE TABLE `admin_advanced` (
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `advanced_id` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_advanced
-- ----------------------------

-- ----------------------------
-- Table structure for admin_login
-- ----------------------------
DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE `admin_login` (
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `login_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `login_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_login
-- ----------------------------
INSERT INTO `admin_login` VALUES ('1', '2018-01-25 17:01:05', '::1');
INSERT INTO `admin_login` VALUES ('1', '2018-01-25 18:01:15', '::1');
INSERT INTO `admin_login` VALUES ('1', '2018-01-26 17:01:30', '::1');
INSERT INTO `admin_login` VALUES ('1', '2018-05-02 09:05:26', '::1');

-- ----------------------------
-- Table structure for admin_popedom
-- ----------------------------
DROP TABLE IF EXISTS `admin_popedom`;
CREATE TABLE `admin_popedom` (
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_popedom
-- ----------------------------
INSERT INTO `admin_popedom` VALUES ('1', '101101');

-- ----------------------------
-- Table structure for advanced
-- ----------------------------
DROP TABLE IF EXISTS `advanced`;
CREATE TABLE `advanced` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `sortnum` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `default_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of advanced
-- ----------------------------
INSERT INTO `advanced` VALUES ('2', '20', '广告管理', 'adver_list.php', '2');
INSERT INTO `advanced` VALUES ('4', '40', '联系我们', 'contact_list.php', '2');
INSERT INTO `advanced` VALUES ('5', '50', '联系留言', 'contact_msg_list.php', '2');
INSERT INTO `advanced` VALUES ('6', '60', '在线留言', 'message_list.php', '2');
INSERT INTO `advanced` VALUES ('8', '80', '链接分类管理', 'link_class_list.php', '2');
INSERT INTO `advanced` VALUES ('9', '90', '链接管理', 'link_list.php', '2');
INSERT INTO `advanced` VALUES ('10', '100', 'Banner分类管理', 'banner_class_list.php', '2');
INSERT INTO `advanced` VALUES ('11', '110', 'Banner管理', 'banner_list.php', '1');
INSERT INTO `advanced` VALUES ('12', '120', '人才招聘', 'job_list.php', '2');
INSERT INTO `advanced` VALUES ('13', '130', '应聘信息', 'job_apply_list.php', '2');
INSERT INTO `advanced` VALUES ('18', '180', '会员管理', 'member_list.php', '2');
INSERT INTO `advanced` VALUES ('19', '190', '信息批量操作', 'info_multi.php', '2');
INSERT INTO `advanced` VALUES ('20', '200', '图片批量上传', 'manage_batch_form.php', '1');
INSERT INTO `advanced` VALUES ('21', '210', '栏目分类管理', 'catalog_class_list.php', '2');
INSERT INTO `advanced` VALUES ('22', '220', '栏目分类', 'catalog_list.php', '2');
INSERT INTO `advanced` VALUES ('23', '230', '订单管理', 'cart_list.php', '2');
INSERT INTO `advanced` VALUES ('24', '240', '访问统计', 'counter_list.php', '2');

-- ----------------------------
-- Table structure for adver
-- ----------------------------
DROP TABLE IF EXISTS `adver`;
CREATE TABLE `adver` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mode` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of adver
-- ----------------------------

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `pic` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `state` int(10) NOT NULL,
  `content` text CHARACTER SET utf8,
  `pic1` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', '1', '10', '八大服务支持', '', '2018-05/152687526743838400.jpg', '640', '330', '1', '', '');
INSERT INTO `banner` VALUES ('2', '2', '10', '荣事达地板', '', '2018-05/152687529534238400.png', '213', '43', '1', '', '');
INSERT INTO `banner` VALUES ('3', '3', '10', '源自大品牌 自主新专利', '', '2018-05/152687531598933200.jpg', '640', '628', '1', '', '');
INSERT INTO `banner` VALUES ('4', '4', '10', '你开店 我送车', '', '2018-05/152687533913023300.jpg', '640', '240', '1', '', '');

-- ----------------------------
-- Table structure for banner_class
-- ----------------------------
DROP TABLE IF EXISTS `banner_class`;
CREATE TABLE `banner_class` (
  `id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `add_deny` int(10) NOT NULL,
  `delete_deny` int(10) NOT NULL,
  `hasPic1` int(10) NOT NULL,
  `hasCon` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of banner_class
-- ----------------------------
INSERT INTO `banner_class` VALUES ('1', '10', '首页-BANNER', '0', '0', '0', '0');
INSERT INTO `banner_class` VALUES ('2', '20', 'LOGO', '0', '0', '0', '0');
INSERT INTO `banner_class` VALUES ('3', '30', '首页-源自大品牌 自主新专利', '0', '0', '0', '0');
INSERT INTO `banner_class` VALUES ('4', '40', '首页-荣誉展示上方图', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for catalog
-- ----------------------------
DROP TABLE IF EXISTS `catalog`;
CREATE TABLE `catalog` (
  `id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `state` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of catalog
-- ----------------------------

-- ----------------------------
-- Table structure for catalog_class
-- ----------------------------
DROP TABLE IF EXISTS `catalog_class`;
CREATE TABLE `catalog_class` (
  `id` int(10) NOT NULL,
  `sortnum` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `add_deny` int(10) NOT NULL,
  `delete_deny` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of catalog_class
-- ----------------------------
INSERT INTO `catalog_class` VALUES ('1', '10', '风格', '0', '0');

-- ----------------------------
-- Table structure for config_base
-- ----------------------------
DROP TABLE IF EXISTS `config_base`;
CREATE TABLE `config_base` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icp` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keyword` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` text COLLATE utf8_unicode_ci,
  `copyright` text COLLATE utf8_unicode_ci,
  `webcopyright` text COLLATE utf8_unicode_ci,
  `javascriptFoot` text COLLATE utf8_unicode_ci,
  `javascriptHead` text COLLATE utf8_unicode_ci,
  `webJavascriptHead` text COLLATE utf8_unicode_ci,
  `webJavascriptFoot` text COLLATE utf8_unicode_ci,
  `hotline` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8_unicode_ci,
  `rightButton` int(1) DEFAULT '0',
  `mobilejump` int(1) DEFAULT '1',
  `watermark` tinyint(1) DEFAULT '0',
  `waterpic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waterpos` int(10) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of config_base
-- ----------------------------
INSERT INTO `config_base` VALUES ('1', '荣事达地板', '荣事达地板', '皖ICP备14017533', '荣事达地板', '荣事达地板', '', '<p>版权所有：荣事达地板有限公司 <a href=\"http://www.miitbeian.gov.cn/\" target=\"_blank\">皖ICP备14017533</a> 网站设计制作：<a href=\"http://www.ibw.cn\" target=\"_blank\">网新科技www.ibw.cn)</a></p>\r\n<p>陶经理：18756509549 服务热线：0551-69015866 QQ：3141239725</p>\r\n<p>地址：合肥市双凤开发区荣事达第六工业园（凤麟路45号）</p>', '', '', '', '', '', '0551-69015866', '18756509549', '', '0', '0', '0', '', '0');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sortnum` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `showForm` int(1) NOT NULL DEFAULT '0',
  `state` int(1) NOT NULL DEFAULT '0',
  `map` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for contact_msg
-- ----------------------------
DROP TABLE IF EXISTS `contact_msg`;
CREATE TABLE `contact_msg` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sortnum` int(10) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `content` text,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact_msg
-- ----------------------------

-- ----------------------------
-- Table structure for hit_counter
-- ----------------------------
DROP TABLE IF EXISTS `hit_counter`;
CREATE TABLE `hit_counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `page` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hit_counter
-- ----------------------------

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `sortnum` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8_unicode_ci,
  `pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annex` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `content2` text COLLATE utf8_unicode_ci,
  `content3` text COLLATE utf8_unicode_ci,
  `content4` text COLLATE utf8_unicode_ci,
  `content5` text COLLATE utf8_unicode_ci,
  `content6` text COLLATE utf8_unicode_ci,
  `webcontent` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` date NOT NULL DEFAULT '0000-00-00',
  `modify_time` date NOT NULL DEFAULT '0000-00-00',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `price` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '参考价格',
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '热点标识',
  `actual` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '实际价格',
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES ('1', '10', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达', '0', '101101', '', '', '', '2018-05/152688342114935100.jpg', null, '', '', '', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达...', '', '', '', '', '', '', '', '0', '2018-05-21', '2018-05-21', '1', '', '', '0', '');
INSERT INTO `info` VALUES ('2', '20', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达', '0', '101101', '', '', '', '2018-05/152688341478192800.jpg', null, '', '', '', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达...', '', '', '', '', '', '', '', '0', '2018-05-21', '2018-05-21', '1', '', '', '0', '');
INSERT INTO `info` VALUES ('3', '30', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达', '0', '101101', '', '', '', '2018-05/152688340997930700.jpg', null, '', '', '', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达...', '', '', '', '', '', '', '', '0', '2018-05-21', '2018-05-21', '1', '', '', '0', '');
INSERT INTO `info` VALUES ('4', '40', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达', '0', '101101', '', '', '', '2018-05/152688340528210600.jpg', null, '', '', '', '荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达地板荣事达...', '', '', '', '', '', '', '', '41', '2018-05-21', '2018-05-21', '1', '', '', '0', '');

-- ----------------------------
-- Table structure for info_class
-- ----------------------------
DROP TABLE IF EXISTS `info_class`;
CREATE TABLE `info_class` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sortnum` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `info_state` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `max_level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `has_sub` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sub_content` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sub_pic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasViews` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasState` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasPic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasAnnex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasIntro` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasContent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasWebsite` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasAuthor` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasSource` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasKeyword` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hasPics` tinyint(1) unsigned DEFAULT '0',
  `hasPic2` tinyint(1) unsigned DEFAULT '0',
  `hasContent2` tinyint(1) unsigned DEFAULT '0',
  `hasContent3` tinyint(1) unsigned DEFAULT '0',
  `hasContent4` tinyint(1) unsigned DEFAULT '0',
  `hasContent5` tinyint(1) unsigned DEFAULT '0',
  `hasContent6` tinyint(1) unsigned DEFAULT '0',
  `en_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hasDescription` tinyint(1) NOT NULL DEFAULT '0',
  `keyword` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sortnum` (`sortnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of info_class
-- ----------------------------
INSERT INTO `info_class` VALUES ('101', '10', '公司介绍', '', '', '', 'custom', '3', '1', '0', '0', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', null, '1', null, null);
INSERT INTO `info_class` VALUES ('101101', '10', '公司介绍', '', '', '', 'pic', '0', '0', '0', '0', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '', '1', '', '');
INSERT INTO `info_class` VALUES ('102', '20', '产品中心', '', '', '', 'custom', '3', '1', '0', '0', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', null, '1', null, null);
INSERT INTO `info_class` VALUES ('103', '30', '资讯动态', '', '', '', 'custom', '3', '1', '0', '0', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', null, '1', null, null);
INSERT INTO `info_class` VALUES ('104', '40', '开店合作', '', '', '', 'custom', '3', '1', '0', '0', '1', '1', '1', '1', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', null, '1', null, null);
INSERT INTO `info_class` VALUES ('105', '50', '项目优势', '', '', '', 'custom', '3', '1', '0', '0', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', null, '1', null, null);
INSERT INTO `info_class` VALUES ('106', '60', '开店案例', '', '', '', 'custom', '3', '1', '0', '0', '1', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', null, '0', null, null);

-- ----------------------------
-- Table structure for info_list
-- ----------------------------
DROP TABLE IF EXISTS `info_list`;
CREATE TABLE `info_list` (
  `id` int(10) NOT NULL,
  `sortnum` int(10) DEFAULT NULL,
  `infoid` int(10) DEFAULT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Source` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `pic` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of info_list
-- ----------------------------

-- ----------------------------
-- Table structure for job
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` int(10) unsigned NOT NULL,
  `sortnum` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `content` text,
  `showForm` tinyint(1) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `publishdate` varchar(200) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job
-- ----------------------------

-- ----------------------------
-- Table structure for job_apply
-- ----------------------------
DROP TABLE IF EXISTS `job_apply`;
CREATE TABLE `job_apply` (
  `id` int(10) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sortnum` int(10) NOT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `graduate_time` varchar(50) DEFAULT NULL,
  `college` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `resumes` text,
  `appraise` text,
  `create_time` varchar(50) NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_apply
-- ----------------------------

-- ----------------------------
-- Table structure for link
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `sortnum` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `state` int(10) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of link
-- ----------------------------

-- ----------------------------
-- Table structure for link_class
-- ----------------------------
DROP TABLE IF EXISTS `link_class`;
CREATE TABLE `link_class` (
  `id` int(10) NOT NULL,
  `sortnum` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `haspic` int(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of link_class
-- ----------------------------
INSERT INTO `link_class` VALUES ('1', '10', '友情链接', '1');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(10) unsigned NOT NULL,
  `sortnum` int(10) unsigned NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户名',
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机',
  `realname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地址',
  `sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '性别',
  `state` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `modify_time` datetime DEFAULT NULL,
  `login_count` int(10) NOT NULL DEFAULT '0',
  `login_time` datetime DEFAULT NULL,
  `login_ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `memberGrade` int(10) DEFAULT '1',
  `company` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member
-- ----------------------------

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortnum` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reply` text COLLATE utf8_unicode_ci,
  `reply_time` datetime DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `sex` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sj` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `qty` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `userid` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for order_list
-- ----------------------------
DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `cart_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `product_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(8) NOT NULL,
  `price` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_list
-- ----------------------------

-- ----------------------------
-- Table structure for record
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adminid` int(4) NOT NULL,
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of record
-- ----------------------------
