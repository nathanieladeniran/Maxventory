<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Edit Customer Details"; ?>
    <?php include('partial/header.part.php') ?>
    <!-- Custom styles for table -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                        <a href="viewcustomer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Customer</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatCust = new CustomerController(); $gatCust->customerDetails($_GET['custid']) ?>
                        <?php foreach ($singleCust as $scust) { ?>
                        <!-- Earnings (Monthly) Card  -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Edit <?=$scust['customer_name'] ?> Details</div> 
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Human Resources" || $_SESSION['role'] == "Accountant"){ ?>
                                                <div class="p-5">
                                                    <form name="custForm" id="custForm" class="book" method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="custname" id="custname" value="<?=$scust['customer_name'] ?>" placeholder="Name of Customer or Organization" required />
                                                                <input type="hidden" name="custid" id="custid" value="<?=$scust['customer_id'] ?>" />
                                                                <small class="text-danger">This field is compulsory</small>                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="email" class="form-control" name="custemail" id="custemail" value="<?=$scust['customer_email'] ?>" placeholder="Customer Email Address" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <?php $category = array('School','Bookshop','Individual'); ?>
                                                                <select  class="form-control" name="custcategory" id="custcategory" required>
                                                                    <option value="<?=$scust['customer_category'] ?>"><?=$scust['customer_category'] ?></option>      
                                                                    <?php foreach ($category as $category) { ?>
                                                                        <option value="<?=$category ?>"><?=$category ?></option> 
                                                                    <?php 
                                                                        
                                                                    }                                                                     
                                                                    ?>
                                                                </select>*                                        
                                                                <small class="text-danger">This field is compulsory</small>                      
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="custmobile" id="custmobile" value="<?=$scust['customer_mobile'] ?>" placeholder="Customer Phone Number" required />*
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="custaddress" id="custaddress" placeholder="Address of Customer"><?=$scust['customer_address'] ?></textarea>
                                                        </div>
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="editCust">
                                                            Edit Details
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
                        <?php } ?>
                        
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/editCustomer.js"></script>
</body>

</html>