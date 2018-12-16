<?php include "session.php";
if($_SESSION["groupId"] == 3)
{
   header("location:userhome.php");
}
$conn = $db_handle->getNewConn();
if (isset($_POST['submit'])) {

    $id = $_POST['prod_id'];
    $newName = $_POST['newName'];
    $newprice = $_POST['newprice'];
    $neworder = $_POST['neworder'];
    $newgender = $_POST['newgender'];
    $newcategoryid = $_POST['newcategoryid'];
	$target_path = "images/" . $_POST['filename'];
	
	echo $newName ;
	echo $id;
	echo  $newprice;
	echo $neworder ;
	echo $newgender;
	echo $target_path;
//$newimage=$_POST['newimage'];
    //$newfee=$_POST['newfee'];
    /*$sql = "UPDATE products SET product_desc='$newName',price='$newprice',product_qty='$neworder',gender='$newgender',category_id='$newcategoryid',productimage='$target_path' WHERE product_id='$id'";*/
    $conn = $db_handle->getNewConn();
    $stmt = $conn->prepare("UPDATE products SET product_desc=?,price=?,product_qty=?,gender=?,category_id=?,productimage=? WHERE product_id=?");
    $stmt->bind_param('siisisi', $newName, $newprice, $neworder, $newgender, $newcategoryid, $target_path, $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<p style='color:maroon;'>you action is successfully completed</p>";
		echo "<h2><center>Page re-directing to Events page</center></h2>";
		echo ' <input type="hidden" name="action" value="allproducts">';
        echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
    } else {
        printf("Error: %s.\n", $stmt->error);
    }
    $stmt->close();

}
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    //$res= mysqli_query($conn,);
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    //$row= mysqli_fetch_array($res);
    $rows = $stmt->get_result();
    $row = $rows->fetch_assoc();
    //print_r($row);
}
function isCheckedMale($gender)
{

    if ($gender == 'M') {
        echo "checked";
    }
}
function isCheckedFemale($gender)
{
    if ($gender == 'F') {
        echo "checked";
    }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>password update</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" />
<style>
.table-borderless td,
.table-borderless th {
    border: 0;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	border: 0;
}
.table td{
	white-space: nowrap;
}
</style>

<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <script>
  $(document).on('change', 'input[type=file]',function(){
	  $("#filenamepath").val(this.files[0].name);
  });
  $(document).on('ready',function(){
	  $("#filenamepath").val($("#newimage").val());
  });
  </script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h2 align="center" style="color: maroon;">Product-Edit</h2>
<div id="form ">
<form action="editgetpro.php" method="post" enctype="multipart/form-data" style="align:center">
<table class="table">
            <!-- <tr>
				<td>Product_Id:</td>
				<td><input type="text" name="Product_Id" disabled></td>
			</tr> -->
			<tr>
			<td >Product Id</td>
			<td><input type="text" disabled="disabled" value="<?php echo $row['product_id']; ?>">
			<input type="hidden" name="prod_id" value="<?php echo $row['product_id']; ?>"></td>
			</tr>
			<tr>
				<td >Product Name</td>
				<td><input type="text" name="newName" value="<?php echo $row['product_desc']; ?>"></td>
			</tr>
			<tr>
				<td>Product Image</td>
				<td><input type="text" id="newimage" name="newimage" value="<?php echo $row['productimage']; ?>">
	<input type="file" name="product" accept="image/*">
	<input type="hidden" name="filename" id="filenamepath"></td>
			</tr>
			<tr>
				<td>Price per Unit</td>
				<td><input type="text" name="newprice" value="<?php echo $row['price']; ?>"></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="number" name="neworder" value="<?php echo $row['product_qty']; ?>"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
				<label for="gender"><?php $row['gender'] === 'M';?></label>
<!--<input type="radio" name="newgender" value="<?php echo $row[gender]; ?>">-->
<input type="radio" id="opt1" name="newgender" value="M" <?php isCheckedMale($row['gender']);?>  > <label for="opt1">Male</label>
<input type="radio" id="opt2" name="newgender" value="F" <?php isCheckedFemale($row['gender']);?> > <label for="opt2">Female</label><br></td>
			</tr>
			<tr>
				<td>Category</td>
				<?php 
				$conn1 = $db_handle->getNewConn();
				$stmt = $conn1->prepare("SELECT * FROM category");
				$stmt->execute();
				$rows = $stmt->get_result(); ?>
				<td><select name="newcategoryid">
				<option > Select Category</option>  
				<?php				

				while($row1 = $rows->fetch_assoc())
				{ ?>
					<option value="<?php echo $row1['Category_id'] ?>" <?= $row1['Category_id'] == $row['category_id'] ? ' selected="selected"' : '';?> ><?php echo $row1['Category_name'] ?></option>
				<?php }
				?> 
					 
				</select> 
			</tr>
			
			<tr>
				<td ></td>
				<td>
				<input type="submit" name= "submit" value="Update Product" class=" btn btn-primary"></td>
			</tr>


		</table>

		</form>
		</div></div></div></div>



		<?php include 'footer.php'?>
</body>
</html>
