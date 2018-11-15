<?php
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,11,3);
			$menit = substr($tgl,14,3);
			$detik = substr($tgl,17,2);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.' '.$menit.' '.$detik;		 
	}	
	function bulan_indo($tgl2){
			$bulan2 = getBulan(substr($tgl2,5,2));
			return trim($bulan2);
	}
	function tgl_default($tgl3){
		$tanggal3=substr($tgl3,3,2);
		$bulan3=substr($tgl3, 0,2);
		$tahun3=substr($tgl3, 6,4);
		return $tahun3.'-'.$bulan3.'-'.$tanggal3;
	}
	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 
?>
