<?php
require_once("../../include/initialize.php");

// Check if the user is an admin, if not, redirect to the admin login page.
if (!isset($_SESSION['USERID'])) {
    redirect(web_root."admin/index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_announcement'])) {
    // Handle adding an announcement.
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Perform database query to add the announcement.
    $sql = "INSERT INTO tblannouncement (title, content) VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        // Success: Announcement added.
        $_SESSION['message'] = "Announcement added successfully.";
    } else {
        // Error: Failed to add announcement.
        $_SESSION['error_message'] = "Failed to add announcement.";
    }
}

// Fetch announcements from the database or any other logic for displaying content
// This can be done before or after the form processing logic
// Example: $announcements = fetchAnnouncements();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Announcement</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php?view=view" class="btn btn-info">View Announcements</a>
        <a href="index.php?view=add" class="btn btn-primary">Add Announcement</a>
        <a href="index.php?view=edit" class="btn btn-warning">Edit Announcement</a>
        <a href="index.php?view=delete" class="btn btn-danger">Delete Announcement</a>
        
   



        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Add Announcement</h3>
            </div>
            <div class="panel-body">
                <?php
                if (isset($_SESSION['message'])) {
                    echo '<div id="successMessage" class="alert alert-success">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error_message'])) {
                    echo '<div id="errorMessage" class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']);
                }
                ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for "content">Content:</label>
                        <textarea name="content" class="form-control" rows="4" required></textarea>
                    </div>
                    <input type="submit" name="add_announcement" class="btn btn-primary" value="Add Announcement">
                </form>
            </div>
        </div>
    </div>

    <script>
        // Automatically hide the success message after 30 seconds
        setTimeout(function() {
            var successMessage = document.getElementById("successMessage");
            if (successMessage) {
                successMessage.classList.add("hidden");
            }
        }, 2000);
    </script>
</body>
</html>

