<?php
include './Admin_Header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Registered Donors</h1>
    <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis vero cumque illo soluta. Dolores facilis deleniti sequi mollitia fuga molestias voluptas nulla. Alias vero incidunt optio corporis obcaecati modi ipsum!</p>


  <!-- Delete Donor Logic -->
    <?php
    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];

        $selectQuery = "SELECT * FROM donor_registration WHERE Donor_ID = $ID";
        $result = mysqli_query($dblink, $selectQuery);
        $fetch_data = mysqli_fetch_array($result);

        $DonorName = $fetch_data['Donor_Name'];

        $deleteQuery = "DELETE FROM donor_registration WHERE Donor_ID = $ID";
        $delete = mysqli_query($dblink, $deleteQuery);

        if ($delete) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b>' . $LoginAdminName . '</b> removed donor <b>' . $DonorName . '</b> from the system.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
        }
    }
    ?>


    <!-- Donors Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Students Record</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Account No</th>
                        </tr>
                    </thead>
                     <tbody>
                        <?php
                        $query = "SELECT * FROM donor_registration";
                        $run = mysqli_query($dblink, $query);
                        $id = 1;

                        while ($fetch = mysqli_fetch_array($run)) {
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $fetch['Donor_Name']; ?></td>
                                <td><?php echo $fetch['Organization']; ?></td>
                                <td><?php echo $fetch['Phone']; ?></td>
                                <td><?php echo $fetch['Email']; ?></td>
                                <td><?php echo $fetch['Donor_Password']; ?></td>
                                <td><?php echo $fetch['Address']; ?></td>
                                <td><?php echo $fetch['Account_No']; ?></td>
                            
                            </tr>
                        <?php
                            $id++;
                        }
                        ?>
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