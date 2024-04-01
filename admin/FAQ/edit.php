<?php
require_once("../../include/initialize.php");

// Check if the user is an admin, if not, redirect to the admin login page.
if (!isset($_SESSION['USERID'])) {
    redirect(web_root."admin/index.php");
}

// Define the function to fetch announcements
function fetchFAQ() {
    global $db; // Assuming you have a database connection in $db

    // Implement the database query to fetch announcements here
    $faqs = array();

    // Example: Query to retrieve announcements from a hypothetical table
    $sql = "SELECT * FROM tblfaq";
    $result = $db->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $faqs[] = $row;
        }
    }

    return $faqs;
}

$faqs = fetchFAQ();

$message = ''; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_faq'])) {
    // Handle editing the selected FAQ.
    $USERID = $_POST['USERID'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Perform the database query to update the FAQ.
    $sql = "UPDATE tblfaq SET title = ?, content = ? WHERE USERID = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $USERID);

    if ($stmt->execute()) {
        // Success: FAQ updated.
        $message = "FAQ updated successfully.";
        // Refresh the FAQ list
        $faqs = fetchFAQ();
    } else {
        // Error: Failed to update FAQ.
        $message = "Failed to update FAQ.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit FAQ</title>
</head>
<body>
    <div class="container">
         <a href="index.php?view=view" class="btn btn-info">View FAQ</a>
        <a href="index.php?view=add" class="btn btn-primary">Add FAQ</a>
        <a href="index.php?view=edit" class="btn btn-warning">Edit FAQ</a>
        <a href="index.php?view=delete" class="btn btn-danger">Delete FAQ</a>
        
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Edit FAQ</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="faqSelect">Select FAQ to Edit:</label>
                        <select name="USERID" class="form-control" id="faqSelect">
                            <?php foreach ($faqs as $faq) : ?>
                                <option value="<?php echo $faq['USERID']; ?>">
                                    <?php echo $faq['title']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Question:</label>
                        <input type="text" name="title" class="form-control" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Answer:</label>
                        <textarea name="content" class="form-control" rows="4" required><?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?></textarea>
                    </div>
                    <input type="submit" name="edit_faq" class="btn btn-warning" value="Edit FAQ">
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
