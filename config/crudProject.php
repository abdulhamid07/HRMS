<?php
include "koneksi.php";
$con=$conn;

function bacaProject($sql){
global $con;
$data = array();
$koneksi =$con;
$hasil = mysqli_query($koneksi, $sql);
// jikatidakada record, hasilberupa null
if(mysqli_num_rows($hasil) == 0) {
//mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]['ProjectID']= $baris['ProjectID'];
$data[$i]['ProjectName'] = $baris['ProjectName'];
$data[$i]['ProjectStartDate'] = $baris['ProjectStartDate'];
$data[$i]['ProjectEndDate'] = $baris['ProjectEndDate'];
$data[$i]['ProjectAssignedDate'] = $baris['ProjectAssignedDate'];
$data[$i]['ProjectCost'] = $baris['ProjectCost'];
$data[$i]['Remaks'] = $baris['Remaks'];
$data[$i]['ClientName'] = $baris['ClientName'];

$i++;
}
//mysqli_close($koneksi);
return $data;
}
function bacaAllocateDetails($sql){
global $con;
$data = array();
$koneksi =$con;
$hasil = mysqli_query($koneksi, $sql);
// jikatidakada record, hasilberupa null
if(mysqli_num_rows($hasil) == 0) {
//mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data['ProjectName']= $baris['ProjectName'];
$data['ClientName'] = $baris['ClientName'];
$data['ProjectAllocatedDate'] = $baris['ProjectAllocatedDate'];
$data['ExpectedDeliveryDate'] = $baris['ExpectedDeliveryDate'];
$data['Remaks'] = $baris['Remaks'];
$i++;
}
//mysqli_close($koneksi);
return $data;
}
function cariProjectID($sql){
global $con;
$data = array();
$koneksi =$con;
$hasil = mysqli_query($koneksi, $sql);
// jikatidakada record, hasilberupa null
if(mysqli_num_rows($hasil) == 0) {
//mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]= $baris['ProjectID'];

$i++;
}
//mysqli_close($koneksi);
return $data;
}
function bacaAllocateProject($sql){
global $con;
$data = array();
$koneksi =$con;
$hasil = mysqli_query($koneksi, $sql);
// jikatidakada record, hasilberupa null
if(mysqli_num_rows($hasil) == 0) {
//mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data[$i]['ProjectID']= $baris['ProjectID'];
$data[$i]['ProjectName'] = $baris['ProjectName'];
$data[$i]['ProjectStartDate'] = $baris['ProjectStartDate'];
$data[$i]['ProjectEndDate'] = $baris['ProjectEndDate'];
$data[$i]['ProjectAssignedDate'] = $baris['ProjectAssignedDate'];
$data[$i]['ProjectCost'] = $baris['ProjectCost'];
$data[$i]['Remaks'] = $baris['Remaks'];
$i++;
}
mysqli_close($koneksi);
return $data;
}
function tambahProject($data){
	global $con;
	$koneksi =$con;
	$row=explode("*",$data);
	$name=" ".$row[0];
	$start=$row[1];
	$end=$row[2];
	$assigned=$row[3];
	$cost=$row[4];
	$client=$row[5];
	$remaks=$row[6];
	
	$sql="insert into projectdetails (ProjectName,ProjectStartDate,ProjectEndDate,ProjectAssignedDate,ProjectCost,ClientID,Remaks)
		values('".$name."','".$start."','".$end."','".$assigned."','".$cost."','".$client."','".$remaks."')";
	$hasil=mysqli_query($koneksi,$sql);

	//mysqli_close($con);
	return $hasil;
	
}
function tambahAllocateProject($projectID,$allocate,$expected,$remaks,$employee){
	global $con;
	$koneksi =$con;
	$sqldel="delete from projectallocationdetails where ProjectID='$projectID'";
	if (!mysqli_query($koneksi,$sqldel)) {
     die('Error:'.mysqli_error());
   }

	$jmlarr=count($employee);
	$sql="insert into projectallocationdetails (ProjectID,EmployeeID,ProjectAllocatedDate,ExpectedDeliveryDate,Remaks) VALUES";
	
	$index = 0; // Set index array awal dengan 0
foreach($employee as $datanem){ // Kita buat perulangan berdasarkan nis sampai data terakhir
	//for($i=0; $i<$jmlarr; $i++){
	$sql .= "(".$projectID.",".$employee[$index].",'".$allocate."','".$expected."','".$remaks."'),";
	$index++;
}
//}
	$sql = substr($sql, 0, strlen($sql) - 1).";";
	$hasil=mysqli_query($koneksi,$sql);
	echo mysqli_error();
	echo $sql;

	//mysqli_close($con);
	return $hasil;
	
}

function editProject($e){
	global $con;
	$koneksi =$con;
	$row=explode("*",$e);
	$id=$row[0];
	$name=" ".$row[1];
	$start=$row[2];
	$end=$row[3];
	$assigned=$row[4];
	$cost=$row[5];
	$client=$row[6];
	$remaks=$row[7];
	$edit="update projectdetails set ProjectName='".$name."', ProjectStartDate='".$start."', ProjectEndDate='".$end."', ProjectAssignedDate='".$assigned."', ProjectCost='".$cost."', ClientID='".$client."', Remaks='".$remaks."' where ProjectID='".$id."'";
	$hasil=mysqli_query($koneksi,$edit);
	return $hasil;
}

function hapusProject($e) {
	global $con;
	$koneksi =$con;
  	$sql="delete from projectdetails where ProjectID='$e'";
    if (!mysqli_query($koneksi,$sql)) {
     die('Error:'.mysqli_error());
   }
   $hasil=mysqli_affected_rows($koneksi);
   //mysqli_close($koneksi);
   return $hasil;
}
function editAllocate($sql){
global $con;
$data = array();
$koneksi =$con;
$hasil = mysqli_query($koneksi, $sql);
// jikatidakada record, hasilberupa null
if(mysqli_num_rows($hasil) == 0) {
mysqli_close($koneksi);
return null;
}
$i=0;
while($baris = mysqli_fetch_assoc($hasil)){
$data['ProjectAllocationID']= $baris['ProjectAllocationID'];
$data['ProjectName']= $baris['ProjectName'];
$data['ProjectAllocatedDate'] = $baris['ProjectAllocatedDate'];
$data['ExpectedDeliveryDate'] = $baris['ExpectedDeliveryDate'];
$data['Remaks'] = $baris['Remaks'];
$i++;
}
mysqli_close($koneksi);
return $data;
}
?>