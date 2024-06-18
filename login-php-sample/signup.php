<?php
$showalert = 2;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $city = $_POST["city"];
    $exists = false;
    if ($password == $cpassword && $exists == false) {
        $sql = "INSERT INTO `users` (`username`, `password`, `city`) VALUES ('$username', '$password', '$city');";
        $myconnect_result = mysqli_query($conn, $sql);
        if ($myconnect_result) {
            $showalert = 0;
        }
    } else {
        $showalert = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourSecure</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require 'partials/nav.php' ?>

    <?php
    if ($showalert == 0) {
        echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>You can now login to your account</p>

        </div>';
    } else if ($showalert == 1) {
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Ahhh!</h4>
        <p>Passwords do not match</p>
        </div>';
    }
    ?>
    <h1 class="text-center pt-3">SignUp to our website</h1>
    <div class="container">
        <form class="form-group" action="/login-php-sample/signup.php" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Username</label>
                <input type="email" class="form-control" id="inputEmail4" name="username">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city">
            </div>
            <div class="col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <div class="col-12 pt-3">
                <button type="submit" class="btn btn-primary col-md-6">Sign in</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>