<?php
  include "config/crudEmployee.php";
  include "config/crudKategori.php";
?>
    <section class="content-header">
      <h1>
        Employee Data
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employee Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="col-lg-9">
      <div class="box box-info">
                                <div class="box-header">
                                </div><!-- /.box-header -->
								<div class="box-body">
								<div class="row">
								<div class="col-xs-3">
								  &emsp; <a href="media.php?module=employeeadd" class="btn btn-success btn-flat">+ Employees</a>
								</div>				
								<div class="col-xs-5">
								  <form action="#" method="post" class="sidebar-form">
									<div class="input-group">
									<input type="text" name="nama" class="form-control" placeholder="Search Employee Name">
								  <span class="input-group-btn">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
										</button>
									  </span>
									</div>
									</form>
								</div>
								</div>
							</div>
					
                                <div class="box-body table-responsive">
                                  <?php

                                    if(isset($_POST["search"])){
                                      $nama=$_POST["nama"]; 
                                      if($nama==null){
                                          $nama=" ";
                                      } 
                                    }else{
                                      $nama=" ";
                                    }
                                    
                                    $sql="select * from employeedetails where EmployeeName like '%".$nama."%'";
                                    $data=bacaEmployee($sql);
                                    if($data==null){
                                      echo "No Employee Data Found";
                                    }else{
                                      if($nama !=" "){ ?>
                                        <div class="alert alert-danger alert-dismissable">Data yang Anda cari dengan nama <b><?php echo $nama; ?></b></div>
                                      <?php }
                                  ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Contact Number</th>
												                        <th colspan="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($data as $employee) {
                                             ?>
                                            <tr>
                                                <td><?php echo $employee['id'] ?></td>
                                                <td><?php echo $employee['nama'] ?></td>
                                                <td><?php echo $employee['alamat'] ?></td>
                                                <td><?php echo $employee['noHp'] ?></td>
                        												<td><a href="media.php?module=employeeedit&id=<?php echo $employee['id'] ?>" title="Edit data"><i class="fa fa-edit"></i></a></td>
                        												<td><a href="media.php?module=employeehapus&id=<?php echo $employee['id'] ?>" onclick="return confirm('Anda yakin data ini akan dihapus?')" title="Hapus data"><i class="fa fa-trash-o"></i></a></td>
                                              </tr>
                                            <?php } ?>  
                                        </tbody>
                                    </table><?php } ?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
						</div>
						<div class="col-lg-3">
      <div class="box box-warning">
                                <div class="box-header">
                                </div><!-- /.box-header -->
								&emsp; <a href="addKaryawan.html" class="btn btn-success btn-flat" data-toggle="modal" data-target="#addCategory">+ Category</a>
                                <div class="box-body table-responsive">
                                  <?php
                                      $sqlType="select * from employeetype";
                                      $types=bacaKategori($sqlType);

                                    if($types==null){
                                      echo "No Category Data Found";
                                    }else{
                                  ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category</th>
												<th colspan="3">Action</th>
							
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($types as $type) {
                                             ?>
                                            <tr>
                                                <td><?php echo $type['id'] ?></td>
                                                <td><?php echo $type['nama'] ?></td>
                                                <td><a href="media.php?module=typeedit&id=<?php echo $type['id'] ?>" title="Edit data"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="media.php?module=typehapus&id=<?php echo $type['id'] ?>" onclick="return confirm('Anda yakin data ini akan dihapus?')" title="Hapus data"><i class="fa fa-trash-o"></i></a></td>
                                              </tr>
                                            <?php } ?>  
                                            </tr>
                                        </tbody>
                                    </table>
                                  <?php } ?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
							  </div>
    </section>

  <div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
<div id="addCategory" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add or Edit Category</h4>
		</div>
		<!-- body modal -->
    <form method="post" action="media.php?module=typeadd">
		<div class="modal-body">
				Category Name
				<input type="text" name="category" class="form-control" placeholder="Category Name"/>
				<hr>
			
		</div>
		<!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<input type="submit" name="simpanType" class="btn btn-primary" value="Simpan"/>
		</div>
    </form>
	</div>
   </div>

</div>

<script>
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>