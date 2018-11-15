<?php
include "config/crudProject.php";
include "config/crudEmployee.php";

$id=$_GET["id"];
  $sql="select ad.*,c.ClientName, p.ProjectName,e.EmployeeName from projectallocationdetails ad
  join projectdetails p on p.ProjectID=ad.ProjectID
  join employeedetails e on e.EmployeeID=ad.EmployeeID
  join clientdetails c on c.ClientID=p.ClientID where ad.ProjectID='$id'";
  $sqlem="select e.* from employeedetails e
  join projectallocationdetails ad on ad.EmployeeID=e.EmployeeID where ad.ProjectID='$id'";
  $ex=bacaAllocateDetails($sql);
  $dataem=bacaEmployee($sqlem);
?>
    <section class="content-header">
      <h1>
        Allocation To Project <font color="red"><?php echo $ex["ProjectName"] ?></font>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Allocate Details</li>
      </ol>
    </section>

    <!-- Main content -->
                <section class="content">
					<div class="box box-primary" disabled >
                        <div class="box-header">
                        <button class="btn btn-success btn-flat"><?php echo $ex["Remaks"] ?></button>
                        </div><!-- /.box-header -->
								
                                <div class="box-body table-responsive">
									<div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" disabled class="form-control" value="<?php echo $ex["ClientName"] ?>"/>
                      </div>
                      <div class="form-group">
                        <label>Project Allocated Date</label>
                         <input type="text" disabled class="form-control" value="<?php echo tgl_indo($ex["ProjectAllocatedDate"]) ?>"/>
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Employee Name</label></br>
                        
                         <?php
                                          foreach ($dataem as $em) {
                                          echo "<button class='btn btn-large btn-flat'/>".$em["nama"]."</button>"."&nbsp"; } ?> 
                      </div>
                      <div class="form-group">
                        <label>Project Expected Delivery Date</label>
                         <input type="text" disabled class="form-control" value="<?php echo tgl_indo($ex["ExpectedDeliveryDate"]) ?>"/>
                      </div>
                    </div>  				
									</div>
										
                                </div><!-- /.box-body -->
								<div class="box-footer">
										<a href="media.php?module=projectdata" class="btn btn-warning">Back</a>
                    <a href="media.php?module=editallocate&id=<?php echo $id ?>" class="btn btn-primary">Edit Allocate</a>
                                </div>
                    </div><!-- /.box -->
                    <!-- /.row -->


                </section><!-- /.content -->

