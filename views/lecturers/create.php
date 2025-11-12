<!DOCTYPE html>
<html>

<head>
  <title>Create Lecturer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?action=index">Lecturers</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=lecturer&action=index">Lecturers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=course&action=index">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=lecturer&action=create">Add
              New</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?action=store">
      <br><br>
      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center">Create Lecturer</h1>
        </div>

        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">NAME:</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">NIDN:</label>
            <input type="text" name="nidn" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">PHONE:</label>
            <input type="text" name="phone" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">JOIN DATE:</label>
            <input type="date" name="join_date" class="form-control" required>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
            <a class="btn btn-info" href="index.php?action=index">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="bootstrap.bundle.min.js"></script>
</body>

</html>