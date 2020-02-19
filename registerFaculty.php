<?php 
$title = "ProSys";
$subtitle = "Register Faculty";
session_start();
include('db/db_connect.php');
if(!isset($_SESSION['user_id'])){
  header("location: login.php");
  }

 ?>
<head>
  <?php include('include/head.php'); ?>
  <style type="text/css">
  	.ui-dialog-titlebar-close {visibility: hidden; }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include('include/navbar.php'); ?>
    <!-- .Navbar -->

    <!-- Main Sidebar Container -->
    <?php include('include/sidebar.php'); ?>
    <!-- .Main Sidebar Container -->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <?php include ('include/contentheader.php'); ?>
      <!-- .Content Header (Page header) -->
      <section class="content">
    <div class="container-fluid">
      <div class="row">

         <!--  Main Register Form -->
         <div class="col-md-12">
      <div style="margin-bottom:5px; margin-right:10px; ">
        <button type="button" name="add" id="add" class="btn btn-success btn-sm float-right mb-3">Add</button>
      </div>
      </div>
      <br />
      <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register Faculty</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      <form method="post" id="user_form">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="user_data">
            <tr>
              <th>No of Faculty</th>
              <th>Full Name</th>
              <th>Faculty Registration ID</th>
              <th>Details</th>
              <th>Remove</th>
            </tr>
          </table>
        </div>
        <div align="center" class="card-footer">
          <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Register" />
        </div>
      </form>

      <br />
    </div>
    
            <!-- /.card -->
          </div>

    </div>
    <div id="user_dialog" title="Add Data" >
      <div class="form-group">
        <label>Enter Faculty Full Name</label>
        <input type="text" name="full_name" id="full_name" class="form-control" />
        <span id="error_full_name" class="text-danger"></span>
      </div>
      <div class="form-group">
        <label>Enter Faculty Registration ID</label>
        <input type="text" name="reg_id" id="reg_id" class="form-control" />
        <span id="error_reg_id" class="text-danger"></span>
      </div>
       
      <div class="form-group">
        <input type="hidden" name="row_id" id="hidden_row_id" />
        <button type="button" name="save" id="save" class="btn btn-info float-right">Save</button>
        <input type="hidden" name="close" id="hidden_close" />
        <button type="button" name="close" id="close" class="btn btn-danger float-left">close</button>

      </div>
    </div>
    <div id="action_alert1" title="Action" align="center">
    	<p >Data added successfully. </p>
    	<button type="button" name="close1" id="close1" class="btn btn-danger">Close</button>
  	</div>
    <div id="action_alert2" title="Action" align="center">
    	<p >Please Add at least one data.</p>
    	<button type="button" name="close2" id="close2" class="btn btn-danger">Close</button>
  	</div>

</div>
   <!-- ./ Main Register Form -->

    </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>

    </div>
    <!-- .Content Wrapper. Contains page content -->

    <footer class="main-footer">
    </footer>
    <?php include('include/footer.php'); ?>
  </div>

  <!-- jQuery -->
  <?php include('include/jsFile.php'); ?>
  <!-- .jQuery -->

<script>  
$(document).ready(function(){ 
  
  var count = 0;

  $('#user_dialog').dialog({
    autoOpen:false,
    width:400,
    resizable: false,
    position: { at: "right bottom"}

  });
  $('#action_alert1').dialog({
    autoOpen:false,
    width:400,
    resizable: false,
    position: { at: "center"}

  });
  $('#action_alert2').dialog({
    autoOpen:false,
    width:400,
    resizable: false,
    position: { at: "center"}

  });

  $('#add').click(function(){
    $('#user_dialog').dialog('option', 'title', 'Add Student Data');
    $('#full_name').val('');
    $('#reg_id').val('');
    $('#error_full_name').text('');
    $('#error_reg_id').text('');
    $('#full_name').css('border-color', '');
    $('#reg_id').css('border-color', '');
    $('#save').text('Save');
    $('#user_dialog').dialog('open');
  });
  $('#close').click(function(){
  	$('#user_dialog').dialog('close');
  });
  $('#close1').click(function(){
  	$('#action_alert1').dialog('close');
  });
  $('#close2').click(function(){
  	$('#action_alert2').dialog('close');
  });



  $('#save').click(function(){
    var error_full_name = '';
    var error_reg_id = '';
    var full_name = '';
    var reg_id = '';
    if($('#full_name').val() == '')
    {
      error_full_name = 'Full Name is required';
      $('#error_full_name').text(error_full_name);
      $('#full_name').css('border-color', '#cc0000');
      full_name = '';
    }
    else
    {
      error_full_name = '';
      $('#error_full_name').text(error_full_name);
      $('#full_name').css('border-color', '');
      full_name = $('#full_name').val();
    } 
    if($('#reg_id').val() == '')
    {
      error_reg_id = 'Faculty Registration ID is required';
      $('#error_reg_id').text(error_reg_id);
      $('#reg_id').css('border-color', '#cc0000');
      reg_id = '';
    }
    else
    {
      error_reg_id = '';
      $('#error_reg_id').text(error_reg_id);
      $('#reg_id').css('border-color', '');
      reg_id = $('#reg_id').val();
    }
    if(error_full_name != '' || error_reg_id != '')
    {
      return false;
    }
    else
    {
      if($('#save').text() == 'Save')
      {
        count = count + 1;
        output = '<tr id="row_'+count+'">';
        output += '<td>'+count+'</td>';
        output += '<td>'+full_name+' <input type="hidden" name="hidden_full_name[]" id="full_name'+count+'" class="full_name" value="'+full_name+'" /></td>';
        output += '<td>'+reg_id+' <input type="hidden" name="hidden_reg_id[]" id="reg_id'+count+'" value="'+reg_id+'" /></td>';
        output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
        output += '</tr>';
        $('#user_data').append(output);
      }
      else
      {
        var row_id = $('#hidden_row_id').val();

        output = '<td>'+count+'</td>';
        output += '<td>'+full_name+' <input type="hidden" name="hidden_full_name[]" id="full_name'+row_id+'" class="full_name" value="'+full_name+'" /></td>';
        output += '<td>'+reg_id+' <input type="hidden" name="hidden_reg_id[]" id="reg_id'+row_id+'" value="'+reg_id+'" /></td>';
        output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
        $('#row_'+row_id+'').html(output);
      }

      $('#user_dialog').dialog('close');
    }
  });

  $(document).on('click', '.view_details', function(){
    var row_id = $(this).attr("id");
    var full_name = $('#full_name'+row_id+'').val();
    var reg_id = $('#reg_id'+row_id+'').val();
    $('#full_name').val(full_name);
    $('#reg_id').val(reg_id);
    $('#save').text('Edit');
    $('#hidden_row_id').val(row_id);
    $('#user_dialog').dialog('option', 'title', 'Edit Data');
    $('#user_dialog').dialog('open');
    count = row_id;
  });

  $(document).on('click', '.remove_details', function(){
    var row_id = $(this).attr("id");
    if(confirm("Are you sure you want to remove this row data?"))
    {
      $('#row_'+row_id+'').remove();
      count = count-1;
    }
    else
    {
      return false;
    }
  });

  $('#action_alert').dialog({
    autoOpen:false,
    position:{at: "center"}
  });

  $('#user_form').on('submit', function(event){
    event.preventDefault();
    var count_data = 0;
    $('.full_name').each(function(){
      count_data = count_data + 1;
    });
    if(count_data > 0)
    {
      var form_data = $(this).serialize();
      $.ajax({
        url:"rFaculty.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
          $('#user_data').find("tr:gt(0)").remove();
          $('#action_alert1').dialog('open');
        }
      })
    }
    else
    {
      
      $('#action_alert2').dialog('open');

    }
  });
  
});  
</script>


  </body>
</html>