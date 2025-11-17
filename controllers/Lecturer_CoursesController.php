<?php
// controllers/Lecturer_CoursesController.php

require_once __DIR__ . '/../models/LecturerCourses.php';
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Course.php';

class Lecturer_CoursesController
{
  private $lc;
  private $lecturer;
  private $course;

  public function __construct()
  {
    $this->lc = new LecturerCourses();
    $this->lecturer = new Lecturer();
    $this->course = new Course();
  }

  // Display all lecturer-course relationships and summary data
  public function index()
  {
    $relations_result = $this->lc->getAll();
    $relations = [];
    $lecturer_count = [];
    $course_count = [];

    // Ambil semua data dan proses untuk Summary
    if ($relations_result) {
      while ($row = $relations_result->fetch_assoc()) {
        $relations[] = $row;

        // Hitung Kursus per Dosen
        if (!isset($lecturer_count[$row['lecturer_id']])) {
          $lecturer_count[$row['lecturer_id']] = ['name' => $row['lecturer_name'], 'count' => 0];
        }
        $lecturer_count[$row['lecturer_id']]['count']++;

        // Hitung Dosen per Mata Kuliah
        if (!isset($course_count[$row['course_id']])) {
          $course_count[$row['course_id']] = [
            'name' => $row['course_name'],
            'code' => $row['course_code'],
            'count' => 0
          ];
        }
        $course_count[$row['course_id']]['count']++;
      }
    }

    // Sortir dan Ambil Top 3 untuk Summary (Logika dipindahkan dari View)
    uasort($lecturer_count, function ($a, $b) {
      return $b['count'] - $a['count']; });
    $top_lecturers = array_slice($lecturer_count, 0, 3, true);

    uasort($course_count, function ($a, $b) {
      return $b['count'] - $a['count']; });
    $top_courses = array_slice($course_count, 0, 3, true);

    // Variabel yang tersedia di View: $relations, $top_lecturers, $top_courses
    require_once __DIR__ . '/../views/lecturer_courses/index.php';
  }

  // Show create form
  public function create()
  {
    // Load lecturers & courses for dropdown
    $lecturers = $this->lecturer->getAll();
    $courses = $this->course->getAll();

    require_once __DIR__ . '/../views/lecturer_courses/create.php';
  }

  // Store new relationship
  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->lc->lecturer_id = $_POST['lecturer_id'];
      $this->lc->course_id = $_POST['course_id'];

      if ($this->lc->create()) {
        $message = "Assignment created successfully.";
        $type = "success";
      } else {
        $message = "Assignment failed or already exists."; // Pesan khusus jika duplikasi
        $type = "danger";
      }

      header("Location: index.php?controller=lecturer_courses&action=index&msg=" . urlencode($message) . "&type=" . urlencode($type));
      exit();
    }
  }

  // Delete confirmation page
  public function delete()
  {
    if (isset($_GET['lecturer_id']) && isset($_GET['course_id'])) {
      $lecturer_id = $_GET['lecturer_id'];
      $course_id = $_GET['course_id'];

      // Ambil data relasi spesifik yang akan dihapus
      $assignment = $this->lc->getByLecturerAndCourse($lecturer_id, $course_id);

      if ($assignment) {
        require_once __DIR__ . '/../views/lecturer_courses/delete.php';
      } else {
        $message = "Assignment not found.";
        header("Location: index.php?controller=lecturer_courses&action=index&msg=" . urlencode($message) . "&type=danger");
        exit();
      }
    }
  }

  // Actual deletion
  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->lc->lecturer_id = $_POST['lecturer_id'];
      $this->lc->course_id = $_POST['course_id'];

      if ($this->lc->delete()) {
        $message = "Assignment removed successfully.";
        $type = "success";
      } else {
        $message = "Failed to remove assignment.";
        $type = "danger";
      }
      header("Location: index.php?controller=lecturer_courses&action=index&msg=" . urlencode($message) . "&type=" . urlencode($type));
      exit();
    }
  }
}
?>