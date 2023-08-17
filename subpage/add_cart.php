<?php
    if(isset($_GET['id'])){
        $rs = $conn->query("SELECT * FROM `product` WHERE `product_id` = '{$_GET['id']}'");
        $quantity = isset($_POST["quantity"])?$_POST["quantity"]:1;

        if($rs->num_rows == 1){
            $p = $rs->fetch_assoc();
            $id = $_GET['id'];
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = ["{$id}"=>["p"=>$p, "quantity"=> $quantity]];
            }else{
                if(isset($_SESSION['cart']["{$id}"])){
                    $_SESSION['cart']["{$id}"]["quantity"] +=  $quantity;
                }else{
                    $cart = $_SESSION['cart'];
                    $cart["{$id}"] = ["p"=>$p, "quantity"=> $quantity];
                    $_SESSION['cart'] = $cart;
                }
            }
        }
    }
?>
<meta http-equiv="Refresh" content="0; url=index.php?page=Cart">