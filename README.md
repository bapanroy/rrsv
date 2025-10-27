# rrsv
rrsv
-- Homework / Exam master
CREATE TABLE homework_exam (
  id INT AUTO_INCREMENT PRIMARY KEY,
  teacher_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  type ENUM('homework','exam') DEFAULT 'homework',
  class_id INT NOT NULL,
  subject VARCHAR(100),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Questions under each exam/homework
CREATE TABLE homework_exam_questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  exam_id INT NOT NULL,
  question TEXT NOT NULL,
  option_a VARCHAR(255),
  option_b VARCHAR(255),
  option_c VARCHAR(255),
  option_d VARCHAR(255),
  correct_answer VARCHAR(10),
  FOREIGN KEY (exam_id) REFERENCES homework_exam(id)
);

-- Teacher model answers
CREATE TABLE teacher_answers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question_id INT NOT NULL,
  answer TEXT NOT NULL,
  FOREIGN KEY (question_id) REFERENCES homework_exam_questions(id)
);

-- Student answers
CREATE TABLE student_answers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  question_id INT NOT NULL,
  answer TEXT NOT NULL,
  FOREIGN KEY (question_id) REFERENCES homework_exam_questions(id)
);

-- Summary of student performance
CREATE TABLE student_homework_summary (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  exam_id INT NOT NULL,
  total_questions INT,
  correct_answers INT,
  score DECIMAL(5,2),
  submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
