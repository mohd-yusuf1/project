<?php
session_start();

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "order_management"; // Change as needed

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user["password_hash"])) {
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["username"] = $user["username"];

            // Redirect to dashboard
            header("Location: order_form.php");
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "User not found!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: #212121;
            color: #fff;
        }
        .form-control{
            background-color: #212121;
            color: #dee2e6;
            border: 1px solid #495057;
        }
        .form-control:focus{
            background-color: #212121;
            color: #dee2e6;
        }
        .form-label{
            color: #dee2e6;
        }
        ::placeholder{
            color:rgb(130, 131, 133) !important;
        }
        .container {
            max-width: 350px;
            margin-top: 150px;
        }
        @media only screen and (max-width: 576px) {
            div.container {
                max-width: 320px !important;
            }
        }
    </style>
</head>

<body>
    <div class="container border border-1 border-info p-5 rounded-3">
        <h2 class="text-center mb-5 text-white-50">Login</h2>
        <?php if (isset($error))
            echo "<p class='text-danger text-center'>$error</p>"; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>