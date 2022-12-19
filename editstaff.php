<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Edit Staff Details"; ?>
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
                        <a href="viewstaff" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View Staff</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php $gatStaff = new StaffController(); $gatStaff->userDetails($_GET['staffcode'], $_GET['staffno']) ?>
                        <?php foreach ($user as $staff) { ?>
                        <!-- Earnings (Monthly) Card  -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Edit <?=$staff['user_fname'] ?> Details</div> 
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Human Resources"){ ?>
                                                <div class="p-5">
                                                    <form name="staffForm" id="staffForm" class="book" method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="staff_fname" id="staff_fname" value="<?=$staff['user_fname'] ?>" placeholder="Firstname of Staff" required />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="staff_lname" id="staff_lname" value="<?=$staff['user_lname'] ?>" placeholder="Lastname/Surname of Staff" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="staff_mobile" id="staff_mobile" value="<?=$staff['user_mobile'] ?>" placeholder="Staff Mobile Number" required />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="email" class="form-control" name="staff_email" id="staff_email" value="<?=$staff['user_email'] ?>" placeholder="Staff Email Address" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <select  class="form-control" name="staff_category" id="staff_category" required>                                                                    
                                                                    <option value="<?=$staff['user_role'] ?>"><?=$staff['user_role'] ?> </option>
                                                                    <option value="Accountant">Accountant</option>
                                                                    <option value="Managing Director">Managing Director</option>
                                                                    <option value="Human Resources">Human Resources</option>
                                                                    <option value="Production Manager">Production Manager</option>
                                                                    <option value="Secretary">Secretary</option>
                                                                    <option value="Sales Representative">Sales Representative</option>
                                                                    <option value="Sales Agent">Sales Agent</option>
                                                                    <option value="Warehouse Manager">Warehouse Manager</option>
                                                                </select>                                          
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="staff_dob" id="staff_dob" placeholder="Staff Date of birth" value="<?=$staff['user_dob'] ?>" onfocus="(this.type='date')" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control" name="g_name" id="g_name" value="<?=$staff['g1_name'] ?>" placeholder="Guarantor Fullname" required />                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="email" class="form-control" name="g_email" id="g_email" value="<?=$staff['g1_email'] ?>" placeholder="Guarantor Email Address" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" name="staff_address" id="staff_address" placeholder="Address of Staff"><?=$staff['user_address'] ?></textarea>
                                                                <input type="hidden" name="staffid" id="staffid" value="<?=$staff['user_id'] ?>" />
                                                                <input type="hidden" name="rollno" id="rollno" value="<?=$staff['user_rollno'] ?>" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <?php $stat = array("ACTIVE","TERMINATED","RESIGNED","SUSPENDED") ?>
                                                                <select  class="form-control" name="user_status" id="user_status" required> 
                                                                    <option value="<?=$staff['user_status'] ?>"><?=$staff['user_status'] ?></option>                                                                     
                                                                    <?php foreach ($stat as $stat) { ?>                                                                      
                                                                        <option value="<?=$stat ?>"><?=$stat ?></option>
                                                                    <?php }  ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="editStaff">
                                                            Edit Details
                                                        </button>
                                                        <?php if($staff['password'] == "") {?> 
                                                            <button class="btn btn-secondary btn-user" id="" disabled>
                                                                Change Password
                                                            </button>
                                                        <?php }else{ if($_SESSION['role'] == "Human Resources" && $staff['user_role'] != "Managing Director") {?>
                                                            <a href="#" class="btn btn-success btn-user" id="" data-toggle="modal" data-target="#editPasswordModal">
                                                            Change Password
                                                            </a>
                                                        <?php } }?>
                                                        <a href="#" class="btn btn-warning btn-user" id="" data-toggle="modal" data-target="#editImageModal">
                                                            Change Picture
                                                        </a>
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
                        <!-- Edit Padssword Modal-->
                        <div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Staff Password</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="editPassForm" id="editPassForm" class="book" method="post" enctype="multipart/form-data"> 
                                            <div class="form-group row"> 
                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" name="staff_password" id="staff_password" placeholder="User Login Password" required />
                                                    <input type="hidden" name="staff_id" id="staff_id" value="<?=$staff['user_id'] ?>" />
                                                    <small class="text-danger">This field is compulsory</small>
                                                </div>                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" name="spass" id="spass" placeholder="Confirm Password" required />
                                                        <small class="text-danger" id="cmsg">This field is compulsory</small>                                                    
                                                </div>
                                            </div>
                                                      
                                            <div id="msg"></div>
                                            <button type="submit" class="btn btn-success btn-user" id="editPass">
                                                Update Password
                                            </button>                                                        
                                        </form>                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Chaneg Image Modal-->
                        <div class="modal fade" id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Staff Picture</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="imgForm" id="imgForm" class="book" method="post" enctype="multipart/form-data"> 
                                            <div class="form-group row"> 
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control" name="staffImg" id="staffimg" placeholder="User Login Password" required />
                                                    <input type="hidden" name="staffid" id="staffid" value="<?=$staff['user_id'] ?>" />
                                                    <input type="hidden" name="rollno" id="rollno" value="<?=$staff['user_rollno'] ?>" />
                                                    <small class="text-danger">This field is compulsory</small>
                                                </div>                                                
                                            </div>
                                            
                                                      
                                            <div id="picmsg"></div>
                                            <button type="submit" class="btn btn-primary btn-user" id="editImg">
                                                Update Picture
                                            </button>
                                                        
                                        </form>                                        
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
    <script src="js/editStaff.js"></script>

</body>

</html>