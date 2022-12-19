<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Payment Receipt"; ?>
    <?php include('partial/header.part.php') ?>
    <!-- Custom styles for table -->
</head>

<body id="page-top" style="margin-top: 4%; margin-bottom: 4%; color: #000000">

    <!-- Page Wrapper -->
    <div id="">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card">
                                <div class="card-body invoice-head"> 
                                    <div class="row">
                                        <div class="col-md-4 align-self-center">                                                
                                            <img src="img/logo.jpeg" alt="logo-small" class="logo-sm mr-2" height="100">                                          
                                        </div><!--end col-->    
                                        <div class="col-md-8">
                                                
                                            <ul class="list-inline mb-0 contact-detail float-right">                                                   
                                                <li class="list-inline-item">
                                                    <div class="pl-3">
                                                        <i class="fas fa- fa-sm"></i>
                                                        <p class="text-black mb-0">www.maxafricanpublishers.com</p>
                                                        <p class="text-black mb-0">info@maxafricanpublishers.com</p>
                                                        <p class="text-black mb-0">(+234) 802-307-8815</p>

                                                    </div>                                                
                                                </li>
                                                
                                                <li class="list-inline-item">
                                                    <div class="pl-3">
                                                        <i class="fas fa- fa-sm"></i>
                                                        <p class="text-black mb-0">No 38, Obisesan Street, Ansar-udeen <br />Central mosque bye-pass, </p>
                                                        <p class="text-black mb-0">Ososami road, Oke-Ado,</p>
                                                        <p class="text-black mb-0">Ibadan, Oyo State.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!--end col-->    
                                    </div><!--end row-->     
                                </div><!--end card-body-->
                                <div class="card-body">
                                    <h3 class="text-center">Payment Receipt</h3>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="">
                                                <h6 class="mb-0"><b>Generated  :</b> <?=date("jS F, Y",strtotime(date('Y-m-d'))) ?></h6>
                                                <h6 class="mb-0"><b>Time :</b> <?=date('H:i:s') ?></h6>
                                            </div>

                                            <div class="">
                                                <?php $gatSale = new SaleController(); $gatSale->showTransaction($_GET['trid']); ?>
                                                <h6 class="mb-0"><b>Customer Name : <?=$_GET['name'] ?></b> </h6>
                                                <h6 class="mb-0"><b>Transaction ID :</b> <?=$_GET['trid'] ?></h6>
                                                <!--h6-- class="mb-0"><b>Payment Method :</b> <?=$it['paymtd'] ?></!--h6-->
                                            </div>
                                        </div><!--end col-->
                                    
                                    <div class="row">
                                        <div class="p-5">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-black" width="3000" cellspacing="">   
                                                    <thead class="bd-primary">
                                                        <th>S/N</th>
                                                        <th>Item Name</th>
                                                        <th>Item Price (&#8358;)</th>
                                                        <th>Quantity Purchased</th>
                                                        <th>Subtotal (&#8358;)</th>
                                                        
                                                    </thead>                                           
                                                    <tbody>
                                                        <?php $sn=0; $sumTotal=0; foreach ($items as $item) { $sumTotal+= ($item['item_price']*$item['quantity_purchased']); $sn++;?>
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
                                                            <td><?=number_format((($sumTotal)-(($item['discount']/100)*$sumTotal)),2) ?></td>                                                                     
                                                        </tr>                                                       
                                                    </tbody>
                                                </table>
                                                <p>&nbsp;</p>
                                               
                                            </div>  <!--end /div-->                                          
                                        </div>  <!--end col-->                                      
                                    </div><!--end row-->

                                  

                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="col-lg-12 col-xl-4">
                        <div class="float-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print"></i>Print Now</a>
                        </div>
                    </div><!--end col-->
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include('partial/footer.part.php') ?>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
