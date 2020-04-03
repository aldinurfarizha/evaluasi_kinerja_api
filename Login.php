<?php 
 
require_once 'LConnect.php';
 
$response = array();
 
if(isset($_GET['apicall'])){	
	switch($_GET['apicall']){
		 
	case 'login':
		if(isTheseParametersAvailable(array('username', 'password'))){
			$username = $_POST['username'];
			$password = md5($_POST['password']); 
				 
			$stmt = $conn->prepare("SELECT nik_user, jabatan, nama, username FROM data_user WHERE username = ? AND password = ?");
			$stmt->bind_param("ss",$username, $password);
				 
			$stmt->execute();
			$stmt->store_result();
				 
			if($stmt->num_rows > 0){
				$stmt->bind_result($nik_user, $jabatan, $nama, $username);
				$stmt->fetch();

				if($jabatan == 'Leader'){ 
					$user = array(
						'nik_user'=>$nik_user, 
						'jabatan'=>$jabatan,
						'nama'=>$nama,
						'username'=>$username
					);
					 
					$response['error'] = false; 
					$response['message'] = 'Login Sukses'; 
					$response['user'] = $user; 
					
				}
				else{
					$response['error'] = true; 
					$response['message'] = 'Maaf Anda tidak memiliki hak akses ';
			 	}
			}
			else{
				$response['error'] = false; 
				$response['message'] = 'Username atau Password Salah';
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
 
 function isTheseParametersAvailable($params){
	 
	 foreach($params as $param){
		 if(!isset($_POST[$param])){
			 return false; 
		 }
	 }
	 return true; 
 }
?>