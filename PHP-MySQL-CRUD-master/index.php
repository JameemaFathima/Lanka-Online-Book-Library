<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Managment</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <a href="create.php" class="btn btn-secondary my-4">
      <i class="bi bi-plus-circle"></i> Add book
    </a>
    <a href="report.php" class="btn btn-secondary my-4">
      <i class="bi bi-plus-circle"></i> Print Details
    </a>
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>No</th>
          <th>Bookid</th>
          <th>Bookname</th>
          <th>Author</th>
          <th>Catogory</th>
          <th>Addeddate</th>
          <th>Folderno</th>
          
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php
        // Include config file
        require_once "config.php";

        $sql = "SELECT * FROM addnewbook";

        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            // Fetch the records
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <td><?= $count++; ?>.</td>
                <td><?= ucfirst($row["Bookid"]); ?></td>
                <td><?= ucfirst($row["Bookname"]); ?></td>
                <td><?= $row["Author"]; ?></td>
                <td><?= strtoupper($row["Catogory"]); ?></td>
                <td><?= $row["Addeddate"]; ?></td>
                <td><?= ucfirst($row["Folderno"]); ?></td>
                
                <td>
                  <a href="read.php?id=<?= $row["id"]; ?>" class="btn btn-info btn-sm">
                    <i class="bi bi-eye-fill"></i>
                  </a>&nbsp;
                  <a href="http://localhost:8080/PHP-MySQL-CRUD-master/update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;
                  <a href="delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
            <?php
            }
          } else { ?>
            <tr>
              <td class="text-center text-danger fw-bold" colspan="9">* No Record Found *</td>
            </tr>
        <?php
          }
        } else {
          echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }
        // Close conection 
        mysqli_close($link);
        ?>
      </tbody>
    </table>
  </div>

  <!-- custom js -->
  <script>
    const delBtnEl = document.querySelectorAll(".btn-danger");
    delBtnEl.forEach(function(delBtn) {
      delBtn.addEventListener("click", function(event) {
        const message = confirm("Are you sure you want to delete this record?");
        if (message == false) {
          event.preventDefault();
        }
      });
    });
  </script>
</body>

</html>