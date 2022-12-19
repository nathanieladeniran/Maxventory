<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Purchase Details"; ?>
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
                        <a href="newsale" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> New Sale</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatSale = new SaleController(); $gatSale->showTransaction($_GET['trid']); ?>
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Transaction Details</div> 
                                                <div class="p-5">
                                                    <div class="table-responsive"> 
                                                        <p><h5>Customer Name: <?=$_GET['name']?></h5></p>                                                                                                              
                                                        <table class="table table-bordered " width="100%" cellspacing="0">   
                                                            <thead class="bd-primary">
                                                                <th>S/N</th>
                                                                <th>Item Name</th>
                                                                <th>Item Price (&#8358;)</th>
                                                                <th>Quantity Purchased</th>
                                                                <th>Subtotal (&#8358;)</th>
                                                            </thead>      
                                                                                                             
                                                            <tbody>
                                                                <?php $sn=0; $sumTotal=0; foreach ($items as $item) { $sumTotal+= ($item['item_price']*$item['quantity_purchased']); $sn++; ?>  
                                                                <tr>
                                                                    <td><?=$sn ?></td> 
                                                                    <td><?=$gatSale->showBookName($item['item_id']) ?></td>
                                                                    <td><?=number_format($item['item_price'],2) ?></td> 
                                                                    <td><?=$item['quantity_purchased'] ?></td> 
                                                                    <td><?=number_format(($item['item_price']*$item['quantity_purchased']),2) ?></td> 
                                                                </tr> 
                                                                <?php } ?> 
                                                                <tr>
                                                                    <td colspan="4"><h5 class="text-right">Subtotal</h5></td> 
                                                                    <td><?=number_format(($sumTotal),2) ?></td>                                                                     
                                                                </tr>  
                                                                <tr>
                                                                    <td colspan="4"><h5 class="text-right">Discount (%)</h5></td> 
                                                                    <td><?=$item['discount'] ?></td> 
                                                                    
                                                                </tr>  
                                                                <tr>
                                                                    <td colspan="4"><h5 class="text-right">Grand Total</h5></td> 
                                                                    <td><?=number_format(($sumTotal-(($item['discount']/100)*$sumTotal)),2) ?></td>                                                                     
                                                                </tr>                                                              
                                                            </tbody>
                                                        </table>
                                                        <a href="print?trid=<?=$_GET['trid'] ?>&&name=<?=$_GET['name'] ?>" class="btn btn-success btn-user" target="_blank">
                                                           <i class="fas fa-print fa-sm text-white-50"></i> Print Receipt
                                                        </a>                                                
                                                    </div>
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
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>