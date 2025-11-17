<!DOCTYPE html>
<html>

<head>
    <title>Delete Lecturer</title>
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
                        <a class="nav-link active" aria-current="page" href="#">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-lg-6 m-auto">
        <br><br>
        <div class="card">
            <div class="card-header bg-danger">
                <h1 class="text-white text-center">Delete Lecturer</h1>
            </div>

            <div class="card-body">
                <div class="alert alert-warning" role="alert">
                    <h5>Are you sure you want to delete this lecturer?</h5>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?php echo $lecturer['id']; ?></td>
                    </tr>
                    <tr>
                        <th>NAME</th>
                        <td><?php echo $lecturer['name']; ?></td>
                    </tr>
                    <tr>
                        <th>NIDN</th>
                        <td><?php echo $lecturer['nidn']; ?></td>
                    </tr>
                    <tr>
                        <th>PHONE</th>
                        <td><?php echo $lecturer['phone']; ?></td>
                    </tr>
                    <tr>
                        <th>JOIN DATE</th>
                        <td><?php echo $lecturer['join_date']; ?></td>
                    </tr>
                </table>

                <form method="post" action="index.php?controller=lecturer&action=destroy">
                    <input type="hidden" name="id" value="<?php echo $lecturer['id']; ?>">

                    <div class="d-grid gap-2">
                        <button class="btn btn-danger" type="submit" name="confirm">Yes, Delete</button>
                        <a class="btn btn-secondary" href="index.php?controller=lecturer&action=index">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>