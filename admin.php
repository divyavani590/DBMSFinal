<?php include('session.php');
 $action = filter_input(INPUT_POST, 'action');
 if($action == NULL){
     if($_SESSION["adminPage"] == NULL){
        $action = 'profile';
     }else{
        $action = $_SESSION["adminPage"];
     }
 }
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
		//echo "<p style='color:maroon;'><center>Product is deleted</center></p>";
		//echo "<h2><center>Page re-directing to admin page</center></h2>";
		echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
		}
		else{
			printf("Error: %s.\n",$stmt->error);
		}
	$stmt->close();
	}
 ?>
<html>
<head>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet">
<style>
    
table th {
    font-size: inherit; 
    font-weight: bold;
}
table td {
    font-size: inherit; 
}
.table .btn{
    padding:5px 10px;
}
    </style>
<style>
    .nav-side-menu {
    overflow: auto;
    font-family: verdana;
    font-size: 12px;
    font-weight: 200;
    background-color: #2e353d;
    position: fixed;
    top: 0px;
    height: 100%;
    color: #e1ffff;
    }
    .nav-side-menu .brand {
    background-color: #23282e;
    line-height: 50px;
    display: block;
    text-align: center;
    font-size: 14px;
    }
    .nav-side-menu .toggle-btn {
    display: none;
    }
    .nav-side-menu ul,
    .nav-side-menu li {
    list-style: none;
    padding: 0px;
    margin: 0px;
    line-height: 35px;
    cursor: pointer;
    }
    .nav-side-menu ul :not(collapsed) .arrow:before,
    .nav-side-menu li :not(collapsed) .arrow:before {
    font-family: FontAwesome;
    content: "\f078";
    display: inline-block;
    padding-left: 10px;
    padding-right: 10px;
    vertical-align: middle;
    float: right;
    }
    .nav-side-menu ul .active,
    .nav-side-menu li .active {
    border-left: 3px solid #d19b3d;
    background-color: #4f5b69;
    }
    .nav-side-menu ul .sub-menu li.active,
    .nav-side-menu li .sub-menu li.active {
    color: #d19b3d;
    }
    .nav-side-menu ul .sub-menu li.active a,
    .nav-side-menu li .sub-menu li.active a {
    color: #d19b3d;
    }
    .nav-side-menu ul .sub-menu li,
    .nav-side-menu li .sub-menu li {
    background-color: #181c20;
    border: none;
    line-height: 28px;
    border-bottom: 1px solid #23282e;
    margin-left: 0px;
    }
    .nav-side-menu ul .sub-menu li:hover,
    .nav-side-menu li .sub-menu li:hover {
    background-color: #020203;
    }
    .nav-side-menu ul .sub-menu li:before,
    .nav-side-menu li .sub-menu li:before {
    font-family: FontAwesome;
    content: "\f105";
    display: inline-block;
    padding-left: 10px;
    padding-right: 10px;
    vertical-align: middle;
    }
    .nav-side-menu li {
    padding-left: 0px;
    border-left: 3px solid #2e353d;
    border-bottom: 1px solid #23282e;
    }
    .nav-side-menu li a {
    text-decoration: none;
    color: #e1ffff;
    }
    .nav-side-menu li a i {
    padding-left: 10px;
    width: 20px;
    padding-right: 20px;
    }
    .nav-side-menu li:hover {
    border-left: 3px solid #d19b3d;
    background-color: #4f5b69;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
    }
    @media (max-width: 767px) {
    .nav-side-menu {
        position: relative;
        width: 100%;
        margin-bottom: 10px;
    }
    .nav-side-menu .toggle-btn {
        display: block;
        cursor: pointer;
        position: absolute;
        right: 10px;
        top: 10px;
        z-index: 10 !important;
        padding: 3px;
        background-color: #ffffff;
        color: #000;
        width: 40px;
        text-align: center;
    }
    .brand {
        text-align: left !important;
        font-size: 22px;
        padding-left: 20px;
        line-height: 50px !important;
    }
    }
    @media (min-width: 767px) {
    .nav-side-menu .menu-list .menu-content {
        display: block;
    }
    #main {
        width:calc(100% - 300px);
        float: right;
    }
    }

    body {
    margin: 0px;
    padding: 0px;
    }
    .hide{
        display: none!important;
    }

    .order-table.table-hover tbody tr:hover td, .order-table.table-hover tbody tr:hover th {
  background-color: #b8daff;
}

</style>
</head>
<body>

<input type="hidden" id="curraction" name="curraction" value="<?php echo $action; ?>">

<div class="container-fluid" style="padding-left:0px;" >
    <div class="row">
        <div class="col-md-3">
        <div class="nav-side-menu">
    <div class="brand">ICTYA</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i> Dashboard
                </a>
            </li>
            <form action="admin.php" method="post" name="profile">
            <li data-toggle="collapse" data-target="#products" class="collapsed <?php if($action == 'profile') { echo 'active'; } ?>">
                <a href="javascript:document.profile.submit()" ><i class="fa fa-gift fa-lg"></i> Profile <span class="arrow"></span></a>
                <input type="hidden" name="action" value="profile">
            </li>
            </form>

            <form action="admin.php" method="post" name="category" class="<?php if($_SESSION['groupId'] == 2){ echo 'hide'; } ?>" >
            <li data-toggle="collapse" data-target="#products" class="collapsed <?php if($action == 'category') { echo 'active'; } ?>">
                <a href="javascript:document.category.submit()" ><i class="fa fa-gift fa-lg"></i> Categeries <span class="arrow"></span></a>
                <input type="hidden" name="action" value="category">
            </li>
            </form>

            <form action="admin.php" method="post" name="employee_management" class="<?php if($_SESSION['groupId'] == 2){ echo 'hide';} ?>">
            <li data-toggle="collapse" data-target="#products" class="collapsed <?php if($action == 'employee_management') { echo 'active'; } ?>">
                <a href="javascript:document.employee_management.submit()" ><i class="fa fa-gift fa-lg"></i> Employee_Management <span class="arrow"></span></a>
                <input type="hidden" name="action" value="employee_management">
            </li>
            </form>

            <form action="admin.php" method="post" name="allproducts">
            <li data-toggle="collapse" data-target="#products" class="collapsed <?php if($action == 'allproducts') { echo 'active'; } ?>">
                <a href="javascript:document.allproducts.submit()" ><i class="fa fa-gift fa-lg"></i> Products <span class="arrow"></span></a>
                <input type="hidden" name="action" value="allproducts">
            </li>
            </form>

            <form action="admin.php" method="post" name="allorders">
            <li data-toggle="collapse" data-target="#products" class="collapsed <?php if($action == 'allorders') { echo 'active'; } ?>">
                <a href="javascript:document.allorders.submit()" ><i class="fa fa-gift fa-lg"></i> Orders <span class="arrow"></span></a>
                <input type="hidden" name="action" value="allorders">
            </li>
            </form>
            
            <li data-toggle="collapse" data-target="#products" class="collapsed">
                <a href="logout.php" ><i class="fa fa-gift fa-lg"></i> Logout <span class="arrow"></span></a>
            </li>

           
            </li>
            </li>
        </ul>
    </div>
</div>

        </div>

        <div class="col-md-9" style="padding-top:30px;">
        <?php 


switch($action){
    case 'profile':
        include('adminprofile.php');
        break;
    case 'category':
        include('Categories.php');
        break;
    case 'employee_management':
        include('Employee_Management.php');
        break;
    case 'allproducts':
        include('allproducts.php');
        break;
    case 'allorders':
        include('allorders.php');
        break;
    default: break;
}

?> 
        </div>
    </div>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/js/mdb.min.js"></script>
<script>
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $(document).on('keyup',"#search",function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
        var page = $('#curraction').val();
       //Validating, if "name" is empty.       
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "ajax.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                    page: page
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("table tbody").html(html);
               }
           });
       
   });

$(document).on('click',".order-table > tbody > tr",function() {
       //Assigning search box value to javascript variable named as "name".
       var orderid = $(this).find("td:first").text();
       //Validating, if "name" is empty.       
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "adminOrderHistory.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                    order: orderid
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $(".modal tbody").html(html);
               }
           });
       
   });

});
</script>
</body>
</html>