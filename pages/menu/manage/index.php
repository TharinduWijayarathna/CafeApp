<?php
require_once "./../../../config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include './../../../components/admin/head.php'; ?>

<body>

    <?php include './../../../components/admin/navbar.php'; ?>


    <div class="row">
        <?php include './../../../components/admin/sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Menu Item Management</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="./../../pages/menu/manage/create.php" class="btn btn-sm btn-outline-secondary">
                            Add Menu Item
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

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $database->query("SELECT * FROM menu_items");
                        while ($menuItem = $result->fetch_assoc()) :
                        ?>
                            <tr>
                                <td><?php echo $menuItem['id']; ?></td>
                                <td><?php echo $menuItem['name']; ?></td>
                                <td><?php echo $menuItem['description']; ?></td>
                                <td><?php echo $menuItem['price']; ?></td>
                                <td><img src="./../../pages/menu/manage/uploads/<?php echo $menuItem['image']; ?>" alt="<?php echo $menuItem['name']; ?>" width="50"></td>
                                <td>
                                    <a href="./../../pages/menu/manage/edit.php?id=<?php echo $menuItem['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="./../../pages/menu/manage/process.php?delete&id=<?php echo $menuItem['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>


    <?php include './../../../components/admin/footer.php'; ?>
    <?php include './../../../components/admin/scripts.php'; ?>
</body>

</html>