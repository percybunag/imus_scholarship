<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | City of Imus Scholarship Program</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../img/Ph_seal_Imus.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

     <!-- DataTables CSS and JS -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
     <link rel="stylesheet" href="../assets/css/userprofile.css">

</head>

<body>
    <header>
        <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="header-logo">
        <div class="header-button-container">
            <button class="notification-btn">
                <i class="fas fa-bell"></i>
            </button>
            <button class="nav-btn" id="toggle-btn">
                <i class="fas fa-bars"></i>
            </button>
            <form action="../assets/scripts/logout.php" method="post" style="display: inline;">
                <button type="submit" class="logout-button">
                    <i class="fas fa-power-off"></i>
                </button>
            </form>
        </div>
    </header>

    <div class="side-nav" id="side-nav">
        <div class="side-bar-img mt-2">
            <img src="../assets/img/user-admin.jpg" class="rounded-circle" width="70px" alt="">
        </div>
        <!-- User name -->
        <h5>Hi, Admin<!--<?php echo htmlspecialchars($user['first_name']); ?>-->!</h5>
        <hr>

        <!-- Navigation Title -->
        <h3>NAVIGATION</h3>
        <br>

        <!-- Interface Section -->
        <div class="section-title">Account</div>
        <hr>

        <!-- Links -->
        <a href="userprofile.php" id="profile-link">
            <ion-icon name="person-circle-outline"></ion-icon>My Profile
        </a>
        <a href="" id="applications-link">
            <ion-icon name="people-outline"></ion-icon>My Applications
        </a>
        <br>

        <!-- System Section -->
        <div class="section-title">Interface</div>
        <hr>

        <!-- Links -->
        <a href="dashboard.php" id="dashboard-link">
            <ion-icon name="list-outline"></ion-icon>Dashboard
        </a>
        <a href="#" id="scholarships-link">
            <ion-icon name="school-outline"></ion-icon>Apply Scholarship
        </a>
        <a href="#" id="scholarships-link">
            <ion-icon name="grid-outline"></ion-icon>Scholarship List
        </a>
    </div>
    <!-- Main -->
    <div class="main-content" id="main-content">
        <!-- container-profile -->
        <div class="container">
            <div class="col-lg-12 col-md-4 col-sm-12 d-flex justify-content-center ">
                <div class="card g-4 personal-info-container">
                    <h1 class="mb-3 personal-info-header">PERSONAL DETAILS</h1>
                    <hr>
                    <div class="row mt-3 stats ">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="profile-picture">
                                <img id="profileImage" src="img/user-admin.jpg" alt="Profile Picture">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                            
                            <input  class="form-control" type="file" id="fileInput" accept="image/*">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 mt-4">
                            <button class="uploadbutton" id="uploadButton">Upload</button>
                        </div>
                    </div>   
                   
                    <form action="/submit_scholarship" method="post">
                        <div class="row mt-3">
                            <!-- Profile Section -->
                            <div class="col-11 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="first_name" class="form-label">First Name:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="first_name" name="first_name" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="middle_name" class="form-label">Middle Name:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="last_name" class="form-label">Last Name:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="last_name" name="last_name" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="gender" class="form-label">Date of Birth:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="gender" name="gender" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="unit_floor_street" class="form-label">Gender:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="unit_floor_street" name="unit_floor_street" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mb-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="unit_floor_street" class="form-label">Email Address:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="unit_floor_street" name="unit_floor_street" disabled>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mb-4 personal-info-header">CONTACT DETAILS</h1>
                            <hr>
                            <div class="col-11 mt-3 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="barangay" class="form-label">Contact Number:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="barangay" name="barangay" disabled>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-11 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="contact_no" class="form-label">Unit/Floor:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="contact_no" name="contact_no" disabled>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-11 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="email_address" class="form-label">Street/Subdivision:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="email_address" name="email_address" disabled>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-11 mb-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="bdate" class="form-label">Barangay:</label>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-center">
                                        <input type="text" class="form-control" id="bdate" name="bdate" disabled>
                                    </div>
                                </div>   
                            </div>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
        <!-- container-password -->
        <div class="container">
            <div class="col-lg-5 col-md-4 col-sm-5 justify-content-start">
                <div class="card g-4 personal-password-container">
                    <h1 class="mb-3 personal-password-header">Change Password</h1>
                    <hr>
                    <form action="/submit_scholarship" method="post">
                        <div class="mb-3 mt-3">
                            <label for="Password" class="form-label">Enter Current Password:</label>
                            <input type="password" class="form-control" id="Password" name="Password"  required>
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">Enter New Password:</label>
                            <input type="password" class="form-control" id="new-password" name="new-password"  required>
                        </div>    
                        <div class="mb-3">
                            <label for="confirm-Password" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm-Password" name="confirm-Password"  required>
                        </div>
                        <button class="submit-button">Submit</button>
                    </form>
                </div>
            </div>            
        </div>
    </div>
<script src="../assets/js/userprofile.js"></script>

</body>
</html>