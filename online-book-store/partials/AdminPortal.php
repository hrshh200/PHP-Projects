<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="sidebar p-3">
        <h4 style="color: brown;">Admin Portal</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="mx-3" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-page="users">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-page="books">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-page="settings">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-page="settings">Check for orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-page="settings">Tracking</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img src="../images/admin.jpg" />
                <a class="navbar-brand" href="#">Harsh</a>
            </div>
        </nav>

        <div class="container mt-4" id="main-content">
            <h1 style="color:brown; text-align:center;">Welcome to Admin Portal!</h1>
        </div>
    </div>

    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                loadContent(this.getAttribute('data-page'));
            });
        });

        function loadContent(page) {
            fetch(`${page}.php`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('main-content').innerHTML = data;
                });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>