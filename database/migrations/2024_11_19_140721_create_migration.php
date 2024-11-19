<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(
        "
        /*
        Navicat Premium Dump SQL

        Source Server         : Local
        Source Server Type    : MySQL
        Source Server Version : 80030 (8.0.30)
        Source Host           : localhost:3306
        Source Schema         : grade_manager

        Target Server Type    : MySQL
        Target Server Version : 80030 (8.0.30)
        File Encoding         : 65001

        Date: 19/11/2024 21:31:33
       */

       SET NAMES utf8mb4;
       SET FOREIGN_KEY_CHECKS = 0;

       -- ----------------------------
       -- Table structure for academic_year
       -- ----------------------------
       DROP TABLE IF EXISTS `academic_year`;
       CREATE TABLE `academic_year`  (
         `id` int NOT NULL AUTO_INCREMENT,
         `start_date` date NOT NULL,
         `end_date` date NOT NULL,
         PRIMARY KEY (`id`) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of academic_year
       -- ----------------------------
       INSERT INTO `academic_year` VALUES (1, '2024-07-29', '2025-05-17');

       -- ----------------------------
       -- Table structure for cache
       -- ----------------------------
       DROP TABLE IF EXISTS `cache`;
       CREATE TABLE `cache`  (
         `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `expiration` int NOT NULL,
         PRIMARY KEY (`key`) USING BTREE
       ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of cache
       -- ----------------------------
       INSERT INTO `cache` VALUES ('asasdas@gmail.com|127.0.0.1', 'i:1;', 1731907590);
       INSERT INTO `cache` VALUES ('asasdas@gmail.com|127.0.0.1:timer', 'i:1731907590;', 1731907590);

       -- ----------------------------
       -- Table structure for cache_locks
       -- ----------------------------
       DROP TABLE IF EXISTS `cache_locks`;
       CREATE TABLE `cache_locks`  (
         `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `expiration` int NOT NULL,
         PRIMARY KEY (`key`) USING BTREE
       ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of cache_locks
       -- ----------------------------

       -- ----------------------------
       -- Table structure for class
       -- ----------------------------
       DROP TABLE IF EXISTS `class`;
       CREATE TABLE `class`  (
         `id` int NOT NULL AUTO_INCREMENT,
         `subject_key` int NOT NULL,
         `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
         `course_id` int NOT NULL,
         `year_level_id` tinyint NOT NULL,
         `semester_id` int NOT NULL,
         `teacher_key` int NULL DEFAULT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         INDEX `semester_id`(`semester_id` ASC) USING BTREE,
         INDEX `teacher_key`(`teacher_key` ASC) USING BTREE,
         INDEX `subject_key`(`subject_key` ASC) USING BTREE,
         INDEX `course_id`(`course_id` ASC) USING BTREE,
         INDEX `year_level_id`(`year_level_id` ASC) USING BTREE,
         UNIQUE INDEX `section`(`section` ASC) USING BTREE,
         CONSTRAINT `class_ibfk_1` FOREIGN KEY (`teacher_key`) REFERENCES `teacher` (`key`) ON DELETE SET NULL ON UPDATE RESTRICT,
         CONSTRAINT `class_ibfk_2` FOREIGN KEY (`subject_key`) REFERENCES `subject` (`key`) ON DELETE RESTRICT ON UPDATE RESTRICT,
         CONSTRAINT `class_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
         CONSTRAINT `class_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
         CONSTRAINT `class_ibfk_5` FOREIGN KEY (`year_level_id`) REFERENCES `year_level` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 95 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of class
       -- ----------------------------
       INSERT INTO `class` VALUES (9, 18, 'PCS123', 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (10, 19, NULL, 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (11, 20, NULL, 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (12, 21, NULL, 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (13, 22, NULL, 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (14, 23, NULL, 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (15, 24, NULL, 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (16, 25, NULL, 1, 1, 1, NULL);
       INSERT INTO `class` VALUES (17, 26, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (18, 27, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (19, 28, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (20, 28, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (21, 30, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (22, 31, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (23, 32, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (24, 33, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (25, 34, NULL, 1, 1, 2, NULL);
       INSERT INTO `class` VALUES (26, 35, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (27, 36, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (28, 37, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (29, 38, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (30, 39, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (31, 40, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (32, 41, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (33, 42, NULL, 1, 2, 1, NULL);
       INSERT INTO `class` VALUES (42, 43, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (43, 44, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (44, 45, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (45, 46, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (46, 47, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (47, 48, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (48, 49, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (49, 50, NULL, 1, 2, 2, NULL);
       INSERT INTO `class` VALUES (50, 51, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (51, 52, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (52, 53, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (53, 54, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (54, 55, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (55, 56, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (56, 57, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (57, 58, NULL, 1, 3, 1, NULL);
       INSERT INTO `class` VALUES (58, 59, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (59, 60, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (60, 61, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (61, 62, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (62, 63, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (63, 64, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (64, 65, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (65, 66, NULL, 1, 3, 2, NULL);
       INSERT INTO `class` VALUES (66, 67, NULL, 1, 3, 3, NULL);
       INSERT INTO `class` VALUES (67, 68, NULL, 1, 3, 3, NULL);
       INSERT INTO `class` VALUES (68, 69, NULL, 1, 3, 3, NULL);
       INSERT INTO `class` VALUES (69, 70, NULL, 1, 4, 1, NULL);
       INSERT INTO `class` VALUES (70, 71, NULL, 1, 4, 1, NULL);
       INSERT INTO `class` VALUES (71, 72, NULL, 1, 4, 1, NULL);
       INSERT INTO `class` VALUES (72, 73, NULL, 1, 4, 1, NULL);
       INSERT INTO `class` VALUES (73, 74, NULL, 1, 4, 2, NULL);
       INSERT INTO `class` VALUES (74, 74, NULL, 1, 4, 2, NULL);
       INSERT INTO `class` VALUES (75, 20, 'SCS1234', 1, 1, 1, 1025);
       INSERT INTO `class` VALUES (77, 198, 'LKJ4578', 2, 3, 3, NULL);
       INSERT INTO `class` VALUES (90, 167, 'QWEQWE69', 2, 1, 1, 1023);
       INSERT INTO `class` VALUES (93, 18, 'PCS1234', 1, 1, 1, 1028);
       INSERT INTO `class` VALUES (94, 18, 'PCS5678', 1, 1, 1, 1028);

       -- ----------------------------
       -- Table structure for course
       -- ----------------------------
       DROP TABLE IF EXISTS `course`;
       CREATE TABLE `course`  (
         `id` int NOT NULL AUTO_INCREMENT,
         `abbr` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `dept_id` int NOT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         INDEX `dept_id`(`dept_id` ASC) USING BTREE,
         CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of course
       -- ----------------------------
       INSERT INTO `course` VALUES (1, 'BSCS', 'Bachelor of Science in Computer Science', 1);
       INSERT INTO `course` VALUES (2, 'BSCoE', 'Bachelor of Science in Computer Engineering', 6);

       -- ----------------------------
       -- Table structure for dept
       -- ----------------------------
       DROP TABLE IF EXISTS `dept`;
       CREATE TABLE `dept`  (
         `id` int NOT NULL AUTO_INCREMENT,
         `abbr` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         PRIMARY KEY (`id`) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of dept
       -- ----------------------------
       INSERT INTO `dept` VALUES (1, 'CCS', 'College of Computer Science');
       INSERT INTO `dept` VALUES (2, 'CNAHS', 'College of Nursing and Allied Health Sciences');
       INSERT INTO `dept` VALUES (3, 'CBA', 'College of Business and Accountancy');
       INSERT INTO `dept` VALUES (4, 'CITHM', 'College of International Tourism and Hospitality Management');
       INSERT INTO `dept` VALUES (5, 'CTELA', 'College of Teacher Education and Liberal Arts');
       INSERT INTO `dept` VALUES (6, 'CCE', 'College of Computer Engineering');

       -- ----------------------------
       -- Table structure for failed_jobs
       -- ----------------------------
       DROP TABLE IF EXISTS `failed_jobs`;
       CREATE TABLE `failed_jobs`  (
         `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
         `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
         PRIMARY KEY (`id`) USING BTREE,
         UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of failed_jobs
       -- ----------------------------

       -- ----------------------------
       -- Table structure for job_batches
       -- ----------------------------
       DROP TABLE IF EXISTS `job_batches`;
       CREATE TABLE `job_batches`  (
         `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `total_jobs` int NOT NULL,
         `pending_jobs` int NOT NULL,
         `failed_jobs` int NOT NULL,
         `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
         `cancelled_at` int NULL DEFAULT NULL,
         `created_at` int NOT NULL,
         `finished_at` int NULL DEFAULT NULL,
         PRIMARY KEY (`id`) USING BTREE
       ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of job_batches
       -- ----------------------------

       -- ----------------------------
       -- Table structure for jobs
       -- ----------------------------
       DROP TABLE IF EXISTS `jobs`;
       CREATE TABLE `jobs`  (
         `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
         `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `attempts` tinyint UNSIGNED NOT NULL,
         `reserved_at` int UNSIGNED NULL DEFAULT NULL,
         `available_at` int UNSIGNED NOT NULL,
         `created_at` int UNSIGNED NOT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of jobs
       -- ----------------------------

       -- ----------------------------
       -- Table structure for migrations
       -- ----------------------------
       DROP TABLE IF EXISTS `migrations`;
       CREATE TABLE `migrations`  (
         `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
         `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `batch` int NOT NULL,
         PRIMARY KEY (`id`) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of migrations
       -- ----------------------------
       INSERT INTO `migrations` VALUES (1, '0001_00_01_000000_create_other_tables', 1);
       INSERT INTO `migrations` VALUES (2, '0001_00_01_000000_create_role_table', 1);
       INSERT INTO `migrations` VALUES (3, '0001_01_01_000000_create_users_table', 1);
       INSERT INTO `migrations` VALUES (4, '0001_01_01_000001_create_cache_table', 1);
       INSERT INTO `migrations` VALUES (5, '0001_01_01_000002_create_jobs_table', 1);

       -- ----------------------------
       -- Table structure for password_reset_tokens
       -- ----------------------------
       DROP TABLE IF EXISTS `password_reset_tokens`;
       CREATE TABLE `password_reset_tokens`  (
         `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `created_at` timestamp NULL DEFAULT NULL,
         PRIMARY KEY (`email`) USING BTREE
       ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of password_reset_tokens
       -- ----------------------------

       -- ----------------------------
       -- Table structure for role
       -- ----------------------------
       DROP TABLE IF EXISTS `role`;
       CREATE TABLE `role`  (
         `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
         `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         PRIMARY KEY (`id`) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of role
       -- ----------------------------
       INSERT INTO `role` VALUES (1, 'admin');
       INSERT INTO `role` VALUES (2, 'student');
       INSERT INTO `role` VALUES (3, 'teacher');

       -- ----------------------------
       -- Table structure for score_range
       -- ----------------------------
       DROP TABLE IF EXISTS `score_range`;
       CREATE TABLE `score_range`  (
         `id` tinyint NOT NULL AUTO_INCREMENT,
         `grade` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `min_score` decimal(10, 0) NOT NULL,
         `max_score` decimal(10, 0) NOT NULL,
         `description` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         PRIMARY KEY (`id`) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of score_range
       -- ----------------------------
       INSERT INTO `score_range` VALUES (1, '1.00', 98, 100, 'Excellent');
       INSERT INTO `score_range` VALUES (2, '1.25', 95, 97, 'Excellent');
       INSERT INTO `score_range` VALUES (3, '1.50', 92, 94, 'Superior');
       INSERT INTO `score_range` VALUES (4, '1.75', 89, 91, 'Superior');
       INSERT INTO `score_range` VALUES (5, '2.00', 87, 88, 'High Average');
       INSERT INTO `score_range` VALUES (6, '2.25', 84, 86, 'High Average');
       INSERT INTO `score_range` VALUES (7, '2.50', 81, 83, 'Average');
       INSERT INTO `score_range` VALUES (8, '2.75', 78, 80, 'Low Average');
       INSERT INTO `score_range` VALUES (9, '3.0', 75, 77, 'Pass');
       INSERT INTO `score_range` VALUES (10, '5.00', 0, 74, 'Failed');
       INSERT INTO `score_range` VALUES (11, 'INC.', 0, 0, 'Incomplete');
       INSERT INTO `score_range` VALUES (12, 'DR.', 0, 0, 'Dropped');

       -- ----------------------------
       -- Table structure for semester
       -- ----------------------------
       DROP TABLE IF EXISTS `semester`;
       CREATE TABLE `semester`  (
         `id` int NOT NULL AUTO_INCREMENT,
         `academic_year_id` int NOT NULL,
         `number` tinyint NOT NULL,
         `start_date` date NOT NULL,
         `end_date` date NOT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         INDEX `semester_ibfk_1`(`academic_year_id` ASC) USING BTREE,
         CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of semester
       -- ----------------------------
       INSERT INTO `semester` VALUES (1, 1, 1, '2024-07-29', '2024-12-07');
       INSERT INTO `semester` VALUES (2, 1, 2, '2025-01-06', '2025-05-17');
       INSERT INTO `semester` VALUES (3, 1, 3, '2025-06-09', '2025-07-27');

       -- ----------------------------
       -- Table structure for sessions
       -- ----------------------------
       DROP TABLE IF EXISTS `sessions`;
       CREATE TABLE `sessions`  (
         `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `user_id` bigint UNSIGNED NULL DEFAULT NULL,
         `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
         `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
         `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `last_activity` int NOT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
         INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
       ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of sessions
       -- ----------------------------
       INSERT INTO `sessions` VALUES ('DkbkJcDzBm8HPrSax8xAIZVhpcA6GUFUpHjs226b', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM0d6YnRybkFFYmdkcm9UVWIyVDNwS0ZMcHhEMWJDbWhXU1NOelppRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NjoiaHR0cHM6Ly9ncmFkZV9tYW5hZ2VyLnRlc3QvYWRtaW4vbWFuYWdlci9jbGFzcyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwczovL2dyYWRlX21hbmFnZXIudGVzdC9hZG1pbi9tYW5hZ2VyL2NsYXNzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjA7fQ==', 1731983913);
       INSERT INTO `sessions` VALUES ('vYMQa1Sx69NfzVfR9vrEBO1qnAPGthHL0nHc5b1z', 28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMFVsVGxMeExEQ3ZvTFJ0djlocjY3Qlg2U3RodmpWd2lCUUNMUkZRSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vZ3JhZGVfbWFuYWdlci50ZXN0L3RlYWNoZXIvdmlldy9zdWJqZWN0cy9jbGFzc19saXN0LzkzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjg7fQ==', 1732021410);
       INSERT INTO `sessions` VALUES ('YVNe1CAXzyywY425skLmY6h2vQphPoMQ83wVMiYR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFBGUlI0R3JBc2RpU0Zxa3FTM2JZY1puOXZleTVvOXo0SVVaS1o0ZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vZ3JhZGVfbWFuYWdlci50ZXN0L2xvZ2luIjt9fQ==', 1731985972);

       -- ----------------------------
       -- Table structure for student
       -- ----------------------------
       DROP TABLE IF EXISTS `student`;
       CREATE TABLE `student`  (
         `key` int NOT NULL AUTO_INCREMENT,
         `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `mname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `course_id` int NOT NULL,
         `user_id` bigint UNSIGNED NULL DEFAULT NULL,
         PRIMARY KEY (`key`) USING BTREE,
         INDEX `course_id`(`course_id` ASC) USING BTREE,
         INDEX `user_id`(`user_id` ASC) USING BTREE,
         UNIQUE INDEX `id`(`id` ASC) USING BTREE,
         UNIQUE INDEX `email`(`email` ASC) USING BTREE,
         CONSTRAINT `student_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
         CONSTRAINT `student_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 1028 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of student
       -- ----------------------------
       INSERT INTO `student` VALUES (1021, 'A21-0465', 'Loba', 'Jed Benedict', 'Fain', 'jed@gmail.com', 1, 16);
       INSERT INTO `student` VALUES (1022, 'A19-0024', 'Doe', 'John', 'Play', 'johndoe@gmail.com', 1, 17);
       INSERT INTO `student` VALUES (1025, 'A23-0111', 'Doe', 'Jane', 'Play', 'jane@doe.com', 1, 27);
       INSERT INTO `student` VALUES (1027, 'A23-0112', 'asdasd', 'asd', 'asd', 'asd@asd.com', 1, 30);

       -- ----------------------------
       -- Table structure for student_class
       -- ----------------------------
       DROP TABLE IF EXISTS `student_class`;
       CREATE TABLE `student_class`  (
         `id` int NOT NULL AUTO_INCREMENT,
         `student_year_level_id` int NOT NULL,
         `class_id` int NOT NULL,
         `score` decimal(10, 2) NOT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         INDEX `class_id`(`class_id` ASC) USING BTREE,
         INDEX `student_year_level_id`(`student_year_level_id` ASC) USING BTREE,
         CONSTRAINT `student_class_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
         CONSTRAINT `student_class_ibfk_2` FOREIGN KEY (`student_year_level_id`) REFERENCES `student_year_level` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of student_class
       -- ----------------------------
       INSERT INTO `student_class` VALUES (43, 16, 94, 98.00);
       INSERT INTO `student_class` VALUES (44, 17, 94, 0.00);
       INSERT INTO `student_class` VALUES (45, 20, 94, 0.00);
       INSERT INTO `student_class` VALUES (46, 20, 93, 1.75);

       -- ----------------------------
       -- Table structure for student_year_level
       -- ----------------------------
       DROP TABLE IF EXISTS `student_year_level`;
       CREATE TABLE `student_year_level`  (
         `id` int NOT NULL AUTO_INCREMENT,
         `student_key` int NOT NULL,
         `year_level_id` tinyint NOT NULL,
         `academic_year_id` int NOT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         UNIQUE INDEX `student_key`(`student_key` ASC) USING BTREE,
         INDEX `academic_year_id`(`academic_year_id` ASC) USING BTREE,
         INDEX `year_level_id`(`year_level_id` ASC) USING BTREE,
         CONSTRAINT `student_year_level_ibfk_1` FOREIGN KEY (`student_key`) REFERENCES `student` (`key`) ON DELETE CASCADE ON UPDATE RESTRICT,
         CONSTRAINT `student_year_level_ibfk_4` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
         CONSTRAINT `student_year_level_ibfk_5` FOREIGN KEY (`year_level_id`) REFERENCES `year_level` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of student_year_level
       -- ----------------------------
       INSERT INTO `student_year_level` VALUES (16, 1021, 1, 1);
       INSERT INTO `student_year_level` VALUES (17, 1022, 2, 1);
       INSERT INTO `student_year_level` VALUES (20, 1025, 1, 1);
       INSERT INTO `student_year_level` VALUES (21, 1027, 1, 1);

       -- ----------------------------
       -- Table structure for subject
       -- ----------------------------
       DROP TABLE IF EXISTS `subject`;
       CREATE TABLE `subject`  (
         `key` int NOT NULL AUTO_INCREMENT,
         `code` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `units` int NOT NULL,
         PRIMARY KEY (`key`) USING BTREE,
         UNIQUE INDEX `code`(`code` ASC) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 1080 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of subject
       -- ----------------------------
       INSERT INTO `subject` VALUES (18, 'EIS102', 'The Family', 2);
       INSERT INTO `subject` VALUES (19, 'GEL105', 'English Enhancement Course', 3);
       INSERT INTO `subject` VALUES (20, 'GE102', 'Purposive Communication', 3);
       INSERT INTO `subject` VALUES (21, 'CCS100', 'Introduction to Computing', 3);
       INSERT INTO `subject` VALUES (22, 'CCS101', 'Computer Programming 1', 3);
       INSERT INTO `subject` VALUES (23, 'GEL 103', 'Living in the IT Era', 3);
       INSERT INTO `subject` VALUES (24, 'PATHFit1', 'Physical Activities Towards Health & Fitness 1 (movement competency training)', 2);
       INSERT INTO `subject` VALUES (25, 'NSTP101', 'Civic Welfare Training Service 1', 3);
       INSERT INTO `subject` VALUES (26, 'EIS101', 'University and I', 2);
       INSERT INTO `subject` VALUES (27, 'GEL102', 'Panitikang Filipino', 3);
       INSERT INTO `subject` VALUES (28, 'GE107', 'Ethics', 3);
       INSERT INTO `subject` VALUES (29, 'GE101', 'Understanding the Self', 3);
       INSERT INTO `subject` VALUES (30, 'GE103', 'Mathematics in the Modern World', 3);
       INSERT INTO `subject` VALUES (31, 'CCS102', 'Computer Programming 2', 3);
       INSERT INTO `subject` VALUES (32, 'PCS101', 'Discrete Structures 1', 3);
       INSERT INTO `subject` VALUES (33, 'PATHFit2', 'Physical Activities Towards Health & Fitness 2 (exercise-based fitness activities) ', 2);
       INSERT INTO `subject` VALUES (34, 'NSTP102', 'Civic Welfare Training Service 2', 3);
       INSERT INTO `subject` VALUES (35, 'GE104', 'Science, Technology and Society', 3);
       INSERT INTO `subject` VALUES (36, 'GE106', 'The Contemporary World', 3);
       INSERT INTO `subject` VALUES (37, 'GEL104', 'Foreign Language', 3);
       INSERT INTO `subject` VALUES (38, 'PCS102', 'Discrete Structures 2', 3);
       INSERT INTO `subject` VALUES (39, 'CCS103', 'Data Structures and Algorithms', 3);
       INSERT INTO `subject` VALUES (40, 'PCS103', 'Object-Oriented Programming', 3);
       INSERT INTO `subject` VALUES (41, 'PCS104', 'Computer Architecture & Organization', 3);
       INSERT INTO `subject` VALUES (42, 'PATHFit3', 'Physical Activities Towards Health & Fitness 3 (individual/ dual sports)', 2);
       INSERT INTO `subject` VALUES (43, 'MCS101', 'Calculus', 3);
       INSERT INTO `subject` VALUES (44, 'GE105', 'Art Appreciation', 3);
       INSERT INTO `subject` VALUES (45, 'PCS106', 'Networks and Communications', 3);
       INSERT INTO `subject` VALUES (46, 'PCS105', 'Algorithms & Complexity', 3);
       INSERT INTO `subject` VALUES (47, 'CCS104', 'Information Management', 3);
       INSERT INTO `subject` VALUES (48, 'PCS107', 'Social Issues & Professional Practice 1', 3);
       INSERT INTO `subject` VALUES (49, 'ECS101', 'Graphics & Visual Computing', 3);
       INSERT INTO `subject` VALUES (50, 'PATHFit4', 'Physical Activities Towards Health & Fitness 4 (team sports)', 2);
       INSERT INTO `subject` VALUES (51, 'GE108', 'Readings in Philippine History', 3);
       INSERT INTO `subject` VALUES (52, 'GEL106', 'Academic Writing', 3);
       INSERT INTO `subject` VALUES (53, 'PCS108', 'Automata Theory & Formal Languages', 3);
       INSERT INTO `subject` VALUES (54, 'ECS102', 'Intelligent Systems', 3);
       INSERT INTO `subject` VALUES (55, 'CCS105', 'Application Dev\'t & Emerging Tech.', 3);
       INSERT INTO `subject` VALUES (56, 'PCS109', 'Information Assurance & Security', 2);
       INSERT INTO `subject` VALUES (57, 'PCS110', 'Software Engineering 1', 3);
       INSERT INTO `subject` VALUES (58, 'SCS101', 'Specialization Course 1', 3);
       INSERT INTO `subject` VALUES (59, 'GEL101', 'Retorika', 3);
       INSERT INTO `subject` VALUES (60, 'GE109', 'Rizal\'s Life, Works and Writings', 3);
       INSERT INTO `subject` VALUES (61, 'PCS112', 'Programming Languages', 3);
       INSERT INTO `subject` VALUES (62, 'PCS111', 'Software Engineering 2', 3);
       INSERT INTO `subject` VALUES (63, 'PCS113', 'Operating Systems', 3);
       INSERT INTO `subject` VALUES (64, 'PCS114', 'Methods of Research in Computing', 3);
       INSERT INTO `subject` VALUES (65, 'SCS102', 'Specialization Course 2', 3);
       INSERT INTO `subject` VALUES (66, 'PCS115', 'CS Thesis Writing 1', 3);
       INSERT INTO `subject` VALUES (67, 'SCS103', 'Specialization Course 3', 3);
       INSERT INTO `subject` VALUES (68, 'SCS104', 'Specialization Course 4', 3);
       INSERT INTO `subject` VALUES (69, 'PCS116', 'Human Computer Interaction', 3);
       INSERT INTO `subject` VALUES (70, 'ECS103', 'Parallel and Distributed Computing', 3);
       INSERT INTO `subject` VALUES (71, 'SCS105', 'Specialization Course 5', 3);
       INSERT INTO `subject` VALUES (72, 'SCS106', 'Specialization Course 6', 3);
       INSERT INTO `subject` VALUES (73, 'PSC117', 'CS Thesis Writing 2', 3);
       INSERT INTO `subject` VALUES (74, 'PCS118', 'Computer Science Practicum', 3);
       INSERT INTO `subject` VALUES (77, 'S0001', 'Environmental Science 1', 3);
       INSERT INTO `subject` VALUES (78, 'S0002', 'Network Security 2', 4);
       INSERT INTO `subject` VALUES (79, 'S0003', 'English Literature 3', 5);
       INSERT INTO `subject` VALUES (80, 'S0004', 'English Literature 4', 3);
       INSERT INTO `subject` VALUES (81, 'S0005', 'Data Structures 5', 5);
       INSERT INTO `subject` VALUES (82, 'S0006', 'Journalism 6', 2);
       INSERT INTO `subject` VALUES (83, 'S0007', 'Medicine 7', 3);
       INSERT INTO `subject` VALUES (84, 'S0008', 'Accounting 8', 4);
       INSERT INTO `subject` VALUES (85, 'S0009', 'Geography 9', 3);
       INSERT INTO `subject` VALUES (86, 'S0010', 'Zoology 10', 3);
       INSERT INTO `subject` VALUES (87, 'S0011', 'Astronomy 11', 5);
       INSERT INTO `subject` VALUES (88, 'S0012', 'Finance 12', 3);
       INSERT INTO `subject` VALUES (89, 'S0013', 'Philosophy 13', 2);
       INSERT INTO `subject` VALUES (90, 'S0014', 'Biology 14', 2);
       INSERT INTO `subject` VALUES (91, 'S0015', 'Public Health 15', 2);
       INSERT INTO `subject` VALUES (92, 'S0016', 'Speech Communication 16', 4);
       INSERT INTO `subject` VALUES (93, 'S0017', 'Public Health 17', 3);
       INSERT INTO `subject` VALUES (94, 'S0018', 'Ethics 18', 4);
       INSERT INTO `subject` VALUES (95, 'S0019', 'Marine Biology 19', 5);
       INSERT INTO `subject` VALUES (96, 'S0020', 'Film Studies 20', 2);
       INSERT INTO `subject` VALUES (97, 'S0021', 'Anthropology 21', 2);
       INSERT INTO `subject` VALUES (98, 'S0022', 'Public Health 22', 2);
       INSERT INTO `subject` VALUES (99, 'S0023', 'Astronomy 23', 4);
       INSERT INTO `subject` VALUES (100, 'S0024', 'Political Science 24', 4);
       INSERT INTO `subject` VALUES (101, 'S0025', 'Algorithms 25', 5);
       INSERT INTO `subject` VALUES (102, 'S0026', 'Database Management 26', 2);
       INSERT INTO `subject` VALUES (103, 'S0027', 'Environmental Science 27', 2);
       INSERT INTO `subject` VALUES (104, 'S0028', 'Journalism 28', 4);
       INSERT INTO `subject` VALUES (105, 'S0029', 'Operating Systems 29', 2);
       INSERT INTO `subject` VALUES (106, 'S0030', 'Marketing 30', 5);
       INSERT INTO `subject` VALUES (107, 'S0031', 'Philosophy 31', 3);
       INSERT INTO `subject` VALUES (108, 'S0032', 'Database Management 32', 4);
       INSERT INTO `subject` VALUES (109, 'S0033', 'Nursing 33', 3);
       INSERT INTO `subject` VALUES (110, 'S0034', 'Algorithms 34', 3);
       INSERT INTO `subject` VALUES (111, 'S0035', 'Sociology 35', 2);
       INSERT INTO `subject` VALUES (112, 'S0036', 'Fine Arts 36', 3);
       INSERT INTO `subject` VALUES (113, 'S0037', 'Medicine 37', 3);
       INSERT INTO `subject` VALUES (114, 'S0038', 'Theater Arts 38', 5);
       INSERT INTO `subject` VALUES (115, 'S0039', 'Education 39', 5);
       INSERT INTO `subject` VALUES (116, 'S0040', 'Pharmacology 40', 4);
       INSERT INTO `subject` VALUES (117, 'S0041', 'Child Development 41', 3);
       INSERT INTO `subject` VALUES (118, 'S0042', 'Accounting 42', 2);
       INSERT INTO `subject` VALUES (119, 'S0043', 'Mathematics 43', 5);
       INSERT INTO `subject` VALUES (120, 'S0044', 'Operating Systems 44', 4);
       INSERT INTO `subject` VALUES (121, 'S0045', 'Social Work 45', 5);
       INSERT INTO `subject` VALUES (122, 'S0046', 'Oceanography 46', 3);
       INSERT INTO `subject` VALUES (123, 'S0047', 'Operating Systems 47', 2);
       INSERT INTO `subject` VALUES (124, 'S0048', 'Geography 48', 5);
       INSERT INTO `subject` VALUES (125, 'S0049', 'Journalism 49', 5);
       INSERT INTO `subject` VALUES (126, 'S0050', 'Law 50', 4);
       INSERT INTO `subject` VALUES (127, 'S0051', 'Chemistry 51', 5);
       INSERT INTO `subject` VALUES (128, 'S0052', 'Religious Studies 52', 3);
       INSERT INTO `subject` VALUES (129, 'S0053', 'Political Science 53', 4);
       INSERT INTO `subject` VALUES (130, 'S0054', 'Marine Biology 54', 2);
       INSERT INTO `subject` VALUES (131, 'S0055', 'Astronautics 55', 3);
       INSERT INTO `subject` VALUES (132, 'S0056', 'Data Structures 56', 4);
       INSERT INTO `subject` VALUES (133, 'S0057', 'Agriculture 57', 4);
       INSERT INTO `subject` VALUES (134, 'S0058', 'Fine Arts 58', 4);
       INSERT INTO `subject` VALUES (135, 'S0059', 'Computer Science 59', 2);
       INSERT INTO `subject` VALUES (136, 'S0060', 'Biology 60', 3);
       INSERT INTO `subject` VALUES (137, 'S0061', 'Geography 61', 5);
       INSERT INTO `subject` VALUES (138, 'S0062', 'Fine Arts 62', 2);
       INSERT INTO `subject` VALUES (139, 'S0063', 'Anatomy 63', 3);
       INSERT INTO `subject` VALUES (140, 'S0064', 'Botany 64', 4);
       INSERT INTO `subject` VALUES (141, 'S0065', 'Fine Arts 65', 3);
       INSERT INTO `subject` VALUES (142, 'S0066', 'Engineering Mechanics 66', 2);
       INSERT INTO `subject` VALUES (143, 'S0067', 'Microbiology 67', 2);
       INSERT INTO `subject` VALUES (144, 'S0068', 'Genetics 68', 5);
       INSERT INTO `subject` VALUES (145, 'S0069', 'Fine Arts 69', 5);
       INSERT INTO `subject` VALUES (146, 'S0070', 'Engineering Mechanics 70', 2);
       INSERT INTO `subject` VALUES (147, 'S0071', 'Biology 71', 5);
       INSERT INTO `subject` VALUES (148, 'S0072', 'Biology 72', 2);
       INSERT INTO `subject` VALUES (149, 'S0073', 'Pharmacology 73', 4);
       INSERT INTO `subject` VALUES (150, 'S0074', 'History 74', 5);
       INSERT INTO `subject` VALUES (151, 'S0075', 'Architecture 75', 5);
       INSERT INTO `subject` VALUES (152, 'S0076', 'Accounting 76', 3);
       INSERT INTO `subject` VALUES (153, 'S0077', 'Genetics 77', 2);
       INSERT INTO `subject` VALUES (154, 'S0078', 'Physics 78', 2);
       INSERT INTO `subject` VALUES (155, 'S0079', 'Philosophy 79', 5);
       INSERT INTO `subject` VALUES (156, 'S0080', 'Child Development 80', 3);
       INSERT INTO `subject` VALUES (157, 'S0081', 'Education 81', 4);
       INSERT INTO `subject` VALUES (158, 'S0082', 'Linguistics 82', 4);
       INSERT INTO `subject` VALUES (159, 'S0083', 'Political Science 83', 3);
       INSERT INTO `subject` VALUES (160, 'S0084', 'Botany 84', 3);
       INSERT INTO `subject` VALUES (161, 'S0085', 'Business Management 85', 2);
       INSERT INTO `subject` VALUES (162, 'S0086', 'Sociology 86', 5);
       INSERT INTO `subject` VALUES (163, 'S0087', 'Anatomy 87', 2);
       INSERT INTO `subject` VALUES (164, 'S0088', 'Public Health 88', 4);
       INSERT INTO `subject` VALUES (165, 'S0089', 'Pharmacology 89', 4);
       INSERT INTO `subject` VALUES (166, 'S0090', 'Economics 90', 2);
       INSERT INTO `subject` VALUES (167, 'S0091', 'Engineering Mechanics 91', 5);
       INSERT INTO `subject` VALUES (168, 'S0092', 'Philosophy 92', 5);
       INSERT INTO `subject` VALUES (169, 'S0093', 'Network Security 93', 5);
       INSERT INTO `subject` VALUES (170, 'S0094', 'Public Health 94', 5);
       INSERT INTO `subject` VALUES (171, 'S0095', 'Social Work 95', 4);
       INSERT INTO `subject` VALUES (172, 'S0096', 'Artificial Intelligence 96', 3);
       INSERT INTO `subject` VALUES (173, 'S0097', 'Political Science 97', 4);
       INSERT INTO `subject` VALUES (174, 'S0098', 'Statistics 98', 4);
       INSERT INTO `subject` VALUES (175, 'S0099', 'Mathematics 99', 3);
       INSERT INTO `subject` VALUES (176, 'S0100', 'Marketing 100', 5);
       INSERT INTO `subject` VALUES (177, 'S0101', 'Chemistry 101', 3);
       INSERT INTO `subject` VALUES (178, 'S0102', 'Astronomy 102', 4);
       INSERT INTO `subject` VALUES (179, 'S0103', 'Environmental Science 103', 5);
       INSERT INTO `subject` VALUES (180, 'S0104', 'History 104', 3);
       INSERT INTO `subject` VALUES (181, 'S0105', 'Creative Writing 105', 5);
       INSERT INTO `subject` VALUES (182, 'S0106', 'Pharmacology 106', 4);
       INSERT INTO `subject` VALUES (183, 'S0107', 'Computer Science 107', 2);
       INSERT INTO `subject` VALUES (184, 'S0108', 'Network Security 108', 3);
       INSERT INTO `subject` VALUES (185, 'S0109', 'Ethics 109', 3);
       INSERT INTO `subject` VALUES (186, 'S0110', 'Creative Writing 110', 4);
       INSERT INTO `subject` VALUES (187, 'S0111', 'Botany 111', 5);
       INSERT INTO `subject` VALUES (188, 'S0112', 'Botany 112', 3);
       INSERT INTO `subject` VALUES (189, 'S0113', 'Psychology 113', 3);
       INSERT INTO `subject` VALUES (190, 'S0114', 'Architecture 114', 2);
       INSERT INTO `subject` VALUES (191, 'S0115', 'Architecture 115', 5);
       INSERT INTO `subject` VALUES (192, 'S0116', 'Microbiology 116', 4);
       INSERT INTO `subject` VALUES (193, 'S0117', 'Data Structures 117', 4);
       INSERT INTO `subject` VALUES (194, 'S0118', 'Psychology 118', 5);
       INSERT INTO `subject` VALUES (195, 'S0119', 'Mathematics 119', 5);
       INSERT INTO `subject` VALUES (196, 'S0120', 'Human Resource Management 120', 2);
       INSERT INTO `subject` VALUES (197, 'S0121', 'Astronautics 121', 4);
       INSERT INTO `subject` VALUES (198, 'S0122', 'Education 122', 3);
       INSERT INTO `subject` VALUES (199, 'S0123', 'Physiology 123', 4);
       INSERT INTO `subject` VALUES (200, 'S0124', 'Child Development 124', 5);
       INSERT INTO `subject` VALUES (201, 'S0125', 'Anthropology 125', 5);
       INSERT INTO `subject` VALUES (202, 'S0126', 'Theater Arts 126', 2);
       INSERT INTO `subject` VALUES (203, 'S0127', 'Anatomy 127', 3);
       INSERT INTO `subject` VALUES (204, 'S0128', 'Microbiology 128', 4);
       INSERT INTO `subject` VALUES (205, 'S0129', 'Physics 129', 5);
       INSERT INTO `subject` VALUES (206, 'S0130', 'Creative Writing 130', 2);
       INSERT INTO `subject` VALUES (207, 'S0131', 'Botany 131', 2);
       INSERT INTO `subject` VALUES (208, 'S0132', 'Social Work 132', 5);
       INSERT INTO `subject` VALUES (209, 'S0133', 'Anthropology 133', 3);
       INSERT INTO `subject` VALUES (210, 'S0134', 'Human Resource Management 134', 3);
       INSERT INTO `subject` VALUES (211, 'S0135', 'Agriculture 135', 2);
       INSERT INTO `subject` VALUES (212, 'S0136', 'Film Studies 136', 4);
       INSERT INTO `subject` VALUES (213, 'S0137', 'Education 137', 5);
       INSERT INTO `subject` VALUES (214, 'S0138', 'Oceanography 138', 5);
       INSERT INTO `subject` VALUES (215, 'S0139', 'Sociology 139', 5);
       INSERT INTO `subject` VALUES (216, 'S0140', 'Computer Science 140', 4);
       INSERT INTO `subject` VALUES (217, 'S0141', 'Ethics 141', 5);
       INSERT INTO `subject` VALUES (218, 'S0142', 'Marine Biology 142', 4);
       INSERT INTO `subject` VALUES (219, 'S0143', 'Nursing 143', 4);
       INSERT INTO `subject` VALUES (220, 'S0144', 'Marketing 144', 2);
       INSERT INTO `subject` VALUES (221, 'S0145', 'Child Development 145', 5);
       INSERT INTO `subject` VALUES (222, 'S0146', 'Religious Studies 146', 4);
       INSERT INTO `subject` VALUES (223, 'S0147', 'Anthropology 147', 2);
       INSERT INTO `subject` VALUES (224, 'S0148', 'Data Structures 148', 2);
       INSERT INTO `subject` VALUES (225, 'S0149', 'Fine Arts 149', 5);
       INSERT INTO `subject` VALUES (226, 'S0150', 'Marine Biology 150', 3);
       INSERT INTO `subject` VALUES (227, 'S0151', 'Zoology 151', 5);
       INSERT INTO `subject` VALUES (228, 'S0152', 'Data Structures 152', 3);
       INSERT INTO `subject` VALUES (229, 'S0153', 'English Literature 153', 5);
       INSERT INTO `subject` VALUES (230, 'S0154', 'Architecture 154', 2);
       INSERT INTO `subject` VALUES (231, 'S0155', 'Engineering Mechanics 155', 2);
       INSERT INTO `subject` VALUES (232, 'S0156', 'Anthropology 156', 4);
       INSERT INTO `subject` VALUES (233, 'S0157', 'Law 157', 3);
       INSERT INTO `subject` VALUES (234, 'S0158', 'Creative Writing 158', 2);
       INSERT INTO `subject` VALUES (235, 'S0159', 'Anthropology 159', 5);
       INSERT INTO `subject` VALUES (236, 'S0160', 'Human Resource Management 160', 2);
       INSERT INTO `subject` VALUES (237, 'S0161', 'Chemistry 161', 5);
       INSERT INTO `subject` VALUES (238, 'S0162', 'Philosophy 162', 5);
       INSERT INTO `subject` VALUES (239, 'S0163', 'Theater Arts 163', 5);
       INSERT INTO `subject` VALUES (240, 'S0164', 'Mathematics 164', 2);
       INSERT INTO `subject` VALUES (241, 'S0165', 'Architecture 165', 3);
       INSERT INTO `subject` VALUES (242, 'S0166', 'English Literature 166', 5);
       INSERT INTO `subject` VALUES (243, 'S0167', 'Database Management 167', 4);
       INSERT INTO `subject` VALUES (244, 'S0168', 'Engineering Mechanics 168', 2);
       INSERT INTO `subject` VALUES (245, 'S0169', 'Medicine 169', 3);
       INSERT INTO `subject` VALUES (246, 'S0170', 'Journalism 170', 4);
       INSERT INTO `subject` VALUES (247, 'S0171', 'Finance 171', 2);
       INSERT INTO `subject` VALUES (248, 'S0172', 'Physics 172', 5);
       INSERT INTO `subject` VALUES (249, 'S0173', 'Social Work 173', 5);
       INSERT INTO `subject` VALUES (250, 'S0174', 'Microbiology 174', 3);
       INSERT INTO `subject` VALUES (251, 'S0175', 'Agriculture 175', 4);
       INSERT INTO `subject` VALUES (252, 'S0176', 'Economics 176', 3);
       INSERT INTO `subject` VALUES (253, 'S0177', 'Speech Communication 177', 3);
       INSERT INTO `subject` VALUES (254, 'S0178', 'Speech Communication 178', 4);
       INSERT INTO `subject` VALUES (255, 'S0179', 'Linguistics 179', 4);
       INSERT INTO `subject` VALUES (256, 'S0180', 'Child Development 180', 3);
       INSERT INTO `subject` VALUES (257, 'S0181', 'Public Health 181', 4);
       INSERT INTO `subject` VALUES (258, 'S0182', 'Political Science 182', 2);
       INSERT INTO `subject` VALUES (259, 'S0183', 'Public Health 183', 4);
       INSERT INTO `subject` VALUES (260, 'S0184', 'Database Management 184', 3);
       INSERT INTO `subject` VALUES (261, 'S0185', 'Law 185', 5);
       INSERT INTO `subject` VALUES (262, 'S0186', 'Botany 186', 3);
       INSERT INTO `subject` VALUES (263, 'S0187', 'Sociology 187', 2);
       INSERT INTO `subject` VALUES (264, 'S0188', 'Algorithms 188', 5);
       INSERT INTO `subject` VALUES (265, 'S0189', 'Nursing 189', 5);
       INSERT INTO `subject` VALUES (266, 'S0190', 'Religious Studies 190', 2);
       INSERT INTO `subject` VALUES (267, 'S0191', 'Religious Studies 191', 4);
       INSERT INTO `subject` VALUES (268, 'S0192', 'Creative Writing 192', 2);
       INSERT INTO `subject` VALUES (269, 'S0193', 'Astronomy 193', 3);
       INSERT INTO `subject` VALUES (270, 'S0194', 'Oceanography 194', 2);
       INSERT INTO `subject` VALUES (271, 'S0195', 'Fine Arts 195', 5);
       INSERT INTO `subject` VALUES (272, 'S0196', 'Computer Science 196', 5);
       INSERT INTO `subject` VALUES (273, 'S0197', 'English Literature 197', 4);
       INSERT INTO `subject` VALUES (274, 'S0198', 'Graphic Design 198', 5);
       INSERT INTO `subject` VALUES (275, 'S0199', 'Graphic Design 199', 4);
       INSERT INTO `subject` VALUES (276, 'S0200', 'Biology 200', 2);
       INSERT INTO `subject` VALUES (277, 'S0201', 'History 201', 3);
       INSERT INTO `subject` VALUES (278, 'S0202', 'Engineering Mechanics 202', 3);
       INSERT INTO `subject` VALUES (279, 'S0203', 'Genetics 203', 4);
       INSERT INTO `subject` VALUES (280, 'S0204', 'Speech Communication 204', 4);
       INSERT INTO `subject` VALUES (281, 'S0205', 'Psychology 205', 5);
       INSERT INTO `subject` VALUES (282, 'S0206', 'Chemistry 206', 5);
       INSERT INTO `subject` VALUES (283, 'S0207', 'Database Management 207', 5);
       INSERT INTO `subject` VALUES (284, 'S0208', 'Biology 208', 4);
       INSERT INTO `subject` VALUES (285, 'S0209', 'Environmental Science 209', 5);
       INSERT INTO `subject` VALUES (286, 'S0210', 'History 210', 5);
       INSERT INTO `subject` VALUES (287, 'S0211', 'Agriculture 211', 3);
       INSERT INTO `subject` VALUES (288, 'S0212', 'Human Resource Management 212', 4);
       INSERT INTO `subject` VALUES (289, 'S0213', 'Astronomy 213', 5);
       INSERT INTO `subject` VALUES (290, 'S0214', 'Anatomy 214', 5);
       INSERT INTO `subject` VALUES (291, 'S0215', 'Environmental Science 215', 4);
       INSERT INTO `subject` VALUES (292, 'S0216', 'Journalism 216', 4);
       INSERT INTO `subject` VALUES (293, 'S0217', 'Geography 217', 5);
       INSERT INTO `subject` VALUES (294, 'S0218', 'History 218', 4);
       INSERT INTO `subject` VALUES (295, 'S0219', 'Marine Biology 219', 5);
       INSERT INTO `subject` VALUES (296, 'S0220', 'Statistics 220', 5);
       INSERT INTO `subject` VALUES (297, 'S0221', 'Algorithms 221', 5);
       INSERT INTO `subject` VALUES (298, 'S0222', 'Marine Biology 222', 4);
       INSERT INTO `subject` VALUES (299, 'S0223', 'Astronomy 223', 5);
       INSERT INTO `subject` VALUES (300, 'S0224', 'Statistics 224', 5);
       INSERT INTO `subject` VALUES (301, 'S0225', 'Biology 225', 3);
       INSERT INTO `subject` VALUES (302, 'S0226', 'Data Structures 226', 4);
       INSERT INTO `subject` VALUES (303, 'S0227', 'Marine Biology 227', 5);
       INSERT INTO `subject` VALUES (304, 'S0228', 'Political Science 228', 5);
       INSERT INTO `subject` VALUES (305, 'S0229', 'Anatomy 229', 2);
       INSERT INTO `subject` VALUES (306, 'S0230', 'Law 230', 3);
       INSERT INTO `subject` VALUES (307, 'S0231', 'Architecture 231', 4);
       INSERT INTO `subject` VALUES (308, 'S0232', 'Marketing 232', 5);
       INSERT INTO `subject` VALUES (309, 'S0233', 'Philosophy 233', 5);
       INSERT INTO `subject` VALUES (310, 'S0234', 'Botany 234', 2);
       INSERT INTO `subject` VALUES (311, 'S0235', 'Medicine 235', 4);
       INSERT INTO `subject` VALUES (312, 'S0236', 'Marine Biology 236', 4);
       INSERT INTO `subject` VALUES (313, 'S0237', 'Physics 237', 3);
       INSERT INTO `subject` VALUES (314, 'S0238', 'Computer Science 238', 4);
       INSERT INTO `subject` VALUES (315, 'S0239', 'English Literature 239', 3);
       INSERT INTO `subject` VALUES (316, 'S0240', 'Zoology 240', 5);
       INSERT INTO `subject` VALUES (317, 'S0241', 'Data Structures 241', 2);
       INSERT INTO `subject` VALUES (318, 'S0242', 'Speech Communication 242', 5);
       INSERT INTO `subject` VALUES (319, 'S0243', 'Zoology 243', 4);
       INSERT INTO `subject` VALUES (320, 'S0244', 'Botany 244', 5);
       INSERT INTO `subject` VALUES (321, 'S0245', 'Biology 245', 2);
       INSERT INTO `subject` VALUES (322, 'S0246', 'Law 246', 5);
       INSERT INTO `subject` VALUES (323, 'S0247', 'Social Work 247', 2);
       INSERT INTO `subject` VALUES (324, 'S0248', 'History 248', 2);
       INSERT INTO `subject` VALUES (325, 'S0249', 'Astronautics 249', 4);
       INSERT INTO `subject` VALUES (326, 'S0250', 'Agriculture 250', 5);
       INSERT INTO `subject` VALUES (327, 'S0251', 'Creative Writing 251', 2);
       INSERT INTO `subject` VALUES (328, 'S0252', 'Graphic Design 252', 3);
       INSERT INTO `subject` VALUES (329, 'S0253', 'Chemistry 253', 4);
       INSERT INTO `subject` VALUES (330, 'S0254', 'Marketing 254', 4);
       INSERT INTO `subject` VALUES (331, 'S0255', 'Architecture 255', 4);
       INSERT INTO `subject` VALUES (332, 'S0256', 'Linguistics 256', 2);
       INSERT INTO `subject` VALUES (333, 'S0257', 'Public Health 257', 2);
       INSERT INTO `subject` VALUES (334, 'S0258', 'Anatomy 258', 3);
       INSERT INTO `subject` VALUES (335, 'S0259', 'Child Development 259', 4);
       INSERT INTO `subject` VALUES (336, 'S0260', 'Theater Arts 260', 5);
       INSERT INTO `subject` VALUES (337, 'S0261', 'Film Studies 261', 2);
       INSERT INTO `subject` VALUES (338, 'S0262', 'Oceanography 262', 3);
       INSERT INTO `subject` VALUES (339, 'S0263', 'Anthropology 263', 2);
       INSERT INTO `subject` VALUES (340, 'S0264', 'Microbiology 264', 4);
       INSERT INTO `subject` VALUES (341, 'S0265', 'Mathematics 265', 2);
       INSERT INTO `subject` VALUES (342, 'S0266', 'Agriculture 266', 2);
       INSERT INTO `subject` VALUES (343, 'S0267', 'Fine Arts 267', 3);
       INSERT INTO `subject` VALUES (344, 'S0268', 'Journalism 268', 4);
       INSERT INTO `subject` VALUES (345, 'S0269', 'Accounting 269', 4);
       INSERT INTO `subject` VALUES (346, 'S0270', 'Graphic Design 270', 5);
       INSERT INTO `subject` VALUES (347, 'S0271', 'Ethics 271', 5);
       INSERT INTO `subject` VALUES (348, 'S0272', 'Chemistry 272', 2);
       INSERT INTO `subject` VALUES (349, 'S0273', 'Child Development 273', 2);
       INSERT INTO `subject` VALUES (350, 'S0274', 'Network Security 274', 3);
       INSERT INTO `subject` VALUES (351, 'S0275', 'Law 275', 4);
       INSERT INTO `subject` VALUES (352, 'S0276', 'Physics 276', 4);
       INSERT INTO `subject` VALUES (353, 'S0277', 'Environmental Science 277', 2);
       INSERT INTO `subject` VALUES (354, 'S0278', 'Statistics 278', 3);
       INSERT INTO `subject` VALUES (355, 'S0279', 'Architecture 279', 5);
       INSERT INTO `subject` VALUES (356, 'S0280', 'Anthropology 280', 5);
       INSERT INTO `subject` VALUES (357, 'S0281', 'Microbiology 281', 3);
       INSERT INTO `subject` VALUES (358, 'S0282', 'Anatomy 282', 3);
       INSERT INTO `subject` VALUES (359, 'S0283', 'Nursing 283', 4);
       INSERT INTO `subject` VALUES (360, 'S0284', 'Statistics 284', 2);
       INSERT INTO `subject` VALUES (361, 'S0285', 'Artificial Intelligence 285', 3);
       INSERT INTO `subject` VALUES (362, 'S0286', 'Creative Writing 286', 4);
       INSERT INTO `subject` VALUES (363, 'S0287', 'Data Structures 287', 5);
       INSERT INTO `subject` VALUES (364, 'S0288', 'Social Work 288', 3);
       INSERT INTO `subject` VALUES (365, 'S0289', 'Nursing 289', 5);
       INSERT INTO `subject` VALUES (366, 'S0290', 'Fine Arts 290', 4);
       INSERT INTO `subject` VALUES (367, 'S0291', 'Journalism 291', 5);
       INSERT INTO `subject` VALUES (368, 'S0292', 'Philosophy 292', 2);
       INSERT INTO `subject` VALUES (369, 'S0293', 'Oceanography 293', 4);
       INSERT INTO `subject` VALUES (370, 'S0294', 'Marine Biology 294', 5);
       INSERT INTO `subject` VALUES (371, 'S0295', 'Speech Communication 295', 4);
       INSERT INTO `subject` VALUES (372, 'S0296', 'Pharmacology 296', 3);
       INSERT INTO `subject` VALUES (373, 'S0297', 'Physics 297', 5);
       INSERT INTO `subject` VALUES (374, 'S0298', 'Biology 298', 3);
       INSERT INTO `subject` VALUES (375, 'S0299', 'Astronautics 299', 3);
       INSERT INTO `subject` VALUES (376, 'S0300', 'Marketing 300', 4);
       INSERT INTO `subject` VALUES (377, 'S0301', 'Child Development 301', 3);
       INSERT INTO `subject` VALUES (378, 'S0302', 'Chemistry 302', 4);
       INSERT INTO `subject` VALUES (379, 'S0303', 'Finance 303', 5);
       INSERT INTO `subject` VALUES (380, 'S0304', 'Ethics 304', 5);
       INSERT INTO `subject` VALUES (381, 'S0305', 'Artificial Intelligence 305', 5);
       INSERT INTO `subject` VALUES (382, 'S0306', 'Mathematics 306', 4);
       INSERT INTO `subject` VALUES (383, 'S0307', 'Graphic Design 307', 5);
       INSERT INTO `subject` VALUES (384, 'S0308', 'Genetics 308', 4);
       INSERT INTO `subject` VALUES (385, 'S0309', 'History 309', 2);
       INSERT INTO `subject` VALUES (386, 'S0310', 'Ethics 310', 3);
       INSERT INTO `subject` VALUES (387, 'S0311', 'Creative Writing 311', 3);
       INSERT INTO `subject` VALUES (388, 'S0312', 'Nursing 312', 3);
       INSERT INTO `subject` VALUES (389, 'S0313', 'Anatomy 313', 5);
       INSERT INTO `subject` VALUES (390, 'S0314', 'Microbiology 314', 4);
       INSERT INTO `subject` VALUES (391, 'S0315', 'Public Health 315', 5);
       INSERT INTO `subject` VALUES (392, 'S0316', 'Genetics 316', 2);
       INSERT INTO `subject` VALUES (393, 'S0317', 'Economics 317', 2);
       INSERT INTO `subject` VALUES (394, 'S0318', 'Social Work 318', 3);
       INSERT INTO `subject` VALUES (395, 'S0319', 'Linguistics 319', 3);
       INSERT INTO `subject` VALUES (396, 'S0320', 'Child Development 320', 3);
       INSERT INTO `subject` VALUES (397, 'S0321', 'Psychology 321', 3);
       INSERT INTO `subject` VALUES (398, 'S0322', 'Network Security 322', 3);
       INSERT INTO `subject` VALUES (399, 'S0323', 'Statistics 323', 3);
       INSERT INTO `subject` VALUES (400, 'S0324', 'Psychology 324', 3);
       INSERT INTO `subject` VALUES (401, 'S0325', 'Astronautics 325', 2);
       INSERT INTO `subject` VALUES (402, 'S0326', 'Oceanography 326', 2);
       INSERT INTO `subject` VALUES (403, 'S0327', 'Physics 327', 2);
       INSERT INTO `subject` VALUES (404, 'S0328', 'History 328', 3);
       INSERT INTO `subject` VALUES (405, 'S0329', 'Ethics 329', 4);
       INSERT INTO `subject` VALUES (406, 'S0330', 'Architecture 330', 4);
       INSERT INTO `subject` VALUES (407, 'S0331', 'Psychology 331', 4);
       INSERT INTO `subject` VALUES (408, 'S0332', 'Chemistry 332', 5);
       INSERT INTO `subject` VALUES (409, 'S0333', 'Astronomy 333', 3);
       INSERT INTO `subject` VALUES (410, 'S0334', 'Business Management 334', 2);
       INSERT INTO `subject` VALUES (411, 'S0335', 'Child Development 335', 3);
       INSERT INTO `subject` VALUES (412, 'S0336', 'Architecture 336', 2);
       INSERT INTO `subject` VALUES (413, 'S0337', 'Network Security 337', 3);
       INSERT INTO `subject` VALUES (414, 'S0338', 'Anatomy 338', 2);
       INSERT INTO `subject` VALUES (415, 'S0339', 'Ethics 339', 5);
       INSERT INTO `subject` VALUES (416, 'S0340', 'Anatomy 340', 3);
       INSERT INTO `subject` VALUES (417, 'S0341', 'Economics 341', 2);
       INSERT INTO `subject` VALUES (418, 'S0342', 'English Literature 342', 3);
       INSERT INTO `subject` VALUES (419, 'S0343', 'Speech Communication 343', 3);
       INSERT INTO `subject` VALUES (420, 'S0344', 'Biology 344', 2);
       INSERT INTO `subject` VALUES (421, 'S0345', 'Chemistry 345', 3);
       INSERT INTO `subject` VALUES (422, 'S0346', 'Marketing 346', 2);
       INSERT INTO `subject` VALUES (423, 'S0347', 'Finance 347', 5);
       INSERT INTO `subject` VALUES (424, 'S0348', 'Graphic Design 348', 4);
       INSERT INTO `subject` VALUES (425, 'S0349', 'Child Development 349', 4);
       INSERT INTO `subject` VALUES (426, 'S0350', 'Philosophy 350', 4);
       INSERT INTO `subject` VALUES (427, 'S0351', 'Environmental Science 351', 3);
       INSERT INTO `subject` VALUES (428, 'S0352', 'Physiology 352', 5);
       INSERT INTO `subject` VALUES (429, 'S0353', 'Finance 353', 5);
       INSERT INTO `subject` VALUES (430, 'S0354', 'Education 354', 4);
       INSERT INTO `subject` VALUES (431, 'S0355', 'Economics 355', 4);
       INSERT INTO `subject` VALUES (432, 'S0356', 'Microbiology 356', 4);
       INSERT INTO `subject` VALUES (433, 'S0357', 'Accounting 357', 5);
       INSERT INTO `subject` VALUES (434, 'S0358', 'Nursing 358', 4);
       INSERT INTO `subject` VALUES (435, 'S0359', 'Zoology 359', 5);
       INSERT INTO `subject` VALUES (436, 'S0360', 'Mathematics 360', 4);
       INSERT INTO `subject` VALUES (437, 'S0361', 'Law 361', 4);
       INSERT INTO `subject` VALUES (438, 'S0362', 'Medicine 362', 3);
       INSERT INTO `subject` VALUES (439, 'S0363', 'Public Health 363', 4);
       INSERT INTO `subject` VALUES (440, 'S0364', 'Artificial Intelligence 364', 5);
       INSERT INTO `subject` VALUES (441, 'S0365', 'Algorithms 365', 4);
       INSERT INTO `subject` VALUES (442, 'S0366', 'Theater Arts 366', 2);
       INSERT INTO `subject` VALUES (443, 'S0367', 'Graphic Design 367', 2);
       INSERT INTO `subject` VALUES (444, 'S0368', 'Chemistry 368', 2);
       INSERT INTO `subject` VALUES (445, 'S0369', 'Sociology 369', 4);
       INSERT INTO `subject` VALUES (446, 'S0370', 'Psychology 370', 4);
       INSERT INTO `subject` VALUES (447, 'S0371', 'Network Security 371', 5);
       INSERT INTO `subject` VALUES (448, 'S0372', 'Law 372', 2);
       INSERT INTO `subject` VALUES (449, 'S0373', 'Finance 373', 3);
       INSERT INTO `subject` VALUES (450, 'S0374', 'Public Health 374', 2);
       INSERT INTO `subject` VALUES (451, 'S0375', 'Astronomy 375', 5);
       INSERT INTO `subject` VALUES (452, 'S0376', 'Astronautics 376', 2);
       INSERT INTO `subject` VALUES (453, 'S0377', 'Ethics 377', 3);
       INSERT INTO `subject` VALUES (454, 'S0378', 'Graphic Design 378', 2);
       INSERT INTO `subject` VALUES (455, 'S0379', 'Accounting 379', 4);
       INSERT INTO `subject` VALUES (456, 'S0380', 'Ethics 380', 3);
       INSERT INTO `subject` VALUES (457, 'S0381', 'Economics 381', 4);
       INSERT INTO `subject` VALUES (458, 'S0382', 'Psychology 382', 4);
       INSERT INTO `subject` VALUES (459, 'S0383', 'Biology 383', 2);
       INSERT INTO `subject` VALUES (460, 'S0384', 'Philosophy 384', 2);
       INSERT INTO `subject` VALUES (461, 'S0385', 'Fine Arts 385', 4);
       INSERT INTO `subject` VALUES (462, 'S0386', 'Agriculture 386', 3);
       INSERT INTO `subject` VALUES (463, 'S0387', 'Database Management 387', 4);
       INSERT INTO `subject` VALUES (464, 'S0388', 'Physics 388', 3);
       INSERT INTO `subject` VALUES (465, 'S0389', 'Law 389', 4);
       INSERT INTO `subject` VALUES (466, 'S0390', 'Operating Systems 390', 2);
       INSERT INTO `subject` VALUES (467, 'S0391', 'Environmental Science 391', 3);
       INSERT INTO `subject` VALUES (468, 'S0392', 'Marketing 392', 2);
       INSERT INTO `subject` VALUES (469, 'S0393', 'Graphic Design 393', 3);
       INSERT INTO `subject` VALUES (470, 'S0394', 'Speech Communication 394', 4);
       INSERT INTO `subject` VALUES (471, 'S0395', 'Speech Communication 395', 4);
       INSERT INTO `subject` VALUES (472, 'S0396', 'Film Studies 396', 2);
       INSERT INTO `subject` VALUES (473, 'S0397', 'Religious Studies 397', 4);
       INSERT INTO `subject` VALUES (474, 'S0398', 'Psychology 398', 4);
       INSERT INTO `subject` VALUES (475, 'S0399', 'Nursing 399', 5);
       INSERT INTO `subject` VALUES (476, 'S0400', 'Medicine 400', 3);
       INSERT INTO `subject` VALUES (477, 'S0401', 'Botany 401', 3);
       INSERT INTO `subject` VALUES (478, 'S0402', 'Theater Arts 402', 5);
       INSERT INTO `subject` VALUES (479, 'S0403', 'Ethics 403', 5);
       INSERT INTO `subject` VALUES (480, 'S0404', 'Astronomy 404', 2);
       INSERT INTO `subject` VALUES (481, 'S0405', 'Data Structures 405', 3);
       INSERT INTO `subject` VALUES (482, 'S0406', 'Religious Studies 406', 4);
       INSERT INTO `subject` VALUES (483, 'S0407', 'Network Security 407', 5);
       INSERT INTO `subject` VALUES (484, 'S0408', 'Operating Systems 408', 4);
       INSERT INTO `subject` VALUES (485, 'S0409', 'English Literature 409', 2);
       INSERT INTO `subject` VALUES (486, 'S0410', 'Anthropology 410', 3);
       INSERT INTO `subject` VALUES (487, 'S0411', 'Philosophy 411', 3);
       INSERT INTO `subject` VALUES (488, 'S0412', 'Physics 412', 4);
       INSERT INTO `subject` VALUES (489, 'S0413', 'Microbiology 413', 5);
       INSERT INTO `subject` VALUES (490, 'S0414', 'Network Security 414', 2);
       INSERT INTO `subject` VALUES (491, 'S0415', 'Film Studies 415', 3);
       INSERT INTO `subject` VALUES (492, 'S0416', 'Artificial Intelligence 416', 2);
       INSERT INTO `subject` VALUES (493, 'S0417', 'Economics 417', 4);
       INSERT INTO `subject` VALUES (494, 'S0418', 'History 418', 2);
       INSERT INTO `subject` VALUES (495, 'S0419', 'Operating Systems 419', 5);
       INSERT INTO `subject` VALUES (496, 'S0420', 'Genetics 420', 3);
       INSERT INTO `subject` VALUES (497, 'S0421', 'Mathematics 421', 2);
       INSERT INTO `subject` VALUES (498, 'S0422', 'Graphic Design 422', 5);
       INSERT INTO `subject` VALUES (499, 'S0423', 'Anatomy 423', 2);
       INSERT INTO `subject` VALUES (500, 'S0424', 'Linguistics 424', 4);
       INSERT INTO `subject` VALUES (501, 'S0425', 'Philosophy 425', 4);
       INSERT INTO `subject` VALUES (502, 'S0426', 'Operating Systems 426', 4);
       INSERT INTO `subject` VALUES (503, 'S0427', 'Marine Biology 427', 2);
       INSERT INTO `subject` VALUES (504, 'S0428', 'Pharmacology 428', 2);
       INSERT INTO `subject` VALUES (505, 'S0429', 'Marketing 429', 2);
       INSERT INTO `subject` VALUES (506, 'S0430', 'Psychology 430', 4);
       INSERT INTO `subject` VALUES (507, 'S0431', 'Fine Arts 431', 3);
       INSERT INTO `subject` VALUES (508, 'S0432', 'Fine Arts 432', 4);
       INSERT INTO `subject` VALUES (509, 'S0433', 'Political Science 433', 2);
       INSERT INTO `subject` VALUES (510, 'S0434', 'Zoology 434', 4);
       INSERT INTO `subject` VALUES (511, 'S0435', 'Statistics 435', 3);
       INSERT INTO `subject` VALUES (512, 'S0436', 'Marine Biology 436', 2);
       INSERT INTO `subject` VALUES (513, 'S0437', 'Linguistics 437', 5);
       INSERT INTO `subject` VALUES (514, 'S0438', 'Physiology 438', 3);
       INSERT INTO `subject` VALUES (515, 'S0439', 'Speech Communication 439', 2);
       INSERT INTO `subject` VALUES (516, 'S0440', 'Sociology 440', 4);
       INSERT INTO `subject` VALUES (517, 'S0441', 'Child Development 441', 2);
       INSERT INTO `subject` VALUES (518, 'S0442', 'Linguistics 442', 2);
       INSERT INTO `subject` VALUES (519, 'S0443', 'Public Health 443', 4);
       INSERT INTO `subject` VALUES (520, 'S0444', 'Ethics 444', 3);
       INSERT INTO `subject` VALUES (521, 'S0445', 'Database Management 445', 5);
       INSERT INTO `subject` VALUES (522, 'S0446', 'Anatomy 446', 3);
       INSERT INTO `subject` VALUES (523, 'S0447', 'English Literature 447', 2);
       INSERT INTO `subject` VALUES (524, 'S0448', 'Theater Arts 448', 4);
       INSERT INTO `subject` VALUES (525, 'S0449', 'Education 449', 2);
       INSERT INTO `subject` VALUES (526, 'S0450', 'Philosophy 450', 2);
       INSERT INTO `subject` VALUES (527, 'S0451', 'Psychology 451', 5);
       INSERT INTO `subject` VALUES (528, 'S0452', 'Agriculture 452', 2);
       INSERT INTO `subject` VALUES (529, 'S0453', 'Botany 453', 5);
       INSERT INTO `subject` VALUES (530, 'S0454', 'Physiology 454', 3);
       INSERT INTO `subject` VALUES (531, 'S0455', 'Nursing 455', 3);
       INSERT INTO `subject` VALUES (532, 'S0456', 'Economics 456', 2);
       INSERT INTO `subject` VALUES (533, 'S0457', 'Graphic Design 457', 3);
       INSERT INTO `subject` VALUES (534, 'S0458', 'Artificial Intelligence 458', 3);
       INSERT INTO `subject` VALUES (535, 'S0459', 'Mathematics 459', 5);
       INSERT INTO `subject` VALUES (536, 'S0460', 'Environmental Science 460', 3);
       INSERT INTO `subject` VALUES (537, 'S0461', 'Child Development 461', 2);
       INSERT INTO `subject` VALUES (538, 'S0462', 'Nursing 462', 3);
       INSERT INTO `subject` VALUES (539, 'S0463', 'Linguistics 463', 5);
       INSERT INTO `subject` VALUES (540, 'S0464', 'Psychology 464', 3);
       INSERT INTO `subject` VALUES (541, 'S0465', 'Religious Studies 465', 5);
       INSERT INTO `subject` VALUES (542, 'S0466', 'Child Development 466', 4);
       INSERT INTO `subject` VALUES (543, 'S0467', 'Astronomy 467', 3);
       INSERT INTO `subject` VALUES (544, 'S0468', 'Speech Communication 468', 2);
       INSERT INTO `subject` VALUES (545, 'S0469', 'Network Security 469', 5);
       INSERT INTO `subject` VALUES (546, 'S0470', 'Medicine 470', 3);
       INSERT INTO `subject` VALUES (547, 'S0471', 'Oceanography 471', 5);
       INSERT INTO `subject` VALUES (548, 'S0472', 'Physics 472', 3);
       INSERT INTO `subject` VALUES (549, 'S0473', 'Religious Studies 473', 4);
       INSERT INTO `subject` VALUES (550, 'S0474', 'Psychology 474', 2);
       INSERT INTO `subject` VALUES (551, 'S0475', 'Pharmacology 475', 2);
       INSERT INTO `subject` VALUES (552, 'S0476', 'Child Development 476', 5);
       INSERT INTO `subject` VALUES (553, 'S0477', 'Microbiology 477', 4);
       INSERT INTO `subject` VALUES (554, 'S0478', 'Physics 478', 5);
       INSERT INTO `subject` VALUES (555, 'S0479', 'Chemistry 479', 5);
       INSERT INTO `subject` VALUES (556, 'S0480', 'Network Security 480', 3);
       INSERT INTO `subject` VALUES (557, 'S0481', 'Marine Biology 481', 5);
       INSERT INTO `subject` VALUES (558, 'S0482', 'Child Development 482', 3);
       INSERT INTO `subject` VALUES (559, 'S0483', 'Child Development 483', 2);
       INSERT INTO `subject` VALUES (560, 'S0484', 'Political Science 484', 2);
       INSERT INTO `subject` VALUES (561, 'S0485', 'Linguistics 485', 5);
       INSERT INTO `subject` VALUES (562, 'S0486', 'Religious Studies 486', 5);
       INSERT INTO `subject` VALUES (563, 'S0487', 'Physiology 487', 4);
       INSERT INTO `subject` VALUES (564, 'S0488', 'Speech Communication 488', 5);
       INSERT INTO `subject` VALUES (565, 'S0489', 'Political Science 489', 2);
       INSERT INTO `subject` VALUES (566, 'S0490', 'Computer Science 490', 3);
       INSERT INTO `subject` VALUES (567, 'S0491', 'Artificial Intelligence 491', 5);
       INSERT INTO `subject` VALUES (568, 'S0492', 'Physics 492', 5);
       INSERT INTO `subject` VALUES (569, 'S0493', 'Economics 493', 2);
       INSERT INTO `subject` VALUES (570, 'S0494', 'Engineering Mechanics 494', 2);
       INSERT INTO `subject` VALUES (571, 'S0495', 'Astronomy 495', 4);
       INSERT INTO `subject` VALUES (572, 'S0496', 'Database Management 496', 2);
       INSERT INTO `subject` VALUES (573, 'S0497', 'Pharmacology 497', 3);
       INSERT INTO `subject` VALUES (574, 'S0498', 'Economics 498', 4);
       INSERT INTO `subject` VALUES (575, 'S0499', 'Accounting 499', 3);
       INSERT INTO `subject` VALUES (576, 'S0500', 'Operating Systems 500', 4);
       INSERT INTO `subject` VALUES (577, 'S0501', 'Architecture 501', 2);
       INSERT INTO `subject` VALUES (578, 'S0502', 'Chemistry 502', 3);
       INSERT INTO `subject` VALUES (579, 'S0503', 'Biology 503', 2);
       INSERT INTO `subject` VALUES (580, 'S0504', 'Oceanography 504', 2);
       INSERT INTO `subject` VALUES (581, 'S0505', 'Marketing 505', 5);
       INSERT INTO `subject` VALUES (582, 'S0506', 'Biology 506', 4);
       INSERT INTO `subject` VALUES (583, 'S0507', 'Computer Science 507', 2);
       INSERT INTO `subject` VALUES (584, 'S0508', 'Microbiology 508', 4);
       INSERT INTO `subject` VALUES (585, 'S0509', 'English Literature 509', 5);
       INSERT INTO `subject` VALUES (586, 'S0510', 'Child Development 510', 2);
       INSERT INTO `subject` VALUES (587, 'S0511', 'Business Management 511', 5);
       INSERT INTO `subject` VALUES (588, 'S0512', 'Finance 512', 5);
       INSERT INTO `subject` VALUES (589, 'S0513', 'Philosophy 513', 5);
       INSERT INTO `subject` VALUES (590, 'S0514', 'Physics 514', 3);
       INSERT INTO `subject` VALUES (591, 'S0515', 'Law 515', 4);
       INSERT INTO `subject` VALUES (592, 'S0516', 'Network Security 516', 4);
       INSERT INTO `subject` VALUES (593, 'S0517', 'Religious Studies 517', 5);
       INSERT INTO `subject` VALUES (594, 'S0518', 'Astronomy 518', 3);
       INSERT INTO `subject` VALUES (595, 'S0519', 'Religious Studies 519', 3);
       INSERT INTO `subject` VALUES (596, 'S0520', 'Pharmacology 520', 4);
       INSERT INTO `subject` VALUES (597, 'S0521', 'Anthropology 521', 5);
       INSERT INTO `subject` VALUES (598, 'S0522', 'Zoology 522', 3);
       INSERT INTO `subject` VALUES (599, 'S0523', 'Linguistics 523', 3);
       INSERT INTO `subject` VALUES (600, 'S0524', 'Human Resource Management 524', 2);
       INSERT INTO `subject` VALUES (601, 'S0525', 'Sociology 525', 3);
       INSERT INTO `subject` VALUES (602, 'S0526', 'Marketing 526', 2);
       INSERT INTO `subject` VALUES (603, 'S0527', 'Data Structures 527', 3);
       INSERT INTO `subject` VALUES (604, 'S0528', 'Creative Writing 528', 3);
       INSERT INTO `subject` VALUES (605, 'S0529', 'Engineering Mechanics 529', 5);
       INSERT INTO `subject` VALUES (606, 'S0530', 'Marketing 530', 4);
       INSERT INTO `subject` VALUES (607, 'S0531', 'Speech Communication 531', 2);
       INSERT INTO `subject` VALUES (608, 'S0532', 'Sociology 532', 5);
       INSERT INTO `subject` VALUES (609, 'S0533', 'History 533', 2);
       INSERT INTO `subject` VALUES (610, 'S0534', 'Computer Science 534', 3);
       INSERT INTO `subject` VALUES (611, 'S0535', 'Network Security 535', 3);
       INSERT INTO `subject` VALUES (612, 'S0536', 'Oceanography 536', 3);
       INSERT INTO `subject` VALUES (613, 'S0537', 'Operating Systems 537', 2);
       INSERT INTO `subject` VALUES (614, 'S0538', 'Astronautics 538', 4);
       INSERT INTO `subject` VALUES (615, 'S0539', 'Fine Arts 539', 5);
       INSERT INTO `subject` VALUES (616, 'S0540', 'English Literature 540', 4);
       INSERT INTO `subject` VALUES (617, 'S0541', 'Public Health 541', 5);
       INSERT INTO `subject` VALUES (618, 'S0542', 'Creative Writing 542', 4);
       INSERT INTO `subject` VALUES (619, 'S0543', 'Physiology 543', 3);
       INSERT INTO `subject` VALUES (620, 'S0544', 'Sociology 544', 5);
       INSERT INTO `subject` VALUES (621, 'S0545', 'Database Management 545', 5);
       INSERT INTO `subject` VALUES (622, 'S0546', 'Religious Studies 546', 4);
       INSERT INTO `subject` VALUES (623, 'S0547', 'Artificial Intelligence 547', 3);
       INSERT INTO `subject` VALUES (624, 'S0548', 'Education 548', 3);
       INSERT INTO `subject` VALUES (625, 'S0549', 'Oceanography 549', 4);
       INSERT INTO `subject` VALUES (626, 'S0550', 'Human Resource Management 550', 2);
       INSERT INTO `subject` VALUES (627, 'S0551', 'Physics 551', 4);
       INSERT INTO `subject` VALUES (628, 'S0552', 'Sociology 552', 4);
       INSERT INTO `subject` VALUES (629, 'S0553', 'History 553', 5);
       INSERT INTO `subject` VALUES (630, 'S0554', 'Engineering Mechanics 554', 2);
       INSERT INTO `subject` VALUES (631, 'S0555', 'Public Health 555', 2);
       INSERT INTO `subject` VALUES (632, 'S0556', 'Graphic Design 556', 2);
       INSERT INTO `subject` VALUES (633, 'S0557', 'Architecture 557', 5);
       INSERT INTO `subject` VALUES (634, 'S0558', 'Genetics 558', 4);
       INSERT INTO `subject` VALUES (635, 'S0559', 'Sociology 559', 3);
       INSERT INTO `subject` VALUES (636, 'S0560', 'Speech Communication 560', 2);
       INSERT INTO `subject` VALUES (637, 'S0561', 'Mathematics 561', 2);
       INSERT INTO `subject` VALUES (638, 'S0562', 'Graphic Design 562', 4);
       INSERT INTO `subject` VALUES (639, 'S0563', 'Network Security 563', 2);
       INSERT INTO `subject` VALUES (640, 'S0564', 'Computer Science 564', 4);
       INSERT INTO `subject` VALUES (641, 'S0565', 'Physics 565', 5);
       INSERT INTO `subject` VALUES (642, 'S0566', 'Sociology 566', 2);
       INSERT INTO `subject` VALUES (643, 'S0567', 'Business Management 567', 5);
       INSERT INTO `subject` VALUES (644, 'S0568', 'Algorithms 568', 3);
       INSERT INTO `subject` VALUES (645, 'S0569', 'History 569', 4);
       INSERT INTO `subject` VALUES (646, 'S0570', 'Speech Communication 570', 3);
       INSERT INTO `subject` VALUES (647, 'S0571', 'Creative Writing 571', 3);
       INSERT INTO `subject` VALUES (648, 'S0572', 'Political Science 572', 4);
       INSERT INTO `subject` VALUES (649, 'S0573', 'Physics 573', 5);
       INSERT INTO `subject` VALUES (650, 'S0574', 'Anatomy 574', 2);
       INSERT INTO `subject` VALUES (651, 'S0575', 'Computer Science 575', 5);
       INSERT INTO `subject` VALUES (652, 'S0576', 'Anatomy 576', 2);
       INSERT INTO `subject` VALUES (653, 'S0577', 'History 577', 3);
       INSERT INTO `subject` VALUES (654, 'S0578', 'Psychology 578', 3);
       INSERT INTO `subject` VALUES (655, 'S0579', 'Astronautics 579', 2);
       INSERT INTO `subject` VALUES (656, 'S0580', 'Nursing 580', 4);
       INSERT INTO `subject` VALUES (657, 'S0581', 'Biology 581', 3);
       INSERT INTO `subject` VALUES (658, 'S0582', 'Finance 582', 3);
       INSERT INTO `subject` VALUES (659, 'S0583', 'Chemistry 583', 4);
       INSERT INTO `subject` VALUES (660, 'S0584', 'Social Work 584', 5);
       INSERT INTO `subject` VALUES (661, 'S0585', 'Graphic Design 585', 5);
       INSERT INTO `subject` VALUES (662, 'S0586', 'Social Work 586', 2);
       INSERT INTO `subject` VALUES (663, 'S0587', 'Environmental Science 587', 4);
       INSERT INTO `subject` VALUES (664, 'S0588', 'Statistics 588', 3);
       INSERT INTO `subject` VALUES (665, 'S0589', 'Sociology 589', 3);
       INSERT INTO `subject` VALUES (666, 'S0590', 'Mathematics 590', 2);
       INSERT INTO `subject` VALUES (667, 'S0591', 'Creative Writing 591', 4);
       INSERT INTO `subject` VALUES (668, 'S0592', 'Business Management 592', 4);
       INSERT INTO `subject` VALUES (669, 'S0593', 'Engineering Mechanics 593', 5);
       INSERT INTO `subject` VALUES (670, 'S0594', 'Geography 594', 5);
       INSERT INTO `subject` VALUES (671, 'S0595', 'Business Management 595', 2);
       INSERT INTO `subject` VALUES (672, 'S0596', 'Child Development 596', 5);
       INSERT INTO `subject` VALUES (673, 'S0597', 'Environmental Science 597', 4);
       INSERT INTO `subject` VALUES (674, 'S0598', 'Computer Science 598', 4);
       INSERT INTO `subject` VALUES (675, 'S0599', 'Botany 599', 3);
       INSERT INTO `subject` VALUES (676, 'S0600', 'Law 600', 4);
       INSERT INTO `subject` VALUES (677, 'S0601', 'Business Management 601', 4);
       INSERT INTO `subject` VALUES (678, 'S0602', 'Accounting 602', 2);
       INSERT INTO `subject` VALUES (679, 'S0603', 'Agriculture 603', 5);
       INSERT INTO `subject` VALUES (680, 'S0604', 'Film Studies 604', 3);
       INSERT INTO `subject` VALUES (681, 'S0605', 'Law 605', 5);
       INSERT INTO `subject` VALUES (682, 'S0606', 'Marine Biology 606', 3);
       INSERT INTO `subject` VALUES (683, 'S0607', 'Marketing 607', 3);
       INSERT INTO `subject` VALUES (684, 'S0608', 'Economics 608', 3);
       INSERT INTO `subject` VALUES (685, 'S0609', 'Data Structures 609', 5);
       INSERT INTO `subject` VALUES (686, 'S0610', 'Political Science 610', 3);
       INSERT INTO `subject` VALUES (687, 'S0611', 'Zoology 611', 4);
       INSERT INTO `subject` VALUES (688, 'S0612', 'Journalism 612', 5);
       INSERT INTO `subject` VALUES (689, 'S0613', 'Creative Writing 613', 3);
       INSERT INTO `subject` VALUES (690, 'S0614', 'Child Development 614', 3);
       INSERT INTO `subject` VALUES (691, 'S0615', 'Public Health 615', 3);
       INSERT INTO `subject` VALUES (692, 'S0616', 'Medicine 616', 4);
       INSERT INTO `subject` VALUES (693, 'S0617', 'Nursing 617', 3);
       INSERT INTO `subject` VALUES (694, 'S0618', 'Sociology 618', 3);
       INSERT INTO `subject` VALUES (695, 'S0619', 'Nursing 619', 3);
       INSERT INTO `subject` VALUES (696, 'S0620', 'Algorithms 620', 4);
       INSERT INTO `subject` VALUES (697, 'S0621', 'Anatomy 621', 3);
       INSERT INTO `subject` VALUES (698, 'S0622', 'Ethics 622', 3);
       INSERT INTO `subject` VALUES (699, 'S0623', 'Chemistry 623', 3);
       INSERT INTO `subject` VALUES (700, 'S0624', 'Database Management 624', 4);
       INSERT INTO `subject` VALUES (701, 'S0625', 'Accounting 625', 3);
       INSERT INTO `subject` VALUES (702, 'S0626', 'Zoology 626', 5);
       INSERT INTO `subject` VALUES (703, 'S0627', 'Database Management 627', 2);
       INSERT INTO `subject` VALUES (704, 'S0628', 'Philosophy 628', 2);
       INSERT INTO `subject` VALUES (705, 'S0629', 'Ethics 629', 2);
       INSERT INTO `subject` VALUES (706, 'S0630', 'Algorithms 630', 3);
       INSERT INTO `subject` VALUES (707, 'S0631', 'Ethics 631', 5);
       INSERT INTO `subject` VALUES (708, 'S0632', 'Oceanography 632', 2);
       INSERT INTO `subject` VALUES (709, 'S0633', 'Network Security 633', 3);
       INSERT INTO `subject` VALUES (710, 'S0634', 'Fine Arts 634', 5);
       INSERT INTO `subject` VALUES (711, 'S0635', 'Network Security 635', 5);
       INSERT INTO `subject` VALUES (712, 'S0636', 'English Literature 636', 2);
       INSERT INTO `subject` VALUES (713, 'S0637', 'Religious Studies 637', 4);
       INSERT INTO `subject` VALUES (714, 'S0638', 'Biology 638', 3);
       INSERT INTO `subject` VALUES (715, 'S0639', 'Astronautics 639', 5);
       INSERT INTO `subject` VALUES (716, 'S0640', 'Engineering Mechanics 640', 3);
       INSERT INTO `subject` VALUES (717, 'S0641', 'Operating Systems 641', 5);
       INSERT INTO `subject` VALUES (718, 'S0642', 'Accounting 642', 4);
       INSERT INTO `subject` VALUES (719, 'S0643', 'Database Management 643', 3);
       INSERT INTO `subject` VALUES (720, 'S0644', 'Creative Writing 644', 5);
       INSERT INTO `subject` VALUES (721, 'S0645', 'Nursing 645', 4);
       INSERT INTO `subject` VALUES (722, 'S0646', 'Nursing 646', 4);
       INSERT INTO `subject` VALUES (723, 'S0647', 'Botany 647', 3);
       INSERT INTO `subject` VALUES (724, 'S0648', 'Nursing 648', 2);
       INSERT INTO `subject` VALUES (725, 'S0649', 'Zoology 649', 3);
       INSERT INTO `subject` VALUES (726, 'S0650', 'Journalism 650', 3);
       INSERT INTO `subject` VALUES (727, 'S0651', 'Operating Systems 651', 3);
       INSERT INTO `subject` VALUES (728, 'S0652', 'Philosophy 652', 2);
       INSERT INTO `subject` VALUES (729, 'S0653', 'Biology 653', 3);
       INSERT INTO `subject` VALUES (730, 'S0654', 'Fine Arts 654', 4);
       INSERT INTO `subject` VALUES (731, 'S0655', 'Geography 655', 2);
       INSERT INTO `subject` VALUES (732, 'S0656', 'Genetics 656', 4);
       INSERT INTO `subject` VALUES (733, 'S0657', 'Child Development 657', 3);
       INSERT INTO `subject` VALUES (734, 'S0658', 'Astronomy 658', 4);
       INSERT INTO `subject` VALUES (735, 'S0659', 'Anatomy 659', 3);
       INSERT INTO `subject` VALUES (736, 'S0660', 'Creative Writing 660', 4);
       INSERT INTO `subject` VALUES (737, 'S0661', 'Network Security 661', 3);
       INSERT INTO `subject` VALUES (738, 'S0662', 'Ethics 662', 2);
       INSERT INTO `subject` VALUES (739, 'S0663', 'Geography 663', 5);
       INSERT INTO `subject` VALUES (740, 'S0664', 'Medicine 664', 4);
       INSERT INTO `subject` VALUES (741, 'S0665', 'Creative Writing 665', 3);
       INSERT INTO `subject` VALUES (742, 'S0666', 'History 666', 5);
       INSERT INTO `subject` VALUES (743, 'S0667', 'Artificial Intelligence 667', 3);
       INSERT INTO `subject` VALUES (744, 'S0668', 'Biology 668', 3);
       INSERT INTO `subject` VALUES (745, 'S0669', 'Geography 669', 5);
       INSERT INTO `subject` VALUES (746, 'S0670', 'Sociology 670', 5);
       INSERT INTO `subject` VALUES (747, 'S0671', 'Biology 671', 4);
       INSERT INTO `subject` VALUES (748, 'S0672', 'Botany 672', 5);
       INSERT INTO `subject` VALUES (749, 'S0673', 'Child Development 673', 3);
       INSERT INTO `subject` VALUES (750, 'S0674', 'Algorithms 674', 3);
       INSERT INTO `subject` VALUES (751, 'S0675', 'Business Management 675', 5);
       INSERT INTO `subject` VALUES (752, 'S0676', 'Law 676', 2);
       INSERT INTO `subject` VALUES (753, 'S0677', 'Microbiology 677', 5);
       INSERT INTO `subject` VALUES (754, 'S0678', 'Chemistry 678', 2);
       INSERT INTO `subject` VALUES (755, 'S0679', 'Nursing 679', 2);
       INSERT INTO `subject` VALUES (756, 'S0680', 'Nursing 680', 3);
       INSERT INTO `subject` VALUES (757, 'S0681', 'Anthropology 681', 5);
       INSERT INTO `subject` VALUES (758, 'S0682', 'Child Development 682', 3);
       INSERT INTO `subject` VALUES (759, 'S0683', 'Journalism 683', 3);
       INSERT INTO `subject` VALUES (760, 'S0684', 'Geography 684', 5);
       INSERT INTO `subject` VALUES (761, 'S0685', 'Zoology 685', 4);
       INSERT INTO `subject` VALUES (762, 'S0686', 'Microbiology 686', 4);
       INSERT INTO `subject` VALUES (763, 'S0687', 'Anthropology 687', 5);
       INSERT INTO `subject` VALUES (764, 'S0688', 'English Literature 688', 2);
       INSERT INTO `subject` VALUES (765, 'S0689', 'English Literature 689', 5);
       INSERT INTO `subject` VALUES (766, 'S0690', 'Psychology 690', 4);
       INSERT INTO `subject` VALUES (767, 'S0691', 'English Literature 691', 2);
       INSERT INTO `subject` VALUES (768, 'S0692', 'Anatomy 692', 2);
       INSERT INTO `subject` VALUES (769, 'S0693', 'Linguistics 693', 5);
       INSERT INTO `subject` VALUES (770, 'S0694', 'Environmental Science 694', 2);
       INSERT INTO `subject` VALUES (771, 'S0695', 'English Literature 695', 4);
       INSERT INTO `subject` VALUES (772, 'S0696', 'Ethics 696', 4);
       INSERT INTO `subject` VALUES (773, 'S0697', 'Geography 697', 5);
       INSERT INTO `subject` VALUES (774, 'S0698', 'Agriculture 698', 2);
       INSERT INTO `subject` VALUES (775, 'S0699', 'Social Work 699', 3);
       INSERT INTO `subject` VALUES (776, 'S0700', 'Ethics 700', 2);
       INSERT INTO `subject` VALUES (777, 'S0701', 'Marine Biology 701', 5);
       INSERT INTO `subject` VALUES (778, 'S0702', 'Nursing 702', 3);
       INSERT INTO `subject` VALUES (779, 'S0703', 'Genetics 703', 2);
       INSERT INTO `subject` VALUES (780, 'S0704', 'Physiology 704', 4);
       INSERT INTO `subject` VALUES (781, 'S0705', 'Human Resource Management 705', 2);
       INSERT INTO `subject` VALUES (782, 'S0706', 'Fine Arts 706', 4);
       INSERT INTO `subject` VALUES (783, 'S0707', 'Ethics 707', 3);
       INSERT INTO `subject` VALUES (784, 'S0708', 'Film Studies 708', 3);
       INSERT INTO `subject` VALUES (785, 'S0709', 'Ethics 709', 5);
       INSERT INTO `subject` VALUES (786, 'S0710', 'Marketing 710', 2);
       INSERT INTO `subject` VALUES (787, 'S0711', 'Film Studies 711', 2);
       INSERT INTO `subject` VALUES (788, 'S0712', 'Creative Writing 712', 2);
       INSERT INTO `subject` VALUES (789, 'S0713', 'Biology 713', 3);
       INSERT INTO `subject` VALUES (790, 'S0714', 'Child Development 714', 2);
       INSERT INTO `subject` VALUES (791, 'S0715', 'Public Health 715', 3);
       INSERT INTO `subject` VALUES (792, 'S0716', 'Fine Arts 716', 4);
       INSERT INTO `subject` VALUES (793, 'S0717', 'Astronomy 717', 3);
       INSERT INTO `subject` VALUES (794, 'S0718', 'Anthropology 718', 3);
       INSERT INTO `subject` VALUES (795, 'S0719', 'Microbiology 719', 3);
       INSERT INTO `subject` VALUES (796, 'S0720', 'Religious Studies 720', 2);
       INSERT INTO `subject` VALUES (797, 'S0721', 'Physics 721', 2);
       INSERT INTO `subject` VALUES (798, 'S0722', 'Mathematics 722', 5);
       INSERT INTO `subject` VALUES (799, 'S0723', 'Nursing 723', 3);
       INSERT INTO `subject` VALUES (800, 'S0724', 'Psychology 724', 4);
       INSERT INTO `subject` VALUES (801, 'S0725', 'Anatomy 725', 2);
       INSERT INTO `subject` VALUES (802, 'S0726', 'Database Management 726', 2);
       INSERT INTO `subject` VALUES (803, 'S0727', 'Microbiology 727', 5);
       INSERT INTO `subject` VALUES (804, 'S0728', 'Medicine 728', 3);
       INSERT INTO `subject` VALUES (805, 'S0729', 'Finance 729', 2);
       INSERT INTO `subject` VALUES (806, 'S0730', 'Graphic Design 730', 2);
       INSERT INTO `subject` VALUES (807, 'S0731', 'Political Science 731', 3);
       INSERT INTO `subject` VALUES (808, 'S0732', 'Finance 732', 2);
       INSERT INTO `subject` VALUES (809, 'S0733', 'Zoology 733', 4);
       INSERT INTO `subject` VALUES (810, 'S0734', 'Genetics 734', 5);
       INSERT INTO `subject` VALUES (811, 'S0735', 'Network Security 735', 5);
       INSERT INTO `subject` VALUES (812, 'S0736', 'Statistics 736', 4);
       INSERT INTO `subject` VALUES (813, 'S0737', 'Physics 737', 3);
       INSERT INTO `subject` VALUES (814, 'S0738', 'Religious Studies 738', 4);
       INSERT INTO `subject` VALUES (815, 'S0739', 'Medicine 739', 3);
       INSERT INTO `subject` VALUES (816, 'S0740', 'Law 740', 2);
       INSERT INTO `subject` VALUES (817, 'S0741', 'Operating Systems 741', 3);
       INSERT INTO `subject` VALUES (818, 'S0742', 'Psychology 742', 2);
       INSERT INTO `subject` VALUES (819, 'S0743', 'Journalism 743', 2);
       INSERT INTO `subject` VALUES (820, 'S0744', 'Ethics 744', 4);
       INSERT INTO `subject` VALUES (821, 'S0745', 'Speech Communication 745', 4);
       INSERT INTO `subject` VALUES (822, 'S0746', 'Medicine 746', 5);
       INSERT INTO `subject` VALUES (823, 'S0747', 'Network Security 747', 4);
       INSERT INTO `subject` VALUES (824, 'S0748', 'Botany 748', 2);
       INSERT INTO `subject` VALUES (825, 'S0749', 'Astronomy 749', 5);
       INSERT INTO `subject` VALUES (826, 'S0750', 'Marine Biology 750', 4);
       INSERT INTO `subject` VALUES (827, 'S0751', 'Architecture 751', 5);
       INSERT INTO `subject` VALUES (828, 'S0752', 'Astronautics 752', 3);
       INSERT INTO `subject` VALUES (829, 'S0753', 'Public Health 753', 5);
       INSERT INTO `subject` VALUES (830, 'S0754', 'Anthropology 754', 5);
       INSERT INTO `subject` VALUES (831, 'S0755', 'Physics 755', 4);
       INSERT INTO `subject` VALUES (832, 'S0756', 'English Literature 756', 3);
       INSERT INTO `subject` VALUES (833, 'S0757', 'Fine Arts 757', 4);
       INSERT INTO `subject` VALUES (834, 'S0758', 'Political Science 758', 4);
       INSERT INTO `subject` VALUES (835, 'S0759', 'Marine Biology 759', 2);
       INSERT INTO `subject` VALUES (836, 'S0760', 'Marine Biology 760', 2);
       INSERT INTO `subject` VALUES (837, 'S0761', 'Anatomy 761', 5);
       INSERT INTO `subject` VALUES (838, 'S0762', 'Graphic Design 762', 4);
       INSERT INTO `subject` VALUES (839, 'S0763', 'Agriculture 763', 4);
       INSERT INTO `subject` VALUES (840, 'S0764', 'Fine Arts 764', 2);
       INSERT INTO `subject` VALUES (841, 'S0765', 'Mathematics 765', 5);
       INSERT INTO `subject` VALUES (842, 'S0766', 'Astronautics 766', 4);
       INSERT INTO `subject` VALUES (843, 'S0767', 'Environmental Science 767', 2);
       INSERT INTO `subject` VALUES (844, 'S0768', 'Physiology 768', 3);
       INSERT INTO `subject` VALUES (845, 'S0769', 'Graphic Design 769', 3);
       INSERT INTO `subject` VALUES (846, 'S0770', 'Geography 770', 4);
       INSERT INTO `subject` VALUES (847, 'S0771', 'Physiology 771', 2);
       INSERT INTO `subject` VALUES (848, 'S0772', 'Education 772', 3);
       INSERT INTO `subject` VALUES (849, 'S0773', 'Fine Arts 773', 2);
       INSERT INTO `subject` VALUES (850, 'S0774', 'Algorithms 774', 5);
       INSERT INTO `subject` VALUES (851, 'S0775', 'Education 775', 4);
       INSERT INTO `subject` VALUES (852, 'S0776', 'Geography 776', 5);
       INSERT INTO `subject` VALUES (853, 'S0777', 'Environmental Science 777', 2);
       INSERT INTO `subject` VALUES (854, 'S0778', 'Database Management 778', 2);
       INSERT INTO `subject` VALUES (855, 'S0779', 'Social Work 779', 2);
       INSERT INTO `subject` VALUES (856, 'S0780', 'Psychology 780', 3);
       INSERT INTO `subject` VALUES (857, 'S0781', 'Network Security 781', 5);
       INSERT INTO `subject` VALUES (858, 'S0782', 'Human Resource Management 782', 4);
       INSERT INTO `subject` VALUES (859, 'S0783', 'Speech Communication 783', 5);
       INSERT INTO `subject` VALUES (860, 'S0784', 'Anthropology 784', 5);
       INSERT INTO `subject` VALUES (861, 'S0785', 'Geography 785', 4);
       INSERT INTO `subject` VALUES (862, 'S0786', 'Astronautics 786', 4);
       INSERT INTO `subject` VALUES (863, 'S0787', 'Agriculture 787', 4);
       INSERT INTO `subject` VALUES (864, 'S0788', 'Microbiology 788', 2);
       INSERT INTO `subject` VALUES (865, 'S0789', 'Creative Writing 789', 3);
       INSERT INTO `subject` VALUES (866, 'S0790', 'Anatomy 790', 5);
       INSERT INTO `subject` VALUES (867, 'S0791', 'Film Studies 791', 5);
       INSERT INTO `subject` VALUES (868, 'S0792', 'Law 792', 5);
       INSERT INTO `subject` VALUES (869, 'S0793', 'Statistics 793', 2);
       INSERT INTO `subject` VALUES (870, 'S0794', 'Anatomy 794', 4);
       INSERT INTO `subject` VALUES (871, 'S0795', 'Accounting 795', 5);
       INSERT INTO `subject` VALUES (872, 'S0796', 'Geography 796', 4);
       INSERT INTO `subject` VALUES (873, 'S0797', 'Database Management 797', 3);
       INSERT INTO `subject` VALUES (874, 'S0798', 'Network Security 798', 3);
       INSERT INTO `subject` VALUES (875, 'S0799', 'Ethics 799', 4);
       INSERT INTO `subject` VALUES (876, 'S0800', 'Anthropology 800', 5);
       INSERT INTO `subject` VALUES (877, 'S0801', 'Computer Science 801', 4);
       INSERT INTO `subject` VALUES (878, 'S0802', 'Physiology 802', 5);
       INSERT INTO `subject` VALUES (879, 'S0803', 'Marketing 803', 3);
       INSERT INTO `subject` VALUES (880, 'S0804', 'Anthropology 804', 5);
       INSERT INTO `subject` VALUES (881, 'S0805', 'Marketing 805', 2);
       INSERT INTO `subject` VALUES (882, 'S0806', 'Religious Studies 806', 4);
       INSERT INTO `subject` VALUES (883, 'S0807', 'Algorithms 807', 4);
       INSERT INTO `subject` VALUES (884, 'S0808', 'Engineering Mechanics 808', 5);
       INSERT INTO `subject` VALUES (885, 'S0809', 'English Literature 809', 3);
       INSERT INTO `subject` VALUES (886, 'S0810', 'Physics 810', 4);
       INSERT INTO `subject` VALUES (887, 'S0811', 'Law 811', 5);
       INSERT INTO `subject` VALUES (888, 'S0812', 'Artificial Intelligence 812', 5);
       INSERT INTO `subject` VALUES (889, 'S0813', 'Architecture 813', 3);
       INSERT INTO `subject` VALUES (890, 'S0814', 'Astronautics 814', 4);
       INSERT INTO `subject` VALUES (891, 'S0815', 'Network Security 815', 3);
       INSERT INTO `subject` VALUES (892, 'S0816', 'Religious Studies 816', 5);
       INSERT INTO `subject` VALUES (893, 'S0817', 'Mathematics 817', 2);
       INSERT INTO `subject` VALUES (894, 'S0818', 'Sociology 818', 5);
       INSERT INTO `subject` VALUES (895, 'S0819', 'Child Development 819', 5);
       INSERT INTO `subject` VALUES (896, 'S0820', 'Linguistics 820', 5);
       INSERT INTO `subject` VALUES (897, 'S0821', 'Economics 821', 5);
       INSERT INTO `subject` VALUES (898, 'S0822', 'Artificial Intelligence 822', 2);
       INSERT INTO `subject` VALUES (899, 'S0823', 'Data Structures 823', 5);
       INSERT INTO `subject` VALUES (900, 'S0824', 'Physiology 824', 3);
       INSERT INTO `subject` VALUES (901, 'S0825', 'Biology 825', 4);
       INSERT INTO `subject` VALUES (902, 'S0826', 'Marine Biology 826', 4);
       INSERT INTO `subject` VALUES (903, 'S0827', 'Nursing 827', 4);
       INSERT INTO `subject` VALUES (904, 'S0828', 'Linguistics 828', 2);
       INSERT INTO `subject` VALUES (905, 'S0829', 'Oceanography 829', 4);
       INSERT INTO `subject` VALUES (906, 'S0830', 'Fine Arts 830', 2);
       INSERT INTO `subject` VALUES (907, 'S0831', 'Anatomy 831', 4);
       INSERT INTO `subject` VALUES (908, 'S0832', 'Astronautics 832', 5);
       INSERT INTO `subject` VALUES (909, 'S0833', 'Graphic Design 833', 2);
       INSERT INTO `subject` VALUES (910, 'S0834', 'Social Work 834', 5);
       INSERT INTO `subject` VALUES (911, 'S0835', 'Economics 835', 2);
       INSERT INTO `subject` VALUES (912, 'S0836', 'Genetics 836', 2);
       INSERT INTO `subject` VALUES (913, 'S0837', 'Religious Studies 837', 4);
       INSERT INTO `subject` VALUES (914, 'S0838', 'Artificial Intelligence 838', 2);
       INSERT INTO `subject` VALUES (915, 'S0839', 'English Literature 839', 4);
       INSERT INTO `subject` VALUES (916, 'S0840', 'Law 840', 3);
       INSERT INTO `subject` VALUES (917, 'S0841', 'Business Management 841', 5);
       INSERT INTO `subject` VALUES (918, 'S0842', 'Pharmacology 842', 5);
       INSERT INTO `subject` VALUES (919, 'S0843', 'Accounting 843', 2);
       INSERT INTO `subject` VALUES (920, 'S0844', 'Fine Arts 844', 2);
       INSERT INTO `subject` VALUES (921, 'S0845', 'Physics 845', 2);
       INSERT INTO `subject` VALUES (922, 'S0846', 'Anatomy 846', 2);
       INSERT INTO `subject` VALUES (923, 'S0847', 'Architecture 847', 5);
       INSERT INTO `subject` VALUES (924, 'S0848', 'Political Science 848', 2);
       INSERT INTO `subject` VALUES (925, 'S0849', 'Theater Arts 849', 2);
       INSERT INTO `subject` VALUES (926, 'S0850', 'Accounting 850', 5);
       INSERT INTO `subject` VALUES (927, 'S0851', 'Algorithms 851', 4);
       INSERT INTO `subject` VALUES (928, 'S0852', 'Artificial Intelligence 852', 2);
       INSERT INTO `subject` VALUES (929, 'S0853', 'Speech Communication 853', 4);
       INSERT INTO `subject` VALUES (930, 'S0854', 'Anthropology 854', 5);
       INSERT INTO `subject` VALUES (931, 'S0855', 'Education 855', 5);
       INSERT INTO `subject` VALUES (932, 'S0856', 'History 856', 5);
       INSERT INTO `subject` VALUES (933, 'S0857', 'Nursing 857', 5);
       INSERT INTO `subject` VALUES (934, 'S0858', 'Theater Arts 858', 3);
       INSERT INTO `subject` VALUES (935, 'S0859', 'Medicine 859', 3);
       INSERT INTO `subject` VALUES (936, 'S0860', 'Religious Studies 860', 2);
       INSERT INTO `subject` VALUES (937, 'S0861', 'Anatomy 861', 3);
       INSERT INTO `subject` VALUES (938, 'S0862', 'Architecture 862', 4);
       INSERT INTO `subject` VALUES (939, 'S0863', 'Public Health 863', 5);
       INSERT INTO `subject` VALUES (940, 'S0864', 'Geography 864', 4);
       INSERT INTO `subject` VALUES (941, 'S0865', 'Political Science 865', 3);
       INSERT INTO `subject` VALUES (942, 'S0866', 'Botany 866', 2);
       INSERT INTO `subject` VALUES (943, 'S0867', 'Education 867', 3);
       INSERT INTO `subject` VALUES (944, 'S0868', 'Creative Writing 868', 3);
       INSERT INTO `subject` VALUES (945, 'S0869', 'Human Resource Management 869', 2);
       INSERT INTO `subject` VALUES (946, 'S0870', 'Linguistics 870', 4);
       INSERT INTO `subject` VALUES (947, 'S0871', 'Journalism 871', 2);
       INSERT INTO `subject` VALUES (948, 'S0872', 'Social Work 872', 4);
       INSERT INTO `subject` VALUES (949, 'S0873', 'Accounting 873', 3);
       INSERT INTO `subject` VALUES (950, 'S0874', 'Anatomy 874', 4);
       INSERT INTO `subject` VALUES (951, 'S0875', 'Accounting 875', 3);
       INSERT INTO `subject` VALUES (952, 'S0876', 'Computer Science 876', 5);
       INSERT INTO `subject` VALUES (953, 'S0877', 'Geography 877', 3);
       INSERT INTO `subject` VALUES (954, 'S0878', 'Marine Biology 878', 3);
       INSERT INTO `subject` VALUES (955, 'S0879', 'Social Work 879', 5);
       INSERT INTO `subject` VALUES (956, 'S0880', 'Oceanography 880', 3);
       INSERT INTO `subject` VALUES (957, 'S0881', 'Data Structures 881', 5);
       INSERT INTO `subject` VALUES (958, 'S0882', 'Network Security 882', 5);
       INSERT INTO `subject` VALUES (959, 'S0883', 'Sociology 883', 4);
       INSERT INTO `subject` VALUES (960, 'S0884', 'Anthropology 884', 5);
       INSERT INTO `subject` VALUES (961, 'S0885', 'Microbiology 885', 2);
       INSERT INTO `subject` VALUES (962, 'S0886', 'Network Security 886', 5);
       INSERT INTO `subject` VALUES (963, 'S0887', 'Sociology 887', 3);
       INSERT INTO `subject` VALUES (964, 'S0888', 'Social Work 888', 5);
       INSERT INTO `subject` VALUES (965, 'S0889', 'Physics 889', 4);
       INSERT INTO `subject` VALUES (966, 'S0890', 'Anthropology 890', 5);
       INSERT INTO `subject` VALUES (967, 'S0891', 'Microbiology 891', 3);
       INSERT INTO `subject` VALUES (968, 'S0892', 'English Literature 892', 4);
       INSERT INTO `subject` VALUES (969, 'S0893', 'Zoology 893', 2);
       INSERT INTO `subject` VALUES (970, 'S0894', 'Theater Arts 894', 5);
       INSERT INTO `subject` VALUES (971, 'S0895', 'Public Health 895', 3);
       INSERT INTO `subject` VALUES (972, 'S0896', 'Nursing 896', 2);
       INSERT INTO `subject` VALUES (973, 'S0897', 'Chemistry 897', 5);
       INSERT INTO `subject` VALUES (974, 'S0898', 'Religious Studies 898', 2);
       INSERT INTO `subject` VALUES (975, 'S0899', 'Botany 899', 3);
       INSERT INTO `subject` VALUES (976, 'S0900', 'Biology 900', 3);
       INSERT INTO `subject` VALUES (977, 'S0901', 'Artificial Intelligence 901', 3);
       INSERT INTO `subject` VALUES (978, 'S0902', 'Accounting 902', 2);
       INSERT INTO `subject` VALUES (979, 'S0903', 'Architecture 903', 3);
       INSERT INTO `subject` VALUES (980, 'S0904', 'Operating Systems 904', 4);
       INSERT INTO `subject` VALUES (981, 'S0905', 'Sociology 905', 3);
       INSERT INTO `subject` VALUES (982, 'S0906', 'Environmental Science 906', 3);
       INSERT INTO `subject` VALUES (983, 'S0907', 'Political Science 907', 4);
       INSERT INTO `subject` VALUES (984, 'S0908', 'Algorithms 908', 3);
       INSERT INTO `subject` VALUES (985, 'S0909', 'Creative Writing 909', 5);
       INSERT INTO `subject` VALUES (986, 'S0910', 'Marine Biology 910', 3);
       INSERT INTO `subject` VALUES (987, 'S0911', 'Philosophy 911', 5);
       INSERT INTO `subject` VALUES (988, 'S0912', 'Human Resource Management 912', 4);
       INSERT INTO `subject` VALUES (989, 'S0913', 'Business Management 913', 2);
       INSERT INTO `subject` VALUES (990, 'S0914', 'Zoology 914', 5);
       INSERT INTO `subject` VALUES (991, 'S0915', 'Microbiology 915', 4);
       INSERT INTO `subject` VALUES (992, 'S0916', 'Psychology 916', 3);
       INSERT INTO `subject` VALUES (993, 'S0917', 'Environmental Science 917', 4);
       INSERT INTO `subject` VALUES (994, 'S0918', 'Public Health 918', 3);
       INSERT INTO `subject` VALUES (995, 'S0919', 'Chemistry 919', 5);
       INSERT INTO `subject` VALUES (996, 'S0920', 'Anthropology 920', 5);
       INSERT INTO `subject` VALUES (997, 'S0921', 'Anatomy 921', 5);
       INSERT INTO `subject` VALUES (998, 'S0922', 'Child Development 922', 2);
       INSERT INTO `subject` VALUES (999, 'S0923', 'Astronomy 923', 2);
       INSERT INTO `subject` VALUES (1000, 'S0924', 'Sociology 924', 2);
       INSERT INTO `subject` VALUES (1001, 'S0925', 'Business Management 925', 5);
       INSERT INTO `subject` VALUES (1002, 'S0926', 'Business Management 926', 2);
       INSERT INTO `subject` VALUES (1003, 'S0927', 'Pharmacology 927', 2);
       INSERT INTO `subject` VALUES (1004, 'S0928', 'Child Development 928', 5);
       INSERT INTO `subject` VALUES (1005, 'S0929', 'Statistics 929', 2);
       INSERT INTO `subject` VALUES (1006, 'S0930', 'Medicine 930', 5);
       INSERT INTO `subject` VALUES (1007, 'S0931', 'Economics 931', 4);
       INSERT INTO `subject` VALUES (1008, 'S0932', 'Engineering Mechanics 932', 4);
       INSERT INTO `subject` VALUES (1009, 'S0933', 'Microbiology 933', 2);
       INSERT INTO `subject` VALUES (1010, 'S0934', 'Journalism 934', 4);
       INSERT INTO `subject` VALUES (1011, 'S0935', 'Environmental Science 935', 2);
       INSERT INTO `subject` VALUES (1012, 'S0936', 'Ethics 936', 3);
       INSERT INTO `subject` VALUES (1013, 'S0937', 'Marketing 937', 2);
       INSERT INTO `subject` VALUES (1014, 'S0938', 'Religious Studies 938', 5);
       INSERT INTO `subject` VALUES (1015, 'S0939', 'Computer Science 939', 2);
       INSERT INTO `subject` VALUES (1016, 'S0940', 'Genetics 940', 3);
       INSERT INTO `subject` VALUES (1017, 'S0941', 'Finance 941', 4);
       INSERT INTO `subject` VALUES (1018, 'S0942', 'Philosophy 942', 4);
       INSERT INTO `subject` VALUES (1019, 'S0943', 'Agriculture 943', 2);
       INSERT INTO `subject` VALUES (1020, 'S0944', 'Architecture 944', 4);
       INSERT INTO `subject` VALUES (1021, 'S0945', 'Mathematics 945', 3);
       INSERT INTO `subject` VALUES (1022, 'S0946', 'Biology 946', 3);
       INSERT INTO `subject` VALUES (1023, 'S0947', 'Ethics 947', 2);
       INSERT INTO `subject` VALUES (1024, 'S0948', 'Artificial Intelligence 948', 4);
       INSERT INTO `subject` VALUES (1025, 'S0949', 'Engineering Mechanics 949', 3);
       INSERT INTO `subject` VALUES (1026, 'S0950', 'Film Studies 950', 4);
       INSERT INTO `subject` VALUES (1027, 'S0951', 'Biology 951', 2);
       INSERT INTO `subject` VALUES (1028, 'S0952', 'Microbiology 952', 2);
       INSERT INTO `subject` VALUES (1029, 'S0953', 'Theater Arts 953', 2);
       INSERT INTO `subject` VALUES (1030, 'S0954', 'Philosophy 954', 4);
       INSERT INTO `subject` VALUES (1031, 'S0955', 'Architecture 955', 2);
       INSERT INTO `subject` VALUES (1032, 'S0956', 'Microbiology 956', 3);
       INSERT INTO `subject` VALUES (1033, 'S0957', 'Philosophy 957', 4);
       INSERT INTO `subject` VALUES (1034, 'S0958', 'Genetics 958', 3);
       INSERT INTO `subject` VALUES (1035, 'S0959', 'Physiology 959', 2);
       INSERT INTO `subject` VALUES (1036, 'S0960', 'English Literature 960', 3);
       INSERT INTO `subject` VALUES (1037, 'S0961', 'Ethics 961', 5);
       INSERT INTO `subject` VALUES (1038, 'S0962', 'Speech Communication 962', 5);
       INSERT INTO `subject` VALUES (1039, 'S0963', 'Artificial Intelligence 963', 4);
       INSERT INTO `subject` VALUES (1040, 'S0964', 'Marketing 964', 2);
       INSERT INTO `subject` VALUES (1041, 'S0965', 'Computer Science 965', 2);
       INSERT INTO `subject` VALUES (1042, 'S0966', 'Education 966', 2);
       INSERT INTO `subject` VALUES (1043, 'S0967', 'Fine Arts 967', 2);
       INSERT INTO `subject` VALUES (1044, 'S0968', 'Pharmacology 968', 2);
       INSERT INTO `subject` VALUES (1045, 'S0969', 'Anthropology 969', 2);
       INSERT INTO `subject` VALUES (1046, 'S0970', 'History 970', 4);
       INSERT INTO `subject` VALUES (1047, 'S0971', 'Linguistics 971', 5);
       INSERT INTO `subject` VALUES (1048, 'S0972', 'Creative Writing 972', 3);
       INSERT INTO `subject` VALUES (1049, 'S0973', 'Business Management 973', 2);
       INSERT INTO `subject` VALUES (1050, 'S0974', 'Linguistics 974', 3);
       INSERT INTO `subject` VALUES (1051, 'S0975', 'Statistics 975', 5);
       INSERT INTO `subject` VALUES (1052, 'S0976', 'Astronautics 976', 3);
       INSERT INTO `subject` VALUES (1053, 'S0977', 'Operating Systems 977', 5);
       INSERT INTO `subject` VALUES (1054, 'S0978', 'Creative Writing 978', 4);
       INSERT INTO `subject` VALUES (1055, 'S0979', 'Anthropology 979', 3);
       INSERT INTO `subject` VALUES (1056, 'S0980', 'Pharmacology 980', 4);
       INSERT INTO `subject` VALUES (1057, 'S0981', 'Oceanography 981', 4);
       INSERT INTO `subject` VALUES (1058, 'S0982', 'Biology 982', 3);
       INSERT INTO `subject` VALUES (1059, 'S0983', 'Chemistry 983', 5);
       INSERT INTO `subject` VALUES (1060, 'S0984', 'Marine Biology 984', 4);
       INSERT INTO `subject` VALUES (1061, 'S0985', 'History 985', 2);
       INSERT INTO `subject` VALUES (1062, 'S0986', 'Physiology 986', 3);
       INSERT INTO `subject` VALUES (1063, 'S0987', 'Child Development 987', 3);
       INSERT INTO `subject` VALUES (1064, 'S0988', 'Chemistry 988', 4);
       INSERT INTO `subject` VALUES (1065, 'S0989', 'History 989', 2);
       INSERT INTO `subject` VALUES (1066, 'S0990', 'Law 990', 4);
       INSERT INTO `subject` VALUES (1067, 'S0991', 'Business Management 991', 2);
       INSERT INTO `subject` VALUES (1068, 'S0992', 'Operating Systems 992', 5);
       INSERT INTO `subject` VALUES (1069, 'S0993', 'Child Development 993', 2);
       INSERT INTO `subject` VALUES (1071, 'S0995', 'Mathematics 995', 4);
       INSERT INTO `subject` VALUES (1072, 'S0996', 'English Literature 996', 2);
       INSERT INTO `subject` VALUES (1073, 'S0997', 'Genetics 997', 4);

       -- ----------------------------
       -- Table structure for teacher
       -- ----------------------------
       DROP TABLE IF EXISTS `teacher`;
       CREATE TABLE `teacher`  (
         `key` int NOT NULL AUTO_INCREMENT,
         `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         `dept_id` int NULL DEFAULT NULL,
         `user_id` bigint UNSIGNED NULL DEFAULT NULL,
         PRIMARY KEY (`key`) USING BTREE,
         INDEX `dept_id_fk`(`dept_id` ASC) USING BTREE,
         INDEX `user_id_fk`(`user_id` ASC) USING BTREE,
         UNIQUE INDEX `id`(`id` ASC) USING BTREE,
         UNIQUE INDEX `email`(`email` ASC) USING BTREE,
         CONSTRAINT `dept_id_fk` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
         CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 1029 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of teacher
       -- ----------------------------
       INSERT INTO `teacher` VALUES (1023, 'F-0001', 'Ilumin', 'Wishiel', 'wishiel@edu.com', 1, 12);
       INSERT INTO `teacher` VALUES (1025, 'F-0002', 'Sebua', 'Noelyn', 'noelyn@edu.com', 1, 14);
       INSERT INTO `teacher` VALUES (1027, 'F-0003', 'Hermosa', 'Kaye', 'kaye@edu.com', 1, 25);
       INSERT INTO `teacher` VALUES (1028, 'F-0000', 'Ilumin', 'Aldwin', 'aldwin@edu.com', 1, 28);

       -- ----------------------------
       -- Table structure for users
       -- ----------------------------
       DROP TABLE IF EXISTS `users`;
       CREATE TABLE `users`  (
         `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
         `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `email_verified_at` timestamp NULL DEFAULT NULL,
         `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
         `role_id` bigint UNSIGNED NOT NULL,
         `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
         `created_at` timestamp NULL DEFAULT NULL,
         `updated_at` timestamp NULL DEFAULT NULL,
         PRIMARY KEY (`id`) USING BTREE,
         UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
         INDEX `users_role_id_foreign`(`role_id` ASC) USING BTREE,
         CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
       ) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;
       ".
       '
       -- ----------------------------
       -- Records of users
       -- ----------------------------
       INSERT INTO `users` VALUES (12, \'F-0001\', \'wishiel@edu.com\', NULL, \'$2y$12$ZwjqvIoEbaqrYIqKn7aYwenJlz.Enn5FV4jHWtrnzkLIqZiPQCIAW\', 3, NULL, \'2024-11-17 11:03:32\', \'2024-11-17 12:24:07\');
       INSERT INTO `users` VALUES (14, \'F-0002\', \'noelyn@edu.com\', NULL, \'$2y$12$Nz1nlDDFGXSxo6U4pw0j2OfSQOSj/B/Vum0Rm4xLZB7zlMvXdH6m2\', 3, NULL, \'2024-11-17 12:24:41\', \'2024-11-17 12:24:41\');
       INSERT INTO `users` VALUES (16, \'A21-0465\', \'jed@gmail.com\', NULL, \'$2y$12$G7iCfximjjHT7dn.JtCBue9FebIs./3BdD2TXnpTk2lmSthKKtYyW\', 2, NULL, \'2024-11-17 14:15:47\', \'2024-11-17 14:15:47\');
       INSERT INTO `users` VALUES (17, \'A19-0024\', \'johndoe@gmail.com\', NULL, \'$2y$12$KzPqZ5.zLkKkLNOg8G.Gz.B7kGebQ.rpi/WrjJDENJfewY.iKrUy.\', 2, NULL, \'2024-11-17 14:19:38\', \'2024-11-17 14:19:38\');
       INSERT INTO `users` VALUES (20, \'admin\', \'admin@admin.com\', NULL, \'$2y$12$/v2HrbB6Ze0iTwLN2J/j8.KxR8fdCnk2GBxz9muGbcqO.KpGuO3h2\', 1, NULL, \'2024-11-17 16:54:00\', \'2024-11-17 16:54:00\');
       INSERT INTO `users` VALUES (22, \'johndoe\', \'johndoe@admin.com\', NULL, \'$2y$12$zcUdGCZR6yVp5DVUY06boOhfGY7WwPdunRRN2SPUYVaD5hW47MMU.\', 1, NULL, \'2024-11-17 17:07:34\', \'2024-11-17 17:26:09\');
       INSERT INTO `users` VALUES (24, \'jane\', \'jane@admin.com\', NULL, \'$2y$12$RlIrzAMZGhg7sqHEeeMuZegAYtPbbn1OU.xgNnNG1hA3k/z3KzmcG\', 1, NULL, \'2024-11-17 17:27:02\', \'2024-11-17 17:27:02\');
       INSERT INTO `users` VALUES (25, \'F-0003\', \'kaye@edu.com\', NULL, \'$2y$12$fsNhTonYAU2HYSbB7jvLDe/mfBJ.InxOMjNrrDg84IwTuwIeMIYYi\', 3, NULL, \'2024-11-17 17:34:36\', \'2024-11-17 17:34:36\');
       INSERT INTO `users` VALUES (27, \'A23-0111\', \'jane@doe.com\', NULL, \'$2y$12$ZDVQFG2GYrSTr/p.EsRReumbqWACbEXl96Q/E6QFZ5nFPX30tpPJG\', 2, NULL, \'2024-11-18 16:41:25\', \'2024-11-18 16:41:25\');
       INSERT INTO `users` VALUES (28, \'F-0000\', \'aldwin@edu.com\', NULL, \'$2y$12$U8roodrRlqqiv58370mo1u/sz10uHAAQ3gkywxNsiJelElFe3NyZC\', 3, NULL, \'2024-11-19 02:38:21\', \'2024-11-19 02:38:21\');
       INSERT INTO `users` VALUES (30, \'A23-0112\', \'asd@asd.com\', NULL, \'$2y$12$V39FqOV7NN6oYA4X7fEeeupL0DJJ5Sfm2DizZFf3HzrDkh4GdMV3i\', 2, NULL, \'2024-11-19 12:09:12\', \'2024-11-19 12:26:51\');
       '.
       "
       -- ----------------------------
       -- Table structure for year_level
       -- ----------------------------
       DROP TABLE IF EXISTS `year_level`;
       CREATE TABLE `year_level`  (
         `id` tinyint NOT NULL AUTO_INCREMENT,
         `description` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
         PRIMARY KEY (`id`) USING BTREE
       ) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

       -- ----------------------------
       -- Records of year_level
       -- ----------------------------
       INSERT INTO `year_level` VALUES (0, 'Irregular');
       INSERT INTO `year_level` VALUES (1, '1st Year');
       INSERT INTO `year_level` VALUES (2, '2nd Year');
       INSERT INTO `year_level` VALUES (3, '3rd Year');
       INSERT INTO `year_level` VALUES (4, '4th Year');

       SET FOREIGN_KEY_CHECKS = 1;

        "
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('
       SET FOREIGN_KEY_CHECKS = 0;

        DROP TABLE academic_year;
        DROP TABLE class;
        DROP TABLE course;
        DROP TABLE dept;
        DROP TABLE score_range;
        DROP TABLE semester;
        DROP TABLE student;
        DROP TABLE student_class;
        DROP TABLE student_year_level;
        DROP TABLE subject;
        DROP TABLE teacher;
        DROP TABLE year_level;

        ');
    }
};
