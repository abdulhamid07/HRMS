<?php
include "config/crudProject.php";
  include "config/crudClient.php";
  if(!isset($_POST["submit"])){
    $id=$_GET["id"];
  }else{
    $id=" ";
  }
  $sql="select pd.*, cd.ClientName from projectdetails pd
        join clientdetails cd on cd.ClientID=pd.ClientID where pd.ProjectID='$id' limit 1";
  $ex=bacaProject($sql);
  $sqlclient="select * from clientdetails";
  $exclient=bacaClient($sqlclient);
?>
    <section class="content-header">
      <h1>
        Edit Project
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Project</li>
      </ol>
    </section>

    <!-- Main content -->
                <section class="content">
					<div class="box box-primary">
                        <div class="box-header">
                                </div><!-- /.box-header -->
								
                                <div class="box-body table-responsive">
									<div class="row">
                    <form action="media.php?module=projectedit" method="post">
										<div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
                        <label>Project Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Project Name" value="<?php echo $ex[0]["ProjectName"]; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Project Start Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                             <input placeholder="Start Date" type="text" class="form-control datepicker" name="start" value="<?php echo $ex[0]["ProjectStartDate"]; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Project End Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                             <input placeholder="End Date" type="text" class="form-control datepicker" name="end" value="<?php echo $ex[0]["ProjectEndDate"]; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Project Assigned Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                             <input placeholder="Assigned Date" type="text" class="form-control datepicker" name="assigned" value="<?php echo $ex[0]["ProjectAssignedDate"]; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Project Cost</label>
                        <input type="text" name="cost" class="form-control" placeholder="Cost" value="<?php echo $ex[0]["ProjectCost"]; ?>">
                      </div>
                      <div class="form-group">
                        <label>Client Name</label>
                        <select name="client" class="form-control">
                            <option value="">-- Pilih Client --</option>
                             <?php foreach ($exclient as $p) { ?>
                            <option value="<?php echo $p['id'] ?>" <?php if($ex[0]["ClientName"]==$p["nama"]){ ?> selected="selected" <?php } ?>><?php echo $p["nama"] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Remaks</label>
                        <input type="text" class="form-control" name="remaks" placeholder="Remaks" value="<?php echo $ex[0]["Remaks"]; ?>">
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
                    
                    <?php
                      if(isset($_POST["submit"])){
                          $str = array($_POST["id"],anti_injection($_POST["name"]),anti_injection($_POST["start"]),anti_injection($_POST["end"]),anti_injection($_POST["assigned"]),anti_injection($_POST["cost"]),anti_injection($_POST["client"]),anti_injection($_POST["remaks"]));
                          $data= implode("*",$str);
                          $hasil=editProject($data);
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

