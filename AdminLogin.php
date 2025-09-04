<?php
include './Connection.php';


// code for the redirect to admin dashboard when session is set for admin
if (isset($_SESSION["Session_Admin_Gmail"]) and isset($_SESSION["Session_Admin_Password"])) {
  header("location:./Admin_Pannel/Dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="CustomCSS/register css.css" />
</head>

<body>

  <section>
    <?php

    if (isset($_POST['Admin_Login'])) {

      $AdminGmail = $_POST['Admin_Gmail'];
      $AdminPassword = $_POST['Admin_Password'];

      // echo $AdminGmail ," ", $AdminPassword;

      $check_qry1 = "select * from admin where Admin_Gmail = '$AdminGmail' and Admin_Password = '$AdminPassword'";
      $run_qry1 = mysqli_query($dblink, $check_qry1);
      $check_record1 =  mysqli_num_rows($run_qry1);


      if ($check_record1 != 0) {

        $_SESSION["Session_Admin_Gmail"] = $AdminGmail;
        $_SESSION["Session_Admin_Password"] = $AdminPassword;

        header("location: ./Admin_pannel/Dashboard.php");
      } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Please check your Details <b>(Email, Password</b>).
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
    }

    ?>
    <form id="studentForm" method="post">
      <h1>Admin Login</h1>

      <div class="inputbox">
        <input type="email" name="Admin_Gmail" value="<?php if (isset($_POST['Admin_Gmail'])) {
            echo $AdminGmail;
          } ?>" required />
        <label>Email</label>
      </div>

      <div class="inputbox">
        <input
          type="password"
          name="Admin_Password"
          required />
        <label>Password</label>
      </div>

      <button type="submit" name="Admin_Login">Login</button>
    </form>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>