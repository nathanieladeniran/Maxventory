<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php'; ?>
    <?php $pageTitle = "Report Summary"; ?>
    <?php include('partial/header.part.php') ?>
    <style>
        table > tbody > tr:nth-child(n+11) {
            display:none;
        }
    </style>
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
                        <?php 
                            $date = date('Y-m-d');
                            $item = new BookController(); $item->showLowStock(); $item->showBooks(); $customer = new CustomerController(); $customer->showCustomers(); 
                            $sale = new SaleController(); $sale->showDailySale(); $sale->showWeekSale(); $sale->showMonthSale(); $sale->showYearSale();
                        ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card-header bg-success text-white">Sales Report (Total Worth of Book Sold)</div>
                            <div class="card shadow h-100 py-2">                                
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Daily Sale</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($daily as $d){echo  number_format($d['totalSale']); } ?></div>
                                            <p>&nbsp;</p>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                This Weekly Sale</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($week as $w){echo  number_format($w['totalSale']); } ?></div>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                This Month Sale</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($month as $m){echo  number_format($m['totalSale']); } ?></div>
                                            <p>&nbsp;</p>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                This Year</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($year as $y){echo  number_format($y['totalSale']); } ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card-header bg-info text-white">Payment Report (Amount of Payment Received)</div>
                            <div class="card shadow h-100 py-2">                                
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Paid Today</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($daily as $d){echo  number_format($d['totalPay']); } ?></div>
                                            <p>&nbsp;</p>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Paid This Week</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($week as $w){echo  number_format($w['totalPay']); } ?></div>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Paid This Month</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($month as $m){echo  number_format($m['totalPay']); } ?></div>
                                            <p>&nbsp;</p>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Paid This Year</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?php foreach($year as $y){echo  number_format($y['totalPay']); } ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card-header bg-warning text-white">Transaction Report</div>
                            <div class="card shadow h-100 py-2">                                
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Daily Transaction</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($daily as $d){echo  number_format($d['totalTransact']); } ?></div>
                                            <p>&nbsp;</p>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Weekly Transaction</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($week as $w){echo  number_format($w['totalTransact']); } ?></div>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Monthly Transaction</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($month as $m){echo  number_format($m['totalTransact']); } ?></div>
                                            <p>&nbsp;</p>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Yearly Transaction</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($year as $y){echo  number_format($y['totalTransact']); } ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
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

</body>

</html>