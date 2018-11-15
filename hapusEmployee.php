<?php
  $id=$_GET["id"];
  include "config/crudEmployee.php";
  $hasil=hapusEmployee($id);
  if($hasil){
    exit("<script>alert('Data berhasil dihapus'); window.location='media.php?module=employeedata';</script>");
  }else{
    exit("<script>alert('Data gagal dihapus'); window.location='media.php?module=employeedata';</script>");
  }
?>