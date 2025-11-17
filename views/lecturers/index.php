<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <title>Lecturers - Home</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?controller=lecturer&action=index">Lecturers</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"
              href="index.php?controller=lecturer&action=index">Lecturers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=course&action=index">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=lecturer_courses&action=index">Lecturer Courses</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-4">
    <div class="col-1 my-3">
      <a type="button" class="btn btn-primary nav-link active" href="index.php?controller=lecturer&action=create">Add
        New</a>
    </div>

    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NIDN</th>
          <th>PHONE</th>
          <th>JOIN DATE</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($lecturers && $lecturers->num_rows > 0) {
          while ($row = $lecturers->fetch_assoc()) {
            echo "
            <tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['nidn']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['join_date']}</td>
              <td>
                <a class='btn btn-success btn-sm' href='index.php?controller=lecturer&action=edit&id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='index.php?controller=lecturer&action=delete&id={$row['id']}'>Delete</a>
              </td>
            </tr>
            ";
          }
        } else {
          echo "<tr><td colspan='6' class='text-center'>No lecturers found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="bootstrap.bundle.min.js"></script>
</body>

</html>