	function searchTransaction(){
 var pc = $('#firstname').val();
 var start_transaction = $('#start_date_transaction').val();
 var end_transaction = $('#end_date_transaction').val();
 
 
 console.log(pc);
 $("#loadproducts").html("<img src='/loader.gif'>"); 	
 $("#loadtransaction").load("loadtransaction.php?firstname="+pc+"&start_transaction="+start_transaction+"&end_transaction="+end_transaction);
}

	function searchProduct(){
	var productname = $('#productname').val();

	console.log(productname);	
	$("#loadproduct").load("loadproduct.php?productname="+productname);
   }

   function searchUser(){
	var username = $('#username').val();

	console.log(username);	
	$("#loaduser").load("loaduser.php?username="+username);
   }

   


function validateForm(){
	
	var firstname = $('#user_id_add').val();
	var lastname = $('#lname').val();
	
	if (firstname == ""){
		$('#error').html('Firstname is required');
		$('#errors').html('Firstname is required');
		$('#fname').css("border", "1px solid red");
		
	}else{
		$('#error').html('');
		$('#fname').css("border", "1px solid black");
		checking = true;
		return false;
		
	}
	
	if (lastname == ""){
		$('#lerror').html('Lastname is required');
		$('#errors').append('lastname is required');
		$('#lname').css("border", "1px solid red");
		return false;
	}else{
		$('#lerror').html('');
		$('#lname').css("border", "1px solid black");
		checking = true;
		return false;
		
	}
	return false;
	var pw = $('#password').val();
	var cpw = $('#confirmpassword').val();
	var checking = false;
	
	if (firstname == ""){
		$('#error').html('FIRstname is required');
		$('#errorf').html('FIRstname is required');
		$('#firstname').css("border", "1px solid red");	
		return false;
	}else{
		checking = true;
		$('#error').html('');
		$('#errorf').html('');
		$('#firstname').css("border", "1px solid black");
	}
	
	if (pw == ""){
		$('#error').append('Password is required');
		$('#errorp').html('Password is required');
		$('#password').css("border", "1px solid red");
		return false;
	}else{
		checking = true;
		$('#error').html('');
		$('#errorp').html('');
		$('#password').css("border", "1px solid black");
	}
	
	if (pw != cpw){
		checking = true;
		$('#error').append('Password hndi same sa cP');
	}
	
	if (checking){
		console.log('ok na');
	}
	
	
}

function statusUpdate(event,section, key){	
	var result = confirm("Are you sure you want to "+event+"?");
	if (!result) {
		return false;
	}
	
	$.get('actions/statusUpdate.php?event='+event+'&section='+section+'&id=' +  key, function(data) { 
        /*if (section == 'products'){
			$('tbody#resultstransactions').load("actions/loadproducts.php"); 
		}
		
		if (section == 'inventory'){		
			$('tbody#resultstransactions').load("actions/loadinventory.php"); 
		}
		
		if (section == 'supplier'){		
			$('tbody#resultstransactions').load("actions/loadsupplier.php"); 
		}
		
		if (section == 'product_unit'){		
			$('tbody#resultstransactions').load("actions/loadcategory.php"); 
		}
		
		if (section == 'officelab'){		
			$('tbody#resultstransactions').load("actions/loadoffice.php"); 
		}
		
		if (section == 'user_access_type'){		
			
		}*/
		
		
		if (section == 'users'){
			window.location.replace("users.php");
		}else{
			//var url = "actions/load"+section+".php";
			//$('tbody#resultstransactions').load(url); 
			window.location.replace(section+".php");
		}

    });
}

function addForm(){
    $('#regForm').toggle();
}

function cancelForm(event){        
    if (event=='add'){
        $('#regForm').hide();
    }else{
        $('#updateForm').hide();    
    }        
}
