<?php 
    include '../assets/scripts/admin/script_adminapplicants.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants | City of Imus Scholarship Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

     <!-- DataTables CSS and JS -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/adminapplicants.css">
</head>
<body>
    <header>
        <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="header-logo">
        <div class="header-button-container">
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
            <img src="<?php echo htmlspecialchars($full_image_path); ?>" class="rounded-circle" width="70px" alt="">
        </div>
        <!-- User name -->
        <h5>Hi, <?php echo htmlspecialchars($detail['first_name']); ?>!</h5>
        <hr>

        <!-- Navigation Title -->
        <h3>NAVIGATION</h3>
        <br>

        <!-- Interface Section -->
        <div class="section-title">Interface</div>
        <hr>

        <!-- Links -->
        <a href="dashboard.php" id="dashboard-link">
            <ion-icon name="speedometer-outline"></ion-icon>Dashboard
        </a>
        <a href="adminapplicants.php" id="applicants-link">
            <ion-icon name="people-outline"></ion-icon>Applicants
        </a>
        <a href="adminreports.php" id="reports-link">
            <ion-icon name="document-text-outline"></ion-icon>Reports
        </a>
        <a href="adminprofile.php" id="profile-link">
            <ion-icon name="person-circle-outline"></ion-icon>Profile
        </a>
        <br>

        <!-- System Section -->
        <div class="section-title">System</div>
        <hr>

        <!-- Links -->
        <a href="settings.php" id="settings-link">
            <ion-icon name="settings-outline"></ion-icon>Settings
        </a>
        <a href="#" id="scholarships-link">
            <ion-icon name="school-outline"></ion-icon>Scholarships
        </a>
        <a href="adminrequirements.php" id="requirements-link">
            <ion-icon name="clipboard-outline"></ion-icon>Requirements
        </a>
        <a href="users.php" id="users-link">
            <ion-icon name="people-circle-outline"></ion-icon>Users
        </a>
        <a href="#" id="mainpage-link">
            <ion-icon name="home-outline"></ion-icon>Main Page
        </a>
    </div>
    <!-- Main -->
    <div class="main-content" id="main-content">     
        <!-- 1st container -->
            <div class="container">
                <div class="col-lg-12 col-md-4 col-sm-12 d-flex justify-content-center mt-5">
                    <div class="card2">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h2>APPLICANTS</h2>
                        </div><hr>
                        <div class="scrollable-container">
                            <div class="card3">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <h3>SM Foundation</h3>
                                    <button type="button" class="action-button" data-toggle="modal" data-target="#profileModal">Action</button>
                                </div>
                                <h4>John Doe</h4>     
                            </div>
                            <div class="card3">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <h3>SM Foundation</h3>
                                    <button type="button" class="action-button" data-toggle="modal" data-target="#profileModal">Action</button>
                                </div>
                                <h4>John Doe</h4>     
                            </div>
                            <div class="card3">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <h3>SM Foundation</h3>
                                    <button type="button" class="action-button" data-toggle="modal" data-target="#profileModal">Action</button>
                                </div>
                                <h4>John Doe</h4>     
                            </div>
                            <div class="card3">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <h3>SM Foundation</h3>
                                    <button type="button" class="action-button" data-toggle="modal" data-target="#profileModal">Action</button>
                                </div>
                                <h4>John Doe</h4>     
                            </div>
                            <div class="card3">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <h3>SM Foundation</h3>
                                    <button type="button" class="action-button" data-toggle="modal" data-target="#profileModal">Action</button>
                                </div>
                                <h4>John Doe</h4>     
                            </div>    
                        </div>    
                    </div>    
                    
                </div>
                
    <!-- EDIT MODAL -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg d-flex align-items-center justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="profileModalLabel">PROFILE INFORMATION</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Start of profile form content -->
                    <div class="profile-details">
                        <h3>Basic Information:</h3>
                        <hr>
                        <p>First Name: John</p>
                        <p>Middle Name: Doe</p>
                        <p>Last Name: Smith</p>
                        <p>Date of Birth: January 1, 1990</p>
                        <p>Gender: Male</p>
                        <p>Email Address: john.doe@example.com</p>
                        <br>
                        <h3>Contact Details:</h3>
                        <hr>
                        <p>Contact Number: (123) 456-7890</p>
                        <p>Unit/Floor: 10th Floor</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn3" onclick="rejectProfile()">Reject</button>
                    <button type="button" class="btn1" onclick="approveProfile()">Approve</button>
                </div>
            </div>
        </div>
    </div>


<script src="System-admin-applicans.js"></script>
</body>

</html>
