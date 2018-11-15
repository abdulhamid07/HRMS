<?php
include "koneksi.php";
$con=$conn;

function bacaEmployee($sql){
global $con;
$data = array();
$koneksi =$con;
$hasil = mysqli_query($koneksi, $sql);
// jikatidakada record, hasilberupa null
if (mysqli_num_rows($hasil) == 0) {
//mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]['id']= $baris['EmployeeID'];
$data[$i]['nama'] = $baris['EmployeeName'];
$data[$i]['alamat'] = $baris['EmployeeAddress'];
$data[$i]['noHp'] = $baris['EmployeeContactNumber'];
$i++;
}
//mysqli_close($koneksi);
return $data;
}

function tambahEmployee($data){
	global $con;
	$koneksi =$con;
	$row=explode("*",$data);
	//explode = memecah atau mengextrak aray berdasarkan karakter tertentu
	//$id=$row[0];
	$name=" ".$row[0];
	$address=$row[1];
	$contact=$row[2];

	$sql="insert into employeedetails (EmployeeName,EmployeeAddress,EmployeeContactNumber)
		values('".$name."','".$address."','".$contact."')";
	$hasil=mysqli_query($koneksi,$sql);

	//mysqli_close($con);
	return $hasil;
	
}
function editEmployee($e){
	global $con;
	$koneksi =$con;
	$row=explode("*",$e);
	$id=$row[0];
	$name=$row[1];
	$address=$row[2];
	$contact=$row[3];

	$edit="update employeedetails set EmployeeName='".$name."', EmployeeAddress='".$address."', EmployeeContactNumber='".$contact."' where EmployeeID='".$id."'";
	$hasil=mysqli_query($koneksi,$edit);
	return $hasil;
}

function hapusEmployee($e) {
	global $con;
	$koneksi =$con;
  	$sql="delete from employeedetails where EmployeeID='$e'";
    if (!mysqli_query($koneksi,$sql)) {
     die('Error:'.mysqli_error());
   }
   $hasil=mysqli_affected_rows($koneksi);
   //mysqli_close($koneksi);
   return $hasil;
}

?>