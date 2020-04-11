<?php 
	require_once 'DbOperation.php';
	require_once 'DbConnect2.php';

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

			case 'getsales2':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Sukses load data sales';
				$response['data_sales'] = $db->getSales2();
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

			case 'getnormalisasi':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Ready';
				$response['normalisasi'] = $db->getnormalisasi();
			break; 

			case 'getbobot':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Ready';
				$response['bobot'] = $db->get_bobot();
			break; 

			case 'insert_nilai':

					$nik_sales = $_POST['nik_sales'];
					$_kd01=$_POST['kd01'];
					$_kd02=$_POST['kd02'];
					$_kd03=$_POST['kd03'];
					$_kd04=$_POST['kd04'];
					$_kd05=$_POST['kd05'];
					$_kd06=$_POST['kd06'];
					$_kd07=$_POST['kd07'];
					$_kd08=$_POST['kd08'];
					$_kd09=$_POST['kd09'];
					$_kd10=$_POST['kd10'];
					$_kd11=$_POST['kd11'];
					$_kd12=$_POST['kd12'];
					$_kd13=$_POST['kd13'];
					$_kd14=$_POST['kd14'];
					$_kd15=$_POST['kd15'];
					$hasil_akhir2=$_POST['hasil_akhir'];
					$nik_sales=$_POST['nik_sales'];

					$hasil_akhir= str_replace(",",".",$hasil_akhir2);
					$kd01= str_replace(",",".",$_kd01);
					$kd02= str_replace(",",".",$_kd02);
					$kd03= str_replace(",",".",$_kd03);
					$kd04= str_replace(",",".",$_kd04);
					$kd05= str_replace(",",".",$_kd05);
					$kd06= str_replace(",",".",$_kd06);
					$kd07= str_replace(",",".",$_kd07);
					$kd08= str_replace(",",".",$_kd08);
					$kd09= str_replace(",",".",$_kd09);
					$kd10= str_replace(",",".",$_kd10);
					$kd11= str_replace(",",".",$_kd11);
					$kd12= str_replace(",",".",$_kd12);
					$kd13= str_replace(",",".",$_kd13);
					$kd14= str_replace(",",".",$_kd14);
					$kd15= str_replace(",",".",$_kd15);

					
					
					$month=date('m');
					$years=date('yy');
					$id_hasil=$month."_"."$years"."_"."$nik_sales";
					
					
					
					$stmt = $conn->prepare("SELECT kode_hasil_nilai FROM data_hasil_nilai WHERE kode_hasil_nilai = ?");
					$stmt->bind_param("s", $id_hasil);
					$stmt->execute();
					$stmt->store_result();
					
					if($stmt->num_rows > 0){
						$response['error'] = true;
						$response['message'] = 'User Ini Telah Di nilai Bulan Ini';
						$stmt->close();
					}else{
						$stmt = $conn->prepare("INSERT INTO data_hasil_nilai (kode_hasil_nilai,kd01,kd02,kd03,kd04,kd05,kd06,kd07,kd08,kd09,kd10,kd11,kd12,kd13,kd14,kd15,hasil_akhir,tanggal,nik_sales
						) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURRENT_DATE(),?)");
						$stmt->bind_param("ssssssssssssssssss", $id_hasil, $kd01, $kd02,$kd03,$kd04,$kd05,$kd06,$kd07,$kd08,$kd09,$kd10,$kd11,$kd12,$kd13,$kd14,$kd15,$hasil_akhir,$nik_sales);
		
						if($stmt->execute()){
						
							
							$response['error'] = false; 
							$response['message'] = 'Berhasil Di Nilai'; 
						
						}
					}
					
				
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