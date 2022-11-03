/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : surat

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 03/11/2022 14:10:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_agenda
-- ----------------------------
DROP TABLE IF EXISTS `t_agenda`;
CREATE TABLE `t_agenda`  (
  `id_agenda` int NOT NULL AUTO_INCREMENT,
  `agenda_no_keluar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_tgl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_waktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_dari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_diterima_tgl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `otorisasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1 sekretaris; 2 kaban; 3 kabid; 4 subkor\r\n',
  `agenda_dari_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1 agenda keluar; 2 agenda masuk',
  `agenda_no_masuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_agenda
-- ----------------------------
INSERT INTO `t_agenda` VALUES (68, NULL, '2022-02-01', '   sada   ', 'kejari sukomanunggal', '16:01', 'kejati', '2022-02-01', 'Segera! Jangan Terlambat;Siapkan;', '1', '001', NULL, NULL, '2', '005/123/2022');
INSERT INTO `t_agenda` VALUES (69, 'tes keluar', '2022-02-02', ' ere ', 'erer', '16:20', 'Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah', NULL, NULL, '0', '002', '3', '5', '1', NULL);
INSERT INTO `t_agenda` VALUES (70, NULL, '2022-02-10', '            23', '23', '09:56', 'tes masuk', '2022-02-09', 'pelajari;Rapat-koordinasikan;Segera! Jangan Terlambat;', '1', '003', NULL, NULL, '2', '055/43');

-- ----------------------------
-- Table structure for t_agenda_disposisi
-- ----------------------------
DROP TABLE IF EXISTS `t_agenda_disposisi`;
CREATE TABLE `t_agenda_disposisi`  (
  `id_agenda_dispo` int NOT NULL AUTO_INCREMENT,
  `id_t_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_agenda_dispo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_ke_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_dari_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_dari_id_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_ke_sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_ke_staf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda_dispo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_agenda_disposisi
-- ----------------------------
INSERT INTO `t_agenda_disposisi` VALUES (108, '64', '2022-02-01 09:56:19', '5', '6', '1', NULL, NULL, NULL, NULL);
INSERT INTO `t_agenda_disposisi` VALUES (109, '68', '2022-02-01 10:14:46', '4', '6', '1', NULL, NULL, NULL, NULL);
INSERT INTO `t_agenda_disposisi` VALUES (110, '68', '2022-02-01 10:14:46', '5', '6', '1', '1', NULL, NULL, NULL);
INSERT INTO `t_agenda_disposisi` VALUES (111, '68', '2022-02-01 10:19:06', '7', '5', '3', NULL, NULL, 'ke saya;koordinasikan;', NULL);
INSERT INTO `t_agenda_disposisi` VALUES (112, '68', '2022-02-01 10:19:06', '8', '5', '3', NULL, NULL, 'ke saya;koordinasikan;', NULL);
INSERT INTO `t_agenda_disposisi` VALUES (113, '69', '2022-02-01 10:24:39', '5', '6', '1', NULL, NULL, NULL, NULL);
INSERT INTO `t_agenda_disposisi` VALUES (114, '70', '2022-02-09 03:56:46', '1', '6', '1', NULL, NULL, NULL, NULL);
INSERT INTO `t_agenda_disposisi` VALUES (115, '70', '2022-02-09 03:56:46', '4', '6', '1', NULL, NULL, NULL, NULL);
INSERT INTO `t_agenda_disposisi` VALUES (116, '70', '2022-02-09 03:56:46', '5', '6', '1', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for t_agenda_keluar
-- ----------------------------
DROP TABLE IF EXISTS `t_agenda_keluar`;
CREATE TABLE `t_agenda_keluar`  (
  `id_agenda_keluar` int NOT NULL AUTO_INCREMENT,
  `agenda_keluar_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_keluar_tgl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_keluar_perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_keluar_tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_keluar_waktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_keluar_dari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_diterima_tgl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `otorisasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1 sekretaris; 2 kaban',
  `agenda_dari_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agenda_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1 agenda keluar; 2 agenda masuk',
  `agenda_no_masuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda_keluar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_agenda_keluar
-- ----------------------------

-- ----------------------------
-- Table structure for t_agenda_keluar_disposisi
-- ----------------------------
DROP TABLE IF EXISTS `t_agenda_keluar_disposisi`;
CREATE TABLE `t_agenda_keluar_disposisi`  (
  `id_agenda_dispo` int NOT NULL AUTO_INCREMENT,
  `id_t_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_agenda_dispo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_ke_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_dari_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_dari_id_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_ke_sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_ke_staf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dispo_id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda_dispo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 108 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_agenda_keluar_disposisi
-- ----------------------------

-- ----------------------------
-- Table structure for t_bidang
-- ----------------------------
DROP TABLE IF EXISTS `t_bidang`;
CREATE TABLE `t_bidang`  (
  `id_bidang` int NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atasan_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_bidang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_bidang
-- ----------------------------
INSERT INTO `t_bidang` VALUES (1, 'Sekretariat', 'SEKRETARIAT', 'y', '6');
INSERT INTO `t_bidang` VALUES (2, 'Bidang Anggaran', 'ANGGARAN', 'y', '6');
INSERT INTO `t_bidang` VALUES (3, 'Bidang Perbendaharaan dan Akuntansi', 'PA', 'y', '6');
INSERT INTO `t_bidang` VALUES (4, 'Bidang Penatausahaan, Pemanfaatan dan Pemindahtanganan\r\nBarang Milik Daerah\r', 'P3BMD', 'y', '6');
INSERT INTO `t_bidang` VALUES (5, 'Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah', 'PPSBMD', 'y', '6');
INSERT INTO `t_bidang` VALUES (6, 'Kepala Badan Pengelolaan Keuangan dan Aset Daerah', 'KA BAN', 'y', NULL);
INSERT INTO `t_bidang` VALUES (7, 'Sub Koordinator Penyelesaian Sengketa Barang Milik Daerah', 'SUB KOORDINATOR', 'y', '5');
INSERT INTO `t_bidang` VALUES (8, 'Sub Koordinator Pengamanan dan Pengawasan Barang Milik Daerah\r\n', 'SUB KOORDINATOR', 'y', '5');
INSERT INTO `t_bidang` VALUES (9, 'Sub Koordinator Umum dan Kepegawaian ', 'SUB KOORDINATOR', 'y', '1');
INSERT INTO `t_bidang` VALUES (10, 'Sub Koordinator Penyusunan Anggaran Pendapatan Belanja Daerah', 'SUB KOORDINATOR', 'y', '2');
INSERT INTO `t_bidang` VALUES (11, 'Sub Koordinator Penyusunan Kebijakan Anggaran', 'SUB KOORDINATOR', 'y', '2');
INSERT INTO `t_bidang` VALUES (12, 'Sub Koordinator Perbendaharaan dan Kas Daerah', 'SUB KOORDINATOR', 'y', '3');
INSERT INTO `t_bidang` VALUES (13, 'Sub Koordinator Akuntansi', 'SUB KOORDINATOR', 'y', '3');
INSERT INTO `t_bidang` VALUES (14, 'Sub Koordinator Perencanaan, Penatausahaan dan Penggunaan Barang Milik Daerah', 'SUB KOORDINATOR', 'y', '4');
INSERT INTO `t_bidang` VALUES (15, 'Sub Koordinator Pemanfaatan dan Pemindahtanganan Barang Milik Daerah', 'SUB KOORDINATOR', 'y', '4');
INSERT INTO `t_bidang` VALUES (18, 'Staff Sub Koordinator Penyelesaian Sengketa Barang Milik Daerah', 'STAFF SUB KOORDINATOR', 'y', '7');
INSERT INTO `t_bidang` VALUES (19, 'Staff Sub Koordinator Pengamanan dan Pengawasan Barang Milik Daerah', 'STAFF SUB KOORDINATOR', 'y', '8');
INSERT INTO `t_bidang` VALUES (20, 'Staff Sub Koordinator Perencanaan, Penatausahaan dan Penggunaan Barang Milik Daerah', 'STAFF SUB KOORDINATOR', 'y', '14');
INSERT INTO `t_bidang` VALUES (21, 'Sub Bagian Keuangan', 'SUB KOORDINATOR', 'y', '1');
INSERT INTO `t_bidang` VALUES (22, 'Staff Sub Koordinator Umum dan Kepegawaian', 'STAFF SUB KOORDINATOR', 'y', '9');
INSERT INTO `t_bidang` VALUES (23, 'Staff Sub Koordinator Penyusunan Kebijakan Anggaran', 'STAFF SUB KOORDINATOR', 'y', '11');
INSERT INTO `t_bidang` VALUES (24, 'Staff Sub Koordinator Penyusunan Anggaran Pendapatan Belanja Daerah', 'STAFF SUB KOORDINATOR', 'y', '10');
INSERT INTO `t_bidang` VALUES (25, 'Staff Sub Bagian Keuangan', 'STAFF SUB KOORDINATOR', 'y', '21');
INSERT INTO `t_bidang` VALUES (26, 'Staff Sub Koordinator Akuntansi', 'STAFF SUB KOORDINATOR', 'y', '13');
INSERT INTO `t_bidang` VALUES (27, 'Staff Sub Koordinator Perbendaharaan dan Kas Daerah', 'STAFF SUB KOORDINATOR', 'y', '12');
INSERT INTO `t_bidang` VALUES (28, 'Staff Sub Koordinator Pemanfaatan dan Pemindahtanganan Barang Milik Daerah', 'STAFF SUB KOORDINATOR', 'y', '15');

-- ----------------------------
-- Table structure for t_file_agenda
-- ----------------------------
DROP TABLE IF EXISTS `t_file_agenda`;
CREATE TABLE `t_file_agenda`  (
  `id_file_agenda` int NOT NULL AUTO_INCREMENT,
  `t_id_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_file_agenda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_file_agenda
-- ----------------------------
INSERT INTO `t_file_agenda` VALUES (11, '53', 'TUGAS BIDANG PENGAMANAN DAN PENYELESAIAN SENGKETA BMD.pdf');
INSERT INTO `t_file_agenda` VALUES (12, '54', '389847902');
INSERT INTO `t_file_agenda` VALUES (13, '55', '806826594');
INSERT INTO `t_file_agenda` VALUES (14, '56', '16433019443997_KEPWALI_188.45-287-436.1.2-2021-2021.pdf');
INSERT INTO `t_file_agenda` VALUES (15, '57', '1643302477Surat pengisian opsplan.pdf');
INSERT INTO `t_file_agenda` VALUES (16, '58', 'DUPAK_BANDAREJO_II_26.pdf');
INSERT INTO `t_file_agenda` VALUES (17, '59', 'undangan-masuk-01022022-cb52c448a8.pdf');
INSERT INTO `t_file_agenda` VALUES (18, '60', 'undangan-keluar-01022022-b616871b2d.pdf');
INSERT INTO `t_file_agenda` VALUES (19, '61', 'undangan-keluar-01022022-ceb1e10301.pdf');
INSERT INTO `t_file_agenda` VALUES (20, '61', 'undangan-keluar-01022022-d3af672047.pdf');
INSERT INTO `t_file_agenda` VALUES (21, '61', 'undangan-keluar-01022022-c184072d06.pdf');
INSERT INTO `t_file_agenda` VALUES (22, '62', 'undangan-keluar-01022022-e4d1d67082.pdf');
INSERT INTO `t_file_agenda` VALUES (23, '62', 'undangan-keluar-01022022-eff88bcd4e.pdf');
INSERT INTO `t_file_agenda` VALUES (24, '63', 'undangan-keluar-01022022-9252156e5d.pdf');
INSERT INTO `t_file_agenda` VALUES (25, '63', 'undangan-keluar-01022022-9252156e5d.pdf');
INSERT INTO `t_file_agenda` VALUES (26, '64', 'undangan-keluar-01022022-be96d688af.pdf');
INSERT INTO `t_file_agenda` VALUES (27, '65', 'undangan-masuk-01022022-5f2bd28af4.pdf');
INSERT INTO `t_file_agenda` VALUES (28, '68', 'undangan-01022022-34604439bf.pdf');
INSERT INTO `t_file_agenda` VALUES (29, '69', 'undangan-keluar-01022022-9c3c7e7ae3.pdf');

-- ----------------------------
-- Table structure for t_file_agenda_keluar
-- ----------------------------
DROP TABLE IF EXISTS `t_file_agenda_keluar`;
CREATE TABLE `t_file_agenda_keluar`  (
  `id_file_agenda` int NOT NULL AUTO_INCREMENT,
  `t_id_agenda_keluar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_file_agenda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_file_agenda_keluar
-- ----------------------------
INSERT INTO `t_file_agenda_keluar` VALUES (11, '53', 'TUGAS BIDANG PENGAMANAN DAN PENYELESAIAN SENGKETA BMD.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (12, '54', '389847902');
INSERT INTO `t_file_agenda_keluar` VALUES (13, '55', '806826594');
INSERT INTO `t_file_agenda_keluar` VALUES (14, '56', '16433019443997_KEPWALI_188.45-287-436.1.2-2021-2021.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (15, '57', '1643302477Surat pengisian opsplan.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (16, '58', 'DUPAK_BANDAREJO_II_26.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (17, '59', 'undangan-masuk-01022022-cb52c448a8.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (18, '60', 'undangan-keluar-01022022-b616871b2d.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (19, '61', 'undangan-keluar-01022022-ceb1e10301.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (20, '61', 'undangan-keluar-01022022-d3af672047.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (21, '61', 'undangan-keluar-01022022-c184072d06.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (22, '62', 'undangan-keluar-01022022-e4d1d67082.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (23, '62', 'undangan-keluar-01022022-eff88bcd4e.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (24, '63', 'undangan-keluar-01022022-9252156e5d.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (25, '63', 'undangan-keluar-01022022-9252156e5d.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (26, '64', 'undangan-keluar-01022022-be96d688af.pdf');
INSERT INTO `t_file_agenda_keluar` VALUES (27, '65', 'undangan-masuk-01022022-5f2bd28af4.pdf');

-- ----------------------------
-- Table structure for t_file_surat
-- ----------------------------
DROP TABLE IF EXISTS `t_file_surat`;
CREATE TABLE `t_file_surat`  (
  `id_file` int NOT NULL AUTO_INCREMENT,
  `id_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_file`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_file_surat
-- ----------------------------
INSERT INTO `t_file_surat` VALUES (18, '63', 'WhatsApp_Image_2022-01-12_at_16_54_56.jpeg');
INSERT INTO `t_file_surat` VALUES (19, '67', 'Surat-01022022-938512403f.pdf');
INSERT INTO `t_file_surat` VALUES (20, '68', 'Surat-01022022-c47b34200a.pdf');
INSERT INTO `t_file_surat` VALUES (21, '69', 'Surat-01022022-a77450fb3b.pdf');

-- ----------------------------
-- Table structure for t_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan`  (
  `id_jabatan` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_jabatan
-- ----------------------------
INSERT INTO `t_jabatan` VALUES (1, 'KEPALA BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KOTA SURABAYA');
INSERT INTO `t_jabatan` VALUES (2, 'SEKRETARIAT');
INSERT INTO `t_jabatan` VALUES (3, 'KEPALA BIDANG');
INSERT INTO `t_jabatan` VALUES (4, 'SUB KOORDINATOR');
INSERT INTO `t_jabatan` VALUES (5, 'STAFF');

-- ----------------------------
-- Table structure for t_opd
-- ----------------------------
DROP TABLE IF EXISTS `t_opd`;
CREATE TABLE `t_opd`  (
  `id_opd` int NOT NULL AUTO_INCREMENT,
  `nama_opd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_opd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_opd
-- ----------------------------
INSERT INTO `t_opd` VALUES (1, 'KOMINFO', NULL);
INSERT INTO `t_opd` VALUES (2, 'BAGIAN HUKUM', NULL);

-- ----------------------------
-- Table structure for t_sub_kor
-- ----------------------------
DROP TABLE IF EXISTS `t_sub_kor`;
CREATE TABLE `t_sub_kor`  (
  `id_sub` int NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sub`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_sub_kor
-- ----------------------------

-- ----------------------------
-- Table structure for t_surat
-- ----------------------------
DROP TABLE IF EXISTS `t_surat`;
CREATE TABLE `t_surat`  (
  `id_surat` int NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'undangan; surat',
  `surat_dari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surat_diterima_tgl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surat_disposisi_tgl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surat_disposisi_id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surat_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_agenda_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surat_tanggal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surat_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '0 belum disposisi; 1 sdh disposisi',
  `surat_perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_disposisi_sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_disposisi_staf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_surat
-- ----------------------------
INSERT INTO `t_surat` VALUES (69, 'BI.000/303030', NULL, 'kejari', '2022-02-01', NULL, NULL, 'Ikut Hadir;Laporkan Hasilnya;', '001', '2022-02-01', NULL, '1', '               ', NULL, NULL);
INSERT INTO `t_surat` VALUES (70, ' ', NULL, ' ', '2022-02-08', NULL, NULL, NULL, '002', '2022-02-09', NULL, '0', '             ', NULL, NULL);

-- ----------------------------
-- Table structure for t_surat_disposisi
-- ----------------------------
DROP TABLE IF EXISTS `t_surat_disposisi`;
CREATE TABLE `t_surat_disposisi`  (
  `id_surat_disposisi` int NOT NULL AUTO_INCREMENT,
  `id_t_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_surat_disposisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `disposisi_ke_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_user_staf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `disposisi_dari_id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `disposisi_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `disposisi_dari_id_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `disposisi_ke_sub` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `disposisi_ke_staf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `disposisi_id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat_disposisi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 149 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_surat_disposisi
-- ----------------------------
INSERT INTO `t_surat_disposisi` VALUES (147, '69', '2022-02-01 10:30:24', '6', NULL, '6', NULL, '1', NULL, NULL, NULL);
INSERT INTO `t_surat_disposisi` VALUES (148, '69', '2022-02-01 10:30:24', '1', NULL, '6', NULL, '1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aktif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES (1, 'fikri', 'fikri', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', 'y', NULL, NULL, NULL);
INSERT INTO `t_user` VALUES (2, 'IGNATIUS HOTLAN HAHLONGAN, SH', '198109292006041018', 'e10adc3949ba59abbe56e057f20f883e', 'kabid', 'y', '3', '5', '198109292006041018\r\n');
INSERT INTO `t_user` VALUES (3, 'TRIA KARTIKAWATI, ST', '197912182006042000', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'y', '4', '8', '197912182006042000\r\n');
INSERT INTO `t_user` VALUES (4, 'DINA ANGGRAENI, S.H', '198208022006042027', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'y', '4', '7', '198208022006042027\r\n');
INSERT INTO `t_user` VALUES (5, 'IRA TURSILOWATI, SH. MH.', '196910171993032006', 'e10adc3949ba59abbe56e057f20f883e', 'kaban', 'y', '1', '6', '196910171993032006');
INSERT INTO `t_user` VALUES (6, 'IBRAHIM ZAKY, ST', '198110092006041017', 'e10adc3949ba59abbe56e057f20f883e', 'kabid', 'y', '3', '4', '198110092006041017');
INSERT INTO `t_user` VALUES (7, 'TOTOK PRATIKNO, S.H, M.H', '197904062006041026', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'y', '4', '14', '197904062006041026');
INSERT INTO `t_user` VALUES (8, 'ARIN DIANA TRI ERNIAWATI, SE', '197303092001122002', 'e10adc3949ba59abbe56e057f20f883e', 'sekretaris', 'y', '2', '1', '197303092001122002');
INSERT INTO `t_user` VALUES (9, 'TEJO SOELISTYO SH', '197612112009011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '18', '197612112009011001');
INSERT INTO `t_user` VALUES (10, 'DINA DWIYANTI, SH, M.Kn', '198406192015012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '18', '198406192015012001');
INSERT INTO `t_user` VALUES (11, 'FAJAR RATIH KUSUWASTUTI', '197302182006042008', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '22', '197302182006042008');
INSERT INTO `t_user` VALUES (12, 'MIMIN MISDYAWATI, ST', '197104152006042019', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'y', '4', '15', '197104152006042019');
INSERT INTO `t_user` VALUES (13, 'ELFA SUSANTI', '197602212008012009', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '22', '197602212008012009');
INSERT INTO `t_user` VALUES (14, 'DYAH WAHYU KUSUMANINGRUM', '198012142010012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '22', '198012142010012001');
INSERT INTO `t_user` VALUES (15, 'TITAH SETYAWATI, SE', '197811172003122006', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'y', '4', '21', '197811172003122006');
INSERT INTO `t_user` VALUES (16, 'NURIDA YUNIASTANTIN, SH MM', '196906202001122003', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'Y', '4', '9', '196906202001122003');
INSERT INTO `t_user` VALUES (17, 'ADHITYA AMARENDRA SE, MSA', '197502232010011004', 'e10adc3949ba59abbe56e057f20f883e', 'kabid', 'Y', '3', '2', '197502232010011004');
INSERT INTO `t_user` VALUES (18, 'SUMADI, SE', '197203151998031009', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'Y', '4', '10', '197203151998031009');
INSERT INTO `t_user` VALUES (19, 'IRFAN TAUFIQ B.COM, M.COMP.STUD', '197805222005011009', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'Y', '4', '11', '197805222005011009');
INSERT INTO `t_user` VALUES (20, 'SJAFRIEL IMAN, SE', '196810131997031001', 'e10adc3949ba59abbe56e057f20f883e', 'kabid', 'Y', '3', '3', '196810131997031001');
INSERT INTO `t_user` VALUES (21, 'AGUNG PAMBUDI, SE,. M.AK', '197511152005011011', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'Y', '4', '13', '197511152005011011');
INSERT INTO `t_user` VALUES (22, 'KASMIATUN SE, MM', '196906301998032006', 'e10adc3949ba59abbe56e057f20f883e', 'kasubsie', 'Y', '4', '12', '196906301998032006');
INSERT INTO `t_user` VALUES (23, 'NURYATINING MUSBIHATIN SE', '197403092010012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '25', '197403092010012001');
INSERT INTO `t_user` VALUES (24, 'GUSTI AYU WIKE PUTRI, SH', '198707022011012005', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '24', '198707022011012005');
INSERT INTO `t_user` VALUES (25, 'WINDA MEIVILANA, SE', '199205092020122005', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '23', '199205092020122005');
INSERT INTO `t_user` VALUES (26, 'SUKEDI, SH', '198010042014121001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '22', '198010042014121001');
INSERT INTO `t_user` VALUES (27, 'IDA KRISTIANI', '197809182009012000', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '22', '197809182009012000');
INSERT INTO `t_user` VALUES (28, 'SLAMET RIYADI', '197808102008011012', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '22', '197808102008011012');
INSERT INTO `t_user` VALUES (29, 'EVI SOESANTI S.E', '197703312009012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '25', '197703312009012001');
INSERT INTO `t_user` VALUES (30, 'SRI WAHYUNI S.Si', '197408022014122001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '25', '197408022014122001');
INSERT INTO `t_user` VALUES (31, 'NUR DIANA RACHMAWATI ', '197806012001122004', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '25', '197806012001122004');
INSERT INTO `t_user` VALUES (32, 'LUCKY MARLINA SARASWATI, S.IP', '198712112015012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '24', '198712112015012001');
INSERT INTO `t_user` VALUES (33, 'JUDI HARDIANTO', '197011202001121002', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '24', '197011202001121002');
INSERT INTO `t_user` VALUES (34, 'ACHMAD SUROKO BUDIDHARMA', '197304152007011026', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '24', '197304152007011026');
INSERT INTO `t_user` VALUES (35, 'TUTIK LESTARI HANDAYANI, SE', '197505152008012014', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '23', '197505152008012014');
INSERT INTO `t_user` VALUES (36, 'FEBRIYANTI PAMUNGKASSARI', '197902192009012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '23', '197902192009012001');
INSERT INTO `t_user` VALUES (37, 'SYAMSUL FACHRI', '196401081986031015', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '26', '196401081986031015');
INSERT INTO `t_user` VALUES (38, 'AGUNG RAMADAN SUPRIYADI', '197509182009011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '26', '197509182009011001');
INSERT INTO `t_user` VALUES (39, 'YANITA FAUZIA, A. Md', '199101082014022001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '26', '199101082014022001');
INSERT INTO `t_user` VALUES (40, 'ILHAM YUDA HUTAMA, A.Md', '198810252019021001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '26', '198810252019021001');
INSERT INTO `t_user` VALUES (41, 'DESTI NINGSIH, A.Md', '199112232020122002', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '26', '199112232020122002');
INSERT INTO `t_user` VALUES (42, 'IMAN RAKHMADI', '197610022006041013', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '26', '197610022006041013');
INSERT INTO `t_user` VALUES (43, 'ANDY ISNAWAN', '197603192007011007', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '27', '197603192007011007');
INSERT INTO `t_user` VALUES (44, 'YENNY RIFAYANTI SURYANI, A.Md', '199607142019022002', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '27', '199607142019022002');
INSERT INTO `t_user` VALUES (45, 'EKO WAHYUNINGSIH TAKARWATI', '196509241992032007', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '27', '196509241992032007');
INSERT INTO `t_user` VALUES (46, 'UMIATI, SE', '196904282007012018', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '27', '196904282007012018');
INSERT INTO `t_user` VALUES (47, 'RUDY SURYANA', '197610092009011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '27', '197610092009011001');
INSERT INTO `t_user` VALUES (48, 'DESI DWI WAHYUNI, A.Md', '199512172020122003', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '27', '199512172020122003');
INSERT INTO `t_user` VALUES (49, 'SULASTRI', '197710082008012013', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197710082008012013');
INSERT INTO `t_user` VALUES (50, 'TRI MURDIANI', '197712022008012013', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197712022008012013');
INSERT INTO `t_user` VALUES (51, 'NURIYAH IRKHAM A.Md', '198905022014022001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '198905022014022001');
INSERT INTO `t_user` VALUES (52, 'ETY WANDRIANI', '197809182009012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197809182009012001');
INSERT INTO `t_user` VALUES (53, 'HALIFAH', '197112152008012011', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197112152008012011');
INSERT INTO `t_user` VALUES (54, 'DIAN DWI NOVITA', '198509292014022001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '198509292014022001');
INSERT INTO `t_user` VALUES (55, 'AINUN MUSTIFA', '197302062008012012', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197302062008012012');
INSERT INTO `t_user` VALUES (56, 'DWI HARIYANTO, S.H', '197110042007011010', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197110042007011010');
INSERT INTO `t_user` VALUES (57, 'HAYADI AGUS MAWARDIANTO, S.T', '199108012015011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '199108012015011001');
INSERT INTO `t_user` VALUES (58, 'HELMI FANANI, SE', '197808092010011008', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197808092010011008');
INSERT INTO `t_user` VALUES (59, 'ARTAULI ELYSABETH LENNY MARBUN', '198604132010012015', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '198604132010012015');
INSERT INTO `t_user` VALUES (60, 'URLI AIRLANG S,H M.H', '199208312020121002', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '199208312020121002');
INSERT INTO `t_user` VALUES (61, 'SUTARYO', '197301192007011013', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197301192007011013');
INSERT INTO `t_user` VALUES (62, 'MAKRUF', '197604272008011009', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '28', '197604272008011009');
INSERT INTO `t_user` VALUES (63, 'BIMO ARYO TEJO, S.SOS', '196707122009011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '196707122009011001');
INSERT INTO `t_user` VALUES (64, 'IFTITA NURIA KHALIDA SE', '198710172010012014', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '198710172010012014');
INSERT INTO `t_user` VALUES (65, 'ANANG SUNTORO', '196907301996021001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '196907301996021001');
INSERT INTO `t_user` VALUES (66, 'SULISTIANAH', '197702052010012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197702052010012001');
INSERT INTO `t_user` VALUES (67, 'AGUS SISWO', '197106302007011015', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197106302007011015');
INSERT INTO `t_user` VALUES (68, 'MEI PUJI RAHAYU, SE', '197805172008012010', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197805172008012010');
INSERT INTO `t_user` VALUES (69, 'GUNTUR WIJAYA MUIN, SE', '199011202020121001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '199011202020121001');
INSERT INTO `t_user` VALUES (70, 'MUHAMMAD ALI FIKRI', '197109202009011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197109202009011001');
INSERT INTO `t_user` VALUES (71, 'TEDY IRAWAN', '197902062009011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197902062009011001');
INSERT INTO `t_user` VALUES (72, 'SULIASIH', '197706252009012001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197706252009012001');
INSERT INTO `t_user` VALUES (73, 'AHMAD ZAINI', '197402102009011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197402102009011001');
INSERT INTO `t_user` VALUES (74, 'SODIKIN', '197109032008011005', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197109032008011005');
INSERT INTO `t_user` VALUES (75, 'NAILIL FARIDHA', '197307262008012004', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '197307262008012004');
INSERT INTO `t_user` VALUES (76, 'RACHMANU ISNAINI', '196901132001121002', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '196901132001121002');
INSERT INTO `t_user` VALUES (77, 'ADITYA DWI JAYA ARIYANTO', '199503222019021000', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '199503222019021000');
INSERT INTO `t_user` VALUES (78, 'AHMAD ADAM YULIAN', '199307020201201001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'y', '5', '20', '199307020201201001');
INSERT INTO `t_user` VALUES (79, 'TRIA JULITA, S.STP', '199209072016092001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '19', '199209072016092001');
INSERT INTO `t_user` VALUES (80, 'MUCHLIS NURHIDAYAT', '199207152015011001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '19', '199207152015011001');
INSERT INTO `t_user` VALUES (81, 'CAVITA EZRA S,H', '199608232020122003', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '19', '199608232020122003');
INSERT INTO `t_user` VALUES (82, 'DEDY DARMAWAN SH', '198104262010011002', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '19', '198104262010011002');
INSERT INTO `t_user` VALUES (83, 'ARDHILLIES TUA SANGAP, ST', '198709202020121001', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '19', '198709202020121001');
INSERT INTO `t_user` VALUES (84, 'TAUFIK SUKADI', '197110152008011007', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Y', '5', '19', '197110152008011007');

SET FOREIGN_KEY_CHECKS = 1;
