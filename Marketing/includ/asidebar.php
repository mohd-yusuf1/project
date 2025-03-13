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
                    <li class="sidebar-item ms-4">
                        <a href="form1.php" class="sidebar-link sugg-div">Form 1</a>
                    </li>
                    <li class="sidebar-item ms-4">
                        <a href="form2.php" class="sidebar-link sugg-div">Form 2</a>
                    </li>
                    <li class="sidebar-item ms-4">
                        <a href="form3.php" class="sidebar-link sugg-div">Form 3</a>
                    </li>
                    <li class="sidebar-item ms-4">
                        <a href="form4.php" class="sidebar-link sugg-div">Form 4</a>
                    </li>
                    <li class="sidebar-item ms-4">
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
                        <a href="salesorder.php" class="sidebar-link sugg-div ms-4">
                            <img src="image/shopping_cart_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Sales Orders</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="purchaseorder.php" class="sidebar-link sugg-div ms-4">
                            <img src="image/add_shopping_cart_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                            <span class="ps-2">Purchase Orders</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts" aria-expanded="false">
                    <img src="image/inventory_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                    <span class="ps-2">Inventory</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts" aria-expanded="false">
                    <img src="image/analytics_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                    <span class="ps-2">Reports</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts" aria-expanded="false">
                    <img src="image/inventory_2_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                    <span class="ps-2">Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link sugg-div collapsed" data-bs-target="#posts" aria-expanded="false">
                    <img src="image/database_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="icon">
                    <span class="ps-2">Database</span>
                </a>
            </li>
        </ul>
    </div>
</aside>


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
                suggestionBox.innerHTML =
                    '<div style="padding: 8px 10px;">No suggestions found</div>';
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