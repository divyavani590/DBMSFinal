<?php
include("session.php");
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
if(isset($_POST['submit'])){
$P_Name=$_POST['P_Name'];
$Price_perUnit=$_POST['Price_perUnit'];
$Order_in_quantity=$_POST['Order_in_quantity'];
if(isset($_POST['gender'])) {
	
    if($_POST['gender'] == 'male') {
		echo "male";
        $g='M';
    } elseif($_POST['gender'] == 'female') {
		echo "female";
       $g='F';
    }
}
echo "hi".$_POST['filename'];
 $target_path = "images/".$_POST['filename'];
 $Category_id=$_POST['Category_id'];
 
/*INSERT into ictya.product(P_Name,Price_perUnit,Order_in_quantity,gender,Category_id,productimage) values('peta jacket','20','4','F','2','images/coatm1');*/
$stmt=$conn->prepare("INSERT into products(
`product_desc`,
`product_qty`,
`productimage`,
`price`,
`category_id`,
`gender`) values(?,?,?,?,?,?)");

$stmt->bind_param('sisiis',$P_Name,$Order_in_quantity,$target_path,$Price_perUnit,$Category_id,$g);
/*$stmt->bind_param("s",$P_Name);
$stmt->bind_param("i",$Order_in_quantity);
$stmt->bind_param("s",$target_path);
$stmt->bind_param("i",$Price_perUnit);
$stmt->bind_param("i",$Category_id);
$stmt->bind_param("s",$g);*/
$stmt->execute();
    //$result = $stmt->get_result();
  // echo $result;
if ($stmt->affected_rows > 0) {
    
    echo "<p style='color:maroon;'>you have successfully added an event</p>";
		echo "<h2><center>Page re-directing to Events page</center></h2>";
		echo "<meta http-equiv='refresh' content='5;url=allproducts.php'>";
} else {
    echo "Error: ". $stmt->error;
}

mysqli_close($conn);


}
?>