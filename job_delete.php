<?php 
require_once 'core/models.php'; 
$getAppByID = getApplicationByID($pdo, $_GET['applicant_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Application</title>
</head>
<body>
    <h2>Are you sure you want to delete this application?</h2>
    <div>
        <p><strong>Name:</strong> <?php echo $getAppByID['full_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $getAppByID['email']; ?></p>
        <p><strong>Role:</strong> <?php echo $getAppByID['preferred_role']; ?></p>
    </div>
    <form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
        <input type="submit" name="deleteBtn" value="Confirm Delete">
    </form>
    <p><a href="job_application.php">Cancel</a></p>
</body>
</html>