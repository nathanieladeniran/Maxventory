<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Record New Sale" ; ?>
    <?php include('partial/header.part.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                        <a href="recentsale" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Sale</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">      
                        <?php $staff = new StaffController(); $staff->showStaffs(); $cust = new CustomerController(); $cust->showCustomers(); $book = new BookController(); $book->showBooks(); ?>                  
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Purchase Item</div>
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Accountant" ){ ?>
                                                <div class="p-5">                                                    
                                                    <form name="itemForm" id="itemForm" class="book" method="post" enctype="multipart/form-data">                                                        
                                                        <div class="form-group row">
                                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                                <select  class="form-control selectdropdown" name="custname" id="custname" required>                                                                    
                                                                    <option value="">Select Customer </option>
                                                                    <?php foreach ($cust as $cust) { ?>
                                                                    <option value="<?=$cust['customer_id'] ?>"><?=$cust['customer_name']?></option>  
                                                                    <?php  } ?>                                                                  
                                                                </select>                                                 
                                                                <small class="text-danger">This field is compulsory</small>             
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select  class="form-control newselect" name="bookname" id="bookname" style="height:27px; padding-top:1px">                                                                    
                                                                    <option value="">Select Book</option>
                                                                    <?php foreach ($book as $book) { ?> 
                                                                    <option value="<?=$book['stock_id'] ?>"><?=$book['stock_name']?></option>  
                                                                    <?php  } ?>                                                                  
                                                                </select> 
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control" name="unitprice" id="unitprice" min="1" placeholder="Unit Price" readonly />
                                                                <small class="text-danger" id="">This field is compulsory</small>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control" name="qty" id="qty" min="1" placeholder="Quantity" />         
                                                                <input type="hidden" class="form-control" name="availstock" id="availstock" required /> 
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                                            
                                                            </div>
                                                            <div class="col-sm-4">

                                                            </div>
                                                            <div class="col-sm-4">
                                                                
                                                            </div>                                                                                                                       
                                                        </div>
                                                        <button type="button" class="btn btn-primary btn-user" id="addItem">
                                                           <i class="fas fa-plus fa-sm text-white-50"></i> Add To List
                                                        </button>
                                                        <p>&nbsp;</p>
                                                        <!---Purchase List-->
                                                        <div><h3 class="text-center">Purchase List</h3></div>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="purchaseTable" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr class="bg-primary text-white">
                                                                        <th>&nbsp;</th>
                                                                        <th>Book purchased</th>
                                                                        <th>Price</th>
                                                                        <th width="10%">Quantity</th>
                                                                        <th width="10%">Total (&#8358;)</th>
                                                                    </tr>
                                                                </thead>                                                           
                                                                <tbody>
                                                                    <!--?php foreach ($author as $author) { ?-->                                                                    
                                                                    
                                                                    <tr>
                                                                        <th colspan="4"><h5 class="text-right">Subtotal</h5></th>
                                                                        <th>0</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="4"><h5 class="text-right">Discount (%)</h5></th>
                                                                        <th><input type="number" class="form-control" name="discount" id="discount" min="0" placeholder="Discount Allowed" required /></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="4"><h5 class="text-right">Grand total</h5></th>
                                                                        <th>0</th>
                                                                    </tr>
                                                                    <!--?php } ?-->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <p>&nbsp;</p>
                                                        <div class="form-group row">                                                            
                                                            <div class="col-sm-4">
                                                                <select  class="form-control" name="paytype" id="paytype" required>                                                                    
                                                                    <option value="">Select Payment Type</option>                                                                    
                                                                    <option value="Full Payment">Full Payment</option> 
                                                                    <option value="Part Payment">Part Payment</option>  
                                                                    <option value="No Payment">No Payment</option>  
                                                                </select>
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select  class="form-control" name="paymethod" id="paymethod" required>                                                                    
                                                                    <option value="">Payment Method</option>                                                                    
                                                                    <option value="Bank Transfer">Bank Transfer</option>   
                                                                    <option value="Cash">Cash</option> 
                                                                    <option value="Debit Card">Debit Card</option>
                                                                    <option value="None">None</option>     
                                                                </select>
                                                                <small class="text-danger" id="">This field is compulsory</small>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="amountpaid" id="amountpaid" placeholder="Amount" required />
                                                                <input type="hidden" class="form-control" name="amountdue" id="amountdue" required />  
                                                                <input type="hidden" class="form-control" name="trid" id="trid" value="<?=rand().time() ?>" required />                            
                                                                <small class="text-danger" id="">This field is compulsory</small>
                                                            </div>                                                                                                                       
                                                        </div>
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-success btn-user" id="saveItem">
                                                           <i class="fas fa-plus fa-sm text-white-50"></i> Save Sale
                                                        </button>
                                                        <!--button type="submit" class="btn btn-danger btn-user" id="removeItem">
                                                           <i class="fas fa-trash fa-sm text-white-50"></i> clear Sale
                                                        </!--button-->
                                                    </form>                            
                                                </div>
                                                <?php }else {
                                                    echo "<div class='alert alert-warning'>You do not have the right permission to perform this operation</div>";
                                                }?>
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
    <script src="js/newSale.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selectdropdown').select2();
        });
        
    </script>
</body>

</html>