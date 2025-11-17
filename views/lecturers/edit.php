<!DOCTYPE html>
<html>

<head>
  <title>Edit Lecturer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?controller=lecturer&action=index">Lecturers</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=lecturer&action=index">Lecturers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=course&action=index">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Edit</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?controller=lecturer&action=update">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center">Update Lecturer</h1>
        </div>

        <div class="card-body">
          <input type="hidden" name="id" value="<?php echo $lecturer['id']; ?>">

          <div class="mb-3">
            <label class="form-label">NAME:</label>
            <input type="text" name="name" value="<?php echo $lecturer['name']; ?>" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">NIDN:</label>
            <input type="text" name="nidn" value="<?php echo $lecturer['nidn']; ?>" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">PHONE:</label>
            <input type="text" name="phone" value="<?php echo $lecturer['phone']; ?>" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">JOIN DATE:</label>
            <input type="date" name="join_date" value="<?php echo $lecturer['join_date']; ?>" class="form-control"
              required>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
            <a class="btn btn-info" href="index.php?controller=lecturer&action=index">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="bootstrap.bundle.min.js"></script>
</body>

</html>