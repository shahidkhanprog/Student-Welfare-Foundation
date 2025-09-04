<?php
include './Admin_Header.php';
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-4 ">
    <h1 class="h3 mb-0 text-gray-800">Add New Team Member</h1>
    <span>Login Email: <?php echo $Admin_Gmail_from_ses; ?></span>
</div>


<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            <?php
            $MemberName_Req = $MemberPosition_Req = $MemberFacebookLink_Req = $Member_Image_req = null;

            if (isset($_POST["AddMember"])) {

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

                if (empty($Member_Image)) {
                    $Member_Image_req = "Image required";
                }

                // custom error END

                if (empty($MemberName_Req) && empty($MemberPosition_Req) && empty($MemberFacebookLink_Req) && empty($Member_Image_req)) {



                    $qry = "insert into our_teams (Member_Name, Member_Positions, Member_Facebook_Link, Member_Picture) values ('$MemberName', '$MemberPosition', '$MemberFacebookLink', '$Member_Image')";

                    $RUN = mysqli_query($dblink, $qry);
                    if ($RUN and move_uploaded_file($_FILES["Member_Img"]["tmp_name"], $path . $Member_Image)) {


                        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <b>' . $LoginAdminName . '</b> you add <b>' . $MemberName . '</b> in the Our Team!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                        $MemberName = $MemberPosition = $MemberFacebookLink = null;
                    }
                }
            }
            ?>


            <div class="card">
                <div class="card-header bg-info">
                    <b style="color: white;"> Add New Member</b>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-4">
                            <label for="Member_Name" class="form-label">Enter Member Name<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" id="Member_Name" name="Member_Name" placeholder="Member Name" value="<?php if (isset($_POST['Member_Name'])) {
                                                                                                                                            echo $MemberName;
                                                                                                                                        } ?>">
                            <span style="color: red;"><?Php echo $MemberName_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Member_Position" class="form-label">Member Position<sup><b style="color: red;">*</b></sup></label>
                            <input type="Text" class="form-control" id="Member_Position" name="Member_Position" placeholder="Member Position"  value="<?php if (isset($_POST['Member_Position'])) {
                                                                                                                                                    echo $MemberPosition;
                                                                                                                                                } ?>">
                            <span style="color: red;"><?Php echo $MemberPosition_Req; ?></span>
                        </div>


                        <div class="mb-4">
                            <label for="Member_Facebook_Link" class="form-label">Member Facebook Link<sup><b style="color: red;">*</b></sup></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="Member_Facebook_Link" name="Member_Facebook_Link" placeholder="https://www.facebook.com">
                                
                            </div>
                            <span style="color: red;"><?Php echo $MemberFacebookLink_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Member_Img" class="form-label">Member Picture<sup><b style="color: red;">*</b></sup></label>
                            <input type="file" class="form-control" id="Member_Img" name="Member_Img" accept="image/*">
                            <span style="color: red;"><?Php echo $Member_Image_req; ?></span>
                        </div>

                        <button class="btn btn-info px-4 py-2" name="AddMember">Add To Team</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include './Admin_Footer.php';
?>