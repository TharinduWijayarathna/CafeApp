<!DOCTYPE html>
<html lang="en">

<?php include './../../../components/admin/head.php'; ?>

<body>

    <?php include './../../../components/admin/navbar.php'; ?>


    <div class="row">
        <?php include './../../../components/admin/sidebar.php'; ?>

        <form action="process.php?create" method="POST" enctype="multipart/form-data">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Menu Item Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Create Menu Item
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
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>

            </main>
        </form>
    </div>

    <?php include './../../../components/admin/footer.php'; ?>
    <?php include './../../../components/admin/scripts.php'; ?>
</body>

</html>