/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2017-07-13 16:52:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `title` varchar(80) NOT NULL COMMENT '标题',
  `image` varchar(45) NOT NULL DEFAULT '' COMMENT '封面',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键词',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述',
  `author` varchar(45) NOT NULL DEFAULT '匿名者' COMMENT '作者',
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID-关联分类表',
  `read_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阅读量',
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论量',
  `praise_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞量',
  `is_recommend` tinyint(3) unsigned NOT NULL COMMENT '用户ID-与user表关联',
  `content` text COMMENT '文章内容',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建于',
  `updated_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新于',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示:1-默认显示,0-隐藏',
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', 'test_1', '', 'php10_1k', 'php10_1d', '匿名者', '1', '1', '0', '0', '0', 'php10_1c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('2', 'test_2', '', 'php10_2k', 'php10_2d', '匿名者', '1', '0', '0', '0', '1', 'php10_2c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('3', 'test_3', '', 'php10_3k', 'php10_3d', '匿名者', '1', '0', '0', '0', '0', 'php10_3c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('4', 'test_4', '', 'php10_4k', 'php10_4d', '匿名者', '1', '0', '0', '0', '0', 'php10_4c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('5', 'test_5', '', 'php10_5k', 'php10_5d', '匿名者', '2', '0', '0', '0', '0', 'php10_5c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('7', 'test_7', '', 'php10_7k', 'php10_7d', '匿名者', '4', '0', '0', '0', '0', 'php10_7c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('39', 'test_4', '', 'php10_4k', 'php10_4d', '匿名者', '1', '0', '0', '0', '0', 'php10_4c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('40', 'test_5', '', 'php10_5k', 'php10_5d', '匿名者', '2', '0', '0', '0', '0', 'php10_5c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('42', 'test_7', '', 'php10_7k', 'php10_7d', '匿名者', '4', '0', '0', '0', '0', 'php10_7c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('38', 'test_3', '', 'php10_3k', 'php10_3d', '匿名者', '1', '0', '0', '0', '0', 'php10_3c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('63', 'test_7', '', 'php10_7k', 'php10_7d', '匿名者', '4', '0', '0', '0', '0', 'php10_7c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('64', 'test_3', '', 'php10_3k', 'php10_3d', '匿名者', '1', '0', '0', '0', '0', 'php10_3c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('65', 'test_1', '', 'php10_1k', 'php10_1d', '匿名者', '1', '0', '0', '0', '0', 'php10_1c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('66', 'test_2', '', 'php10_2k', 'php10_2d', '匿名者', '1', '0', '0', '0', '1', 'php10_2c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('68', 'test_1', '', 'php10_1k', 'php10_1d', '匿名者', '1', '0', '0', '0', '0', 'php10_1c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('69', 'test_2', '', 'php10_2k', 'php10_2d', '匿名者', '1', '0', '0', '0', '1', 'php10_2c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('70', 'test_3', '', 'php10_3k', 'php10_3d', '匿名者', '1', '0', '0', '0', '0', 'php10_3c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('71', 'test_4', '', 'php10_4k', 'php10_4d', '匿名者', '1', '0', '0', '0', '0', 'php10_4c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('72', 'test_5', '', 'php10_5k', 'php10_5d', '匿名者', '2', '0', '0', '0', '0', 'php10_5c', '1493190120', '1493190120', '1', null);
INSERT INTO `article` VALUES ('74', 'test_7', '', 'php10_7k', 'php10_7d', '匿名者', '4', '0', '0', '0', '0', 'php10_7c', '1493190120', '1493190120', '1', null);

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级分类ID',
  `name` varchar(30) NOT NULL COMMENT '分类名称',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '100' COMMENT '分类排序',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建于',
  `updated_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新于',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示：1-显示，0-不显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '0', '编程', '1001', '0', '1497359523', '1');
INSERT INTO `category` VALUES ('2', '1', 'PHP', '100', '0', '0', '1');
INSERT INTO `category` VALUES ('4', '1', 'WEB前端', '100', '0', '1497359511', '1');
INSERT INTO `category` VALUES ('5', '0', '文章', '100', '0', '0', '1');
INSERT INTO `category` VALUES ('6', '5', '军事', '100', '0', '0', '1');
INSERT INTO `category` VALUES ('7', '5', '历史', '100', '0', '0', '1');
INSERT INTO `category` VALUES ('8', '5', '言情', '100', '0', '0', '1');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父评论-默认0表示顶级评论',
  `uid` int(10) unsigned NOT NULL COMMENT '用户ID-关联用户表',
  `aid` int(10) unsigned NOT NULL COMMENT '文章ID-关联文章表',
  `content` varchar(200) NOT NULL COMMENT '评论内容',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建于',
  `updated_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新于',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示：1-显示，0-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '0', '22', '20', 'aaaa', '1497757558', '1497757558', '1');
INSERT INTO `comment` VALUES ('2', '0', '22', '20', 'BBBB', '1497758730', '1497758730', '1');
INSERT INTO `comment` VALUES ('3', '0', '22', '20', 'ccc', '1497760859', '1497760859', '1');
INSERT INTO `comment` VALUES ('4', '3', '22', '20', 'ddd', '1497760963', '1497760963', '1');
INSERT INTO `comment` VALUES ('5', '1', '22', '20', 'AAAAAA', '1497761446', '1497761446', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `avatar` varchar(45) NOT NULL DEFAULT '' COMMENT '头像',
  `login_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '登录次数',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `login_ip` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录IP',
  `user_right` tinyint(4) NOT NULL DEFAULT '2' COMMENT '权限级别：0-超级管理员，1-管理员，2-用户',
  `display` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：1-默认显示,0-隐藏',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建于',
  `updated_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新于',
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '594288f87d060.png', '54', '1498213389', '2130706433', '0', '1', '0', '1498213390');
INSERT INTO `user` VALUES ('10', 'umi', 'e10adc3949ba59abbe56e057f20f883e', '59432c4cb3fcf.jpg', '1', '1497574476', '2130706433', '1', '1', '1497574476', '1497635440');
INSERT INTO `user` VALUES ('8', 'kotori', 'e10adc3949ba59abbe56e057f20f883e', '59432c12dad16.jpg', '1', '1497574418', '2130706433', '1', '1', '1497574418', '1497635429');
INSERT INTO `user` VALUES ('9', 'honoka', 'bfb6ff65c19bafb8e69c7e627bd684f4', '59432c3b3ba5f.jpg', '1', '1497574459', '2130706433', '1', '1', '1497574459', '1497635417');
INSERT INTO `user` VALUES ('11', 'eli', '0a57258559de00695ffb0f1d46bba388', '59432c5fdc04e.jpg', '1', '1497574495', '2130706433', '1', '1', '1497574495', '1497635406');
INSERT INTO `user` VALUES ('12', 'nozomi', 'e293c95c55822f1c10324f5a706612e5', '59432c74dfd6e.jpg', '1', '1497574516', '2130706433', '1', '1', '1497574516', '1497635400');
INSERT INTO `user` VALUES ('13', 'nico', '410ec15153a6dff0bed851467309bcbd', '59432c89028c7.jpg', '1', '1497574537', '2130706433', '1', '1', '1497574537', '1497635389');
INSERT INTO `user` VALUES ('14', 'maki', '9b5bd5c86c722ebf5f5426ca97684933', '59432ca6f1b8f.jpg', '1', '1497574566', '2130706433', '1', '1', '1497574566', '1497635379');
INSERT INTO `user` VALUES ('15', 'rin', 'dda9d52e8e58a3dc6f54daba1cc2ccb8', '59432cb76e9a8.jpg', '2', '1497707883', '2130706433', '1', '1', '1497574583', '1497707884');
INSERT INTO `user` VALUES ('16', 'hanayo', '3ca07508a93ce268e9c4d00504e7957b', '59432cd51a618.jpg', '1', '1497574613', '2130706433', '1', '1', '1497574613', '1497635336');
INSERT INTO `user` VALUES ('20', 'anjyu', '670b14728ad9902aecba32e22fa4f6bd', '5944140558256.jpg', '1', '1497633797', '2130706433', '2', '1', '1497633797', '1497633797');
INSERT INTO `user` VALUES ('21', 'erena', '670b14728ad9902aecba32e22fa4f6bd', '5944141ba6c53.jpg', '1', '1497633819', '2130706433', '2', '1', '1497633819', '1497633819');
INSERT INTO `user` VALUES ('22', 'tsubasa', '670b14728ad9902aecba32e22fa4f6bd', '59441433ad9f9.jpg', '3', '1497754444', '2130706433', '2', '1', '1497633843', '1497754445');
