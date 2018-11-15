<?php
  include "config/crudClient.php";
?>
    <section class="content-header">
      <h1>
        Client Data
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Client Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
                                <div class="box-header">
                                </div><!-- /.box-header -->
								<div class="box-body">
								<div class="row">
								<div class="col-xs-3">
								  &emsp; <a href="media.php?module=clientadd" class="btn btn-success btn-flat">+ Client</a>
								</div>				
								<div class="col-xs-5">
								  <form action="#" method="post" class="sidebar-form">
									<div class="input-group">
									<input type="text" name="nama" class="form-control" placeholder="Search Client Name">
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
                                    
                                    $sql="select * from clientdetails where ClientName like '%".$nama."%'";
                                    $data=bacaClient($sql);
                                    if($data==null){
                                      echo "No Client Data Found";
                                    }else{
                                      if($nama !=" "){ ?>
                                        <div class="alert alert-danger alert-dismissable">Client yang Anda cari dengan nama <b><?php echo $nama; ?></b></div>
                                      <?php }
                                  ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Company</th>
                                                <th>Contact Number</th>
												                        <th colspan="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($data as $client) {
                                             ?>
                                            <tr>
                                                <td><?php echo $client['id'] ?></td>
                                                <td><?php echo $client['nama'] ?></td>
                                                <td><?php echo $client['perusahaan'] ?></td>
                                                <td><?php echo $client['alamat'] ?></td>
                                                <td><?php echo $client['noHp'] ?></td>
                        												<td><a href="media.php?module=clientedit&id=<?php echo $client['id'] ?>" title="Edit data"><i class="fa fa-edit"></i></a></td>
                        												<td><a href="media.php?module=clienthapus&id=<?php echo $client['id'] ?>" onclick="return confirm('Anda yakin data ini akan dihapus?')" title="Hapus data"><i class="fa fa-trash-o"></i></a></td>
                                              </tr>
                                            <?php } ?>  
                                        </tbody>
                                    </table><?php } ?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
    </section>