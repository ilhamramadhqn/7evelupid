/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : smkn.app

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 12/02/2022 07:19:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subject_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `causer_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uri_access` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `activity_log_log_name_index`(`log_name`) USING BTREE,
  INDEX `subject`(`subject_id`, `subject_type`) USING BTREE,
  INDEX `causer`(`causer_id`, `causer_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (10, 'default', 'updated', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":14,\"nama_menu\":\"9\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"F\",\"uri\":\"3233asd\",\"icon\":\"<i class=\'feather icon-tv\'><\\/i>\"},\"old\":{\"id\":14,\"nama_menu\":\"9\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"F\",\"uri\":\"3233asd6\",\"icon\":\"<i class=\'feather icon-tv\'><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu/14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 11:47:11', '2020-05-15 11:47:11');
INSERT INTO `activity_log` VALUES (11, 'default', 'updated', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":14,\"nama_menu\":\"9\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"F\",\"uri\":\"3233asds\",\"icon\":\"<i class=\'feather icon-tv\'><\\/i>\"},\"old\":{\"id\":14,\"nama_menu\":\"9\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"F\",\"uri\":\"3233asd\",\"icon\":\"<i class=\'feather icon-tv\'><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu/14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 11:48:48', '2020-05-15 11:48:48');
INSERT INTO `activity_log` VALUES (12, 'default', 'updated', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":14,\"nama_menu\":\"9\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"F\",\"uri\":\"3233asdss\",\"icon\":\"<i class=\'feather icon-tv\'><\\/i>\"},\"old\":{\"id\":14,\"nama_menu\":\"9\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"F\",\"uri\":\"3233asds\",\"icon\":\"<i class=\'feather icon-tv\'><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu/14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 13:07:23', '2020-05-15 13:07:23');
INSERT INTO `activity_log` VALUES (13, 'default', 'deleted', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"id\":14,\"nama_menu\":\"9\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"F\",\"uri\":\"3233asdss\",\"icon\":\"<i class=\'feather icon-tv\'><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu/14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 13:16:24', '2020-05-15 13:16:24');
INSERT INTO `activity_log` VALUES (14, 'default', 'created', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":14,\"nama_menu\":\"s\",\"menu_parent\":6,\"sequence\":\"2\",\"status\":\"T\",\"uri\":\"2\",\"icon\":\"<i class=\'feather icon-voicemail\'><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:24:11', '2020-05-15 16:24:11');
INSERT INTO `activity_log` VALUES (15, 'default', 'deleted', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"id\":14,\"nama_menu\":\"s\",\"menu_parent\":6,\"sequence\":\"2\",\"status\":\"T\",\"uri\":\"2\",\"icon\":\"<i class=\'feather icon-voicemail\'><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu/14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:24:19', '2020-05-15 16:24:19');
INSERT INTO `activity_log` VALUES (16, 'default', 'created', '15', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":15,\"nama_menu\":\"2\",\"menu_parent\":0,\"sequence\":\"2\",\"status\":\"T\",\"uri\":\"2\",\"icon\":null}}', '::1', 'http://localhost:8001/MasterMenu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:24:30', '2020-05-15 16:24:30');
INSERT INTO `activity_log` VALUES (17, 'default', 'created', '16', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":16,\"nama_menu\":\"1\",\"menu_parent\":0,\"sequence\":\"1\",\"status\":\"T\",\"uri\":\"2\",\"icon\":null}}', '::1', 'http://localhost:8001/MasterMenu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:24:41', '2020-05-15 16:24:41');
INSERT INTO `activity_log` VALUES (18, 'default', 'deleted', '3', 'App\\User', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:31:52', '2020-05-15 16:31:52');
INSERT INTO `activity_log` VALUES (19, 'default', 'created', '4', 'App\\User', 1, 'activity.logs.message.created', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:33:51', '2020-05-15 16:33:51');
INSERT INTO `activity_log` VALUES (23, 'default', 'created', '6', 'App\\User', 1, 'activity.logs.message.created', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:36:12', '2020-05-15 16:36:12');
INSERT INTO `activity_log` VALUES (24, 'default', 'deleted', '6', 'App\\User', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin/6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:38:42', '2020-05-15 16:38:42');
INSERT INTO `activity_log` VALUES (26, 'default', 'created', 'f25c91cd-6f4a-4dae-b3ac-f44d8f7adf8c', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":\"f25c91cd-6f4a-4dae-b3ac-f44d8f7adf8c\"}}', '::1', 'http://localhost:8001/MasterUsers', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:50:57', '2020-05-15 16:50:57');
INSERT INTO `activity_log` VALUES (27, 'default', 'updated', 'f9b44a35-446b-44e8-9949-bdcc0d104a49', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"},\"old\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"}}', '::1', 'http://localhost:8001/MasterUsers/f9b44a35-446b-44e8-9949-bdcc0d104a49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:53:38', '2020-05-15 16:53:38');
INSERT INTO `activity_log` VALUES (28, 'default', 'updated', 'f9b44a35-446b-44e8-9949-bdcc0d104a49', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"},\"old\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"}}', '::1', 'http://localhost:8001/MasterUsers/f9b44a35-446b-44e8-9949-bdcc0d104a49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:55:14', '2020-05-15 16:55:14');
INSERT INTO `activity_log` VALUES (29, 'default', 'updated', 'f9b44a35-446b-44e8-9949-bdcc0d104a49', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"},\"old\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"}}', '::1', 'http://localhost:8001/MasterUsers/f9b44a35-446b-44e8-9949-bdcc0d104a49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-15 16:57:09', '2020-05-15 16:57:09');
INSERT INTO `activity_log` VALUES (30, 'default', 'deleted', '16', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"id\":16,\"nama_menu\":\"1\",\"menu_parent\":0,\"sequence\":\"1\",\"status\":\"T\",\"uri\":\"2\",\"icon\":null}}', '::1', 'http://localhost:8001/MasterMenu/16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-16 12:51:11', '2020-05-16 12:51:11');
INSERT INTO `activity_log` VALUES (31, 'default', 'deleted', '7', 'App\\User', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin/7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-16 12:55:35', '2020-05-16 12:55:35');
INSERT INTO `activity_log` VALUES (34, 'default', 'updated', 'f9b44a35-446b-44e8-9949-bdcc0d104a49', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"},\"old\":{\"id\":\"f9b44a35-446b-44e8-9949-bdcc0d104a49\"}}', '::1', 'http://localhost:8001/MasterUsers/f9b44a35-446b-44e8-9949-bdcc0d104a49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-16 12:56:56', '2020-05-16 12:56:56');
INSERT INTO `activity_log` VALUES (35, 'default', 'created', '8', 'App\\User', 1, 'activity.logs.message.created', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-16 12:57:25', '2020-05-16 12:57:25');
INSERT INTO `activity_log` VALUES (36, 'default', 'updated', 'c5b2feb3-9873-40fa-86df-dd96192d6749', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":\"c5b2feb3-9873-40fa-86df-dd96192d6749\"},\"old\":{\"id\":\"c5b2feb3-9873-40fa-86df-dd96192d6749\"}}', '::1', 'http://localhost:8001/MasterUsers/c5b2feb3-9873-40fa-86df-dd96192d6749', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 07:32:24', '2020-05-17 07:32:24');
INSERT INTO `activity_log` VALUES (37, 'default', 'created', '18', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":18,\"nama_menu\":\"w\",\"menu_parent\":0,\"sequence\":\"2\",\"status\":\"T\",\"uri\":\"w\",\"icon\":null}}', '::1', 'http://localhost:8001/MasterMenu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 10:35:33', '2020-05-17 10:35:33');
INSERT INTO `activity_log` VALUES (38, 'default', 'created', '19', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":19,\"nama_menu\":\"2\",\"menu_parent\":0,\"sequence\":\"1\",\"status\":\"T\",\"uri\":\"d\",\"icon\":null}}', '::1', 'http://localhost:8001/MasterMenu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 10:36:12', '2020-05-17 10:36:12');
INSERT INTO `activity_log` VALUES (39, 'default', 'deleted', '19', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"id\":19,\"nama_menu\":\"2\",\"menu_parent\":0,\"sequence\":\"1\",\"status\":\"T\",\"uri\":\"d\",\"icon\":null}}', '::1', 'http://localhost:8001/MasterMenu/19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 10:36:52', '2020-05-17 10:36:52');
INSERT INTO `activity_log` VALUES (40, 'default', 'deleted', '2', 'App\\User', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"name\":\"WEA\",\"email\":\"sa@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 12:57:07', '2020-05-17 12:57:07');
INSERT INTO `activity_log` VALUES (41, 'default', 'created', '9', 'App\\User', 1, 'activity.logs.message.created', '{\"attributes\":{\"name\":\"WEA\",\"email\":\"asd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 13:00:13', '2020-05-17 13:00:13');
INSERT INTO `activity_log` VALUES (42, 'default', 'updated', '8', 'App\\User', 1, 'activity.logs.message.updated', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"},\"old\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin/resetpassword', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 14:31:49', '2020-05-17 14:31:49');
INSERT INTO `activity_log` VALUES (43, 'default', 'updated', '8', 'App\\User', 1, 'activity.logs.message.updated', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"},\"old\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '::1', 'http://localhost:8001/MasterUserLogin/resetpassword', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 14:31:58', '2020-05-17 14:31:58');
INSERT INTO `activity_log` VALUES (44, 'default', 'deleted', '18', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"id\":18,\"nama_menu\":\"w\",\"menu_parent\":0,\"sequence\":\"2\",\"status\":\"T\",\"uri\":\"w\",\"icon\":null}}', '::1', 'http://localhost:8001/MasterMenu/18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-17 16:29:22', '2020-05-17 16:29:22');
INSERT INTO `activity_log` VALUES (45, 'default', 'updated', 'c5b2feb3-9873-40fa-86df-dd96192d6749', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":\"c5b2feb3-9873-40fa-86df-dd96192d6749\"},\"old\":{\"id\":\"c5b2feb3-9873-40fa-86df-dd96192d6749\"}}', '::1', 'http://localhost:8001/MasterUsers/c5b2feb3-9873-40fa-86df-dd96192d6749', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-19 12:14:27', '2020-05-19 12:14:27');
INSERT INTO `activity_log` VALUES (46, 'default', 'updated', '1', 'App\\User', 1, 'activity.logs.message.updated', '{\"attributes\":{\"name\":\"SUPER ADMIN\",\"email\":\"s@gmail.com\"},\"old\":{\"name\":\"SUPER ADMIN\",\"email\":\"s@gmail.com\"}}', '::1', 'http://localhost:8001/Pengaturan/1111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-19 16:53:06', '2020-05-19 16:53:06');
INSERT INTO `activity_log` VALUES (47, 'default', 'updated', '1', 'App\\User', 1, 'activity.logs.message.updated', '{\"attributes\":{\"name\":\"SUPER ADMIN\",\"email\":\"s@gmail.com\"},\"old\":{\"name\":\"SUPER ADMIN\",\"email\":\"s@gmail.com\"}}', '::1', 'http://localhost:8001/Pengaturan/1111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-19 16:53:29', '2020-05-19 16:53:29');
INSERT INTO `activity_log` VALUES (48, 'default', 'updated', 'f25c91cd-6f4a-4dae-b3ac-f44d8f7adf8c', 'App\\MasterModel\\MasterUserModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":\"f25c91cd-6f4a-4dae-b3ac-f44d8f7adf8c\"},\"old\":{\"id\":\"f25c91cd-6f4a-4dae-b3ac-f44d8f7adf8c\"}}', '::1', 'http://localhost:8001/MasterUsers/f25c91cd-6f4a-4dae-b3ac-f44d8f7adf8c', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-19 17:05:05', '2020-05-19 17:05:05');
INSERT INTO `activity_log` VALUES (49, 'default', 'updated', '11', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":11,\"nama_menu\":\"Log Activity\",\"menu_parent\":0,\"sequence\":\"5\",\"status\":\"F\",\"uri\":\"LogActivity\",\"icon\":\"<i class=\\\"feather icon-activity\\\"><\\/i>\"},\"old\":{\"id\":11,\"nama_menu\":\"Log Activity\",\"menu_parent\":0,\"sequence\":\"5\",\"status\":\"T\",\"uri\":\"LogActivity\",\"icon\":\"<i class=\\\"feather icon-activity\\\"><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu/11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-19 17:06:12', '2020-05-19 17:06:12');
INSERT INTO `activity_log` VALUES (50, 'default', 'updated', '11', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":11,\"nama_menu\":\"Log Activity\",\"menu_parent\":0,\"sequence\":\"5\",\"status\":\"T\",\"uri\":\"LogActivity\",\"icon\":\"<i class=\\\"feather icon-activity\\\"><\\/i>\"},\"old\":{\"id\":11,\"nama_menu\":\"Log Activity\",\"menu_parent\":0,\"sequence\":\"5\",\"status\":\"F\",\"uri\":\"LogActivity\",\"icon\":\"<i class=\\\"feather icon-activity\\\"><\\/i>\"}}', '::1', 'http://localhost:8001/MasterMenu/11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-19 17:06:20', '2020-05-19 17:06:20');
INSERT INTO `activity_log` VALUES (51, 'default', 'updated', '1', 'App\\User', 1, 'activity.logs.message.updated', '{\"attributes\":{\"name\":\"SUPER ADMIN\",\"email\":\"s@gmail.com\"},\"old\":{\"name\":\"SUPER ADMIN\",\"email\":\"s@gmail.com\"}}', '127.0.0.1', 'http://localhost:8000/Pengaturan/1111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-04 03:12:19', '2022-02-04 03:12:19');
INSERT INTO `activity_log` VALUES (52, 'default', 'deleted', '9', 'App\\User', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"name\":\"WEA\",\"email\":\"asd@gmail.com\"}}', '127.0.0.1', 'http://localhost:8000/MasterUserLogin/9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-07 07:18:16', '2022-02-07 07:18:16');
INSERT INTO `activity_log` VALUES (53, 'default', 'deleted', '8', 'App\\User', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"name\":\"ASD\",\"email\":\"assd@gmail.com\"}}', '127.0.0.1', 'http://localhost:8000/MasterUserLogin/8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-07 07:18:21', '2022-02-07 07:18:21');
INSERT INTO `activity_log` VALUES (54, 'default', 'created', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":14,\"nama_menu\":\"SMKN\",\"menu_parent\":0,\"sequence\":\"4\",\"status\":\"T\",\"uri\":\"#!\",\"icon\":\"<i class=\'feather icon-feather\'><\\/i>\"}}', '127.0.0.1', 'http://localhost:8000/MasterMenu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-07 07:54:16', '2022-02-07 07:54:16');
INSERT INTO `activity_log` VALUES (55, 'default', 'created', '15', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.created', '{\"attributes\":{\"id\":15,\"nama_menu\":\"SMKN\",\"menu_parent\":0,\"sequence\":\"4\",\"status\":\"T\",\"uri\":\"#!\",\"icon\":\"<i class=\'feather icon-feather\'><\\/i>\"}}', '127.0.0.1', 'http://localhost:8000/MasterMenu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-07 07:54:16', '2022-02-07 07:54:16');
INSERT INTO `activity_log` VALUES (56, 'default', 'deleted', '15', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.deleted', '{\"attributes\":{\"id\":15,\"nama_menu\":\"SMKN\",\"menu_parent\":0,\"sequence\":\"4\",\"status\":\"T\",\"uri\":\"#!\",\"icon\":\"<i class=\'feather icon-feather\'><\\/i>\"}}', '127.0.0.1', 'http://localhost:8000/MasterMenu/15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-07 07:54:29', '2022-02-07 07:54:29');
INSERT INTO `activity_log` VALUES (57, 'default', 'updated', '14', 'App\\MasterModel\\MenuModel', 1, 'activity.logs.message.updated', '{\"attributes\":{\"id\":14,\"nama_menu\":\"SMKN\",\"menu_parent\":0,\"sequence\":\"3\",\"status\":\"T\",\"uri\":\"#!\",\"icon\":\"<i class=\'feather icon-feather\'><\\/i>\"},\"old\":{\"id\":14,\"nama_menu\":\"SMKN\",\"menu_parent\":0,\"sequence\":\"4\",\"status\":\"T\",\"uri\":\"#!\",\"icon\":\"<i class=\'feather icon-feather\'><\\/i>\"}}', '127.0.0.1', 'http://localhost:8000/MasterMenu/14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-07 07:55:04', '2022-02-07 07:55:04');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_05_12_122908_create_activity_log_table', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  INDEX `model_has_permissions_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  INDEX `model_has_roles_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 1);

-- ----------------------------
-- Table structure for mst_configurations
-- ----------------------------
DROP TABLE IF EXISTS `mst_configurations`;
CREATE TABLE `mst_configurations`  (
  `key` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `value` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `component` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  INDEX `mst_configurations_key_index`(`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_configurations
-- ----------------------------
INSERT INTO `mst_configurations` VALUES ('id', '152', 'app');
INSERT INTO `mst_configurations` VALUES ('name', 'base.app', 'app');
INSERT INTO `mst_configurations` VALUES ('logo', '-', 'app');
INSERT INTO `mst_configurations` VALUES ('url', 'http://127.0.0.1', 'app');
INSERT INTO `mst_configurations` VALUES ('https', 'false', 'app');
INSERT INTO `mst_configurations` VALUES ('display_per_page', '10', 'app');
INSERT INTO `mst_configurations` VALUES ('author', '-', 'app');
INSERT INTO `mst_configurations` VALUES ('tags', '-', 'app');
INSERT INTO `mst_configurations` VALUES ('copyright_text', 'Copyright &copy; base.app 2022.', 'app');
INSERT INTO `mst_configurations` VALUES ('env', 'development', 'app');
INSERT INTO `mst_configurations` VALUES ('debug', 'true', 'app');
INSERT INTO `mst_configurations` VALUES ('logging.default', 'daily', 'logging');
INSERT INTO `mst_configurations` VALUES ('method', 'uim', 'auth');
INSERT INTO `mst_configurations` VALUES ('bypass_ldap', 'false', 'auth');
INSERT INTO `mst_configurations` VALUES ('captcha', 'false', 'auth');
INSERT INTO `mst_configurations` VALUES ('api_host', NULL, 'auth');
INSERT INTO `mst_configurations` VALUES ('api_secret_key', NULL, 'auth');
INSERT INTO `mst_configurations` VALUES ('driver', 'smtp', 'mail');
INSERT INTO `mst_configurations` VALUES ('host', '10.12.14.3', 'mail');
INSERT INTO `mst_configurations` VALUES ('port', '25', 'mail');
INSERT INTO `mst_configurations` VALUES ('username', '', 'mail');
INSERT INTO `mst_configurations` VALUES ('password', '', 'mail');
INSERT INTO `mst_configurations` VALUES ('encryption', NULL, 'mail');
INSERT INTO `mst_configurations` VALUES ('from.address', '-', 'mail');
INSERT INTO `mst_configurations` VALUES ('from.name', '-', 'mail');
INSERT INTO `mst_configurations` VALUES ('cache.default', 'redis', 'cache');
INSERT INTO `mst_configurations` VALUES ('driver', 'redis', 'session');
INSERT INTO `mst_configurations` VALUES ('lifetime', '120', 'session');
INSERT INTO `mst_configurations` VALUES ('expire_on_close', 'true', 'session');
INSERT INTO `mst_configurations` VALUES ('domain', '127.0.0.1', 'session');
INSERT INTO `mst_configurations` VALUES ('secure_cookie', 'false', 'session');
INSERT INTO `mst_configurations` VALUES ('same_site', NULL, 'session');
INSERT INTO `mst_configurations` VALUES ('broadcasting.default', NULL, 'broadcasting');
INSERT INTO `mst_configurations` VALUES ('queue.default', 'sync', 'queue');
INSERT INTO `mst_configurations` VALUES ('message', NULL, 'maintenance');
INSERT INTO `mst_configurations` VALUES ('time_start', NULL, 'maintenance');
INSERT INTO `mst_configurations` VALUES ('time_end', NULL, 'maintenance');
INSERT INTO `mst_configurations` VALUES ('connections', '\n[\n{\n\"name\":\"default\",\n\"default\":true,\n\"driver\":\"pgsql\",\n\"host\":\"127.0.0.1\",\n\"port\":5432,\n\"database\":\"erenbis\",\n\"username\":\"postgres\",\n\"password\":\"postgres\",\n\"collation\":\"Latin1_General_CI_AS\"\n}\n]', 'database');

-- ----------------------------
-- Table structure for mst_icon
-- ----------------------------
DROP TABLE IF EXISTS `mst_icon`;
CREATE TABLE `mst_icon`  (
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_icon
-- ----------------------------
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-x\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-alert-octagon\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-alert-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-activity\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-alert-triangle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-align-center\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-airplay\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-align-justify\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-align-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-align-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-down-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-down-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-anchor\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-aperture\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-down\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-up-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-up-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-arrow-up\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-award\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-bar-chart\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-at-sign\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-bar-chart\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-battery-charging\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-bell-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-battery\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-bluetooth\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-bell\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-book\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-briefcase\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-camera-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-calendar\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-bookmark\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-box\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-camera\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-check-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-check\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-check-square\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cast\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevron-down\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevron-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevron-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevron-up\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevrons-down\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevrons-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevrons-up\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chevrons-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-clipboard\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-chrome\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-clock\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cloud-lightning\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cloud-drizzle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cloud-rain\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cloud-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-codepen\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cloud-snow\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-compass\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-copy\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-down-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-down-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-left-down\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-left-up\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-up-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-up-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-right-down\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-corner-right-up\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cpu\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-credit-card\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-crosshair\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-disc\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-delete\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-download-cloud\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-download\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-droplet\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-edit\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-edit-1\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-external-link\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-eye\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-feather\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-facebook\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-file-minus\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-eye-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-fast-forward\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-file-text\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-film\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-file\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-file-plus\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-folder\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-filter\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-flag\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-globe\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-grid\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-heart\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-home\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-github\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-image\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-inbox\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-layers\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-info\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-instagram\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-layout\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-link\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-life-buoy\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-link\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-log-in\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-list\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-lock\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-log-out\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-loader\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-mail\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-maximize\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-map\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-map-pin\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-menu\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-message-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-message-square\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-minimize\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-mic-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-minus-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-mic\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-minus-square\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-minus\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-moon\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-monitor\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-more-vertical\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-more-horizontal\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-move\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-music\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-navigation\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-octagon\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-package\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-pause-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-pause\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-percent\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-phone-call\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-phone-forwarded\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-phone-missed\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-phone-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-phone-incoming\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-phone\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-phone-outgoing\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-pie-chart\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-play-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-play\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-plus-square\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-plus-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-plus\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-pocket\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-printer\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-power\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-radio\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-repeat\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-refresh-ccw\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-rewind\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-rotate-ccw\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-refresh-cw\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-rotate-cw\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-save\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-search\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-server\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-scissors\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-share\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-shield\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-settings\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-skip-back\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-shuffle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-sidebar\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-skip-forward\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-slack\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-slash\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-smartphone\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-square\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-speaker\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-star\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-stop-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-sun\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-sunrise\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-tablet\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-tag\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-sunset\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-target\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-thermometer\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-thumbs-up\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-thumbs-down\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-toggle-left\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-toggle-right\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-trash\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-trending-up\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-trending-down\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-triangle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-type\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-twitter\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-upload\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-umbrella\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-upload-cloud\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-unlock\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-user-check\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-user-minus\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-user-plus\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-user-x\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-user\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-users\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-video-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-video\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-voicemail\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-volume-x\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-volume-1\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-volume\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-watch\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-wifi\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-x-square\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-wind\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-x\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-x-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-zap\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-zoom-in\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-zoom-out\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-command\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-cloud\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-hash\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-headphones\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-underline\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-italic\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-bold\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-crop\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-help-circle\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-paperclip\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-shopping-cart\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-tv\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-wifi-off\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-minimize\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-maximize\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-gitlab\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-sliders\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-star-on\'></i>');
INSERT INTO `mst_icon` VALUES ('<i class=\'feather icon-heart-on\'></i>');

-- ----------------------------
-- Table structure for mst_menu
-- ----------------------------
DROP TABLE IF EXISTS `mst_menu`;
CREATE TABLE `mst_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_parent` tinyint(4) NOT NULL,
  `sequence` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_menu
-- ----------------------------
INSERT INTO `mst_menu` VALUES (1, 'Dashboard', 0, '1', 'T', 'home', '<i class=\"feather icon-home\"></i>');
INSERT INTO `mst_menu` VALUES (2, 'User Management', 0, '2', 'T', '#!', '<i class=\"feather icon-users\"></i>');
INSERT INTO `mst_menu` VALUES (3, 'Master Menu', 2, '1', 'T', 'MasterMenu', '');
INSERT INTO `mst_menu` VALUES (4, 'Master User Login', 2, '3', 'T', 'MasterUserLogin', '');
INSERT INTO `mst_menu` VALUES (5, 'Master Role', 2, '2', 'T', 'MasterRole', '');
INSERT INTO `mst_menu` VALUES (6, 'Master Data', 0, '3', 'T', '#!', '<i class=\"feather icon-clipboard\"></i>');
INSERT INTO `mst_menu` VALUES (7, 'Master Users', 6, '1', 'T', 'MasterUsers', '');
INSERT INTO `mst_menu` VALUES (11, 'Log Activity', 0, '5', 'T', 'LogActivity', '<i class=\"feather icon-activity\"></i>');
INSERT INTO `mst_menu` VALUES (12, 'Parameter', 0, '4', 'T', '#!', '<i class=\'feather icon-settings\'></i>');
INSERT INTO `mst_menu` VALUES (13, 'Option Group', 12, '1', 'T', 'OptionGroup', '<i class=\"feather icon-\"></i>');
INSERT INTO `mst_menu` VALUES (14, 'SMKN', 0, '3', 'T', '#!', '<i class=\'feather icon-feather\'></i>');

-- ----------------------------
-- Table structure for mst_option_groups
-- ----------------------------
DROP TABLE IF EXISTS `mst_option_groups`;
CREATE TABLE `mst_option_groups`  (
  `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_option_groups
-- ----------------------------
INSERT INTO `mst_option_groups` VALUES ('1c8fcc58-4aa3-4574-ac5b-a30e4a0146fb', 'Jabatan', '2020-05-08 22:58:56', '2020-05-08 22:58:56', 'T');
INSERT INTO `mst_option_groups` VALUES ('254dcdc5-6b78-4ece-82aa-d8006fe13173', 'Agama', '2020-05-08 22:57:58', '2020-05-14 21:47:05', 'T');
INSERT INTO `mst_option_groups` VALUES ('4b4e0142-7a94-48a4-b045-2a24d5e89738', 'Status', '2020-05-14 21:26:27', '2020-05-14 21:26:27', 'T');
INSERT INTO `mst_option_groups` VALUES ('4e782252-404a-4434-a8d1-86256d07edc2', 'Jenjang', '2020-05-08 22:59:13', '2020-05-08 22:59:13', 'T');
INSERT INTO `mst_option_groups` VALUES ('86099f09-de2a-444f-aafc-0ff3a71030c0', 'JenisKelamin', '2020-05-08 22:59:06', '2020-05-08 22:59:06', 'T');
INSERT INTO `mst_option_groups` VALUES ('b56e0124-7522-432e-8d7f-dbd228e2a570', 'Bagian', '2020-05-08 22:58:45', '2020-05-08 22:58:45', 'T');

-- ----------------------------
-- Table structure for mst_option_values
-- ----------------------------
DROP TABLE IF EXISTS `mst_option_values`;
CREATE TABLE `mst_option_values`  (
  `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `option_group_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `key` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mst_option_values_option_group_id_foreign`(`option_group_id`) USING BTREE,
  CONSTRAINT `mst_option_values_ibfk_1` FOREIGN KEY (`option_group_id`) REFERENCES `mst_option_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_option_values
-- ----------------------------
INSERT INTO `mst_option_values` VALUES ('3554f1d5-6272-481f-83a1-5f2bfc08680b', '4b4e0142-7a94-48a4-b045-2a24d5e89738', 'T', 'Aktif', 1, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('38050119-fbcf-4fcb-81f2-c49b4e0822f0', '1c8fcc58-4aa3-4574-ac5b-a30e4a0146fb', '1', '-', 1, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('5b0c6f13-7f3e-4c08-8cbe-d7b9b2bd8b6e', '254dcdc5-6b78-4ece-82aa-d8006fe13173', '1', 'Islam', 1, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('5e1fdf37-7df2-4d59-bf3b-41aa1f65a71c', '4b4e0142-7a94-48a4-b045-2a24d5e89738', 'F', 'Tidak Aktif', 2, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('8e4bce2f-ba80-4551-bf08-63b54ffed9af', '4e782252-404a-4434-a8d1-86256d07edc2', '2', 'D1', 2, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('96fde4c2-02a2-4c6e-8765-73fdd3b203e5', 'b56e0124-7522-432e-8d7f-dbd228e2a570', '1', '-', 1, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('a5f8c1fc-1ee9-4165-88bf-637077e07f88', '254dcdc5-6b78-4ece-82aa-d8006fe13173', '4', 'Budha', 4, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('a955defc-372e-45d4-a635-68bb099e96ea', '86099f09-de2a-444f-aafc-0ff3a71030c0', '1', 'Laki-Laki', 1, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('ad57275c-645e-4916-83e0-96be7d801904', '254dcdc5-6b78-4ece-82aa-d8006fe13173', '3', 'Hindu', 3, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('b4427b27-12bc-4872-a7bf-496a8da4983c', '86099f09-de2a-444f-aafc-0ff3a71030c0', '2', 'Perempuan', 2, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('c03c4bbe-62e6-42b0-968d-5c1c2afb7038', '4e782252-404a-4434-a8d1-86256d07edc2', '4', 'S1', 4, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('c6e9a3f2-a812-4087-9720-a2192494cae4', '4e782252-404a-4434-a8d1-86256d07edc2', '1', 'SMA', 1, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('cbfbab34-18ac-4d06-aafe-1986ef979cd3', '254dcdc5-6b78-4ece-82aa-d8006fe13173', '2', 'Kristen', 2, NULL, NULL, NULL);
INSERT INTO `mst_option_values` VALUES ('da08a6ad-9cae-4af0-abba-b72c0856b070', '4e782252-404a-4434-a8d1-86256d07edc2', '3', 'D3', 3, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for mst_user
-- ----------------------------
DROP TABLE IF EXISTS `mst_user`;
CREATE TABLE `mst_user`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `gelar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ayah` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  UNIQUE INDEX `mst_user_nip_unique`(`nip`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_user
-- ----------------------------
INSERT INTO `mst_user` VALUES ('727a6eec-2475-46db-9deb-98d0b6f4e996', '1111', '1111', 'SUPER ADMIN', 'sadmin@gmail.com', '2020-02-09', '1', '1111', '08888', '1', 'SISTEM INFORMASI (UNIKOM) 2014', '', '', NULL, NULL, 'Islam', '4', '1', 'T', '2020-02-09 11:51:38', '2020-02-09 11:51:38');
INSERT INTO `mst_user` VALUES ('e39efd32-c5d8-4da1-9b13-d6e9b147d0d6', '20.20.0447', '123', 'WEA', 'asd@gmail.com', '2020-05-04', '1', '123', '123', '1', '213 (123) 2024', NULL, '', NULL, NULL, '1', '1', '1', 'T', '2020-05-01 15:40:47', '2020-05-14 21:52:55');
INSERT INTO `mst_user` VALUES ('f9b44a35-446b-44e8-9949-bdcc0d104a49', '20.20.0511', '213', 'SAD', 'sad@gmail', '2020-05-05', '1', 'D', '123', '3', '02 (D) 2020', '1', '', NULL, NULL, '1', '1', '1', 'T', '2020-05-15 16:48:11', '2020-05-16 12:56:56');
INSERT INTO `mst_user` VALUES ('18d4ea23-682e-4910-9b44-090407cd171a', '20.20.0529', '213', 'SAD', 'sad@gmail', '2020-05-05', '1', 'D', '123', '1', 'D (D) 2020', '1', '', NULL, NULL, '1', '1', '1', 'T', '2020-05-15 16:49:29', '2020-05-15 16:49:29');
INSERT INTO `mst_user` VALUES ('f25c91cd-6f4a-4dae-b3ac-f44d8f7adf8c', '20.20.0557', '213', 'SAD', 'sad@gmail', '2020-05-05', '1', 'D', '123', '1', 'D (D) 2020', '1', '', NULL, NULL, '1', '1', '1', 'T', '2020-05-15 16:50:57', '2020-05-19 17:05:05');
INSERT INTO `mst_user` VALUES ('6b83c0c8-eb33-4507-bae0-646c2727b249', '20.20.0618', '123', 'ASD', 'assd@gmail.com', '2020-05-06', '1', 'ASD', '123', '1', 'A (ASD) 2020', '123', '', NULL, NULL, '1', '1', '1', 'T', '2020-05-01 14:45:18', '2020-05-14 21:52:49');
INSERT INTO `mst_user` VALUES ('c5b2feb3-9873-40fa-86df-dd96192d6749', '20.20.1524', '12312', 'WSAD', 'wsa@gmail.com', '2020-04-15', '1', 'WQE', '1123', '1', 'ASD) 202 (ASD) 2020', 'ASD', '', NULL, NULL, '1', '1', '1', 'T', '2020-05-01 15:29:24', '2020-05-19 12:14:26');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'MasterRole.index', 'web', '2020-05-03 21:55:12', '2020-05-03 21:55:14');
INSERT INTO `permissions` VALUES (2, 'MasterRole.create', 'web', '2020-05-03 21:56:52', '2020-05-03 22:13:38');
INSERT INTO `permissions` VALUES (3, 'MasterRole.edit', 'web', '2020-05-03 22:13:32', '2020-05-03 22:13:36');
INSERT INTO `permissions` VALUES (5, 'MasterMenu.index', 'web', '2020-05-04 14:08:35', '2020-05-04 14:08:35');
INSERT INTO `permissions` VALUES (6, 'MasterMenu.create', 'web', '2020-05-04 14:08:35', '2020-05-04 14:08:35');
INSERT INTO `permissions` VALUES (7, 'MasterMenu.show', 'web', '2020-05-04 15:13:50', '2020-05-04 15:13:50');
INSERT INTO `permissions` VALUES (8, 'MasterMenu.edit', 'web', '2020-05-04 15:13:50', '2020-05-04 15:13:50');
INSERT INTO `permissions` VALUES (9, 'MasterMenu.destroy', 'web', '2020-05-04 15:13:50', '2020-05-04 15:13:50');
INSERT INTO `permissions` VALUES (10, 'MasterRole.show', 'web', '2020-05-04 15:13:50', '2020-05-04 15:13:50');
INSERT INTO `permissions` VALUES (11, 'MasterRole.destroy', 'web', '2020-05-04 15:13:50', '2020-05-04 15:13:50');
INSERT INTO `permissions` VALUES (12, 'MasterUserLogin.index', 'web', '2020-05-04 15:13:50', '2020-05-04 15:13:50');
INSERT INTO `permissions` VALUES (13, 'MasterUserLogin.create', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (14, 'MasterUserLogin.show', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (15, 'MasterUserLogin.edit', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (16, 'MasterUserLogin.destroy', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (17, 'MasterUsers.index', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (18, 'MasterUsers.create', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (19, 'MasterUsers.show', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (20, 'MasterUsers.edit', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (21, 'MasterUsers.destroy', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (22, 'Pengaturan.index', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (23, 'Pengaturan.create', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (24, 'Pengaturan.show', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (25, 'Pengaturan.edit', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (26, 'Pengaturan.destroy', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (27, 'LogActivity.index', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (28, 'LogActivity.create', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (29, 'LogActivity.show', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (30, 'LogActivity.edit', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (31, 'LogActivity.destroy', 'web', '2020-05-04 15:13:51', '2020-05-04 15:13:51');
INSERT INTO `permissions` VALUES (32, 'home', 'web', '2020-05-08 17:08:31', '2020-05-08 17:08:31');
INSERT INTO `permissions` VALUES (33, 'OptionGroup.index', 'web', '2020-05-08 21:24:47', '2020-05-08 21:24:47');
INSERT INTO `permissions` VALUES (34, 'OptionGroup.create', 'web', '2020-05-08 21:24:47', '2020-05-08 21:24:47');
INSERT INTO `permissions` VALUES (35, 'OptionGroup.show', 'web', '2020-05-08 21:24:47', '2020-05-08 21:24:47');
INSERT INTO `permissions` VALUES (36, 'OptionGroup.edit', 'web', '2020-05-08 21:24:47', '2020-05-08 21:24:47');
INSERT INTO `permissions` VALUES (37, 'OptionGroup.destroy', 'web', '2020-05-08 21:24:47', '2020-05-08 21:24:47');
INSERT INTO `permissions` VALUES (38, 'MasterUserLogin.resetPassword', 'web', '2020-05-17 16:31:12', '2020-05-17 16:31:12');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  INDEX `permission_id`(`permission_id`, `role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (12, 2);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (15, 2);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (16, 2);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (17, 2);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (18, 2);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (20, 2);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (32, 2);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (36, 1);
INSERT INTO `role_has_permissions` VALUES (37, 1);
INSERT INTO `role_has_permissions` VALUES (38, 1);
INSERT INTO `role_has_permissions` VALUES (38, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'SUPER ADMIN', 'web', '2020-02-09 11:51:33', '2020-02-09 11:51:33');
INSERT INTO `roles` VALUES (2, 'ADMIN', 'web', '2020-05-15 10:38:43', '2020-05-15 10:38:43');

-- ----------------------------
-- Table structure for roles_has_menu
-- ----------------------------
DROP TABLE IF EXISTS `roles_has_menu`;
CREATE TABLE `roles_has_menu`  (
  `id_role` int(255) NULL DEFAULT NULL,
  `id_menu` int(255) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles_has_menu
-- ----------------------------
INSERT INTO `roles_has_menu` VALUES (1, 1);
INSERT INTO `roles_has_menu` VALUES (1, 2);
INSERT INTO `roles_has_menu` VALUES (1, 3);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '1111', 'SUPER ADMIN', 's@gmail.com', NULL, '$2y$10$YBasb9LERf/f3vn7Rp1RNOsaqlMUsJ/NlO7iEt1coeWOfxtPP807u', NULL, NULL, '2022-02-04 03:12:19');

-- ----------------------------
-- View structure for vw_menu
-- ----------------------------
DROP VIEW IF EXISTS `vw_menu`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_menu` AS select `a`.`id` AS `id`,`a`.`nama_menu` AS `nama_menu`,`a`.`menu_parent` AS `menu_parent`,`a`.`sequence` AS `sequence`,`a`.`status` AS `status`,`a`.`uri` AS `uri`,`a`.`icon` AS `icon`,`b`.`name_permission` AS `name_permission`,`b`.`role_id` AS `role_id` from (`mst_menu` `a` join `vw_permission` `b` on(`a`.`uri` = `b`.`name_permission`)) where `a`.`status` = 'T' order by `a`.`sequence`;

-- ----------------------------
-- View structure for vw_permission
-- ----------------------------
DROP VIEW IF EXISTS `vw_permission`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_permission` AS select distinct substr(`per`.`name`,1,locate('.',`per`.`name`) - 1) AS `name_permission`,`rhp`.`role_id` AS `role_id` from (`permissions` `per` join `role_has_permissions` `rhp` on(`per`.`id` = `rhp`.`permission_id`)) where `per`.`name` like '%index%';

SET FOREIGN_KEY_CHECKS = 1;
