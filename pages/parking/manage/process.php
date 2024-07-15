<?php
require_once "./../../../config.php";
session_start();

// Create parking slot
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    $slotNumber = $_POST['slot_number'];
    $status = $_POST['status'];

    $sql = "INSERT INTO parking_slots (slot_number, status) VALUES ('$slotNumber', '$status')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Parking slot added successfully.";
        $_SESSION['message_type'] = "success";
        header("Location: /pages/parking/manage");
        exit;
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }
}

// Update parking slot
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    $slotId = $_POST['slot_id'];
    $slotNumber = $_POST['slot_number'];
    $status = $_POST['status'];

    $sql = "UPDATE parking_slots SET slot_number = '$slotNumber', status = '$status' WHERE id = '$slotId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Parking slot updated successfully.";
        $_SESSION['message_type'] = "success";
        header("Location: /pages/parking/manage");
        exit;
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }
}

// Delete parking slot
if (isset($_GET['delete'])) {
    $slotId = $_GET['id'];

    $sql = "DELETE FROM parking_slots WHERE id = '$slotId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Parking slot deleted successfully.";
        $_SESSION['message_type'] = "success";
        header("Location: /pages/parking/manage");
        exit;
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }
}

// Redirect if no action matched
header("Location: /pages/parking/manage");
exit;
