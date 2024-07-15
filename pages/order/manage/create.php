<?php
require_once "./../../../config.php";
session_start();

// Fetch users
$usersResult = $database->query("SELECT * FROM users");
$users = $usersResult->fetch_all(MYSQLI_ASSOC);

// Fetch menu items
$menuItemsResult = $database->query("SELECT * FROM menu_items");
$menuItems = $menuItemsResult->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<?php include './../../../components/admin/head.php'; ?>

<body>

    <?php include './../../../components/admin/navbar.php'; ?>


    <div class="row">
        <?php include './../../../components/admin/sidebar.php'; ?>
        <form action="process.php?create" method="POST">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Order Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Add Order
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


                <div class="form-group">
                    <label for="table_number">Table Number</label>
                    <input type="number" class="form-control" id="table_number" name="table_number" required>
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user['id']; ?>">
                                <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Pending">Pending</option>
                        <option value="Complete">Complete</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu_items">Menu Items</label>
                    <?php foreach ($menuItems as $menuItem) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="menu_items[<?php echo $menuItem['id']; ?>]" value="1" id="menuItem<?php echo $menuItem['id']; ?>">
                            <label class="form-check-label" for="menuItem<?php echo $menuItem['id']; ?>">
                                <?php echo $menuItem['name']; ?> - $<?php echo $menuItem['price']; ?>
                            </label>
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