<?php 
require_once 'core/models.php'; 
$getAppByID = getApplicationByID($pdo, $_GET['applicant_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Application</title>
</head>
<body>
    <h2>Edit Application Record</h2>
    <form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
        <p><label>Full Name:</label> <input type="text" name="full_name" value="<?php echo $getAppByID['full_name']; ?>"></p>
        <p><label>Email Address:</label> <input type="email" name="email" value="<?php echo $getAppByID['email']; ?>"></p>
        <p><label>Preferred Role:</label> 
            <input type="text" name="preferred_role" value="<?php echo $getAppByID['preferred_role']; ?>">
        </p>
        <p><label>Primary Engine:</label> 
            <input type="text" name="primary_engine" value="<?php echo $getAppByID['primary_engine']; ?>">
        </p>
        <p><label>Contact Number:</label> <input type="text" name="contact_number" value="<?php echo $getAppByID['contact_number']; ?>"></p>
        <p><label>Years of Experience:</label> <input type="number" name="years_experience" value="<?php echo $getAppByID['years_experience']; ?>"></p>
        <p><input type="submit" name="editBtn" value="Update Record"></p>
    </form>
    <p><a href="job_application.php">Cancel</a></p>
</body>
</html>