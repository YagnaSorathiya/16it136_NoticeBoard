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

	var password = false;
	var confirm = false;
	
	if(!$('#password').val())
	{
			$('#password').parent().addClass('has-error');
			$('#password_help').show();
	}			
	else{$('#password').parent().removeClass('has-error');$('#password_help').hide();password=true;}
	
	if(!$('#confirm').val())
	{
		$('#confirm').parent().addClass('has-error');
		$('#confirm_help').show();
	}
	else{$('#confirm').parent().removeClass('has-error');$('#confirm_help').hide();confirm=true;}

	
	
	
	if( password &&  confirm ) 
	{
			vaction(method);
	} 
	else{alert("There is some problem occured. Please try again.")}
		
}
 
function vaction(type){
 var statusArr = {add:"added",edit:"updated",delete:"deleted"};
    var userData = '';
    if (type == 'edit'){
		$pass = $("#password").val();
		$confirm = $("#confirm").val();
        //userData = 'password='+$pass+'&confirm='+$confirm+'&action_type='+type;
        userData = $("#centry").serialize()+'&action_type='+type;
		
		$.ajax({
        type: 'POST',
        url: 'changepassaction.php',
        data: userData,
        success:function(msg){
			
			$('#example').DataTable().ajax.reload(null, false);
			
			
            if(msg == 'ok'){
                showSuccessMessageEdit();
				resetdata();
            }
			else if(msg == 'dontmatch'){
                alert('password doesnt match. please enter again.');
                resetdata();
				}
			else if(msg == 'err'){
                alert(msg);
                resetdata();
				}
			else if(msg == 'same'){
               alert('This password is same as your existing password.');
			   resetdata();
            }
        }
    });
     }
	
	else{
    }

}


function resetdata(){
	  $('#centry')[0].reset();
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include'navbar.php'?>
<?php include'sidebar.php'?>
  <div class="content-wrapper">
 <section class="content-header">
      <h1>
     <i class="fa fa-key"></i>Password Panel     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Master</li>
        <li class="active">Dealer Registration </li>
      </ol>
    </section>
	  <section class="content">
      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-body">
		 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><i class="fa fa-fw fa-lock"></i>   Change Password</h2>
                         
                        </div>
                        <div class="body">
                            <form method="POST" id="centry">
							 <div class="row">
									 <div class="col-md-6">
									<label class="form-label">New Password</label>
                                      
                                            <input type="password" class="form-control input-md"  name="password" id="password" placeholder="Enter password.." autocomplete="off" />	
                                  
										<span class="help-block" id="password_help" style="display:none;font-size:12px;color:red;">Please Enter password</span>
                                    </div>
								
								
								
							 
								
								 <div class="col-md-6">
									<label class="form-label">Confirm Password</label>
                                        <div class="form-line">
									
                                            <input type="password" class="form-control input-md"  name="confirm" id="confirm" placeholder="Confirm Password.." autocomplete="off">
                                        </div>
											<span class="help-block" id="confirm_help" style="display:none;font-size:12px;color:red;">Please Enter State.</span>
                                    </div>
                                    </div>
								
			
								

						<div class="row clearfix js-sweetalert"></div>							
			<div class="box-footer">
				<button type="button" style="border-radius: 0px;" id="btnSave" class="btn btn-primary btn-md" style="margin-right:20px;" onclick="vaction('edit');" tabindex="0"> <i class="fa fa-fw fa-save"></i> Save</button>
								
				<button type="button" class="btn btn-danger btn-md" style="margin-left:20px;border-radius:0px;"  onclick="resetdata();" > <i class="fa fa-fw fa-repeat"></i> Reset</button>
					
            </div> 
						 
					</form>
				</div>
				</div>
			</div>
		</div>
				
            </div>
            </div>
            </div>
			

    </section>
    </section>
</div>


 <?php include'footer.php'?>
 <script>
 
//ADD FOCUS ON SIDEBAR
	$("#sidebar_ul").find(".active").removeClass("active");
	$("#sidebar_change_pass").addClass("active").focus();	
	
$( document ).ready(function() {

});

</script>

<script>

function showSuccessMessage() {
    swal({
        title: "OK!",
        text: "Consignment Details has been added successfully!",
        type: "success",

        closeOnConfirm: false
    });
}

function showSuccessMessageEdit() {
    swal({
        title: "OK!",
        text: "password has been Updated successfully!",
        type: "success",

        closeOnConfirm: false
    });
}

function showConfirmMessage(cid) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
		
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
		vaction('delete',cid);
    });
}
</script>

</body>

</html>