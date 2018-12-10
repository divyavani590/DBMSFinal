<?php include("session.php");

if( isset($_GET['product_id']) )
	{
		$id = $_GET['product_id'];
		//echo $i;'$id'
		$conn = $db_handle->getNewConn();
		$stmt= $conn->prepare("DELETE FROM products WHERE product_id=?");
		$stmt->bind_param('i',$id);
//$stmt->execute();
		$stmt->execute();
		if ($stmt->affected_rows > 0){
		echo "<p style='color:maroon;'><center>Product is deleted</center></p>";
		echo "<h2><center>Page re-directing to admin page</center></h2>";
		echo "<meta http-equiv='refresh' content='5;url=admin.php'>";
		}
		else{
			printf("Error: %s.\n",$stmt->error);
		}
	$stmt->close();
	}

?>