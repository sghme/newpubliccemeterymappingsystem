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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_announcement'])) {
    // Handle editing the selected announcement.
    $USERID = $_POST['USERID'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Perform the database query to update the announcement.
    $sql = "UPDATE tblannouncement SET title = ?, content = ? WHERE USERID = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $USERID);

    if ($stmt->execute()) {
        // Success: Announcement updated.
        $message = "Announcement updated successfully.";
    } else {
        // Error: Failed to update announcement.
        $message = "Failed to update announcement.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcement</title>
</head>
<body>
    <div class="container">
         <a href="index.php?view=view" class="btn btn-info">View Announcements</a>
        <a href="index.php?view=add" class="btn btn-primary">Add Announcement</a>
        <a href="index.php?view=edit" class="btn btn-warning">Edit Announcement</a>
        <a href="index.php?view=delete" class="btn btn-danger">Delete Announcement</a>
        
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Announcement</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="announcementSelect">Select Announcement to Edit:</label>
                        <select name="USERID" class="form-control" id="announcementSelect">
                            <?php foreach ($announcements as $announcement) : ?>
                                <option value="<?php echo $announcement['USERID']; ?>">
                                    <?php echo $announcement['title']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea name="content" class="form-control" rows="4" required></textarea>
                    </div>
                    <input type="submit" name="edit_announcement" class="btn btn-warning" value="Edit Announcement">
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
                messageElement.style.display = "none";
            }, 2000);
        }
    </script>
</body>
</html>
