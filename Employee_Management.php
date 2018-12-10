<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$conn = $db_handle->connectDB();


if(!empty($_POST["email"])){


$email = $_POST["email"];
$orderid = mysqli_query($conn,"UPDATE userprofile  SET groupId = 1 where email='$email'");


}
$sql = "SELECT * FROM userprofile WHERE groupId = 2";
$result = $db_handle->runQuery($sql);

?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
          

                <!-- Table -->
                
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>group ID</th>
                        <th>Make Admin</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php
                    foreach($result as $row){ 
                        $email = $row["email"];
                        echo "<tr>";
                        echo "<td>". $row["Id"]."</td>";
                        echo "<td>" . $row["firstname"]. "</td>";
                        echo "<td>" . $row["lastname"]. "</td>";
                        echo "<td>" . $row["email"]. "</td>";
                        echo "<td>" . $row["phno"]. "</td>";
                        echo "<td>" . $row["address"]. "</td>" ;  
                        echo "<td>" . $row["groupId"]. "</td>" ; 
                        echo "<td><form action='admin.php' method='post'>
                        <input type='hidden' name='email' value='$email'><br>
                        <input type='submit'value='Make Admin' class='btn btn-primary'>
                        <input type='hidden' name='action' value='employee_management'/>
                    </form></td>"  ;
                        echo "</tr>";
                    }
                    ?>
                     <tbody>
                </table>
           
    </body>
</html>
