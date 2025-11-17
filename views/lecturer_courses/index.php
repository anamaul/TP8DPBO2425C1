<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <title>Lecturer-Course Assignments</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?controller=lecturer_courses&action=index">Lecturer Courses</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=lecturer&action=index">Lecturers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=course&action=index">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"
              href="index.php?controller=lecturer_courses&action=index">Assignments</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Lecturer-Course Assignments</h2>
      <!-- <a type="button" class="btn btn-primary" href="index.php?controller=lecturer_courses&action=create">
        <i class="bi bi-plus-circle"></i> Assign Course to Lecturer
      </a> -->
    </div>

    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Lecturer Name</th>
              <th>Course Code</th>
              <th>Course Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Ganti if ($relations && $relations->num_rows > 0)
            if (!empty($relations)) {
              $no = 1;
              // Ganti while ($row = $relations->fetch_assoc())
              foreach ($relations as $row) {
                echo "
        <tr>
          <td>{$no}</td>
          <td>{$row['lecturer_name']}</td>
          <td><span class='badge bg-info'>{$row['course_code']}</span></td>
          <td>{$row['course_name']}</td>
          <td>
            
          </td>
        </tr>
        ";
                $no++;
              }
            } else {
              echo "<tr><td colspan='5' class='text-center text-muted'>No assignments found. Click 'Assign Course to Lecturer' to add new assignment.</td></tr>";
            }
            ?>
          </tbody>

          <div class="card-body">
            <h6>Lecturers Teaching Most Courses:</h6>
            <ul class="list-group list-group-flush mb-3">
              <?php
              // Menggunakan $top_lecturers yang sudah disiapkan Controller
              if (!empty($top_lecturers)) {
                foreach ($top_lecturers as $lecturer) {
                  echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                        {$lecturer['name']}
                        <span class='badge bg-primary rounded-pill'>{$lecturer['count']} courses</span>
                      </li>";
                }
              } else {
                echo "<li class='list-group-item text-muted'>No data available</li>";
              }
              ?>
            </ul>

            <h6>Most Popular Courses:</h6>
            <ul class="list-group list-group-flush">
              <?php
              // Menggunakan $top_courses yang sudah disiapkan Controller
              if (!empty($top_courses)) {
                foreach ($top_courses as $course) {
                  echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                        <span>
                          <span class='badge bg-info'>{$course['code']}</span>
                          {$course['name']}
                        </span>
                        <span class='badge bg-success rounded-pill'>{$course['count']} lecturers</span>
                      </li>";
                }
              } else {
                echo "<li class='list-group-item text-muted'>No data available</li>";
              }
              ?>
            </ul>
          </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card border-info">
        <div class="card-header bg-info text-white">
          <h5 class="mb-0">ℹ️ Information</h5>
        </div>
        <div class="card-body">
          <h6>About Assignments:</h6>
          <ul>
            <li>Each lecturer can teach multiple courses</li>
            <li>Each course can be taught by multiple lecturers</li>
            <li>Use "Assign Course to Lecturer" to create new assignments</li>
            <li>Click "Remove" to delete an assignment</li>
          </ul>

          <div class="alert alert-warning mt-3" role="alert">
            <strong>⚠️ Note:</strong> Removing an assignment will not delete the lecturer or course, only the
            relationship between them.
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="bootstrap.bundle.min.js"></script>
</body>

</html>