<?php
  $id=$_GET["id"];
  include "config/crudClient.php";
  $hasil=hapusClient($id);
  if($hasil){
    exit("<script>alert('Data berhasil dihapus'); window.location='media.php?module=clientdata';</script>");
  }else{
    exit("<script>alert('Data gagal dihapus'); window.location='media.php?module=clientdata';</script>");
  }
?>