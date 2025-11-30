-- --------------------------------------------------------
-- Homework / Exam Master Table
-- --------------------------------------------------------
CREATE TABLE rrsv_homework_exam (
  id INT AUTO_INCREMENT PRIMARY KEY,
  class_id INT NOT NULL,
  subject_id INT NOT NULL,
  teacher_id INT NOT NULL,
  session VARCHAR(25) NOT NULL,
  unit VARCHAR(25) NOT NULL,
  book_name VARCHAR(255) NOT NULL,
  chapter_name VARCHAR(255) NOT NULL,
  description TEXT,
  type ENUM('homework','exam') DEFAULT 'homework',
  class_date DATE NOT NULL,
  status ENUM('active','inactive') DEFAULT 'active',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------
-- Questions Table
-- --------------------------------------------------------
CREATE TABLE rrsv_homework_exam_questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  exam_id INT NOT NULL,
  question TEXT NOT NULL,
  option_a VARCHAR(255),
  option_b VARCHAR(255),
  option_c VARCHAR(255),
  option_d VARCHAR(255),
  correct_answer VARCHAR(10),
  FOREIGN KEY (exam_id) REFERENCES rrsv_homework_exam(id)
);

-- --------------------------------------------------------
-- Teacher Model Answers
-- --------------------------------------------------------
CREATE TABLE rrsv_teacher_answers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question_id INT NOT NULL,
  answer TEXT NOT NULL,
  FOREIGN KEY (question_id) REFERENCES rrsv_homework_exam_questions(id)
);

-- --------------------------------------------------------
-- Student Answers
-- --------------------------------------------------------
CREATE TABLE rrsv_student_answers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  question_id INT NOT NULL,
  answer TEXT NOT NULL,
  FOREIGN KEY (question_id) REFERENCES rrsv_homework_exam_questions(id)
);

-- --------------------------------------------------------
-- Student Summary
-- --------------------------------------------------------
CREATE TABLE rrsv_student_homework_summary (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  exam_id INT NOT NULL,
  total_questions INT,
  correct_answers INT,
  score DECIMAL(5,2),
  submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (exam_id) REFERENCES rrsv_homework_exam(id)
);

ALTER TABLE `rrsv_homework_exam_questions` CHANGE `question` `question` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;
ALTER TABLE `rrsv_homework_exam_questions` ADD `marks` INT NULL AFTER `option_d`;

ALTER TABLE `rrsv_homework_exam` ADD `title` VARCHAR(100) NOT NULL AFTER `id`;

CREATE TABLE rrsv_question_type (
  id INT AUTO_INCREMENT PRIMARY KEY,
  type_code VARCHAR(50) NOT NULL UNIQUE,  -- e.g. 'mcq', 'descriptive'
  type_name VARCHAR(100) NOT NULL,        -- e.g. 'Multiple Choice', 'Descriptive'
  status ENUM('active', 'inactive') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO rrsv_question_type (type_code, type_name) VALUES
('mcq', 'Multiple Choice'),
('descriptive', 'Descriptive'),
('yes_no', 'Yes / No');


ALTER TABLE `rrsv_homework_exam_questions` ADD `question_type` VARCHAR(100) NULL DEFAULT NULL AFTER `question`;
ALTER TABLE `rrsv_vendor` ADD `mobile` VARCHAR(10) NOT NULL AFTER `status`, ADD `email` VARCHAR(20) NULL DEFAULT NULL AFTER `mobile`, ADD `address` TEXT NOT NULL AFTER `email`;
ALTER TABLE `rrsv_student_registration` ADD `password` VARCHAR(50) NOT NULL DEFAULT 'RRSV_1234' AFTER `scl_name`;
ALTER TABLE `rrsv_teacher` ADD `password` VARCHAR(50) NOT NULL DEFAULT 'RRSV_1234' AFTER `full_name`;



CREATE TABLE `rrsv_vendor_bills` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `vendor_id` int(11) DEFAULT NULL,
  `bill_no` varchar(100) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `balance_amount` decimal(10,2) DEFAULT 0.00,
  `remarks` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `rrsv_vendor_bills` (`id`, `vendor_id`, `bill_no`, `bill_date`, `total_amount`, `paid_amount`, `balance_amount`, `remarks`, `created_at`) VALUES
(1, 1, '1', '2025-11-27', 154.00, 155.00, -1.00, 'ok', '2025-11-27 03:07:02'),
(2, 1, '477', '2025-11-27', 1644.00, 0.00, 1644.00, 'ok', '2025-11-27 14:54:11'),
(3, 1, '472', '2025-11-27', 200.00, 0.00, 200.00, 'ok', '2025-11-27 15:04:56'),
(4, 1, '2', '2025-11-28', 2500.00, 0.00, 2500.00, 'ok', '2025-11-28 02:38:35');


CREATE TABLE `rrsv_vendor_bill_items` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `bill_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `rrsv_vendor_bill_items` (`id`, `bill_id`, `item_name`, `qty`, `rate`, `amount`) VALUES
(1, 1, 'Medicine A', 5, 10.00, 50.00),
(2, 1, 'Medicine B', 2, 52.00, 104.00),
(3, 2, 'Medicine A', 12, 12.00, 144.00),
(4, 2, 'Medicine B', 15, 100.00, 1500.00),
(5, 3, 'Medicine g', 4, 50.00, 200.00),
(6, 4, 'ANNUAL SPORTS', 25, 100.00, 2500.00);


CREATE TABLE `rrsv_vendor_bill_payments` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `bill_id` int(11) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rrsv_vendor_bill_payments` (`id`, `bill_id`, `pay_date`, `paid_amount`, `remarks`, `created_at`) VALUES
(1, 1, '2025-11-27', 150.00, 'ok', '2025-11-27 15:13:34'),
(2, 1, '2025-11-28', 5.00, 'ok', '2025-11-28 03:09:27');

ALTER TABLE `rrsv_vendor_bills` ADD `vouture_file` VARCHAR(20) NULL DEFAULT NULL AFTER `balance_amount`, ADD `session` VARCHAR(10) NULL DEFAULT NULL AFTER `vouture_file`;
