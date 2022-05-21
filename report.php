<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body onload="print()">

	 <h3>Book List</h3>
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
          
          
        </tr>
      </thead>

      <?php  
              include  "config.php";

              $getlist=mysqli_query($conn,"SELECT * FROM addnewbook ");
              while($row=mysqli_fetch_array($getlist)){

      ?>

      <tbody>
        <tr>
          <td><?= ucfirst($Bookid); ?></td>
          <td><?= ucfirst($Bookname); ?></td>
          <td><?= $Author; ?></td>
          <td><?= strtoupper($Catogory); ?></td>
          <td><?= $Addeddate; ?></td>
          <td><?= ucfirst($Folderno); ?></td>
          
          <td><?= $creation_date; ?></td>
        </tr>
    <?php } ?>
      </tbody>

</body>
</html>