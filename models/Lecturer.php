<?php
require_once __DIR__ . '/../config/database.php';

class Lecturer
{
  private $conn;
  private $table = 'lecturers';

  public $id;
  public $name;
  public $nidn;
  public $phone;
  public $join_date;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->connect();
  }

  // Get all lecturers
  public function getAll()
  {
    $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
    $result = $this->conn->query($sql);
    return $result;
  }

  // Get single lecturer by ID
  public function getById($id)
  {
    $sql = "SELECT * FROM {$this->table} WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  // Create new lecturer
  public function create()
  {
    $sql = "INSERT INTO {$this->table} (name, nidn, phone, join_date) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssss", $this->name, $this->nidn, $this->phone, $this->join_date);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Update lecturer
  public function update()
  {
    $sql = "UPDATE {$this->table} SET name = ?, nidn = ?, phone = ?, join_date = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssi", $this->name, $this->nidn, $this->phone, $this->join_date, $this->id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Delete lecturer
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

  // Get lecturers with their courses
  public function getLecturerWithCourses($id)
  {
    $sql = "SELECT l.*, c.name as course_name, c.code as course_code, c.sks 
                FROM {$this->table} l
                LEFT JOIN lecturer_courses lc ON l.id = lc.lecturer_id
                LEFT JOIN courses c ON lc.course_id = c.id
                WHERE l.id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
  }
}
?>