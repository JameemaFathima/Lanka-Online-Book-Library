<?php
include "config.php";

// Define variables and initialize with empty values
$bid_err = $bname_err = $bauthor_err = $bcat_err = $bdate_err = $bfno_err  = "";
$Bookid = $Bookname = $Author = $Catogory = $Addeddate = $Folderno = "";

// Process update operation when form is submit
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  // Get post id
  $id = $_POST["id"];

  if (empty($_POST["bid"])) {
    $bid_err = "*this field is required";
  } else {
    $Bookid = trim($_POST["bid"]);
    if (!ctype_alpha($Bookid)) {
      $bid_err = "Only letters are allowed";
    }
  }

  if (empty($_POST["bname"])) {
    $bname_err = "*This field is required";
  } else {
    $Bookname = trim($_POST["bname"]);
    if (!ctype_alpha($Bookname)) {
      $bname_err = "Only letters are allowed";
    }
  }
  
  if (empty($_POST["bauthor"])) {
    $bauthor_err = "*This field is required";
  } else {
    $Author = trim($_POST["bauthor"]);
    if (!ctype_alpha($Author)) {
      $bauthor_err = "Only letters are allowed";
    }
  }
  
  if (empty($_POST["bcat"])) {
    $bcat_err = "*This field is required";
  } else {
    $Catogory = trim($_POST["Catogory"]);
  }

  if (empty($_POST["bdate"])) {
    $bdate_err = "*This field is required";
  } else {
    $batch = trim($_POST["Addeddate"]);
  }

  if (empty($_POST["bfno"])) {
    $bfno_err = "*This field is required";
  } else {
    $city = trim($_POST["Folderno"]);
  }

  

  // Check input errors before updating record
  if (empty($bid_err) && empty($bname_err) && empty($bauthor_err) && empty($bcat_err) && empty($bdate_err) && empty($bfno_err) ) {

    // Prepare a update statement
    $sql = "UPDATE addnewbook SET Bookid = ?, Bookname = ?, Author = ?, Catogory = ?, Addeddate = ?, Folderno = ? WHERE id = ? ";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssissi", $Bookid, $Bookname, $Author, $Catogory, $Addeddate, $Folderno, $id);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href='http://localhost/php_crud/';</script>";
        exit;
      } else {
        echo "Oops, Something went wrong. Please try again later.";
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);
  }
  // Close connection
  mysqli_close($link);
} else {
  // Check if url contains id parameter
  if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Get id from url
    $id = trim($_GET["id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM addnewbook WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variable to a statement as parameter
      mysqli_stmt_bind_param($stmt, "i", $id);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
          // Fetch the record
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

          // Retrieve individual field value
          $Bookid =  $row["Bookid"];
          $Bookname =  $row["Bookname"];
          $Author =  $row["Author"];
          $Catogory =  $row["Catogory"];
          $Addeddate =  $row["Addeddate"];
          $Folderno =  $row["Folderno"];
          
        } else {
          // Redirect id url doesn't contain valid id parameter
          echo "<script>window.location.href='http://localhost/php_crud/';</script>";
          exit;
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
  } else {
    // Redirect if url doesn't contain id parameter
    echo "<script>window.location.href='http://localhost/php_crud/';</script>";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data - PHP CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center pt-5">
      <div class="col-lg-6">
        <!-- form start -->
        <form action="<?= htmlspecialchars(basename($_SERVER["REQUEST_URI"])); ?>" method="post" class="bg-light p-4 shadow-sm" novalidate>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <label for="bname" class="form-label">Bookid</label>
              <input type="text" name="bid" class="form-control" id="bid" value="<?= $Bookid; ?>">
              <small class="text-danger"><?= $bid_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="bname" class="form-label">Bookname</label>
              <input type="text" name="bname" class="form-control" id="bname" value="<?= $Bookname; ?>">
              <small class="text-danger"><?= $bname_err; ?></small>
            </div>

            <div class="col-lg-12 mb-3">
              <label for="bauthor" class="form-label">Author</label>
              <input type="text" name="bauthor" class="form-control" id="bauthor" value="<?= $Author; ?>">
              <small class="text-danger"><?= $bauthor_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="bcat" class="form-label">Catogory</label>
              <input type="text" name="bcat" class="form-control" id="bcat" value="<?= $Catogory; ?>">
              <small class="text-danger"><?= $bcat_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="bdate" class="form-label">Added Date</label>
              <input type="date" name="bdate" class="form-control" id="bdate" value="<?= $Addeddate; ?>">
              <small class="text-danger"><?= $bdate_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="bfno" class="form-label">Folder No</label>
              <input type="text" name="bfno" class="form-control" id="bfno" value="<?= $Folderno; ?>">
              <small class="text-danger"><?= $bfno_err; ?></small>
            </div>

            

            <div class="col-lg-12 mt-1">
              <input type="hidden" name="id" class="form-control" value="<?= $id; ?>">
              <input type="submit" class="btn btn-secondary btn-block w-100" value="Update Record">
            </div>
          </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</body>

</html>