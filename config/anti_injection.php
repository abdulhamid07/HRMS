<?php

function anti_injection($data){
	include "koneksi.php";
$filter = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
return $filter;
}
?>