<?php
require_once "./../../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    // Add banner
    $bannerTitle = $_POST['banner_title'];
    $bannerImage = $_FILES['banner_image']['name'];
    $bannerImagePath = 'uploads/' . basename($bannerImage);
    move_uploaded_file($_FILES['banner_image']['tmp_name'], $bannerImagePath);

    $sql = "INSERT INTO banners (title, image) VALUES ('$bannerTitle', '$bannerImage')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Banner added successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/banner");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    // Update banner
    $bannerId = $_POST['banner_id'];
    $bannerTitle = $_POST['banner_title'];
    $bannerImage = $_FILES['banner_image']['name'];
    
    if (!empty($bannerImage)) {
        $bannerImagePath = 'uploads/' . basename($bannerImage);
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $bannerImagePath);
        $sql = "UPDATE banners SET title = '$bannerTitle', image = '$bannerImage' WHERE id = '$bannerId'";
    } else {
        $sql = "UPDATE banners SET title = '$bannerTitle' WHERE id = '$bannerId'";
    }

    try {
        $database->query($sql);

        $_SESSION['message'] = "Banner updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/banner");
}

if (isset($_GET['delete'])) {
    // Delete banner
    $bannerId = $_GET['bannerId'];

    $sql = "DELETE FROM banners WHERE id = '$bannerId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Banner deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /pages/banner");
}
?>
