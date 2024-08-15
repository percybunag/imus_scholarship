<?php
    include '../assets/scripts/admin/script_admindashboard.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipal Requirements | City of Imus Scholarship Portal</title>
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
     <link rel="stylesheet" href="../assets/css/adminrequirements.css">

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
        <a href="" id="scholarships-link">
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
        <!-- 2nd container -->
        <div class="container mt-5">
            <div class="col-lg-12 col-md-4 col-sm-10 d-flex justify-content-center ">
                <div class="card2">
                    <div class=" d-flex justify-content-between align-items-center">
                        <h2>REQUIREMENTS FOR SCHOLARSHIP </h2>
                        <button class="add-button" onclick="openModal('modal-new-add')">ADD</button>
                    </div><hr>
                    <div class="scrollable-container">
                        <div class="card3">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3>Certificate of Grades: </h3>
                                <button class="edit-button" onclick="openModal('modal-new-edit', 'overlay-new-edit')">EDIT</button>
                            </div>
                            <h4>File Format: .jpeg,  .pdf</h4>    
                        </div>
                        <div class="card3">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3>Barangay Clearance(Updated):</h3>
                                <button class="edit-button" onclick="openModal('modal-new-edit', 'overlay-new-edit')">EDIT</button>
                            </div>
                            <h4>File Format: .jpeg,  .pdf</h4>     
                        </div>
                        <div class="card3">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3>Valid ID of Immediate Family/Applicant:</h3>
                                <button class="edit-button" onclick="openModal('modal-new-edit', 'overlay-new-edit')">EDIT</button>
                            </div>
                            <h4>File Format: .jpeg,  .pdf</h4> 
                        </div>
                        <div class="card3">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3>Registraton Form</h3>
                                <button class="edit-button" onclick="openModal('modal-new-edit', 'overlay-new-edit')">EDIT</button>
                            </div>
                            <h4>File Format: .jpeg,  .pdf</h4>     
                        </div>
                        <div class="card3">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3>Personal Letter for Mayor Advincula:</h3>
                                <button class="edit-button" onclick="openModal('modal-new-edit', 'overlay-new-edit')">EDIT</button>
                            </div>
                            <h4>File Format: .jpeg, .pdf</h4>     
                        </div>    
                    </div>    
                </div>    
            </div>
        </div>
    </div>

   <!--ADD BUTTON-->
   <div class="modal fade" id="modal-new-add" tabindex="-1" aria-labelledby="modal-new-add-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-new-add-label">ADD CATEGORY:</h3>
            </div>
            <div class="modal-body">
                <form id="add-account-form" method="POST">
                    <div class="mb-3">
                        <label for="addCategoryName" class="col-form-label">Name of the category:</label>
                        <input type="text" class="form-control" id="addCategoryName" name="addCategoryName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFileOption" class="col-form-label">Choose File Option:</label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="interests" value="technology">
                            .pdf
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="interests" value="sports">
                            .docx
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="interests" value="music">
                            .jpeg
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="interests" value="travel">
                            .png
                        </label>
                    </div>
                </form>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn1" onclick="submitAddAccForm()">Create</button>
            </div>
        </div>
    </div>
</div>

    
    <!-- EDIT MODAL -->
    <div class="modal fade" id="modal-new-edit" tabindex="-1" aria-labelledby="modal-new-edit-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-new-edit-label">EDIT CATEGORY:</h3>
                </div>
                <div class="modal-body">
                    <form id="edit-account-form" method="POST">
                        <div class="mb-3">
                            <label for="editCategoryName" class="col-form-label">Edit Name of the Category:</label>
                            <input type="text" class="form-control" id="editCategoryName" name="editCategoryName">
                        </div>
                        <div class="mb-3">
                            <label for="editFileOption" class="col-form-label">Choose File Option:</label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="interests" value="technology">
                                .pdf
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="interests" value="sports">
                                .docx
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="interests" value="music">
                                .jpeg
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="interests" value="travel">
                                .png
                            </label>
                        </div>
                    </form>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn3" onclick="deleteCategory()">Delete</button>
                    <button type="button" class="btn2" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn1" onclick="submitEditAccForm()">Save</button>
                </div>
            </div>
        </div>
    </div>
       

<script src="../assets/js/adminrequirements.js"></script>

</body>

