<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Add New Book"; ?>
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
                        <a href="viewitem" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Books</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatDetail = new BookController(); $gatDetail->showCategory(); $gatDetail->showAuthors(); ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                New Book Details</div>
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Warehouse Manager" ){ ?>
                                                <div class="p-5">                                                    
                                                    <form name="catForm" id="bookForm" class="book" method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="itemname" id="itemname" placeholder="Name of Book" required />*
                                                                <small class="text-danger">This field is compulsory</small>                                                               
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <!--input type="text" class="form-control" name="itemauthor" id="itemauthor" placeholder="Name of Author" reaquired /-->
                                                                <select  class="form-control" name="itemauthor" id="itemauthor" required>*
                                                                    <option value="">Select an Author </option>
                                                                    <?php foreach ($author as $author) { ?>
                                                                        <option value="<?=$author['vendor_name'] ?>"><?=$author['vendor_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <small class="text-danger">This field is compulsory</small> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <select  class="form-control" name="itemcategory" id="itemcategory" required>*                                                             
                                                                    <option value="">Select a Category </option>
                                                                    <?php foreach ($category as $cat) { ?>
                                                                    <option value="<?=$cat['category_name'] ?>"><?=$cat['category_name'] ?></option>
                                                                    <?php }; ?>                                                                    
                                                                </select>                                                            
                                                                <small class="text-danger">This field is compulsory</small>   
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="itemno" id="itemno" placeholder="Item ISBN or Stock Number" required />*
                                                                <small class="text-danger">This field is compulsory</small> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control" name="itemqty" id="itemqty" placeholder="Quantity to Stock" required />*
                                                                <small class="text-danger">This field is compulsory</small> 
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="retailprice" id="retailprice" placeholder="Production cost per one" required />*
                                                                <small class="text-danger">This field is compulsory</small> 
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="saleprice" id="saleprice" placeholder="Selling Price" required />*
                                                                <small class="text-danger">This field is compulsory</small> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="itemdescription" id="itemdescription" placeholder="Description of Book"></textarea>
                                                        </div>
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="newBook">
                                                            Add New Book Details
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
    <script src="js/newBook.js"></script>

</body>

</html>