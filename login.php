<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Maxapp Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/maxapp.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background-image: url('img/background.jpeg');">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top:10%">

            <div class="col-xl-6 col-lg-6 col-md-6">                
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                    <img src="img/logo.jpeg" />
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form name="loginForm" id="loginForm" class="user" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="loginid" id="loginid" aria-describedby="loginidHelp" placeholder="Supply your Login ID (Email or Username)..." required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="loginpass" id="loginpass" placeholder="Password" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                               
                                            </div>
                                        </div>
                                        <div id="message"></div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" id="loginBut">
                                            Login
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/maxapp.min.js"></script>
    <script src="js/authenticate.js"></script>

</body>

</html>