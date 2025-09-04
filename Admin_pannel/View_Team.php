<?php
include './Admin_Header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Team Members</h1>
    <p class="mb-4">This section is displays the list of team members along with their profile picture, name, and Facebook ID link. Only authorized personnel can view and manage this information, editing, or removing team members.</p>


    <!-- for deleting a department -->
    <?php
    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];

        // Tch name
        $Member_select = "select * from our_teams where Member_ID = $ID";
        $Member_ne_run = mysqli_query($dblink, $Member_select);
        $fetch_data = mysqli_fetch_array($Member_ne_run);

        $Member_Name_is = $fetch_data[1];



        $query = "delete from our_teams where Member_ID = $ID";
        $sk = mysqli_query($dblink, $query);

        if ($sk) {


            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <b>' . $LoginAdminName . '</b> you remove   <b>' . $Member_Name_is . '</b> from Team.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
    }


    ?>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Team Record</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Facebook Link</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from our_teams";

                        $run = mysqli_query($dblink, $query);
                        $id = 1;
                        while ($fetch  = mysqli_fetch_array($run)) {
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $fetch[1]; ?></td>
                                <td><?php echo $fetch[2]; ?></td>
                                <td><a href="<?php echo $fetch[3]; ?>"><?php echo $fetch[3]; ?></a></td>
                                <td><img style="width: 100px;" src="./Pictures/Our_teams/<?php echo $fetch[4]; ?>" alt=""></td>
                                <td>

                                    <a href="View_Team.php?ID=<?php echo  $fetch[0]; ?>" class="btn btn-danger mb-1" onclick="return confirm('Are you sure.')"><i class="fas fa-trash" id="deleteIcon"></i></a>
                                    <a href="./Update_Member_Record.php?Member_ID=<?php echo  $fetch[0]; ?>" class="btn btn-primary"><i class="fas fa-redo" id="alternativeUpdateIcon"></i></a>

                                </td>
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