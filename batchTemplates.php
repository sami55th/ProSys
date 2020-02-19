<?php 
$title = "ProSys";
$subtitle = "Batch Templates";
session_start();
include ('db/db_connect.php');
if(!isset($_SESSION['user_id'])){
  header("location: login.php");
  }
 ?>
<head>
  <?php include('include/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('include/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include ('include/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include ('include/contentheader.php'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Batch Templates</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form role="form" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">              
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <div class="card-tools">
                  <div class="input-group">
                    <form id="selectBatch" method="get" name="selectGroup" data-toggle = 'Validator'>
                      <div class="input-group input-group-sm" style="width: 250px">
                        <select name="batchId" id="batchId" class="form-control"
                        required="">
                          <option><?php echo 'options'; ?></option>
                        </select>
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="col-md-8">Template Name</th>
                      <th >Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td><form name="deleteTemplate" method="post" action="null" onsubmit="return confirm('Are you sure you want to delete this template?');" data-toggle="Validator">
                        <input type="hidden" name="facultyId" value="">
                        <button type="submit" name="btnDeleteTemplate" class="btn btn-danger btn-block btn-sm" >
                          <i class="fa fa-trash" aria-hidden="true">
                        </i>
                          Delete
                        </button>
                      </form></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" name="addNewTemplate" class="btn btn-primary float-right">
                          <i class="fa fa-plus"></i>
                        Add New Template</button>
                      </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
                  </div>
                </form>
            </div>
            <!-- /.card -->
            </div>

          <!--/.col (left) -->

          <!-- right column -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Add Template
                                </h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  no-padding">
                                <form id="uploadTemplates" name="uploadTemplates" action="" method="post" enctype="multipart/form-data" data-toggle="validator">

                                    <input type="hidden" name="batchId" value="<?php echo $batchId;?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Template Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="templateName" id="templateName" placeholder="Enter Template name." >
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-sm-12">
                                            <input type="file"  name="templateFile" accept=".doc ,.docx, .pdf, .rar, .zip, .jpg, .jpeg, .ppt, .pptx " required>
                                            <br/>
                                            <!-- <p class="text-muted">File size limit :10 MiB</p>
                                            <span class="text-muted">Allowed File types : docx | pdf | zip | rar | jpeg | pptx   </span> -->
                                        </div>
                                    </div>

                                </form>
                                <div class="card-footer">

                                    <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-default  float-left">Back</a>
                                    <button type="submit" name="btnUploadTemplate" id="btnUploadTemplate" form="uploadTemplates" class="btn btn-primary  float-right"><i class="fa fa-upload" ></i>Upload</button>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
          </div>

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include ('include/jsFile.php'); ?>
<!-- .jQuery -->

</body>
</html>