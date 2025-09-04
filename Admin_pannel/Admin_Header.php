<?php
include '../Connection.php';

$Admin_Gmail_from_ses = $Admin_Password_from_ses = null;

// Check if admin session variables for Gmail and Password are set
// If set, store them in local variables for further use
if (((isset($_SESSION["Session_Admin_Gmail"]) and isset($_SESSION["Session_Admin_Password"])))) {

    $Admin_Gmail_from_ses = $_SESSION["Session_Admin_Gmail"];
    $Admin_Password_from_ses = $_SESSION["Session_Admin_Password"];

    $select = "select * from admin where Admin_Gmail = '$Admin_Gmail_from_ses' and Admin_Password = '$Admin_Password_from_ses'";
    $run = mysqli_query($dblink, $select);
    $fetch = mysqli_fetch_array($run);
    $LoginAdminName = $fetch[1];
}

// If admin session variables are empty, redirect to the admin login page
if (empty($Admin_Gmail_from_ses) && empty($Admin_Password_from_ses)) {
    header("location: ../AdminLogin.php");
}

// _________________________________________________________________________________________
// Fetch all donation records from the donation_history table
$query = "SELECT * FROM donation_history ";
$run = mysqli_query($dblink, $query);

// Initialize total donation amount
$TotalDonatedAmount = 0;


// Loop through each record and sum the donation amounts
// Assumes that the donation amount is stored in the second column (index 1)
while ($fetch = mysqli_fetch_array($run)) {
    $TotalDonatedAmount += $fetch[1];
}
// _________________________________________________________________________________________

$query = "SELECT * FROM donation_transfers";
$run = mysqli_query($dblink, $query);
$TranferAmountFromDonation = 0;

while ($fetch = mysqli_fetch_array($run)) {
    $TranferAmountFromDonation += $fetch[2];
}
// _________________________________________________________________________________________

    $reminingAmount = $TotalDonatedAmount - $TranferAmountFromDonation;

?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin <?php echo $LoginAdminName; ?></title>



    <!-- ------------------------------------------------togglePassword style strt------------------------------------------------------------------------ -->

    <!--togglePassword style  -->
    <style>
        .password-toggle {
            cursor: pointer;
        }
    </style>

    <!-- ------------------------------------------------togglePassword style end------------------------------------------------------------------------ -->

    <!-- ----------------------------------------------------search || Table  Start-------------------------------------------------------------------- -->

    <!-- Custom fonts for this template -->
    <link href="Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="Assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- -----------------------------------------------------------search || Table  Start------------------------------------------------------------- -->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./Dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Admin Pannel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Team Members -->

            <li class="nav-item active">
                <a class="nav-link" href="./Add_Team_Member.php">
                    <i class="fas fa-user-plus"></i>
                    <span>Add Team Member</span></a>
            </li>

            <!-- Nav Item - All Team Members -->
            <li class="nav-item active">
                <a class="nav-link" href="./View_Team.php">
                    <i class="fas fa-users"></i>
                    <span>View Team</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Donors
            </div>



            <!-- Nav Item - Mid -->
            <li class="nav-item">
                <a class="nav-link" href="./Registered_Donors.php">
                    <i class="fas fa-user-check"></i>
                    <span>Registered Donors</span></a>
            </li>



            <!-- Nav Item -  -->
            <li class="nav-item">
                <a class="nav-link" href="./Donation_History.php">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Donation History</span></a>
            </li>

            <!-- Nav Item -  -->
            <li class="nav-item">
                <a class="nav-link" href="./Transfer.php">
                    <i class="fas fa-paper-plane"></i>
                    <span>Transfer</span></a>
            </li>

            <!-- Nav Item -  -->
            <li class="nav-item">
                <a class="nav-link" href="./Payment_History.php">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Payment History</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Students
            </div>



            <!-- Nav Item - Mid -->
            <li class="nav-item">
                <a class="nav-link" href="./View_Students.php">
                    <i class="fas fa-user-graduate"></i>
                    <span>View Students</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 ">
                        <span>Welcome Mr. <?php echo $LoginAdminName; ?></span>

                    </div>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                                <img class="img-profile rounded-circle" src="Assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">



                                <a class="dropdown-item" href="./Logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->