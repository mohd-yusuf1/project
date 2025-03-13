<?php
session_start();  // Start session

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

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming the form sends data with 'username' and 'password' fields
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        // Check if the username is 'admin' or contains restricted words
        if (strtolower($user) == 'admin') {
            $error_message = "Error: The username 'admin' is not allowed."; // Set the error message
        } else {
            // Sanitize the inputs
            $user = mysqli_real_escape_string($conn, $user);
            $pass = mysqli_real_escape_string($conn, $pass);

            // Hash the password
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Prepare and execute SQL query to insert the user into the database
            $sql = "INSERT INTO users (username, password_hash) VALUES ('$user', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page to refresh the table
                header("Location: " . $_SERVER['PHP_SELF']);
                exit(); // Ensure the script stops executing after redirect
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error; // Set error message if SQL fails
            }
        }
    } else {
        $error_message = "Username and Password are required."; // Set error if username or password is missing
    }
}

$conn->close();
?>

<!-- HTML form and error display -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/Control panel/css/manager_style.css">
    <link rel="stylesheet" href="/Control panel/css/manager_media.css">
</head>

<body>
    <!-- Show error message if any -->
    <?php if (!empty($error_message)): ?>
        <div style="color: red; font-weight: bold;">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>
    <header>
        <div class="container-fluid fixed-top shadow" style="background-color:antiquewhite;">
            <div class="container">
                <div class="row mb-0">
                    <form method="POST" action="" class="registration-form">
                        <div class="col-md-6 d-flex justify-content-center align-items-center w-100 gap-2">
                            <div class="mb-0 form-group">
                                <label for="username" class="col-form-label form-label fw-bolder">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required
                                    placeholder="Enter Username">
                            </div>
                            <div class="mb-0 form-group">
                                <label for="password" class="col-form-label form-label fw-bolder">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Create User</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </header>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>
<?php
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

// Handle delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Sanitize the delete ID
    $delete_id = mysqli_real_escape_string($conn, $delete_id);

    // Prepare and execute SQL query to delete the user
    $sql = "DELETE FROM users WHERE user_id = '$delete_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page to refresh the table
        header("Location: " . $_SERVER['PHP_SELF']);
        exit(); // Ensure script stops executing after redirect
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch only users with the 'manager' role from the database
$sql = "SELECT user_id, username,created_at FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container-fluid tablecontainer'>";
    echo "<div class='container my-4 fw-semibold'>"; // Bootstrap container class
    echo "<h3 class='fw-bold'>User's Account Details:-</h3>";
    echo "<table class='table table-bordered table-striped'>"; // Add some Bootstrap table classes for better styling
    echo "<thead>
               <tr>
                   <th>ID</th>
                   <th>Username</th>
                   <th>Created At</th>
                   <th>Action</th>
               </tr>
             </thead>
             <tbody>";
    // Loop through the users and display them in a table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['user_id'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['created_at'] . "</td>
                <td>
                    <a href='?delete_id=" . $row['user_id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
    echo "<button class='btn btn-primary' onclick=\"window.location.href='/control panel/Iconss/form2crud.php'\">Back</button></div>";
    echo "</div>";
} else {
    echo "<h5>User Not Found.</h5>";
}
echo "<style>
    .tablecontainer{
        margin-top: 160px;
    }
    thead,tr,th{
        background-color: #4CAF50 !important; /* Bootstrap dark background color */
        color: #f2f2f2 !important;
    }
    h5{
    margin: 180px;
    color: red;
    }
</style>";

// Close the connection
$conn->close();
session_destroy();

?>