<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  include 'partials/db_connect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $exist = false;

  if (($password == $cpassword) && $exist == false) {
    $sql = "INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      $showAlert = true;
    }
  }else {
    $showError = "passwords do not match";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php require 'partials/nav.php' ?>

  <?php
  if ($showAlert) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Successfully Signed Up.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '. $showError .' "
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  ?>

  <div class="container">
    <h1 class="text-center">Signup To Our Website</h1>


    <form method="POST" action="/Login_System_2/signup.php">

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="Enter Username">
      </div>

      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
      <div id="passwordHelpBlock" class="form-text">
        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
      </div>

      <label for="cpassword" class="form-label">Confirm Password</label>
      <input type="password" name="cpassword" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
      <div id="passwordHelpBlock" class="form-text">
        Make Sure Both Password are Same.
      </div>

      <button type="submit" class="mt-3 btn btn-primary">SignUp</button>

    </form>


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>