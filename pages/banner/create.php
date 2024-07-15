<?php

require_once "./../../config.php";

?>

<!doctype html>
<html lang="en">

<?php include './../../components/admin/head.php'; ?>

<body>

    <?php include './../../components/admin/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php include './../../components/admin/sidebar.php'; ?>
            <form action="process.php?create" method="POST" enctype="multipart/form-data" class="mb-3">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Create Banner</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                    Create Banner
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
                        <label for="banner_title">Banner Title</label>
                        <input type="text" class="form-control" id="banner_title" name="banner_title" required>
                    </div>
                    <div class="form-group">
                        <label for="banner_image">Banner Image</label>
                        <input type="file" class="form-control" id="banner_image" name="banner_image" required>
                    </div>



                </main>
            </form>

            <?php include './../../components/admin/footer.php'; ?>
        </div>
    </div>


    <?php include './../../components/admin/scripts.php'; ?>
</body>

</html>