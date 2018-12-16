<?php include "session.php";?>
<?php
if (!empty($_FILES) && isset($_FILES['fileToUpload'])) {
    switch ($_FILES['fileToUpload']["error"]) {
        case UPLOAD_ERR_OK:
            $target = "images/";
            $target = $target . basename($_FILES['fileToUpload']['name']);

            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
                $status = "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded";
                $imageFileType = pathinfo($target, PATHINFO_EXTENSION);
                $check = getimagesize($target);
                if ($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".<br>";
                    $uploadOk = 1;
                } else {
                    // echo "File is not an image.<br>";
                    $uploadOk = 0;
                }

            } else {
                $status = "Sorry, there was a problem uploading your file.";
            }
            break;

    }
}
$conn = $db_handle->getNewConn();


if (isset($_POST['submit'])) {
    $P_Name = $_POST['P_Name'];
    $Price_perUnit = $_POST['Price_perUnit'];
    $Order_in_quantity = $_POST['Order_in_quantity'];
    if (isset($_POST['gender'])) {

        if ($_POST['gender'] == 'male') {
            echo "male";
            $g = 'M';
        } elseif ($_POST['gender'] == 'female') {
            echo "female";
            $g = 'F';
        }
    }
    echo "hi" . $_POST['filename'];
    $target_path = "images/" . $_POST['filename'];
    $Category_id = $_POST['Category_id'];

    $stmt = $conn->prepare("INSERT into products(
`product_desc`,
`product_qty`,
`productimage`,
`price`,
`category_id`,
`gender`) values(?,?,?,?,?,?)");

    $stmt->bind_param('sisiis', $P_Name, $Order_in_quantity, $target_path, $Price_perUnit, $Category_id, $g);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION["adminPage"] = 'allproducts';
		//echo "<p style='color:maroon;'>you have successfully added an event</p>";
		echo "<h2><center>Product added successfully</center></h2>";
        echo "<h2><center>Page re-directing to Products page</center></h2>";
        echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
    } else {
        echo "Error: " . $stmt->error;
    }

    mysqli_close($conn);

}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Add Product</title>

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
	  console.log(this.files[0].name);
	  $("#filenamepath").val(this.files[0].name);
  });
  </script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h2 align="center" style="color: maroon;">Add Product</h2>
<div id="form ">
<form action="addform.php" method="post" enctype="multipart/form-data" style="align:center">
<table class="table">
            <!-- <tr>
				<td>Product_Id:</td>
				<td><input type="text" name="Product_Id" disabled></td>
			</tr> -->
			<tr>
				<td >Product Name</td>
				<td><input type="text" name="P_Name"></td>
			</tr>
			<tr>
				<td>Product Image</td>
				<td><input type="hidden" name="MAX_FILE_SIZE" value="512000" />
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="hidden" name="filename" id="filenamepath"></td>
			</tr>
			<tr>
				<td>Price per Unit</td>
				<td><input type="text" name="Price_perUnit"></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="number" name="Order_in_quantity" min="1" max="500"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
				<input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female<br></td>
			</tr>
			<tr>
				<td>Category</td>
				<?php 
				$conn1 = $db_handle->getNewConn();
				$stmt = $conn1->prepare("SELECT * FROM category");
				$stmt->execute();
				$rows = $stmt->get_result(); ?>
				<td><select name="Category_id">
				<option name="Category_id"> Select Category</option>  
				<?php				

				while($row = $rows->fetch_assoc())
				{
					echo "<option value=".$row['Category_id'].">".$row['Category_name']."</option>";
				}
				?> 
					 
				</select> 

				
				<!-- <input type="text" name="Category_id"></td> -->
			</tr>

			<tr>
				<td ></td>
				<td>
				<input type="submit" name= "submit" value="Add Product" class=" btn btn-primary">
				<input type="submit" value="clear" class=" btn btn-secondary"></td>
			</tr>


		</table>

		</form>
		</div></div></div></div>

		<?php include 'footer.php'?>
</body>
</html>