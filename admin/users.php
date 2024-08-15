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
    <link rel="stylesheet" href="../assets/css/adminusers.css">

    <!-- DataTables CSS and JS -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

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
                            <option value="usertype">All users</option>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                            <option value="System Admin">System Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="scrollable-container">
                <!-- User Containers -->
                <?php
                // Include database connection
                include '../assets/scripts/connection/db_conn.php';
                $loggedInUserId = $_SESSION['user_id']; 
                // Query to fetch user details, including personal info and profile picture
                $sql = "
                    SELECT 
                        u.id, 
                        u.email, 
                        u.role,
                        u.acc_status,
                        p.first_name, 
                        p.middle_name, 
                        p.last_name, 
                        p.date_of_birth, 
                        p.gender, 
                        p.contact_number, 
                        p.unit_floor, 
                        p.street_subdivision, 
                        p.barangay,
                        dp.image_path
                    FROM users u
                    JOIN personal_info p ON u.id = p.user_id
                    LEFT JOIN user_dp dp ON u.id = dp.user_id";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($users as $user) {
                    if ($user['id'] == $loggedInUserId) {
                        continue;
                    }
                    echo '
                    <div class="user-container" data-role="' . htmlspecialchars($user['role']) . '">
                        <div class="user-info">
                            <h4>' . htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']) . '</h4>
                            <p>Email: ' . htmlspecialchars($user['email']) . '</p>
                            <p><b>Role:</b> <span class="role-value">' . htmlspecialchars($user['role']) . '</span></p>
                            <p><b>Account Status:</b> <span class="accstatus-value">' . htmlspecialchars($user['acc_status']) . '</span></p>
                        </div>
                        <div class="user-buttons">
                            <button class="btn-info" data-bs-toggle="modal" data-bs-target="#profileModal' . htmlspecialchars($user['id']) . '">Info</button>
                            <button class="btn-manage" data-bs-toggle="modal" data-bs-target="#manageModal' . htmlspecialchars($user['id']) . '">Manage</button>
                        </div>
                    </div>

                    <!-- PROFILE INFO MODAL -->
                    <div class="modal fade" id="profileModal' . htmlspecialchars($user['id']) . '" tabindex="-1" aria-labelledby="profileModalLabel' . htmlspecialchars($user['id']) . '" aria-hidden="true">
                        <div class="modal-dialog modal-lg d-flex align-items-center justify-content-center">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="profileModalLabel' . htmlspecialchars($user['id']) . '">PROFILE INFORMATION</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="profile-details">
                                        <h3>Basic Information:</h3>
                                        <hr>
                                        <p>First Name: ' . htmlspecialchars($user['first_name']) . '</p>
                                        <p>Middle Name: ' . htmlspecialchars($user['middle_name']) . '</p>
                                        <p>Last Name: ' . htmlspecialchars($user['last_name']) . '</p>
                                        <p>Date of Birth: ' . htmlspecialchars($user['date_of_birth']) . '</p>
                                        <p>Gender: ' . htmlspecialchars($user['gender']) . '</p>
                                        <p>Email Address: ' . htmlspecialchars($user['email']) . '</p>
                                        <br>
                                        <h3>Contact Details:</h3>
                                        <hr>
                                        <p>Contact Number: ' . htmlspecialchars($user['contact_number']) . '</p>
                                        <p>Unit/Floor: ' . htmlspecialchars($user['unit_floor']) . '</p>
                                        <p>Street/Subdivision: ' . htmlspecialchars($user['street_subdivision']) . '</p>
                                        <p>Barangay: ' . htmlspecialchars($user['barangay']) . '</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" 
                                        data-bs-toggle="modal" data-bs-target="#editProfileModal" 
                                        data-id="' . htmlspecialchars($user['id']) . '"
                                        data-firstname="' . htmlspecialchars($user['first_name']) . '"
                                        data-middlename="' . htmlspecialchars($user['middle_name']) . '"
                                        data-lastname="' . htmlspecialchars($user['last_name']) . '"
                                        data-dob="' . htmlspecialchars($user['date_of_birth']) . '"
                                        data-gender="' . htmlspecialchars($user['gender']) . '"
                                        data-email="' . htmlspecialchars($user['email']) . '"
                                        data-contact="' . htmlspecialchars($user['contact_number']) . '"
                                        data-unit="' . htmlspecialchars($user['unit_floor']) . '"
                                        data-streetsubdivision="' . htmlspecialchars($user['street_subdivision']) . '"
                                        data-barangay="' . htmlspecialchars($user['barangay']) . '"
                                        onclick="populateEditProfileModal(this)">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MANAGE USER MODAL -->
                    <div class="modal fade" id="manageModal' . htmlspecialchars($user['id']) . '" tabindex="-1" aria-labelledby="manageModalLabel' . htmlspecialchars($user['id']) . '" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="manageModalLabel' . htmlspecialchars($user['id']) . '">Manage User Role</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="manageRoleForm' . htmlspecialchars($user['id']) . '" method="POST" action="../assets/scripts/admin/update_users.php">
                                        <input type="hidden" name="user_id" value="' . htmlspecialchars($user['id']) . '">
                                        <div class="mb-3">
                                            <label for="roleSelect' . htmlspecialchars($user['id']) . '" class="form-label">Select Role</label>
                                            <select class="form-select" id="roleSelect' . htmlspecialchars($user['id']) . '" name="role" required>
                                                <option value="">Select role...</option>
                                                <option value="User"' . ($user['role'] == 'User' ? ' selected' : '') . '>User</option>
                                                <option value="Admin"' . ($user['role'] == 'Admin' ? ' selected' : '') . '>Admin</option>
                                                <option value="System Admin"' . ($user['role'] == 'System Admin' ? ' selected' : '') . '>System Admin</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="statusSelect' . htmlspecialchars($user['id']) . '" class="form-label">Account Status:</label>
                                            <select class="form-select" id="statusSelect' . htmlspecialchars($user['id']) . '" name="status" required>
                                                <option value="">Status...</option>
                                                <option value="Active"' . ($user['acc_status'] == 'Active' ? ' selected' : '') . '>Active</option>
                                                <option value="Inactive"' . ($user['acc_status'] == 'Inactive' ? ' selected' : '') . '>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                ?>
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
                                        <input type="text" class="form-control" id="firstName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="middleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middleName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address:</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contactNumber" class="form-label">Contact Number:</label>
                                        <input type="text" class="form-control" id="contactNumber">
                                    </div>
                                    <div class="mb-3">
                                        <label for="unitFloor" class="form-label">Unit/Floor:</label>
                                        <input type="text" class="form-control" id="unitFloor">
                                    </div>
                                    <div class="mb-3">
                                        <label for="streetSubdivision" class="form-label">Street/Subdivision:</label>
                                        <input type="text" class="form-control" id="streetSubdivision">
                                    </div>
                                    <div class="mb-3">
                                        <label for="barangay" class="form-label">Barangay:</label>
                                        <input type="text" class="form-control" id="barangay">
                                    </div>
                                    <input type="hidden" class="form-control" id="userId" >
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="saveProfileChanges()">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>            
    </div>        
                


    <script src="../assets/js/adminusers.js"></script>

</body>
</html>