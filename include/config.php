<?php
// defined('server') ? null : define("server", "localhost");
// defined('user') ? null : define ("user", "root") ;
// defined('pass') ? null : define("pass","");
// defined('database_name') ? null : define("database_name", "cemeterymappingdb") ;

// $this_file = str_replace('\\', '/', __File__) ;
// $doc_root = $_SERVER['DOCUMENT_ROOT'];

// $web_root =  str_replace (array($doc_root, "include/config.php") , '' , $this_file);
// $server_root = str_replace ('config/config.php' ,'', $this_file);


// define ('web_root' , $web_root);
// define('server_root' , $server_root);

defined('server') ? null : define("server", "sql205.infinityfree.com");
defined('user') ? null : define ("user", "if0_36245969");
defined('pass') ? null : define("pass", "7O0P0yBOKe");
defined('database_name') ? null : define("database_name", "if0_36245969_newcemeterymapping");

// Establish a database connection
$db = new mysqli(server, user, pass, database_name);

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

$this_file = str_replace('\\', '/', __File__);
$doc_root = $_SERVER['DOCUMENT_ROOT'];

$web_root =  str_replace (array($doc_root, "include/config.php") , '' , $this_file);
$server_root = str_replace ('config/config.php' ,'', $this_file);

define ('web_root' , $web_root);
define('server_root' , $server_root);

?>
