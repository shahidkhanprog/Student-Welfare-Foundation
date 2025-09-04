<?php
include '../Connection.php';

if (isset($_SESSION["Session_Donor_Gmail"]) and isset($_SESSION["Session_Donor_Password"])) {
  $Donor_Gmail_from_ses = $_SESSION["Session_Donor_Gmail"];
  $Donor_Password_from_ses = $_SESSION["Session_Donor_Password"];

  $select = "select * from donor_registration where Email = '$Donor_Gmail_from_ses' and Donor_Password = '$Donor_Password_from_ses'";
  $run = mysqli_query($dblink, $select);
  $fetch = mysqli_fetch_array($run);
  $LoginDonorName = $fetch[1];
  $LoginDonorID = $fetch[0];
}
if (empty($Donor_Gmail_from_ses) && empty($Donor_Password_from_ses)) {
  header("location: ../DonorLogin.php");
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donoration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background: linear-gradient(to right, #11998e, #38ef7d);
    }
  </style>

</head>

<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row w-100">
      <div class="col-md-6 mx-auto">

        <?php



        if (isset($_POST['Add'])) {
          $amount = $_POST['amount'];
          $account_number = $_POST['account_number'];

          $Slip_Image = $_FILES["screenshot"]["name"];

          $path = "./Slips/";



          $qry = "insert into  donation_history values ('$LoginDonorID', '$amount','$Slip_Image', '$account_number') ";

          $RUN = mysqli_query($dblink, $qry);
          if ($RUN and move_uploaded_file($_FILES["screenshot"]["tmp_name"], $path . $Slip_Image)) {

            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>' . $LoginDonorName . '</strong> you successfully added a donation of <b>PKR ' . $amount . '</b>!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          }
        }
        ?>
        <form class="p-4 bg-white rounded shadow" action="#" method="POST" enctype="multipart/form-data">
          <!-- Donation Amount -->
          <div class="mb-3">
            <label for="amount" class="form-label">Donation Amount (PKR)</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
          </div>

          <!-- Select Account Type -->
          <div class="mb-3">
            <label for="account_number" class="form-label">Select Donation Account</label>
            <select class="form-control" id="account_number" name="account_number" required>
              <option value="">-- Select an option --</option>
              <option value="1252299591542">UBL (1252299591542)</option>
              <option value="03423005942">Easypaisa (03423005942)</option>
            </select>
          </div>

          <!-- Upload Screenshot -->
          <div class="mb-3">
            <label for="screenshot" class="form-label">Upload Donation Screenshot (Slip)</label>
            <input type="file" class="form-control" id="screenshot" name="screenshot" accept="image/*" required>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-success w-100" name="Add">Submit Donation</button>
        </form>

      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>