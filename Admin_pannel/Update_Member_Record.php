<?php
include './Admin_Header.php';
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-4 ">
    <h1 class="h3 mb-0 text-gray-800">Update Member Data</h1>
    <span>Login Email: <?php echo $Admin_Gmail_from_ses; ?></span>
</div>


<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            <?php
            if (isset($_GET['Member_ID'])) {
                $MemberID = $_GET['Member_ID'];
                $select_th_record = "select * from our_teams where Member_ID = $MemberID";
                $select_th_record_run = mysqli_query($dblink, $select_th_record);

                $Member_old_data = mysqli_fetch_array($select_th_record_run);
                $Teacher_old_Img = $Member_old_data[4];
            }

            $MemberName_Req = $MemberPosition_Req = $MemberFacebookLink_Req =  null;



            if (isset($_POST["Update_Record"])) {

                $MemberName = $_POST['Member_Name'];
                $MemberPosition = $_POST['Member_Position'];
                $MemberFacebookLink = $_POST['Member_Facebook_Link'];

                $Member_Image = $_FILES["Member_Img"]["name"];

                $path = "./Pictures/Our_teams/";


                // custom error str
                if (empty($MemberName)) {
                    $MemberName_Req = "Please Enter Member Name";
                }
                if (empty($MemberPosition)) {
                    $MemberPosition_Req = "Please Enter Member Position";
                }
                if (empty($MemberFacebookLink)) {
                    $MemberFacebookLink_Req = "Please Enter Facebook Link";
                }

                if (empty($MemberName_Req) and empty($MemberPosition_Req) and empty($MemberFacebookLink_Req)) {
                    if (!(empty($Member_Image))) {

                        $qry = "UPDATE our_teams
                            SET
                                Member_Name = '$MemberName',
                                Member_Positions = '$MemberPosition',
                                Member_Facebook_Link = '$MemberFacebookLink',
                                Member_Picture = '$Member_Image'
                            WHERE Member_ID = '$MemberID'";

                        $RUN = mysqli_query($dblink, $qry);

                        if ($RUN && move_uploaded_file($_FILES["Member_Img"]["tmp_name"], $path . $Member_Image)) {

                            // echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            // <b>' . $LoginAdminName . '</b>, you updated <b>' . $MemberName . '</b>\'s information in Our Team!
                            // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            // <span aria-hidden="true">&times;</span>
                            // </button>
                            // </div>';
                            header("location: ./View_Team.php");

                            // $MemberName = $MemberPosition = $MemberFacebookLink = null;
                        }
                    } else {
                        $qry = "UPDATE our_teams
                            SET
                                Member_Name = '$MemberName',
                                Member_Positions = '$MemberPosition',
                                Member_Facebook_Link = '$MemberFacebookLink'
                            WHERE Member_ID = '$MemberID'";

                        $RUN = mysqli_query($dblink, $qry);

                        if ($RUN) {

                            // echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            // <b>' . $LoginAdminName . '</b>, you updated <b>' . $MemberName . '</b>\'s information in Our Team!
                            // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            // <span aria-hidden="true">&times;</span>
                            // </button>
                            // </div>';
                            header("location: ./View_Team.php");

                            // $MemberName = $MemberPosition = $MemberFacebookLink = null;
                        }
                        
                    }
                }
            }


            ?>

            <div class="card">
                <div class="card-header bg-info">
                    <b style="color: white;"> Update Here</b>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-4">
                            <label for="Member_Name" class="form-label">Enter Member Name<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" id="Member_Name" name="Member_Name" placeholder="Member Name" value="<?php if (isset($_POST['Member_Name'])) {
                                                                                                                                                echo $MemberName;
                                                                                                                                            } else {
                                                                                                                                                echo $Member_old_data[1];
                                                                                                                                            } ?>">
                            <span style="color: red;"><?Php echo $MemberName_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Member_Position" class="form-label">Member Position<sup><b style="color: red;">*</b></sup></label>
                            <input type="Text" class="form-control" id="Member_Position" name="Member_Position" placeholder="Member Position" value="<?php if (isset($_POST['Member_Position'])) {
                                                                                                                                                            echo $MemberPosition;
                                                                                                                                                        } else {
                                                                                                                                                            echo $Member_old_data[2];
                                                                                                                                                        } ?>">
                            <span style="color: red;"><?Php echo $MemberPosition_Req; ?></span>
                        </div>


                        <div class="mb-4">
                            <label for="Member_Facebook_Link" class="form-label">Member Facebook Link<sup><b style="color: red;">*</b></sup></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="Member_Facebook_Link" name="Member_Facebook_Link" placeholder="https://www.facebook.com" value="<?php if (isset($_POST['Member_Facebook_Link'])) {
                                                                                                                                                                                echo $MemberFacebookLink;
                                                                                                                                                                            } else {
                                                                                                                                                                                echo $Member_old_data[3];
                                                                                                                                                                            } ?>">

                            </div>
                            <span style="color: red;"><?Php echo $MemberFacebookLink_Req; ?></span>
                        </div>


                        <div>
                            <?php if ($Member_old_data[4]) { ?>
                                <img style="width: 200px; height: 200px; border-radius: 60%; border: 3px solid red;" src="./Pictures/Our_teams/<?php echo $Member_old_data[4]; ?>" class="mx-3" alt="ll">
                            <?php } ?>
                        </div>

                        <div class="mb-4 mt-3">
                            <label for="Member_Img" class="form-label">If you want to Change Picture</label>
                            <input type="file" class="form-control" id="Member_Img" name="Member_Img" accept="image/*">

                        </div>

                        <button class="btn btn-info px-4 py-2" name="Update_Record">Update</button>
                    </form>
                </div>
            </div>




        </div>
    </div>
</div>

<?php
include './Admin_Footer.php';
?>