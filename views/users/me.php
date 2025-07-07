<?php
session_start();
$user = $_SESSION['user'] ?? '';

require_once __DIR__ . "./../../service/AdService.php";
$me_ads = findAllAdsByUser($user['id']);
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
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="create_ad.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Create Ad</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Ads</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($me_ads) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Ads Heading -->                   
                    <h1 class="h5 mb-4 text-gray-600">Posted Ads</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Created At</th>
                                            <th>Title</th>
                                            <th>published</th>
                                            <th>sponsored</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Created At</th>
                                            <th>Title</th>
                                            <th>published</th>
                                            <th>sponsored</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($me_ads as $ad): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($ad['created_at']) ?></td>
                                                <td><?= htmlspecialchars($ad['title']) ?></td>
                                                <td><?= htmlspecialchars($ad['published']) ?></td>
                                                <td><?= htmlspecialchars($ad['sponsored']) ?></td>
                                                <td><?= htmlspecialchars($ad['price']) ?></td>
                                                <td>
                                                    <a href="/classified-ads/views/users/update_ad.php?id=<?= htmlspecialchars($ad['id'])?>">Update</a>
                                                    <a href="/classified-ads/views/users/view_ad.php?id=<?= htmlspecialchars($ad['id'])?>">View</a>
                                                    <a href="/classified-ads/views/users/delete_ad.php?id=<?= htmlspecialchars($ad['id'])?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php require_once __DIR__ . './../../templates/footer.php'; ?>