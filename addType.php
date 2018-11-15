   <?php
                        include "config/crudKategori.php";
                          $str = array(anti_injection($_POST["category"]));
                          $data= implode("*",$str);
                          $hasil=tambahKategori($data);
                          if($hasil){
                            exit("<script>alert('Data berhasil disimpan'); window.location='media.php?module=employeedata';</script>");
                          }else{
                            exit("<script>alert('Data gagal disimpan'); window.location='media.php?module=employeedata';</script>");
                          }
                    ?>