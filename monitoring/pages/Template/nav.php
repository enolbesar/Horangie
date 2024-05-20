<?php
// Get the current file name
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../pages/dashboard.php"
            target="_blank">
            <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Horangie Dashboard</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav" id="nav-list">
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>" href="../pages/dashboard.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'tables.php' ? 'active' : ''; ?>" href="../pages/tables.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Table</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'userData.php' ? 'active' : ''; ?>" href="../pages/userData.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Data</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $current_page == 'registration.php' ? 'active' : ''; ?>" href="../pages/registration.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Registration</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
