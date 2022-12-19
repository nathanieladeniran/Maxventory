<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "View All Customer"; ?>
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
                        <a href="newcustomer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add New Customer</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatCust = new CustomerController(); $gatCust->showCustomers(); ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Customer Log</div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Customer Name</th>
                                                                <th>Category</th>
                                                                <th>Phone Number</th>
                                                                <th>Email</th>
                                                                <th>Address</th>
                                                                <th width="13%">&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Customer Name</th>
                                                                <th>Category</th>
                                                                <th>Phone Number</th>
                                                                <th>Email</th>
                                                                <th>Address</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php foreach ($cust as $acust) { ?>
                                                               
                                                            <tr>
                                                                <td><?=$acust['customer_name'] ?></td>
                                                                <td><?=$acust['customer_category'] ?></td>
                                                                <td><?=$acust['customer_mobile'] ?></td>
                                                                <td><?=$acust['customer_email'] ?></td>
                                                                <td><?=$acust['customer_address'] ?></td>
                                                                <td><a href="customerdetail?custid=<?=$acust['customer_id'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" 
                                                                title="View Customer Details"><i class="fas fa-eye fa-sm text-white-70"></i></a>
                                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Human Resources" || $_SESSION['role'] == "Accountant"){ ?>
                                                                <a href="editcustomer?custid=<?=$acust['customer_id'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" 
                                                                title="Edit Customer Details"><i class="fas fa-edit fa-sm text-white-70"></i></a>
                                                                <?php }?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>