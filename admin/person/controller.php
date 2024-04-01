<?php
require_once ("../../include/initialize.php");
	 

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break; 

	}

   
function doInsert(){
	global $mydb;
	if(isset($_POST['save'])){

		 
		
				
				// $borndate =  ($_POST['BORNDATE'] !='') ? @date_format(date_create($_POST['BORNDATE']), "Y-m-d"): '0000-00-00';
				// $dieddate =  ($_POST['DIEDDATE'] !='') ? @date_format(date_create($_POST['DIEDDATE']), "Y-m-d") : '0000-00-00';

				$borndate =  $_POST['BORNDATE'];
				$dieddate =  $_POST['DIEDDATE'];

		 
		 	
					if ($_POST['FNAME'] == ""  ) {
					$messageStats = false;
					message("All fields are required!","error");
					redirect('index.php?view=add');
					}else{	
						$sql_check = "SELECT COUNT(*) AS count FROM `tblpeople` WHERE `GRAVENO`= '".$_POST['GRAVENO']."' AND `CATEGORIES`='".$_POST['CATEGORIES']."' AND `LOCATION`='".$_POST['LOCATION']."'";
						$mydb->setQuery($sql_check);
						$result = $mydb->loadSingleResult();
						
		
						
						if ($result->count > 0) {
							// Grave number already exists
							message("Grave number is already taken!","error");
							redirect('index.php?view=add');
						} else {
							// Proceed with inserting the record
							$autonumber = new Autonumber();
							$res = $autonumber->set_autonumber('PEOPLEID');
						
							$p = new Person(); 
							$p->PEOPLEID = $res->AUTO; 
							$p->FNAME = $_POST['FNAME'];
							$p->CATEGORIES = $_POST['CATEGORIES'];
							$p->BORNDATE = $_POST['BORNDATE'];
							$p->DIEDDATE = $_POST['DIEDDATE']; 
							$p->LOCATION = $_POST['LOCATION'];
							$p->GRAVENO = $_POST['GRAVENO']; 
							$p->create();
						
							$autonumber = new Autonumber();
							$autonumber->auto_update('PEOPLEID');
						
							message("New Record created successfully!", "success");
							redirect("index.php");
						}
					}}}							  
 
	function doEdit(){ 
 

		if(isset($_POST['save'])){ 

				// $borndate =  ($_POST['BORNDATE'] !='' || $_POST['BORNDATE'] !='0m/dd/yyyy') ? @date_format(date_create($_POST['BORNDATE']), "Y-m-d"): '0000-00-00';
				// $dieddate =  ($_POST['DIEDDATE'] !='' || $_POST['DIEDDATE'] !='0m/dd/yyyy') ? @date_format(date_create($_POST['DIEDDATE']), "Y-m-d") : '0000-00-00';
						$borndate =  $_POST['BORNDATE'];
						$dieddate =  $_POST['DIEDDATE'];
						
  				 	 	$p = New Person();  
						$p->FNAME 		= $_POST['FNAME'];
						// $p->LNAME 		= $_POST['LNAME'];
						// $p->MNAME 		= $_POST['MNAME'];
						$p->CATEGORIES  = $_POST['CATEGORIES'];
						$p->BORNDATE	= $borndate;
						$p->DIEDDATE	= $dieddate; 
						$p->GRAVENO		= $_POST['GRAVENO']; 
						$p->LOCATION 	= $_POST['LOCATION'];
						$p->update($_POST['PEOPLEID']);
  

			message("Record has been updated!", "success");
			redirect("index.php");
	  } 
}

	function doDelete(){

 
 

		if (isset($_POST['selector'])==''){
			message("Select the records first before you delete!","error");
			redirect('index.php');
			}else{

			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 

			$p = New Person();
			$p->delete($id[$i]);
  

			message("Record has been Deleted!","info");
			redirect('index.php');

			}
		}

	}
		 
?>