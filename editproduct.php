<?php
include("session.php");
$conn = $db_handle->connectDB();

	if( isset($_POST['submit']) )
	{
		
		$id = $_POST['id'];
		$newName=$_POST['newName'];
$newprice=$_POST['newprice'];
$neworder=$_POST['neworder'];
$newgender=$_POST['newgender'];
$newcategoryid=$_POST['newcategoryid'];
 $target_path = "images/".$_POST['filename'];
//$newimage=$_POST['newimage'];
//$newfee=$_POST['newfee'];
	/*$sql = "UPDATE products SET product_desc='$newName',price='$newprice',product_qty='$neworder',gender='$newgender',category_id='$newcategoryid',productimage='$target_path' WHERE product_id='$id'";*/
		$conn = $db_handle->getNewConn();
		$stmt= $conn->prepare("UPDATE products SET product_desc=?,price=?,product_qty=?,gender=?,category_id=?,productimage=? WHERE product_id=?");
		$stmt->bind_param('siisisi',$newName,$newprice,$neworder,$newgender,$newcategoryid,$target_path,$id);
		$stmt->execute();
		if ($stmt->affected_rows > 0){ 
		echo "<p style='color:maroon;'>you action is successfully completed</p>";
		echo "<h2><center>Page re-directing to Events page</center></h2>";
		echo "<meta http-equiv='refresh' content='5;url=allproducts.php'>";
		}
		else{
			printf("Error: %s.\n",$stmt->error);
		}
		$stmt->close();

	}
 //mysqli_close($conn);
?>