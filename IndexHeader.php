<?php
include './Connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Students Welfare Foundation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="Assets/Images/img10.jpg" rel="icon">

    <!--<link href="register_choice.html"> -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Sevillana&display=swap"
        rel="stylesheet">



    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="Assets/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="Assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./CustomCSS/CustomStyle.css" rel="stylesheet">

    <style>
        .sevillana-regular {
            font-family: "Caveat", cursive;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;

        }

        /* Define how the active link looks. */
        .nav-link {
            color: gray;
            text-decoration: none;
            padding: 10px;
        }

        .nav-link.active {
            color: blue;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="top-bar-left">
                        <div class="text">
                            <i class="fa fa-phone-alt"></i>
                            <p>0342-300-5942</p>
                        </div>
                        <div class="text">
                            <i class="fa fa-envelope"></i>
                            <p>inuwalfare8@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-bar-right">
                        <div class="social">

                            <a href="https://www.facebook.com/people/Student-Welfare-Foundation/61560943042557/?mibextid=ZbWKwL"
                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand sevillana-regular" style="color: #FDBE33;">INU Students <span
                    style="color: #fff;">Welfare</span> Foundation</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <!-- <a href="index.php"  class="nav-item nav-link ">Home</a> -->
                    <a href="#about" class="nav-item nav-link">About</a>
                    <a href="#service" class="nav-item nav-link">services</a>
                    <a href="#team" class="nav-item nav-link">Team</a>
                    <?php if (isset($_SESSION["Session_Donor_Gmail"]) and isset($_SESSION["Session_Donor_Password"])) { ?>

                        <a href="Donor/Donation_Form.php" class="nav-item nav-link">Donate</a>
                        <a href="./Admin_pannel/Logout.php" class="nav-item nav-link">LogOut</a>
                    <?php }else{ ?>
                    <a href="Login_choice.php" class="nav-item nav-link">Login</a>
                    <a href="register_choice.php" class="nav-item nav-link">Registration</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="Assets/Images/img1.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1>Empowering Students for a Brighter Future: </h1>
                        <p>
                            Welcome to Students Welfare Foundation</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="Assets/Images/img2.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1>Become a Part of Our Mission</h1>
                        <p>
                            Get involved with the Student Welfare Foundation and become a part of our mission to make
                            education accessible
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="Assets/Images/img3.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1>Bringing smiles to millions</h1>
                        <p>
                            Bringing smiles to millions, one student at a time, by providing the support they need to
                            achieve their dreams
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->