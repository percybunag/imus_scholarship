<?php
    include '../assets/scripts/admin/script_adminusers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | City of Imus Scholarship Portal</title>
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
</head>
<style>
    body {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        overflow-x: hidden;
        padding-top: 70px;
        transition: margin-left 0.3s ease;
    }

    /* Header */
    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #159C39;
        color: #fff;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .header-logo {
        height: 40px;
        border-right: 2px solid #f5f5f5;
        padding-right: 15px;
        display: flex;
        align-items: center;
    }

    .header-button-container {
        display: flex;
        align-items: center;
    }

    .nav-btn,
    .logout-button {
        background-color: transparent;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #fff;
        padding: 10px;
        transition: color 0.3s;
        margin-right: -40px;
    }

    .nav-btn:hover,
    .logout-button:hover {
        color: #04295a;
    }

    .logout-button {
        border-left: 2px solid #f5f5f5;
        padding-right: 40px;
        padding-left: 20px;
    }

    .nav-btn {
        margin-right: 15px;
    }

    /* Side-nav */
    .side-nav {
        height: 100%;
        width: 230px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #F6F5F5;
        box-shadow: 2px 0 15px 5px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 15px;
        transition: transform 0.3s ease;
        transform: translateX(0);
        z-index: 1;
        box-sizing: border-box;
    }

    .side-nav.hidden {
        transform: translateX(-100%);
    }

    .logo-container {
        display: flex;
        align-items: center;
        padding-bottom: 15px;
    }

    .logo {
        height: 35px;
    }

    .side-nav h3 {
        font-size: 16px;
        margin: 0;
        padding-top: 10px;
        color: #159C39;
        text-align: left;
        width: 100%;
    }

    .side-nav hr {
        width: 100%;
        border: none;
        border-top: 1px solid black;
        margin: 8px 0;
    }

    .side-nav .section-title {
        font-size: 13px;
        color: #666;
        text-align: left;
        width: 100%;
    }

    .side-nav a {
        font-size: 15px;
        color: #333;
        text-decoration: none;
        width: 100%;
        padding: 10px;
        display: flex;
        align-items: center;
        transition: background-color 0.3s, color 0.3s;
        box-sizing: border-box;
    }

    .side-nav a:hover {
        background-color: #e0e0e0;
        color: #159C39;
    }

    .side-nav a ion-icon {
        font-size: 20px;
        margin-right: 8px;
        min-width: 24px;
        align-items: center;
    }

    .side-nav .side-bar-img {
        align-items: end;
        justify-content: center;
        display: flex;
        width: 100%;
    }

    .side-nav h5 {
        font-size: 18px;
        margin: 0;
        padding-top: 10px;
        color: #666;
        text-align: center;
        width: 100%;
        margin-bottom: 15px;
    }

    .rounded-circle {
        margin-top: 70px;
    }

    /* Main-content of page */
    .main-content {
        margin-left: 230px;
        position: relative;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    .main-content.shifted {
        margin-left: 0px;
    }

    /* Centered container */
    .centered-container {
        max-width: 1200px; /* Increase maximum width for a larger container */
        margin: 80px auto 20px; /* Center container and adjust top margin */
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .scrollable-container {     
        height: 500px;     
        border: none; 
        padding: 20px;    
        overflow-y: auto;   
        background-color: #fff; 
        border-radius: 10px; 
    }

    /* User container */
    .user-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
    }

    .user-container button {
        background-color: #159C39;
        border: none;
        color: #fff;
        padding: 10px 15px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s;
    }
    .user-info h4 {
    font-size: 1.3rem;
    }

    .user-container button:hover {
        background-color: #138a2a;
    }

    .user-container .btn-info {
        margin-right: 10px;
    }
    
    .user-management-header h2 {
        margin: 0;
        font-size: 30px;
        color: #159C39;
    }

    .search-sort-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-bar input {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .sort-dropdown select {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
        margin-left: 10px;
        margin-top: 20px;
    }
    /* Modal Header */
    .modal-title {
        font-size: 1.75rem;
    }
    .modal-header {
        background-color: #159C39;
        color: #fff;
        border-bottom: 1px solid #ddd;
    }
    .modal-header .close {
        color: #fff;
        opacity: 1;
    }

    /* Modal Body */
    .modal-body {
        padding: 20px;
    }

    /* Profile Details */
    .profile-details h3 {
        color: #159C39;
        margin-bottom: 10px;
    }

    .profile-details p {
        margin: 5px 0;
    }

    /* Modal Footer */
    .modal-footer {
        border-top: 1px solid #ddd;
    }

    .modal-footer .btn-success {
        background-color: #159C39;
        margin-right: 20px;
        padding-left: 15px;
        padding-right: 15px;
        border: none;
    }

    .modal-footer .btn-success:hover {
        background-color: #138a2a;
    }
    /* Modal Close Button */
    .modal-header .btn-close {
        color: #ffffff;
    }
    .modal-header .btn-close:hover {
        color: #ffffff; 
    }
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .btn-close {
        font-size: 20px;
        color:#F6F5F5;
        cursor: pointer;
        margin-left: 15px;
    }
    /* Ensure the modal is centered both horizontally and vertically */
    .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100% - 1rem); /* Adjust for padding or spacing as needed */
    }

    .modal-content {
        width: 100%;
        max-width: 800px; /* Adjust max-width as needed */
    }
</style>

<body>
    <header>
        <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="header-logo">
        <div class="header-button-container">
            <button class="nav-btn" id="toggle-btn">
                <i class="fas fa-bars"></i>
            </button>
            <form action="../assets/functions/logout.php" method="post" style="display: inline;">
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
        <h5>Hi, <?php echo htmlspecialchars($user['first_name']); ?>!</h5>
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
        <div class="centered-container">
            <!-- User Management Header -->
            <div class="user-management-header">
                <h2>Users Management</h2>
                <div class="search-sort-container">
                    <div class="search-bar">
                        <input type="text" placeholder="Search users...">
                    </div>
                    <div class="sort-dropdown">
                        <select>
                            <option value="usertype" selected disabled>Sort-Usertype</option>
                            <option value="">User</option>
                            <option value="Admin">Admin</option>
                            <option value="System Admin">System Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="scrollable-container">
                <!-- User Containers -->
                <div class="user-container" data-role="system_admin">
                    <div class="user-info">
                        <h4>Bossing!</h4>
                        <!-- Add user details here -->
                    </div>
                    <div class="user-buttons">
                        <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal">Info</button>
                        <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</button>
                    </div>
                </div>            
                <div class="user-container" data-role="user">
                    <div class="user-info">
                        <h4>Bini Manoi</h4>
                        <!-- Add user details here -->
                    </div>
                    <div class="user-buttons">
                        <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal">Info</button>
                        <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</button>
                    </div>
                </div>
                <div class="user-container" data-role="user">
                    <div class="user-info">
                        <h4>Bini Mikhamot</h4>
                        <!-- Add user details here -->
                    </div>
                    <div class="user-buttons">
                        <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal">Info</button>
                        <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</button>
                    </div>
                </div>
                <div class="user-container" data-role="admin">
                    <div class="user-info">
                        <h4>Boss Kangkong</h4>
                        <!-- Add user details here -->
                    </div>
                    <div class="user-buttons">
                        <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal">Info</button>
                        <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</button>
                    </div>
                </div>
                <div class="user-container" data-role="user">
                    <div class="user-info">
                        <h4>Bini the pooh</h4>
                        <!-- Add user details here -->
                    </div>
                    <div class="user-buttons">
                        <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal">Info</button>
                        <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</button>
                    </div>
                </div>
                <div class="user-container" data-role="admin">
                    <div class="user-info">
                        <h4>Boss ikaw nanaman!</h4>
                        <!-- Add user details here -->
                    </div>
                    <div class="user-buttons">
                        <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal">Info</button>
                        <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</button>
                    </div>
                </div>
                <div class="user-container" data-role="admin">
                    <div class="user-info">
                        <h4>Boss kupal kaba!</h4>
                        <!-- Add user details here -->
                    </div>
                    <div class="user-buttons">
                        <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal">Info</button>
                        <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal">Manage</button>
                    </div>
                </div>
                <!-- Add more user containers as needed -->
            </div>
        </div>
    </div>
    <!-- INFO MODAL -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg d-flex align-items-center justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="profileModalLabel">PROFILE INFORMATION</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button" class="btn btn-success" onclick="editProfile()">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MANAGE USER MODAL -->
    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="manageModalLabel">Manage User Role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="manageRoleForm">
                        <div class="mb-3">
                            <label for="roleSelect" class="form-label">Select Role</label>
                            <select class="form-select" id="roleSelect" required>
                                <option value="">Select role...</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="system_admin">System Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="active-inactive" class="form-label">Status</label>
                            <select class="form-select" id="active-inactive" required>
                                <option value="">Status...</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="saveRole()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT PROFILE MODAL -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg d-flex align-items-center justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="editProfileModalLabel">EDIT PROFILE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="John">
                        </div>
                        <div class="mb-3">
                            <label for="middleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" value="Doe">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" value="Smith">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" value="1990-01-01">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" value="john.doe@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" value="(123) 456-7890">
                        </div>
                        <div class="mb-3">
                            <label for="unitFloor" class="form-label">Unit/Floor</label>
                            <input type="text" class="form-control" id="unitFloor" value="10th Floor">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="saveProfileChanges()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/adminusers.js"></script>

</body>
</html>