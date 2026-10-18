<?php
require_once 'dbConfig.php';

// READ ALL
function getAllApplications($pdo) {
    $sql = "SELECT * FROM job_applications ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// READ ONE
function getApplicationByID($pdo, $applicant_id) {
    $sql = "SELECT * FROM job_applications WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicant_id]);
    return $stmt->fetch();
}

// CREATE
function insertApplication($pdo, $full_name, $email, $preferred_role, $primary_engine, $contact_number, $years_experience) {
    $sql = "INSERT INTO job_applications (full_name, email, preferred_role, primary_engine, contact_number, years_experience) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$full_name, $email, $preferred_role, $primary_engine, $contact_number, $years_experience]);
}

// UPDATE
function updateApplication($pdo, $applicant_id, $full_name, $email, $preferred_role, $primary_engine, $contact_number, $years_experience) {
    $sql = "UPDATE job_applications 
            SET full_name = ?, email = ?, preferred_role = ?, primary_engine = ?, contact_number = ?, years_experience = ? 
            WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$full_name, $email, $preferred_role, $primary_engine, $contact_number, $years_experience, $applicant_id]);
}

// DELETE
function deleteApplication($pdo, $applicant_id) {
    $sql = "DELETE FROM job_applications WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$applicant_id]);
}
?>