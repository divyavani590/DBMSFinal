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
            <th>Order status</th>
        </tr>
    </thead>
    <tbody>
<?php
$conn = $db_handle->getNewConn();
$sql = "select orderid,email,total_amount from ictyaorder";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr data-toggle='modal' data-target='.bd-example-modal-lg'>";
        echo "<td >". $row['orderid'] ."</a> </td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>$" . $row['total_amount'] . "</td>";
        echo "<td>Completed</td>";
        echo "</tr>";
    }

} else {
    echo "no results";
}

?>
</tbody>
</table>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:30px;">
    <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="text-align:left;">Name</th>
        <th style="text-align:left;">Code</th>
        <th style="text-align:right;" width="5%">Quantity</th>
        <th style="text-align:right;" width="10%">Unit Price</th>
    </tr>
    </thead>
    <tbody>
</tbody>
</table>
    </div>
  </div>
</div>




