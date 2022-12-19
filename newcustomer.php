<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Add New Customer"; ?>
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
                        <a href="viewcustomer" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Customer</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                New Customer</div>
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Human Resources" || $_SESSION['role'] == "Accountant"){ ?>
                                                <div class="p-5">                                                    
                                                    <form name="custForm" id="custForm" class="book" method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="custname" id="custname" placeholder="Name of Customer or Organization" required />*
                                                                <small class="text-danger">This field is compulsory</small>                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="email" class="form-control" name="custemail" id="custemail" placeholder="Customer Email Address" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <select  class="form-control" name="custcategory" id="custcategory" required>                                                                    
                                                                    <option value="">Select a Category </option>
                                                                    <option value="Sales Rep/Agent">Sales Rep/Agent</option>
                                                                    <option value="School">School</option>
                                                                    <option value="Bookshop">Bookshop</option>
                                                                    <option value="Individual">Individual</option>
                                                                </select>*                                        
                                                                <small class="text-danger">This field is compulsory</small>                      
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="custmobile" id="custmobile" placeholder="Customer Phone Number" required />*
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="custaddress" id="custaddress" placeholder="Address of Customer"></textarea>
                                                        </div>
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="newCust">
                                                            Add New Customer Details
                                                        </button>
                                                        
                                                    </form>                            
                                                </div>
                                                <?php } else {
                                                    echo "<div class='alert alert-warning'>You do not have the right permission to perform this operation</div>";
                                                } ?>
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
    <script src="js/newCust.js"></script>

</body>

</html>