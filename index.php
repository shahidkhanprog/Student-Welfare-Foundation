<?Php
include "./IndexHeader.php";
?>
<!-- About Start -->
<div class="about" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img" data-parallax="scroll" data-image-src="Assets/Images/img6.jpg"></div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <p>About Us</p>
                    <h2>Lighting the path to achievement by supporting students in need</h2>
                </div>
                <div class="about-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#tab-content-1">Vision</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#tab-content-2">Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#tab-content-3">Commitment</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-content-1" class="container tab-pane active">
                            At the Student Welfare Foundation, our vision is to foster a supportive academic
                            community where financial challenges do not impede the pursuit of education and personal
                            growth. We aim to create a digital ecosystem that connects students in need with
                            generous donors who are willing to contribute towards their academic success.
                        </div>
                        <div id="tab-content-2" class="container tab-pane fade">
                            Our primary objective is to create an accessible and user-friendly platform where
                            students can articulate their financial needs, and donors can seamlessly contribute to
                            support these needs. We are committed to ensuring a transparent and efficient system for
                            allocating financial aid, promoting a sense of community and support within the academic
                            sphere.
                        </div>
                        <div id="tab-content-3" class="container tab-pane fade">
                            We are committed to enhancing student welfare by making education more accessible to
                            those facing financial constraints. Through effective collaboration between students and
                            donors, we aim to create a positive impact on the academic journeys of many, ensuring
                            that financial challenges do not stand in the way of their educational aspirations.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<!-- Service Start -->
<div class="service" id="service">
    <div class="container">
        <div class="section-header text-center">
            <p>What We Do?</p>
            <h2>We believe that we can save more lifes with you</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-diet"></i>
                    </div>
                    <div class="service-text">
                        <h3>Donation Platform</h3>
                        <p> A secure online platform where individuals can make donations to support students in
                            need.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-water"></i>
                    </div>
                    <div class="service-text">
                        <h3>Financial Assistance Application</h3>
                        <p>An online portal where students can apply for financial aid, providing necessary details
                            about their situation and needs.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-healthcare"></i>
                    </div>
                    <div class="service-text">
                        <h3>Transparency features</h3>
                        <p> Incorporating features that provide transparency in fund allocation, allowing donors to
                            track how their contributions are utilized.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-education"></i>
                    </div>
                    <div class="service-text">
                        <h3>Resource Hub</h3>
                        <p> Offering resources and information to students about scholarships, grants, and other
                            forms of financial assistance available to them.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-home"></i>
                    </div>
                    <div class="service-text">
                        <h3>Community Engagement</h3>
                        <p>Facilitating community engagement through forums, events, and outreach programs aimed at
                            raising awareness and support for student welfare issues.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-social-care"></i>
                    </div>
                    <div class="service-text">
                        <h3>User Support</h3>
                        <p>Providing assistance to both students and donors navigating the platform, ensuring a
                            smooth experience for all users.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

 <!-- Donate Start -->
    <div id="donate" class="donate" data-parallax="scroll" data-image-src="Assets/Images/img6.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="donate-content">
                        <div class="section-header">
                            <p>Donate Now</p>
                            <h2>Let's donate to needy people for better lives</h2>
                        </div>
                        <div class="donate-text">
                            <p>
                                At Student Welfare Foundation, your generosity transforms lives, empowering students to
                                overcome financial obstacles and pursue their dreams. Join us in creating a ripple
                                effect of positive change today." </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->

<!-- Team Start -->
<div class="team" id="team">
    <div class="container">
        <div class="section-header text-center">
            <p>Meet Our Team</p>
            <h2>Awesome guys behind our charity activities</h2>
        </div>
        <div class="row">
            <style>
                .team-img {
                    width: 250px;
                    height: 350px;
                }
            </style>

            <?php
            $query = "select * from our_teams";

            $run = mysqli_query($dblink, $query);

            while ($fetch  = mysqli_fetch_array($run)) {
            ?>

                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="./Admin_pannel/Pictures/Our_teams/<?php echo $fetch[4]; ?>" alt="<?php echo $fetch[1]; ?> Image">
                        </div>
                        <div class=" team-text">
                            <h2><?php echo $fetch[1]; ?></h2>
                            <p><?php echo $fetch[2]; ?></p>
                            <div class="team-social">
                                <a href="<?php echo $fetch[3]; ?>"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- Team End -->


<?Php
include "./IndexFooter.php";
?>