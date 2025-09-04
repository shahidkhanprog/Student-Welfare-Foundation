<?php
include './Admin_Header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transferred Donations</h1>
    <p class="mb-4">Below is a list of all transferred donations along with their details.</p>

    <!-- Transfers Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transfer History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Receiver Name</th>
                            <th>Amount (Rs)</th>
                            <th>Reason</th>
                            <th>Receipt Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM donation_transfers";
                        $run = mysqli_query($dblink, $query);
                        $id = 1;

                        while ($fetch = mysqli_fetch_array($run)) {
                            $receiptPath = "./Pictures/Donation Receipts/" . $fetch['Receipt_Image'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $fetch['Receiver_Name']; ?></td>
                                <td>Rs. <?php echo $fetch['Amount']; ?></td>
                                <td><?php echo $fetch['Reason']; ?></td>
                                <td>
                                    <?php if (file_exists($receiptPath)) { ?>
                                        <a href="<?php echo $receiptPath; ?>" target="_blank">
                                            <img src="<?php echo $receiptPath; ?>" width="70" height="70" style="object-fit:cover;">
                                        </a>
                                    <?php } else { ?>
                                        <span style="color:red;">No Image</span>
                                <?php }

                                    $id++;
                                }
                                ?>
                                </td>
                            </tr>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th colspan="1"><?php echo $TranferAmountFromDonation;?></th>
                            <th colspan="1">Remining Amount</th>
                            <th colspan="1"><?php echo $reminingAmount;?></th>
                        </tr>
                    </tfoot>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include './Admin_Footer.php';
?>