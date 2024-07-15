<!doctype html>
<html lang="en">

<?php include './../../components/public/head.php'; ?>

<body>

    <div class="container">
        <?php include './../../components/public/navbar.php'; ?>
    </div>

    <main class="container">
        <section class="booking-section py-5">
            <div class="container">
                <h2 class="text-center mb-4">Book a Table</h2>
                <div class="row mt-5 mb-5">
                    <div class="col-md-6 mb-3">
                        <h3>About Our Booking</h3>
                        <p>Welcome to our restaurant booking page! Here, you can easily reserve a table for your desired date and time. Whether you're planning a romantic dinner, a family gathering, or a business meeting, we are here to ensure you have a wonderful dining experience. Please fill out the form with the necessary details, and we'll take care of the rest. We look forward to serving you!</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="guests" class="form-label">Number of Guests</label>
                                    <input type="number" class="form-control" id="guests" min="1" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="time" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include './../../components/public/footer.php'; ?>
    <?php include './../../components/public/scripts.php'; ?>
</body>

</html>
