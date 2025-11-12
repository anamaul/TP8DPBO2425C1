<?php
require_once __DIR__ . '/../config/database.php';

class Course
{
  private $conn;
  private $table = 'courses';

  public $id;
  public $code;
  public $name;
  public $sks;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->connect();
  }

  // Get all courses
  public function getAll()
  {
    $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
    $result = $this->conn->query($sql);
    return $result;
  }

  // Get single course by ID
  public function getById($id)
  {
    $sql = "SELECT * FROM {$this->table} WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  // Create new course
  public function create()
  {
    $sql = "INSERT INTO {$this->table} (code, name, sks) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssi", $this->code, $this->name, $this->sks);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Update course
  public function update()
  {
    $sql = "UPDATE {$this->table} SET code = ?, name = ?, sks = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssii", $this->code, $this->name, $this->sks, $this->id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Delete course
  public function delete($id)
  {
    $sql = "DELETE FROM {$this->table} WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Get courses with lecturers
  public function getCoursesWithLecturers()
  {
    $sql = "SELECT c.*, l.name as lecturer_name 
                FROM {$this->table} c
                LEFT JOIN lecturer_courses lc ON c.id = lc.course_id
                LEFT JOIN lecturers l ON lc.lecturer_id = l.id
                ORDER BY c.id DESC";
    return $this->conn->query($sql);
  }
}
?>