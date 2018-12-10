<html>
<body>


</body>
</html>
<?php 

require_once("dbcontroller.php");
$db_handle = new DBController();
$conn = $db_handle->connectDB();


if(!empty($_POST["category_name"])){


$category = $_POST["category_name"];
$orderid = mysqli_query($conn,"INSERT INTO category(Category_name) values ('$category')");


}
$sql = "SELECT * FROM category";
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
                
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                    </tr>   
</thead>
<tbody>
                    <?php
                    foreach($result as $row){ 
                        echo "<tr>";
                        echo "<td>". $row["Category_id"]."</td>";
                        echo "<td>" . $row["Category_name"]. "</td>";   
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
         

          <form action="admin.php" method="post">
                <div class="panel panel-default">
                
                    <div class="panel-heading">Add Category</div>
                    <div class="panel-body">
                    Category Name: <input type="text" name="category_name"><input type="hidden" name="action" value="category" />
                    <input type="submit" value="Add" class="btn btn-primary">
                    
                    </div>
                    

            </div>
            </form>
    </body>
</html>

