<?php
include './Admin_Header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Donation History</h1>
    <p class="mb-4">This section displays a historical record of all donations made by registered donors. You can view the donor name, amount, date, and payment method.</p>

    <!-- Delete Donation Logic -->
    <?php
    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];

        $selectQuery = "SELECT * FROM donation_history WHERE Donation_ID = $ID";
        $result = mysqli_query($dblink, $selectQuery);
        $fetch_data = mysqli_fetch_array($result);

        $DonorName = $fetch_data['Donor_Name'];

        $deleteQuery = "DELETE FROM donation_history WHERE Donation_ID = $ID";
        $delete = mysqli_query($dblink, $deleteQuery);

        if ($delete) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b>' . $LoginAdminName . '</b> removed a donation record of <b>' . $DonorName . '</b> from the system.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
        }
    }
    ?>

    <!-- Donation History Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Donation Records</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Donor Name</th>
                            <th>Amount</th>
                            <th>Donate To</th>
                            <th>Slip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM donation_history ";
                        $run = mysqli_query($dblink, $query);
                        $id = 1;
                        while ($fetch = mysqli_fetch_array($run)) {

                            $Donor_record = "select * from donor_registration where Donor_ID = '$fetch[0]'";
                            $Donor_record_run = mysqli_query($dblink, $Donor_record);
                            $Donor_record_fetch = mysqli_fetch_array($Donor_record_run);

                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><a href="Donor_Detail.php?ID=<?php echo $fetch[0] ?>"><?php echo $Donor_record_fetch[1]; ?></a></td>
                                <td><?php echo $fetch[1]; ?></td>
                                <td><?php echo $fetch[3]; ?></td>
                                <td><img src="../Donor/Slips/<?php echo $fetch[2]; ?>" height="100px" alt=""></td>
                            </tr>
                        <?php
                            $id++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total Donated Amount</th>
                            <th colspan="1"><?PhP echo $TotalDonatedAmount, " PKR" ?></th>
                            <th colspan="1">Remining Amount</th>
                            <th colspan="1"><?PhP echo $reminingAmount, " PKR" ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include './Admin_Footer.php';
?>