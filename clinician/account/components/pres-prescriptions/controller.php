<?php

//defined('_VALID_ACCESS') or die("Invalid Access");



$component=$_GET['c'];

$task=@$_GET['task'];

$id=@$_GET['id'];





require_once(PATH.PRESCRIBER_ADMIN."components/".$component."/functions.php");

require_once(PATH.PRESCRIBER_ADMIN."components/".$component."/view.php");



switch($task)

	{

		

		case "add":

			createFormForPages(0);

			break;

		

		case "edit":

			createFormForPages($id);

			break;
			
		
		case "detail":
		createFormForPages_detail($id);
		break;
		
		
		

		case "save":

			saveFormValues();

			break;

		

		case 'saveedit':



			saveModificationsOperation();



			break;
			
	
		case 'sendmessage':
		savemessage();
		break;
		
		case 'savepres':
		saveprescription();
		break;
		
		case 'accept':
		acceptprescription();
		break;
		
		case 'savenotes':
		fnSaveNotes();
		break;
		
		case 'editdosage':
		fnSaveDosage();
		break;
		
		case 'savecancelreq':
		fnSaveCanRequest();
		break;
		


			

		case 'publishList':

			

			publishSelectedItems();



			break;

			

		case 'unpublishList':

			

			unpublishSelectedItems();



			break;

			

		case 'remove':

			

			removeSelectedItems();



			break;

		

		default:

			showList();
			

			break;

			
			
		case 'deleted':

			

			removeDeletedItems();
	
	
	
			break;	


		/*case "edit":

			createFormForPages($id);

			break;

		case "save":

			saveFormValues();

			break;*/

		

	}







?>
