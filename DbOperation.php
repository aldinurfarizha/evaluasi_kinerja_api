<?php
 
class DbOperation
{
	private $con;

    function __construct()
    {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();
	}

	function getSales2(){
		$stmt = $this->con->prepare("SELECT * FROM data_sales");
		$stmt->execute();
		$stmt->bind_result($nik_sales, $nama_sales, $area_penempatan, $tanggal_masuk, $tanggal_keluar, $alamat, $ktp, $sim,	$tanggal_lahir, $no_hp, $keterangan, $pas_foto);
		
		$data_sales = array(); 
		
		while($stmt->fetch()){
			$sales  = array();
			$sales['nik_sales'] = $nik_sales; 
			$sales['nama_sales'] = $nama_sales; 
			$sales['area_penempatan'] = $area_penempatan; 
			$sales['tanggal_masuk'] = $tanggal_masuk; 
			$sales['tanggal_keluar'] = $tanggal_keluar; 
			$sales['alamat'] = $alamat; 
			$sales['ktp'] = $ktp; 
			$sales['sim'] = $sim; 
			$sales['tanggal_lahir'] = $tanggal_lahir; 
			$sales['no_hp'] = $no_hp; 
			$sales['keterangan'] = $keterangan; 
			$sales['pas_foto'] = $pas_foto; 

			array_push($data_sales, $sales); 
		}
		return $data_sales; 
	}

	function getSales(){
		$stmt = $this->con->prepare("SELECT nik_sales,nama_sales,(SELECT SUM(bobot_kriteria) as normalisasi from data_kriteria GROUP BY nik_sales) from data_sales");
		$stmt->execute();
		$stmt->bind_result($nik_sales, $nama_sales, $normalisasi);
		
		$data_sales = array(); 
		
		while($stmt->fetch()){
			$sales  = array();
			$sales['nik_sales'] = $nik_sales; 
			$sales['nama_sales'] = $nama_sales; 
			$sales['normalisasi'] = $normalisasi; 
			

			array_push($data_sales, $sales); 
		}
		return $data_sales; 
	}

	function get_bobot(){
		$stmt = $this->con->prepare("SELECT bobot_kriteria from data_kriteria");
		$stmt->execute();
		$stmt->bind_result($bobot_kriteria);
		$bobot= array(); 
		
		while($stmt->fetch()){
			$sales  = array();
			$sales['bobot_kriteria'] = $bobot_kriteria; 
			array_push($bobot, $sales); 
		}
		return $bobot; 
	}

	function getKriteria(){
		$stmt = $this->con->prepare("SELECT * FROM data_kriteria");
		$stmt->execute();
		$stmt->bind_result($kode_kriteria, $nama_kriteria, $bobot_kriteria, $ket_kriteria);
		
		$data_kriteria = array(); 
		
		while($stmt->fetch()){
			$kriteria  = array();
			$kriteria['kode_kriteria'] = $kode_kriteria; 
			$kriteria['nama_kriteria'] = $nama_kriteria; 
			$kriteria['bobot_kriteria'] = $bobot_kriteria; 
			$kriteria['ket_kriteria'] = $ket_kriteria; 

			array_push($data_kriteria, $kriteria); 
		}	
		return $data_kriteria; 
	}

	function getNilai(){
		$stmt = $this->con->prepare("SELECT * FROM data_nilai");
		$stmt->execute();
		$stmt->bind_result($kode_nilai, $kategori_nilai, $nilai_1, $nilai_2);
		
		$data_nilai = array(); 
		
		while($stmt->fetch()){
			$nilai  = array();
			$nilai['kode_nilai'] = $kode_nilai; 
			$nilai['kategori_nilai'] = $kategori_nilai; 
			$nilai['nilai_1'] = $nilai_1; 
			$nilai['nilai_2'] = $nilai_2; 

			array_push($data_nilai, $nilai); 
		}	
		return $data_nilai; 
	}

	function getnormalisasi(){
		$stmt = $this->con->prepare("SELECT sum(bobot_kriteria) as normalisasi from data_kriteria");
		$stmt->execute();
		$stmt->bind_result($normalisasisum);
		
		$data_normalisasi = array(); 
		
		while($stmt->fetch()){
			$normalisasi  = array();
			$normalisasi['normalisasi'] = $normalisasisum; 

			array_push($data_normalisasi, $normalisasi); 
		}	
		return $data_normalisasi; 
	}

	function insert_nilai(){
		
		
	}

	//contoh 
	function createSales($nik_sales, $nama_sales, $area_penempatan, $tanggal_masuk, $tanggal_keluar, $alamat, $ktp, $sim, $tanggal_lahir, $no_hp, $keterangan, $pas_foto){
		$stmt = $this->con->prepare("INSERT INTO data_sales (nik_sales, nama_sales, area_penempatan, tanggal_masuk, tanggal_keluar, alamat, ktp, sim, tanggal_lahir, no_hp, keterangan, pas_foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssssss", $nik_sales, $nama_sales, $area_penempatan, $tanggal_masuk, $tanggal_keluar, $alamat, $ktp, $sim, $tanggal_lahir, $no_hp, $keterangan, $pas_foto);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	//contoh
	function updateSales($nik_sales, $nama_sales, $area_penempatan, $tanggal_masuk, $tanggal_keluar, $alamat, $ktp, $sim, $tanggal_lahir, $no_hp, $keterangan, $pas_foto){
		$stmt = $this->con->prepare("UPDATE data_sales SET nama_sales=?, area_penempatan=?, tanggal_masuk=?, tanggal_keluar=?, alamat=?, ktp=?, sim=?, tanggal_lahir=?, no_hp=?, keterangan=?, pas_foto=? WHERE nik_sales=?");
		$stmt->bind_param("ssssssssssss", $nama_sales, $area_penempatan, $tanggal_masuk, $tanggal_keluar, $alamat, $ktp, $sim, $tanggal_lahir, $no_hp, $keterangan, $pas_foto, $nik_sales);
		if($stmt->execute())
			return true; 
		return false; 
	}

	//contoh
	function deleteSales($nik_sales){
		$stmt = $this->con->prepare("DELETE FROM data_sales WHERE nik_sales = ? ");
		$stmt->bind_param("i", $nik_sales);
		if($stmt->execute())
			return true; 
		
		return false; 
	}

	
	
}