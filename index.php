<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php'; ?>
    <?php $pageTitle = "Dashboard"; ?>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="newsale" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-shopping-cart fa-sm text-white-50"></i> New Sale</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $item = new BookController(); $item->showLowStock(); $item->showBooks(); $customer = new CustomerController(); $customer->showCustomers(); 
                            $sale = new SaleController(); $sale->showAllSale(); 
                            $batches = new SaleController(); 
                            $query_date = date('Y-m-d');
                            $start = date('Y-01-01', strtotime($query_date));
                            $end =  date('Y-12-31');
                        ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOtal Book Sold</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $book = new SaleController(); $book->allBookSold(); foreach($soldbook as $b){echo $b['totalBook']; } ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <a href="recentsale" style="text-decoration:none;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Sales</div>
                                            <?php $sumTotal = 0; foreach($sale as $b){ 
                                                $total = ($b['amount_due']);
                                                $sumTotal+= $total;
                                            }
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#8358; <?=number_format($sumTotal)?></div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <a href="viewcustomer" style="text-decoration:none;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customer Count
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=count($cust) ?></div>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <a href="lowitem" style="text-decoration:none;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Books Low in Stock</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=count($lowItem) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-angle-double-down fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-7 col-md-7 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Recent Sales</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Customer</th>
                                                    <th>Transaction ID</th>
                                                    <th>Total (&#8358;)</th>
                                                    <th>Discount (%)</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead> 
                                            <tfoot>
                                            <tr><td colspan="6"><a href="recentsale" class="btn btn-primary">View All</a></td></tr>
                                           </tfoot>                                          
                                            <tbody>
                                                <?php $sn=0; foreach($sale as $sale){ $sn++; 
                                                    $paystatus = $sale['paytype'];
                                                    if($paystatus=='Full Payment'){$paystatus = '<span class="badge badge-success">Fully Paid</span>';}
                                                    else if($paystatus=='Part Payment'){$paystatus = '<span class="badge badge-warning">Partially Paid</span>';}
                                                    else{$paystatus = '<span class="badge badge-danger">Not Paid</span>';}
                                                ?>
                                                <tr>
                                                    <td><?=$sn ?></td>
                                                    <td><?php $customer->customerDetails($sale['customer']); foreach ($singleCust as $cust){echo $cust['customer_name'];} ?></td>
                                                    <td><?=$sale['transaction_no'] ?></td>
                                                    <td><?=number_format($sale['amount_due']) ?></td>                                                    
                                                    <td><?=$sale['discount'] ?></td>
                                                    <td><?=$paystatus ?></td>
                                                </tr> 
                                                <?php } ?>                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-5 col-md-4 mb-5">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Low in Stock</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Book Name</th>
                                                    <th>Category</th>
                                                    <th>ISBN/Book Number</th>
                                                    <th>Available Quantity</th>
                                                </tr>
                                            </thead>
                                           <tfoot>
                                            <tr><td colspan="4"><a href="lowitem" class="btn btn-primary">View All</a></td></tr>
                                           </tfoot>
                                            <tbody>
                                                <?php foreach ($lowItem as $low) {?>
                                                <tr>
                                                    <td><?=$low['stock_name'] ?></td>
                                                    <td><?=$low['category_name'] ?></td>
                                                    <td><?=$low['stock_no'] ?></td>
                                                    <td><?=$low['stock_quantity'] ?></td>
                                                </tr> 
                                                <?php } ?>                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--Chart Area-->
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-7 col-md-7 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Yearly Sales Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-5 col-md-4 mb-5">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Payment Chart</h6>
                                </div>
                                <div class="card-body">
                                    <?php $yr = new SaleController(); $yr->showYearSale(); foreach($year as $year){ $totalSale = $year['totalSale']; $totalPay = $year['totalPay']; } ?>
                                    <div class="chart-area">
                                        <canvas id="myPieChart"></canvas>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
            label: "Total Sales",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'January') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'February') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'March') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'April') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'May') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'June') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'July') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'August') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'September') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'October') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'November') ?>,
                <?php echo $batches->showSalesPerMonthChart($start, $end, 'December') ?>
            ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
            },
            scales: {
            xAxes: [{
                time: {
                unit: 'date'
                },
                gridLines: {
                display: false,
                drawBorder: false
                },
                ticks: {
                maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                    return '₦' + number_format(value);
                }
                },
                gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
                }
            }],
            },
            legend: {
            display: false
            },
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': ₦ ' + number_format(tooltipItem.yLabel);
                }
            }
            }
        }
        });

    </script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Total Sale", "Total Payment Received", "Pending Payments"],
            datasets: [{
            data: [<?php echo $totalSale ?>, <?php echo $totalPay ?>, <?php echo $totalSale-$totalPay ?>],
            backgroundColor: ['#4e73df', '#089934', '#F70B1D'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: true
            },
            cutoutPercentage: 80,
        },
        });
    </script>                               
</body>

</html>