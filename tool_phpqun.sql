/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : tool_phpqun

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-10-20 14:44:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for site_admin
-- ----------------------------
DROP TABLE IF EXISTS `site_admin`;
CREATE TABLE `site_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intro` text NOT NULL,
  `uname` varchar(50) NOT NULL DEFAULT '',
  `pwd` varchar(32) NOT NULL DEFAULT '',
  `utype` int(10) unsigned NOT NULL DEFAULT '0',
  `pubdate` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '0.0.0.0',
  `last_login_place` varchar(30) NOT NULL DEFAULT '',
  `login_number` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_admin
-- ----------------------------
INSERT INTO `site_admin` VALUES ('60', '张文良', 'zwl', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '0', '0.0.0.0', '', '0');

-- ----------------------------
-- Table structure for site_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `site_admin_menu`;
CREATE TABLE `site_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `group_id` char(50) DEFAULT '' COMMENT '分组',
  `icon` varchar(255) DEFAULT '' COMMENT '图标',
  `url` varchar(50) DEFAULT '' COMMENT '链接',
  `name` varchar(50) DEFAULT '' COMMENT '名称',
  `pid` int(10) DEFAULT '0' COMMENT '上级分类ID',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_admin_menu
-- ----------------------------
INSERT INTO `site_admin_menu` VALUES ('1', '11', '', '#', '后台菜单', '0', '1411022577', '1411028878');
INSERT INTO `site_admin_menu` VALUES ('2', '11', '', '/admin/admin_menu_group', '菜单分组', '1', '1411022992', '1411028705');
INSERT INTO `site_admin_menu` VALUES ('3', '11', '', '/admin/admin_menu', '后台菜单', '1', '1411023128', '1411028064');
INSERT INTO `site_admin_menu` VALUES ('4', '11', '', '#', '模型管理', '0', '1411025067', '1411029473');
INSERT INTO `site_admin_menu` VALUES ('5', '11', '', '/admin/table', '模型管理', '4', '1411025081', '1411025089');
INSERT INTO `site_admin_menu` VALUES ('14', '11', '', '/admin/user', '用户管理', '4', '1413775733', '0');
INSERT INTO `site_admin_menu` VALUES ('15', '10', '', '#', '内容管理', '0', '1413775771', '0');
INSERT INTO `site_admin_menu` VALUES ('16', '10', '', '/admin/category', '分类管理', '15', '1413775791', '0');
INSERT INTO `site_admin_menu` VALUES ('17', '10', '', '/admin/article', '文章管理', '15', '1413775810', '0');

-- ----------------------------
-- Table structure for site_admin_menu_group
-- ----------------------------
DROP TABLE IF EXISTS `site_admin_menu_group`;
CREATE TABLE `site_admin_menu_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `icon` varchar(255) DEFAULT '' COMMENT '图标',
  `name` varchar(50) DEFAULT '' COMMENT '名称',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_admin_menu_group
-- ----------------------------
INSERT INTO `site_admin_menu_group` VALUES ('10', '8', '', '内容管理', '1411028030', '1413775830');
INSERT INTO `site_admin_menu_group` VALUES ('11', '9', '', '系统管理', '1411028091', '1411028948');

-- ----------------------------
-- Table structure for site_article
-- ----------------------------
DROP TABLE IF EXISTS `site_article`;
CREATE TABLE `site_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `category_id` char(50) DEFAULT '' COMMENT '所属分类',
  `is_top` tinyint(2) DEFAULT '0' COMMENT '是否推荐',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `content` text COMMENT '内容',
  `title` varchar(50) DEFAULT '' COMMENT '标题',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_article
-- ----------------------------
INSERT INTO `site_article` VALUES ('1', '2', '1', '0', '我喜欢你.<img src=\"/uplode/images/2014_10/20/544482386077e.jpg\" alt=\"\" />', '我喜欢你.', '1413775935', '0');

-- ----------------------------
-- Table structure for site_category
-- ----------------------------
DROP TABLE IF EXISTS `site_category`;
CREATE TABLE `site_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `name` varchar(50) DEFAULT '' COMMENT '名称',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `pid` int(10) DEFAULT '0' COMMENT '上级分类ID',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_category
-- ----------------------------
INSERT INTO `site_category` VALUES ('1', '', '新闻', '0', '0', '1413775845', '0');
INSERT INTO `site_category` VALUES ('2', '', '中国新闻', '0', '1', '1413775857', '0');
INSERT INTO `site_category` VALUES ('3', '', '国际新闻', '0', '1', '1413775868', '0');

-- ----------------------------
-- Table structure for site_field
-- ----------------------------
DROP TABLE IF EXISTS `site_field`;
CREATE TABLE `site_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_id` int(11) DEFAULT '0' COMMENT '表ID',
  `title` varchar(50) DEFAULT '' COMMENT '名称',
  `name` varchar(50) DEFAULT '' COMMENT '标识',
  `type` tinyint(6) DEFAULT '0' COMMENT '类型',
  `define` varchar(30) DEFAULT '' COMMENT '定义',
  `para` varchar(100) DEFAULT '' COMMENT '参数',
  `default` varchar(100) DEFAULT '' COMMENT '默认值',
  `description` varchar(100) DEFAULT '' COMMENT '描述',
  `show_type` tinyint(4) DEFAULT '0' COMMENT '显示类型',
  `check_type` tinyint(6) DEFAULT '0' COMMENT '检验类型',
  `check_rule` varchar(30) DEFAULT '' COMMENT '检验规则',
  `check_msg` varchar(50) DEFAULT '' COMMENT '检验消息',
  `check_time` tinyint(4) DEFAULT '0' COMMENT '检验时间',
  `default_type` tinyint(6) DEFAULT '0' COMMENT '自动填充类型',
  `default_rule` varchar(30) DEFAULT '' COMMENT '自动填充规则',
  `default_time` tinyint(4) DEFAULT '0' COMMENT '自动填充时间',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_field
-- ----------------------------
INSERT INTO `site_field` VALUES ('3', '2', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411022161', '0');
INSERT INTO `site_field` VALUES ('4', '2', '图标', 'icon', '9', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1411022172', '0');
INSERT INTO `site_field` VALUES ('5', '3', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411022388', '0');
INSERT INTO `site_field` VALUES ('6', '3', '链接', 'url', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411022420', '0');
INSERT INTO `site_field` VALUES ('7', '3', '图标', 'icon', '9', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1411022434', '0');
INSERT INTO `site_field` VALUES ('8', '3', '分组', 'group_id', '5', 'char(50)', '{\"type\":\"1\",\"table\":\"AdminMenuGroup\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1411022477', '0');
INSERT INTO `site_field` VALUES ('9', '2', '排序', 'order', '0', 'int(11)', '', '0', '', '0', '0', '', '', '0', '0', '', '1', '1411022522', '0');
INSERT INTO `site_field` VALUES ('10', '4', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411025590', '0');
INSERT INTO `site_field` VALUES ('11', '4', '认证串', 'token', '1', 'varchar(50)', '', '', '', '3', '0', '', '', '0', '0', '', '1', '1411029823', '0');
INSERT INTO `site_field` VALUES ('12', '4', '开通版本', 'type', '5', 'char(50)', '{\"type\":\"0\",\"data\":\"0:手机版\\n1:电脑版\\n2:手机+电脑版\"}', '0', '', '0', '0', '', '', '0', '0', '', '1', '1411029975', '0');
INSERT INTO `site_field` VALUES ('13', '5', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411030171', '0');
INSERT INTO `site_field` VALUES ('14', '5', '价格', 'price', '0', 'int(11)', '', '0', '', '0', '0', '', '', '0', '0', '', '1', '1411030190', '0');
INSERT INTO `site_field` VALUES ('15', '5', '描述', 'remark', '2', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1411030207', '0');
INSERT INTO `site_field` VALUES ('16', '6', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411030297', '0');
INSERT INTO `site_field` VALUES ('17', '6', '价格', 'price', '0', 'int(11)', '', '0', '', '0', '0', '', '', '0', '0', '', '1', '1411030335', '0');
INSERT INTO `site_field` VALUES ('18', '6', '描述', 'remark', '2', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1411030348', '0');
INSERT INTO `site_field` VALUES ('19', '5', '功能模块', 'module_id', '7', 'varchar(100)', '{\"type\":\"1\",\"table\":\"SiteModule\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1411030437', '0');
INSERT INTO `site_field` VALUES ('20', '4', '套餐', 'combo_id', '5', 'char(50)', '{\"type\":\"1\",\"table\":\"ConfigSiteCombo\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1411030510', '1413275122');
INSERT INTO `site_field` VALUES ('21', '4', '描述', 'remark', '2', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1411030533', '0');
INSERT INTO `site_field` VALUES ('22', '7', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411031226', '0');
INSERT INTO `site_field` VALUES ('24', '7', '分栏比例', 'column', '1', 'varchar(50)', '', '50:50', '比如两栏50:50,比如三栏33:33:34,一栏100', '0', '0', '', '', '0', '0', '', '1', '1411031675', '0');
INSERT INTO `site_field` VALUES ('25', '7', '图标', 'icon', '9', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1411031799', '0');
INSERT INTO `site_field` VALUES ('26', '7', '描述', 'remark', '2', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1411032238', '0');
INSERT INTO `site_field` VALUES ('27', '8', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1411087476', '0');
INSERT INTO `site_field` VALUES ('28', '11', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413270415', '0');
INSERT INTO `site_field` VALUES ('29', '11', '网站编号', 'site_id', '5', 'char(50)', '{\"type\":\"1\",\"table\":\"Site\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413270896', '1413270955');
INSERT INTO `site_field` VALUES ('31', '20', '所属页面', 'page_id', '5', 'char(50)', '{\"type\":\"1\",\"table\":\"Page\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413278250', '0');
INSERT INTO `site_field` VALUES ('33', '19', '所属页面', 'page_id', '5', 'char(50)', '{\"type\":\"1\",\"table\":\"Page\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413278456', '0');
INSERT INTO `site_field` VALUES ('34', '19', '所属布局', 'layout_id', '5', 'char(50)', '{\"type\":\"1\",\"table\":\"Layout\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413278503', '0');
INSERT INTO `site_field` VALUES ('35', '19', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413278530', '0');
INSERT INTO `site_field` VALUES ('36', '20', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413278576', '0');
INSERT INTO `site_field` VALUES ('37', '11', '标题', 'title', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413278866', '0');
INSERT INTO `site_field` VALUES ('38', '11', '描述', 'description', '2', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413278885', '0');
INSERT INTO `site_field` VALUES ('39', '11', 'css', 'css', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413279333', '1413294185');
INSERT INTO `site_field` VALUES ('40', '11', 'js', 'js', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413279587', '1413294193');
INSERT INTO `site_field` VALUES ('41', '14', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413280413', '0');
INSERT INTO `site_field` VALUES ('42', '14', '价格', 'price', '0', 'int(11)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413280492', '0');
INSERT INTO `site_field` VALUES ('43', '14', '包含模块', 'combo_list', '7', 'varchar(100)', '{\"type\":\"1\",\"table\":\"ConfigSiteModule\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413280604', '1413293975');
INSERT INTO `site_field` VALUES ('44', '15', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413280636', '0');
INSERT INTO `site_field` VALUES ('45', '15', '描述', 'description', '2', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413280942', '0');
INSERT INTO `site_field` VALUES ('46', '16', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413281004', '0');
INSERT INTO `site_field` VALUES ('47', '16', '比例', 'ratio', '1', 'varchar(50)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281082', '0');
INSERT INTO `site_field` VALUES ('48', '16', 'html', 'html', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281109', '1413294107');
INSERT INTO `site_field` VALUES ('49', '16', 'css', 'css', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281157', '1413294115');
INSERT INTO `site_field` VALUES ('50', '16', 'js', 'js', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281169', '1413294122');
INSERT INTO `site_field` VALUES ('51', '17', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413281234', '0');
INSERT INTO `site_field` VALUES ('52', '17', 'html', 'html', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281252', '1413294142');
INSERT INTO `site_field` VALUES ('53', '17', 'js', 'js', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281272', '1413294149');
INSERT INTO `site_field` VALUES ('54', '17', 'css', 'css', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281293', '1413294156');
INSERT INTO `site_field` VALUES ('55', '19', 'html', 'html', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281442', '1413294218');
INSERT INTO `site_field` VALUES ('56', '19', 'js', 'js', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281456', '1413294225');
INSERT INTO `site_field` VALUES ('57', '19', 'css', 'css', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281466', '1413294233');
INSERT INTO `site_field` VALUES ('58', '20', 'html', 'html', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281578', '1413294248');
INSERT INTO `site_field` VALUES ('59', '20', 'js', 'js', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281591', '1413294255');
INSERT INTO `site_field` VALUES ('60', '20', 'css', 'css', '2', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413281604', '1413294262');
INSERT INTO `site_field` VALUES ('62', '26', '用户名', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413775131', '0');
INSERT INTO `site_field` VALUES ('63', '26', '密码', 'password', '1', 'varchar(50)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775150', '0');
INSERT INTO `site_field` VALUES ('64', '26', '性别', 'sex', '4', 'tinyint(2)', '{\"type\":\"0\",\"data\":\"0:女\\n1:男\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775195', '0');
INSERT INTO `site_field` VALUES ('65', '26', '爱好', 'like', '5', 'char(50)', '{\"type\":\"0\",\"data\":\"0:下棋\\n1:弹琴\\n2:书法\\n3:绘画\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775296', '0');
INSERT INTO `site_field` VALUES ('67', '27', '排序', 'order', '0', 'int(11)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775377', '0');
INSERT INTO `site_field` VALUES ('68', '27', '名称', 'name', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413775419', '0');
INSERT INTO `site_field` VALUES ('69', '27', '备注', 'remark', '2', 'varchar(255)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775445', '0');
INSERT INTO `site_field` VALUES ('70', '28', '标题', 'title', '1', 'varchar(50)', '', '', '', '0', '1', '', '', '0', '0', '', '1', '1413775529', '0');
INSERT INTO `site_field` VALUES ('71', '28', '内容', 'content', '8', 'text', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775548', '0');
INSERT INTO `site_field` VALUES ('72', '28', '排序', 'order', '0', 'int(11)', '', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775560', '0');
INSERT INTO `site_field` VALUES ('73', '28', '是否推荐', 'is_top', '4', 'tinyint(2)', '{\"type\":\"0\",\"data\":\"0:否\\n1:是\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775586', '0');
INSERT INTO `site_field` VALUES ('74', '28', '所属分类', 'category_id', '5', 'char(50)', '{\"type\":\"1\",\"table\":\"Category\",\"key\":\"id\",\"value\":\"name\"}', '', '', '0', '0', '', '', '0', '0', '', '1', '1413775617', '0');

-- ----------------------------
-- Table structure for site_table
-- ----------------------------
DROP TABLE IF EXISTS `site_table`;
CREATE TABLE `site_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT '0' COMMENT '项目ID',
  `title` varchar(50) DEFAULT '' COMMENT '名称',
  `name` varchar(30) DEFAULT '' COMMENT '标识',
  `description` varchar(100) DEFAULT '' COMMENT '描述',
  `type` tinyint(4) DEFAULT '0' COMMENT '类型',
  `group` varchar(100) DEFAULT '' COMMENT '分组',
  `field_sort` varchar(200) DEFAULT '' COMMENT '字段排序',
  `list` varchar(100) DEFAULT '' COMMENT '字段列表',
  `bsearch` varchar(100) DEFAULT '' COMMENT '字段基本搜索',
  `asearch` varchar(100) DEFAULT '' COMMENT '字段高级搜索',
  `is_active` tinyint(4) DEFAULT '0' COMMENT '是否有效',
  `custom_before_insert` text COMMENT '自定义增加代码',
  `custom_before_update` text COMMENT '自定义更新代码',
  `custom_before_delete` text COMMENT '自定义删除代码',
  `custom_after_insert` text COMMENT '自定义增加代码',
  `custom_after_update` text COMMENT '自定义更新代码',
  `custom_after_delete` text COMMENT '自定义删除代码',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_table
-- ----------------------------
INSERT INTO `site_table` VALUES ('2', '0', '后台菜单分组', 'admin_menu_group', '', '0', '', '[[\"3\",\"4\",\"9\"]]', 'name:名称\r\norder:排序', '', '', '0', '', '', '', '', '', 'D(\"AdminMenu\")->where(\"group_id = {$id}\")->deleteAdminMenu();\r\n', '1411022138', '0');
INSERT INTO `site_table` VALUES ('3', '0', '后台菜单', 'admin_menu', '', '1', '', '[[\"5\",\"8\",\"6\",\"7\"]]', 'name:名称\r\ngroup_id:分组\r\nurl:链接', '', '', '0', '', '', '', '', 'if (isset($data[\"group_id\"])){\r\n	$group_id = $data[\"group_id\"];\r\n	$id = $data[\"id\"];\r\n	D(\"AdminMenu\")->where(\"pid = \'{$id}\'\")->setField(\"group_id\",$group_id);\r\n}\r\n', '', '1411022268', '0');
INSERT INTO `site_table` VALUES ('26', '0', '用户', 'user', '', '0', '', '[[\"62\",\"63\",\"64\",\"65\"]]', 'name:姓名', 'name:姓名', '', '0', '', '', '', '', '', '', '1413775093', '0');
INSERT INTO `site_table` VALUES ('27', '0', '分类', 'category', '', '1', '', '[[\"68\",\"67\",\"69\"]]', 'name:名称', 'name:名称', '', '0', '', '', '', '', '', '', '1413775330', '0');
INSERT INTO `site_table` VALUES ('28', '0', '文章', 'article', '', '0', '', '[[\"70\",\"74\",\"71\",\"72\",\"73\"]]', 'title:标题', 'title:标题', '', '0', '', '', '', '', '', '', '1413775486', '0');

-- ----------------------------
-- Table structure for site_user
-- ----------------------------
DROP TABLE IF EXISTS `site_user`;
CREATE TABLE `site_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `like` char(50) DEFAULT '' COMMENT '爱好',
  `sex` tinyint(2) DEFAULT '0' COMMENT '性别',
  `password` varchar(50) DEFAULT '' COMMENT '密码',
  `name` varchar(50) DEFAULT '' COMMENT '用户名',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_user
-- ----------------------------
