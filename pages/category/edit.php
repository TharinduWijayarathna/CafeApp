<?php
require_once "./../../config.php";
session_start();

$categoryId = $_GET['id'];

// Fetch category details
$result = $database->query("SELECT * FROM categories WHERE id = '$categoryId'");
$category = $result->fetch_assoc();

if (!$category) {
    $_SESSION['message'] = "Category not found.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './../../components/admin/head.php'; ?>

<body>

    <?php include './../../components/admin/navbar.php'; ?>


    <div class="row">
        <?php include './../../components/admin/sidebar.php'; ?>

        <form action="./../../pages/category/process.php?update&id=<?php echo $categoryId; ?>" method="POST">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Category Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Update Category
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
                    <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category['name']; ?>" required>
                </div>

            </main>
        </form>
    </div>


    <?php include './../../components/admin/footer.php'; ?>
    <?php include './../../components/admin/scripts.php'; ?>
</body>

</html>