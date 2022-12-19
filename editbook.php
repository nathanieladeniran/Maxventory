<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Edit Book Details"; ?>
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
                        <?php $gatBook = new BookController(); $gatBook->bookDetails($_GET['stockid'], $_GET['stockno']); $gatBook->showAuthors(); $gatBook->showCategory(); ?>
                        <?php foreach ($singleBook as $sbook) { $ath = $sbook['stock_author'];?>
                        <!-- Earnings (Monthly) Card  -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Edit <?=$sbook['stock_name'] ?> Details</div> 
                                                <div class="p-5">
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Warehouse Manager" ){ ?>
                                                    <form name="editBookForm" id="editBookForm" class="book" method="post" enctype="multipart/form-data"> 
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="itemname" id="itemname" value="<?=$sbook['stock_name']?>" placeholder="Name of Book" required /> 
                                                                <input type="hidden" name="bookid" id="bookid" value="<?=$sbook['stock_id'] ?>" />
                                                                <small class="text-primary"><strong>Name of Book</strong></small> 
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select  class="form-control" name="itemauthor" id="itemauthor" required>*
                                                                    <option value="<?=$sbook['stock_author'] ?>"><?=$sbook['stock_author'] ?></option>
                                                                    <?php foreach ($author as $author) { ?>                         
                                                                        <option value="<?=$author['vendor_name'] ?>"><?=$author['vendor_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <small class="text-primary"><strong>Book Author</strong></small>  
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <select  class="form-control" name="itemcategory" id="itemcategory" required>*  
                                                                    <option value="<?=$sbook['category_name'] ?>"><?=$sbook['category_name'] ?></option>
                                                                    <?php foreach ($category as $cat) { ?>                                
                                                                    <option value="<?=$cat['category_name'] ?>"><?=$cat['category_name'] ?></option>      
                                                                    <?php } ?>
                                                                </select>                                                            
                                                                <small class="text-primary"><strong>Book Category</strong></small> 
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="itemno" id="itemno" value="<?=$sbook['stock_no']?>" placeholder="Item ISBN or Stock Number" required />
                                                                <small class="text-primary"><strong>ISBN/Book Number</strong></small>  
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control" name="itemqty" id="itemqty" value="<?=$sbook['stock_quantity']?>" placeholder="Quantity to Stock" required readonly />
                                                                <small class="text-primary"><strong>Current Quantity</strong></small>  
                                                            </div>
                                                            <div class="col-sm-3 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control" name="newqty" id="newqty" value="0" placeholder="Quantity to Stock" required />
                                                                <small class="text-primary"><strong>Quantity to Restock</strong></small>  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control" name="retailprice" id="retailprice" value="<?=$sbook['stock_retail_price']?>" placeholder="Production cost per one" required />*
                                                                <small class="text-primary"><strong>Production Price</strong></small>  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control" name="saleprice" id="saleprice" value="<?=$sbook['stock_sale_price']?>" placeholder="Selling Price" required />*
                                                                <small class="text-primary"><strong>Selling Price</strong></small>  
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="itemdescription" id="itemdescription" placeholder="Description of Book"><?=$sbook['stock_description']?></textarea>
                                                            <small class="text-primary"><strong>Item Description</strong></small>  
                                                        </div>
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="updBook">
                                                            Edit Details
                                                        </button>                                                        
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
    <script src="js/editBook.js"></script>
</body>

</html>