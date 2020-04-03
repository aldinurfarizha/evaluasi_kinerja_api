<?php 
	require_once 'DbOperation.php';

	function isTheseParametersAvailable($params){
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
			echo json_encode($response);
			
			die();
		}
	}
	
	$response = array();

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
			
			case 'getsales':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Sukses load data sales';
				$response['data_sales'] = $db->getSales();
			break; 

			case 'getkriteria':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Sukses load data kriteria';
				$response['data_kriteria'] = $db->getKriteria();
			break; 

			case 'getnilai':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Sukses load data standar nilai';
				$response['data_sales'] = $db->getNilai();
			break; 

			default: 
			 $response['error'] = true; 
			 $response['message'] = 'Invalid Operation Called';
		}
		
	}else{

		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	echo json_encode($response);