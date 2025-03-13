<nav class="navbar navbar-expand w-100 px-3 border-bottom position-fixed z-3 shadow" style="background-color: #adb5bd;">
    <div class="container-fluid">
        <button class="btn" id="sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar sinput" style="position: relative;">
            <input type="text" id="searchInput" placeholder="Search" class="form-control" style="padding-left: 30px;">
            <i class="fas fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
            <!-- Suggestion Box -->
            <div id="suggestionBox"></div>
        </div>
        <span>
            <button type="text" class="btn btn-primary ms-1 p-1.5 d-none d-sm-inline-block">Search</button>
            <button type="text" class="btn btn-primary ms-1 p-1.5 d-inline-block d-sm-none btn-sm">search</button>
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
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

