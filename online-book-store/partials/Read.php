<?php
$row = "";
$bookavailable = 2;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './dbconnect.php';
    $bookname = $_POST["bookname"];
    $authorname = $_POST["authorname"];

    $present = "SELECT * FROM  bookscollection WHERE BookName= '$bookname' AND AuthorName = '$authorname'";
    $present_result = mysqli_query($conn, $present);
    $num = mysqli_num_rows($present_result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($present_result);
        $image_directory = $row['img_dir'];
        $bookavailable = 1;
    } else {
        $bookavailable = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksMania-Read</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .overlay-container {
            position: relative;
            text-align: center;
            color: white;
        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .card-custom {
            background-color: white;
            border-radius: 25px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 700px;
            height: 550px;
            margin: auto;
        }

        .card-custom .form-label {
            font-size: 1.2rem;
            color: brown;
            font-weight: bold;
        }

        .card-custom .form-control {
            font-size: 1.2rem;
        }

        .card-custom .btn-primary {
            background-color: brown;
            border-color: white;
            color: white;
        }

        .card-custom .btn-primary:hover {
            background-color: white;
            border-color: darkbrown;
            color: brown;
        }

        .card-custom .btn {
            font-size: 1.2rem;
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <div class="overlay-container">
        <img src="../images/Read-bg.jpg" class="img-fluid" alt="Background Image" width="100%" height="100%">
        <div class="overlay-text">
            <a href="../index.php">
                <p>Back to home
            </a>
            <h1 style="color: brown; font-weight:bold;">Search and add books!</h1>
            <div class="card card-custom">
                <form action="./Read.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputBookName" class="form-label">Book Name: </label>
                        <input type="text" class="form-control" id="exampleInputBookName" aria-describedby="emailHelp" name="bookname">
                    </div><br>
                    <div class="mb-3">
                        <label for="exampleInputAuthorName" class="form-label">Author Name: </label>
                        <input type="text" class="form-control" id="exampleInputAuthorName" name="authorname">
                    </div><br>
                    <button type="submit" class="btn btn-primary w-100">Find</button>
                </form>
                <?php
                if ($bookavailable == 1) {
                    echo '<h1 style="color:brown;">Book Available</h1> <i class="bi-check"></i>';
                    echo '<img src="' . $image_directory . '" class="img-fluid" alt="Book Image" style="width: 20%; height: 40%"><br>';
                    echo ' <button type="submit" class="btn btn-primary w-100">Read</button><br>';
                } elseif ($bookavailable == 0) {
                    echo '<h1 style="color:brown;">Book Not available!</h1>';
                } else {
                    echo '<h1></h1>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>