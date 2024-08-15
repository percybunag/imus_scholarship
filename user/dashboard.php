<?php 
    include '../assets/scripts/user/script_userdashboard.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | City of Imus Scholarship Portal</title>
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
     <link rel="stylesheet" href="../assets/css/userdashboard.css">

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
        <main class="content">
            <div class="rectangle">
                <h1>Dashboard/Overview</h1>
            </div>
            <div class="row mt-5 stats">
                <div class="approved stat-card">
                    <p class="header">Closed</i></p>
                    <p>Municipal Scholarship Status:</p>
                </div>
                <div class="registered stat-card">
                    <p class="header2">2024-2025</i></p>
                    <p>Scholarship Year:</p>
                </div>
                <div class="pending stat-card">
                    <p class="header3">9</i></p>
                    <p>Applicant Number:</p>
                </div>
            </div>
            <div class="row mt-5 m-2">
                <div class="col-lg-8">
                    <div class="card">
                        <h1>News and Updates</h1>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chart-doughnut">
                        <h4>Municipal Scholarship Data</h4>
                        <hr>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
       
    
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/userdashboard.js"></script>


</body>
</html>