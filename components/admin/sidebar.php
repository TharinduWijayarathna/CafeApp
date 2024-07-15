<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">

    
                <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/pages/dashboard/') ? 'active' : ''; ?>" aria-current="page" href="/pages/dashboard/">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/pages/order/manage/') ? 'active' : ''; ?>" href="/pages/order/manage/">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/pages/menu/manage/') ? 'active' : ''; ?>" href="/pages/menu/manage/">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Menu Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/pages/parking/manage/') ? 'active' : ''; ?>" href="/pages/parking/manage/">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Parking
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/pages/category/manage/') ? 'active' : ''; ?>" href="/pages/category/manage/">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/pages/banner/') ? 'active' : ''; ?>" href="/pages/banner/">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Banners
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/pages/users/') ? 'active' : ''; ?>" href="/pages/users/">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
        </ul>
    </div>
</nav>