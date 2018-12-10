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
<?php
include("session.php");
$conn = $db_handle->getNewConn();

 if( isset($_GET['product_id']) )
	{
		$id = $_GET['product_id'];
		//$res= mysqli_query($conn,);
		$stmt= $conn->prepare("SELECT * FROM products WHERE product_id=?");
		$stmt->bind_param('s',$id);
		$stmt->execute();
		//$row= mysqli_fetch_array($res);
		$rows= $stmt->get_result();
		$row = $rows->fetch_assoc();
		//print_r($row);
	}
 //mysqli_close($conn);
 $stmt->close();
 
 function isCheckedMale($gender){
	 
	 if($gender == 'M'){
		 echo "checked";
	 }
 }
 function isCheckedFemale($gender){
	 if($gender == 'F'){
		 echo "checked";
	 }
 }
?>
<center>
<h3>Product-Edit</h3>
</center>
<div id="form">
<form action="editproduct.php" method="POST" >

<div class="form-row">
  <label for="product_desc">Product Name:</label>
    <input type="text" name="newName" value="<?php echo $row['product_desc']; ?>">
</div>
<div class="form-row">
<label for="Price_perUnit">Price per Unit:</label>
<input type="text" name="newprice" value="<?php echo $row['price']; ?>">
</div>
<div class="form-row">
<label for="Order_in_quantity">Order_in_quantity:</label>
<input type="number" name="neworder" value="<?php echo $row['product_qty']; ?>">
</div>
<div class="form-row">
<label for="gender">gender:<?php $row['gender']==='M'; ?></label>
<!--<input type="radio" name="newgender" value="<?php echo $row[gender]; ?>">-->
<input type="radio" id="opt1" name="newgender" value="M" <?php isCheckedMale($row['gender']); ?>  > <label for="opt1">Male</label>
<input type="radio" id="opt2" name="newgender" value="F" <?php isCheckedFemale($row['gender']); ?> > <label for="opt2">Female</label><br></div>

<!--<input type="radio" id="opt1" name="option" value="Description of Option One" required/>
<label for="opt1">Description of Option One</label>
<input type="radio" id="opt2" name="option" value="Description of Option Two" required/>
<label for="opt2">Description of Option Two</label>
-->
<div class="form-row">
<label for="Category_id">Category_id:</label>
<input type="text" name="newcategoryid" value="<?php echo $row['category_id']; ?>"></div>
<div class="form-row">
<label for="productimage">productimage:</label>
<input type="text" name="newimage" value="<?php echo $row['productimage']; ?>">
<input type="file" name="product" accept="image/*">
<input type="hidden" name="filename" id="filenamepath">
</div>
<div class="form-row">
<label for="product_id">product_id:</label>
<input type="text" name="id" value="<?php echo $row['product_id']; ?>">
</div>

<input type="submit" value=" Update " name="submit"/>

</form>
</body>
</html>
