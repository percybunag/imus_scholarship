<?php 
include '../assets/scripts/admin/script_adminreports.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City of Imus Scholarship Portal | Reports</title>
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
     <link rel="stylesheet" href="../assets/css/adminreports.css">

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
            <div class="row mt-5 stats">
                <div class="col-lg-4 col-md-5 col-sm-2 d-flex justify-content-center">
                    <select class="timeframe">
                        <option>Recently</option>
                        <option>Last Week</option>
                        <option>Last Month</option>
                        <option>Last Year</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-2 d-flex justify-content-center">
                    <select class="category">
                        <option>Gabay Guro by PLDT | Smart Inc</option>
                        <option>SM Foundation Inc.</option>
                        <option>DOST-Scholarship</option>
                        <option>Inlife Foundation</option>
                        <option>Del Monte Foundation Inc.</option>
                        <option>Cebuana Foundation Inc.</option>
                    </select>
                </div>  
                <div class="col-lg-4 col-md-6 col-sm-2 d-flex justify-content-center">
                    <button type="submit" name="submit" class="Btn2">Submit</button><br>
                </div>
                <div class="table-container mt-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table striped">
                            <thead>
                                <tr>
                                    <th>Student name </th>
                                    <th>Address</th>
                                    <th>Application Number</th>
                                    <th>Household Income</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <div class="pagination p-1">
                                            <button id="prevBtn">Previous</button>
                                            <span id="pageNumber">Page 1</span>
                                            <button id="nextBtn">Next</button>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>       
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
       

<script src="../assets/js/adminreports.js"></script>

</body>

