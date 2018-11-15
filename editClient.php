 <?php
  include "config/crudClient.php";
$id=$_GET["id"];
$sql="select * from clientdetails where ClientID='".$id."'";
$data=bacaClient($sql);
?>

    <section class="content-header">
      <h1>
        Client
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Client</li>
      </ol>
    </section>

    <!-- Main content -->
                <section class="content">
					<div class="box box-primary">
                        <div class="box-header">
                                </div><!-- /.box-header -->
								
                                <div class="box-body table-responsive">
									<div class="row">
                    <form action="media.php?module=clientedit&id=<?php echo $data[0]['id'] ?>" method="post">
										<div class="col-md-12">
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Client Name" value="<?php echo $data[0]['nama'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" placeholder="Company Name" value="<?php echo $data[0]['perusahaan'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $data[0]['alamat'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?php echo $data[0]['noHp'] ?>">
                      </div>
                    </div>    		
									</div>
										
                                </div><!-- /.box-body -->
								<div class="box-footer">
										<a href="media.php?module=clientdata" class="btn btn-warning">Back</a>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
										<input type="reset" class="btn btn-default" value="Reset"/>
                                </div>
                                </form>
                    
                    <?php
                      if(isset($_POST["submit"])){
                          $str = array($_GET["id"],anti_injection($_POST["name"]),anti_injection($_POST["company"]),anti_injection($_POST["address"]),anti_injection($_POST["contact"]));
                          $data= implode("*",$str);
                          $hasil=editClient($data);
                          if($hasil){
                            exit("<script>alert('Data berhasil diedit'); window.location='media.php?module=clientdata';</script>");
                          }else{
                            echo("<script>alert('Data gagal diedit');</script>");

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
