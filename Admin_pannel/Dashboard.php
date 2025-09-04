<?php
include './Admin_Header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <span><b>Login Email: <?php echo $Admin_Gmail_from_ses; ?></b></span>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Admins Card-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Admins
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                $select_query_for_all_admin = "select * from admin";
                                $select_query_for_all_admin_run = mysqli_query($dblink, $select_query_for_all_admin);
                                $all_ad_No = 0;
                                while ($fetch  = mysqli_fetch_array($select_query_for_all_admin_run)) {
                                    $all_ad_No += 1;
                                }
                                echo $all_ad_No;
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user-shield fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members Card-->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="./View_Team.php" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Team Members</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                    $select_query_for_all_Member = "select * from our_teams";
                                    $select_query_for_all_Member_run = mysqli_query($dblink, $select_query_for_all_Member);
                                    $all_No = 0;
                                    while ($fetch  = mysqli_fetch_array($select_query_for_all_Member_run)) {
                                        $all_No += 1;
                                    }
                                    echo $all_No;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Team -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="./Donation_History.php" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Donation History</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                    $select_query_for_all_Donation = "select * from donation_history";
                                    $select_query_for_all_Donation_run = mysqli_query($dblink, $select_query_for_all_Donation);
                                    $all_No = 0;
                                    while ($fetch  = mysqli_fetch_array($select_query_for_all_Donation_run)) {
                                        $all_No += 1;
                                    }
                                    echo $all_No;
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <!-- Team -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="./View_Students.php" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Registered Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                    $select_query_for_all_Student = "select * from students_registration";
                                    $select_query_for_all_Student_run = mysqli_query($dblink, $select_query_for_all_Student);
                                    $all_No = 0;
                                    while ($fetch  = mysqli_fetch_array($select_query_for_all_Student_run)) {
                                        $all_No += 1;
                                    }
                                    echo $all_No;
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Content Row -->

        <div class="row">


        </div>
    </div>
    <!-- /.container-fluid -->
</div>


<?php
include './Admin_Footer.php';
?>