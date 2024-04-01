<?php
require_once("../../include/initialize.php");

// Check if the user is an admin, if not, redirect to the admin login page.
if (!isset($_SESSION['USERID'])) {
    redirect(web_root."admin/index.php");
}

// Define the function to fetch FAQs
function fetchFAQ() {
    global $db;

    $faqs = array();
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

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_faq'])) {
    $faqIDs = isset($_POST['selected_faq']) ? $_POST['selected_faq'] : array();

    $faqIDsList = is_array($faqIDs) ? implode(",", $faqIDs) : '';

    if (!empty($faqIDsList)) {
        $sql = "DELETE FROM tblfaq WHERE USERID IN ({$faqIDsList})";

        if ($db->query($sql)) {
            $message = "FAQ deleted successfully.";
            // Refresh the FAQ list
            $faqs = fetchFAQ();
        } else {
            $message = "Failed to delete FAQ.";
        }
    } else {
        $message = "No FAQ selected for deletion.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete FAQ</title>
</head>
<body>
    <div class="container">
        <a href="index.php?view=view" class="btn btn-info">View FAQ</a>
        <a href="index.php?view=add" class="btn btn-primary">Add FAQ</a>
        <a href="index.php?view=edit" class="btn btn-warning">Edit FAQ</a>
        <a href="index.php?view=delete" class="btn btn-danger">Delete FAQ</a>
        
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Delete FAQ</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Select FAQ to Delete:</label>
                        <br>
                        <?php foreach ($faqs as $faq) : ?>
                            <input type="checkbox" name="selected_faq[]" value="<?php echo $faq['USERID']; ?>">
                            <?php echo $faq['title']; ?>
                            <br>
                        <?php endforeach; ?>
                    </div>
                    <p>Are you sure you want to delete the selected FAQ?</p>
                    <input type="submit" name="delete_faq" class="btn btn-danger" value="Delete Selected FAQ">
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
