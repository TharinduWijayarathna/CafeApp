<?php
require_once "./../../../config.php";
session_start();

$orderId = $_GET['id'];

// Fetch order details
$orderResult = $database->query("SELECT * FROM orders WHERE id = '$orderId'");
$order = $orderResult->fetch_assoc();

if (!$order) {
    $_SESSION['message'] = "Order not found.";
    $_SESSION['message_type'] = "danger";
    header("Location: /pages/order/manage");
    exit;
}

// Fetch users
$usersResult = $database->query("SELECT * FROM users");
$users = $usersResult->fetch_all(MYSQLI_ASSOC);

// Fetch menu items
$menuItemsResult = $database->query("SELECT * FROM menu_items");
$menuItems = $menuItemsResult->fetch_all(MYSQLI_ASSOC);

// Fetch order items
$orderItemsResult = $database->query("SELECT * FROM order_items WHERE order_id = '$orderId'");
$orderItems = $orderItemsResult->fetch_all(MYSQLI_ASSOC);

$orderItemsArray = [];
foreach ($orderItems as $item) {
    $orderItemsArray[$item['menu_item_id']] = $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './../../../components/admin/head.php'; ?>

<body>

    <?php include './../../../components/admin/navbar.php'; ?>


    <div class="row">
        <?php include './../../../components/admin/sidebar.php'; ?>
        <form action="process.php?update" method="POST">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Order Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Update Order
                            </button>
                            <a href="./index.php" class="btn btn-sm btn-outline-secondary">
                                Back
                            </a>
                        </div>

                    </div>
                </div>

                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
                        <?php echo $_SESSION['message'];
                        unset($_SESSION['message']); ?>
                    </div>
                <?php endif; ?>


                <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
                <div class="form-group">
                    <label for="table_number">Table Number</label>
                    <input type="number" class="form-control" id="table_number" name="table_number" value="<?php echo $order['table_number']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user['id']; ?>" <?php if ($order['user_id'] == $user['id']) echo 'selected'; ?>>
                                <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Pending" <?php if ($order['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Complete" <?php if ($order['status'] == 'Complete') echo 'selected'; ?>>Complete</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu_items">Menu Items</label>
                    <?php foreach ($menuItems as $menuItem) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="menu_items[<?php echo $menuItem['id']; ?>]" value="1" id="menuItem<?php echo $menuItem['id']; ?>" <?php if (isset($orderItemsArray[$menuItem['id']])) echo 'checked'; ?>>
                            <label class="form-check-label" for="menuItem<?php echo $menuItem['id']; ?>">
                                <?php echo $menuItem['name']; ?> - $<?php echo $menuItem['price']; ?>
                            </label>
                            <?php if (isset($orderItemsArray[$menuItem['id']])) : ?>
                                <input type="number" class="form-control" name="menu_items[<?php echo $menuItem['id']; ?>]" value="<?php echo $orderItemsArray[$menuItem['id']]; ?>">
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            
            </main>
        </form>
    </div>


    <?php include './../../../components/admin/footer.php'; ?>
    <?php include './../../../components/admin/scripts.php'; ?>
</body>

</html>