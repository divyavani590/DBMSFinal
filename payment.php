<?php include('header.php'); ?>
<html>  
<head>
<title>ICTYA Collections</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" />
</head>
<body>

<form action="conf.php">
    <div class="container" style="margin-top:100px;">
<div class="row">
    <div class="col-md-4 col-md-offset-4">
<table class="table table-striped table-bordered order-table table-hover" cellpadding="10" cellspacing="1">

<tbody>
    <tr>
        <td>Email:</td><td><?php echo $_SESSION['email'] ?></td></tr>
        <tr>  <td>Total Price:</td><td><?php echo "$".$_SESSION["total_price"]  ?></td></tr>
        <tr>   <td>Make Payment:</td><td><input type="submit" value="Pay" class="btn btn-success"/></td></tr>

</tbody>
</table>

</form>
</div>
</div>
</div>

<?php include('footer.php') ?>
</body>
</html>