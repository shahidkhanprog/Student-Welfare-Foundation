
<?php
include './Connection.php';
// code for the redirect to admin dashboard when session is set for admin
  if(isset($_SESSION["Session_Admin_Gmail"]) and isset($_SESSION["Session_Admin_Password"])){
    header("location:./Admin_Pannel/Dashboard.php");
  }?>
  <!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Type</title>
  <link rel="stylesheet" href="CustomCSS/choice.css">
</head>

<body>
  <section>
    <h1>Choose Registration Type</h1>

    <div class="choice-buttons">
      <a href="student_register.php" class="btn">Register as Student</a>
      <a href="donor_register.php" class="btn">Register as Donor</a>
    </div>
  </section>
</body>

</html>