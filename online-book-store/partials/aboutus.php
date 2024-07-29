<?php

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
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="partials/about.css" rel="stylesheet">
</head>

<body>
    <div class="position-relative md-5">
        <img src="images/bg.jpg" class="img-fluid" alt="books">
        <div class="text-overlay">
            <h1>Unlock new worlds and ignite<br>imagination dive into <br> a book today!</h1>
            <p>Read and Order books now!</p>
            <div class="row pl-3">
                <?php
                if ($loggedin == true) {
                    echo '<a href="partials/Read.php" class="btn btn-outline-danger custom-btn">Read Now</a>';
                } else {
                    echo '<a href="#" class="btn btn-outline-danger custom-btn">Read Now</a>';
                }
                ?>
                <?php
                if ($loggedin == true) {
                    echo '<a href="partials/Order.php" class="btn btn-outline-danger custom-btn ml-3">Order Now</a>';
                } else {
                    echo '<a href="#" class="btn btn-outline-danger custom-btn ml-3">Order Now</a>';
                }
                ?>
            </div>
            <img src="images/boy.png" class="img-fluid custom-width" alt="boy">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>

</html>