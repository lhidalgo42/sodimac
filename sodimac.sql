/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : sodimac

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-10-21 22:52:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_config
-- ----------------------------
DROP TABLE IF EXISTS `admin_config`;
CREATE TABLE `admin_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_config_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_config
-- ----------------------------

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '0', '1', 'Index', 'fa-bar-chart', '/', null, null);
INSERT INTO `admin_menu` VALUES ('2', '0', '2', 'Admin', 'fa-tasks', '', null, null);
INSERT INTO `admin_menu` VALUES ('3', '2', '3', 'Users', 'fa-users', 'auth/users', null, null);
INSERT INTO `admin_menu` VALUES ('4', '2', '4', 'Roles', 'fa-user', 'auth/roles', null, null);
INSERT INTO `admin_menu` VALUES ('5', '2', '5', 'Permission', 'fa-ban', 'auth/permissions', null, null);
INSERT INTO `admin_menu` VALUES ('6', '2', '6', 'Menu', 'fa-bars', 'auth/menu', null, null);
INSERT INTO `admin_menu` VALUES ('7', '2', '7', 'Operation log', 'fa-history', 'auth/logs', null, null);
INSERT INTO `admin_menu` VALUES ('8', '0', '13', 'Log viewer', 'fa-database', 'logs', '2018-10-14 00:30:58', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('9', '0', '14', 'Scheduling', 'fa-clock-o', 'scheduling', '2018-10-14 00:34:31', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('10', '0', '15', 'Config', 'fa-toggle-on', 'config', '2018-10-14 00:40:06', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('11', '0', '8', 'Helpers', 'fa-gears', '', '2018-10-14 00:42:54', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('12', '11', '9', 'Scaffold', 'fa-keyboard-o', 'helpers/scaffold', '2018-10-14 00:42:54', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('13', '11', '10', 'Database terminal', 'fa-database', 'helpers/terminal/database', '2018-10-14 00:42:54', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('14', '11', '11', 'Laravel artisan', 'fa-terminal', 'helpers/terminal/artisan', '2018-10-14 00:42:54', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('15', '11', '12', 'Routes', 'fa-list-alt', 'helpers/routes', '2018-10-14 00:42:54', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('16', '0', '16', 'Exception Reporter', 'fa-bug', 'exceptions', '2018-10-14 00:46:46', '2018-10-14 00:54:32');
INSERT INTO `admin_menu` VALUES ('17', '0', '17', 'Messages', 'fa-paper-plane', 'messages', '2018-10-14 01:10:15', '2018-10-14 01:10:15');

-- ----------------------------
-- Table structure for admin_messages
-- ----------------------------
DROP TABLE IF EXISTS `admin_messages`;
CREATE TABLE `admin_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_messages
-- ----------------------------

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES ('1', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 00:28:37', '2018-10-14 00:28:37');
INSERT INTO `admin_operation_log` VALUES ('2', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 00:31:03', '2018-10-14 00:31:03');
INSERT INTO `admin_operation_log` VALUES ('3', '1', 'admin/logs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:31:12', '2018-10-14 00:31:12');
INSERT INTO `admin_operation_log` VALUES ('4', '1', 'admin/auth/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:32:12', '2018-10-14 00:32:12');
INSERT INTO `admin_operation_log` VALUES ('5', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:35:30', '2018-10-14 00:35:30');
INSERT INTO `admin_operation_log` VALUES ('6', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 00:35:32', '2018-10-14 00:35:32');
INSERT INTO `admin_operation_log` VALUES ('7', '1', 'admin/scheduling', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:35:34', '2018-10-14 00:35:34');
INSERT INTO `admin_operation_log` VALUES ('8', '1', 'admin/scheduling', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:35:38', '2018-10-14 00:35:38');
INSERT INTO `admin_operation_log` VALUES ('9', '1', 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:35:43', '2018-10-14 00:35:43');
INSERT INTO `admin_operation_log` VALUES ('10', '1', 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:35:48', '2018-10-14 00:35:48');
INSERT INTO `admin_operation_log` VALUES ('11', '1', 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:35:53', '2018-10-14 00:35:53');
INSERT INTO `admin_operation_log` VALUES ('12', '1', 'admin/scheduling', 'GET', '127.0.0.1', '[]', '2018-10-14 00:36:15', '2018-10-14 00:36:15');
INSERT INTO `admin_operation_log` VALUES ('13', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:36:21', '2018-10-14 00:36:21');
INSERT INTO `admin_operation_log` VALUES ('14', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:36:35', '2018-10-14 00:36:35');
INSERT INTO `admin_operation_log` VALUES ('15', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 00:40:11', '2018-10-14 00:40:11');
INSERT INTO `admin_operation_log` VALUES ('16', '1', 'admin/config', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:40:12', '2018-10-14 00:40:12');
INSERT INTO `admin_operation_log` VALUES ('17', '1', 'admin/config/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:40:16', '2018-10-14 00:40:16');
INSERT INTO `admin_operation_log` VALUES ('18', '1', 'admin/config', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:40:23', '2018-10-14 00:40:23');
INSERT INTO `admin_operation_log` VALUES ('19', '1', 'admin/config', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:40:25', '2018-10-14 00:40:25');
INSERT INTO `admin_operation_log` VALUES ('20', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:40:29', '2018-10-14 00:40:29');
INSERT INTO `admin_operation_log` VALUES ('21', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 00:42:57', '2018-10-14 00:42:57');
INSERT INTO `admin_operation_log` VALUES ('22', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:43:01', '2018-10-14 00:43:01');
INSERT INTO `admin_operation_log` VALUES ('23', '1', 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:43:06', '2018-10-14 00:43:06');
INSERT INTO `admin_operation_log` VALUES ('24', '1', 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:43:07', '2018-10-14 00:43:07');
INSERT INTO `admin_operation_log` VALUES ('25', '1', 'admin/helpers/routes', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:43:25', '2018-10-14 00:43:25');
INSERT INTO `admin_operation_log` VALUES ('26', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:43:44', '2018-10-14 00:43:44');
INSERT INTO `admin_operation_log` VALUES ('27', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 00:47:56', '2018-10-14 00:47:56');
INSERT INTO `admin_operation_log` VALUES ('28', '1', 'admin/exceptions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:47:58', '2018-10-14 00:47:58');
INSERT INTO `admin_operation_log` VALUES ('29', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:48:06', '2018-10-14 00:48:06');
INSERT INTO `admin_operation_log` VALUES ('30', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:49:56', '2018-10-14 00:49:56');
INSERT INTO `admin_operation_log` VALUES ('31', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:50:04', '2018-10-14 00:50:04');
INSERT INTO `admin_operation_log` VALUES ('32', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:51:28', '2018-10-14 00:51:28');
INSERT INTO `admin_operation_log` VALUES ('33', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2018-10-14 00:54:19', '2018-10-14 00:54:19');
INSERT INTO `admin_operation_log` VALUES ('34', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"lPBcG2AXVtSIWKbHjvcN3rqLauC4To3CrnjuBBpp\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":11,\\\"children\\\":[{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":14},{\\\"id\\\":15}]},{\\\"id\\\":8},{\\\"id\\\":9},{\\\"id\\\":10},{\\\"id\\\":16}]\"}', '2018-10-14 00:54:32', '2018-10-14 00:54:32');
INSERT INTO `admin_operation_log` VALUES ('35', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:54:32', '2018-10-14 00:54:32');
INSERT INTO `admin_operation_log` VALUES ('36', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:54:34', '2018-10-14 00:54:34');
INSERT INTO `admin_operation_log` VALUES ('37', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:54:36', '2018-10-14 00:54:36');
INSERT INTO `admin_operation_log` VALUES ('38', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 00:54:39', '2018-10-14 00:54:39');
INSERT INTO `admin_operation_log` VALUES ('39', '1', 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:55:30', '2018-10-14 00:55:30');
INSERT INTO `admin_operation_log` VALUES ('40', '1', 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:55:42', '2018-10-14 00:55:42');
INSERT INTO `admin_operation_log` VALUES ('41', '1', 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:55:54', '2018-10-14 00:55:54');
INSERT INTO `admin_operation_log` VALUES ('42', '1', 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2018-10-14 00:58:27', '2018-10-14 00:58:27');
INSERT INTO `admin_operation_log` VALUES ('43', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 00:58:30', '2018-10-14 00:58:30');
INSERT INTO `admin_operation_log` VALUES ('44', '1', 'admin/exceptions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 01:04:19', '2018-10-14 01:04:19');
INSERT INTO `admin_operation_log` VALUES ('45', '1', 'admin/exceptions/3eed', 'GET', '127.0.0.1', '[]', '2018-10-14 01:04:24', '2018-10-14 01:04:24');
INSERT INTO `admin_operation_log` VALUES ('46', '1', 'admin', 'GET', '127.0.0.1', '[]', '2018-10-14 01:04:35', '2018-10-14 01:04:35');
INSERT INTO `admin_operation_log` VALUES ('47', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 01:06:03', '2018-10-14 01:06:03');
INSERT INTO `admin_operation_log` VALUES ('48', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2018-10-14 01:10:31', '2018-10-14 01:10:31');
INSERT INTO `admin_operation_log` VALUES ('49', '1', 'admin/messages', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 01:10:37', '2018-10-14 01:10:37');
INSERT INTO `admin_operation_log` VALUES ('50', '1', 'admin/messages/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 01:10:40', '2018-10-14 01:10:40');
INSERT INTO `admin_operation_log` VALUES ('51', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2018-10-14 02:04:16', '2018-10-14 02:04:16');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES ('1', 'All permission', '*', '', '*', null, null);
INSERT INTO `admin_permissions` VALUES ('2', 'Dashboard', 'dashboard', 'GET', '/', null, null);
INSERT INTO `admin_permissions` VALUES ('3', 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', null, null);
INSERT INTO `admin_permissions` VALUES ('4', 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', null, null);
INSERT INTO `admin_permissions` VALUES ('5', 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', null, null);
INSERT INTO `admin_permissions` VALUES ('6', 'Logs', 'ext.log-viewer', null, '/logs*', '2018-10-14 00:30:58', '2018-10-14 00:30:58');
INSERT INTO `admin_permissions` VALUES ('7', 'Scheduling', 'ext.scheduling', null, '/scheduling*', '2018-10-14 00:34:31', '2018-10-14 00:34:31');
INSERT INTO `admin_permissions` VALUES ('8', 'Admin Config', 'ext.config', null, '/config*', '2018-10-14 00:40:06', '2018-10-14 00:40:06');
INSERT INTO `admin_permissions` VALUES ('9', 'Admin helpers', 'ext.helpers', null, '/helpers/*', '2018-10-14 00:42:54', '2018-10-14 00:42:54');
INSERT INTO `admin_permissions` VALUES ('10', 'Exceptions reporter', 'ext.reporter', null, '/exceptions*', '2018-10-14 00:46:46', '2018-10-14 00:46:46');
INSERT INTO `admin_permissions` VALUES ('11', 'Admin messages', 'ext.messages', null, '/messages*', '2018-10-14 01:10:15', '2018-10-14 01:10:15');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES ('1', '2', null, null);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', 'Administrator', 'administrator', '2018-10-14 00:28:06', '2018-10-14 00:28:06');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_user_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$hmf6x1Ga2AD8wdTnjCJ1XuMxFjxRk9j8SA1QMQGW/0LOeVDcGrD7C', 'Administrator', null, null, '2018-10-14 00:28:06', '2018-10-14 00:28:06');

-- ----------------------------
-- Table structure for laravel_exceptions
-- ----------------------------
DROP TABLE IF EXISTS `laravel_exceptions`;
CREATE TABLE `laravel_exceptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `trace` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookies` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of laravel_exceptions
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_01_04_173148_create_admin_tables', '2');
INSERT INTO `migrations` VALUES ('4', '2017_07_17_040159_create_config_table', '3');
INSERT INTO `migrations` VALUES ('5', '2017_07_17_040159_create_exceptions_table', '4');
INSERT INTO `migrations` VALUES ('6', '2017_07_17_040159_create_messages_table', '5');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Leonardo Alonso Hidalgo Sepulveda', 'lhidalgosep@gmail.com', null, '$2y$10$YTkllaajcZaj2bb2l.IQC.KdVLa1EJ.0t00odDOVVGTIarFSAYTlq', null, '2018-10-14 00:27:17', '2018-10-14 00:27:17');
