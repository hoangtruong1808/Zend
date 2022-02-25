/*
 Navicat Premium Data Transfer

 Source Server         : 192.168.20.180
 Source Server Type    : PostgreSQL
 Source Server Version : 90224
 Source Host           : 192.168.20.180:5432
 Source Catalog        : n-truong
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90224
 File Encoding         : 65001

 Date: 25/02/2022 19:04:39
*/


-- ----------------------------
-- Sequence structure for borrow_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."borrow_id_seq";
CREATE SEQUENCE "public"."borrow_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_borrow_detail_borrow_detail_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_borrow_detail_borrow_detail_id_seq";
CREATE SEQUENCE "public"."tbl_borrow_detail_borrow_detail_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_human_resources_human_rsc_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_human_resources_human_rsc_id_seq";
CREATE SEQUENCE "public"."tbl_human_resources_human_rsc_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_inventory_detail_inventory_detail_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_inventory_detail_inventory_detail_id_seq";
CREATE SEQUENCE "public"."tbl_inventory_detail_inventory_detail_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_inventory_inventory_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_inventory_inventory_id_seq";
CREATE SEQUENCE "public"."tbl_inventory_inventory_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_physical_asset_physical_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_physical_asset_physical_id_seq";
CREATE SEQUENCE "public"."tbl_physical_asset_physical_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_physical_group_physical_grp_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_physical_group_physical_grp_id_seq";
CREATE SEQUENCE "public"."tbl_physical_group_physical_grp_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_roles_role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_roles_role_id_seq";
CREATE SEQUENCE "public"."tbl_roles_role_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_state_state_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_state_state_id_seq";
CREATE SEQUENCE "public"."tbl_state_state_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_status_status_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_status_status_id_seq";
CREATE SEQUENCE "public"."tbl_status_status_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for tbl_asset
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_asset";
CREATE TABLE "public"."tbl_asset" (
  "asset_id" int4 NOT NULL DEFAULT nextval('tbl_physical_asset_physical_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "code" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "configuration" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4 NOT NULL,
  "asset_group_id" int4 NOT NULL,
  "is_disabled" int4 NOT NULL DEFAULT 0,
  "status_percent" int4,
  "state" int4 NOT NULL,
  "deleted_at" varchar(255) COLLATE "pg_catalog"."default",
  "image" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tbl_asset
-- ----------------------------
INSERT INTO "public"."tbl_asset" VALUES (137, 'Màn hình HP M24Fw', 'MHP01 ', 'HP, M24FW 2E2Y5AA, 23.8 inch, FHD IPS', 1, 184, 0, NULL, 2, '2022-02-25 11:22:44', '38272_hp_m24fw_fhd_monitor_2e2y5aa.jpg');
INSERT INTO "public"."tbl_asset" VALUES (138, 'Màn hình HP M24Fw', 'MHP02', 'HP, M24FW 2E2Y5AA, 23.8 inch, FHD IPS', 1, 184, 0, NULL, 2, '2022-02-25 11:22:44', '38272_hp_m24fw_fhd_monitor_2e2y5aa.jpg');
INSERT INTO "public"."tbl_asset" VALUES (139, 'Màn hình HP M24Fw', 'MHP03', 'HP, M24FW 2E2Y5AA, 23.8 inch, FHD IPS', 1, 184, 0, 2, 2, '2022-02-25 11:22:44', '38272_hp_m24fw_fhd_monitor_2e2y5aa.jpg');
INSERT INTO "public"."tbl_asset" VALUES (140, 'Màn hình HP M24Fw', 'MHP04', 'HP, M24FW 2E2Y5AA, 23.8 inch, FHD IPS', 1, 184, 0, NULL, 2, '2022-02-25 11:22:44', '38272_hp_m24fw_fhd_monitor_2e2y5aa.jpg');
INSERT INTO "public"."tbl_asset" VALUES (141, 'Laptop HP', 'LHP1', 'LAPTOP HP PAVILION (I5-1135G7/8GB RAM/256GB SSD/15.6', 1, 183, 0, NULL, 2, '2022-02-25 11:22:44', 'laptop_PNG5905.png');
INSERT INTO "public"."tbl_asset" VALUES (142, 'Laptop HP', 'LHP2', 'LAPTOP HP PAVILION I5-1135G7/8GB RAM/256GB SSD/15.6', 1, 183, 0, NULL, 2, '2022-02-25 11:22:44', 'laptop_PNG5905.png');
INSERT INTO "public"."tbl_asset" VALUES (143, 'Laptop HP', 'LHP3', 'LAPTOP HP PAVILION (I5-1135G7/8GB RAM/256GB SSD/15.6', 1, 183, 0, NULL, 2, '2022-02-25 11:22:44', 'laptop_PNG5905.png');
INSERT INTO "public"."tbl_asset" VALUES (144, 'Ghế xoay lưới', 'GXL1', '', 1, 187, 0, NULL, 2, '2022-02-25 11:22:44', 'ghe-xoay.jpg');
INSERT INTO "public"."tbl_asset" VALUES (145, 'Ghế xoay lưới', 'GXL2', '', 1, 187, 0, NULL, 2, '2022-02-25 11:22:44', 'ghe-xoay.jpg');
INSERT INTO "public"."tbl_asset" VALUES (146, 'Ghế xoay lưới', 'GXL3', '', 1, 187, 0, NULL, 2, '2022-02-25 11:22:44', 'ghe-xoay.jpg');
INSERT INTO "public"."tbl_asset" VALUES (156, 'Nguyễn Hoàng Trường', '123', '', 1, 186, 1, NULL, 2, '2022-02-25 13:09:55', 'OIP.jpg');
INSERT INTO "public"."tbl_asset" VALUES (147, 'Ghế xoay lưới', 'GXL4', '', 1, 187, 0, NULL, 2, '2022-02-25 11:22:44', 'ghe-xoay.jpg');
INSERT INTO "public"."tbl_asset" VALUES (148, 'Chuột Rapoo', 'CRP1', 'Chuột Không Dây Rapoo M20 Plus Đen', 1, 185, 0, NULL, 2, '2022-02-25 11:22:44', 'OIP.jpg');
INSERT INTO "public"."tbl_asset" VALUES (149, 'Chuột Rapoo', 'CRP2', 'Chuột Không Dây Rapoo M20 Plus Đen', 1, 185, 0, NULL, 2, '2022-02-25 11:22:44', 'OIP.jpg');
INSERT INTO "public"."tbl_asset" VALUES (150, 'Chuột Rapoo', 'CRP3', 'Chuột Không Dây Rapoo M20 Plus Đen', 1, 185, 0, NULL, 2, '2022-02-25 11:22:44', 'OIP.jpg');
INSERT INTO "public"."tbl_asset" VALUES (154, 'Laptop HP', 'LHP10', 'DDƯQFQW', 1, 183, 0, NULL, 2, '2022-02-25 11:22:44', 'laptop_PNG5905.png');
INSERT INTO "public"."tbl_asset" VALUES (155, 'Tài sản mới', 'TSM', '', 1, 186, 0, NULL, 2, '2022-02-25 11:22:44', '341356_img2501.jpg');
INSERT INTO "public"."tbl_asset" VALUES (158, 'dưqdqw', 'dqwdq', 'dqwdwq', 2, 186, 1, NULL, 2, '2022-02-25 18:10:39', 'MicrosoftTeams-image.png');
INSERT INTO "public"."tbl_asset" VALUES (157, 'dqd', 'dqdqdq', 'dqdq', 2, 187, 1, NULL, 2, '2022-02-25 18:10:44', 'MicrosoftTeams-image.png');
INSERT INTO "public"."tbl_asset" VALUES (153, 'gyiuyigh', 'ghuityuiyu', '', 1, 187, 1, NULL, 2, '2022-02-25 11:23:59', 'login_logo_e_def.jpg');
INSERT INTO "public"."tbl_asset" VALUES (152, 'Chuột dqdqdq', 'CFL02', '', 1, 185, 1, NULL, 2, '2022-02-25 11:23:59', 'OIP.jpg');
INSERT INTO "public"."tbl_asset" VALUES (151, 'Robin', 'HG7BM', 'ASSADASĐ', 1, 183, 1, NULL, 2, '2022-02-25 11:23:59', 'avatar.jpg');

-- ----------------------------
-- Table structure for tbl_asset_group
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_asset_group";
CREATE TABLE "public"."tbl_asset_group" (
  "description" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "group_id" int4 NOT NULL DEFAULT nextval('tbl_physical_group_physical_grp_id_seq'::regclass),
  "active" int4 NOT NULL,
  "is_disabled" int4 NOT NULL DEFAULT 0,
  "deleted_at" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tbl_asset_group
-- ----------------------------
INSERT INTO "public"."tbl_asset_group" VALUES ('Laptop', 183, 1, 0, NULL);
INSERT INTO "public"."tbl_asset_group" VALUES ('sewrfsdfsd', 189, 1, 1, '2022-02-24 13:00:42');
INSERT INTO "public"."tbl_asset_group" VALUES ('Chuột máy tính', 185, 1, 0, NULL);
INSERT INTO "public"."tbl_asset_group" VALUES ('dqdq', 190, 1, 1, '2022-02-25 18:31:49');
INSERT INTO "public"."tbl_asset_group" VALUES ('Bàn phím máy tính', 186, 1, 0, NULL);
INSERT INTO "public"."tbl_asset_group" VALUES ('Màn hình máy tính', 184, 1, 0, NULL);
INSERT INTO "public"."tbl_asset_group" VALUES ('Ghế xoay', 187, 0, 0, NULL);

-- ----------------------------
-- Table structure for tbl_borrow
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_borrow";
CREATE TABLE "public"."tbl_borrow" (
  "borrow_id" int4 NOT NULL DEFAULT nextval('borrow_id_seq'::regclass),
  "user_id" int4 NOT NULL,
  "borrow_date" timestamp(6) NOT NULL
)
;

-- ----------------------------
-- Records of tbl_borrow
-- ----------------------------
INSERT INTO "public"."tbl_borrow" VALUES (199, 60, '2022-02-25 15:35:00');
INSERT INTO "public"."tbl_borrow" VALUES (200, 60, '2022-02-25 15:37:00');
INSERT INTO "public"."tbl_borrow" VALUES (201, 60, '2022-02-25 15:37:00');
INSERT INTO "public"."tbl_borrow" VALUES (202, 60, '2022-02-25 15:39:00');
INSERT INTO "public"."tbl_borrow" VALUES (203, 60, '2022-02-25 15:41:00');
INSERT INTO "public"."tbl_borrow" VALUES (204, 61, '2022-02-25 15:42:00');
INSERT INTO "public"."tbl_borrow" VALUES (205, 61, '2022-02-25 15:42:00');
INSERT INTO "public"."tbl_borrow" VALUES (206, 60, '2022-02-25 15:44:00');
INSERT INTO "public"."tbl_borrow" VALUES (207, 60, '2022-02-25 15:46:00');
INSERT INTO "public"."tbl_borrow" VALUES (208, 60, '2022-02-25 15:51:00');
INSERT INTO "public"."tbl_borrow" VALUES (209, 60, '2022-02-25 15:51:00');
INSERT INTO "public"."tbl_borrow" VALUES (210, 60, '2022-02-25 15:52:00');
INSERT INTO "public"."tbl_borrow" VALUES (211, 60, '2022-02-25 15:53:00');
INSERT INTO "public"."tbl_borrow" VALUES (212, 60, '2022-02-25 15:53:00');
INSERT INTO "public"."tbl_borrow" VALUES (213, 60, '2022-02-25 15:56:00');
INSERT INTO "public"."tbl_borrow" VALUES (214, 60, '2022-02-25 15:58:00');
INSERT INTO "public"."tbl_borrow" VALUES (215, 60, '2022-02-25 16:00:00');
INSERT INTO "public"."tbl_borrow" VALUES (216, 60, '2022-02-25 16:01:00');
INSERT INTO "public"."tbl_borrow" VALUES (217, 60, '2022-02-25 16:04:00');
INSERT INTO "public"."tbl_borrow" VALUES (218, 61, '2022-02-25 16:04:00');
INSERT INTO "public"."tbl_borrow" VALUES (219, 61, '2022-02-25 16:04:00');
INSERT INTO "public"."tbl_borrow" VALUES (220, 60, '2022-02-25 16:07:00');
INSERT INTO "public"."tbl_borrow" VALUES (221, 60, '2022-02-25 16:07:00');
INSERT INTO "public"."tbl_borrow" VALUES (222, 61, '2022-02-25 16:09:00');
INSERT INTO "public"."tbl_borrow" VALUES (223, 61, '2022-02-25 16:33:00');

-- ----------------------------
-- Table structure for tbl_borrow_detail
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_borrow_detail";
CREATE TABLE "public"."tbl_borrow_detail" (
  "borrow_detail_id" int4 NOT NULL DEFAULT nextval('tbl_borrow_detail_borrow_detail_id_seq'::regclass),
  "asset_id" int4 NOT NULL,
  "return_date" varchar(255) COLLATE "pg_catalog"."default",
  "borrow_id" int4 NOT NULL,
  "status" int4 NOT NULL DEFAULT 0,
  "is_disabled" int4 NOT NULL DEFAULT 0
)
;

-- ----------------------------
-- Records of tbl_borrow_detail
-- ----------------------------
INSERT INTO "public"."tbl_borrow_detail" VALUES (771, 150, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (770, 154, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (769, 155, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (731, 150, '2022-02-25 15:45:43', 206, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (732, 150, '2022-02-25 15:45:43', 215, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (740, 150, '2022-02-25 16:01:04', 215, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (741, 150, '2022-02-25 16:01:04', 216, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (742, 149, '2022-02-25 16:01:04', 216, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (745, 148, '2022-02-25 16:03:48', 216, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (744, 149, '2022-02-25 16:03:48', 216, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (743, 150, '2022-02-25 16:03:48', 216, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (739, 141, '2022-02-25 16:03:48', 214, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (738, 142, '2022-02-25 16:03:48', 214, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (718, 154, '2022-02-25 15:41:20', 202, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (719, 154, '2022-02-25 15:41:20', 206, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (730, 154, '2022-02-25 15:45:43', 206, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (720, 143, '2022-02-25 15:41:20', 203, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (721, 143, '2022-02-25 15:42:43', 203, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (722, 143, '2022-02-25 15:42:43', 204, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (723, 143, '2022-02-25 15:42:43', 205, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (727, 143, '2022-02-25 15:44:19', 205, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (725, 143, '2022-02-25 15:44:19', 205, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (724, 143, '2022-02-25 15:44:19', 204, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (728, 143, '2022-02-25 15:44:19', 207, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (726, 143, '2022-02-25 15:44:19', 207, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (752, 141, '2022-02-25 16:09:32', 221, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (751, 142, '2022-02-25 16:09:32', 221, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (733, 143, '2022-02-25 15:56:05', 207, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (750, 148, '2022-02-25 16:09:32', 221, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (749, 143, '2022-02-25 16:09:32', 221, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (748, 148, '2022-02-25 16:09:32', 220, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (747, 149, '2022-02-25 16:09:32', 220, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (746, 150, '2022-02-25 16:09:32', 220, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (729, 142, '2022-02-25 15:44:19', 207, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (734, 142, '2022-02-25 15:56:05', 207, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (735, 142, '2022-02-25 15:56:05', 213, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (736, 142, '2022-02-25 15:58:33', 213, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (737, 142, '2022-02-25 15:58:33', 214, 1, 1);
INSERT INTO "public"."tbl_borrow_detail" VALUES (768, 137, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (767, 138, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (766, 139, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (765, 140, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (764, 141, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (763, 142, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (762, 143, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (761, 144, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (760, 145, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (759, 146, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (758, 147, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (757, 148, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (756, 149, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (755, 150, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (754, 154, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (753, 155, '2022-02-25 16:11:02', 222, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (784, 137, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (783, 138, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (782, 139, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (781, 140, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (780, 141, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (779, 142, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (778, 143, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (777, 144, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (776, 145, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (775, 146, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (774, 147, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (773, 148, '2022-02-25 16:35:04', 223, 1, 0);
INSERT INTO "public"."tbl_borrow_detail" VALUES (772, 149, '2022-02-25 16:35:04', 223, 1, 0);

-- ----------------------------
-- Table structure for tbl_inventory
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_inventory";
CREATE TABLE "public"."tbl_inventory" (
  "inventory_id" int4 NOT NULL DEFAULT nextval('tbl_inventory_inventory_id_seq'::regclass),
  "inventory_person_id" int4 NOT NULL,
  "inventory_date" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "note" text COLLATE "pg_catalog"."default",
  "inventory_code" varchar(15) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tbl_inventory
-- ----------------------------
INSERT INTO "public"."tbl_inventory" VALUES (77, 60, '2022-02-25', '', 'CTKK-2502-1');
INSERT INTO "public"."tbl_inventory" VALUES (78, 60, '2022-02-25', '', 'CTKK-2502-2');

-- ----------------------------
-- Table structure for tbl_inventory_detail
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_inventory_detail";
CREATE TABLE "public"."tbl_inventory_detail" (
  "inventory_detail_id" int4 NOT NULL DEFAULT nextval('tbl_inventory_detail_inventory_detail_id_seq'::regclass),
  "asset_id" int4 NOT NULL,
  "before_status" int4,
  "inventory_status" int4,
  "note" text COLLATE "pg_catalog"."default",
  "inventory_id" int4 NOT NULL
)
;

-- ----------------------------
-- Records of tbl_inventory_detail
-- ----------------------------
INSERT INTO "public"."tbl_inventory_detail" VALUES (314, 148, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (315, 149, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (316, 150, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (317, 155, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (318, 147, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (319, 144, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (320, 145, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (321, 146, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (322, 154, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (323, 141, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (324, 142, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (325, 143, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (326, 137, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (327, 138, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (328, 139, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (329, 140, 1, 1, '', 77);
INSERT INTO "public"."tbl_inventory_detail" VALUES (330, 139, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (331, 140, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (332, 141, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (333, 142, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (334, 143, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (335, 144, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (336, 145, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (337, 146, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (338, 147, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (339, 148, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (340, 149, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (341, 154, 3, 3, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (342, 150, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (343, 155, 2, 2, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (344, 137, 1, 1, '', 78);
INSERT INTO "public"."tbl_inventory_detail" VALUES (345, 138, 1, 1, '', 78);

-- ----------------------------
-- Table structure for tbl_roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_roles";
CREATE TABLE "public"."tbl_roles" (
  "role_id" int4 NOT NULL DEFAULT nextval('tbl_roles_role_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "is_disabled" int4 NOT NULL DEFAULT 0,
  "deleted_at" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tbl_roles
-- ----------------------------
INSERT INTO "public"."tbl_roles" VALUES (2, 'Người quản lý', 0, NULL);
INSERT INTO "public"."tbl_roles" VALUES (3, 'Nhân viên', 0, NULL);

-- ----------------------------
-- Table structure for tbl_state
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_state";
CREATE TABLE "public"."tbl_state" (
  "state_id" int4 NOT NULL DEFAULT nextval('tbl_state_state_id_seq'::regclass),
  "state_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "is_delete" int4
)
;

-- ----------------------------
-- Records of tbl_state
-- ----------------------------
INSERT INTO "public"."tbl_state" VALUES (1, 'Đang sử dụng', 0);
INSERT INTO "public"."tbl_state" VALUES (2, 'Rảnh', 0);
INSERT INTO "public"."tbl_state" VALUES (5, 'Mất', 0);

-- ----------------------------
-- Table structure for tbl_status
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_status";
CREATE TABLE "public"."tbl_status" (
  "status_id" int8 NOT NULL DEFAULT nextval('tbl_status_status_id_seq'::regclass),
  "status_name" varchar(255) COLLATE "pg_catalog"."default",
  "is_delete" int4 DEFAULT 0
)
;

-- ----------------------------
-- Records of tbl_status
-- ----------------------------
INSERT INTO "public"."tbl_status" VALUES (1, 'Nguyên vẹn', 0);
INSERT INTO "public"."tbl_status" VALUES (2, 'Hư hỏng', 0);
INSERT INTO "public"."tbl_status" VALUES (3, 'Mất', 0);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_user";
CREATE TABLE "public"."tbl_user" (
  "user_id" int4 NOT NULL DEFAULT nextval('tbl_human_resources_human_rsc_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "phone" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "is_disabled" int4 NOT NULL DEFAULT 0,
  "deleted_at" varchar(255) COLLATE "pg_catalog"."default",
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "role_id" int4 NOT NULL,
  "image" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO "public"."tbl_user" VALUES (61, 'User01', '0123456789', 'user01@gmail.com', 0, NULL, '202cb962ac59075b964b07152d234b70', 3, 'hinh-anh-cute-de-thuong.jpg');
INSERT INTO "public"."tbl_user" VALUES (60, 'Nguyễn Hoàng Trường', '0704804311', 'hoangtruong1808@gmail.com', 0, NULL, '202cb962ac59075b964b07152d234b70', 2, 'Bo-suu-tap-1001-hinh-anh-mang-dep-an-tuong-nhat-nam-2021.jpg');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."borrow_id_seq"
OWNED BY "public"."tbl_borrow"."borrow_id";
SELECT setval('"public"."borrow_id_seq"', 223, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_borrow_detail_borrow_detail_id_seq"
OWNED BY "public"."tbl_borrow_detail"."borrow_detail_id";
SELECT setval('"public"."tbl_borrow_detail_borrow_detail_id_seq"', 784, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_human_resources_human_rsc_id_seq"
OWNED BY "public"."tbl_user"."user_id";
SELECT setval('"public"."tbl_human_resources_human_rsc_id_seq"', 61, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_inventory_detail_inventory_detail_id_seq"
OWNED BY "public"."tbl_inventory_detail"."inventory_detail_id";
SELECT setval('"public"."tbl_inventory_detail_inventory_detail_id_seq"', 345, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_inventory_inventory_id_seq"
OWNED BY "public"."tbl_inventory"."inventory_id";
SELECT setval('"public"."tbl_inventory_inventory_id_seq"', 78, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_physical_asset_physical_id_seq"
OWNED BY "public"."tbl_asset"."asset_id";
SELECT setval('"public"."tbl_physical_asset_physical_id_seq"', 158, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_physical_group_physical_grp_id_seq"
OWNED BY "public"."tbl_asset_group"."group_id";
SELECT setval('"public"."tbl_physical_group_physical_grp_id_seq"', 190, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_roles_role_id_seq"
OWNED BY "public"."tbl_roles"."role_id";
SELECT setval('"public"."tbl_roles_role_id_seq"', 9, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_state_state_id_seq"
OWNED BY "public"."tbl_state"."state_id";
SELECT setval('"public"."tbl_state_state_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_status_status_id_seq"
OWNED BY "public"."tbl_status"."status_id";
SELECT setval('"public"."tbl_status_status_id_seq"', 3, true);

-- ----------------------------
-- Primary Key structure for table tbl_asset
-- ----------------------------
ALTER TABLE "public"."tbl_asset" ADD CONSTRAINT "tbl_physical_asset_pkey" PRIMARY KEY ("asset_id");

-- ----------------------------
-- Primary Key structure for table tbl_asset_group
-- ----------------------------
ALTER TABLE "public"."tbl_asset_group" ADD CONSTRAINT "tbl_physical_group_pkey" PRIMARY KEY ("group_id");

-- ----------------------------
-- Primary Key structure for table tbl_borrow
-- ----------------------------
ALTER TABLE "public"."tbl_borrow" ADD CONSTRAINT "tbl_borrow_physical_pkey" PRIMARY KEY ("borrow_id");

-- ----------------------------
-- Primary Key structure for table tbl_borrow_detail
-- ----------------------------
ALTER TABLE "public"."tbl_borrow_detail" ADD CONSTRAINT "tbl_borrow_detail_pkey" PRIMARY KEY ("borrow_detail_id");

-- ----------------------------
-- Primary Key structure for table tbl_inventory
-- ----------------------------
ALTER TABLE "public"."tbl_inventory" ADD CONSTRAINT "tbl_inventory_pkey" PRIMARY KEY ("inventory_id");

-- ----------------------------
-- Primary Key structure for table tbl_inventory_detail
-- ----------------------------
ALTER TABLE "public"."tbl_inventory_detail" ADD CONSTRAINT "tbl_inventory_detail_pkey" PRIMARY KEY ("inventory_detail_id");

-- ----------------------------
-- Primary Key structure for table tbl_roles
-- ----------------------------
ALTER TABLE "public"."tbl_roles" ADD CONSTRAINT "tbl_roles_pkey" PRIMARY KEY ("role_id");

-- ----------------------------
-- Primary Key structure for table tbl_state
-- ----------------------------
ALTER TABLE "public"."tbl_state" ADD CONSTRAINT "tbl_state_pkey" PRIMARY KEY ("state_id");

-- ----------------------------
-- Primary Key structure for table tbl_status
-- ----------------------------
ALTER TABLE "public"."tbl_status" ADD CONSTRAINT "tbl_status_pkey" PRIMARY KEY ("status_id");

-- ----------------------------
-- Primary Key structure for table tbl_user
-- ----------------------------
ALTER TABLE "public"."tbl_user" ADD CONSTRAINT "tbl_human_resources_pkey" PRIMARY KEY ("user_id");

-- ----------------------------
-- Foreign Keys structure for table tbl_asset
-- ----------------------------
ALTER TABLE "public"."tbl_asset" ADD CONSTRAINT "tbl_asset_asset_group_id_fkey" FOREIGN KEY ("asset_group_id") REFERENCES "public"."tbl_asset_group" ("group_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."tbl_asset" ADD CONSTRAINT "tbl_asset_state_fkey" FOREIGN KEY ("state") REFERENCES "public"."tbl_state" ("state_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."tbl_asset" ADD CONSTRAINT "tbl_asset_status_fkey" FOREIGN KEY ("status") REFERENCES "public"."tbl_status" ("status_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table tbl_borrow
-- ----------------------------
ALTER TABLE "public"."tbl_borrow" ADD CONSTRAINT "tbl_borrow_person_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."tbl_user" ("user_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table tbl_borrow_detail
-- ----------------------------
ALTER TABLE "public"."tbl_borrow_detail" ADD CONSTRAINT "tbl_borrow_detail_asset_id_fkey" FOREIGN KEY ("asset_id") REFERENCES "public"."tbl_asset" ("asset_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."tbl_borrow_detail" ADD CONSTRAINT "tbl_borrow_detail_borrow_id_fkey" FOREIGN KEY ("borrow_id") REFERENCES "public"."tbl_borrow" ("borrow_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table tbl_inventory
-- ----------------------------
ALTER TABLE "public"."tbl_inventory" ADD CONSTRAINT "tbl_inventory_inventory_person_id_fkey" FOREIGN KEY ("inventory_person_id") REFERENCES "public"."tbl_user" ("user_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table tbl_inventory_detail
-- ----------------------------
ALTER TABLE "public"."tbl_inventory_detail" ADD CONSTRAINT "tbl_inventory_detail_asset_id_fkey" FOREIGN KEY ("asset_id") REFERENCES "public"."tbl_asset" ("asset_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table tbl_user
-- ----------------------------
ALTER TABLE "public"."tbl_user" ADD CONSTRAINT "tbl_user_role_id_fkey" FOREIGN KEY ("role_id") REFERENCES "public"."tbl_roles" ("role_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
