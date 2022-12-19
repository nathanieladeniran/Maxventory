<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Add New Staff"; ?>
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
                        <a href="viewstaff" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Staff</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">      
                        <?php $staff = new StaffController(); $staff->showStaffs(); ?>                  
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Add Staff</div>
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Human Resources"){ ?>
                                                <div class="p-5">                                                    
                                                    <form name="staffForm" id="staffForm" class="book" method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="staff_fname" id="staff_fname" placeholder="Firstname of Staff" required />*
                                                                <small class="text-danger">This field is compulsory</small>                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="staff_lname" id="staff_lname" placeholder="Lastname/Surname of Staff" required />*
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="staff_mobile" id="staff_mobile" placeholder="Staff Mobile Number" required />*
                                                                <small class="text-danger">This field is compulsory</small>                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="email" class="form-control" name="staff_email" id="staff_email" placeholder="Staff Email Address" required />*
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <select  class="form-control" name="staff_category" id="staff_category" required>                                                                    
                                                                    <option value="">Select a Role </option>
                                                                    <option value="Accountant">Accountant</option>
                                                                    <option value="Managing Director">Managing Director</option>
                                                                    <option value="Human Resources">Human Resources</option>
                                                                    <option value="Production Manager">Production Manager</option>
                                                                    <option value="Secretary">Secretary</option>
                                                                    <option value="Sales Representative">Sales Representative</option>
                                                                    <option value="Sales Agent">Sales Agent</option>
                                                                    <option value="Warehouse Manager">Warehouse Manager</option>
                                                                </select>*           
                                                                <small class="text-danger">This field is compulsory</small>                                                   
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="staff_dob" id="staff_dob" placeholder="Staff Date of birth" onfocus="(this.type='date')" required />*
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="g_name" id="g_name" placeholder="Guarantor Fullname" required />                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="email" class="form-control" name="g_email" id="g_email" placeholder="Guarantor Email Address" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" name="staff_address" id="staff_address" placeholder="Address of Staff"></textarea>*
                                                                <input type="hidden" name="staffcount" id="staffcount" value="<?=count($staff) ?>" />
                                                                <input type="hidden" name="rollno" id="rollno" />
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="file" name="staffImg" id="staffmg" />*<br />
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="newStaff">
                                                            Add New Staff Details
                                                        </button>
                                                        
                                                    </form>                            
                                                </div>
                                                <?php } else {
                                                    echo "<div class='alert alert-warning'>You do not have the right permission to perform this operation</div>";
                                                } ?>
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
    <script src="js/newStaff.js"></script>


</body>

</html>