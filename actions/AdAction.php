<?php
require_once __DIR__ . "./../service/AdService.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {

        // Handle Ad Creation
        case 'create_ad':
            session_start();

            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = trim($_POST['price'] ?? '');
            $published = isset($_POST['published']) ? 1 : 0;
            $sponsored = isset($_POST['sponsored']) ? 1 : 0;
            $contact_location = trim($_POST['contact_location'] ?? '');
            $contact_email = trim($_POST['contact_email'] ?? '');
            $user_id = $_SESSION['user']['id'] ?? null;
            $category = $_POST['category'] ?? '';

            echo $description;


            // ✅ Handle file upload
            $image_url = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = __DIR__ . '/../uploads/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                $tmp_name = $_FILES['image']['tmp_name'];
                $basename = basename($_FILES['image']['name']);
                $extension = strtolower(pathinfo($basename, PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (!in_array($extension, $allowed)) {
                    $_SESSION['ad_error'] = "Invalid image file type.";
                    header("Location: ./../views/users/create_ad.php");
                    exit();
                }

                $new_name = uniqid("ad_") . '.' . $extension;
                $destination = $upload_dir . $new_name;

                if (!move_uploaded_file($tmp_name, $destination)) {
                    $_SESSION['ad_error'] = "Failed to upload image.";
                    header("Location: ./../views/users/create_ad.php");
                    exit();
                }

                $image_url = '/uploads/' . $new_name;
            }

            // Basic validations
            if (!$user_id) {
                $_SESSION['ad_error'] = "You must be logged in to create an ad.";
                header("Location: ./../views/users/create_ad.php");
                exit();
            }

            if (empty($title) || empty($description) || empty($category)) {
                $_SESSION['ad_error'] = "Title, description and category are required.";
                header("Location: ./../views/users/create_ad.php");
                exit();
            }

            if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['ad_error'] = "Invalid contact email.";
                header("Location: ./../views/users/create_ad.php");
                exit();
            }

            // Call service function to create the ad
            $result = createAd($image_url, $title, $description, $price, $published, $sponsored, $contact_location, $contact_email, $user_id, $category);

            if ($result) {
                $_SESSION['ad_success'] = "Ad created successfully!";
                header("Location: ./../views/users/me.php");
                exit();
            } else {
                $_SESSION['ad_error'] = "Failed to create ad. Please try again.";
                header("Location: ./../views/users/create_ad.php");
                exit();
            }
            break;

        // Handle User Login
        case 'update_ad':
            session_start();

            $id = trim($_POST['id'] ?? '');
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = trim($_POST['price'] ?? '');
            $published = isset($_POST['published']) ? 1 : 0;
            $sponsored = isset($_POST['sponsored']) ? 1 : 0;
            $contact_location = trim($_POST['contact_location'] ?? '');
            $contact_email = trim($_POST['contact_email'] ?? '');
            $user_id = $_SESSION['user']['id'] ?? null;
            $category = $_POST['category'] ?? '';

            echo $description;

            // Basic validations
            if (!$user_id) {
                $_SESSION['ad_error'] = "You must be logged in to update an ad.";
                header("Location: ./../views/users/update_ad.php?id=$id");
                exit();
            }

            if (empty($title) || empty($description) || empty($category)) {
                $_SESSION['ad_error'] = "Title, description and category are required.";
                header("Location: ./../views/users/update_ad.php?id=$id");
                exit();
            }

            if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['ad_error'] = "Invalid contact email.";
                header("Location: ./../views/users/update_ad.php?id=$id");
                exit();
            }

            // Call service function to create the ad
            $result = updateAd($id, $title, $description, $price, $published, $sponsored, $contact_location, $contact_email, $category);

            if ($result) {
                $_SESSION['ad_success'] = "Ad created successfully!";
                header("Location: ./../views/users/me.php");
                exit();
            } else {
                $_SESSION['ad_error'] = "Failed to create ad. Please try again.";
                header("Location: ./../views/users/update_ad.php?id=$id");
                exit();
            }
            break;

        // Handle Delete Ad
        case 'delete_ad':
            session_start();

            $id = trim($_POST['id'] ?? '');
            $user_id = $_SESSION['user']['id'] ?? null;

            // Basic validations
            if (!$user_id) {
                $_SESSION['ad_error'] = "You must be logged in to delete an ad.";
                header("Location: ./../views/users/delete_ad.php");
                exit();
            }

            // Call service function to create the ad
            $result = deleteAdByid($id);

            if ($result) {
                $_SESSION['ad_success'] = "Ad created successfully!";
                header("Location: ./../views/users/me.php");
                exit();
            } else {
                $_SESSION['ad_error'] = "Failed to create ad. Please try again.";
                header("Location: ./../views/users/delete_ad.php");
                exit();
            }
            break;
            break;

        default:
            die("Invalid action.");
    }
}
