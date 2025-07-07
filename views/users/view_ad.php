<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['id'] ?? null;

require_once __DIR__ . "./../../service/CategoryService.php";
require_once __DIR__ . "./../../service/AdService.php";

if (!$id) {
    // Redirect or show error if no ID provided
    header("Location: ./me.php");
    exit();
}

$ad = findAdById($id);
if (!$ad) {
    // Ad not found
    echo "<p>Ad not found.</p>";
    exit();
}

$categories = findAllCategories();

// Get category name for ad's category id
$categoryName = '';
foreach ($categories as $cat) {
    if ($cat['id'] == $ad['category']) {
        $categoryName = $cat['name'];
        break;
    }
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
                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <h1 class="h3 text-gray-800">Ad Details</h1>
                        <a href="./me.php" class="btn btn-secondary">Back to My Ads</a>
                    </div>

                    <div class="card shadow mb-4 mx-auto" style="max-width: 600px;">
                        <div class="card-body text-center">

                            <?php
                            $imagePath = $ad['image'] ?? '';
                            $imageSrc = $imagePath && file_exists(__DIR__ . "/../../" . $imagePath)
                                ? "../../" . $imagePath
                                : "https://placehold.co/600x400/EEE/31343C?text=No+Image";
                            ?>
                            <img src="<?= htmlspecialchars($imageSrc) ?>" alt="Ad Image" class="img-fluid rounded mb-4" style="max-height:300px;">

                            <h3><?= htmlspecialchars($ad['title']) ?></h3>

                            <p class="text-left">
                                <strong>Description:</strong><br>
                                <?= nl2br(htmlspecialchars($ad['description'])) ?>
                            </p>

                            <p class="text-left mb-1"><strong>Price:</strong> $<?= htmlspecialchars($ad['price']) ?></p>
                            <p class="text-left mb-1"><strong>Location:</strong> <?= htmlspecialchars($ad['contact_location']) ?></p>
                            <p class="text-left mb-1"><strong>Contact Email:</strong> <?= htmlspecialchars($ad['contact_email']) ?></p>
                            <p class="text-left mb-1"><strong>Category:</strong> <?= htmlspecialchars($categoryName) ?></p>
                            <p class="text-left mb-1"><strong>Published:</strong> <?= $ad['published'] ? 'Yes' : 'No' ?></p>
                            <p class="text-left mb-1"><strong>Sponsored:</strong> <?= $ad['sponsored'] ? 'Yes' : 'No' ?></p>
                            <p class="text-left mb-1"><strong>Created At:</strong> <?= htmlspecialchars($ad['created_at']) ?></p>
                            <div class="text-center">
                                <a href="/classified-ads/views/users/update_ad.php?id=<?= htmlspecialchars($ad['id']) ?>" class="btn btn-primary">Edit Ad</a>
                                <a href="/classified-ads/views/users/me.php" class="btn btn-secondary ml-2">Back to My Ads</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
            <!-- End of Main Content -->

            <?php require_once __DIR__ . './../../templates/footer.php'; ?>