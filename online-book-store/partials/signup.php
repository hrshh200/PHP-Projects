<?php
$showalert = 2;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './dbconnect.php';
    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $username = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    if ($password == $cpassword && $exists == false) {
        $sql = "INSERT INTO `bookusers` (`f_name`, `l_name`, `username`, `password`) VALUES ('$firstname', '$lastname','$username','$password');";
        $myconnect_result = mysqli_query($conn, $sql);
        if ($myconnect_result) {
            $showalert = 0;
        }
    } else {
        echo '<script>alert("Password not matching or account exist!");</script>';
        $showalert = 1;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksMania-Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-10/assets/css/login-10.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <section class="bg-light py-3 py-md-5">
        <section class="bg-light ">
            <a href="../index.php">
                <p>Back to home
            </a>
            <?php
            if ($showalert == 0) {
                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
             <div>
                 Success! Your account has been successfully created.
             </div>
             </div>';
            } elseif ($showalert == 1) {
                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
             <div>
                 Failed! Passwords do not match.
             </div>
             </div>';
            }
            ?>


            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                        <div class="card border border-light-subtle rounded-3 shadow-sm">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="text-center">
                                    <img src="../images/logo.png" alt="BootstrapBrain Logo" width="150" height="100">
                                </div>
                                <h2 class="text-center pb-5" style="color: brown; font-weight:bold; font-size: 40px">SignUp</h2>
                                <form action="./signup.php" method="post">
                                    <div class="row gy-2 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                                                <label for="firstName" class="form-label">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
                                                <label for="lastName" class="form-label">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                                <label for="password" class="form-label">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="cpassword" id="cpassword" value="" placeholder="CPassword" required>
                                                <label for="cpassword" class="form-label">Confirm Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                                                <label class="form-check-label text-secondary" for="iAgree">
                                                    I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid my-3">
                                                <button class="btn btn-primary btn-lg" type="submit">Sign up</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="m-0 text-secondary text-center">Already have an account? <a href="./login.php" class="link-primary text-decoration-none">Log in</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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