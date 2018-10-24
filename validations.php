--->   email validation 

<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$('#centry').validate();
</script>

--->   phone no. validation

<div class="col-md-4 col-sm-12">							
	<div class="form-group">
		<label>Mobile No.</label>
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-phone"></i>
				</div>
			  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="mob" id="mob" placeholder="Enter your Mobile NO..">
			  <span class="help-block" id="mob_help" style="display:none;">Please Enter Mobile No.</span>
			</div>               
	</div>							
</div>


<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

// Money Euro
    $('[data-mask]').inputmask()
	
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	* Datatable pdf excel print copy buttons *
	
		//paste in footer//
	
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	
	 
		//paste in datatable//
		
		 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
	
