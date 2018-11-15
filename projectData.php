<?php
  include "config/crudProject.php";
?>
    <section class="content-header">
      <h1>
        Projects Data
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Projects Data</li>
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
								&emsp; <a href="media.php?module=projectadd" class="btn btn-success btn-flat">+ Project</a>
                &emsp; <a href="media.php?module=allocateadd" class="btn btn-warning btn-flat">+ Allocate Project</a>
                </div>        
                <div class="col-xs-5">
                  <form action="#" method="post" class="sidebar-form">
                  <div class="input-group">
                  <input type="text" name="nama" class="form-control" placeholder="Search Project">
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
                                    
                                    $sql="select pd.*, cd.ClientName from projectdetails pd
                                    join clientdetails cd on cd.ClientID=pd.ClientID where pd.ProjectName like '%".$nama."%' order by pd.ProjectStartDate asc";
                                    $sqlallocate="select DISTINCT ProjectID from projectallocationdetails";
                                    $data=bacaProject($sql);
                                    $dataallocate=cariProjectID($sqlallocate);
                                    if($data==null){
                                      echo "No Client Data Found";
                                    }else{
                                      if($nama !=" "){ ?>
                                        <div class="alert alert-danger alert-dismissable">Project yang Anda cari <b><?php echo $nama; ?></b></div>
                                      <?php }
                                  ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Assigned Date</th>
                                                <th>Cost</th>
                                                <th>Client</th>
                                                <th>Remaks</th>
                                                <th colspan="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <?php
                                          foreach ($data as $p) {
                                             ?>
                                            <tr>
                                                <td><?php echo $p['ProjectID'] ?></td>
                                                <td><?php echo $p['ProjectName'] ?></td>
                                                <td><?php echo tgl_indo($p['ProjectStartDate']) ?></td>
                                                <td><?php echo tgl_indo($p['ProjectEndDate']) ?></td>
                                                <td><?php echo tgl_indo($p['ProjectAssignedDate']) ?></td>
                                                <td><?php echo format_rupiah($p['ProjectCost']) ?></td>
                                                <td><?php echo $p['ClientName'] ?></td>
                                                <td><?php echo $p['Remaks'] ?></td>
                                                <td>
                                                   <?php
                                                   //if($dataallocate>0){

                                                   
                                                  if(in_array($p['ProjectID'],$dataallocate)){
                                                ?>
                                                  <a href="media.php?module=allocatedetails&id=<?php echo $p['ProjectID'] ?>" title="Details Project Allocation"><i class="fa fa-eye"></i></a>
                                                  <?php } ?>
                                                </td>
                        												<td><a href="media.php?module=projectedit&id=<?php echo $p['ProjectID'] ?>" title="Edit data"><i class="fa fa-edit"></i></a></td>
                        												<td><a href="media.php?module=projecthapus&id=<?php echo $p['ProjectID'] ?>" onclick="return confirm('Anda yakin data ini akan dihapus?')" title="Hapus data"><i class="fa fa-trash-o"></i></a></td>
                                              </tr>
                                            <?php } ?>  
                                        </tbody>
                                    </table><?php } ?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
    </section>
