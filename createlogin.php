<?php include_once ('includes/accountCheck.inc.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'config/__init.php';?>
    <?php $pageTitle = "Staff Login"; ?>
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
                        <?php $staff = new StaffController(); $staff->showStaffs(); $mstaff = new StaffController(); $mstaff->showMyStaffs();?>                  
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Create Staff Login</div>
                                                <?=$_SESSION['role'] ?>
                                                <?php if ($_SESSION['role'] == "Managing Director" || $_SESSION['role'] == "Human Resources" ){ ?>
                                                <div class="p-5">                                                    
                                                    <form name="cForm" id="cForm" class="book" method="post" enctype="multipart/form-data">                                                        
                                                        <div class="form-group row">
                                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                                <select  class="form-control" name="staff_id" id="staff_id" required>                                                                    
                                                                    <option value="">Select a Staff </option>
                                                                    <?php
                                                                    if($_SESSION['role'] == "Managing Director"){ foreach ($staff as $staff) { ?> 
                                                                    <option value="<?=$staff['user_id'] ?>"><?=$staff['user_lname']." ".$staff['user_fname']?></option>  
                                                                    <?php 
                                                                        } 
                                                                     }else if($_SESSION['role'] == "Human Resources"){ foreach ($myStaff as $nstaff) {
                                                                    ?>   
                                                                    <option value="<?=$nstaff['user_id'] ?>"><?=$nstaff['user_lname']." ".$nstaff['user_fname']?></option>   
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>                                                                  
                                                                </select>                                                 
                                                                <small class="text-danger">This field is compulsory</small>             
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="password" class="form-control" name="staff_password" id="staff_password" placeholder="User Login Password" required />
                                                                <small class="text-danger">This field is compulsory</small>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password" data-match="#staff_password" required />
                                                                <small class="text-danger" id="msg">This field is compulsory</small>
                                                            </div>
                                                        </div>
                                                      
                                                        <div id="message"></div>
                                                        <button type="submit" class="btn btn-primary btn-user" id="cLogin">
                                                            Create Staff Login
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
    <script src="js/createLogin.js"></script>


</body>

</html>