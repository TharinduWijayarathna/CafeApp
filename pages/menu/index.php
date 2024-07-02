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
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </section>

        <!-- Menu Section -->
        <section class="menu-section py-5">
            <div class="container">
                <h2 class="text-center">Our Menu</h2>
                <div class="row" id="menuItems">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Dish 1">
                            <div class="card-body">
                                <h5 class="card-title">Dish 1</h5>
                                <p class="card-text">Description of dish 1.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Dish 2">
                            <div class="card-body">
                                <h5 class="card-title">Dish 2</h5>
                                <p class="card-text">Description of dish 2.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Dish 3">
                            <div class="card-body">
                                <h5 class="card-title">Dish 3</h5>
                                <p class="card-text">Description of dish 3.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more menu items here -->
                </div>
            </div>
        </section>
    </main>

    <?php include './../../components/public/footer.php'; ?>
    <?php include './../../components/public/scripts.php'; ?>

    <script>
        // JavaScript for search functionality
        document.getElementById('menuSearchInput').addEventListener('input', function () {
            var input = this.value.toLowerCase();
            var menuItems = document.getElementById('menuItems').getElementsByClassName('card');

            Array.from(menuItems).forEach(function (item) {
                var title = item.querySelector('.card-title').textContent.toLowerCase();
                var description = item.querySelector('.card-text').textContent.toLowerCase();
                if (title.includes(input) || description.includes(input)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
