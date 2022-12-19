<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Update Quantity to Return"; ?>
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
                        <a href="return" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> Return Log</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $getSl = new SaleController(); $getSl->showSinglePayRecord($_POST['transactionid']); $getSl->showTrDetails($_POST['transactionid']); ?>
                        <?php foreach ($payRec as $sbook) { ?>
                        <!-- Earnings (Monthly) Card  -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Return Form</div> 
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Accountant" || $_SESSION['role'] == "Warehouse Manager"){ ?>
                                                <div class="p-5">
                                                    <form name="returnForm" id="returnForm" class="book" method="post" enctype="multipart/form-data" action="includes/returnBook.inc"> 
                                                        <?php $gatSale = new SaleController(); $gatSale->showTransaction($_POST['transactionid']); ?>
                                                        <div class="table-responsive">                                                                                                             
                                                        <table class="table table-bordered table-striped" id="itemTable" width="100%" cellspacing="0">   
                                                            <thead class="bg-primary text-white">
                                                                <th>&nbsp;</th>
                                                                <th>S/N</th>
                                                                <th>Item Name</th>
                                                                <th>Item Price (&#8358;)</th>
                                                                <th>Initial Quantity</th>
                                                                <th>Quantity Returned</th>
                                                                <th>Return Subtotal (&#8358;)</th>
                                                            </thead>      
                                                                                                             
                                                            <tbody>
                                                                <?php $sn=0; $sumTotal=0; foreach ($items as $item) { $sumTotal+= ($item['item_price']*$item['quantity_purchased']); $sn++; ?>  
                                                                <tr>
                                                                    <td><input type="checkbox" name="retcheck[]" id="retcheck" checked /></td>
                                                                    <td><?=$sn ?></td> 
                                                                    <td>
                                                                        <?=$gatSale->showBookName($item['item_id']) ?>
                                                                        <input type="hidden" name="stockid[]" id="stockid" value="<?=$item['item_id'] ?>" />
                                                                        <input type="hidden" name="availqty[]" id="avaiqty" value="<?=$getSl->showAvailQty($item['item_id']); ?>" />
                                                                        <input type="hidden" name="saleid[]" id="saleid" value="<?=$item['sales_id'] ?>" />
                                                                    </td>
                                                                    <td>
                                                                        <?=number_format($item['item_price'],2) ?>
                                                                        <input type="hidden" name="itemprice[]" id="itemprice" value="<?=$item['item_price'] ?>" />
                                                                    </td> 
                                                                    <td><?=$item['quantity_purchased'] ?>
                                                                        <input type="hidden" class="form-control" name="qty[]" id="qty" value="<?=$item['quantity_purchased'] ?>" required />
                                                                    </td> 
                                                                    <td><input type="number" class="form-control" name="qtyreturn[]" id="qtyreturn" min="1" max="<?=$item['quantity_purchased'] ?>" onkeyup="changeItem(this)" /></td> 
                                                                    <td>0</td> 
                                                                </tr> 
                                                                <?php } ?> 
                                                                <tr>
                                                                    <td colspan="6"><h5 class="text-right">Subtotal</h5></td> 
                                                                    <td><!--?=number_format(($sumTotal),2) ?--></td>                                                                     
                                                                </tr>  
                                                                <tr>
                                                                    <td colspan="6"><h5 class="text-right">Discount (%)</h5></td> 
                                                                    <td>
                                                                        <?=$item['discount'] ?> 
                                                                        <input type="hidden" name="discount" id="discount" value="<?=$item['discount'] ?>" />
                                                                        <input type="hidden" class="form-control" name="trid" id="trid" value="<?=$_POST['transactionid']?>" required />
                                                                        <input type="hidden" name="subtotal" id="subtotal" value="" required />
                                                                        <input type="hidden" name="newGrandTotal" id="newGrandTotal" value="" required />
                                                                        <input type="hidden" name="oldamountdue" id="oldamountdue" value="<?=$sumTotal ?>" />
                                                                    </td> 
                                                                    
                                                                </tr>  
                                                                <tr>
                                                                    <td colspan="6"><h5 class="text-right">Grand Total</h5></td> 
                                                                    <td><!--?=number_format($sumTotal-(($item['discount']/100)*$sumTotal),2) ?--></td>        
                                                                    <input type="hidden" name="returnstaff" id="returnstaff" value="<?=$_SESSION['userfname'] ?>" />                                                                                                                                 
                                                                </tr>                                                              
                                                            </tbody>
                                                        </table>                                                                                                 
                                                    </div>
                                                        <!--div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="qty" id="qty" value="<?=$_GET['maxqty'] ?>" placeholder="Book Quatity" required readonly /> 
                                                                
                                                                <input type="hidden" name="trid" id="trid" value="<?=$_GET['trid'] ?>" />
                                                                <input type="hidden" name="itemprice" id="itemprice" value="<?=$_GET['price'] ?>" />
                                                                <input type="hidden" name="stockid" id="stockid" value="<?=$_GET['stockid']; ?>" />
                                                                <input type="hidden" name="availqty" id="avaiqty" value="<?=$getSl->showAvailQty($_GET['stockid']); ?>" />
                                                                <input type="hidden" name="returnstaff" id="returnstaff" value="<?=$_SESSION['userlname'] ?>" />                                                                
                                                                <small class="text-primary"><strong>Quantity Initially Purchased</strong></small> 
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="number" class="form-control" name="qtyreturn" id="qtyreturn" min="1" max="<?=$_GET['maxqty'] ?>" required />
                                                                <small class="text-primary"><strong>Quantity to Return</strong></small>  
                                                            </div>
                                                        </!--div-->
                                                        <!--?php 
                                                            foreach($tr as $tr){ ?>
                                                                <input type="hidden" name="discount" id="discount" value="<?=$tr['discount'] ?>" />
                                                                <input type="hidden" name="amountdue" id="amountdue" value="<?=$tr['amount_due'] ?>" />
                                                                <input type="hidden" name="amountpaid" id="amountpaid" value="<?=$tr['amount_paid'] ?>" />
                                                                <input type="hidden" name="returncustomer" id="returncustomer" value="<?=$tr['customer'] ?>" />
                                                         <!--?php   }
                                                        ?-->
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="retBut">
                                                            Process Return
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
    <script src="js/return.js"></script>
</body>

</html>