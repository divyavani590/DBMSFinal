
<?php
$email = $_SESSION['email'];
$sql = "SELECT Id, firstname, lastname, email, UserId, phno, address  FROM userprofile WHERE email='$email'";
$result = $db_handle->runQuery($sql);?>
<table class="table table-striped table-bordered">
<thead>
		<tr>
			<th>ID</th>
			<th>firstname</th>
			<th>lastname</th>
			<th>email</th>
			<th>UserId</th>
			<th>phno</th>
			<th>address</th>

        </tr>
</thead>
<tbody>
<?php
    foreach($result as $row){ 
        echo "<tr>";
        echo "<td>". $row['Id']."</td>";
        echo "<td>". $row['firstname']."</td>";
        echo "<td>". $row['lastname']."</td>";
        echo "<td>". $row['email']."</td>";
        echo "<td>". $row['UserId']."</td>";
        echo "<td>". $row['phno']."</td>";
        echo "<td>". $row['address']."</td>";

    echo"</tr>";   
    
    
    }
?>
</tbody>
</table>