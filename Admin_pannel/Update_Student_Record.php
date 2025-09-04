<?php
include './Admin_Header.php';
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-4 ">
    <h1 class="h3 mb-0 text-gray-800">Update Student Data</h1>
    <span>Login Email: <?php echo $Admin_Gmail_from_ses; ?></span>
</div>


<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            <?php

            if (isset($_GET['ID'])) {
                // Fetch old data using GET ID
                $StudentID = $_GET['ID'];
                $selectQuery = "SELECT * FROM students_registration WHERE Student_ID = '$StudentID'";
                $result = mysqli_query($dblink, $selectQuery);
                $student_old_data = mysqli_fetch_array($result);

                // Declare variables for validation messages
                $StudentName_Req = $StudentDept_Req = $StudentPass_Req = $StudentAddress_Req = $StudentAccNo_Req = $StudentGmail_Req = $MonthlyIncome_Req = $GuardianCNIC_Req = '';


                if (isset($_POST['Update_Student'])) {
                    $StudentName = $_POST['Student_Name'];
                    $StudentDept = $_POST['Student_Dept'];
                    $StudentPassword = $_POST['Student_Pass'];
                    $StudentAddress = $_POST['Student_Address'];
                    $StudentAccNo = $_POST['Student_Acc_No'];
                    $StudentGmail = $_POST['Student_Gmail'];
                    $MonthlyIncomeStatement = $_POST['Student_Monthly_Income_Statement'];
                    $StudentGaurdianCNIC = $_POST['Student_Gaurdian_CNIC'];

                    if (empty($StudentName)) {
                        $StudentName_Req = "Student Name Required";
                    }

                    if (empty($StudentDept)) {
                        $StudentDept_Req = "Student Department Required";
                    }

                    if (empty($StudentPassword)) {
                        $StudentPass_Req = "Student Password Required";
                    }

                    if (empty($StudentAddress)) {
                        $StudentAddress_Req = "Student Address Required";
                    }

                    if (empty($StudentAccNo)) {
                        $StudentAccNo_Req = "Student Account Required";
                    }
                    if (empty($StudentGmail)) {
                        $StudentGmail_Req = "Student Gmail Required";
                    }

                    if (empty($MonthlyIncomeStatement)) {
                        $MonthlyIncome_Req = "Student MIS Required";
                    }

                    if (empty($StudentGaurdianCNIC)) {
                        $GuardianCNIC_Req = "Student G_CNIC Required";
                    }


                    if(empty($StudentName_Req) and empty($StudentDept_Req) and empty($StudentPass_Req) and empty($StudentAddress_Req) and empty($StudentAccNo_Req) and empty($StudentGmail_Req) and empty($MonthlyIncome_Req) and empty($GuardianCNIC_Req)){

                    $updateQuery = "UPDATE students_registration SET
                        Student_Name = '$StudentName',
                        Dept = '$StudentDept',
                        Password = '$StudentPassword',
                        Address = '$StudentAddress',
                        Account_No = '$StudentAccNo',
                        Gmail = '$StudentGmail',
                        Monthly_Income_State = '$MonthlyIncomeStatement',
                        Gaurdian_cnic = '$StudentGaurdianCNIC'
                    WHERE Student_ID = '$StudentID'";

                    if (mysqli_query($dblink, $updateQuery)) {
                        header("location: ./View_Students.php");
                    } else {
                        echo '<div class="alert alert-danger">Error updating student: ' . mysqli_error($dblink) . '</div>';
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
                            <label for="Student_ID" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="Student_ID" name="Student_ID" value="<?php echo $student_old_data['Student_ID']; ?>" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Name" class="form-label">Student Name<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" id="Student_Name" name="Student_Name" value="<?php echo isset($_POST['Student_Name']) ? $_POST['Student_Name'] : $student_old_data['Student_Name']; ?>">
                            <span style="color: red;"><?php echo $StudentName_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Dept" class="form-label">Department<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" id="Student_Dept" name="Student_Dept" value="<?php echo isset($_POST['Student_Dept']) ? $_POST['Student_Dept'] : $student_old_data['Dept']; ?>">
                            <span style="color: red;"><?php echo $StudentDept_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Pass" class="form-label">Password (4 digits)<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" maxlength="4" pattern="\d{4}" title="Please enter exactly 4 digits" class="form-control" id="Student_Pass" name="Student_Pass" value="<?php echo isset($_POST['Student_Pass']) ? $_POST['Student_Pass'] : $student_old_data['Password']; ?>">
                            <span style="color: red;"><?php echo $StudentPass_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Address" class="form-label">Address<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" id="Student_Address" name="Student_Address" value="<?php echo isset($_POST['Student_Address']) ? $_POST['Student_Address'] : $student_old_data['Address']; ?>">
                            <span style="color: red;"><?php echo $StudentAddress_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Acc_No" class="form-label">Account Number<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" id="Student_Acc_No" name="Student_Acc_No" value="<?php echo isset($_POST['Student_Acc_No']) ? $_POST['Student_Acc_No'] : $student_old_data['Account_No']; ?>">
                            <span style="color: red;"><?php echo $StudentAccNo_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Gmail" class="form-label">Email<sup><b style="color: red;">*</b></sup></label>
                            <input type="email" class="form-control" id="Student_Gmail" name="Student_Gmail" value="<?php echo isset($_POST['Student_Gmail']) ? $_POST['Student_Gmail'] : $student_old_data['Gmail']; ?>">
                            <span style="color: red;"><?php echo $StudentGmail_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Monthly_Income_Statement" class="form-label">Monthly Income Statement<sup><b style="color: red;">*</b></sup></label>
                            <textarea type="text" class="form-control" id="Student_Monthly_Income_Statement" name="Student_Monthly_Income_Statement" ><?php echo isset($_POST['Student_Monthly_Income_Statement']) ? $_POST['Student_Monthly_Income_Statement'] : $student_old_data['Monthly_Income_State']; ?></textarea>
                            <span style="color: red;"><?php echo $MonthlyIncome_Req; ?></span>
                        </div>

                        <div class="mb-4">
                            <label for="Student_Gaurdian_CNIC" class="form-label">Guardian CNIC<sup><b style="color: red;">*</b></sup></label>
                            <input type="text" class="form-control" maxlength="13" id="Student_Gaurdian_CNIC" name="Student_Gaurdian_CNIC" value="<?php echo isset($_POST['Student_Gaurdian_CNIC']) ? $_POST['Student_Gaurdian_CNIC'] : $student_old_data['Gaurdian_cnic']; ?>">
                            <span style="color: red;"><?php echo $GuardianCNIC_Req; ?></span>
                        </div>

                        <button class="btn btn-primary px-4 py-2" name="Update_Student">Update Student</button>
                    </form>
                </div>
            </div>




        </div>
    </div>
</div>

<?php
include './Admin_Footer.php';
?>