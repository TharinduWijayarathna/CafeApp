<?php
require_once "./../../../config.php";
session_start();

function uploadImage($file) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['message'] = "File is not an image.";
        $_SESSION['message_type'] = "danger";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $_SESSION['message'] = "Sorry, file already exists.";
        $_SESSION['message_type'] = "danger";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 500000) {
        $_SESSION['message'] = "Sorry, your file is too large.";
        $_SESSION['message_type'] = "danger";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $_SESSION['message_type'] = "danger";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return false;
    } else {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return basename($file["name"]);
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
            $_SESSION['message_type'] = "danger";
            return false;
        }
    }
}

// Create menu item
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = uploadImage($_FILES['image']);

    if ($image) {
        $sql = "INSERT INTO menu_items (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";

        try {
            $database->query($sql);

            $_SESSION['message'] = "Menu item added successfully.";
            $_SESSION['message_type'] = "success";
            header("Location: /pages/menu/manage");
            exit;
        } catch (Exception $e) {
            $_SESSION['message'] = $e->getMessage();
            $_SESSION['message_type'] = "danger";
        }
    }
}

// Update menu item
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    $menuItemId = $_POST['menu_item_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = !empty($_FILES['image']['name']) ? uploadImage($_FILES['image']) : $_POST['existing_image'];

    $sql = "UPDATE menu_items SET name = '$name', description = '$description', price = '$price', image = '$image' WHERE id = '$menuItemId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Menu item updated successfully.";
        $_SESSION['message_type'] = "success";
        header("Location: /pages/menu/manage");
        exit;
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }
}

// Delete menu item
if (isset($_GET['delete'])) {
    $menuItemId = $_GET['id'];

    //delete image
    $result = $database->query("SELECT image FROM menu_items WHERE id = '$menuItemId'");
    $menuItem = $result->fetch_assoc();

    if ($menuItem['image']) {
        unlink("uploads/" . $menuItem['image']);
    }

    $sql = "DELETE FROM menu_items WHERE id = '$menuItemId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Menu item deleted successfully.";
        $_SESSION['message_type'] = "success";
        header("Location: /pages/menu/manage");
        exit;
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }
}

// Redirect if no action matched
header("Location: /pages/menu/manage");
exit;
?>
