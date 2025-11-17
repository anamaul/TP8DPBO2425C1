<?php
require_once __DIR__ . '/../models/Lecturer.php';

class LecturerController
{
  private $lecturer;

  public function __construct()
  {
    $this->lecturer = new Lecturer();
  }

  // Display all lecturers
  public function index()
  {
    $lecturers = $this->lecturer->getAll();
    require_once __DIR__ . '/../views/lecturers/index.php';
  }

  // Show create form
  public function create()
  {
    require_once __DIR__ . '/../views/lecturers/create.php';
  }

  // Store new lecturer
  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->lecturer->name = $_POST['name'];
      $this->lecturer->nidn = $_POST['nidn'];
      $this->lecturer->phone = $_POST['phone'];
      $this->lecturer->join_date = $_POST['join_date'];

      if ($this->lecturer->create()) {
        header("Location: index.php?controller=lecturer&action=index");
        exit();
      } else {
        echo "Failed to create lecturer.";
      }
    }
  }

  // Show edit form
  public function edit()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $lecturer = $this->lecturer->getById($id);

      if ($lecturer) {
        require_once __DIR__ . '/../views/lecturers/edit.php';
      } else {
        header("Location: index.php?controller=lecturer&action=index");
        exit();
      }
    }
  }

  // Update lecturer
  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->lecturer->id = $_POST['id'];
      $this->lecturer->name = $_POST['name'];
      $this->lecturer->nidn = $_POST['nidn'];
      $this->lecturer->phone = $_POST['phone'];
      $this->lecturer->join_date = $_POST['join_date'];

      if ($this->lecturer->update()) {
        header("Location: index.php?controller=lecturer&action=index");
        exit();
      } else {
        echo "Failed to update lecturer.";
      }
    }
  }

  // Show delete confirmation
  public function delete()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $lecturer = $this->lecturer->getById($id);

      if ($lecturer) {
        require_once __DIR__ . '/../views/lecturers/delete.php';
      } else {
        header("Location: index.php?controller=lecturer&action=index");
        exit();
      }
    }
  }

  // Destroy lecturer (actual deletion)
  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
      $id = $_POST['id'];
      if ($this->lecturer->delete($id)) {
        header("Location: index.php?controller=lecturer&action=index");
        exit();
      } else {
        echo "Failed to delete lecturer.";
      }
    }
  }
}
?>