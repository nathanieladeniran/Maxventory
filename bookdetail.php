<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Book Details"; ?>
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
                        <a href="viewitem" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Books</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatBook = new BookController(); $gatBook->bookDetails($_GET['stockid'], $_GET['stockno']); ?>
                        <?php foreach ($singleBook as $sbook) { ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">                                                
                                                <?=$sbook['stock_name'] ?> Details</div> 
                                                <div class="p-5">                                                    
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">                                                           
                                                            <tbody>
                                                                <tr>
                                                                    <th>Book Name</th><td><?=$sbook['stock_name'] ?></td>   
                                                                </tr>
                                                                <tr>
                                                                    <th>Book Category</th><td><?=$sbook['category_name'] ?></td>   
                                                                </tr>
                                                                <tr>
                                                                    <th>Book Number</th><td><?=$sbook['stock_no'] ?></td>   
                                                                </tr>
                                                                <tr>
                                                                    <th>Book Price</th><td>NGN <?=$sbook['stock_sale_price'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Current Quantity</th><td><?=$sbook['stock_quantity'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Book Description</th><td><?=$sbook['stock_description'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>                                               
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
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>