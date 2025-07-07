<?php
session_start();
$user = $_SESSION['user'] ?? '';

require_once __DIR__ . "./../../service/UserService.php";
$user = findUserByEmail($user['username']);
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
            <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
            <a href="create_ad.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Create Ad</a>
          </div>

          <!-- Recent Ads Heading -->
          <h1 class="h5 mb-4 text-gray-600">Posted Ads</h1>
          <div class="card o-hidden border-0 shadow-lg my-5 col-lg-12">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Regoster an account</h1>
                    </div>
                    <form class="user" method="POST" action="./../../actions/UserAction.php">
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input name="firstname" value="<?= htmlspecialchars($user['firstname']) ?>" type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="First Name" required>
                        </div>
                        <div class="col-sm-6">
                          <input name="lastname" value="<?= htmlspecialchars($user['lastname']) ?>" type="text" class="form-control form-control-user" id="exampleLastName"
                            placeholder="Last Name" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="email" value="<?= htmlspecialchars($user['username']) ?>" type="email" class="form-control form-control-user" id="exampleInputEmail"
                          placeholder="Email Address" required>
                      </div>
                      <div class="col-sm-6">
                        <a href="/classified-ads/views/users/update.php" class="btn btn-primary btn-user">
                          Edit
                        </a>
                        <a href="" class="btn btn btn-secondary  btn-user ">
                          Back
                        </a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php require_once __DIR__ . './../../templates/footer.php'; ?>