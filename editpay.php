<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Record Payment"; ?>
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
                        <a href="payrecord" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Payment Record</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatSale = new SaleController(); $gatSale->showSinglePayRecord($_GET['trid']); ?>
                        <?php foreach ($payRec as $pay) { ?>
                        <!-- Earnings (Monthly) Card  -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Edit Payment</div> 
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Accountant"){ ?>
                                                <div class="p-5">
                                                    <form name="editPayForm" id="editPayForm" class="book" method="post" enctype="multipart/form-data" action="includes/updatePayStatus.inc">                                                         
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control" name="amtdue" id="amtdue" value="<?=($pay['amount_due']-$pay['amount_paid']) ?>" placeholder="Quantity to Stock" required readonly />
                                                                <small class="text-primary"><strong>Amount Due For Payment</strong></small>  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select  class="form-control" name="paytype" id="paytype" required> 
                                                                    <option value="">Select Payment Type</option>     
                                                                    <option value="Part Payment">Part Payment</option>                                               
                                                                    <option value="Full Payment">Full Payment</option>                                                                       
                                                                </select>
                                                                <small class="text-danger">This field is compulsory</small>  
                                                            </div>
                                                            <div class="col-sm-3 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="amount_sent" id="amount_sent" placeholder="Amount to Pay" required />
                                                                <input type="hidden" class="form-control" name="alreadypay" id="alreadypay" value="<?=$pay['amount_paid']?>" required />
                                                                <input type="hidden" class="form-control" name="due" id="due" value="<?=$pay['amount_due']?>" required />
                                                                <input type="hidden" class="form-control" name="trno" id="trno" value="<?=$_GET['trid'] ?>" required />
                                                                <small class="text-primary"><strong>Amount Already Paid is <?=$pay['amount_paid']?></strong></small>  
                                                            </div>                                                            
                                                            <div class="col-sm-3">
                                                                <select  class="form-control" name="paymethod" id="paymethod" required>                                                                    
                                                                    <option value="">Select Payment Method</option>                                                                    
                                                                    <option value="Bank Transfer">Bank Transfer</option>   
                                                                    <option value="Cash">Cash</option> 
                                                                    <option value="Debit Card">Debit Card</option>
                                                                </select>
                                                                <small class="text-danger" id="">This field is compulsory</small>
                                                            </div>
                                                        </div>                                                        
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="updPay">
                                                            Update Payment Status
                                                        </button>                                                        
                                                    </form>  
                                                </div>       
                                                <?php }else {
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
    <script src="js/editPay.js"></script>
</body>

</html>