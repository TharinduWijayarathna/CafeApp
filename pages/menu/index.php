<?php
require_once "./../../config.php";
?>

<!doctype html>
<html lang="en">

<?php include './../../components/public/head.php'; ?>

<body>

    <div class="container">
        <?php include './../../components/public/navbar.php'; ?>
    </div>

    <main class="container">
        <!-- Search Bar -->
        <section class="search-bar-section py-3">
            <div class="container">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search menu..." aria-label="Search" id="menuSearchInput">
                    <button class="btn btn-outline-success" type="button">Search</button> <!-- Changed type to button -->
                </form>
            </div>
        </section>

        <!-- Menu Section -->
        <section class="menu-section py-5">
            <div class="container">
                <h2 class="text-center">Our Menu</h2>
                <div class="row" id="menuItems">
                    <?php
                    // SQL query to select all menu items
                    $sql = "SELECT * FROM menu_items";
                    $result = $database->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img src="/pages/menu/manage/uploads/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['name'] ?></h5>
                                        <p class="card-text"><?= $row['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No menu items found.";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <?php include './../../components/public/footer.php'; ?>
    <?php include './../../components/public/scripts.php'; ?>

    <script>
        // JavaScript for search functionality
        document.addEventListener('DOMContentLoaded', function() {
            var menuSearchInput = document.getElementById('menuSearchInput');
            var menuItems = document.querySelectorAll('.card');

            menuSearchInput.addEventListener('input', function() {
                var searchTerm = this.value.trim().toLowerCase();

                menuItems.forEach(function(item) {
                    var title = item.querySelector('.card-title').textContent.trim().toLowerCase();
                    var description = item.querySelector('.card-text').textContent.trim().toLowerCase();

                    if (title.includes(searchTerm) || description.includes(searchTerm)) {
                        item.style.display = 'block'; // Show matching items
                    } else {
                        item.style.display = 'none'; // Hide non-matching items
                    }
                });
            });
        });
    </script>
</body>

</html>
