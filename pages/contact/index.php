<!doctype html>
<html lang="en">

<?php include './../../components/public/head.php'; ?>

<body>

    <div class="container">

        <?php include './../../components/public/navbar.php'; ?>

    </div>

    <main class="container">

        <div class="row mt-3 mb-3">
            <section class="location-contact-section py-5">
                <div class="container">
                    <h2 class="text-center">Find Us</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Contact Information</h5>
                            <p>Address: 123 Main Street, City</p>
                            <p>Phone: (123) 456-7890</p>
                            <p>Email: info@restaurant.com</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Contact Us</h5>
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <?php include './../../components/public/footer.php'; ?>


    <?php include './../../components/public/scripts.php'; ?>
</body>

</html>