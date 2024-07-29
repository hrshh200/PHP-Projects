<?php
include './dbconnect.php';
$showstatus = false;
$cart_items = "SELECT * FROM cart";
$present_result = mysqli_query($conn, $cart_items);

if (mysqli_num_rows($present_result) > 0) {
    $showstatus = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .quantity-input {
            display: flex;
            align-items: center;
        }

        .quantity-input input {
            width: 60px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="display-4 mb-5" style="color: brown; font-weight:bold; text-align:center;">Your Cart</h2>
        <?php
        $items = 0;
        $totalPrice = 0;
        if ($showstatus) {
            while ($row = mysqli_fetch_assoc($present_result)) {
                $itemname = $row['itemname'];
                $authorname = $row['AuthorName'];
                $price = $row['price'];
                $img = $row['img'];
                $totalPrice += $price;
                echo '<div class="card mb-3" style="width: 100%;">';
                echo '<div class="card-body d-flex align-items-center">';
                echo "<img src='$img' alt='$itemname' style='width: 6%; height: auto; margin-right: 20px;' />";
                echo '<div>';
                echo "<h5 class='card-title'>$itemname</h5>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>$authorname</h6>";
                echo "<p class='card-text'>Rs $price</p>";
                echo '<div class="quantity-input mt-2">';
                echo '<button class="btn btn-outline-secondary" type="button" onclick="decrement(this)">-</button>';
                echo '<input type="number" class="form-control" value="1" min="1">';
                echo '<button class="btn btn-outline-secondary" type="button" onclick="increment(this)">+</button>';
                echo '</div>';
                echo "<h4 class='ms-auto' style='padding-left:970px; color: brown;'>Price: Rs $totalPrice</h4>";
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $items += 1;
            }
            echo '<div class="d-flex justify-content-between">';
            echo "<h4 style='padding-left:1150px;color: brown;'>Total Items: $items</h4>";
            echo '</div>';
        } else {
            echo '<h2 class="display-4 mb-5" style="color: brown; text-align:center;">No items here!</h2>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function increment(button) {
            var input = button.previousElementSibling;
            var currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        }

        function decrement(button) {
            var input = button.nextElementSibling;
            var currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        }
    </script>
</body>

</html>