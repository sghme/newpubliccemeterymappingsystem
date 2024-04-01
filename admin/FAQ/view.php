<?php
require_once("../../include/initialize.php");

// Check if the user is an admin, if not, redirect to the admin login page.
if (!isset($_SESSION['USERID'])) {
    redirect(web_root."admin/index.php");
}

// Define a function to fetch FAQs
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View FAQ</title>
    <style>
        .faq {
            border: 1px solid #ccc; /* Add a border around each FAQ */
            padding: 10px; /* Add some padding for spacing */
            margin-bottom: 10px; /* Add space between FAQs */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php?view=view" class="btn btn-info">View FAQ</a>
        <a href="index.php?view=add" class="btn btn-primary">Add FAQ</a>
        <a href="index.php?view=edit" class="btn btn-warning">Edit FAQ</a>
        <a href="index.php?view=delete" class="btn btn-danger">Delete FAQ</a>
        
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">View FAQ</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($faqs as $faq) : ?>
                    <div class="faq">
                        <strong><?php echo $faq['title']; ?> </strong> <br>
                        <?php echo $faq['content']; ?> 
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
