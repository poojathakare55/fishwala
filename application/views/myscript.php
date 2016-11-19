<script>
 function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}
$('#same_as').on('change', function() { 
    // From the other examples
    if (this.checked) {
		
       $("#shipping_name").val($("#checkoutname").val());
        $("#shipping_emailid").val($("#checkoutemailid").val());
        $("#shipping_address").val($("#checkoutaddress").val());
        $("#shipping_pincode").val($("#checkoutpincode1").val());
        $("#shipping_contactno").val($("#checkoutcontactno").val());
    }else{
		 $("#shipping_name").val('');
        $("#shipping_emailid").val('');
        $("#shipping_address").val('');
        $("#shipping_pincode").val('');
        $("#shipping_contactno").val('');
	}
});
function adderrorclass(){
		$("#registermsg").removeClass("alert alert-success");
			$("#registermsg").addClass("alert alert-danger");
		}
		function addsuccessclass(){
			$("#registermsg").addClass("alert alert-success");
	
		}
$("#pincodeform").submit(function(e)
	{
		var category_id=$("#category_id").val();
		var category_name=$('#'+category_id).val();

	category_name = category_name.replace(/\s+/g, "");
	
		$("#pincodemsg").html("Checking......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			
			if(data=='fail'){
			$("#pincodemsg").addClass("alert alert-danger");
$("#pincodemsg").html("Not Available");
			}else if(data=='success'){
				
window.location="<?php  echo site_url().'category/'; ?>"+category_name
}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#pincodemsg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
$("#productloginform").submit(function(e)
	{
		
		$("#productloginmsg").html("Authenticating......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			//$("#productloginmsg").html(data);
			if(data=='fail'){
			$("#productloginmsg").addClass("alert alert-danger");
$("#productloginmsg").html("Username not registred yet.");
			}else if(data=='success'){
				//alert($("#addprodloginproductid").val());
				//alert('<?php echo current_url();?>');
				//addproductpopup($("#addprodloginproductid").val(),"<?php echo current_url();?>");
				<?php if($name!=''){?>
window.location="<?php echo current_url();?>";
				<?php }else{?>
				 $('.addprodlogin').modal('hide');
				addproductpopup($("#addprodloginproductid").val(),'<?php echo current_url();?>');
				<?php }?>
}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#productloginmsg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
	$("#headerloginform").submit(function(e)
	{
		
		$("#headerloginmsg").html("Authenticating......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			//$("#headerloginmsg").html(data);
			if(data=='fail'){
			$("#headerloginmsg").addClass("alert alert-danger");
$("#headerloginmsg").html("Username not registred yet.");
			}else if(data=='success'){
window.location="<?php echo current_url();?>";
}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#headerloginmsg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
	$("#categoryloginform").submit(function(e)
	{
		
		$("#categoryloginmsg").html("Authenticating......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			//$("#categoryloginmsg").html(data);
			if(data=='fail'){
			$("#categoryloginmsg").addClass("alert alert-danger");
$("#categoryloginmsg").html("Username not registred yet.");
			}else if(data=='success'){
window.location="<?php echo current_url();?>";
}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#categoryloginmsg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
	$("#registerform").submit(function(e)
	{
		
		$("#registermsg").html("Registering......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			
			if(data=='fail'){
				adderrorclass();
$("#registermsg").html("Email Id Already Registered");
			}
else if(data=='success'){
	addsuccessclass();
	$("#registermsg").html("Registered Successfully");
$("#reset").click(); 
}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#registermsg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
function fillcategoryid(category_id){
	
	$('#category_id').val(category_id);
}
function openproduct(){
	var category_id=$('#category_id').val();
	var category_name=$('#'+category_id).val();

	category_name = category_name.replace(/\s+/g, "");
	
	window.location = "<?php  echo site_url().'category/'; ?>"+category_name;
}
function addproductpopup(product_id,current_url){
		//$("#ajax-loader").html('<img src="<?php echo base_url(); ?>images/loading.gif" id="loading-indicator"/>');
	
	 $.ajax({
type: "GET",
url:"<?php echo site_url();?>baang/addproductpopup",
data:{product_id:product_id,current_url:current_url},
dataType: 'json',
success: function(data){
	
	$("#openpopup").html(data['popup']);
	  $('#openpopup').modal('show');
},

});

 }
/*function fetchproductdetailsbyunit(unit){
	var product_name=$(".product_name").html();
	
	 $.ajax({
type: "GET",
url:"<?php echo site_url();?>baang/fetchproductdetailsbyunit",
data:{product_name:product_name,unit:unit},
dataType: 'json',
success: function(data){
	$("#product_id").val(data['id']);
	$(".price span").html(data['price']);
	$(".description").html(data['description']);
	$("#price").val(data['price']);
},

});
 }*/
	function iaccept(){
		if(document.getElementById('iaccept').checked) {
    window.location = "<?php  echo site_url('baang/checkout'); ?>";
} else {
   alert("You Must Accept The Terms & Agreements");
     return false;
}
		return false;
	}
	function addprodlogin(product_id){
		$('#addprodloginproductid').val(product_id);
		 $('.addprodlogin').modal('show');
	}
	function calculateamount(qty){
		var price=$("#originalprice").val();
		price=+price;
		qty=+qty;
		var converttogram=qty*1000;
		converttogram=+converttogram;
		var getactualqty=converttogram/500;
		getactualqty=+getactualqty;
		var finalprice=getactualqty*price;
		finalprice=+finalprice;
		if(qty=='' || qty=='0')
			$("#price").val($("#originalprice").val());
		else
		$("#price").val(finalprice);
	}
	function cancelthisproduct(product_main_id,dateval){
		var r = confirm("Do You Want To Cancel?");
	if (r == true) {
   
		$.ajax({
type: "GET",
url:"<?php echo site_url();?>baang/cancelproduct",
data:{product_main_id:product_main_id,dateval:dateval},
success: function(data){
	//alert(data);
if(data=='success'){
	
	window.location = "<?php echo current_url();?>";
}else{
	alert("Unable To Cancel");
}
},

});
} else {
     return false;
}
	}
	function resumethisproduct(product_main_id,dateval){
		var r = confirm("Do You Want To Resume?");
	if (r == true) {
   
		$.ajax({
type: "GET",
url:"<?php echo site_url();?>baang/resumethisproduct",
data:{product_main_id:product_main_id,dateval:dateval},
success: function(data){
	//alert(data);
if(data=='success'){
	
	window.location = "<?php echo current_url();?>";
}else{
	alert("Unable To Resume");
}
},

});
} else {
     return false;
}
	}
	function cancelthisorder(order_id){
		var r = confirm("Do You Want To Cancel This Order?");
	if (r == true) {
   
		$.ajax({
type: "GET",
url:"<?php echo site_url();?>baang/cancelthisorder",
data:{order_id:order_id},
success: function(data){
	
if(data=='success'){
	
	window.location = "<?php echo current_url();?>";
}
else if(data=='fail'){
alert("Unable to cancel this order because your order have been started.")
}
else{
	alert("Unable To Cancel This Order");
}
},

});
} else {
     return false;
}
	}
	function changestatustopause(){
	var checkedNum = $('input[name="pausechk[]"]:checked').length;
	
if (!checkedNum) {
   alert("Please Select Product To Be Paused");
   return false;
}else{
	var r = confirm("Do You Want To Pause This Product?");
	if (r == true) {
    return true;
} else {
     return false;
}
}

	//return true;
	}	
	function changestatustoresume(){
	var checkedNum = $('input[name="resumechk[]"]:checked').length;
	
if (!checkedNum) {
   alert("Please Select Product To Be Resume");
   return false;
}else{
	var r = confirm("Do You Want To Resume This Product?");
	$("#subscriptionform").attr("action", "<?php echo site_url().'baang/changestatustoresume/'.$profileid;?>");
	if (r == true) {
    return true;
} else {
     return false;
}
}

	//return true;
	}
	$("#changepasswordform").submit(function(e)
	{
		var changepassword=$("#changepassword").val();
		var repeatpassword=$("#repeatpassword").val();
		if(changepassword==repeatpassword){
			return true;
		}else{
			alert("Password Not Matched");
			return false;
		}
	});
	$("#charitychk").click(function(event) {  
var originalgrandamount=$("#originalgrandamount").val();
    if(this.checked) {
		
		originalgrandamount=+originalgrandamount;
var roundoff=Math.ceil(originalgrandamount / 10) * 10;
roundoff=+roundoff;
$("#grand_total").val(roundoff);
$("#amount").val(roundoff);

		$(".grandtotal").html('<strong>Rs. '+roundoff+'</strong>');
		$("#charity_amount").val(roundoff-originalgrandamount);
		
    }else{
		$("#grand_total").val(originalgrandamount);
$("#amount").val(originalgrandamount);
		$("#charity_amount").val('0');
		$(".grandtotal").html('<strong>Rs. '+originalgrandamount+'</strong>');
	}
	
	   document.getElementById("status").value = status;
});
$("#expresschk").click(function(event) {  
var amounttobeadded=50;
 amounttobeadded=+amounttobeadded;
var originalgrandamount=$("#originalgrandamount").val();
var charity_amount=$("#charity_amount").val();
var grand_total=$("#grand_total").val();
var amount=$("#amount").val();
var delivery_charges=$("#delivery_charges").val();
var original_delivery_charges=$("#original_delivery_charges").val();
delivery_charges=+delivery_charges;
originalgrandamount=+originalgrandamount;
amount=+amount;
grand_total=+grand_total;
charity_amount=+charity_amount;
    if(this.checked) {
		var expressamnt=delivery_charges+amounttobeadded;
		expressamnt=+expressamnt;
		$(".delivery_charges").html("Rs. "+expressamnt);
		$("#delivery_charges").val(expressamnt);
		$("#grand_total").val((grand_total+amounttobeadded));
		$("#amount").val((amount+amounttobeadded));
		$("#originalgrandamount").val((originalgrandamount+amounttobeadded));
		
		$(".grandtotal").html('<strong>Rs. '+(originalgrandamount+amounttobeadded+charity_amount)+'</strong>');
		$("#express_delivery").val(amounttobeadded);
    }else{
		$(".delivery_charges").html("Rs. "+original_delivery_charges);
		$("#delivery_charges").val(original_delivery_charges);
		$(".grandtotal").html('<strong>Rs. '+(grand_total)+'</strong>');
		$("#grand_total").val((grand_total-amounttobeadded));
		$("#amount").val((amount-amounttobeadded));
		$("#originalgrandamount").val((originalgrandamount-amounttobeadded));
		$(".grandtotal").html('<strong>Rs. '+(originalgrandamount-amounttobeadded+charity_amount)+'</strong>');
		$("#express_delivery").val('0');
	}
	
	   
});
$("#pause-select-all").click(function(event) {   
var str=id=status="";
    if(this.checked) {
       
        $(".pausechk").each(function() {
		
            this.checked = true;                        
        });
		
    }else{
		 $(".pausechk").each(function() {
		
            this.checked = false;                        
        });
	}
});
$("#resume-select-all").click(function(event) {   
var str=id=status="";
    if(this.checked) {
       
        $(".resumechk").each(function() {
		
            this.checked = true;                        
        });
		
    }else{
		 $(".resumechk").each(function() {
		
            this.checked = false;                        
        });
	}
});
$(".pausechk").click(function(event) {  
var str=id=status=""; 
 $(".pausechk").each(function() {
    if(this.checked) {
	
       $("#pause-select-all").prop("checked", false);
    }
	
	});

});
$(".resumechk").click(function(event) {  
var str=id=status=""; 
 $(".resumechk").each(function() {
    if(this.checked) {
	
       $("#resume-select-all").prop("checked", false);
    }
	
	});

});
$("#forgetpassword").submit(function(e)
	{
		var category_id=$("#category_id").val();
		$("#forgetpasswordmsg").html("Checking......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			
			if(data=='fail'){
				$("#forgetpasswordmsg").removeClass("alert alert-success");
			$("#forgetpasswordmsg").addClass("alert alert-danger");
$("#forgetpasswordmsg").html("Email ID Not Registered");
			}else if(data=='success'){
				$("#forgetpasswordmsg").removeClass("alert alert-danger");
				$("#forgetpasswordmsg").addClass("alert alert-success");
$("#forgetpasswordmsg").html("Password Have Been Sent to your Email ID");
 $('#forgetpassword')[0].reset();
}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#forgetpasswordmsg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
		$("#contactform").submit(function(e)
	{
		
		$("#contactformmsg").html("Checking......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			
			
				$("#contactformmsg").removeClass("alert alert-danger");
				$("#contactformmsg").addClass("alert alert-success");
$("#contactformmsg").html("Mail Sent Successfully");
 $('#contactform')[0].reset();

			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#pincodemsg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
</script>