<?php
    // require_once 'assets/php/config.php';
    require_once 'action1.php';
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="Sahil Kumar">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>USER DETAILS</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">LANKA ONLINE BOOK LIBRARY</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">USER DETAILS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">GENERATE REPORT</a>
      </li>
    </ul>
  </div>
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
</nav>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center text-dark mt-2">USER MANAGEMENT SYSTEM</h3>
                <hr>
                <?php if(isset($_SESSION['response'])){ ?>
                <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <b><?= $_SESSION['response']; ?></b>
                </div>
                <?php } unset($_SESSION['response']); ?>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-md-4">
                <h3 class="text-center text-info">Add Record</h3>
                <form action="action1.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter e-mail" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Contact No" required>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="custom-file" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Value Record">
                    </div>
                </form>
            </div> -->
            <div class="col">
                <?php
                    $query="SELECT * FROM users";
                    $stmt=$conn->prepare($query);
                    $stmt->execute();
                    $result=$stmt->get_result();
                ?>
            <h3 class="text-center text-info">Records Present In The Database</h3>
            <div class="container">
  <h2>User Details</h2>
  <!-- <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>             -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Username</th>
        <th>User Id</th>
        <th>Email</th>
        <th>Contact No</th>
        <!-- <th>Password</th> -->
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
         <?php while($row=$result->fetch_assoc()){ ?> 
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['username']; ?></td>
        <td><?= $row['userid']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['phone']; ?></td>
        <!-- <td><?= $row['password']; ?></td> -->
        <td>
            <a href="userdetails.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
            <a href="action1.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2">Delete</a> |
            <a href="edit.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
        </td>
      </tr>
     <?php } ?>
    </tbody>
  </table>
</div>
            </div>
        </div>
    </div>
</body>
</html>