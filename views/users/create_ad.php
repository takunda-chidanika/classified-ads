<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$error = $_SESSION['ad_error'] ?? '';
unset($_SESSION['ad_error']);

require_once __DIR__ . "./../../service/CategoryService.php";
$categories = findAllCategories();
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
                    <div class="d-flex justify-content-center mb-4">
                        <h1 class="h3 text-gray-800">Create Ad</h1>
                    </div>

                    <div class="card shadow mb-4 mx-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form method="POST" action="./../../actions/AdAction.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="image">Ad Image</label>
                                    <input type="file" name="image" class="form-control" id="image" accept="image/*" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Ad Title" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4" placeholder="Ad Description" required></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="price">Price</label>
                                        <input name="price" type="number" step="0.01" class="form-control" id="price" placeholder="Price" required>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="published">Published</label>
                                        <select name="published" id="published" class="form-control" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sponsored">Sponsored</label>
                                        <select name="sponsored" id="sponsored" class="form-control" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact_location">Contact Location</label>
                                    <input name="contact_location" type="text" class="form-control" id="contact_location" placeholder="Contact Location" required>
                                </div>

                                <div class="form-group">
                                    <label for="contact_email">Contact Email</label>
                                    <input name="contact_email" type="email" class="form-control" id="contact_email" placeholder="Contact Email" required>
                                </div>

                                <div class="form-group">
                                    <select name="category" class="form-control" required>
                                        <option value="" disabled selected>Select a category</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value=<?= htmlspecialchars($category['id']) ?>><?= htmlspecialchars($category['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" name="action" value="create_ad" class="btn btn-primary btn-user btn-block">
                                    Submit Ad
                                </button>
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