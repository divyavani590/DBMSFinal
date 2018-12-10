<html>
<head>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <script>
  $(document).on('change', 'input[type=file]',function(){
	  console.log(this.files[0].name);
	  $("#filenamepath").val(this.files[0].name);
  });
  </script>
</head>
<body>

<h2 align="center" style="color: maroon;">Add Product</h2>
<div id="form">
<form action="addproduct.php" method="post" enctype="multipart/form-data" style="align:center">
<table align="center">
            <tr>
				<td>Product_Id:</td>
				<td><input type="text" name="Product_Id" disabled></td>
			</tr>
			<tr>
				<td>P_Name:</td>
				<td><input type="text" name="P_Name"></td>
			</tr>
			<tr>
				<td>productimage:</td>
				<td><input type="hidden" name="MAX_FILE_SIZE" value="512000" />
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="hidden" name="filename" id="filenamepath"></td>
			</tr>
			<tr>
				<td>Price_perUnit:</td>
				<td><input type="text" name="Price_perUnit"></td>
			</tr>
			<tr>
				<td>Order_in_quantity:</td>
				<td><input type="number" name="Order_in_quantity" min="1" max="500"></td>
			</tr>
			<tr>
				<td>gender:
				<input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female<br></td>
			</tr>
			<tr>
				<td>Category_id:</td>
				<td><input type="text" name="Category_id"></td>
			</tr>
			
			<tr>
				<td align="right" colspan="2">
				<input type="submit" name= "submit" value="create"><input type="submit" value="clear"></td>
			</tr>


		</table>
		
		</form>
		</div>
		
</body>
</html>