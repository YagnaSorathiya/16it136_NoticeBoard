<?php include 'header.php';
 if($_SESSION['user_role'] != 'admin')
	{
	header('Location: index.php');
	exit(0);	
	} 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="dist/js/bootstrap3-typeahead.min.js"></script>


<script>
function validateEmail(sEmail) {
var filter =/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(sEmail)) {return true;}
	else {return false;}
}

function randomPass(){
		$.ajax({
		type: 'POST',
		url: 'subadminaction.php',
		data: 'action_type=getPass',
		async: false,
		success:function(pass)
		{
			$("#password").val(pass);
		}
		});
}
	
function validation(method)
{	   


	var username = false;
	var password = false;
	var email = false;
	var contact_no = false;
	var address = false;
	var city = false;
	var status = false;
	
	
	
	if($('#username').val() == '')
	{
			 $('#username').parent().addClass('has-error');
			 $('#username_help').show();
	}
	
	if($('#username').val()){
		if(method == 'edit'){
			$.ajax({
			type: 'POST',
			url: 'subadminaction.php',
			data: 'action_type=validateusernameEdit&username='+$('#username').val()+'&uid='+$('#uid').val(),
			async: false,
			success:function(msg)
			{
			if(msg == "err")
			{
			alert("This Name is already registered on our database.");
			}
			else if(msg == "ok"){
				$('#username').parent().removeClass('has-error');$('#username_help').hide();
				username=true;
				}
			}
			});
			}
		
	else{
	
		
		$.ajax({
		type: 'POST',
		url: 'subadminaction.php',
		data: 'action_type=validateusername&username='+$('#username').val(),
		async: false,
		success:function(msg)
		{
		if(msg == "err")
		{
		alert("This Name is already registered on our database.");
		}
		else if(msg == "ok"){
			$('#username').parent().removeClass('has-error');$('#username_help').hide();
			username=true;
			}

		}
		});
	}
	}
	
	if(!$('#email').val())
	{
			 $('#email').parent().addClass('has-error');
			 $('#email_help').show();
	}	
	
	if($('#email').val())
	{
		if(validateEmail($('#email').val()))
	{
		if(method == 'edit'){
			$customer = $('#email').val();	
		
			$.ajax({
			type: 'POST',
			url: 'subadminaction.php',
			data: 'action_type=validateemailEdit&email='+$customer+'&uid='+$('#uid').val(),
			async: false,
			success:function(msg)
			{
			if(msg == "err")
			{
			alert("This email is already registered, please enter another email address.");
			}
			else if(msg == "ok"){
				$('#email').parent().removeClass('has-error');$('#email_help').hide();
				email=true;
				}
			}
			});
			
			
		}
		else{
		$customer = $('#email').val();	
	
		$.ajax({
		type: 'POST',
		url: 'subadminaction.php',
		data: 'action_type=validateemail&email='+$customer,
		async: false,
		success:function(msg)
		{
		if(msg == "err")
		{
		alert("This email is already registered, please enter another email address.");
		}
		else if(msg == "ok"){
			email=true;
			}
			
		}
		});
	}
	}
	else{
				alert("Please enter valid email address.");
	}
	}

	if(!$('#password').val())
	{
			$('#password').parent().addClass('has-error');
			$('#password_help').show();
	}			
	else{$('#password').parent().removeClass('has-error');$('#password_help').hide();password=true;}
	
	if(!$('#contact_no').val())
	{
		$('#contact_no').parent().addClass('has-error');
		$('#contact_no_help').show();
	}
	else{$('#contact_no').parent().removeClass('has-error');$('#contact_no_help').hide();contact_no=true;}

	if(!$('#city').val())
	{
			$('#city').parent().addClass('has-error');
			$('#city_help').show();
	}
	else{$('#city').parent().removeClass('has-error');$('#city_help').hide();city=true;}
	
	if(!$('#address').val())
	{
			$('#address').parent().addClass('has-error');
			$('#address_help').show();
	}
	else{$('#address').parent().removeClass('has-error');$('#address_help').hide();address=true;}
	
	if(!$('#status').val())
	{
			$('#status').parent().addClass('has-error');
			$('#status_help').show();
	}
	else{$('#status').parent().removeClass('has-error');$('#status_help').hide();status=true;}

	
	if(username && email && contact_no && city && address  && status ) 
	{
			vaction(method);
	} 
	else{alert("There is some problem occured. Please try again.")}
		
}



 //for table data 
 function editEntry(id)
{   
	$.ajax({
	type: 'POST',
	dataType:'JSON',
	url: 'subadminaction.php',
	data: 'action_type=data&uid='+id,
	success:function(data){
	$('#pro_entry').parent().find('#uid').val(data.uid);	
	$('#pro_entry').parent().find('#username').val(data.username);	
	$('#pro_entry').parent().find('#password').val(data.password);
	$('#pro_entry').parent().find('#email').val(data.email);			
	$('#pro_entry').parent().find('#contact_no').val(data.contact_no);		
	$('#pro_entry').parent().find('#address').val(data.address);
	$('#pro_entry').parent().find('#city').val(data.city);	
	$('#pro_entry').parent().find('#status').val(data.status);

	}
});
	}
//for rack master
</script>
<script>
function vaction(type,id){
    id = (typeof id == "undefined")?'':id;
    var statusArr = {add:"added",edit:"updated",delete:"deleted"};
    var userData = '';
 if (type == 'add') 
 {

    var userData = new FormData($("#pro_entry")[0]);
	userData.append('action_type', 'add');
    $.ajax({
        url: 'subadminaction.php',
        type: 'POST',
        data: userData,
        async: false,
        success: function (data) {
			
          alert('Sub Admin  has been added successfully');
			$('#example').DataTable().ajax.reload(null, false);
			
		resetdata();
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
	
    }
	else if (type == 'edit'){
        var userData = new FormData($("#pro_entry")[0]);
		userData.append('action_type', 'edit');
		
		$.ajax({
			url: 'subadminaction.php',
			type: 'POST',
			data: userData,
			async: false,
			success: function (data) {
				alert('Sub Adminhas been Updated successfully');
				$('#example').DataTable().ajax.reload(null, false);
				
				resetdata();
				$(btnUpdate).hide();
				$(btnSave).show();
			
        },
        cache: false,
        contentType: false,
        processData: false
    });
     }
	 
	else if (type == 'delete'){
     
		userData ='action_type=delete&uid='+id; 
		$.ajax({	
			url: 'subadminaction.php',
			type: 'POST',
			data: userData,
			async: false,
			success: function (data) {
				alert('Sub Admin has been deleted successfully');
				$('#example').DataTable().ajax.reload(null, false);
        },
       
    });
				
    }
	
	else{
       
    }
    
    }



</script>

<script>
function resetdata(){
	
	$('#pro_entry')[0].reset();
	$('.help-block').hide();
	$('.has-error').removeClass('has-error');
	
	
}
</script>


  
  <!-- DataTables -->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- navbar -->
 <?php include'navbar.php'?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- sidebar-->
<?php include'sidebar.php'?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 100%;">
    <!--Body Part-->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
       	<div id="jobentrybox" class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user-circle-o"></i> Sub Admin Account</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="post" id="pro_entry">
        <div class="box-body">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="form-group">
						 <label class="margin-left">SubAdmin Name</label>
						 <input type="text"  id="username" class="form-control input-md" tabindex="0" name="username"  placeholder="Enter General User Name..." autocomplete="off">
						  <span class="help-block" id="username_help" style="display:none;">Please Enter SubAdmin Name.</span>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-12">
					<div class="form-group">
					  <label for="exampleInputPassword1">Password</label>
					  <input type="text" class="form-control input-md" id="password"  name="password" placeholder="Enter Password..." maxlength="8">
					   <span class="help-block" id="password_help" style="display:none;">Please Enter Password.</span>
					</div>
				</div>				
		
				<div class="col-md-4 col-sm-12">
					<div class="form-group">
					  <label for="exampleInputEmail1">E-mail</label>
					  <input type="text" class="form-control input-md" id="email"  name="email" placeholder="Enter E-mail..." tabindex="0">
					   <span class="help-block" id="email_help" style="display:none;">Please Enter E-mail.</span>
					</div>
                </div>
			</div>	

			<div class="row">	
				<div class="col-md-4 col-sm-12">							
						<div class="form-group">
								<label>Contact No.</label>
									<div class="input-group">
									<div class="input-group-addon">
									<i class="fa fa-phone"></i>
									</div>
				 <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="contact_no" id="contact_no" placeholder="Enter your Contact No..">
				<span class="help-block" id="contact_no_help" style="display:none;">Please Enter Contact No.</span>
					</div>               
				  </div>							
				</div>
				
				
				
				<div class="col-md-4 col-sm-12">	
					<div class="form-group">
						  <label>City</label>
						  <input type="text"  id="city" class="form-control input-md" tabindex="0" name="city"  placeholder="Enter City..." autocomplete="off">
						<span class="help-block" id="city_help" style="display:none;">Please Enter City.</span>
					</div>	
				</div>
				
				<div class="col-md-4 col-sm-12">	
					<div class="form-group">
						<label>Status</label>
							<select class="form-control input-md" name="status" id="status">
								<option>Active</option>
								<option>Deactive</option>
							</select>
					</div>
				</div>
				
			</div>
			
			<div class="row">	
			
				<div class="col-md-12 col-sm-12">	
					<div class="form-group">
						  <label>Address</label>
						  <textarea class="form-control" rows="4" id="address" name="address" placeholder="Enter Address..." tabindex="0"></textarea>
						  <span class="help-block" id="address_help" style="display:none;">Please Enter Address.</span>
					</div>	
				</div>

			</div>	
				
		    <input type="hidden" id="uid"  name="uid">
			
				
			<!-- MODAL BUTTON 1 -->
		
				 <!-- /.box-body -->
				<div class="box-footer">
              
					<button type="button" id="btnSave" class="btn btn-success" style="; margin-left:20px;" onclick="validation('add');"><i class="fa fa-fw fa-save"></i>  Save</button>
					<button type="button" id="btnUpdate" class="btn btn-info" style="display: none;margin-left:20px;"  onclick="validation('edit');"><i class="fa fa-edit" ></i>  Update</button>
					<button type="button" class="btn btn-danger" style="; margin-left:20px;" onclick="resetdata();$('#btnUpdate').hide();$('#btnSave').show();randomPass();"><i class="fa fa-fw fa-repeat"></i>Reset</button>
					
				</div>
				
				
            </form>

			
		</div>	
     
			 
     
        
          
		
          <!-- /.box -->
       
        <!-- /.col -->
     
      <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa   fa-database"></i> SubAdmin Name Accounts </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
			  
			  <table id="example" class="table table-bordered table-striped">
<thead>
<tr>

					<th>SR NO</th>
					<th>User Name  </th>
					<th>Email</th>
					<th>Contact No</th>
					<th>City</th>
					<th>Address</th>
					<th>Status</th>
					<th>action</th>
				  
</tr>
</thead>

</table>
			  
			  
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
		
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
			</div>
	
	
	 

  
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
  <script  src="dist/js/jquery.js"></script>
   <script  src="dist/js/script.js"></script>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
<!-- ./wrapper -->
<?php include'footer.php'?>

<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>




//table
//ADD FOCUS ON SIDEBAR
	$("#sidebar_ul").find(".active").removeClass("active");
	$("#sidebar_subadminmaster").addClass("active").focus();
$( document ).ready(function() {
	randomPass();
var otable = $('#example').DataTable( {
"ajax": "subadmindata.php",
"bPaginate":true,
"bProcessing": true,

"dataSrc":"data",
 "columns": [
 { mData: 'uid' },
 { mData: 'username' },
{ mData: 'email' } ,
{ mData: 'contact_no' },
{ mData: 'city' },
{ mData: 'address' },
{ mData: 'status' },

{ mData: 'action' }
],
"columnDefs": [
{ targets: [2],
	/* "mRender": function(data,type,row){
		 
	} */
 },
 {targets: [6],
					"mData": "status",
					"sClass": "center",
					"mRender": function (data, type, row) {
						return '<button type="button" class="btn btn-flat btn-primary pull-left bg-green btn-sm" >'+row.status+'</button>'
					}
				},
  {targets: [7],
        "mData": "action",
        "sClass": "center",
        "mRender": function (data, type, row) {
		return '<button type="button" class="btn btn-flat btn-primary pull-left btn-sm" onclick="editEntry('+row.uid+');$(\'#btnUpdate\').show();$(\'#btnSave\').hide();"><i class="fa fa-edit" ></i></button>' +
		'<button type="button" class="btn btn-flat btn-danger pull-left btn-sm" onclick="return confirm(\'Are you sure to delete data?\')?vaction(\'delete\','+row.uid+'):false;"><i class="fa fa-trash" ></i></button>' 
        }
    },
 
 /* { targets: [8],
	//"visible": false,
 } */
]		

}).column( '0:visible' ).order( 'desc' ).draw();
});
/* setInterval( function () {
 $('#example').DataTable().ajax.reload(null, false);
}, 5000 );  */

/* setInterval( function () {
otable.ajax.reload(null, false);
}, 5000 ); */








//Date picker
    $('#PUCDate').datepicker({
      autoclose: true
    })
</script>
<script>
//Date picker
    $('#DOREG').datepicker({
      autoclose: true
    })
	
	$('[data-mask]').inputmask()
</script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
	 $('#example').DataTable()
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
