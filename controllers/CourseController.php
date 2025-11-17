<?php
require_once __DIR__ . '/../models/Course.php';

class CourseController
{
  private $course;

  public function __construct()
  {
    $this->course = new Course();
  }

  // Display all courses
  public function index()
  {
    $courses = $this->course->getAll();
    require_once __DIR__ . '/../views/courses/index.php';
  }

  // Show create form
  public function create()
  {
    require_once __DIR__ . '/../views/courses/create.php';
  }

  // Store new course
  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->course->code = $_POST['code'];
      $this->course->name = $_POST['name'];
      $this->course->sks = $_POST['sks'];

      if ($this->course->create()) {
        header("Location: index.php?controller=course&action=index");
        exit();
      } else {
        echo "Failed to create course.";
      }
    }
  }

  // Show edit form
  public function edit()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $course = $this->course->getById($id);

      if ($course) {
        require_once __DIR__ . '/../views/courses/edit.php';
      } else {
        header("Location: index.php?controller=course&action=index");
        exit();
      }
    }
  }

  // Update course
  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->course->id = $_POST['id'];
      $this->course->code = $_POST['code'];
      $this->course->name = $_POST['name'];
      $this->course->sks = $_POST['sks'];

      if ($this->course->update()) {
        header("Location: index.php?controller=course&action=index");
        exit();
      } else {
        echo "Failed to update course.";
      }
    }
  }

  // Show delete confirmation
  public function delete()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $course = $this->course->getById($id);

      if ($course) {
        require_once __DIR__ . '/../views/courses/delete.php';
      } else {
        header("Location: index.php?controller=course&action=index");
        exit();
      }
    }
  }

  // Destroy course (actual deletion)
  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
      $id = $_POST['id'];
      if ($this->course->delete($id)) {
        header("Location: index.php?controller=course&action=index");
        exit();
      } else {
        echo "Failed to delete course.";
      }
    }
  }

  // Show courses with their assigned lecturers
  public function lecturers()
  {
    $courses = $this->course->getCoursesWithLecturers();
    require_once __DIR__ . '/../views/courses/lecturers.php';
  }
}
?>