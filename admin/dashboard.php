<?php
    include '../assets/scripts/admin/script_admindashboard.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City of Imus Scholarship Portal | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

     <!-- DataTables CSS and JS -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
     <link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>
    <header>
        <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="header-logo">
        <div class="header-button-container">
            <button class="nav-btn" id="toggle-btn">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Logout Button -->
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
        <!-- container for applicants -->
        <div class="container">
            <div class="row mt-5 stats">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="approved">
                        <p style="font-size:20px">Approved Applicant</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="reject">
                        <p style="font-size:20px">Reject Applicants</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="pending">
                        <p style="font-size:20px">Pending Applicants</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="registered">
                        <p style="font-size:20px">Municipal Applicants</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="private">
                        <p style="font-size:20px">Private Scholarship Applicants</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="overall">
                        <p style="font-size:20px">Overall Applicants</p>
                    </div>
                </div>
                 <!-- Applicant chart -->
                <div class="row mt-4">
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div class="card">
                            <h1>History of All Applicants</h1><hr>
                            <div class="chart-container">
                                <canvas id="myLineChart"></canvas>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <h1>Applicant</h1><hr>
                            <div class="chart-container">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        <div class="card">
                            <h1>Overview</h1><hr>
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                     <!-- recent applicants -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        <div class="card">
                            <h1>Recent Applicants</h1><hr>
                            <div class="row mt-1">
                                <div class="col-md-12 mb-2">
                                    <div class="applicant-item d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="me-3">
                                                  <!-- img of applicants -->
                                            </div>
                                        </div>
                                        <div class="applicant-info">
                                            <div class="applicant-name">
                                                 <!-- name of applicants -->
                                            </div>
                                            <div class="applicant-details">
                                                 <!-- scholarship list of applicants -->
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <h1>Applicant</h1><hr>
                            <div class="chart-container">
                                <canvas id="doughnutChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
<script src="../assets/js/admindashboard.js"></script>

</body>

</html>


