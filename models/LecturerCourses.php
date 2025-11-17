<?php
// models/LecturerCourses.php

require_once __DIR__ . '/../config/database.php';

class LecturerCourses
{
  private $conn;
  // Sesuaikan nama tabel jika berbeda di database Anda
  private $table = 'lecturer_courses';

  public $lecturer_id;
  public $course_id;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->connect();
  }

  // Get all lecturer-course relationships
  public function getAll()
  {
    $sql = "SELECT lc.*, l.name AS lecturer_name, c.name AS course_name, c.code AS course_code
            FROM {$this->table} lc
            -- Ganti 'lecturers' dan 'courses' jika nama tabel Anda memiliki prefix (e.g., tp_mvc25_lecturers)
            JOIN lecturers l ON l.id = lc.lecturer_id 
            JOIN courses c ON c.id = lc.course_id       
            ORDER BY lc.lecturer_id, lc.course_id";
    return $this->conn->query($sql);
  }

  // Get a specific relationship by lecturer_id and course_id (Digunakan untuk konfirmasi delete)
  public function getByLecturerAndCourse($lecturer_id, $course_id)
  {
    $sql = "SELECT lc.*, l.name AS lecturer_name, c.name AS course_name
              FROM {$this->table} lc
              JOIN lecturers l ON l.id = lc.lecturer_id
              JOIN courses c ON c.id = lc.course_id
              WHERE lc.lecturer_id = ? AND lc.course_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $lecturer_id, $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  // Assign a lecturer to a course (Create)
  public function create()
  {
    // Cek apakah relasi sudah ada untuk mencegah duplikasi
    $check_sql = "SELECT * FROM {$this->table} WHERE lecturer_id = ? AND course_id = ?";
    $check_stmt = $this->conn->prepare($check_sql);
    $check_stmt->bind_param("ii", $this->lecturer_id, $this->course_id);
    $check_stmt->execute();

    // Jika sudah ada (num_rows > 0), kembalikan false
    if ($check_stmt->get_result()->num_rows > 0) {
      return false;
    }

    $sql = "INSERT INTO {$this->table} (lecturer_id, course_id) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $this->lecturer_id, $this->course_id);

    return $stmt->execute();
  }

  // Remove relation (Delete)
  public function delete()
  {
    $sql = "DELETE FROM {$this->table} WHERE lecturer_id = ? AND course_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $this->lecturer_id, $this->course_id);

    return $stmt->execute();
  }
}
?>