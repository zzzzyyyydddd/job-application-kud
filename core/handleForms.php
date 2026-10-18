<?php
require_once 'models.php';

// INSERT RECORD
if (isset($_POST['insertBtn'])) {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $preferred_role = trim($_POST['preferred_role']);
    $primary_engine = trim($_POST['primary_engine']);
    $contact_number = trim($_POST['contact_number']);
    $years_experience = trim($_POST['years_experience']);

    // Check that strings are not empty and years_experience is not a blank string
    if (strlen($full_name) > 0 && strlen($email) > 0 && strlen($preferred_role) > 0 && strlen($primary_engine) > 0 && strlen($contact_number) > 0 && strlen($years_experience) > 0) {
        $query = insertApplication($pdo, $full_name, $email, $preferred_role, $primary_engine, $contact_number, $years_experience);
        if ($query) {
            header("Location: ../job_application.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Please fill in all fields.";
    }
}

// UPDATE RECORD
if (isset($_POST['editBtn'])) {
    $applicant_id = $_GET['applicant_id'];
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $preferred_role = trim($_POST['preferred_role']);
    $primary_engine = trim($_POST['primary_engine']);
    $contact_number = trim($_POST['contact_number']);
    $years_experience = trim($_POST['years_experience']);

    if (strlen($full_name) > 0 && strlen($email) > 0 && strlen($preferred_role) > 0 && strlen($primary_engine) > 0 && strlen($contact_number) > 0 && strlen($years_experience) > 0) {
        $query = updateApplication($pdo, $applicant_id, $full_name, $email, $preferred_role, $primary_engine, $contact_number, $years_experience);
        if ($query) {
            header("Location: ../job_application.php");
        } else {
            echo "Update failed";
        }
    } else {
        echo "Please fill in all fields.";
    }
}

// DELETE RECORD
if (isset($_POST['deleteBtn'])) {
    $applicant_id = $_GET['applicant_id'];
    $query = deleteApplication($pdo, $applicant_id);
    if ($query) {
        header("Location: ../job_application.php");
    } else {
        echo "Deletion failed";
    }
}
?>