<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donor Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  
    <link rel="stylesheet" href="CustomCSS/register css.css" />
  </head>

  <body>
    <section>

    <?php
    include './Connection.php';
    
    if(isset($_POST['DonorLogin'])){

      $DonorGmail = $_POST['DonorEmail'];
      $DonorPassword = $_POST['DonorPassword'];

      
      $check_qry1 = "select * from donor_registration where Email = '$DonorGmail' and Donor_Password = '$DonorPassword'";
      $run_qry1 = mysqli_query($dblink, $check_qry1);
      $check_record1 =  mysqli_num_rows($run_qry1);


      if ($check_record1 != 0) {

        $_SESSION["Session_Donor_Gmail"] = $DonorGmail;
        $_SESSION["Session_Donor_Password"] = $DonorPassword;

        header("location: ./index.php");
      } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Please check your Details <b>(Email, Password</b>).
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
    }
    

    ?>
      <form id="studentForm"  method="POST">
        <h1>Donor Login</h1>

        <div class="inputbox">
          <input type="email" name="DonorEmail" required  />
          <label>Email</label>
        </div>

        <div class="inputbox">
          <input
            type="text"
            name="DonorPassword"
            required
          />
          <label>Password</label>
        </div>

        <button type="submit" name="DonorLogin">Login</button>
      </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  
  </body>
</html>
