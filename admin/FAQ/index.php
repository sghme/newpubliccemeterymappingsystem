<?php
require_once("../../include/initialize.php");

if (!isset($_SESSION['USERID'])) {
    redirect(web_root."admin/index.php");
}

$view = (isset($_GET['view']) != '') ? $_GET['view'] : '';

$header = $view;
$title = "FAQ";
switch ($view) {
    case 'add':
        $content = 'add.php';
        break;

    case 'edit':
        $content = 'edit.php';
        break;

    case 'delete':
        $content = 'delete.php';
        break;

    case 'view':
        $content = 'view.php';
        break;

    default:
        $title = "FAQ";
        // Set $content to an empty string or a default content file that shows all the options.
        $content = 'options.php'; // You need to create 'options.php' with the links to add, edit, delete, and view.
}

require_once("../theme/templates.php");
?>
