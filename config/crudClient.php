<?php
include "koneksi.php";
$con=$conn;

function bacaClient($sql){
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
$data[$i]['id']= $baris['ClientID'];
$data[$i]['nama'] = $baris['ClientName'];
$data[$i]['perusahaan'] = $baris['CompanyName'];
$data[$i]['alamat'] = $baris['Address'];
$data[$i]['noHp'] = $baris['ContactNumber'];
$i++;
}
//mysqli_close($koneksi);
return $data;
}

function tambahClient($data){
	global $con;
	$koneksi =$con;
	$row=explode("*",$data);
	//$id=$row[0];
	$name=$row[0].=" ";
	$company=$row[1];
	$address=$row[2];
	$contact=$row[3];

	$sql="insert into clientdetails (ClientName,CompanyName,Address,ContactNumber)
		values('".$name."','".$company."','".$address."','".$contact."')";
	$hasil=mysqli_query($koneksi,$sql);

	//mysqli_close($con);
	return $hasil;
	
}
function editClient($e){
	global $con;
	$koneksi =$con;
	$row=explode("*",$e);
	$id=$row[0];
	$name=$row[1];
	$company=$row[2];
	$address=$row[3];
	$contact=$row[4];

	$edit="update clientdetails set ClientName='".$name."', CompanyName='".$company."', Address='".$address."', ContactNumber='".$contact."' where ClientID='".$id."'";
	$hasil=mysqli_query($koneksi,$edit);
	return $hasil;
}

function hapusClient($e) {
	global $con;
	$koneksi =$con;
  	$sql="delete from clientdetails where ClientID='$e'";
    if (!mysqli_query($koneksi,$sql)) {
     die('Error:'.mysqli_error());
   }
   $hasil=mysqli_affected_rows($koneksi);
   //mysqli_close($koneksi);
   return $hasil;
}

?>