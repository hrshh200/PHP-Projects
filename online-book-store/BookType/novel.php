<?php
include '../partials/dbconnect.php';
$showstatus = false;
$novel_books = "SELECT * FROM bookscollection WHERE Type='Novel'";
$present_result = mysqli_query($conn, $novel_books);
if ($present_result) {
    $showstatus = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-img-top.custom-img {
            width: 100%;
            height: 300px;
            /* Adjust the height as needed */
            object-fit: cover;
            /* This ensures the image covers the entire area without distorting */
        }
    </style>
</head>

<body>
    <h2 class="display-4 mb-5" style="color: brown; font-weight:bold; text-align:center;">Novels in Collection</h2>
    <div class="container">
        <div class="row">
            <?php
            if (mysqli_num_rows($present_result) > 0) {
                while ($row = mysqli_fetch_assoc($present_result)) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card" style="width: 300px; height: 470px;">';
                    echo '<img src="' . $row["img_dir"] . '" class="card-img-top custom-img" alt="...">'; // Add custom class here
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["BookName"] . '</h5>';
                    echo '<p class="card-text">' . $row["AuthorName"] . '</p>';
                    echo '<h4>Rs ' . $row["price"] . '/-</h4>';
                    echo '<a href="novel.php" class="btn btn-danger mt-auto">Add to cart</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo ' <h3 class="display-4 mb-5" style="color: brown; font-weight:bold; text-align:center;">No results found</h3>';
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>