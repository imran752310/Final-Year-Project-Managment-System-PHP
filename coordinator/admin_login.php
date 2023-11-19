<?php
// $conn = mysqli_connect("localhost","root","","ougs");
// session_start();
// ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Test_Phase</title>
    <script src="js/sb-admin-2.js"></script>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <div class="container">
            <a href="../user_login.php" class="btn btn-success float-left">Back To User Login</a>
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 mt-5 pt-5">
                  
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Hi!</strong> invalid User Name or Password
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class=" text-gray-900 mb-4"><b>Admin Login</b></h4>
                                        </div>
                                        <form class="user" action="index.php" method="post">
                                            <div class="form-group">
                                                <label>Admin name:</label>

                                                <input type="text" name="username" class="form-control "
                                                    placeholder="Enter Admin name" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Password :</label>
                                                <input type="password" name="password" class="form-control "
                                                    placeholder="Password">
                                            </div><br>
                                            <button type="submit" name="login_btn"
                                                class="btn btn-primary  btn-block">Login
                                            </button>
                                            <hr>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    </div>
    <!-- End of Content Wrapper -->
</body>

</html>