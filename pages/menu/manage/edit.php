<?php
require_once "./../../../config.php";
session_start();

$menuItemId = $_GET['id'];

// Fetch menu item details
$result = $database->query("SELECT * FROM menu_items WHERE id = '$menuItemId'");
$menuItem = $result->fetch_assoc();

if (!$menuItem) {
    $_SESSION['message'] = "Menu item not found.";
    $_SESSION['message_type'] = "danger";
    header("Location: view.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './../../../components/admin/head.php'; ?>

<body>

    <?php include './../../../components/admin/navbar.php'; ?>

        <div class="row">
            <?php include './../../../components/admin/sidebar.php'; ?>

            <form action="process.php?update&id=<?php echo $menuItemId; ?>" method="POST" enctype="multipart/form-data">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Menu Item Management</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                    Update Menu Item
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

                    <input type="hidden" name="menu_item_id" value="<?php echo $menuItem['id']; ?>">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $menuItem['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required><?php echo $menuItem['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $menuItem['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <input type="hidden" name="existing_image" value="<?php echo $menuItem['image']; ?>">
                    </div>

                </main>
            </form>
        </div>
   

    <?php include './../../../components/admin/footer.php'; ?>
    <?php include './../../../components/admin/scripts.php'; ?>
</body>

</html>