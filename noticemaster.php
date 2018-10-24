<?php include'header.php';
include 'Config/DB.php';
$db = new DB();
if($_SESSION['user_role'] != 'subadmin')
	{
	header('Location: index.php');
	exit(0);	
	} 
	
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="dist/js/bootstrap3-typeahead.min.js"></script>
<!-- Sweetalert Css -->
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />	
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">		
<script>
function validation(method)
{
	var Title = false;
	var category = false

		
	if(!$('#Title').val())
	{
		
			$('#Title').parent().addClass('has-error');
			$('#Title_name_help').show();
	}			
	else{$('#Title').parent().removeClass('has-error');$('#Title_name_help').hide();Title=true;}
	
	if(!$('#category').val())
	{
			$('#category').parent().addClass('has-error');
			$('#category_name_help').show();
	}			
	else{$('#category').parent().removeClass('has-error');$('#category_name_help').hide();category=true;}
		
	
	
					
	if(Title && category  )
			{
				vaction(method);
			}
	else{alert("There is some problem occured. Please try again.")}

		
}
 //for table data 
 $(document).ajaxStart(function() { Pace.restart(); })
 function editEntry(id)
{   

   //$('#adddivOutward').hide();
	//$('#jobentrybox').show();
	$.ajax({
	type: 'POST',
	dataType:'JSON',
	
	url: 'noticeaction.php',
	data: 'action_type=data&id='+id,
	success:function(data){
		
	$('#rentry').parent().find('#Title').val(data.Title); 
	$('#rentry').parent().find('#category').val(data.category); 
	
	$('#rentry').find('#end_date').val(toChangeDateFormat(data.end_date));
	$('#rentry').parent().find('#id').val(data.id);
	$('#rentry').parent().find('#docname').val(data.docname); 
	$('#rentry').parent().find('#content').val(data.content); 
	$('#rentry').parent().find('#docpath').val(data.docpath); 
	

					$('#rentry').parent().find('#id').val(data.id);
					
					if(data.image==""){
						$('#rentry').parent().find('#blah').attr("src","images/image_upload.jpg");
					}else{
						$('#rentry').parent().find('#blah').attr("src",data.image);
						
					}
	
	}
	
	});
}

function toChangeDateFormat(dateStr)
{
	var parts = dateStr.split("-");
	var dt = parts[2]+"/"+parts[1]+"/"+parts[0];
	return dt;
} 

</script>
<script>



function vaction(type,id){
    id = (typeof id == "undefined")?'':id;
    var userData = '';
	

	
 if (type == 'add') 
 {
    id = (typeof id == "undefined")?'':id;
			var statusArr = {add:"added",edit:"updated",delete:"deleted"};
			var userData = '';
			if (type == 'add') 
			{
				
				var userData = new FormData($("#rentry")[0]);
				userData.append('action_type', 'add');
				$.ajax({
					url: 'noticeaction.php',
					type: 'POST',
					data: userData,
					async: false,
					success: function (data) {
						if(data == 'ok'){
						
						$('#example').DataTable().ajax.reload(null, false);
						$('#example1').DataTable().ajax.reload(null, false);
						resetdata();
						showSuccessMessage();
						window.location.href=window.location.href;
						}
					},
					cache: false,
					contentType: false,
					processData: false
				});
				
				return false;
				
			}
    }
		else if (type == 'edit'){
				var userData = new FormData($("#rentry")[0]);
				userData.append('action_type', 'edit');
				
				$.ajax({
					url: 'noticeaction.php',
					type: 'POST',
					data: userData,
					async: false,
					success: function (data) {
						alert(data);
						$('#example').DataTable().ajax.reload(null, false);
						
					},
					cache: false,
					contentType: false,
					processData: false
				});
			}
			
			 else if (type == 'view'){
				var userData = 'action_type=view&id='+id;
				
				$.ajax({
					url: 'noticeaction.php',
					type: 'POST',
					data: userData,
					async: false,
					success: function (data) {
						$('#doc_list').html(data);
					}
				});
			}
			 
			else if (type == 'delete'){
				
				userData ='action_type=delete&id='+id; 
				$.ajax({	
					url: 'noticeaction.php',
					type: 'POST',
					data: userData,
					async: false,
					success: function (data) {
						if(data == 'ok'){
							vaction('delete',id);
							$('#example').DataTable().ajax.reload(null, false);
						}
					},
					
				});
				
			}
	
    }
	
function resetdata(){
	$('#rentry')[0].reset();
}
function $getNameNo(dname,id){
			$('#id').text(id);
			$('#docname').text(dname);	
			
		}			
		function resetdata(){
			
			$('#rentry')[0].reset();
			
		}
		//GET ID OF CHECK 
		function sub(id){
			$(id).show();
		}
		
		
</script>
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
<!-- DataTables -->

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include'navbar.php'?>
<?php include'sidebar.php'?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    <i class="fa fa-sticky-note" aria-hidden="true"></i> Create Notice
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master</li>
        <li class="active"> Create Notice</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-body">
         <form role="form" action= "#" method="post" id="rentry">
		<div class="box-body">
		
		
		
			<div class="row" >
	
		
			<div class="col-md-6 col-lg-6 col-xs-12">
					<div class="form-group">
						 <label>Category</label>
						 <select class="typeahead form-control input-md" name="category" id="category" tabindex="0">
							<option value="">Select Category</option>
								<?php 
									$category = $db->selectQuery('select id,category_name from category');
							
									foreach($category as $cat){
										echo '<option value="'.$cat['category_name'].'">'.$cat['category_name'].'</option>';
									}
								?>
						 </select>		
						  <span class="help-block" id="category_name_help" style="display:none;">Please Select Category</span>
					</div>
			</div>	  
			
				<div class="col-md-6 col-lg-6 col-xs-12" >
				<div class="form-group">
                <label>End Date(*)</label>
					<div class="input-group dated">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" style="" class="form-control input-md pull-right"  name="end_date" id="end_date">
                </div>
			   <span class="help-block" id="end_date_help" style="display:none;color:#dd4b39;">Please Enter End Date.</span>
              </div>
            </div>
			
			
			</div>
			
			
			<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12">
			<div class="form-group">
                 <label>Title</label>
                  <input type="text" class="typeahead form-control input-md" placeholder="Enter Title" name="Title" id="Title" tabindex="0">
				  <span class="help-block" id="Title_name_help" style="display:none;">Please Enter Title .</span>		
			</div>
			</div>
			
			</div>
			
			<div class="row">	
			
						
	<script type="text/javascript">
	$('#material_name.typeahead').typeahead({
	    source:  function (query, process) {
        return $.get('autosuggest/material_name.php', { query: query, type: 'material_name' }, function (data) {
        		console.log(data);
        		data = $.parseJSON(data);
	            return process(data);
	        });
	    }
	});
    </script>		
      
		
						
		<div class="box-header with-border">
		<h3 class="box-title"><i class="fa   fa-file-text-o text"></i> Add Document </h3>
		</div>

					
				<!-- Form Start-->
				<form role="form" enctype="multipart/form-data" method="post" id="rentry">
					
					<div class="box-body">
						
						<input TYPE="hidden" name="MAX_FILE_SIZE" VALUE="10048576">
						
				
						<div class="col-xs-12 col-md-12 col-lg-4">
							<div class="form-group">
							
								<div class="main">
									<div id="holder"> 
								
										<label >Document name(*) </label>
										<input type="text" class="form-control" placeholder="Enter Document Name..." name="docname" id="docname">
										<!--<span id="" style="color:green;visibility:hidden"><i class="fa fa-check"></i></span>
										   <p class="help-block">Max size 200kb</p> -->
									
																		
									</div>
									</div >
							</div>
						</div>
						
						
						
							<div class="col-xs-12 col-md-12 col-lg-2">	
								<div class="form-group" id="xyz">
								<div id="docs_upload" style="padding-bottom:15px">
									<label style="display:block">Upload Document(*) </label>
									<span id="facheck" style="color:green;display: none;margin-right:10px"><i class="fa fa-check"></i> Selected</span>
									<div class="btn btn-info btn-file" id="btnUp" >
										<i class="fa fa-image"></i> Upload Document
										<input type="file" name="doctype" id="doctype"  tabindex="0" onchange="sub('#facheck')">
										
									</div>
									
								</div>
								</div>
							</div>
										
							<input type="hidden"  name="id" id="id">	
					</div>
					
					
											
											
										</form>
										
										
										
						</div>
			
			
			<div class="row" >	
			<div class="col-md-12">
			<div class="form-group">
                <label for="contents">Notice Content(*)</label>
                <textarea  name="content" id = "content"   class="form-control" 
                       placeholder="Enter your content here"></textarea>
			</div>
			</div>
			</div>
			
			
			
			
		<div class="row clearfix js-sweetalert"></div>
			<div class="box-footer">
				<button type="button" style="border-radius: 0px;" id="btnSave" class="btn btn-primary btn-md" style="margin-right:20px;" onclick="validation('add');" tabindex="0"> <i class="fa fa-fw fa-save"></i> Save</button>
				
				<button type="button" id="btnUpdate" class="btn btn-warning btn-md" style="display:none;border-radius:0px;"  onclick="validation('edit');" tabindex="0"><i class="fa fa-edit" ></i>  Update</button>
				
				<button type="button" class="btn btn-danger" style="; margin-left:20px;"  onclick="resetdata();window.location.href=window.location.href"> <i class="fa fa-fw fa-repeat"></i>  Reset</button>
				
                
				
              </div> 
	
			  </div>
            </form>
        </div>  
		
				<!-- /.box -->
				
				<!-- /.col -->
				
				
				
				
				        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-fw fa-table"></i> Notice Board List</h3>
            </div>
            <div class="box-body">
		  <table id="example" class="table table-bordered table-striped" width="100%">
			<thead>
			<tr>
									<th>SR NO</th>
									<th>Notice Creator</th>
									<th>Category</th>
									<th>Title</th>
	
									<th>End Date</th>
									<th>Content</th>
									<th>Document Name</th>
									<th>Upload Date</th>
									
									<th>Action</th>
			</tr>
			</thead>
			</table>
          </div>
          </div>
    </section>
  </div>
		
			
	
	
		
<!-- D O C U M E N T   L I S T   M O D A L -->
				<div class="modal" id="document_modal">
					<div class="modal-dialog" style="width:842px">
						<div class="modal-content">
							<div class="modal-header" style="background-color:#dd4b39">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" style="color:#fff">D O C U M E N T &nbsp;&nbsp; L I S T</h4>
							</div>
							<div class="modal-body" id="invoice_body" style="background-color:#ffffff">
								
								<!-- MODAL DATA -->
								
								
								<!-- Content Header (Page header) -->
								
								
								<!-- Main content -->
								<section class="invoice" id="section-to-print">
									
										<!-- /.row -->
										<!--C O U R I E R D E T A I L S-->
										
										<div class="row">
											<div class="col-xs-12 col-md-12">
												<p class="lead">Document List</p>
												
												<div class="table-responsive">
													<table class="table" id="doc_list">
													
													</table>
												</div>
											</div>
										</div>
										
									</section>
									<!-- /.content -->
									<div class="clearfix"></div>
									
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-flat btn-warning pull-right" onlick="resetdata();" id="close_modal_btn" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					
<!-- D O C U M E N T   L I S T   M O D A L -->
	
	
	
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="bower_components/fastclick/lib/fastclick.js"></script>
	
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
	<SCRIPT  src="dist/js/jquery.js"></SCRIPT>
	<SCRIPT  src="dist/js/script.js"></SCRIPT>
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	
	<script>
		
			
	</script>
	<?php include'footer.php'?>
	
	 <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	
	<script>
		
	 $(document).ready(function() {
		$('#content').summernote();
	}); 
		$( document ).ready(function() {
	//Date picker	
	$("#sidebar_ul").find(".active").removeClass("active");
	$("#sidebar_noticemaster").addClass("active").focus();
			//SECOND TABLE
			var otable = $('#example').DataTable( {
				"ajax": "noticedata.php",
				"bPaginate":true,
				"bProcessing": true,
				
				"dataSrc":"data",
				"columns": [
				{ mData: 'id'},
				{ mData: 'notice_creator'},
				{ mData: 'category'},
				{ mData: 'Title'},
				{ mData: 'end_date'},
				{ mData: 'content'},
				{ mData: 'docname' },
				{ mData: 'upload_date' },
				{ mData: 'action' }
				],
				"columnDefs": [
					
				
				{targets: [8],
					"mData": "action",
        "sClass": "center",
        "width": "10%",
        "mRender": function (data, type, row) {
						return '<span style="text-align:center"><button type="button"  class="btn bg-aqua btn-md" style="border-radius: 0px;" onclick="editEntry('+row.id+');$(\'#btnSave\').hide();$(\'#btnUpdate\').show();"><i class="fa fa-edit" ></i></button>' +
		'<button type="button" style="border-radius: 0px;" class="btn bg-red btn-md" onclick="showConfirmMessage('+row.id+');"><i class="fa fa-trash" ></i></button></span>'+
						 '<button type="button"  id="status_color" style="width:85%;padding:5%;" class="btn bg-blue btn-flat btn-sm" data-toggle="modal" data-target="#document_modal" onclick="vaction(\'view\','+row.id+');$getNameNo(\''+row.id+'\',\''+row.docname+'\',\''+row.upload_date+'\');Pace.restart();">&nbsp; Documents</button>' 
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
        text: "Notice Data has been added successfully!",
        type: "success",

        closeOnConfirm: false
    });
}

function showSuccessMessageEdit() {
    swal({
        title: "OK!",
        text: "Notice Data has been Updated successfully!",
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
		
        swal("Deleted!", "Notice Data has been deleted.", "success");
		vaction('delete',id);
    });
}

	

	
	 $('#end_date').datepicker({
      autoclose: true
    })
	
	
	
</script>
	

</body>
</html>
