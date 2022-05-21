<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lanka Online Book Library | Generate Report</title>
        
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    </head>
    <body>
        <div class ="container at-5">
            <form action="makepdf.php" method="post" class="offset-md-3 col-md-6">
                <h1>USER MANAGEMENT</h1>

                Username   <div class="mb-2"><input Type="text" name="username" class="form-control" required></div>
                User Id     <div class="mb-2"><input Type="text" name="userid" class="form-control" required></div>
                E-mail     <div class="mb-2"><input Type="email" name="email" class="form-control" required></div>
                Contact No <div class="mb-2"><input Type="tel" name="contactno" class="form-control" required></div>
                Password   <div class="mb-2"><input Type="password" name="password" class="form-control" required> </div>

                <button type="submit" class="btn btn-success btn-lg btn-block"> Generate User Report </button>
                <button type="submit" class="btn btn-success btn-lg btn-block"> Delete User </button>

            </form>
        </div>
    </body>
</html>