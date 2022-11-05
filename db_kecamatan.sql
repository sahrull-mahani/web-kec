/*
 Navicat Premium Data Transfer

 Source Server         : Kominfo
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : db_kecamatan

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 05/11/2022 19:31:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agenda
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isi_agenda` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lokasi` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `published_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of agenda
-- ----------------------------

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isi_berita` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `pesan` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of berita
-- ----------------------------

-- ----------------------------
-- Table structure for berita_view
-- ----------------------------
DROP TABLE IF EXISTS `berita_view`;
CREATE TABLE `berita_view`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_berita` int NOT NULL,
  `ip_address` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of berita_view
-- ----------------------------

-- ----------------------------
-- Table structure for carousel
-- ----------------------------
DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gambar` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of carousel
-- ----------------------------

-- ----------------------------
-- Table structure for datakematian
-- ----------------------------
DROP TABLE IF EXISTS `datakematian`;
CREATE TABLE `datakematian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_desa` int UNSIGNED NOT NULL,
  `individu_id` int UNSIGNED NULL DEFAULT NULL,
  `tgl_kematian` date NOT NULL,
  `jam_kematian` time NOT NULL,
  `tempat_kematian` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_kubur` date NOT NULL,
  `jam_kubur` time NOT NULL,
  `tempat_kubur` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat_kubur` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `datakematian_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `datakematian_individu_id_foreign`(`individu_id`) USING BTREE,
  CONSTRAINT `datakematian_individu_id_foreign` FOREIGN KEY (`individu_id`) REFERENCES `individu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `dk_iddesa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of datakematian
-- ----------------------------
INSERT INTO `datakematian` VALUES (1, 3, 5, '2022-11-08', '11:11:00', 'boroko', '2022-11-09', '00:12:00', 'tempat', 'alamat penguburanasdasda', NULL, NULL);

-- ----------------------------
-- Table structure for datapajak
-- ----------------------------
DROP TABLE IF EXISTS `datapajak`;
CREATE TABLE `datapajak`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_desa` int UNSIGNED NOT NULL,
  `individu_id` int UNSIGNED NULL DEFAULT NULL,
  `wajib_pajak` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah_pajak` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan` enum('Lunas','Belum Lunas') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `datapajak_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `datapajak_individu_id_foreign`(`individu_id`) USING BTREE,
  CONSTRAINT `datapajak_individu_id_foreign` FOREIGN KEY (`individu_id`) REFERENCES `individu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `pajak_id_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of datapajak
-- ----------------------------
INSERT INTO `datapajak` VALUES (1, 1, 3, 'Ya', '123123', 'Lunas', '2022-11-02 13:42:32', '2022-11-02 13:42:32', NULL);
INSERT INTO `datapajak` VALUES (2, 1, 4, 'Ya', '123123', 'Lunas', '2022-11-02 13:52:23', '2022-11-02 13:52:23', NULL);
INSERT INTO `datapajak` VALUES (3, 1, 5, 'Tidak', '10000', 'Lunas', '2022-11-02 15:41:20', '2022-11-02 15:41:20', NULL);

-- ----------------------------
-- Table structure for datapindah
-- ----------------------------
DROP TABLE IF EXISTS `datapindah`;
CREATE TABLE `datapindah`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_desa` int UNSIGNED NOT NULL COMMENT 'desa asal',
  `individu_id` int UNSIGNED NULL DEFAULT NULL,
  `status` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alamat_pindah` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan_pindah` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `datapindah_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `datapindah_individu_id_foreign`(`individu_id`) USING BTREE,
  CONSTRAINT `datapindah_individu_id_foreign` FOREIGN KEY (`individu_id`) REFERENCES `individu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `dp_iddesa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of datapindah
-- ----------------------------
INSERT INTO `datapindah` VALUES (1, 3, 5, 'ayah', '2022-12-10', 'takut miskin', 'bacot', '2022-11-03', '2022-11-03', NULL);

-- ----------------------------
-- Table structure for desa
-- ----------------------------
DROP TABLE IF EXISTS `desa`;
CREATE TABLE `desa`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kepala_desa` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of desa
-- ----------------------------
INSERT INTO `desa` VALUES (1, 'Boroko Timur', 'Sarifudin Abjul', '2022-11-02', '2022-11-02');
INSERT INTO `desa` VALUES (2, 'Boroko', 'Kepala desa Boroko', '2022-11-02', '2022-11-03');
INSERT INTO `desa` VALUES (3, 'Boroko Utara', 'Kepala Desa Boroko Utara', '2022-11-02', '2022-11-02');
INSERT INTO `desa` VALUES (6, 'Kuala Utara', 'Kepala desa Kuala Utara', '2022-11-03', '2022-11-03');
INSERT INTO `desa` VALUES (7, 'Kuala', 'kepala desa kuala', '2022-11-03', '2022-11-03');

-- ----------------------------
-- Table structure for dusun
-- ----------------------------
DROP TABLE IF EXISTS `dusun`;
CREATE TABLE `dusun`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_dusun` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_desa` int UNSIGNED NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `dusun_iddesa`(`id_desa`) USING BTREE,
  CONSTRAINT `dusun_iddesa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dusun
-- ----------------------------
INSERT INTO `dusun` VALUES (5, 'Dusun 2', 1, '2022-11-02', '2022-11-02', NULL);
INSERT INTO `dusun` VALUES (6, 'Dusun 2', 3, '2022-11-02', '2022-11-02', NULL);
INSERT INTO `dusun` VALUES (7, 'Dusun 1', 1, '2022-11-02', '2022-11-02', NULL);

-- ----------------------------
-- Table structure for enumerator
-- ----------------------------
DROP TABLE IF EXISTS `enumerator`;
CREATE TABLE `enumerator`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_enum` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `notelp_enum` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat_enum` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of enumerator
-- ----------------------------
INSERT INTO `enumerator` VALUES (1, 'Sahrul', '08224146', 'Gorontalo', '2022-11-03 09:25:26', '2022-11-03 09:25:26', NULL);

-- ----------------------------
-- Table structure for galeri
-- ----------------------------
DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_sumber` int NOT NULL,
  `sumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of galeri
-- ----------------------------

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Administrator');
INSERT INTO `groups` VALUES (4, 'operator-desa', 'Operator Desa');

-- ----------------------------
-- Table structure for individu
-- ----------------------------
DROP TABLE IF EXISTS `individu`;
CREATE TABLE `individu`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_dusun` int UNSIGNED NOT NULL,
  `kesehatan_id` int UNSIGNED NULL DEFAULT NULL,
  `no_kk` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nik` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `provinsi` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kab_kota` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kecamatan` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kelurahan` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat_lahir` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` enum('0 - 4','5 - 9','10 - 14','15 - 19','20 - 24','25 - 29','30 - 34','35 - 39','40 - 44','45 - 49','50 - 54','55 - 59','60 - 64','65 - 69','70 - 74','75 - 79','80 - 84') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_nikah` enum('Kawin','Tidak Kawin','Duda/Janda') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `suku` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_pekerjaan` enum('Bersekolah','Ibu Rumah Tangga','Tidak Bekerja','Sedang Mencari Pekerjaan','Bekerja') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pekerjaan` enum('Petani Pemilik Lahan','Petani Penyewa','Buruh Tani','Nelayan Pemilik Kapal/Perahu','Nelayan Penyewa Kapal/Perahu','Buruh Nelayan','Guru','Guru Agama','Pedagang','Pengolahan/Industri','PNS','TNI','Perangkat Desa','Pegawai Kantor Desa','TKI','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jamsos` enum('Peserta','Bukan Peserta') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_hp` char(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_wa` char(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `facebook` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `twitter` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `instagram` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_dusun`(`id_dusun`) USING BTREE,
  INDEX `individu_user_id_foreign`(`id_dusun`) USING BTREE,
  INDEX `individu_kesehatan_id_foreign`(`kesehatan_id`) USING BTREE,
  CONSTRAINT `individu_id_dusun` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of individu
-- ----------------------------
INSERT INTO `individu` VALUES (4, 6, 6, '7108052323001229', '7108052323001122', 'Boroko Timur Dusun 2', '71', '7107', '7107050', '7107050005', 'Boroko Timur Dusun 2', 'Laki - Laki', 'Boroko Timur', '2022-03-02', '15 - 19', 'Kawin', 'Budha', 'suku bangsa', 'WNI', 'Bersekolah', 'Petani Pemilik Lahan', 'Peserta', '08080808081', '13231231', 'sadsfasdf@sdfasdfas.sdf', 'safdf', 'asdfaf', 'asdfaf', '2022-11-02 13:52:23', '2022-11-02 13:52:23', NULL);
INSERT INTO `individu` VALUES (5, 7, 6, '7108052323230012', '7108052323230012', 'Boroko Timur Dusun 1', '71', '7107', '7107050', '7107050005', 'Boroko Timur Dusun 1', 'Laki - Laki', 'Boroko Timur', '2022-06-02', '10 - 14', 'Kawin', 'Kristen', 'suku bangsa', 'WNI', '', '', '', '0808080808', '08098090', 'borko', '', '', '', '2022-11-02 15:41:20', '2022-11-02 15:41:20', NULL);

-- ----------------------------
-- Table structure for jumlahpenduduk
-- ----------------------------
DROP TABLE IF EXISTS `jumlahpenduduk`;
CREATE TABLE `jumlahpenduduk`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_dusun` int UNSIGNED NOT NULL,
  `jumlah_jiwa` int NOT NULL,
  `jumlah_kk` int NOT NULL,
  `umur` enum('0 - 4','5 - 9','10 - 14','15 - 19','20 - 24','25 - 29','30 - 34','35 - 39','40 - 44','45 - 49','50 - 54','55 - 59','60 - 64','65 - 69','70 - 74','75 - 79','80 - 84') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah_pria` int NOT NULL,
  `jumlah_wanita` int NOT NULL,
  `jumlah` int NOT NULL,
  `agama_islam` int NOT NULL,
  `agama_kristen` int NOT NULL,
  `agama_katolik` int NOT NULL,
  `agama_hindu` int NOT NULL,
  `agama_budha` int NOT NULL,
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jp_dusun_id`(`id_dusun`) USING BTREE,
  CONSTRAINT `jp_id_dusun` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jumlahpenduduk
-- ----------------------------
INSERT INTO `jumlahpenduduk` VALUES (8, 6, 1, 1, '5 - 9', 0, 0, 0, 0, 0, 0, 0, 1, '<p>keterangan<br></p>', '2022-11-03 19:48:01', '2022-11-03 19:48:01', NULL);

-- ----------------------------
-- Table structure for keadaanpenduduk
-- ----------------------------
DROP TABLE IF EXISTS `keadaanpenduduk`;
CREATE TABLE `keadaanpenduduk`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_dusun` int UNSIGNED NOT NULL,
  `individu_id` int UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `keadaanpenduduk_user_id_foreign`(`id_dusun`) USING BTREE,
  INDEX `keadaanpenduduk_individu_id_foreign`(`individu_id`) USING BTREE,
  CONSTRAINT `keadaanpenduduk_dusun_id_foreign` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `keadaanpenduduk_individu_id_foreign` FOREIGN KEY (`individu_id`) REFERENCES `individu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of keadaanpenduduk
-- ----------------------------
INSERT INTO `keadaanpenduduk` VALUES (5, 6, 4, '2022-11-02 14:09:09', '2022-11-02 14:09:09', NULL);

-- ----------------------------
-- Table structure for kesehatan
-- ----------------------------
DROP TABLE IF EXISTS `kesehatan`;
CREATE TABLE `kesehatan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `bpjs_kes` enum('Peserta','Bukan Peserta') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `muntaber_diare` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hepatitis_e` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jantung` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `demam_berdarah` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `difteri` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tbc_paru` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `campak` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `chikungunya` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kanker` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `malaria` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `leptospirosis` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diabetes` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fluburung_sars` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kolera` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lumpuh` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `covid_19` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gizi_buruk` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hepatitis_b` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lainnya` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rs` int NOT NULL,
  `praktik_bidan` int NOT NULL,
  `rs_bersalin` int NOT NULL,
  `poskesdes` int NOT NULL,
  `puskesmas_inap` int NOT NULL,
  `polindes` int NOT NULL,
  `puskesmas_tanpainap` int NOT NULL,
  `apotik` int NOT NULL,
  `pustu` int NOT NULL,
  `toko_obat` int NOT NULL,
  `poliklinik` int NOT NULL,
  `posyandu` int NOT NULL,
  `praktik_dokter` int NOT NULL,
  `posbindu` int NOT NULL,
  `rumah_bersalin` int NOT NULL,
  `praktik_dukun` int NOT NULL,
  `tunanetra` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tunarungu` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tunawicara` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tunarungu_wicara` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tunadaksa` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tunagrahita` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tunalaras` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eks_kusta` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cacat_ganda` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pasung` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kesehatan
-- ----------------------------
INSERT INTO `kesehatan` VALUES (2, 'Peserta', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2022-11-02 11:44:35', '2022-11-02 11:44:35', NULL);
INSERT INTO `kesehatan` VALUES (3, 'Peserta', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2022-11-02 13:40:30', '2022-11-02 15:47:53', NULL);
INSERT INTO `kesehatan` VALUES (4, 'Peserta', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2022-11-02 13:42:32', '2022-11-02 13:42:32', NULL);
INSERT INTO `kesehatan` VALUES (5, 'Peserta', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2022-11-02 13:51:30', '2022-11-02 13:51:30', NULL);
INSERT INTO `kesehatan` VALUES (6, 'Peserta', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2022-11-02 13:52:23', '2022-11-02 13:52:23', NULL);

-- ----------------------------
-- Table structure for kuliner
-- ----------------------------
DROP TABLE IF EXISTS `kuliner`;
CREATE TABLE `kuliner`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `published_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kuliner
-- ----------------------------

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for pariwisata
-- ----------------------------
DROP TABLE IF EXISTS `pariwisata`;
CREATE TABLE `pariwisata`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `published_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pariwisata
-- ----------------------------

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nip` int NOT NULL,
  `jk` enum('Laki-laki','Perempuan') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat_lahir` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gelar_depan` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gelar_belakang` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pangkat` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pendidikan` enum('S3','S2','S1/D4','D3','D2','D1','SMA/SMK/MA') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lulusan` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photo` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `individu_id` int UNSIGNED NOT NULL,
  `pendidikan` enum('Tidak Sekolah','SD dan Sederajat','SMP dan Sederajat','SMA dan Sederajat','Diploma 1-3','S1 dan Sederajat','S2 dan Sederajat','S3 dan Sederajat','Pesantren, Seminari, Wihara dan Sejenisnya','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bahasa_lokal` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bahasa_formal` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kerja_bakti` int NOT NULL,
  `siskamling` int NOT NULL,
  `pesta_rakyat` int NOT NULL,
  `pertolongan_kematian` int NOT NULL,
  `pertolongan_sakit` int NOT NULL,
  `pertolongan_kecelakaan` int NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pend_idindividu`(`individu_id`) USING BTREE,
  CONSTRAINT `pend_idindividu` FOREIGN KEY (`individu_id`) REFERENCES `individu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES (1, 3, 'Tidak Sekolah', 'bahasa kaidipang', 'bahasa sangsekerta', 1, 1, 1, 1, 1, 1, '2022-11-02 13:42:32', '2022-11-02 13:42:32', NULL);
INSERT INTO `pendidikan` VALUES (2, 4, 'SD dan Sederajat', 'bahasa kaidipang', 'bahasa sangsekerta', 1, 1, 1, 1, 1, 1, '2022-11-02 13:52:23', '2022-11-02 13:52:23', NULL);
INSERT INTO `pendidikan` VALUES (3, 5, 'Tidak Sekolah', 'bahasa kaidipang', 'bahasa sangsekerta', 1, 1, 1, 1, 1, 1, '2022-11-02 15:41:20', '2022-11-02 15:47:53', NULL);

-- ----------------------------
-- Table structure for penghasilan
-- ----------------------------
DROP TABLE IF EXISTS `penghasilan`;
CREATE TABLE `penghasilan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `individu_id` int UNSIGNED NOT NULL,
  `tahun` year NULL DEFAULT NULL,
  `sumber_penghasilan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `penghasilan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ekspor` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penghasilan_individu_id`(`individu_id`) USING BTREE,
  CONSTRAINT `penghasilan_individu_id` FOREIGN KEY (`individu_id`) REFERENCES `individu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of penghasilan
-- ----------------------------
INSERT INTO `penghasilan` VALUES (1, 3, 2022, 'Sapi Potong', '10000', 'Ton', '1000000', 'Sebagian Besar', '2022-11-02 13:42:32', '2022-11-02 15:47:53', NULL);
INSERT INTO `penghasilan` VALUES (2, 4, 2033, 'Tebu', '1231', 'Liter', '123123', 'Semua', '2022-11-02 13:52:23', '2022-11-02 13:52:23', NULL);
INSERT INTO `penghasilan` VALUES (3, 5, 0000, '', '', '', '', '', '2022-11-02 15:41:20', '2022-11-02 15:41:20', NULL);

-- ----------------------------
-- Table structure for penginapan
-- ----------------------------
DROP TABLE IF EXISTS `penginapan`;
CREATE TABLE `penginapan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `published_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of penginapan
-- ----------------------------

-- ----------------------------
-- Table structure for potensi
-- ----------------------------
DROP TABLE IF EXISTS `potensi`;
CREATE TABLE `potensi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `bidang` enum('peristiwa','kelautan','perdagangan','pertanian','industri','pendidikan') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isi_potensi` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `published_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of potensi
-- ----------------------------

-- ----------------------------
-- Table structure for profil
-- ----------------------------
DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of profil
-- ----------------------------
INSERT INTO `profil` VALUES (1, 'sejarah kaidipang', '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>', NULL, NULL, NULL);
INSERT INTO `profil` VALUES (2, 'letak geografis kecamatan kaidipang', '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>', NULL, NULL, NULL);
INSERT INTO `profil` VALUES (3, 'adat & budaya', '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>', NULL, NULL, NULL);
INSERT INTO `profil` VALUES (4, 'visi & misi', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat[|]laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>', NULL, NULL, NULL);
INSERT INTO `profil` VALUES (5, 'sekilas kaidipang', '<p>Loremasdas ipsusaas dolor sisst, amet consectetur adipisicing elit. Minima itaque molestias rem mollitia illum aspernatur tempore adipisci cumque? Cumque iste sequi impedit rem sunt, harum veritatis quis possimus sit itaque ducimus voluptatem quibusdam, ipsam aperiam fuga praesentium dolor libero facilis minus obcaecati voluptatum quidem alias debitis! Maiores iusto ea reiciendis, repellat laudantium pariatur voluptate est aliquid ad soluta, sed id voluptates harum, ipsa possimus earum! Quidem mollitia corrupti omnis magnam rerum veritatis maiores atque aliquid sed eveniet et, qui ea consequuntur distinctio odio eaque. Eum aperiam ad, consequatur eligendi enim assumenda ullam deserunt exercitationem nam. Suscipit sed, hic nulla reiciendis fugiat iure ratione accusantium. Dignissimos nobis consectetur excepturi? Magnam explicabo cupiditate beatae, aliquam hic nulla, rem culpa architecto repudiandae cum eos assumenda, veniam blanditiis iure ut ipsa natus ipsam dignissimos qui suscipit. Quaerat, fuga officia? Ab delectus atque saepe officia, tenetur, earum impedit nam debitis perferendis architecto obcaecati nihil? Nesciunt, neque corrupti at quisquam obcaecati iste quidem dolore dolor non quis assumenda molestiae labore. Repudiandae unde ut ipsam atque doloribus consequatur magni, adipisci nostrum, quod corporis obcaecati sed a natus ullam non enim dolores? Reiciendis animi consectetur qui quidem. Est harum ad expedita maxime! Excepturi, id magni optio vel esse fuga temporibus. Accusamus nisi in ullam, assumenda autem quas aliquid voluptatibus libero blanditiis praesentium cumque, adipisci repudiandae inventore, optio sequi. Eos quisquam suscipit magnam optio excepturi corporis hic omnis. Esse magni at illum deleniti minus, quis dolor culpa? Dolorem expedita saepe suscipit enim officiis id aliquid ratione vero et nihil ea facere facilis iure reprehenderit est temporibus, dicta corrupti dignissimos culpa soluta? Velit praesentium, ex consequatur consequuntur cumque, laboriosam esse tempora ut veritatis sit vero, cum porro pariatur quasi impedit recusandae ipsa quas asperiores. Deleniti ducimus nam quaerat minus sed, quod voluptate quidem, architecto porro beatae dolor dicta adipisci quisquam sapiente! Dignissimos, distinctio. Voluptatibus repudiandae harum at reiciendis. Ducimus accusamus maiores sint voluptate, consectetur impedit odit dignissimos delectus voluptatem iure soluta dolore doloremque ratione exercitationem eius voluptates error corrupti perferendis sapiente, autem magni animi nostrum. Incidunt ut libero atque facilis ullam molestias, dolorum sequi nisi iusto quaerat, ipsam ex magni quo, voluptatibus blanditiis eum. Nostrum modi cupiditate dolor quis porro repellat voluptas numquam voluptatibus tempora, omnis officiis hic expedita dolore accusamus dolores provident fuga! Hic repellat tempora accusantium, recusandae fugit maxime laboriosam. Dicta sequi iste veritatis harum eum, dolorum culpa laudantium quaerat dolores explicabo quos quasi deserunt nihil nisi autem?<br></p>', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for program
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isi_program` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `published_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of program
-- ----------------------------

-- ----------------------------
-- Table structure for rumahtangga
-- ----------------------------
DROP TABLE IF EXISTS `rumahtangga`;
CREATE TABLE `rumahtangga`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_desa` int UNSIGNED NOT NULL,
  `individu_id` int UNSIGNED NULL DEFAULT NULL,
  `enumerator_id` int UNSIGNED NULL DEFAULT NULL,
  `rt_rw` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_telp` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat_tinggal` enum('Milik Sendiri','Kontrak Sewa','Bebas Sewa','Dipinjami','Dinas','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_lahan` enum('Milik Sendiri','Milik Orang Lain','Tanah Negara','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `luas_lantai` int NOT NULL,
  `luas_lahan` int NOT NULL,
  `jenis_lantai` enum('Marmer/Granit','Keramik','Parket/Vinil/Permadani','Ubin/Tegel/Teraso','Kayu/Papan Kualitas Tinggi','Semen/Bata Merah','Bambu','Kayu/Papan Kualitas Rendah','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dinding` enum('Semen/Beton/Kayu Berkualitas Tinggi','Kayu Berkualitas Rendah/Bambu','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jendela` enum('Ada, Berfungsi','Ada, Tidak Berfungsi','Tidak Ada') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `atap` enum('Genteng','Kayu/Jerami','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `penerangan` enum('Listrik PLN','Listrik Non PLN','Lampu Minyak/Lilin','Sumber Penerangan Lainnya','Tidak Ada') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `energi` enum('Gas Kota/LPG/Biogas (Ke P407)','Minyak Tanah/Batu Bara (Ke P407)','Kayu Bakar','Lainnya (Ke P407)') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sumber_kayubakar` enum('Pembelian','Diambil Dari Hutan','Diambil Di Luar/Bukan Hutan','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tps` enum('Tidak Ada','Di Kebun/Sungai/Drainase','Dibakar','Tempat Sampah','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mck` enum('Sendiri','Berkelompok/Tetangga','MCK Umum','Tidak Ada') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sumber_airmandi` enum('Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan','Perpipaan','Mata Air/Sumur','Sungai, Danau, Embung','Tadah Air Hujan','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fasilitas_bab` enum('Jamban Sendiri','Jamban Bersama/Tetangga','Jamban Umum','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sumber_airminum` enum('Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan','Mata Air/Sumur','Sungai, Danau, Embung','Tadah Air Hujan','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat_plc` enum('Tangki/Instalasi Pengelolaan Limbah','Sawah/Kolam/Sungai/Drainase/Laut','Lubang Di Tanah','Lainnya') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tower` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rumah_sungai` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rumah_bukit` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_rumah` enum('Kumuh','Tidak Kumuh') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `akses_pendidikan` enum('PAUD','TK/RA','SD/MI ata Sederajat','SMP/MTs atau Sederajat','SMA/MA atau Sederajat','Perguruan Tinggi','Pesantren','Seminari','Pendidikan Keagamaan Lain') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jarak_pendidikan` int NOT NULL,
  `waktu_pendidikan` int NOT NULL,
  `kemudahan_pendidikan` enum('Sulit','Mudah') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `akses_kesehatan` enum('Rumah Sakit','Rumah Sakit Bersalin','Poliklinik','Puskesmas','Puskesmas Pembantu/PUSTU','Polindes','Poskesdes','Posyandu','Apotik','Toko Obat') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jarak_kesehatan` int NOT NULL,
  `waktu_kesehatan` int NOT NULL,
  `kemudahan_kesehatan` enum('Sulit','Mudah') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `akses_nakes` enum('Dokter Spesialis','Dokter Umum','Bidan','Tenaga Kesehatan','Dukun') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jarak_nakes` int NOT NULL,
  `waktu_nakes` int NOT NULL,
  `kemudahan_nakes` enum('Sulit','Mudah') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `akses_transportasi` enum('Lokasi Pekerjaan Utama','Lokasi Pertanian Yang Sedang Diusahakan','Sekolah','Berobat','Beribadah Mingguan/Bulanan/Tahunan','Rekreasi Terdekat') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_transportasi` enum('Air','Udara','Darat') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `penggunaan_transportasi` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `waktu_tempuh` int NOT NULL,
  `biaya` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kemudahan_transportasi` enum('Sulit','Mudah') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blt` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pkh` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `banst` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `banpres` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `banumkm` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `buk` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bpa` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lainnya` enum('Ya','Tidak') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rumahtangga_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `rumahtangga_individu_id_foreign`(`individu_id`) USING BTREE,
  INDEX `rumahtangga_enumerator_id_foreign`(`enumerator_id`) USING BTREE,
  CONSTRAINT `rumahtangga_enumerator_id_foreign` FOREIGN KEY (`enumerator_id`) REFERENCES `enumerator` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `rumahtangga_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `rumahtangga_individu_id_foreign` FOREIGN KEY (`individu_id`) REFERENCES `individu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rumahtangga
-- ----------------------------
INSERT INTO `rumahtangga` VALUES (2, 2, 5, 1, '', '112122121', 'Milik Sendiri', 'Tanah Negara', 12, 12, 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Sumber Penerangan Lainnya', 'Minyak Tanah/Batu Bara (Ke P407)', 'Pembelian', 'Tempat Sampah', 'MCK Umum', 'Mata Air/Sumur', 'Jamban Umum', 'Tadah Air Hujan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Ya', 'Ya', 'Ya', 'Kumuh', 'SMP/MTs atau Sederajat', 1, 1, 'Sulit', 'Poliklinik', 1, 1, 'Sulit', 'Dokter Umum', 1, 1, 'Sulit', 'Lokasi Pertanian Yang Sedang Diusahakan', 'Darat', 'Ya', 1, '1', 'Sulit', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for statistik
-- ----------------------------
DROP TABLE IF EXISTS `statistik`;
CREATE TABLE `statistik`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `bidang` enum('agama','pekerjaan','pendidikan','perkawinan') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `statistik` char(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usia` tinyint NOT NULL,
  `jk` tinyint(1) NOT NULL,
  `tahun` year NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `deleted_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of statistik
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activation_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_time` int NULL DEFAULT NULL,
  `remember_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remember_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_on` int NOT NULL,
  `last_login` int NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL,
  `nama_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_desa` int UNSIGNED NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `users_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE CASCADE ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '127.0.0.1', 'administrator', '$2y$12$.gDsThC8v9DhyN5Neb5IUOzv47QDWM3Ym/vacaDYYglFOUuFEuOHK', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1667651204, 1, 'Admin', NULL, 2, '0');
INSERT INTO `users` VALUES (3, '::1', 'borokoutara@gmail.com', '$2y$10$ufjklFWXIth72BpqcnV5P.Xt9LPcJIroso6laI9YuOEh8ypyqfeI.', 'borokoutara@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1667181869, 1667651242, 1, 'Sarifudin Abjul', NULL, 3, '082241464329');
INSERT INTO `users` VALUES (4, '::1', 'boroko@gmail.com', '$2y$10$XJ6OlZogCGai9lEHg17cgOrAn4GsIveO/SdMWw6AcL2DkYn0nG8Ou', 'boroko@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1667181934, NULL, 1, 'heru hermansyah', NULL, 1, '08224141111');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_groups_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `users_groups_group_id_foreign`(`group_id`) USING BTREE,
  CONSTRAINT `users_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 1, 1);
INSERT INTO `users_groups` VALUES (4, 1, 4);
INSERT INTO `users_groups` VALUES (6, 1, 4);
INSERT INTO `users_groups` VALUES (7, 4, 4);
INSERT INTO `users_groups` VALUES (8, 3, 4);

-- ----------------------------
-- Table structure for visitor_log
-- ----------------------------
DROP TABLE IF EXISTS `visitor_log`;
CREATE TABLE `visitor_log`  (
  `visitor_id` int NOT NULL AUTO_INCREMENT,
  `ip_address` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_agent` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `access_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`visitor_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of visitor_log
-- ----------------------------

-- ----------------------------
-- Table structure for visitors
-- ----------------------------
DROP TABLE IF EXISTS `visitors`;
CREATE TABLE `visitors`  (
  `visitor_id` int NOT NULL AUTO_INCREMENT,
  `no_of_visits` int NOT NULL,
  `ip_address` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `requested_url` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `referer_page` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `page_name` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `query_string` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_unique` tinyint NOT NULL,
  `access_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`visitor_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of visitors
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
