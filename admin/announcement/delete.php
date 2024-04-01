<?php
require_once("../../include/initialize.php");

// Check if the user is an admin, if not, redirect to the admin login page.
if (!isset($_SESSION['USERID'])) {
    redirect(web_root."admin/index.php");
}

// Define the function to fetch announcements
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

$message = ''; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_announcements'])) {
    // Handle deleting the selected announcements.
    $announcementIDs = isset($_POST['selected_announcements']) ? $_POST['selected_announcements'] : array();

    // Prepare a comma-separated list of announcement IDs to use in the SQL query
    $announcementIDsList = is_array($announcementIDs) ? implode(",", $announcementIDs) : '';

    if (!empty($announcementIDsList)) {
        // Perform the database query to delete the selected announcements.
        $sql = "DELETE FROM tblannouncement WHERE USERID IN ({$announcementIDsList})";
        if ($db->query($sql)) {
            // Success: Announcements deleted.
            $message = "Announcements deleted successfully.";
        } else {
            // Error: Failed to delete announcements.
            $message = "Failed to delete announcements.";
        }
    } else {
        // No announcements selected to delete.
        $message = "No announcements selected for deletion.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Announcement</title>
</head>
<body>
    <div class="container">
        <a href="index.php?view=view" class="btn btn-info">View Announcements</a>
        <a href="index.php?view=add" class="btn btn-primary">Add Announcement</a>
        <a href="index.php?view=edit" class="btn btn-warning">Edit Announcement</a>
        <a href="index.php?view=delete" class="btn btn-danger">Delete Announcement</a>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Delete Announcement</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Select Announcements to Delete:</label>
                        <br>
                        <?php foreach ($announcements as $announcement) : ?>
                            <input type="checkbox" name="selected_announcements[]" value="<?php echo $announcement['USERID']; ?>">
                            <?php echo $announcement['title']; ?>
                            <br>
                        <?php endforeach; ?>
                    </div>
                    <p>Are you sure you want to delete the selected announcements?</p>
                    <input type="submit" name="delete_announcements" class="btn btn-danger" value="Delete Selected Announcements">
                </form>
                <?php if (!empty($message)) : ?>
                    <div id="message" class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Automatically hide the message after 5 seconds
        var messageElement = document.getElementById("message");
        if (messageElement) {
            setTimeout(function () {
                messageElement.styledisplay = "none";
            }, 2000);
        }
    </script>
</body>
</html>
