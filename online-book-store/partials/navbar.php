<?php
$admin = false;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-nav .nav-link {
            color: brown !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: black !important;
        }

        .dropdown-menu .dropdown-item {
            color: black !important;
        }
    </style>
</head>

<body>
    <nav class="navbar fixed navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid con">
            <img src="images/logo.png" width="210" alt="logo" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto" style="font-size: 17px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>

                    <?php
                    if ($loggedin && $_SESSION["username"] == "harshadmin@gmail.com") {
                        $admin = true;
                        echo '<li class="nav-item">
                        <a class="nav-link" href="partials/profile.php">' . $_SESSION["username"] . '</a>
                    </li>';
                    } elseif ($loggedin && $_SESSION["username"] != "harshadmin@gmail.com") {

                        echo '<li class="nav-item">
                        <a class="nav-link" href="partials/profile.php">' . $_SESSION["name"] . '</a>
                    </li>';
                    } else {
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="loginDropdown">
                            <a class="dropdown-item" href="partials/login.php">User Login</a>
                            <a class="dropdown-item" href="partials/Admin.php">Admin Login</a>
                        </div>
                    </li>';
                    }
                    ?>
                    <?php
                    if (!$loggedin) {
                        echo ' <li class="nav-item">
                        <a class="nav-link" href="partials/signup.php">Sign Up</a>
                    </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#statistics">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#linked">About Us</a>
                    </li>
                    <?php
                    if ($loggedin) {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="partials/logout.php">Logout</a>
                    </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <?php
                    if ($loggedin) {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="partials/cart.php">Cart
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>';
                    }
                    ?>
                    <?php
                    if ($admin) {
                        echo '<a href="partials/AdminPortal.php"><button type="button" class="btn btn-danger">Admin Portal</button></a>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>