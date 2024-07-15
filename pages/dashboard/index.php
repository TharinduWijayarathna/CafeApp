<?php
require_once './../../config.php';
session_start();

// Fetch total orders
$orderResult = $database->query("SELECT COUNT(*) AS total_orders FROM orders");
$orderData = $orderResult->fetch_assoc();
$totalOrders = $orderData['total_orders'];

// Fetch total sales
$salesResult = $database->query("SELECT SUM(menu_items.price * order_items.quantity) AS total_sales FROM orders 
    JOIN order_items ON orders.id = order_items.order_id 
    JOIN menu_items ON order_items.menu_item_id = menu_items.id 
    WHERE orders.status = 'Complete'");
$salesData = $salesResult->fetch_assoc();
$totalSales = $salesData['total_sales'];

// Fetch total users
$userResult = $database->query("SELECT COUNT(*) AS total_users FROM users");
$userData = $userResult->fetch_assoc();
$totalUsers = $userData['total_users'];

// Fetch total products
$productResult = $database->query("SELECT COUNT(*) AS total_products FROM menu_items");
$productData = $productResult->fetch_assoc();
$totalProducts = $productData['total_products'];
?>

<!doctype html>
<html lang="en">

<?php include './../../components/admin/head.php'; ?>

<body>

    <?php include './../../components/admin/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php include './../../components/admin/sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar" class="align-text-bottom"></span>
                            This week
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Total Orders</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $totalOrders; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Total Sales</div>
                            <div class="card-body">
                                <h5 class="card-title">Rs. <?php echo number_format($totalSales, 2); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Total Users</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $totalUsers; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">Total Products</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $totalProducts; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <?php include './../../components/admin/footer.php'; ?>
        </div>
    </div>


    <?php include './../../components/admin/scripts.php'; ?>
</body>

</html>