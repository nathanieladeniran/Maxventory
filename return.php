<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Book Return"; ?>
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
                        <a href="#" data-toggle="modal" data-target="#returnModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add Return</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatSale = new SaleController(); $gatSale->showReturnList(); $gatSale->showAllItemSold(); $getName =  new CustomerController();  ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Book Return Log</div>
                                                
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>       
                                                                <th>S/N</th>
                                                                <th>Transaction ID</th>
                                                                <th>Book Name</th>
                                                                <th>Unit Price</th>
                                                                <th>Initial Quantity</th>
                                                                <th>Return Quantity</th>
                                                                <th>Returned By</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>           
                                                                <th>S/N</th>
                                                                <th>Transaction ID</th>
                                                                <th>Book Name</th>
                                                                <th>Unit Price</th>
                                                                <th>Initial Quantity</th>
                                                                <th>Return Quantity</th>
                                                                <th>Returned By</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php $sn=0; if($ret != Null){ foreach ($ret as $asale) { 
                                                                $sn++;                                                               
                                                            ?>      
                                                            <tr>                                  
                                                                <td><?=$sn ?></td>                                                                                   
                                                                <td><?=$asale['transaction_ref'] ?></td> 
                                                                <td><?=$gatSale->showBookName($asale['item_no']) ?></td>                                                                  
                                                                <td><?=$asale['item_price'] ?></td>
                                                                <td><?=$asale['initial_qty'] ?></td> 
                                                                <td><?=$asale['return_qty'] ?></td> 
                                                                <td><?=$asale['return_staff'] ?></td> 
                                                            </tr>    
                                                            <?php } } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Search Transaction</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="retForm" id="retForm" class="book" method="post" enctype="multipart/form-data" action="returnbook"> 
                                            <div class="form-group row"> 
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="transactionid" id="transactionid" placeholder="Input Transaction Number" required />
                                                    <small class="text-danger">This field is compulsory</small>
                                                </div>                                                
                                            </div>
                                            
                                                      
                                            <div id="picmsg"></div>
                                            <button type="submit" class="btn btn-primary btn-user" id="filterRet">
                                            Filter Transaction
                                            </button>
                                                        
                                        </form>                                        
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