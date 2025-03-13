<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Sidebar Content -->
            <div class="h-100 position-fixed">
                <div class="sidebar-logo">
                    <a href="#">
                        <img src="image/logo-removebg-preview.png" width="220px" height="100px" alt="logo">
                    </a>
                    <hr class="text-white">
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header pt-0">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="index.php" class="sidebar-link sugg-div">
                            <img src="image/dashboard_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item2">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <img src="image/handyman_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">RMA</span>
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item ms-4 ps-3">
                                <a href="form1.php" class="sidebar-link sugg-div">Form 1</a>
                            </li>
                            <li class="sidebar-item ms-4 ps-3">
                                <a href="form2.php" class="sidebar-link sugg-div">Form 2</a>
                            </li>
                            <li class="sidebar-item ms-4 ps-3">
                                <a href="form3.php" class="sidebar-link sugg-div">Form 3</a>
                            </li>
                            <li class="sidebar-item ms-4 ps-3">
                                <a href="form4.php" class="sidebar-link sugg-div">Form 4</a>
                            </li>
                            <li class="sidebar-item ms-4 ps-3">
                                <a href="form5.php" class="sidebar-link sugg-div">Form 5</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item2">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <img src="image/person_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Orders</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="login.php" class="sidebar-link sugg-div ms-4">
                                    <img src="image/shopping_cart_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
                                        alt="icon">
                                    <span class="ps-2">Sales Orders</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link sugg-div ms-4">
                                    <img src="image/add_shopping_cart_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
                                        alt="icon">
                                    <span class="ps-2">Purchase Orders</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts"
                            aria-expanded="false">
                            <img src="image/inventory_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Inventory</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts"
                            aria-expanded="false">
                            <img src="image/analytics_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Reports</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts"
                            aria-expanded="false">
                            <img src="image/inventory_2_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Products</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts"
                            aria-expanded="false">
                            <img src="image/database_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Database</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand w-100 px-3 border-bottom position-fixed z-3 shadow"
                style="background-color: #adb5bd;">
                <div class="container-fluid">
                    <button class="btn" id="sidebar-toggle" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar sinput" style="position: relative;">
                        <input type="text" id="searchInput" placeholder="Search" class="form-control"
                            style="padding-left: 30px;">
                        <i class="fas fa-search"
                            style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <!-- Suggestion Box -->
                        <div id="suggestionBox"></div>
                    </div>
                    <span>
                        <button type="text" class="btn btn-primary ms-1 p-1.5 d-none d-sm-inline-block">Search</button>
                        <button type="text"
                            class="btn btn-primary ms-1 p-1.5 d-inline-block d-sm-none btn-sm">search</button>
                    </span>
                    <div class="navbar-collapse navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">Profile</a>
                                    <a href="#" class="dropdown-item">Setting</a>
                                    <a href="login.php" class="dropdown-item">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="content px-3 py-5 mt-5">
                <div class="container-fluid">
                    <!-- Main Content -->
                    <div class="mb-3">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, Admin</h4>
                                                <p class="mb-0">Admin Dashboard, Xpia-i</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                $ 78.00
                                            </h4>
                                            <p class="mb-2">
                                                Total Earnings
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    +9.0%
                                                </span>
                                                <span class="text-muted">
                                                    Since Last Month
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Basic Table
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ducimus,
                                necessitatibus reprehenderit itaque!
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer border-top mb-2">
                <div class="container-fluid pt-3">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Xpia-i</strong>
                                </a> &copy; <span id="current-year"></span> 2025 All rights reserved.
                            </p>
                        </div>
                        <div class="col text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("searchInput");
            const suggestionBox = document.getElementById("suggestionBox");
            const sidebarItems = document.querySelectorAll(".sugg-div, .sidebar-item a");

            searchInput.addEventListener("input", function () {
                const searchText = searchInput.value.toLowerCase();
                const suggestions = [];

                // Hide suggestion box if search box is empty
                if (searchText.trim() === "") {
                    suggestionBox.style.display = "none";
                    return;
                }

                // Filter sidebar items based on search text
                sidebarItems.forEach((item) => {
                    const itemText = item.textContent.toLowerCase();
                    if (itemText.includes(searchText)) {
                        suggestions.push({
                            text: item.textContent.trim(),
                            href: item.getAttribute("href"), // Get the link's href
                        });
                    }
                });

                displaySuggestions(suggestions);
            });

            function displaySuggestions(suggestions) {
                suggestionBox.innerHTML = "";

                if (suggestions.length > 0) {
                    suggestions.forEach((suggestion) => {
                        const suggestionItem = document.createElement("div");
                        suggestionItem.textContent = suggestion.text;
                        suggestionItem.addEventListener("click", function () {
                            // Redirect to the corresponding page
                            window.location.href = suggestion.href;
                        });
                        suggestionBox.appendChild(suggestionItem);
                    });
                    suggestionBox.style.display = "block"; // Show the suggestion box
                } else {
                    suggestionBox.innerHTML ='<div style="padding: 8px 10px;">No suggestions found</div>';
                }
            }

            // Hide suggestion box when clicking outside
            document.addEventListener("click", function (event) {
                if (
                    !searchInput.contains(event.target) &&
                    !suggestionBox.contains(event.target)
                ) {
                    suggestionBox.style.display = "none";
                }
            });
        });
    </script>

</body>

</html>