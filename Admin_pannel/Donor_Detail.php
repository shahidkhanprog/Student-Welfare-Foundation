<?php
include './Admin_Header.php';
?>


<div class="container-fluid">

    <?php
    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];

        $selectQuery = "SELECT * FROM donor_registration WHERE Donor_ID = $ID";
        $result = mysqli_query($dblink, $selectQuery);
        $fetch_data = mysqli_fetch_array($result);
    }

    ?>


    <div class="table-responsive">
        <h1>Mr <?php echo $fetch_data[1]; ?> Donor Details</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Organization</th>
                    <th>Phone</th>
                    <th>Gmail</th>
                    <th>Address</th>
                    <th>Account No</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php echo $fetch_data[0]; ?></td>
                    <td><?php echo $fetch_data[1]; ?></td>
                    <td><?php echo $fetch_data[2]; ?></td>
                    <td><?php echo $fetch_data[3]; ?></td>
                    <td><?php echo $fetch_data[4]; ?></td>
                    <td><?php echo $fetch_data[5]; ?></td>
                    <td><?php echo $fetch_data[6]; ?></td>
                    <td><?php echo $fetch_data[7]; ?></td>
                </tr>

            </tbody>
            
        </table>
    </div>

    <h2>Donation History</h2>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th>S.NO</th>
                <th>Amount</th>
                <th>Donate To</th>
                <th>Slip</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM donation_history where Donor = $fetch_data[0]";
            $run = mysqli_query($dblink, $query);
            $id = 1;
                $DonatedAmount = 0;
            while ($fetch = mysqli_fetch_array($run)) {

                $Donor_record = "select * from donor_registration where Donor_ID = '$fetch[0]'";
                $Donor_record_run = mysqli_query($dblink, $Donor_record);
                $Donor_record_fetch = mysqli_fetch_array($Donor_record_run);

            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $fetch[1]; $DonatedAmount+=$fetch[1];  ?></td>
                    <td><?php echo $fetch[3]; ?></td>
                    <td><img src="../Donor/Slips/<?php echo $fetch[2]; ?>" height="100px" alt=""></td>
                </tr>
            <?php
                $id++;
            }
            ?>
        </tbody>
        <tfoot>
                <th colspan="1">Total Amount</th>
                <th colspan="3"><?PhP echo $DonatedAmount," PKR"; ?></th>
            </tfoot>
    </table>


</div>
<?php
include './Admin_Footer.php';
?>