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
            -- phpMyAdmin SQL Dump
            -- version 5.2.1
            -- https://www.phpmyadmin.net/
            --
            -- Host: 127.0.0.1
            -- Generation Time: Nov 08, 2024 at 02:40 PM
            -- Server version: 10.4.32-MariaDB
            -- PHP Version: 8.2.12

            SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
            START TRANSACTION;
            SET time_zone = \"+00:00\";


            /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
            /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
            /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
            /*!40101 SET NAMES utf8mb4 */;

            --
            -- Database: `grade_management`
            --

            -- --------------------------------------------------------

            --
            -- Table structure for table `academic_year`
            --

            CREATE TABLE `academic_year` (
            `id` int(11) NOT NULL,
            `start_date` date NOT NULL,
            `end_date` date NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `academic_year`
            --

            INSERT INTO `academic_year` (`id`, `start_date`, `end_date`) VALUES
            (1, '2024-07-29', '2025-05-17');

            -- --------------------------------------------------------

            --
            -- Table structure for table `class`
            --

            CREATE TABLE `class` (
            `id` int(11) NOT NULL,
            `subject_key` int(11) NOT NULL,
            `section` varchar(255) DEFAULT NULL,
            `course_id` int(11) NOT NULL,
            `year_level_id` tinyint(4) NOT NULL,
            `semester_id` int(11) NOT NULL,
            `teacher_key` int(11) DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `class`
            --

            INSERT INTO `class` (`id`, `subject_key`, `section`, `course_id`, `year_level_id`, `semester_id`, `teacher_key`) VALUES
            (9, 18, NULL, 1, 1, 1, 2),
            (10, 19, NULL, 1, 1, 1, NULL),
            (11, 20, NULL, 1, 1, 1, NULL),
            (12, 21, NULL, 1, 1, 1, 1),
            (13, 22, NULL, 1, 1, 1, 1),
            (14, 23, NULL, 1, 1, 1, 4),
            (15, 24, NULL, 1, 1, 1, NULL),
            (16, 25, NULL, 1, 1, 1, NULL),
            (17, 26, NULL, 1, 1, 2, 2),
            (18, 27, NULL, 1, 1, 2, NULL),
            (19, 28, NULL, 1, 1, 2, NULL),
            (20, 28, NULL, 1, 1, 2, NULL),
            (21, 30, NULL, 1, 1, 2, NULL),
            (22, 31, NULL, 1, 1, 2, 1),
            (23, 32, NULL, 1, 1, 2, 2),
            (24, 33, NULL, 1, 1, 2, NULL),
            (25, 34, NULL, 1, 1, 2, NULL),
            (26, 35, NULL, 1, 2, 1, NULL),
            (27, 36, NULL, 1, 2, 1, NULL),
            (28, 37, NULL, 1, 2, 1, NULL),
            (29, 38, NULL, 1, 2, 1, 5),
            (30, 39, NULL, 1, 2, 1, 1),
            (31, 40, NULL, 1, 2, 1, 1),
            (32, 41, NULL, 1, 2, 1, 4),
            (33, 42, NULL, 1, 2, 1, NULL),
            (42, 43, NULL, 1, 2, 2, NULL),
            (43, 44, NULL, 1, 2, 2, NULL),
            (44, 45, NULL, 1, 2, 2, 1),
            (45, 46, NULL, 1, 2, 2, 1),
            (46, 47, NULL, 1, 2, 2, 2),
            (47, 48, NULL, 1, 2, 2, 2),
            (48, 49, NULL, 1, 2, 2, 2),
            (49, 50, NULL, 1, 2, 2, NULL),
            (50, 51, NULL, 1, 3, 1, NULL),
            (51, 52, NULL, 1, 3, 1, NULL),
            (52, 53, NULL, 1, 3, 1, 5),
            (53, 54, NULL, 1, 3, 1, 4),
            (54, 55, NULL, 1, 3, 1, 1),
            (55, 56, NULL, 1, 3, 1, 1),
            (56, 57, NULL, 1, 3, 1, 2),
            (57, 58, NULL, 1, 3, 1, 2),
            (58, 59, NULL, 1, 3, 2, NULL),
            (59, 60, NULL, 1, 3, 2, NULL),
            (60, 61, NULL, 1, 3, 2, 1),
            (61, 62, NULL, 1, 3, 2, 2),
            (62, 63, NULL, 1, 3, 2, 1),
            (63, 64, NULL, 1, 3, 2, 5),
            (64, 65, NULL, 1, 3, 2, 2),
            (65, 66, NULL, 1, 3, 2, 1),
            (66, 67, NULL, 1, 3, 3, 1),
            (67, 68, NULL, 1, 3, 3, 1),
            (68, 69, NULL, 1, 3, 3, 2),
            (69, 70, NULL, 1, 4, 1, 1),
            (70, 71, NULL, 1, 4, 1, 1),
            (71, 72, NULL, 1, 4, 1, 1),
            (72, 73, NULL, 1, 4, 1, 1),
            (73, 74, NULL, 1, 4, 2, 1);

            -- --------------------------------------------------------

            --
            -- Table structure for table `course`
            --

            CREATE TABLE `course` (
            `id` int(11) NOT NULL,
            `abbr` varchar(8) NOT NULL,
            `description` varchar(255) NOT NULL,
            `dept_id` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `course`
            --

            INSERT INTO `course` (`id`, `abbr`, `description`, `dept_id`) VALUES
            (1, 'BSCS', 'Bachelor of Science in Computer Science', 1),
            (2, 'BSCoE', 'Bachelor of Science in Computer Engineering', 6);

            -- --------------------------------------------------------

            --
            -- Table structure for table `dept`
            --

            CREATE TABLE `dept` (
            `id` int(11) NOT NULL,
            `abbr` varchar(8) NOT NULL,
            `description` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `dept`
            --

            INSERT INTO `dept` (`id`, `abbr`, `description`) VALUES
            (1, 'CCS', 'College of Computer Science'),
            (2, 'CNAHS', 'College of Nursing and Allied Health Sciences'),
            (3, 'CBA', 'College of Business and Accountancy'),
            (4, 'CITHM', 'College of International Tourism and Hospitality Management'),
            (5, 'CTELA', 'College of Teacher Education and Liberal Arts'),
            (6, 'CCE', 'College of Computer Engineering');

            -- --------------------------------------------------------

            --
            -- Table structure for table `score_range`
            --

            CREATE TABLE `score_range` (
            `id` tinyint(4) NOT NULL,
            `grade` char(4) NOT NULL,
            `min_score` decimal(10,0) NOT NULL,
            `max_score` decimal(10,0) NOT NULL,
            `description` char(12) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `score_range`
            --

            INSERT INTO `score_range` (`id`, `grade`, `min_score`, `max_score`, `description`) VALUES
            (1, '1.00', 98, 100, 'Excellent'),
            (2, '1.25', 95, 97, 'Excellent'),
            (3, '1.50', 92, 94, 'Superior'),
            (4, '1.75', 89, 91, 'Superior'),
            (5, '2.00', 87, 88, 'High Average'),
            (6, '2.25', 84, 86, 'High Average'),
            (7, '2.50', 81, 83, 'Average'),
            (8, '2.75', 78, 80, 'Low Average'),
            (9, '3.0', 75, 77, 'Pass'),
            (10, '5.00', 0, 74, 'Failed'),
            (11, 'INC.', 0, 0, 'Incomplete'),
            (12, 'DR.', 0, 0, 'Dropped');

            -- --------------------------------------------------------

            --
            -- Table structure for table `semester`
            --

            CREATE TABLE `semester` (
            `id` int(11) NOT NULL,
            `academic_year_id` int(11) NOT NULL,
            `number` tinyint(4) NOT NULL,
            `start_date` date NOT NULL,
            `end_date` date NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `semester`
            --

            INSERT INTO `semester` (`id`, `academic_year_id`, `number`, `start_date`, `end_date`) VALUES
            (1, 1, 1, '2024-07-29', '2024-12-07'),
            (2, 1, 2, '2025-01-06', '2025-05-17'),
            (3, 1, 3, '2025-06-09', '2025-07-27');

            -- --------------------------------------------------------

            --
            -- Table structure for table `student`
            --

            CREATE TABLE `student` (
            `key` int(11) NOT NULL,
            `id` varchar(20) NOT NULL,
            `lname` varchar(255) NOT NULL,
            `fname` varchar(255) NOT NULL,
            `mname` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `course_id` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `student`
            --

            INSERT INTO `student` (`key`, `id`, `lname`, `fname`, `mname`, `email`, `course_id`) VALUES
            (1, 'A19-0042', 'Martinez', 'Juan Carlos', 'Molina', 'juancarlosmolina@hotmail.com', 1),
            (2, 'A21-0000', 'Carlson', 'Magnoose', 'Nakamura', 'magnoosenakamura@yahoo.com', 1),
            (3, 'A21-0001', 'Laroza', 'Maricar', 'Perez', 'mariamaricar0911@gmail.com', 1),
            (4, 'A21-0002', 'Kalaw', 'Jervy', '', 'jervykalaw0000@email.com', 1),
            (5, 'A21-0003', 'Maligaya', 'Danilo', 'Perez', 'danilo420@gmail.com', 1),
            (6, 'A21-0004', 'Hernandez', 'Hazel Grace', 'Larosa', 'hazelgracehernandez22@gmail.com', 1),
            (7, 'A21-0005', 'Jaena', 'Marciano', 'Lopez', 'lasolidaridadjaena1872@gmail.com', 1),
            (8, 'A21-0006', 'Perez', 'Maria Sarah', 'Roxas', 'sarahroxasperez@hotmail.com', 1),
            (9, 'A21-0007', 'Cuevas', 'Mikaela', 'Idea', 'mikaelaidea@gmail.com', 1),
            (10, 'A21-0008', 'Rizal', 'Jose', 'Mercado', 'joserizal@gmail.com', 1);

            -- --------------------------------------------------------

            --
            -- Table structure for table `student_class`
            --

            CREATE TABLE `student_class` (
            `id` int(11) NOT NULL,
            `student_year_level_id` int(11) NOT NULL,
            `class_id` int(11) NOT NULL,
            `score` decimal(10,0) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            -- --------------------------------------------------------

            --
            -- Table structure for table `student_year_level`
            --

            CREATE TABLE `student_year_level` (
            `id` int(11) NOT NULL,
            `student_key` int(11) NOT NULL,
            `year_level_id` tinyint(4) NOT NULL,
            `academic_year_id` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `student_year_level`
            --

            INSERT INTO `student_year_level` (`id`, `student_key`, `year_level_id`, `academic_year_id`) VALUES
            (1, 1, 0, 1),
            (2, 2, 4, 1),
            (3, 3, 4, 1),
            (4, 4, 4, 1),
            (5, 5, 4, 1),
            (6, 6, 1, 1),
            (7, 7, 4, 1),
            (8, 8, 0, 1),
            (9, 9, 4, 1),
            (10, 10, 4, 1);

            -- --------------------------------------------------------

            --
            -- Table structure for table `subject`
            --

            CREATE TABLE `subject` (
            `key` int(11) NOT NULL,
            `code` varchar(11) NOT NULL,
            `description` varchar(255) NOT NULL,
            `units` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `subject`
            --

            INSERT INTO `subject` (`key`, `code`, `description`, `units`) VALUES
            (18, 'EIS102', 'The Family', 2),
            (19, 'GEL105', 'English Enhancement Course', 3),
            (20, 'GE102', 'Purposive Communication', 3),
            (21, 'CCS100', 'Introduction to Computing', 3),
            (22, 'CCS101', 'Computer Programming 1', 3),
            (23, 'GEL 103', 'Living in the IT Era', 3),
            (24, 'PATHFit1', 'Physical Activities Towards Health & Fitness 1 (movement competency training)', 2),
            (25, 'NSTP101', 'Civic Welfare Training Service 1', 3),
            (26, 'EIS101', 'University and I', 2),
            (27, 'GEL102', 'Panitikang Filipino', 3),
            (28, 'GE107', 'Ethics', 3),
            (29, 'GE101', 'Understanding the Self', 3),
            (30, 'GE103', 'Mathematics in the Modern World', 3),
            (31, 'CCS102', 'Computer Programming 2', 3),
            (32, 'PCS101', 'Discrete Structures 1', 3),
            (33, 'PATHFit2', 'Physical Activities Towards Health & Fitness 2 (exercise-based fitness activities) ', 2),
            (34, 'NSTP102', 'Civic Welfare Training Service 2', 3),
            (35, 'GE104', 'Science, Technology and Society', 3),
            (36, 'GE106', 'The Contemporary World', 3),
            (37, 'GEL104', 'Foreign Language', 3),
            (38, 'PCS102', 'Discrete Structures 2', 3),
            (39, 'CCS103', 'Data Structures and Algorithms', 3),
            (40, 'PCS103', 'Object-Oriented Programming', 3),
            (41, 'PCS104', 'Computer Architecture & Organization', 3),
            (42, 'PATHFit3', 'Physical Activities Towards Health & Fitness 3 (individual/ dual sports)', 2),
            (43, 'MCS101', 'Calculus', 3),
            (44, 'GE105', 'Art Appreciation', 3),
            (45, 'PCS106', 'Networks and Communications', 3),
            (46, 'PCS105', 'Algorithms & Complexity', 3),
            (47, 'CCS104', 'Information Management', 3),
            (48, 'PCS107', 'Social Issues & Professional Practice 1', 3),
            (49, 'ECS101', 'Graphics & Visual Computing', 3),
            (50, 'PATHFit4', 'Physical Activities Towards Health & Fitness 4 (team sports)', 2),
            (51, 'GE108', 'Readings in Philippine History', 3),
            (52, 'GEL106', 'Academic Writing', 3),
            (53, 'PCS108', 'Automata Theory & Formal Languages', 3),
            (54, 'ECS102', 'Intelligent Systems', 3),
            (55, 'CCS105', 'Application Dev\'t & Emerging Tech.', 3),
            (56, 'PCS109', 'Information Assurance & Security', 2),
            (57, 'PCS110', 'Software Engineering 1', 3),
            (58, 'SCS101', 'Specialization Course 1', 3),
            (59, 'GEL101', 'Retorika', 3),
            (60, 'GE109', 'Rizal\'s Life, Works and Writings', 3),
            (61, 'PCS112', 'Programming Languages', 3),
            (62, 'PCS111', 'Software Engineering 2', 3),
            (63, 'PCS113', 'Operating Systems', 3),
            (64, 'PCS114', 'Methods of Research in Computing', 3),
            (65, 'SCS102', 'Specialization Course 2', 3),
            (66, 'PCS115', 'CS Thesis Writing 1', 3),
            (67, 'SCS103', 'Specialization Course 3', 3),
            (68, 'SCS104', 'Specialization Course 4', 3),
            (69, 'PCS116', 'Human Computer Interaction', 3),
            (70, 'ECS103', 'Parallel and Distributed Computing', 3),
            (71, 'SCS105', 'Specialization Course 5', 3),
            (72, 'SCS106', 'Specialization Course 6', 3),
            (73, 'PSC117', 'CS Thesis Writing 2', 3),
            (74, 'PCS118', 'Computer Science Practicum', 3);

            -- --------------------------------------------------------

            --
            -- Table structure for table `teacher`
            --

            CREATE TABLE `teacher` (
            `key` int(11) NOT NULL,
            `id` varchar(20) NOT NULL,
            `lname` varchar(255) NOT NULL,
            `fname` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `teacher`
            --

            INSERT INTO `teacher` (`key`, `id`, `lname`, `fname`) VALUES
            (1, 'F-0000', 'Illumin', 'Aldwin'),
            (2, 'F-0002', 'Illumin', 'Wishiel'),
            (4, 'F-0012', 'Sebua', 'Noelyn'),
            (5, 'F-0021', 'Hermosa', 'Kaye');

            -- --------------------------------------------------------

            --
            -- Table structure for table `year_level`
            --

            CREATE TABLE `year_level` (
            `id` tinyint(4) NOT NULL,
            `description` varchar(20) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `year_level`
            --

            INSERT INTO `year_level` (`id`, `description`) VALUES
            (0, 'Irregular'),
            (1, '1st Year'),
            (2, '2nd Year'),
            (3, '3rd Year'),
            (4, '4th Year');

            --
            -- Indexes for dumped tables
            --

            --
            -- Indexes for table `academic_year`
            --
            ALTER TABLE `academic_year`
            ADD PRIMARY KEY (`id`);

            --
            -- Indexes for table `class`
            --
            ALTER TABLE `class`
            ADD PRIMARY KEY (`id`),
            ADD KEY `semester_id` (`semester_id`),
            ADD KEY `teacher_key` (`teacher_key`),
            ADD KEY `subject_key` (`subject_key`),
            ADD KEY `course_id` (`course_id`),
            ADD KEY `year_level_id` (`year_level_id`);

            --
            -- Indexes for table `course`
            --
            ALTER TABLE `course`
            ADD PRIMARY KEY (`id`),
            ADD KEY `dept_id` (`dept_id`);

            --
            -- Indexes for table `dept`
            --
            ALTER TABLE `dept`
            ADD PRIMARY KEY (`id`);

            --
            -- Indexes for table `score_range`
            --
            ALTER TABLE `score_range`
            ADD PRIMARY KEY (`id`);

            --
            -- Indexes for table `semester`
            --
            ALTER TABLE `semester`
            ADD PRIMARY KEY (`id`),
            ADD KEY `semester_ibfk_1` (`academic_year_id`);

            --
            -- Indexes for table `student`
            --
            ALTER TABLE `student`
            ADD PRIMARY KEY (`key`),
            ADD KEY `course_id` (`course_id`);

            --
            -- Indexes for table `student_class`
            --
            ALTER TABLE `student_class`
            ADD PRIMARY KEY (`id`),
            ADD KEY `class_id` (`class_id`),
            ADD KEY `student_year_level_id` (`student_year_level_id`);

            --
            -- Indexes for table `student_year_level`
            --
            ALTER TABLE `student_year_level`
            ADD PRIMARY KEY (`id`),
            ADD UNIQUE KEY `student_key` (`student_key`),
            ADD KEY `academic_year_id` (`academic_year_id`),
            ADD KEY `year_level_id` (`year_level_id`);

            --
            -- Indexes for table `subject`
            --
            ALTER TABLE `subject`
            ADD PRIMARY KEY (`key`);

            --
            -- Indexes for table `teacher`
            --
            ALTER TABLE `teacher`
            ADD PRIMARY KEY (`key`);

            --
            -- Indexes for table `year_level`
            --
            ALTER TABLE `year_level`
            ADD PRIMARY KEY (`id`);

            --
            -- AUTO_INCREMENT for dumped tables
            --

            --
            -- AUTO_INCREMENT for table `academic_year`
            --
            ALTER TABLE `academic_year`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

            --
            -- AUTO_INCREMENT for table `class`
            --
            ALTER TABLE `class`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

            --
            -- AUTO_INCREMENT for table `course`
            --
            ALTER TABLE `course`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

            --
            -- AUTO_INCREMENT for table `dept`
            --
            ALTER TABLE `dept`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

            --
            -- AUTO_INCREMENT for table `score_range`
            --
            ALTER TABLE `score_range`
            MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

            --
            -- AUTO_INCREMENT for table `semester`
            --
            ALTER TABLE `semester`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

            --
            -- AUTO_INCREMENT for table `student`
            --
            ALTER TABLE `student`
            MODIFY `key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

            --
            -- AUTO_INCREMENT for table `student_class`
            --
            ALTER TABLE `student_class`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            --
            -- AUTO_INCREMENT for table `student_year_level`
            --
            ALTER TABLE `student_year_level`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

            --
            -- AUTO_INCREMENT for table `subject`
            --
            ALTER TABLE `subject`
            MODIFY `key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

            --
            -- AUTO_INCREMENT for table `teacher`
            --
            ALTER TABLE `teacher`
            MODIFY `key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

            --
            -- AUTO_INCREMENT for table `year_level`
            --
            ALTER TABLE `year_level`
            MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

            --
            -- Constraints for dumped tables
            --

            --
            -- Constraints for table `class`
            --
            ALTER TABLE `class`
            ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`teacher_key`) REFERENCES `teacher` (`key`),
            ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`subject_key`) REFERENCES `subject` (`key`),
            ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
            ADD CONSTRAINT `class_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
            ADD CONSTRAINT `class_ibfk_5` FOREIGN KEY (`year_level_id`) REFERENCES `year_level` (`id`);

            --
            -- Constraints for table `course`
            --
            ALTER TABLE `course`
            ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`id`);

            --
            -- Constraints for table `semester`
            --
            ALTER TABLE `semester`
            ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`id`);

            --
            -- Constraints for table `student`
            --
            ALTER TABLE `student`
            ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

            --
            -- Constraints for table `student_class`
            --
            ALTER TABLE `student_class`
            ADD CONSTRAINT `student_class_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
            ADD CONSTRAINT `student_class_ibfk_2` FOREIGN KEY (`student_year_level_id`) REFERENCES `student_year_level` (`id`);

            --
            -- Constraints for table `student_year_level`
            --
            ALTER TABLE `student_year_level`
            ADD CONSTRAINT `student_year_level_ibfk_1` FOREIGN KEY (`student_key`) REFERENCES `student` (`key`),
            ADD CONSTRAINT `student_year_level_ibfk_4` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`id`),
            ADD CONSTRAINT `student_year_level_ibfk_5` FOREIGN KEY (`year_level_id`) REFERENCES `year_level` (`id`);
            COMMIT;

            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
            /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
            /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

            "
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared(
            "
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
            "
        );
    }
};
