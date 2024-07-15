
    <?php
    require_once "./../../config.php";

    session_start();

    $userId = $_GET['userId'];

    $sql = "SELECT * FROM users WHERE id = '$userId'";

    $result = $database->query($sql) or die($database->error);

    $row = $result->fetch_row();
    ?>

    <!doctype html>
    <html lang="en">

    <?php include './../../components/admin/head.php'; ?>

    <body>

        <?php include './../../components/admin/navbar.php'; ?>

        <div class="container-fluid">
            <div class="row">

                <?php include './../../components/admin/sidebar.php'; ?>
                <form action="process.php?update=true&fineId=<?= $row[0] ?>" method="post">

                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Edit Banner</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                        Update User
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


                        <div class="row">
                            <div class="col-lg-5 mb-3 d-none">
                                <label for="userId" class="form-label">User ID</label>
                                <input id="userId" name="user_id" type="text" class="form-control" value="<?= $row[0] ?>" readonly required>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" class="form-control" value="<?= $row[1] ?>" required>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input id="firstname" name="first_name" type="text" class="form-control" value="<?= $row[2] ?>" required>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input id="lastname" name="last_name" type="text" class="form-control" value="<?= $row[3] ?>" required>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input id="username" name="username" type="text" class="form-control" value="<?= $row[4] ?>" required>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" max="8" class="form-control">
                            </div>
                        </div>


                    </main>
                </form>

                <?php include './../../components/admin/footer.php'; ?>
            </div>
        </div>


        <?php include './../../components/admin/scripts.php'; ?>
    </body>

    </html>