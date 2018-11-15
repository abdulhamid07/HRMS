<?php
  include "config/crudProject.php";
                                  
                                   
?>    
    <section class="content-header">
      <h1>
        Allocate Project
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Allocate Project</li>
      </ol>
    </section>

    <!-- Main content -->
                <section class="content">
					<div class="box box-primary">
                        <div class="box-header">
                                </div><!-- /.box-header -->
								
                <div class="box-body table-responsive">
									<div class="row">
                    <form action="media.php?module=allocateadd" method="post">
										<div class="col-md-12">
											<div class="form-group">
                  												Project
                          <select name="project" class="form-control">
                            <option value="">-- Select Project --</option>
                            <?php 
                             $sql="select * from projectdetails";
                                    $data=bacaAllocateProject($sql);
                              foreach ($data as $project) { ?>
                                <option value="<?php echo $project['ProjectID'] ?>"><?php echo $project['ProjectName'] ?></option>
                              <?php }
                            ?>
                          </select>
											</div>
                      <div class="row">
                        <div class="col-md-8">
											<div class="form-group">
												 Employee
                         <?php  include "config/crudEmployee.php";
                                    $sqlem="select * from employeedetails";
                                    $data=bacaEmployee($sqlem);
                                     ?>
                          <select name="employee[]" class="form-control">
                            <option value="">-- Select Employee --</option>
                            <?php 
                              foreach ($data as $em) { ?>
                                <option value="<?php echo $em['id'] ?>"><?php echo $em['nama'] ?></option>
                              <?php } ?>
                          </select>
											</div>
                      <div class="form-group" id="insert-form" class="form-control">
                        
                      </div>
                    </div>
                    
                    <div class="col-md-4">
                      <div class="form-group">
                      </br>
                          <button type="button" id="btn-tambah-form" class="btn btn-primary btn-flat">Tambah Employee</button>
                          <button type="button" id="btn-reset-form" class="btn btn-warning btn-flat">Reset Employee</button>
                      </div>
                    </div>
                  </div>
											<div class="form-group">
												 Allocate
        <div class="input-group date">
          <div class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
             </div>
             <input placeholder="Allocate Date" type="text" class="form-control datepicker" name="allocate">
        </div>
											</div>
                      
                          <div class="form-group">
                         Exppected Delivery
        <div class="input-group date">
          <div class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
             </div>
             <input placeholder="Expected Delivery" type="text" class="form-control datepicker" name="expected">
           </div>
                      </div>
                      <div class="form-group">
                         Remaks
        
                    <input placeholder="Remaks" type="text" class="form-control" name="remaks">
                      </div>
										</div>				
									</div>
										
                                </div><!-- /.box-body -->
								<div class="box-footer">
										<a href="media.php?module=projectdata" class="btn btn-warning">Back</a>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
										<input type="reset" class="btn btn-default" value="Reset"/>
                                </div>
                                </form>
                     <input type="hidden" id="jumlah-form" value="1">
                    
                    <?php
                      if(isset($_POST["submit"])){
                          $project=$_POST["project"];
                          $allocate=$_POST["allocate"];
                          $expected=$_POST["expected"];
                          $remaks=$_POST["remaks"];
                          //$employee=array($_POST["employee"]);
                          //$str = array(anti_injection($_POST["project"]),anti_injection($_POST["allocate"]),anti_injection($_POST["expected"]),anti_injection($_POST["remaks"]));
                          //$str .=array($_POST["employee"]);
                          //$data= implode("*",$str);
                          $hasil=tambahAllocateProject($project,$allocate,$expected,$remaks,$_POST["employee"]);
                          if($hasil){
                            exit("<script>alert('Data berhasil disimpan'); window.location='media.php?module=projectdata'; </script>");
                          }else{
                            exit("<script>alert('Data gagal disimpan');</script>");
                          }
                      }
                    ?>
                    </div><!-- /.box -->
                    <!-- /.row -->


                </section><!-- /.content -->
<script>
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
 <script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $("#insert-form").append("<select name='employee[]' class='form-control'>"+
                            "<option value=''>-- Select Employee --</option>"+
                            "<?php foreach ($data as $em) { ?>"+
                            "<option value='<?php echo $em['id'] ?>'><?php echo $em['nama'] ?></option>"+
                            "<?php } ?>"+
                            "</select></br>");
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
