<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Sales Report"; ?>
    <?php include('partial/header.part.php') ?>
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
                                class="fas fa-eye fa-sm text-white-50"></i> View Sales</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">      
                        <?php $staff = new StaffController(); $staff->showStaffs(); $gatSale = new SaleController(); $gatSale->showPayRecord(); $getName =  new CustomerController();?>                  
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                                <div class="p-5">                                                    
                                                    <form name="saleReport" id="saleReport" class="book" method="post" enctype="multipart/form-data" action="showSalereport">                                                        
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="">Check Sales Data From</label>
                                                                <input class="form-control" type="date" value="" name="checkFrom" id="checkFrom"  data-error="Check-in date from is empty" required>
                                                                <small class="text-danger">This field is compulsory</small>             
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="">Check Sales Data To</label>
                                                                <input class="form-control" type="date" value="" name="checkTo" id="checkTo" data-error="Check-in date to is empty" required>
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>                                                           
                                                        </div>
                                                      
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="">
                                                            Fetch Report
                                                        </button>
                                                        
                                                    </form>
                                                    <p>&nbsp;</p>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>       
                                                                <th>S/N</th>
                                                                <th>Customer Name</th>
                                                                <th>Transaction ID</th>
                                                                <th>Sold By</th>
                                                                <th>Discount (%)</th>
                                                                <th>Payment Status</th>
                                                                <th>Total Amount (&#8358;)</th>
                                                                <th>Amount Paid (&#8358;)</th>
                                                                <th>To Balance (&#8358;)</th>
                                                                <th width="5%">&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>           
                                                                <th>S/N</th>
                                                                <th>Customer Name</th>
                                                                <th>Transaction ID</th>
                                                                <th>Sold By</th>
                                                                <th>Discount (%)</th>
                                                                <th>Payment Status</th>
                                                                <th>Total Amount (&#8358;)</th>                                                                
                                                                <th>Amount Paid (&#8358;)</th>
                                                                <th>To Balance (&#8358;)</th>
                                                                <th width="5%">&nbsp;</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php $sn=0; foreach ($psale as $asale) { $sn++;
                                                                $paystatus = $asale['paytype'];
                                                                if($paystatus=='Full Payment'){$paystatus = '<span class="badge badge-success">Fully Paid</span>';}
                                                                else if($paystatus=='Part Payment'){$paystatus = '<span class="badge badge-warning">Partially Paid</span>';}
                                                                else{$paystatus = '<span class="badge badge-danger">Not Paid</span>';}
                                                            ?>                                                            
                                                            <tr>                                  
                                                                <td><?=$sn ?></td>          
                                                                <td><?php $getName->customerDetails($asale['customer']); foreach ($singleCust as $cust){echo $cust['customer_name'];} ?></td>                    
                                                                <td><?=$asale['transaction_no'] ?></td> 
                                                                <td><?=$asale['sold_by'] ?></td>   
                                                                <td><?=$asale['discount'] ?></td>
                                                                <td><?=$paystatus ?></td>  
                                                                <td><?= number_format($asale['amount_due']) ?></td>                                                                                                                          
                                                                <td><?=number_format($asale['amount_paid']) ?></td>
                                                                <td><?=number_format($asale['amount_due']-$asale['amount_paid']) ?></td>
                                                                <td><a href="saledetail?trid=<?=$asale['transaction_no'] ?>&&name=<?=$cust['customer_name'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Sale Details"><i class="fas fa-eye fa-sm text-white-70"></i></a>
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
    <script src="js/createLogin.js"></script>
    <script>
        let chkin = document.querySelector('#checkFrom');
        chkin.addEventListener('change', ()=>{

        chkindate = chkin.value; //gets checkin value
        let day = 1;
        let date = new Date(chkindate);
        date.setDate(date.getDate() + day);
        document.querySelector("#checkTo").valueAsDate = date;
        });
    </script>

</body>

</html>