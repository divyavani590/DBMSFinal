<html>
<head>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<div class="row">
<div class="col-md-6">
 <input type="text" id="search" placeholder="Search" style="margin:20px 0px;"/>
</div>

</div>
    <table class="table table-striped table-bordered order-table table-hover ">
    <thead>
        <tr>
            <th>Order Id</th>
            <th>email</th>
            <th>Total Price</th>
            <th>Payment Status</th>
        </tr>
    </thead>
    <tbody>
<?php
$conn = $db_handle->getNewConn();
$sql = "select orderid,total_price,email from payment";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr data-toggle='modal' data-target='.bd-example-modal-lg'>";
        echo "<td >". $row['orderid'] ."</a> </td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>$" . $row['total_price'] . "</td>";
        echo "<td>Payment Successfull</td>";
        echo "</tr>";
    }

} else {
    echo "no results";
}

?>
</tbody>
</table>





