<?php
require_once ("include/initialize.php");
// if(isset($_SESSION['IDNO'])){
// 	redirect(web_root.'index.php');
// }



$content='home.php';
$view = (isset($_GET['q'])&& $_GET['q'] && $_GET['q'] && $_GET['q'] && $_GET['q'] != '') ? $_GET['q'] : '';
 

switch ($view) {
 
 case 'contact' :
        $title="Contact Us";	
		$content='contact.php';		
		break;

	case 'announcement' :
        $title="Announcement";	
		$content='leftbar.php' ;
		break;
	
	case 'faq' :
		$title="FAQ";	
		$content='FAQ.php' ;
		break;
		
	case 'about' :
			$title="About";	
			$content='about_home.php' ;
			break;

	case 'person' :
        $title="Deceased Person";	
		$content='person.php';		
		break;
	case 'logout' :
			$title="logout";	
			$content='logout.php';		
			break;
	default :
	 
		$content ='home.php';		

}

       
    
 
require_once("theme/templates.php");
 

?>

