<?php
session_start();
$showstatus = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './dbconnect.php';
    $adminusername = $_POST["username"];
    $adminpassword = $_POST["password"];

    $present = "SELECT * FROM  admin WHERE username= '$adminusername' AND password = '$adminpassword'";
    $present_result = mysqli_query($conn, $present);
    $num = mysqli_num_rows($present_result);
    $row2 = mysqli_fetch_assoc($present_result);
    $name = $row2['f_name'];
    if ($num == 1) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $adminusername;
        $_SESSION['adminname'] = $name;
        $showstatus = true;
        header("location: ../index.php");
    } else {
        echo '<script>alert("No account found! Kindly sign up."); window.location.href="signup.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksMania-AdminLogin</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-10/assets/css/login-10.css">
</head>

<body>
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <a href="../index.php">
            <p>Back to home
        </a>
        <?php
        if ($showstatus == true) {
            echo '<div class="alert alert-success" role="alert">
  Success! You have logged in!
</div>';
        }
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="mb-5">
                        <div class="text-center mb-4">
                            <a href="#!">
                                <img src="../images/logo.png" alt="BootstrapBrain Logo" width="150" height="100">
                            </a>
                        </div>
                        <h4 class="text-center mb-4" style="color: brown; font-weight:bold; font-size:50px">Admin Login</h4>
                    </div>
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <form action="./Admin.php" method="post">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="username" id="email" placeholder="name@example.com" required>
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                            <label class="form-check-label text-secondary" for="remember_me">
                                                Keep me logged in
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg" type="submit">Log in</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4">
                        <a href="./signup.php" class="link-secondary text-decoration-none">Create new account</a>
                        <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
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