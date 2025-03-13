<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include "db.php";

// Database connection for second database
$conn2 = new mysqli("localhost", "root", "", "customer_info");

if ($conn2->connect_error) {
    die("Connection failed to Database2: " . $conn2->connect_error);
}


$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['orders'])) {
//     foreach ($_POST['orders'] as $order) {
//         $name = trim($order["name"]);
//         $modal = trim($order["modal"]);
//         $qty = intval($order["qty"]);
//         $price = floatval($order["price"]);
//         $brand = trim($order["brand"]);
//         $payment_terms = trim($order["payment_terms"]);
//         $dispatch_mode = trim($order["dispatch_mode"]);
//         $courier_payment = trim($order["courier_payment"]);

//         $query = "INSERT INTO orders (user_id, item_name, modal, qty, price, brand, payment_terms, dispatch_mode, courier_payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
//         $stmt = $conn->prepare($query);
//         $stmt->bind_param("issidssss", $user_id, $name, $modal, $qty, $price, $brand, $payment_terms, $dispatch_mode, $courier_payment);

//         if (!$stmt->execute()) {
//             echo "Error: " . $stmt->error;
//             exit();
//         }
//     }
//     header("Location: display.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            min-width: 870px;
            scrollbar-color: rgb(13, 202, 240) #f1f1f1;
        }

        .form-control {
            font-size: 13px;
        }

        .qty {
            width: 110px !important;
        }

        .editinput {
            border: 1px solid #dee2e6 !important;
            text-align: center;
            border-radius: 5px;
        }

        th {
            background-color: rgb(172, 255, 226) !important;
            text-align: center;
        }
        
        @media (min-width: 576px) {
            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 100vw;
            }
            .qty {
                min-width: 100px !important;
            }
        }

        @media only screen and (min-width: 576px) and (max-width: 991px) {
            .col-sm-4 {
                width: 50% !important;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5 p-5 pt-0">
        <div class="row g-2 mb-2">
            <h3 class="text-center mb-1"><?php echo "Hi👋, " . $_SESSION["username"]; // Display logged-in username ?>
            </h3>
            <div class="col-6">
                <h5 class="text-secondary fw-bolder">Create Order:-</h5>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Customer</button>
                <button class="btn btn-primary btn-sm" onclick="window.location.href='index.php'">Back</button>
            </div>
            <hr class="mt-0">
        </div>
        <form method="POST" action="">
            <div class="row g-2 mb-5">
                <input type="hidden" name="id" value="">
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Current Date and time:</label>
                    <input type="text" class="form-control" id="current-date-time-main" name="current_date_time" readonly>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Client_id:</label>
                    <input type="text" class="form-control" id="client-id" name="client_id" readonly>
                </div>
                <div class="col-md-3 col-sm-4">
                    <label class="fw-semibold">Client Name:</label>
                    <input type="text" class="form-control" id="client-name" name="client_name" autocomplete="off" required>
                    <div id="suggestions-container" class="autocomplete-suggestions"></div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <label class="fw-semibold">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Sales Person:</label>
                    <input type="text" class="form-control" id="sale-person" name="sale_person" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Phone No:</label>
                    <input type="number" class="form-control" id="phone-no" name="phone_no" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Alternative No:</label>
                    <input type="number" class="form-control" id="alt-no" name="alt_no" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Whatsapp No:</label>
                    <input type="number" class="form-control" id="whatsapp-no" name="whatsapp_no" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">City:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">State:</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Payment_terms</label>
                    <select class="form-select" name="orders[0][payment_terms]" required>
                        <option value="" selected disabled>Select one...</option>
                        <option value="Advance">Advance</option>
                        <option value="COD">COD</option>
                        <option value="On Account">On Account</option>
                        <option value="Part Payment">Part Payment</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Dispatch_mode</label>
                    <select class="form-select" name="orders[0][dispatch_mode]" required>
                        <option value="" selected disabled>Select one...</option>
                        <option value="Air">Air</option>
                        <option value="Porter">Porter</option>
                        <option value="Surface">Surface</option>
                        <option value="TPT">TPT</option>
                        <option value="By Hand">By Hand</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="fw-semibold">Courier_payment</label>
                    <select class="form-select" name="orders[0][courier_payment]" required>
                        <option value="" selected disabled>Select one...</option>
                        <option value="Paid">Paid</option>
                        <option value="To Pay">To Pay</option>
                    </select>
                </div>
            </div>
            <div class="row g-2">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>S.No</th>
                                <th>Item Name</th>
                                <th>Modal</th>
                                <th class="qty">Qty</th>
                                <th class="qty">Price</th>
                                <th class="qty">Brand</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="orderTable" class="text-center">
                            <tr>
                                <td class="sno text-center">1</td>
                                <td>
                                    <select name="orders[0][name]" class="product product-select editinput"
                                        onchange="fetchModels(this)" required>
                                        <option value="" disabled selected>Select Item or Type</option>
                                        <?php
                                        $product_stmt = $conn2->query("SELECT id, name FROM products");
                                        while ($product = $product_stmt->fetch_assoc()) {
                                            echo "<option value='" . htmlspecialchars($product['name']) . "'>" . htmlspecialchars($product['name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="orders[0][modal]" class="modelNo model-select editinput" required>
                                        <option value="" disabled selected>Select or Type Model</option>
                                    </select>
                                </td>
                                <td><input type="number" class="form-control" name="orders[0][qty]" min="0" required>
                                </td>
                                <td><input type="text" class="form-control" name="orders[0][price]" required></td>
                                <td>
                                    <select class="form-select" name="orders[0][brand]">
                                        <option value="OEM">OEM</option>
                                        <option value="XP">XP</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </td>
                                <td><button type="button" class="deleteRow btn btn-danger btn-sm"
                                        disabled>Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mt-2">
                    <button type="button" class="btn btn-primary" id="addRow">Add Row</button>
                    <button type="submit" class="btn btn-success">Submit Order</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal -->
    <form action="addnewcustomer.php" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bolder text-info" id="exampleModalLabel">Add New Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <!-- Customer Information -->
                        <!-- <label class="fw-semibold">Current Date and time:</label> -->
                        <input type="hidden" class="form-control" id="current-date-time-modal" name="current_date_time" readonly>

                        <label class="fw-semibold">Client_id:</label>
                        <input type="text" class="form-control" id="uid" name="client_id" readonly>

                        <label class="fw-semibold" for="customerName">Customer Name:</label>
                        <input class="form-control" type="text" id="customerName" name="client_name" required>
                    
                        <label class="fw-semibold" for="address">Address:</label>
                        <input class="form-control" id="address" name="address" rows="4" required>

                        <label class="fw-semibold" for="city">City:</label>
                        <input class="form-control" type="text" id="city" name="city" required>
                        
                        <label class="fw-semibold" for="state">State:</label>
                        <input class="form-control" type="text" id="state" name="state" required>
                        
                        <label class="fw-semibold" for="phone">Phone No:</label>
                        <input class="form-control" type="text" id="phone_no" name="phone_no" pattern="^\+?[0-9]{1,4}?[-. \(\)]?([0-9]{1,3})?[-. \(\)]?([0-9]{1,3})?[-. \(\)]?([0-9]{1,4})$" required>
                    
                        <label class="fw-semibold" for="whatsapp">WhatsApp No:</label>
                        <input class="form-control" type="text" id="whatsapp" name="whatsapp_no">
                    
                        <label class="fw-semibold" for="altPhone">Alternative No:</label>
                        <input class="form-control" type="text" id="alt_no" name="alt_no" required>
                    
                        <label class="fw-semibold" for="email">Email Address:</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    
                        <!-- Return Coordinator Information -->
                        <label class="fw-semibold" for="sales_team_person">Sales Team Person:</label>
                        <input class="form-control" type="text" id="sale_person" name="sale_person" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mybtn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
function generateUID() {
    const alphabet = String.fromCharCode(Math.floor(Math.random() * 26) + 65); // Generate a random uppercase letter
    const number = Math.floor(Math.random() * 90000) + 10000;  // Generate a 5-digit number
    return 'ORD' + alphabet + number;
}

function getCurrentDateTime() {
    const now = new Date();
    const date = now.toLocaleDateString('en-GB'); // Format date as dd/mm/yyyy
    const time = now.toLocaleTimeString('en-GB'); // Format time as HH:MM:SS
    return `${date} ${time}`;
}

// Fetch customer details based on name
function fetchCustomerSuggestions(query) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_customer_info.php?query=' + encodeURIComponent(query), true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            const suggestionsContainer = document.getElementById('suggestions-container');
            suggestionsContainer.innerHTML = '';  // Clear previous suggestions

            if (response.suggestions && response.suggestions.length > 0) {
                response.suggestions.forEach(function(client) {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.textContent = client.client_name;
                    suggestionItem.onclick = function() {
                        // Autofill customer data when a suggestion is clicked
                        document.getElementById('client-id').value = client.client_id;
                        document.getElementById('client-name').value = client.client_name;
                        document.getElementById('address').value = client.address;
                        document.getElementById('phone-no').value = client.phone_no;
                        document.getElementById('city').value = client.city;
                        document.getElementById('state').value = client.state;
                        document.getElementById('whatsapp-no').value = client.whatsapp_no;
                        document.getElementById('alt-no').value = client.alt_no;
                        document.getElementById('email').value = client.email;
                        document.getElementById('sale-person').value = client.sale_person;

                        suggestionsContainer.innerHTML = '';  // Clear suggestions
                    };
                    suggestionsContainer.appendChild(suggestionItem);
                });
            } else {
                suggestionsContainer.innerHTML = '<div>No matching customers found</div>';
            }
        }
    };
    xhr.onerror = function() {
        console.error('An error occurred while fetching data.');
    };
    xhr.send();
}

// Event listener for typing in the customer name field
document.getElementById('client-name').addEventListener('input', function() {
    const query = this.value.trim();
    if (query.length > 2) {  // Start searching after 2 characters
        fetchCustomerSuggestions(query);
    } else {
        document.getElementById('suggestions-container').innerHTML = '';  // Clear suggestions if query is too short
    }
});


document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('uid').value = generateUID();
        
    // Update both forms
    document.getElementById('current-date-time-main').value = getCurrentDateTime();
    document.getElementById('current-date-time-modal').value = getCurrentDateTime();
});

        $(document).ready(function () {
            let rowCount = 1;

            $("#addRow").click(function () {
                $(document).ready(function () {
                    $('.product-select').select2({
                        tags: true // Allow typing in product names
                    });

                    $('.model-select').select2({
                        tags: true // Allow typing in model numbers
                    });

                    // Fetch models for existing rows
                    $('.product-select').each(function () {
                        fetchModels(this);
                    });
                });;

                let newRow = `<tr>
        <td class="sno text-center">${rowCount + 1}</td>
        <td>
            <select name="orders[${rowCount}][name]" class="product product-select" onchange="fetchModels(this)" required>
                <option value="" disabled selected>Select Item or Type</option>
                <?php
                $product_stmt = $conn2->query("SELECT id, name FROM products");
                while ($product = $product_stmt->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($product['name']) . "'>" . htmlspecialchars($product['name']) . "</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <select name="orders[${rowCount}][modal]" class="modelNo model-select" required>
                <option value="" disabled selected>Select or Type Model</option>
            </select>
        </td>
        <td><input type="number" class="form-control qty" name="orders[${rowCount}][qty]" min="0" required></td>
        <td><input type="text" class="form-control pc" name="orders[${rowCount}][price]" required></td>
        <td>
            <select class="form-select" name="orders[${rowCount}][brand]">
                <option value="OEM">OEM</option>
                <option value="XP">XP</option>
                <option value="Other">Other</option>
            </select>
        </td>
        <td><button type="button" class="deleteRow btn btn-danger btn-sm">Remove</button></td>
    </tr>`;
                $("#orderTable").append(newRow);
                rowCount++;

                // Re-initialize select2 for the new select elements with 'tags: true' for typing
                $(newRow).find('.product-select').select2({ tags: true });
                $(newRow).find('.model-select').select2({ tags: true });
            });

            $(document).on("click", ".deleteRow", function () {
                $(this).closest("tr").remove();
                $(".sno").each(function (index) {
                    $(this).text(index + 1);
                });
                rowCount--;
            });
        });

        $(document).ready(function () {
            $('.product-select').select2({
                tags: true // Allow typing in product names
            });

            $('.model-select').select2({
                tags: true // Allow typing in model numbers
            });

            // Fetch models for existing rows
            $('.product-select').each(function () {
                fetchModels(this);
            });
        });

        function fetchModels(select) {
            const productName = select.value; // Get selected product name
            const modelSelect = select.closest('tr').querySelector('.model-select');

            if (productName) {
                $.post('fetch_models2.php', { product: productName }, function (data) {
                    modelSelect.innerHTML = data; // Populate model select with returned data
                    $(modelSelect).select2({ tags: true }); // Re-initialize Select2 for the new model select
                }).fail(function () {
                    modelSelect.innerHTML = "<option value='' disabled>Error fetching models</option>";
                });
            } else {
                modelSelect.innerHTML = '<option value="" disabled selected>Select Model</option>';
            }
        }


        $(document).ready(function () {
            $('.product-select').select2({
                tags: true // Allow typing
            });
            $('.model-select').select2({
                tags: true // Allow typing
            });
            $('.lot-number-select').select2({
                tags: true // Allow typing
            });
            $('.rma-request-select').select2({
                tags: true // Allow typing
            });
            $('.problem-select').select2({
                tags: true // Allow typing
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>