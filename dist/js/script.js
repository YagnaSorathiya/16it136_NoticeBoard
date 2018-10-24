$(document).ready(function(){
	$(document).click(function(){
		$("#ajax_response").fadeOut('fast');
	});
	$("#VehicleNo").focus();
	var offset = $("#VehicleNo").offset();
	var width = $("#VehicleNo").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#ajax_response").css("width",width);
	$("#VehicleNo").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#VehicleNo").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				     data: "data="+keyword+"&type=Vehicle",
				   success: function(msg){	
					if(msg != 0)
					  $("#ajax_response").fadeIn("fast").html(msg);
					else
					{
					  $("#ajax_response").fadeIn("fast");	
					  $("#ajax_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("#ajax_response li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("#ajax_response li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("#ajax_response li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#ajax_response").fadeOut("fast");
					$("#VehicleNo").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
			$("#ajax_response").fadeOut("fast");
	});
	$("#ajax_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#VehicleNo").val($(this).text());
			  $("#ajax_response").fadeOut("fast");
		});
	});
	
	
	//PartyName
	
	
	$(document).click(function(){
		$("#PartyName_response").fadeOut('fast');
	});
	$("#CustomerName").focus();
	var offset = $("#CustomerName").offset();
	var width = $("#CustomerName").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#PartyName_response").css("width",width+60 );
	$("#CustomerName").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#CustomerName").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Party",
				   success: function(msg){	
					if(msg != 0)
					  $("#PartyName_response").fadeIn("fast").html(msg);
					else
					{
					  $("#PartyName_response").fadeIn("fast");	
					  $("#PartyName_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#CustomerName_response").fadeOut("fast");
					$("#CustomerName").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#PartyName_response").fadeOut("fast");
		 }
	});
	$("#PartyName_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#CustomerName").val($(this).text());
			  $("#PartyName_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	//classes
	
	
	$(document).click(function(){
		$("#Classess_response").fadeOut('fast');
	});
	$("#Classess").focus();
	var offset = $("#Classess").offset();
	var width = $("#classes").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Classess_response").css("width",width + 30);
	$("#Classess").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Classess").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Classess",
				   success: function(msg){	
					if(msg != 0)
					  $("#Classess_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Classess_response").fadeIn("fast");	
					  $("#Classess_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Classess_response").fadeOut("fast");
					$("#Classess").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Classess_response").fadeOut("fast");
		 }
	});
	$("#Classess_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Classess").val($(this).text());
			  $("#Classess_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	

	
	
	
	
	//Make
	
	
	$(document).click(function(){
		$("#Make_response").fadeOut('fast');
	});
	$("#Make").focus();
	var offset = $("#Make").offset();
	var width = $("#Make").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Make_response").css("width",width + 30);
	$("#Make").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Make").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "datam="+keyword+"&type=Make",
				   success: function(msg){	
					if(msg != 0)
					  $("#Make_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Make_response").fadeIn("fast");	
					  $("#Make_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Make_response").fadeOut("fast");
					$("#Make").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Make_response").fadeOut("fast");
		 }
	});
	$("#Make_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Make").val($(this).text());
			  $("#Make_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	//MODEl
	
	
	$(document).click(function(){
		$("#Model_response").fadeOut('fast');
	});
	$("#Model").focus();
	var offset = $("#Model").offset();
	var width = $("#Model").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Model_response").css("width",width + 20);
	$("#Model").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Model").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Model",
				   success: function(msg){	
					if(msg != 0)
					  $("#Model_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Model_response").fadeIn("fast");	
					  $("#Model_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Model_response").fadeOut("fast");
					$("#Model").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Model_response").fadeOut("fast");
		 }
	});
	$("#Model_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Model").val($(this).text());
			  $("#Model_response").fadeOut("fast");
		});
	});
	
	
	
	
	//NoOfCylndr
	
	
	$(document).click(function(){
		$("#NoOfCylndr_response").fadeOut('fast');
	});
	$("#NoOfCylndr").focus();
	var offset = $("#NoOfCylndr").offset();
	var width = $("#NoOfCylndr").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#NoOfCylndr_response").css("width",width + 30);
	$("#NoOfCylndr").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#NoOfCylndr").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=NoOfCylndr",
				   success: function(msg){	
					if(msg != 0)
					  $("#NoOfCylndr_response").fadeIn("fast").html(msg);
					else
					{
					  $("#NoOfCylndr_response").fadeIn("fast");	
					  $("#NoOfCylndr_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#NoOfCylndr_response").fadeOut("fast");
					$("#NoOfCylndr").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#NoOfCylndr_response").fadeOut("fast");
		 }
	});
	$("#NoOfCylndr_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#NoOfCylndr").val($(this).text());
			  $("#NoOfCylndr_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	//Colour
	
	
	$(document).click(function(){
		$("#Colour_response").fadeOut('fast');
	});
	$("#Colour").focus();
	var offset = $("#Colour").offset();
	var width = $("#Colour").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Colour_response").css("width",width + 30);
	$("#Colour").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Colour").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data12="+keyword+"&type=Colour",
				   success: function(msg){	
					if(msg != 0)
					  $("#Colour_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Colour_response").fadeIn("fast");	
					  $("#Colour_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Colour_response").fadeOut("fast");
					$("#Colour").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Colour_response").fadeOut("fast");
		 }
	});
	$("#Colour_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Colour").val($(this).text());
			  $("#Colour_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	//BodyType
	
	
	$(document).click(function(){
		$("#BodyType_response").fadeOut('fast');
	});
	$("#BodyType").focus();
	var offset = $("#BodyType").offset();
	var width = $("#BodyType").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#BodyType_response").css("width",width + 30);
	$("#BodyType").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#BodyType").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data13="+keyword+"&type=BodyType",
				   success: function(msg){	
					if(msg != 0)
					  $("#BodyType_response").fadeIn("fast").html(msg);
					else
					{
					  $("#BodyType_response").fadeIn("fast");	
					  $("#BodyType_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#BodyType_response").fadeOut("fast");
					$("#BodyType").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#BodyType_response").fadeOut("fast");
		 }
	});
	$("#BodyType_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#BodyType").val($(this).text());
			  $("#BodyType_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	//Brand
	
	
	$(document).click(function(){
		$("#Brand_response").fadeOut('fast');
	});
	$("#Brand").focus();
	var offset = $("#Brand").offset();
	var width = $("#Brand").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Brand_response").css("width",width + 30);
	$("#Brand").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Brand").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data14="+keyword+"&type=Brand",
				   success: function(msg){	
					if(msg != 0)
					  $("#Brand_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Brand_response").fadeIn("fast");	
					  $("#Brand_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Brand_response").fadeOut("fast");
					$("#Brand").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Brand_response").fadeOut("fast");
		 }
	});
	$("#Brand_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Brand").val($(this).text());
			  $("#Brand_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	//ChasisNo
	
	
	$(document).click(function(){
		$("#ChasisNo_response").fadeOut('fast');
	});
	$("#ChasisNo").focus();
	var offset = $("#ChasisNo").offset();
	var width = $("#ChasisNo").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#ChasisNo_response").css("width",width + 30);
	$("#ChasisNo").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#ChasisNo").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=ChasisNo",
				   success: function(msg){	
					if(msg != 0)
					  $("#ChasisNo_response").fadeIn("fast").html(msg);
					else
					{
					  $("#ChasisNo_response").fadeIn("fast");	
					  $("#ChasisNo_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#ChasisNo_response").fadeOut("fast");
					$("#ChasisNo").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#ChasisNo_response").fadeOut("fast");
		 }
	});
	$("#ChasisNo_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#ChasisNo").val($(this).text());
			  $("#ChasisNo_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	//EngineNo
	
	
	$(document).click(function(){
		$("#EngineNo_response").fadeOut('fast');
	});
	$("#EngineNo").focus();
	var offset = $("#EngineNo").offset();
	var width = $("#EngineNo").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#EngineNo_response").css("width",width + 30);
	$("#EngineNo").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#EngineNo").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=EngineNo",
				   success: function(msg){	
					if(msg != 0)
					  $("#EngineNo_response").fadeIn("fast").html(msg);
					else
					{
					  $("#EngineNo_response").fadeIn("fast");	
					  $("#EngineNo_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#EngineNo_response").fadeOut("fast");
					$("#EngineNo").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#EngineNo_response").fadeOut("fast");
		 }
	});
	$("#EngineNo_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#EngineNo").val($(this).text());
			  $("#EngineNo_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	
	
	
	//SeatCap
	
	
	$(document).click(function(){
		$("#SeatCap_response").fadeOut('fast');
	});
	$("#SeatCap").focus();
	var offset = $("#SeatCap").offset();
	var width = $("#SeatCap").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#SeatCap_response").css("width",width + 30);
	$("#SeatCap").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#SeatCap").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data15="+keyword+"&type=SeatCap",
				   success: function(msg){	
					if(msg != 0)
					  $("#SeatCap_response").fadeIn("fast").html(msg);
					else
					{
					  $("#SeatCap_response").fadeIn("fast");	
					  $("#SeatCap_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#SeatCap_response").fadeOut("fast");
					$("#SeatCap").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$(SeatCap_response).fadeOut("fast");
		 }
	});
	$("#SeatCap_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#SeatCap").val($(this).text());
			  $("#SeatCap_response").fadeOut("fast");
		});
	});
	
	
	
	//HPAWith
	
	
	$(document).click(function(){
		$("#HPAWith_response").fadeOut('fast');
	});
	$("#HPAWith").focus();
	var offset = $("#HPAWith").offset();
	var width = $("#HPAWith").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#HPAWith_response").css("width",width + 30);
	$("#HPAWith").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#HPAWith").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=HPAWith",
				   success: function(msg){	
					if(msg != 0)
					  $("#HPAWith_response").fadeIn("fast").html(msg);
					else
					{
					  $("#HPAWith_response").fadeIn("fast");	
					  $("#HPAWith_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#HPAWith_response").fadeOut("fast");
					$("#HPAWith").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#HPAWith_response").fadeOut("fast");
		 }
	});
	$("#HPAWith_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#HPAWith").val($(this).text());
			  $("#HPAWith_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	
	//Ref By
	
	
	$(document).click(function(){
		$("#RefBy_response").fadeOut('fast');
	});
	$("#RefBy").focus();
	var offset = $("#RefBy").offset();
	var width = $("#RefBy").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#RefBy_response").css("width",width + 30);
	$("#RefBy").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#RefBy").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data16="+keyword+"&type=RefBy",
				   success: function(msg){	
					if(msg != 0)
					  $("#RefBy_response").fadeIn("fast").html(msg);
					else
					{
					  $("#RefBy_response").fadeIn("fast");	
					  $("#RefBy_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#RefBy_response").fadeOut("fast");
					$("#RefBy").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#RefBy_response").fadeOut("fast");
		 }
	});
	$("#RefBy_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#RefBy").val($(this).text());
			  $("#RefBy_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	
	
	
	////cmaster Table
	
	
	
	
	
	//CustomerName
	
	
			$(document).click(function(){
				$("#CustomerName_response").fadeOut(50);
			});
			$("#CustomerName").focus();
			var offset = $("#CustomerName").offset();
			var width = $("#CustomerName").width()-4;
		/* 	//$("#material_response").css("left",offset.left);  */
			//$("#CustomerName_response").css("width",width );
			$("#CustomerName").keyup(function(event){
				 //alert(event.keyCode);
				 var keyword = $("#CustomerName").val();
				 if(keyword.length)
				 {
					 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
					 {
						 $("#loading").css("visibility","visible");
						 $.ajax({
						   type: "POST",
						   url: "name_fetch.php",
						   data: "data1="+keyword+"&type=CustomerName",
						   success: function(msg){	
							if(msg != 0)
							  $("#CustomerName_response").fadeIn(50).html(msg);
							else
							{
							  $("#CustomerName_response").fadeIn(50);	
							  $("#CustomerName_response").html('<div style="text-align:left;">No Matches Found</div>');
							}
							$("#loading").css("visibility","hidden");
						   }
						 });
					 }
					 else
					 {
						switch (event.keyCode)
						{
						 case 40:
						 {
							  found = 0;
							  $("li").each(function(){
								 if($(this).attr("class") == "selected")
									found = 1;
							  });
							  if(found == 1)
							  {
								var sel = $("li[class='selected']");
								sel.next().addClass("selected");
								sel.removeClass("selected");
							  }
							  else
								$("li:first").addClass("selected");
							 }
						 break;
						 case 38:
						 {
							  found = 0;
							  $("li").each(function(){
								 if($(this).attr("class") == "selected")
									found = 1;
							  });
							  if(found == 1)
							  {
								var sel = $("li[class='selected']");
								sel.prev().addClass("selected");
								sel.removeClass("selected");
							  }
							  else
								$("li:last").addClass("selected");
						 }
						 break;
						 case 13:
							$("#CustomerName_response").fadeOut(50);
							$("#CustomerName").val($("li[class='selected'] a").text());
						 break;
						}
					 }
				 }
				 else
					$("#CustomerName_response").fadeOut(50);
			});
			$("#CustomerName_response").mouseover(function(){
				$(this).find("li a:first-child").mouseover(function () {
					  $(this).addClass("selected");
				});
				$(this).find("li a:first-child").mouseout(function () {
					  $(this).removeClass("selected");
				});
				$(this).find("li a:first-child").click(function () {
					  $("#CustomerName").val($(this).text());
					  $("#CustomerName_response").fadeOut(50);
				});
			});
			
	
	
	//GroupName
	
	
	
			$(document).click(function(){
				$("#GroupName_response").fadeOut(50);
			});
			$("#GroupName").focus();
			var offset = $("#GroupName").offset();
			var width = $("#GroupName").width()-4;
		/* 	$("#material_response").css("left",offset.left);  */
			//$("#GroupName_response").css("width",width + 30);
			$("#GroupName").keyup(function(event){
				 //alert(event.keyCode);
				 var keyword = $("#GroupName").val();
				 if(keyword.length)
				 {
					 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
					 {
						 $("#loading").css("visibility","visible");
						 $.ajax({
						   type: "POST",
						   url: "name_fetch.php",
						   data: "data1="+keyword+"&type=GroupName",
						   success: function(msg){	
							if(msg != 0)
							  $("#GroupName_response").fadeIn(50).html(msg);
							else
							{
							  $("#GroupName_response").fadeIn(50);	
							  $("#GroupName_response").html('<div style="text-align:left;">No Matches Found</div>');
							}
							$("#loading").css("visibility","hidden");
						   }
						 });
					 }
					 else
					 {
						switch (event.keyCode)
						{
						 case 40:
						 {
							  found = 0;
							  $("li").each(function(){
								 if($(this).attr("class") == "selected")
									found = 1;
							  });
							  if(found == 1)
							  {
								var sel = $("li[class='selected']");
								sel.next().addClass("selected");
								sel.removeClass("selected");
							  }
							  else
								$("li:first").addClass("selected");
							 }
						 break;
						 case 38:
						 {
							  found = 0;
							  $("li").each(function(){
								 if($(this).attr("class") == "selected")
									found = 1;
							  });
							  if(found == 1)
							  {
								var sel = $("li[class='selected']");
								sel.prev().addClass("selected");
								sel.removeClass("selected");
							  }
							  else
								$("li:last").addClass("selected");
						 }
						 break;
						 case 13:
							$("#GroupName_response").fadeOut(50);
							$("#GroupName").val($("li[class='selected'] a").text());
						 break;
						}
					 }
				 }
				 else
					$(GroupName_response).fadeOut(50);
			});
			$("#GroupName_response").mouseover(function(){
				$(this).find("li a:first-child").mouseover(function () {
					  $(this).addClass("selected");
				});
				$(this).find("li a:first-child").mouseout(function () {
					  $(this).removeClass("selected");
				});
				$(this).find("li a:first-child").click(function () {
					  $("#GroupName").val($(this).text());
					  $("#GroupName_response").fadeOut(50);
				});
			});
			
	
	
	
	
	
	
	
	//GSTINNO
	
	
	$(document).click(function(){
		$("#GSTINNO_response").fadeOut('fast');
	});
	$("#GSTINNO").focus();
	var offset = $("#GSTINNO").offset();
	var width = $("#GSTINNO").width();
	//$("#ajax_response").css("left",offset.left); 
//	$("#GSTINNO_response").css("width",width + 30);
	$("#GSTINNO").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#GSTINNO").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=GSTINNO",
				   success: function(msg){	
					if(msg != 0)
					  $("#GSTINNO_response").fadeIn("fast").html(msg);
					else
					{
					  $("#GSTINNO_response").fadeIn("fast");	
					  $("#GSTINNO_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#GSTINNO_response").fadeOut("fast");
					$("#GSTINNO").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#GSTINNO_response").fadeOut("fast");
		 }
	});
	$("#GSTINNO_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#GSTINNO").val($(this).text());
			  $("#GSTINNO_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	
	
	//qmaster
	
	
	
	
	
	
	
	
	
	//PartyName
	
	
	$(document).click(function(){
		$("#PartyName_response").fadeOut('fast');
	});
	$("#PartyName").focus();
	var offset = $("#PartyName").offset();
	var width = $("#PartyName").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#PartyName_response").css("width",width + 30);
	$("#PartyName").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#PartyName").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=PartyName",
				   success: function(msg){	
					if(msg != 0)
					  $("#PartyName_response").fadeIn("fast").html(msg);
					else
					{
					  $("#PartyName_response").fadeIn("fast");	
					  $("#PartyName_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#PartyName_response").fadeOut("fast");
					$("#PartyName").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#PartyName_response").fadeOut("fast");
		 }
	});
	$("#PartyName_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#PartyName").val($(this).text());
			  $("#PartyName_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	
	//Delivery
	
	
	
	$(document).click(function(){
		$("#Delivery_response").fadeOut('fast');
	});
	$("#Delivery").focus();
	var offset = $("#Delivery").offset();
	var width = $("#Delivery").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Delivery_response").css("width",width + 30);
	$("#Delivery").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Delivery").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Delivery",
				   success: function(msg){	
					if(msg != 0)
					  $("#Delivery_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Delivery_response").fadeIn("fast");	
					  $("#Delivery_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Delivery_response").fadeOut("fast");
					$("#Delivery").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Delivery_response").fadeOut("fast");
		 }
	});
	$("#Delivery_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Delivery").val($(this).text());
			  $("#Delivery_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	
	
	
	
	//Ref
	
	
	
	$(document).click(function(){
		$("#Ref_response").fadeOut('fast');
	});
	$("#Ref").focus();
	var offset = $("#Ref").offset();
	var width = $("#Ref").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Ref_response").css("width",width + 30);
	$("#Ref").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Ref").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Ref",
				   success: function(msg){	
					if(msg != 0)
					  $("#Ref_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Ref_response").fadeIn("fast");	
					  $("#Ref_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Ref_response").fadeOut("fast");
					$("#Ref").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Ref_response").fadeOut("fast");
		 }
	});
	$("#Ref_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Ref").val($(this).text());
			  $("#Ref_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	//PaymentTerm
	
	
	
	$(document).click(function(){
		$("#PaymentTerm_response").fadeOut('fast');
	});
	$("#PaymentTerm").focus();
	var offset = $("#PaymentTerm").offset();
	var width = $("#PaymentTerm").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#PaymentTerm_response").css("width",width + 30);
	$("#PaymentTerm").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#PaymentTerm").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=PaymentTerm",
				   success: function(msg){	
					if(msg != 0)
					  $("#PaymentTerm_response").fadeIn("fast").html(msg);
					else
					{
					  $("#PaymentTerm_response").fadeIn("fast");	
					  $("#PaymentTerm_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#PaymentTerm_response").fadeOut("fast");
					$("#PaymentTerm").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#PaymentTerm_response").fadeOut("fast");
		 }
	});
	$("#PaymentTerm_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#PaymentTerm").val($(this).text());
			  $("#PaymentTerm_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	//Inq
	
	
	
	$(document).click(function(){
		$("#Inq_response").fadeOut('fast');
	});
	$("#Inq").focus();
	var offset = $("#Inq").offset();
	var width = $("#Inq").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Inq_response").css("width",width + 30);
	$("#Inq").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Inq").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Inq",
				   success: function(msg){	
					if(msg != 0)
					  $("#Inq_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Inq_response").fadeIn("fast");	
					  $("#Inq_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Inq_response").fadeOut("fast");
					$("#Inq").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Inq_response").fadeOut("fast");
		 }
	});
	$("#Inq_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Inq").val($(this).text());
			  $("#Inq_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	//DeliveryPeriod
	
	
	
	$(document).click(function(){
		$("#DeliveryPeriod_response").fadeOut('fast');
	});
	$("#DeliveryPeriod").focus();
	var offset = $("#DeliveryPeriod").offset();
	var width = $("#DeliveryPeriod").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#DeliveryPeriod_response").css("width",width + 30);
	$("#DeliveryPeriod").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#DeliveryPeriod").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=DeliveryPeriod",
				   success: function(msg){	
					if(msg != 0)
					  $("#DeliveryPeriod_response").fadeIn("fast").html(msg);
					else
					{
					  $("#DeliveryPeriod_response").fadeIn("fast");	
					  $("#DeliveryPeriod_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#DeliveryPeriod_response").fadeOut("fast");
					$("#DeliveryPeriod").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#DeliveryPeriod_response").fadeOut("fast");
		 }
	});
	$("#DeliveryPeriod_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#DeliveryPeriod").val($(this).text());
			  $("#DeliveryPeriod_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	
	
	//Execu
	
	
	
	$(document).click(function(){
		$("#Execu_response").fadeOut('fast');
	});
	$("#Execu").focus();
	var offset = $("#Execu").offset();
	var width = $("#Execu").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Execu_response").css("width",width + 30);
	$("#Execu").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Execu").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Execu",
				   success: function(msg){	
					if(msg != 0)
					  $("#Execu_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Execu_response").fadeIn("fast");	
					  $("#Execu_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Execu_response").fadeOut("fast");
					$("#Execu").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Execu_response").fadeOut("fast");
		 }
	});
	$("#Execu_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Execu").val($(this).text());
			  $("#Execu_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
	//QtnValidity
	
	
	
	$(document).click(function(){
		$("#QtnValidity_response").fadeOut('fast');
	});
	$("#QtnValidity").focus();
	var offset = $("#QtnValidity").offset();
	var width = $("#QtnValidity").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#QtnValidity_response").css("width",width + 30);
	$("#QtnValidity").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#QtnValidity").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=QtnValidity",
				   success: function(msg){	
					if(msg != 0)
					  $("#QtnValidity_response").fadeIn("fast").html(msg);
					else
					{
					  $("#QtnValidity_response").fadeIn("fast");	
					  $("#QtnValidity_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#QtnValidity_response").fadeOut("fast");
					$("#QtnValidity").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#QtnValidity_response").fadeOut("fast");
		 }
	});
	$("#QtnValidity_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#QtnValidity").val($(this).text());
			  $("#QtnValidity_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	//Subject
	
	
	
	$(document).click(function(){
		$("#Subject_response").fadeOut('fast');
	});
	$("#Subject").focus();
	var offset = $("#Subject").offset();
	var width = $("#Subject").width();
	//$("#ajax_response").css("left",offset.left); 
	//$("#Subject_response").css("width",width + 30);
	$("#Subject").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#Subject").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "name_fetch.php",
				   data: "data1="+keyword+"&type=Subject",
				   success: function(msg){	
					if(msg != 0)
					  $("#Subject_response").fadeIn("fast").html(msg);
					else
					{
					  $("#Subject_response").fadeIn("fast");	
					  $("#Subject_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#Subject_response").fadeOut("fast");
					$("#Subject").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
		 {
			$("#Subject_response").fadeOut("fast");
		 }
	});
	$("#Subject_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#Subject").val($(this).text());
			  $("#Subject_response").fadeOut("fast");
		});
	});
	
	
	
	
	
	
});