<?php include'header.php';

include 'Config/DB.php';
$db = new DB();

if($_SESSION['user_role'] != 'admin')
	{
	header('Location: index.php');
	exit(0);	
	} 

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="dist/js/bootstrap3-typeahead.min.js"></script>
<!-- Sweetalert Css -->
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />			
<script>
//for validation
function validation(method)
{

	var category_name = false;
	

	
	if(!$('#category_name').val())
	{
			$('#category_name').parent().addClass('has-error');
			$('#category_name_help').show();
	}			
	else{$('#category_name').parent().removeClass('has-error');$('#category_name_help').hide();category_name=true;}

		
	
	if( category_name) 
	{
			vaction(method);
	} 
	else{alert("There is some problem occured. Please try again.")}
		
}
 //for table data 
 function editEntry(id)
{   
   //$('#adddivOutward').hide();
	//$('#jobentrybox').show();
	$.ajax({
	type: 'POST',
	dataType:'JSON',
	url: 'categoryaction.php',
	data: 'action_type=data&id='+id,
	success:function(data){
	$('#rentry').parent().find('#category_name').val(data.category_name); 
	$('#rentry').parent().find('#id').val(data.id);
	}});
	}
</script>
<script>
function vaction(type,id){
    id = (typeof id == "undefined")?'':id;
    var userData = '';
 
 if (type == 'add') 
 {
    var userData = 	$("#rentry").serialize()+'&action_type='+type;
    $.ajax({
        url: 'categoryaction.php',
        type: 'POST',
        data: userData,
        async: false,
        success: function (data){
			if(data == 'ok'){
			$('#example').DataTable().ajax.reload(null, false);
			resetdata();
			showSuccessMessage();	
        }
	}
});
    }
	else if (type == 'edit'){
        var userData = $("#rentry").serialize()+'&action_type='+type;
		
		$.ajax({
			url: 'categoryaction.php',
			type: 'POST',
			data: userData,
			async: false,
			success: function (data) {
				$('#example').DataTable().ajax.reload(null, false);
				resetdata();
				$(btnUpdate).hide();
				$(btnSave).show();
				showSuccessMessageEdit();
        }
    });
     }
	else if (type == 'delete'){
		userData ='action_type=delete&id='+id; 
		$.ajax({	
			url: 'categoryaction.php',
			type: 'POST',
			data: userData,
			async: false,
			success: function (data) {
				$('#example').DataTable().ajax.reload(null, false);		
		},
    });	
    }
    }
function resetdata(){
	$('#rentry')[0].reset();
	$('.help-block').hide();
	$('.has-error').removeClass('has-error');
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include'navbar.php'?>
<?php include'sidebar.php'?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    <i class="fa fa-cart-plus" aria-hidden="true"></i> Category    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master</li>
        <li class="active">Category</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-body">
         <form role="form" action= "#" method="post" id="rentry">
		<div class="box-body">
			<div class="row">
		
	
			<div class="col-md-6 col-lg-6 col-xs-12">
				<div class="form-group">
				<label>Category Name</label>
                  <input type="text" class="form-control input-md" placeholder="Enter Category Name" name="category_name" id="category_name" tabindex="0"/>
				  <span class="help-block" id="category_name_help" style="display:none;">Please Enter Category Name.</span>
               </div>
		   </div> 
		   
		   </div>
		   
			
			<input type="hidden"  name="id" id="id">
			
		<div class="row clearfix js-sweetalert"></div>
			<div class="box-footer">
				<button type="button" style="border-radius: 0px;" id="btnSave" class="btn btn-primary btn-md" style="margin-right:20px;" onclick="validation('add');" tabindex="0"> <i class="fa fa-fw fa-save"></i> Save</button>
				
				<button type="button" id="btnUpdate" class="btn btn-warning btn-md" style="display:none;border-radius:0px;"  onclick="validation('edit');" tabindex="0"><i class="fa fa-edit" ></i>  Update</button>
				
				<button type="button" class="btn btn-danger btn-md" style="margin-left:20px;border-radius:0px;"  onclick="resetdata();$('#btnSave').show();$('#btnUpdate').hide();" > <i class="fa fa-fw fa-repeat"></i> Reset</button>
					
              </div> 
			  </div>
            </form>
        </div>  
		</div>
        <!-- /.box-body -->
		
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-fw fa-table"></i> Category List </h3>
            </div>
            <div class="box-body">
		  <table id="example" class="table table-bordered table-striped nowrap" width="100%">
			<thead>
			<tr>	
				<th>&nbps;</th>
				<th>SR NO</th>
				<th>Category Name</th>
				<th>Action</th>	  
			</tr>
			</thead>
			</table>
          </div>
          </div>
    </section>
  </div>
  
<?php include'footer.php'?>
<!-- SweetAlert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>
<script>

//ADD FOCUS ON SIDEBAR
	$("#sidebar_ul").find(".active").removeClass("active");
	$("#sidebar_categorymaster").addClass("active").focus();
 //Initialize Select2 Elements
 $(function () { 
    $('.select2').select2()
}
) 
//table
$( document ).ready(function() {
var otable = $('#example').DataTable( {
"ajax": "categorydata.php",
"bPaginate":true,
"bProcessing": true,
"scrollX": true,
"dataSrc":"data",
 "columns": [
{ mData: 'id' },
{ mData: 'count' },
{ mData: 'category_name' },
{ mData: 'action' }
],
"columnDefs": [

{ targets: [0],
        "mData": "id",
		"sClass": "center",
		"width": "10%",
		"visible":false
 },
	{ targets: [1],
        "mData": "count",
		"sClass": "center",
		"width": "10%"
 },
  {targets: [3],
        "mData": "action",
        "sClass": "center",
        "width": "3%",
        "mRender": function (data, type, row) {
		return '<span style="text-align:center"><button type="button" class="btn bg-aqua btn-md" style="border-radius: 0px;" onclick="editEntry('+row.id+');$(\'#btnSave\').hide();$(\'#btnUpdate\').show();"><i class="fa fa-edit" ></i></button>' +
		'<button type="button" style="border-radius: 0px;" class="btn bg-red btn-md" onclick="showConfirmMessage('+row.id+');"><i class="fa fa-trash" ></i></button></span>' 
        }
    },
]		

}).column( '0:visible' ).order( 'desc' ).draw();
});
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>

function showSuccessMessage() {
    swal({
        title: "OK!",
        text: "Category data has been added successfully!",
        type: "success",

        closeOnConfirm: false
    });
}

function showSuccessMessageEdit() {
    swal({
        title: "OK!",
        text: "Category data has been Updated successfully!",
        type: "success",

        closeOnConfirm: false
    });
}

function showConfirmMessage(id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
		
        swal("Deleted!", "Your Category data has been deleted.", "success");
		vaction('delete',id);
    });
}
</script>
</body>
</html>