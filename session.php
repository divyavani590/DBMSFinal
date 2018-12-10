<?php ob_start();session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(empty($_SESSION["is_logged"])) {
    session_unset();
    session_destroy();
    header("location:index.php");
}

if(empty($_SESSION["cart_item_count"])) {
    $_SESSION["cart_item_count"] = 0;
}
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":       
		if(!empty($_POST["quantity"])) {            
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE product_id='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["product_id"]=>array('product_id'=>$productByCode[0]["product_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'product_desc'=>$productByCode[0]["product_desc"], 'productimage'=>$productByCode[0]["productimage"]));
			
			if(!empty($_SESSION["cart_item"])) {               
				if(in_array($productByCode[0]["product_id"],array_keys($_SESSION["cart_item"]))) {                    
					foreach($_SESSION["cart_item"] as $k => $v) {
                        if($productByCode[0]["product_id"] == $k) {
                            if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                $_SESSION["cart_item"][$k]["quantity"] = 0;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
					}
				} else {
                    $_SESSION["cart_item"] = $_SESSION["cart_item"]+ $itemArray;
                    print_r($_SESSION["cart_item"]);
                    $_SESSION["cart_item_count"] += 1;
                   
				}
			} else {
                $_SESSION["cart_item"] = $itemArray;
                $_SESSION["cart_item_count"] += 1;                
            }          
        }
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
                if($_GET["code"] == $k)
                    unset($_SESSION["cart_item"][$k]);				
                if(empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);
            }
            $_SESSION["cart_item_count"] -= 1;
		}
	break;
	case "empty":
        unset($_SESSION["cart_item"]);
        $_SESSION["cart_item_count"] = 0;
	break;	
}
}
?>