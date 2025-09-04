<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donor Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="CustomCSS/register css.css" />
</head>

<body>
  <section>
    <form id="donorForm" method="POST">

      <?php
      include './Connection.php';

      if (isset($_POST['AddDonor'])) {
        $donorName = $_POST['donorName'];
        $organization = $_POST['organization'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $accountNo = $_POST['accountNo'];
        $donorPassword = $_POST['donor_password'];

        // Check if donor with same email or phone exists
        $checkQuery = "SELECT * FROM donor_registration WHERE Email = '$email' OR Phone = '$phone'";
        $result = mysqli_query($dblink, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            A donor with this <strong>Email</strong> or <strong>Phone</strong> already exists. <a href="./DonorLogin.php">Login here</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
          $insertQuery = "INSERT INTO donor_registration (Donor_Name, Organization, Phone, Email, Address, Account_No, Donor_Password)
                          VALUES ('$donorName', '$organization', '$phone', '$email', '$address', '$accountNo', '$donorPassword')";

          if (mysqli_query($dblink, $insertQuery)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>',$donorName,'</strong> you have been registered successfully. <a href="./DonorLogin.php">Login Here </a>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Error while registering: ' . mysqli_error($dblink) . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
        }
      }
      ?>

      <h1>Donor Registration</h1>

      <div class="inputbox">
        <input type="text" name="donorName" placeholder="Enter donor name" required />
        <label>Donor Name</label>
      </div>

      <div class="inputbox">
        <input type="text" name="organization" placeholder="Enter organization (optional)" />
        <label>Organization (Optional)</label>
      </div>

      <div class="inputbox">
        <input type="tel" name="phone" placeholder="Enter phone number" required />
        <label>Phone Number</label>
      </div>

      <div class="inputbox">
        <input type="email" name="email" placeholder="Enter email address" required />
        <label>Email</label>
      </div>
      
      <div class="inputbox">
        <input type="text" name="donor_password" placeholder="Enter simple password" required />
        <label>Donor Password</label>
      </div>

      <div class="inputbox">
        <input type="text" name="address" placeholder="Enter address" required />
        <label>Address</label>
      </div>
      <div class="inputbox">
        <input type="text" name="accountNo" placeholder="Enter account number" required />
        <label>Acount No</label>
      </div>

      <button type="submit" name="AddDonor">Register</button>
    </form>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>