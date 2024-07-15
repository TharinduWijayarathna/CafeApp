<?php
require_once "./../../../config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    // Create Order
    $tableNumber = $_POST['table_number'];
    $userId = $_POST['user_id'];
    $status = $_POST['status'];
    $menuItems = $_POST['menu_items']; // array of menu_item_id => quantity

    $sql = "INSERT INTO orders (table_number, user_id, status) VALUES ('$tableNumber', '$userId', '$status')";

    try {
        $database->query($sql);
        $orderId = $database->insert_id;

        foreach ($menuItems as $menuItemId => $quantity) {
            $database->query("INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES ('$orderId', '$menuItemId', '$quantity')");
        }

        $_SESSION['message'] = "Order created successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/order/manage");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    // Update Order
    $orderId = $_POST['order_id'];
    $tableNumber = $_POST['table_number'];
    $userId = $_POST['user_id'];
    $status = $_POST['status'];
    $menuItems = $_POST['menu_items']; // array of menu_item_id => quantity

    $sql = "UPDATE orders SET table_number = '$tableNumber', user_id = '$userId', status = '$status' WHERE id = '$orderId'";

    try {
        $database->query($sql);

        // Update order items
        $database->query("DELETE FROM order_items WHERE order_id = '$orderId'");
        foreach ($menuItems as $menuItemId => $quantity) {
            $database->query("INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES ('$orderId', '$menuItemId', '$quantity')");
        }

        $_SESSION['message'] = "Order updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/order/manage");
    exit;
}

if (isset($_GET['delete'])) {
    $orderId = $_GET['id'];

    try {
        $database->query("DELETE FROM order_items WHERE order_id = '$orderId'");
        $database->query("DELETE FROM orders WHERE id = '$orderId'");

        $_SESSION['message'] = "Order deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/order/manage");
    exit;
}
?>
