<?php
session_start();
$error = $_SESSION['ad_error'] ?? '';
unset($_SESSION['ad_error']);

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['id'];

require_once __DIR__ . "./../../service/CategoryService.php";
require_once __DIR__ . "./../../service/AdService.php"; 

$ad = findAdById($id);

// Redirect if ad not found
if (!$ad) {
    $_SESSION['ad_error'] = 'Ad not found.';
    header('Location: /classified-ads/public/index.php');
    exit;
}
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
                        <h1 class="h3 text-gray-800">Delete Ad</h1>
                    </div>

                    <!-- Delete Confirmation Card -->
                    <div class="card shadow mb-4 mx-auto" style="max-width: 600px;">
                        <div class="card-header bg-danger text-white">
                            <h5 class="m-0"><i class="fas fa-exclamation-triangle"></i> Confirm Deletion</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning" role="alert">
                                <strong>Warning:</strong> This action cannot be undone. Are you sure you want to delete this ad?
                            </div>

                            <!-- Ad Details Display (Read-only) -->
                            <div class="mb-4">
                                <h6 class="font-weight-bold">Ad Details:</h6>
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="font-weight-bold">Title:</td>
                                        <td><?= htmlspecialchars($ad['title']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Description:</td>
                                        <td><?= nl2br(htmlspecialchars($ad['description'])) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Price:</td>
                                        <td>$<?= htmlspecialchars($ad['price']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Contact Location:</td>
                                        <td><?= htmlspecialchars($ad['contact_location']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Contact Email:</td>
                                        <td><?= htmlspecialchars($ad['contact_email']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Category:</td>
                                        <td><?= htmlspecialchars($ad['category']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Published:</td>
                                        <td><?= $ad['published'] ? 'Yes' : 'No' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Sponsored:</td>
                                        <td><?= $ad['sponsored'] ? 'Yes' : 'No' ?></td>
                                    </tr>
                                    <?php if (isset($ad['created_at'])): ?>
                                    <tr>
                                        <td class="font-weight-bold">Created At:</td>
                                        <td><?= htmlspecialchars($ad['created_at']) ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </table>
                            </div>

                            <!-- Delete Form -->
                            <form method="POST" action="./../../actions/AdAction.php">
                                <input name="id" value="<?= htmlspecialchars($ad['id']) ?>" type="hidden">
                                
                                <div class="d-flex justify-content-between">
                                    <a href="me.php" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Cancel
                                    </a>
                                    <button type="submit" name="action" value="delete_ad" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Delete Ad
                                    </button>
                                </div>
                            </form>

                            <?php if ($error): ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    <?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
            <!-- End of Main Content -->

            <?php require_once __DIR__ . './../../templates/footer.php'; ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- JavaScript for additional confirmation -->
    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        if (!confirm('Are you absolutely sure you want to delete this ad? This action cannot be undone.')) {
            e.preventDefault();
        }
    });
    </script>

</body>
</html>