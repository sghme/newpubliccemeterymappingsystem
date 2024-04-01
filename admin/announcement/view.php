<?php
require_once("../../include/initialize.php");

// Check if the user is an admin, if not, redirect to the admin login page.
if (!isset($_SESSION['USERID'])) {
    redirect(web_root."admin/index.php");
}

// Define a function to fetch announcements
function fetchAnnouncements() {
    global $db; // Assuming you have a database connection in $db

    // Implement the database query to fetch announcements here
    $announcements = array();

    // Example: Query to retrieve announcements from a hypothetical table
    $sql = "SELECT * FROM tblannouncement";
    $result = $db->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
    }

    return $announcements;
}

$announcements = fetchAnnouncements();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcements</title>
    <style>
        .announcement {
            border: 1px solid #ccc; /* Add a border around each announcement */
            padding: 10px; /* Add some padding for spacing */
            margin-bottom: 10px; /* Add space between announcements */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php?view=view" class="btn btn-info">View Announcements</a>
        <a href="index.php?view=add" class="btn btn-primary">Add Announcement</a>
        <a href="index.php?view=edit" class="btn btn-warning">Edit Announcement</a>
        <a href="index.php?view=delete" class="btn btn-danger">Delete Announcement</a>
        
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">View Announcements</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($announcements as $announcement) : ?>
                    <div class="announcement">
                        <strong><?php echo $announcement['title']; ?> </strong> <br>
                        <?php echo $announcement['content']; ?> 
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>


