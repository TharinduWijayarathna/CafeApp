<!doctype html>
<html lang="en">

<?php include './../../components/public/head.php'; ?>

<body>

    <div class="container">
        <?php include './../../components/public/navbar.php'; ?>
    </div>

    <main class="container">

        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Parking</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Parking Slot</h2>
            </div>
        </div>


        <div class="container">
            <div class="row">

                <?php
                // Simulated data for parking slots
                $parking_slots = [
                    ['id' => 1, 'status' => 'available', 'color' => 'green'],
                    ['id' => 2, 'status' => 'occupied', 'color' => 'red'],
                    ['id' => 3, 'status' => 'available', 'color' => 'yellow'],
                    ['id' => 4, 'status' => 'available', 'color' => 'green'],
                    ['id' => 5, 'status' => 'occupied', 'color' => 'red'],
                    ['id' => 6, 'status' => 'available', 'color' => 'green'],
                    ['id' => 7, 'status' => 'available', 'color' => 'green'],
                    ['id' => 8, 'status' => 'occupied', 'color' => 'red'],
                    ['id' => 9, 'status' => 'available', 'color' => 'yellow'],
                    ['id' => 10, 'status' => 'available', 'color' => 'green'],
                    ['id' => 11, 'status' => 'occupied', 'color' => 'red'],
                    ['id' => 12, 'status' => 'available', 'color' => 'green']
                ];

                foreach ($parking_slots as $slot) {
                    $slot_id = $slot['id'];
                    $status = $slot['status'];
                    $color = $slot['color'];

                    $svg_fill = ($status == 'available') ? $color : 'gray';
                    $slot_number = "(" . $slot_id . ")";
                ?>

                    <div class="col-1 text-center">
                        <div class="p-2">
                            <svg width="75" height="75" viewBox="0 0 24 24" fill="<?= $svg_fill ?>" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 11V16H20V11L17 5H7L4 11ZM18.618 17H5.382L4.5 18H19.5L18.618 17ZM19 19H5V20H19V19Z" />
                            </svg>
                            <p>&nbsp;&nbsp;<?= $slot_number ?></p>&nbsp;&nbsp;
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

    </main>

    <?php include './../../components/public/footer.php'; ?>
    <?php include './../../components/public/scripts.php'; ?>

</body>

</html>