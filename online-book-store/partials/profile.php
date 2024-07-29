<?php
session_start();
include './dbconnect.php';

$showprofile = false;
$user_serialno = $_SESSION['sno'];
$useraddress = "SELECT * FROM address WHERE Ad_sno = '$user_serialno'";
$address_result = mysqli_query($conn, $useraddress);
$noofrows = mysqli_num_rows($address_result);

if ($address_result && $noofrows > 0) {
    $fetch = mysqli_fetch_assoc($address_result);
    $address1 = $fetch['Ad_1'];
    $address2 = $fetch['Ad_2'];
    $state = $fetch['State'];
    $city = $fetch['City'];
    $pincode = $fetch['PinCode'];
    $mob = $fetch['Mobile'];
    $showprofile = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adduseraddress'])) {
        // Adding user address
        $add1 = $_POST["ad1"];
        $add2 = $_POST["ad2"];
        $ci = $_POST["ci"];
        $st = $_POST["st"];
        $pc = $_POST["pc"];
        $mb = $_POST["mb"];
        $sql_addressinsert = "INSERT INTO `address` (`Ad_1`, `Ad_2`, `State`, `City`, `PinCode`,`Mobile`) VALUES ('$add1', '$add2', '$st', '$ci','$pc','$mb')";
        $myconnect_result = mysqli_query($conn, $sql_addressinsert);
        if ($myconnect_result) {
            echo "New Address added successfully";
            header("location: profile.php");
        } else {
            echo "Error adding the book!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-10/assets/css/login-10.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 style="color: brown; text-align:center;">My profile</h1>
    <?php
    if ($showprofile) {
        echo '<div class="container mt-5" style="width: 600px; height: 600px;">
          <h3 style="color: brown; text-align:center;" class="card-title pl-0">Saved Address</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">' . $address1 . '</h5>
                <h5 class="card-title">' . $address2 . '</h5>
                <h6 class="card-title">' . $state . '</h6>
                <h6 class="card-title">' . $city . '</h6>
                <h6 class="card-title">' . $pincode . '</h6>
                <h6 class="card-title">+91' . $mob . '</h6>
                <button type="submit" class="btn btn-primary" name="">Delete</button>
                <button type="submit" class="btn btn-primary" name="">Update</button>
            </div>
        </div>
    </div>';
    } else {
        echo '<h5 style="color: brown; text-align:center;" class="card-title pl-0">No Address Found</h5>
        <button class="btn btn-primary me-2" type="button" data-bs-toggle="modal" data-bs-target="#addaddressmodal">Add New Address</button>
        ';

        echo '<div class="modal fade" id="addaddressmodal" tabindex="-1" aria-labelledby="addaddressmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePriceBookModalLabel">Add Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="profile.php" method="post">
                        <div class="mb-3">
                            <label for="ad1" class="form-label">Address 1:</label>
                            <input type="text" class="form-control" id="ad1" name="ad1" required>
                        </div>
                         <div class="mb-3">
                            <label for="ad2" class="form-label">Address 2:</label>
                            <input type="text" class="form-control" id="ad2" name="ad2" required>
                        </div>
                         <div class="mb-3">
                            <label for="ci" class="form-label">City :</label>
                            <input type="text" class="form-control" id="ci" name="ci" required>
                        </div>
                         <div class="mb-3">
                            <label for="st" class="form-label">State :</label>
                            <input type="text" class="form-control" id="st" name="st" required>
                        </div>
                         <div class="mb-3">
                            <label for="pc" class="form-label">Pin Code :</label>
                            <input type="number" class="form-control" id="pc" name="pc" required>
                        </div>
                        <div class="mb-3">
                            <label for="mb" class="form-label">Mobile :</label>
                            <input type="number" class="form-control" id="mb" name="mb" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="adduseraddress">Add address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>