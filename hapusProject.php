<?php
  $id=$_GET["id"];
  include "config/crudProject.php";
  $hasil=hapusProject($id);
  if($hasil){
    exit("<script>alert('Data berhasil dihapus'); window.location='media.php?module=projectdata';</script>");
  }else{
    exit("<script>alert('Data gagal dihapus'); window.location='media.php?module=projectdata';</script>");
  }
?>