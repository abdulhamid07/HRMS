<?php
include "koneksi.php";
$con=$conn;

function bacaKategori($sql){
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
$data[$i]['id']= $baris['EmployeeTypeID'];
$data[$i]['nama'] = $baris['EmployeeType'];
$i++;
}
//mysqli_close($koneksi);
return $data;
}

function tambahKategori($data){
	global $con;
	$koneksi =$con;
	$row=explode("*",$data);
	//$id=$row[0];
	$name=$row[0];

	$sql="insert into employeetype (EmployeeType)
		values('".$name."')";
	$hasil=mysqli_query($koneksi,$sql);

	//mysqli_close($con);
	return $hasil;
	
}

function editKategori($e){
	global $con;
	$koneksi =$con;
	$row=explode("*",$e);
	$id=$row[0];
	$name=$row[1];

	$edit="update employeetype set EmployeeType='".$name."' where EmployeeTypeID='".$id."'";
	$hasil=mysqli_query($koneksi,$edit);
	return $hasil;
}

function hapusKategori($e) {
	global $con;
	$koneksi =$con;
  	$sql="delete from employeetype where EmployeeTypeID='$e'";
    if (!mysqli_query($koneksi,$sql)) {
     die('Error:'.mysqli_error());
   }
   $hasil=mysqli_affected_rows($koneksi);
   //mysqli_close($koneksi);
   return $hasil;
}

?>