<?php
  $id=$_GET["id"];
  include "config/crudKategori.php";
  $hasil=hapusKategori($id);
  if($hasil){
    exit("<script>alert('Data berhasil dihapus'); window.location='media.php?module=employeedata';</script>");
  }else{
    exit("<script>alert('Data gagal dihapus'); window.location='media.php?module=employeedata';</script>");
  }
?>