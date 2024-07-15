<?php
require_once "./../../../config.php";
session_start();

$parkingSlotId = $_GET['id'];

// Fetch parking slot details
$result = $database->query("SELECT * FROM parking_slots WHERE id = '$parkingSlotId'");
$parkingSlot = $result->fetch_assoc();

if (!$parkingSlot) {
    $_SESSION['message'] = "Parking slot not found.";
    $_SESSION['message_type'] = "danger";
    header("Location: view.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './../../../components/admin/head.php'; ?>

<body>

    <?php include './../../../components/admin/navbar.php'; ?>


    <div class="row">
        <?php include './../../../components/admin/sidebar.php'; ?>

        <form action="process.php?update&id=<?php echo $parkingSlotId; ?>" method="POST">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Parking Management</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Update Parking
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

                <input type="hidden" name="slot_id" value="<?php echo $parkingSlotId; ?>">
                <div class="form-group">
                    <label for="slot_number">Slot Number</label>
                    <input type="text" class="form-control" id="slot_number" name="slot_number" value="<?php echo $parkingSlot['slot_number']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Free" <?php if ($parkingSlot['status'] == 'Free') echo 'selected'; ?>>Free</option>
                        <option value="Reserved" <?php if ($parkingSlot['status'] == 'Reserved') echo 'selected'; ?>>Reserved</option>
                        <option value="Parked" <?php if ($parkingSlot['status'] == 'Parked') echo 'selected'; ?>>Parked</option>
                    </select>
                </div>

            </main>
        </form>
    </div>


    <?php include './../../../components/admin/footer.php'; ?>
    <?php include './../../../components/admin/scripts.php'; ?>
</body>

</html>