<?php
require_once './../../config.php';
session_start();

// Fetch categories
$categoryResult = $database->query("SELECT * FROM categories");
$categories = $categoryResult->fetch_all(MYSQLI_ASSOC);

// Fetch menu highlights
$menuResult = $database->query("SELECT * FROM menu_items LIMIT 4");
$menuItems = $menuResult->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<?php include './../../components/public/head.php'; ?>

<body>

    <div class="container">

        <?php include './../../components/public/navbar.php'; ?>

    </div>

    <main class="container">

        <?php include './../../components/public/slider.php'; ?>

        <div class="row mb-2">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="mt-4 mb-4 text-secondary">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                    <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>
        </div>

        <!-- Food Categories -->
        <section class="food-categories-section py-5">
            <div class="container">
                <h2 class="text-center mb-4">Food Categories</h2>
                <div class="row">
                    <?php foreach ($categories as $category) : ?>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                           
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($category['name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($category['description']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <!-- Menu Highlights -->
        <section class="menu-highlights-section py-5">
            <div class="container">
                <h2 class="text-center mb-4">Menu Highlights</h2>
                <div class="row">
                    <?php foreach ($menuItems as $menuItem) : ?>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <img src="/pages/menu/manage/uploads/<?php echo htmlspecialchars($menuItem['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($menuItem['name']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($menuItem['name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($menuItem['description']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="gallery-section py-5">
            <div class="container">
                <h2 class="text-center mb-4">Gallery</h2>
                <div class="row">
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 1">
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 2">
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 3">
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 1">
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 2">
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 3">
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 2">
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/300" class="img-fluid mb-4" alt="Gallery image 3">
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include './../../components/public/footer.php'; ?>


    <?php include './../../components/public/scripts.php'; ?>
</body>

</html>
