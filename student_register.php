<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="CustomCSS/register css.css" />
</head>

<body>
  <section>
    <form id="studentForm" method="POST">
      <?php
      include './Connection.php';

      if (isset($_POST['AddStudent'])) {
        $StudentID = $_POST['Student_ID'];
        $StudentName = $_POST['Student_Name'];
        $StudentDept = $_POST['Student_Dept'];
        $StudentPassword = $_POST['Student_Pass'];
        $StudentAddress = $_POST['Student_Address'];
        $StudentAccNo = $_POST['Student_Acc_No'];
        $StudentGmail = $_POST['Student_Gmail'];
        $MonthlyIncomeStatement = $_POST['Student_Monthly_Income_Statement'];
        $StudentGaurdianCNIC = $_POST['Student_Gaurdian_CNIC'];

        // Check if Student_ID already exists
        $checkQuery = "SELECT * FROM students_registration WHERE Student_ID = '$StudentID'";
        $result = mysqli_query($dblink, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
          // Student ID already exists
          $existingStudent = mysqli_fetch_assoc($result);
          // or show name if there's a name column
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  This Student ID (', $StudentID, ') is already issued to: <strong>', $existingStudent["Student_Name"], '</strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        } else {
          // Insert data if ID is not already issued
          $query = "INSERT INTO students_registration
            (Student_ID,Student_Name, Dept, Password, Address, Account_No, Gmail, Monthly_Income_State, Gaurdian_cnic)
            VALUES
            ('$StudentID','$StudentName', '$StudentDept', '$StudentPassword', '$StudentAddress', '$StudentAccNo', '$StudentGmail', '$MonthlyIncomeStatement', '$StudentGaurdianCNIC')";

          if (mysqli_query($dblink, $query)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>', $StudentName, '</strong>  you are registered successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

            $StudentID = $StudentName = $StudentDept = $StudentPassword = $StudentAddress = $StudentAccNo = $StudentGmail = $MonthlyIncomeStatement = $StudentGaurdianCNIC = null;
          } else {
            echo "Error inserting data: " . mysqli_error($dblink);
          }
        }
      }
      ?>
      <h1>Student Registration</h1>

      <div class="inputbox">
        <input
          type="text"
          id="fourDigitInput"
          maxlength="4"
          pattern="\d{4}"
          title="Please enter exactly 4 digits"
          placeholder="enter 4 digits your ID"
          name="Student_ID"
          value="<?php if (isset($_POST['AddStudent'])) {
                    echo $StudentID;
                  } ?>"
          required />
        <label>Student ID<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input type="text" name="Student_Name" placeholder="enter Your Name" value="<?php if (isset($_POST['AddStudent'])) {
                                                        echo $StudentName;
                                                      } ?>" required />
        <label>Student Name<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input type="text" name="Student_Dept" placeholder="enter Department Name" value="<?php if (isset($_POST['AddStudent'])) {
                                                        echo $StudentDept;
                                                      } ?>" required />
        <label>Department<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input
          type="text"
          id="fourDigitInput"
          maxlength="4"
          pattern="\d{4}"
          title="Please enter exactly 4 digits"
          placeholder="enter 4 digits Password"
          name="Student_Pass"
          value="<?php if (isset($_POST['AddStudent'])) {
                    echo $StudentPassword;
                  } ?>"
          required />
        <label>Password<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input type="text" name="Student_Address" placeholder="enter your Address" value="<?php if (isset($_POST['AddStudent'])) {
                                                            echo $StudentAddress;
                                                          } ?>" required />
        <label>Address<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input type="text" name="Student_Acc_No" placeholder="enter Account Number" value="<?php if (isset($_POST['AddStudent'])) {
                                                          echo $StudentAccNo;
                                                        } ?>" required />
        <label>Account Number<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input type="email" name="Student_Gmail" placeholder="enter gmail" value="<?php if (isset($_POST['AddStudent'])) {
                                                          echo $StudentGmail;
                                                        } ?>" required />
        <label>Email<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input
          type="text"
          name="Student_Monthly_Income_Statement"
          value="<?php if (isset($_POST['AddStudent'])) {
                    echo $MonthlyIncomeStatement;
                  } ?>"
          required >
        <label>Monthly Income Statement<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <div class="inputbox">
        <input
          type="text"
          id="thirteenDigitInput"
          maxlength="13"
          title="Please enter exactly 13 digits"
          name="Student_Gaurdian_CNIC"
          value="<?php if (isset($_POST['AddStudent'])) {
                    echo $StudentGaurdianCNIC;
                  } ?>"
          required />
        <label>Gaurdian CNIC<span style="color:red; font-size:19px;">*</span></label>
      </div>

      <button type="submit" name="AddStudent">Register</button>
    </form>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>