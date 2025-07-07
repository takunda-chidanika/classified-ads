<?php
session_start();
$error = $_SESSION['ad_error'] ?? '';
unset($_SESSION['ad_error']);

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['id'];

require_once __DIR__ . "./../../service/CategoryService.php";
require_once __DIR__ . "./../../service/AdService.php"; 

$categories = findAllCategories();
$ad = findAdById($id);
$category = getCategoryName($ad['category']);

?>
<!-- Header Wrapper -->
<?php require_once __DIR__ . './../../templates/header.php'; ?>
<!-- End Header Wrapper -->

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once __DIR__ . './../../templates/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once __DIR__ . './../../templates/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <h1 class="h3 text-gray-800">Update Ad</h1>
                        <a href="./me.php" class="btn btn-secondary">Back to My Ads</a>
                    </div>

                    <div class="card shadow mb-4 mx-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form method="POST" action="./../../actions/AdAction.php" enctype="multipart/form-data">
                                <input name="id" value="<?= htmlspecialchars($ad['id']) ?>" type="" id="id">
                                <!-- Image Preview -->
                                <div class="form-group text-center mb-4">
                                    <?php
                                    $imagePath = $ad['image'] ?? '';
                                    $imageSrc = $imagePath && file_exists(__DIR__ . "/../../" . $imagePath) ? "../../" . $imagePath : "https://placehold.co/600x400/EEE/31343C?text=No+Image";
                                    ?>
                                    <img src="<?= htmlspecialchars($imageSrc) ?>" alt="Ad Image" class="img-fluid rounded" style="max-height:300px;">
                                </div>

                                <div class="form-group">
                                    <label for="image">Change Image (optional)</label>
                                    <input name="image" type="file" class="form-control-file" id="image" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" value="<?= htmlspecialchars($ad['title']) ?>" type="text" class="form-control" id="title" placeholder="Ad Title" >
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4" placeholder="Ad Description" required><?= htmlspecialchars($ad['description']) ?></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="price">Price</label>
                                        <input name="price" value="<?= htmlspecialchars($ad['price']) ?>" type="number" step="0.01" class="form-control" id="price" placeholder="Price" >
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="published">Published</label>
                                        <select name="published" id="published" class="form-control" >
                                            <option value="1" <?= $ad['published'] == 1 ? 'selected' : '' ?>>Yes</option>
                                            <option value="0" <?= $ad['published'] == 0 ? 'selected' : '' ?>>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sponsored">Sponsored</label>
                                        <select name="sponsored" id="sponsored" class="form-control" >
                                            <option value="1" <?= $ad['sponsored'] == 1 ? 'selected' : '' ?>>Yes</option>
                                            <option value="0" <?= $ad['sponsored'] == 0 ? 'selected' : '' ?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact_location">Contact Location</label>
                                    <input name="contact_location" value="<?= htmlspecialchars($ad['contact_location']) ?>" type="text" class="form-control" id="contact_location" placeholder="Contact Location" >
                                </div>

                                <div class="form-group">
                                    <label for="contact_email">Contact Email</label>
                                    <input name="contact_email" value="<?= htmlspecialchars($ad['contact_email']) ?>" type="email" class="form-control" id="contact_email" placeholder="Contact Email" >
                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control" >
                                        <option value="<?= htmlspecialchars($ad['category']) ?>"><?= htmlspecialchars($category) ?></option>
                                        <?php foreach ($categories as $categoryOption): ?>
                                            <option value="<?= htmlspecialchars($categoryOption['id']) ?>"><?= htmlspecialchars($categoryOption['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <button type="submit" name="action" value="update_ad" class="btn btn-primary btn-user btn-block">
                                    Update Ad
                                </button>
                                <a href="./me.php" class="btn btn-secondary btn-block mt-2">Back to My Ads</a>

                                <?php if ($error): ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?= htmlspecialchars($error) ?>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
            <!-- End of Main Content -->

            <?php require_once __DIR__ . './../../templates/footer.php'; ?>