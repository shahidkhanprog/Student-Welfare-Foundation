<?php
include './Admin_Header.php';
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-4 ">
    <h1 class="h3 mb-0 text-gray-800">Transfer Money from Donated</h1>
    <span>Login Email: <?php echo $Admin_Gmail_from_ses; ?></span>
</div>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            <?php
            $ReceiverName_Req = $Amount_Req = $Reason_Req = $Receipt_Image_Req = null;

            if (isset($_POST["TransferMoney"])) {

                $ReceiverName = $_POST['Receiver_Name'];
                $Amount = $_POST['Amount'];
                $Reason = $_POST['Reason'];
                $Receipt_Image = $_FILES["Receipt_Image"]["name"];

                $path = "./Pictures/Donation Receipts/";

                // Validations
                if (empty($ReceiverName)) {
                    $ReceiverName_Req = "Please enter the receiver's name.";
                }
                if (empty($Amount)) {
                    $Amount_Req = "Please enter the amount.";
                }
                if($reminingAmount < $Amount){
                    $Amount_Req = "We have only ".$reminingAmount." In Account";
                }
                if (empty($Reason)) {
                    $Reason_Req = "Please enter the reason.";
                }
                if (empty($Receipt_Image)) {
                    $Receipt_Image_Req = "Receipt image is required.";
                }

                if (empty($ReceiverName_Req) && empty($Amount_Req) && empty($Reason_Req) && empty($Receipt_Image_Req)) {

                    $qry = "INSERT INTO donation_transfers (Receiver_Name, Amount, Reason, Receipt_Image) VALUES ('$ReceiverName', '$Amount', '$Reason', '$Receipt_Image')";
                    $RUN = mysqli_query($dblink, $qry);

                    if ($RUN && move_uploaded_file($_FILES["Receipt_Image"]["tmp_name"], $path . $Receipt_Image)) {
                        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <b>' . $LoginAdminName . '</b>, you have transferred <b>Rs. ' . $Amount . '</b> to <b>' . $ReceiverName . '</b>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                        $ReceiverName = $Amount = $Reason = null;
                    }
                }
            }
            ?>

            <div class="card">
                <div class="card-header bg-info">
                    <b style="color: white;"> Transfer Money  <strong style="color: black;"> Note: that we have only <?php echo $reminingAmount?> PKR in account</strong></b>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-4">
                            <label for="Receiver_Name" class="form-label">Receiver Name<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" id="Receiver_Name" name="Receiver_Name" placeholder="Receiver Name" value="<?php if (isset($_POST['Receiver_Name'])) { echo $ReceiverName; } ?>">
                            <span style="color: red;"><?php echo $ReceiverName_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Amount" class="form-label">Amount (Rs)<sup><b style="color: red;">*</b></sup></label>
                            <input type="number" class="form-control" id="Amount" name="Amount" placeholder="Enter Amount" value="<?php if (isset($_POST['Amount'])) { echo $Amount; } ?>">
                            <span style="color: red;"><?php echo $Amount_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Reason" class="form-label">Reason for Transfer<sup><b style="color: red;">*</b></sup></label>
                            <textarea class="form-control" id="Reason" name="Reason" placeholder="Reason"><?php if (isset($_POST['Reason'])) { echo $Reason; } ?></textarea>
                            <span style="color: red;"><?php echo $Reason_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Receipt_Image" class="form-label">Upload Receipt Image<sup><b style="color: red;">*</b></sup></label>
                            <input type="file" class="form-control" id="Receipt_Image" name="Receipt_Image" accept="image/*">
                            <span style="color: red;"><?php echo $Receipt_Image_Req; ?></span>
                        </div>

                        <button class="btn btn-info px-4 py-2" name="TransferMoney">Transfer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include './Admin_Footer.php';
?>