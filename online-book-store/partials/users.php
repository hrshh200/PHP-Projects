<?php
include './dbconnect.php';
$showstatus = false;
$users = "SELECT * FROM  bookusers";
$present_result = mysqli_query($conn, $users);
if ($present_result) {
    $showstatus = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deleteModal'])) {
        // Deleting the user
        $serial_no = $_POST["sno"];
        $sql_delete_user = "DELETE FROM `bookusers` WHERE `sno` = '$serial_no'";
        $myconnect_delete_user = mysqli_query($conn, $sql_delete_user);
        if ($myconnect_delete_user) {
            echo "user deleted from database";
            header("location: AdminPortal.php");
        } else {
            echo "Error deleting the user from the database!";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
        <h1 style="color:brown; text-align:center;">BooksMania Users</h1>
        <p>Showing Users of BooksMania: </p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($present_result) > 0) {
                    while ($row = mysqli_fetch_assoc($present_result)) {
                        echo "<tr>";
                        echo "<td>" . $row['sno'] . "</td>";
                        echo "<td>" . $row['f_name'] . "</td>";
                        echo "<td>" . $row['l_name'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-danger me-2" type="button" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete</button>
        </div>
        <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletemodalLabel">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="users.php" method="post">
                            <div class="mb-3">
                                <label for="sno" class="form-label">User Serial No.: </label>
                                <input type="number" class="form-control" id="sno" name="sno" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="deleteModal">Delete User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>