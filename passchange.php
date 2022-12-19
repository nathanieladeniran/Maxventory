<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Update Password"; ?>
    <?php include('partial/header.part.php') ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('partial/navbar.part.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <?php include('partial/topbar.part.php') ?>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$pageTitle ?></h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">      
                        <?php $staff = new StaffController(); $staff->showStaffs(); ?>                  
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Change Password</div>
                                                <div class="p-5">                                                    
                                                    <form name="cForm" id="cForm" class="book" method="post" enctype="multipart/form-data">                                                        
                                                        <div class="form-group row">
                                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                                <input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="Type your current password" required />
                                                                <input type="hidden" class="form-control" name="userid" id="userid" value="<?=$_SESSION['userid'] ?>" placeholder="" required />
                                                                <input type="hidden" class="form-control" name="currentpass" id="currentpass" value="<?=$_SESSION['password'] ?>" placeholder="" required />
                                                                <small class="text-danger">This field is compulsory</small>            
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Desired Password" required />
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password" required />
                                                                <small class="text-danger" id="msg">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                      
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="passBut">
                                                           Update Password
                                                        </button>
                                                        
                                                    </form>                            
                                                </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                        

                        
                    </div>

                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>MAXAPP</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('partial/footer.part.php') ?>
    <script src="js/updatePassword.js"></script>


</body>

</html>