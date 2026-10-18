<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Developer Career Applications</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        .form-container { background: #f4f4f4; padding: 15px; border-radius: 5px; width: 400px; }
        .form-container p { margin-bottom: 10px; }
    </style>
</head>
<body>

    <h2>Game Developer Application Form</h2>

    <div class="form-container">
        <form action="core/handleForms.php" method="POST">
            <p><label>Full Name:</label> <input type="text" name="full_name" required></p>
            <p><label>Email Address:</label> <input type="email" name="email" required></p>
            <p><label>Preferred Role:</label> 
                <select name="preferred_role" required>
                    <option value="Gameplay Programmer">Gameplay Programmer</option>
                    <option value="Graphics Programmer">Graphics Programmer</option>
                    <option value="Systems Engineer">Systems Engineer</option>
                    <option value="Level Designer">Level Designer</option>
                </select>
            </p>
            <p><label>Primary Engine:</label> 
                <select name="primary_engine" required>
                    <option value="Unreal Engine">Unreal Engine</option>
                    <option value="Unity">Unity</option>
                    <option value="Godot">Godot</option>
                    <option value="Custom C++ Engine">Custom C++ Engine</option>
                </select>
            </p>
            <p><label>Contact Number:</label> <input type="text" name="contact_number" required></p>
            <p><label>Years of Experience:</label> <input type="number" name="years_experience" min="0" required></p>
            <p><input type="submit" name="insertBtn" value="Submit Application"></p>
        </form>
    </div>

    <h2>Submitted Applications</h2>

    <table>
        <tr>
            <th>Applicant ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Preferred Role</th>
            <th>Primary Engine</th>
            <th>Contact Number</th>
            <th>Experience (Yrs)</th>
            <th>Date Added</th>
            <th>Action</th>
        </tr>

        <?php $allApps = getAllApplications($pdo); ?>
        <?php foreach ($allApps as $row) { ?>
        <tr>
            <td><?php echo $row['applicant_id']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['preferred_role']; ?></td>
            <td><?php echo $row['primary_engine']; ?></td>
            <td><?php echo $row['contact_number']; ?></td>
            <td><?php echo $row['years_experience']; ?></td>
            <td><?php echo $row['date_added']; ?></td>
            <td>
                <a href="job_edit.php?applicant_id=<?php echo $row['applicant_id']; ?>">Edit</a> | 
                <a href="job_delete.php?applicant_id=<?php echo $row['applicant_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>