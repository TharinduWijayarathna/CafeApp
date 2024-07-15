<?php
require_once "./../../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    // Add category
    $categoryName = $_POST['category_name'];

    $sql = "INSERT INTO categories (name) VALUES ('$categoryName')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Category added successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/category");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    // Update category
    $categoryId = $_POST['category_id'];
    $categoryName = $_POST['category_name'];

    $sql = "UPDATE categories SET name = '$categoryName' WHERE id = '$categoryId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Category updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/category");
}

if (isset($_GET['delete'])) {
    // Delete category
    $categoryId = $_GET['categoryId'];

    $sql = "DELETE FROM categories WHERE id = '$categoryId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Category deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/category");
}
?>
