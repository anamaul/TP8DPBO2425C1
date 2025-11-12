<?php
// Front Controller - Entry point for all requests

// Get controller and action from URL parameters
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'lecturer';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Determine which controller to load
switch ($controllerName) {
  case 'course':
    require_once __DIR__ . '/../controllers/CourseController.php';
    $controller = new CourseController();
    break;

  case 'lecturer':
  default:
    require_once __DIR__ . '/../controllers/LecturerController.php';
    $controller = new LecturerController();
    break;
}

// Route to appropriate method
switch ($action) {
  case 'index':
    $controller->index();
    break;

  case 'create':
    $controller->create();
    break;

  case 'store':
    $controller->store();
    break;

  case 'edit':
    $controller->edit();
    break;

  case 'update':
    $controller->update();
    break;

  case 'delete':
    $controller->delete();
    break;

  case 'destroy':
    $controller->destroy();
    break;

  case 'lecturers':
    if (method_exists($controller, 'lecturers')) {
      $controller->lecturers();
    } else {
      $controller->index();
    }
    break;

  default:
    $controller->index();
    break;
}
?>