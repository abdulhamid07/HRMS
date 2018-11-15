<?php
include "config/crudClient.php";
  $sql="select * from clientdetails";
  $ex=bacaClient($sql);
?>
    <section class="content-header">
      <h1>
        Project
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project</li>
      </ol>
    </section>

    <!-- Main content -->
                <section class="content">
					<div class="box box-primary">
                        <div class="box-header">
                                </div><!-- /.box-header -->
								
                                <div class="box-body table-responsive">
									<div class="row">
                    <form action="media.php?module=projectadd" method="post">
										<div class="col-md-12">
                      <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Project Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Project Start Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                             <input placeholder="Start Date" type="text" class="form-control datepicker" name="start">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Project End Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                             <input placeholder="End Date" type="text" class="form-control datepicker" name="end">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Project Assigned Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                          </div>
                             <input placeholder="Assigned Date" type="text" class="form-control datepicker" name="assigned">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Project Cost</label>
                        <input type="text" name="cost" class="form-control" placeholder="Cost">
                      </div>
                      <div class="form-group">
                        <label>Client Name</label>
                        <select name="client" class="form-control">
                            <option value="">-- Pilih Client --</option>
                             <?php foreach ($ex as $p) { ?>
                            <option value="<?php echo $p['id'] ?>"><?php echo $p["nama"] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Remaks</label>
                        <input type="text" class="form-control" name="remaks" placeholder="Remaks">
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
                        include "config/crudProject.php";
                          $str = array(anti_injection($_POST["name"]),anti_injection($_POST["start"]),anti_injection($_POST["end"]),anti_injection($_POST["assigned"]),anti_injection($_POST["cost"]),anti_injection($_POST["client"]),anti_injection($_POST["remaks"]));
                          $data= implode("*",$str);
                          $hasil=tambahProject($data);
                          if($hasil){
                            exit("<script>alert('Data berhasil disimpan');</script>");
                          }else{
                            exit("<script>alert('Data gagal disimpan');</script>");
                          }
                      }
                    ?>
                    </div><!-- /.box -->
                    <!-- /.row -->


                </section><!-- /.content -->

