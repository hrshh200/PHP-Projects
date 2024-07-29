<?php
include './dbconnect.php';
$showstatus = false;
$users = "SELECT * FROM bookscollection";
$present_result = mysqli_query($conn, $users);
if ($present_result) {
    $showstatus = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addBook'])) {
        // Adding a book
        $bookName = $_POST["bookName"];
        $authorName = $_POST["authorName"];
        $price = $_POST["price_new"];
        $image_dir = $_POST["bookimage"];
        $booktype = $_POST["booktype"];
        $sql_bookinsert = "INSERT INTO `bookscollection` (`BookName`, `AuthorName`, `price`, `img_dir`, `Type`) VALUES ('$bookName', '$authorName', '$price', '$image_dir', '$booktype')";
        $myconnect_result = mysqli_query($conn, $sql_bookinsert);
        if ($myconnect_result) {
            echo "New Book added successfully";
            header("location: AdminPortal.php");
        } else {
            echo "Error adding the book!";
        }
    } elseif (isset($_POST['updatePrice'])) {
        // Updating book price
        $serialno = $_POST["sno"];
        $price_update = $_POST["price"];
        $sql_priceupdate = "UPDATE `bookscollection` SET `price` = '$price_update' WHERE `sno` = '$serialno'";
        $myconnect_result_price = mysqli_query($conn, $sql_priceupdate);
        if ($myconnect_result_price) {
            echo "Price Updated";
            header("location: AdminPortal.php");
        } else {
            echo "Error updating the price!";
        }
    } elseif (isset($_POST['deletebook'])) {
        // Deleting book by sno
        $serialno_delete = $_POST["sno_delete"];
        $sql_deletebook = "DELETE FROM `bookscollection` WHERE `sno` = '$serialno_delete'";
        $myconnect_delete_book = mysqli_query($conn, $sql_deletebook);
        if ($myconnect_delete_book) {
            echo "Book Deleted";
            header("location: AdminPortal.php");
        } else {
            echo "Error deleting the book from the database!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    if ($showstatus) {
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div>
                Success! Data Fetched!
            </div>
        </div>';
    }
    ?>
    <div class="container mt-4">
        <h1 style="color:brown; text-align:center;">BooksMania Books</h1>
        <p>Showing Books Collection of BooksMania: </p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Price</th>
                    <th>BookType</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($present_result) > 0) {
                    while ($row = mysqli_fetch_assoc($present_result)) {
                        echo "<tr>";
                        echo "<td>" . $row['sno'] . "</td>";
                        echo "<td>" . $row['BookName'] . "</td>";
                        echo "<td>" . $row['AuthorName'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['Type'] . "</td";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No books found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-danger me-2" type="button" data-bs-toggle="modal" data-bs-target="#updatePriceBookModal">Price Update</button>
            <button class="btn btn-danger me-2" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">Add</button>
            <button class="btn btn-danger me-2" type="button" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete</button>
        </div>
    </div>

    <!-- Modal for adding new book -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="books.php" method="post">
                        <div class="mb-3">
                            <label for="bookName" class="form-label">Book Name</label>
                            <input type="text" class="form-control" id="bookName" name="bookName" required>
                        </div>
                        <div class="mb-3">
                            <label for="authorName" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="authorName" name="authorName" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_new" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price_new" name="price_new" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">BookType</label>
                            <input type="text" class="form-control" id="booktype" name="booktype" required>
                        </div>
                        <div class="mb-3">
                            <label for="bookimage" class="form-label">Image Directory</label>
                            <input type="text" class="form-control" id="bookimage" name="bookimage" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="addBook">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for updating price for book -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodalLabel">Delete the book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="books.php" method="post">
                        <div class="mb-3">
                            <label for="sno_delete" class="form-label">Book Serial Number:</label>
                            <input type="number" class="form-control" id="sno_delete" name="sno_delete" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="deletebook">Delete Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for deleting book -->
    <div class="modal fade" id="updatePriceBookModal" tabindex="-1" aria-labelledby="updatePriceBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePriceBookModalLabel">Update Book Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="books.php" method="post">
                        <div class="mb-3">
                            <label for="sno" class="form-label">Book Serial Number:</label>
                            <input type="number" class="form-control" id="sno" name="sno" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Enter Updated Price:</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="updatePrice">Update Price</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>