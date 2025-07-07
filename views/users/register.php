<?php
session_start();
$error = $_SESSION['register_error'] ?? '';
unset($_SESSION['register_error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="./../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <!-- Toast container -->
    <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="30000" data-bs-autohide="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>



    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-12">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register an account</h1>
                            </div>
                            <form class="user" method="POST" action="./../../actions/UserAction.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="firstname" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="lastname" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="rePassword" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <button type="submit" name="action" value="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                                <?php if ($error): ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?= htmlspecialchars($error) ?>
                                    </div>
                                <?php endif; ?>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/classified-ads/views/users/forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/classified-ads/views/users/login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>  

</body>

</html>