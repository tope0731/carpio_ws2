<!DOCTYPE html>
<html>
<head>

<script src="js/jquery-3.3.1.js?ver=001"></script>
<script src="js/main.js?ver=001"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body onload="searchTransaction(); searchProduct(); searchUser();" >	

	<div class="container border p-4 mt-4 bg-light">
		<h1>Users</h1>
		<div class="row">
			<div class="col-md-3 mb-2">
				<input type="text" placeholder="First Name" id="fname_add" class="form-control">
				<span id="errorf" style="color:red;"></span>
			</div>
			<div class="col-md-3 mb-2">
				<input type="text" placeholder="Last Name" id="lname_add" class="form-control">
				<span id="errorf" style="color:red;"></span>
			</div>
			<div class="col-md-3 mb-2">
				<input type="text" placeholder="Address" id="address_add" class="form-control">
				<span id="errorf" style="color:red;"></span>
			</div>
			<div class="col-md-3 mb-2">
				<button onclick="AddUser()" class="btn btn-success">Add User</button>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-3">
				<div class="form-group form-inline">
					<label for="username" class="mr-2" style="font-size: 16px; font-weight: bold;">Search:</label>
					<input type="text" placeholder="First Name" id="username" class="form-control mr-2" onfocusout="searchUser();" onkeyup="searchUser();">
					<span id="errorf" style="color:red;"></span>
				</div>
			</div>
		</div>
		<br>
				
		<div id="loaduser"></div>
		
	</div>


	<div class="container  border p-4 mt-4 bg-light">
			<h1>Products</h1>
			<div class="row">
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="Product name" id="product_name_add" class="form-control">
					
				</div>
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="Supplier Id" id="product_supplier_add" class="form-control">
					
				</div>
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="Price" id="product_price_add" class="form-control">
					
				</div>
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="Stock" id="product_stock_add" class="form-control">
					
				</div>
				<div class="col-md-2 mb-2">
					<input type="button" value="Add Product" onclick="AddProduct()" class="btn btn-success">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-3">
					<div class="form-group form-inline">
						<label for="username" class="mr-2" style="font-size: 16px; font-weight: bold;">Search:</label>
						<input type="text" placeholder="Product Name" id="productname" class="form-control"  onfocusout="searchProduct();" onkeyup="searchProduct();">
						<span id="errorf" style="color:red;"></span>
					</div>
				</div>
			</div>
			<br>

			<div id="loadproduct"></div>
	</div>
	
	<div class="container border p-4 mt-4 mb-4 bg-light">
			<h1>Transactions</h1>
			<div class="row">
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="User Id" id="user_id_add" class="form-control">
					<span id="errorf" style="color:red"></span>
				</div>
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="Amount" id="amount_add" class="form-control">
					<span id="errorf" style="color:red"></span>
				</div>
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="Product Id" id="product_id_add" class="form-control">
					<span id="errorf" style="color:red"></span>
				</div>
				<div class="col-md-2 mb-2">
					<input type="text" placeholder="Quantity" id="quantity_add" class="form-control">
					
				</div>
				<div class="col-md-2">
					<input type="button" value="Add Transaction" onclick="AddTransaction()" class="btn btn-success">
				</div>
			</div>
			<br>

			<div class = "container">
				<b>Search:</b>
				<div class = "row">
					<div class="col-md-4">
						<input type="text" placeholder="Transaction Id" id="firstname" class="form-control" onfocusout="searchTransaction();" onkeyup="searchTransaction();">
					</div>

					<div class="col-md-3">
						<label for="start_date_transaction" class="form-label" style="display: inline-block; margin-bottom: 0;">Start Date: </label>
						<input type="date" id="start_date_transaction" name="start_date" value="2000-02-10" class="form-control" onfocusout="searchTransaction();" onkeyup="searchTransaction();" style="display: inline-block; width: auto">
					</div>

					<div class="col-md-3">
						<label for="end_date_transaction" class="form-label" style="display: inline-block; margin-bottom: 0;">End Date: </label>
						<input type="date" id="end_date_transaction" name="end_date" value="2030-02-10" class="form-control" onfocusout="searchTransaction();" onkeyup="searchTransaction();" style="display: inline-block; width: auto">
					</div>

				</div>
			</div>
			<br>

			<div id="loadtransaction"></div>		
	</div>

</body>
</html>

