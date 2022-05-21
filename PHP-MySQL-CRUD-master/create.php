<?php
require_once "config.php";

// Define variables and initialize with empty values
$bid_err = $bname_err = $bauthor_err = $bcat_err = $bdate_err = $bfno_err = "";
$Bookid = $Bookname = $Author = $Catogory = $Addeddate = $Folderno = "";


// Processing input data when form is submit
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
    $Catogory = trim($_POST["bcat"]);
  }

  if (empty($_POST["bdate"])) {
    $bdate_err = "*This field is required";
  } else {
    $Addeddate = trim($_POST["bdate"]);
  }

  if (empty($_POST["bfno"])) {
    $bfno_err = "*This field is required";
  } else {
    $Folderno = trim($_POST["bfno"]);
  }

  

  // Check input errors before inserting data into database
  if (empty($bid_err) && empty($bname_err) && empty($bauthor_err) && empty($bcat_err) && empty($bdate_err) && empty($bfno_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO addnewbook (Bookid, Bookname, Author, Catogory, Addeddate, Folderno) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
       //Bind variables to a prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssds", $Bookid, $Bookname, $Author, $Catogory, $Addeddate, $Folderno);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('New record created successfully')</script>";
        echo "<script>window.location.href='http://localhost:8080/PHP-MySQL-CRUD-master/index.php';</script>";
        exit;
      } else {
        echo "Oops! Something went wrong. Please try again later";
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);
  }
  // Close connection
  mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Data - PHP CRUD Application</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center pt-5">
      <div class="col-lg-6">
        <!-- form start -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="bg-light p-4 shadow-sm" novalidate>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <label for="fname" class="form-label">Bookid</label>
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
              <label for="bcat" class="form-label">catogory</label>
              <input type="text" name="bcat" class="form-control" id="bcat" value="<?= $Catogory; ?>">
              <small class="text-danger"><?= $bcat_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="bdate" class="form-label">Added Date</label>
              <input type="date" name="bdate" class="form-control" id="bdate" value="<?= $batch; ?>">
              <small class="text-danger"><?= $bdate_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="bfno" class="form-label">folderno</label>
              <input type="text" name="bfno" class="form-control" id="bfno" value="<?= $Folderno; ?>">
              <small class="text-danger"><?= $bfno_err; ?></small>
            </div>

           

            <div class="col-lg-12 mt-1">
              <input type="submit" class="btn btn-primary form-control" value="Create Record">
            </div>
          </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</body>

</html>