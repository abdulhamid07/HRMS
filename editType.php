 <?php
  include "config/crudKategori.php";
$id=$_GET["id"];
$sql="select * from employeetype where EmployeeTypeID='".$id."' limit 1";
$data=bacaKategori($sql);
?>

    <section class="content-header">
      <h1>
        Category
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
      </ol>
    </section>

    <!-- Main content -->
                <section class="content">
					<div class="box box-primary">
                        <div class="box-header">
                                </div><!-- /.box-header -->
								
                                <div class="box-body table-responsive">
									<div class="row">
                    <form action="media.php?module=typeedit&id=<?php echo $data[0]['id'] ?>" method="post">
										<div class="col-md-12">
                      <div class="form-group">
                        <label>Category ID</label>
                        <input type="text" name="id" class="form-control" maxlength="5" readonly value="<?php echo $data[0]['id'] ?>"/>
                      </div>
											<div class="form-group">
												<label>Category Type</label>
												<input type="text" name="name" class="form-control" placeholder="Category Name" value="<?php echo $data[0]['nama'] ?>">
											</div>

										</div>				
									</div>
										
                                </div><!-- /.box-body -->
								<div class="box-footer">
										<a href="media.php?module=employeedata" class="btn btn-warning">Back</a>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
										<input type="reset" class="btn btn-default" value="Reset"/>
                                </div>
                                </form>
                    
                    <?php
                      if(isset($_POST["submit"])){
                          $str = array(anti_injection($_POST["id"]),anti_injection($_POST["name"]));
                          $data= implode("*",$str);
                          $hasil=editKategori($data);
                          if($hasil){
                            exit("<script>alert('Data berhasil diedit'); window.location='media.php?module=employeedata';</script>");
                          }else{
                            echo("<script>alert('Data gagal diedit');</script>");

                          }
                      }
                    ?>
                    </div><!-- /.box -->
                    <!-- /.row -->


                </section><!-- /.content -->
