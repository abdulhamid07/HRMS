<?php
	if(empty($_GET['module'])){
		include "beranda.php";
	}else{
		switch($_GET['module']){
			case ('employeedata'): include("employeeData.php");
			break;
			case ('employeeadd'): include("addEmployee.php");
			break;
			case ('employeeedit'): include("editEmployee.php");
			break;
			case ('employeehapus'): include("hapusEmployee.php");
			break;
			case ('typeadd'): include("addType.php");
			break;
			case ('typeedit'): include("editType.php");
			break;
			case ('typehapus'): include("hapusType.php");
			break;
			//client
			case ('clientdata'): include("clientData.php");
			break;
			case ('clientadd'): include("addClient.php");
			break;
			case ('clientedit'): include("editClient.php");
			break;
			case ('clienthapus'): include("hapusClient.php");
			break;
			//alokasi projek
			case ('projectdata'): include("projectData.php");
			break;
			case ('projectadd'): include("addProject.php");
			break;
			case ('projectadd'): include("addProject.php");
			break;
			case ('allocateadd'): include("addAllocate.php");
			break;
			case ('allocatedetails'): include("detailAllocate.php");
			break;
			case ('projectedit'): include("editProject.php");
			break;
			case ('projecthapus'): include("hapusProject.php");
			break;
			case ('editallocate'): include("editAllocate.php");
			break;
		}

	}
?>