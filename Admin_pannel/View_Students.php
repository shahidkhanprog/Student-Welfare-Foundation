<?php
include './Admin_Header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Registered Students Record</h1>
    <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis vero cumque illo soluta. Dolores facilis deleniti sequi mollitia fuga molestias voluptas nulla. Alias vero incidunt optio corporis obcaecati modi ipsum!</p>


    <!-- for deleting a department -->
<?php
if (isset($_GET["ID"])) {
    $ID = $_GET["ID"];

    // Tch name
    $Student_select = "select * from students_registration where Student_ID = $ID";
    $Student_ne_run = mysqli_query($dblink, $Student_select);
    $fetch_data = mysqli_fetch_array($Student_ne_run);

    $Student_Name_is = $fetch_data[1];



    $query = "delete from students_registration where Student_ID = $ID";
    $sk = mysqli_query($dblink, $query);

    if ($sk) {


        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <b>' . $LoginAdminName . '</b> you remove   <b>' . $Student_Name_is . '</b> from Student table.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
}

?>

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
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Account Number</th>
                            <th>Gmail</th>
                            <th>Monthly Income Statement</th>
                            <th>Guardian CNIC</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $query = "select * from students_registration";

                        $run = mysqli_query($dblink, $query);
                        $id = 1;
                        while ($fetch  = mysqli_fetch_array($run)) {
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $fetch[0]; ?></td>
                                <td><?php echo $fetch[1]; ?></td>
                                <td><?php echo $fetch[2]; ?></td>
                                <td><?php echo $fetch[3]; ?></td>
                                <td><?php echo $fetch[4]; ?></td>
                                <td><?php echo $fetch[5]; ?></td>
                                <td><?php echo $fetch[6]; ?></td>
                                <td><?php echo $fetch[7]; ?></td>
                                <td><?php echo $fetch[8]; ?></td>
                                <td>

                                    <a href="View_Students.php?ID=<?php echo  $fetch[0];?>" class="btn btn-danger mb-1" onclick="return confirm('Are you sure.')"><i class="fas fa-trash" id="deleteIcon"></i></a>
                                    <a href="./Update_Student_Record.php?ID=<?php echo  $fetch[0]; ?>" class="btn btn-primary"><i class="fas fa-redo" id="alternativeUpdateIcon"></i></a>

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