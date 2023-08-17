<?php
if(!isset($_SESSION['user'])){
    echo '<meta http-equiv="Refresh" content="0; url=index.php?sub=login">';
}
if(isset($_GET["action"])){
    switch ($_GET["action"]){
        case "delete":
            unset($_SESSION['cart']["{$_GET["id"]}"]);
            break;
        case "up":
            if(isset($_SESSION['cart']["{$_GET["id"]}"])){
                $_SESSION['cart']["{$_GET["id"]}"]["quantity"]+=1;
            }
            break;
        case "down":
            if(isset($_SESSION['cart']["{$_GET["id"]}"])){
                $_SESSION['cart']["{$_GET["id"]}"]["quantity"]-=1;
                if($_SESSION['cart']["{$_GET["id"]}"]["quantity"]<=0){
                    unset($_SESSION['cart']["{$_GET["id"]}"]);
                }
            }
            break;
    }
    echo '<meta http-equiv="Refresh" content="0; url=index.php?sub=cart">';
}
?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
  
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        $total = 0;
                        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
                            echo "<tr><td colspan=5>No product in Cart</td></tr>";
                        }
                        else
                        foreach($_SESSION['cart'] as $id => $item){
                            $p = $item["p"];
                            $quantity = $item["quantity"];
                            $total+=$p["product_price"]*$item["quantity"];
                    ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img width="100" src="admin/<?php echo $p["product_image"]; ?>" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="#"><?php echo $p["product_name"]; ?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p><?php echo number_format($p["product_price"],0); ?> VND</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" href="?sub=cart&action=down&id=<?php echo $id;?>"> - </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $quantity;?>" autocomplete="off" size="2" readonly="readonly" >
                                <a class="cart_quantity_up" href="?sub=cart&action=up&id=<?php echo $id;?>"> + </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php  echo number_format($quantity*$p["product_price"],0); ?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="?sub=cart&action=delete&id=<?php echo $id;?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr><td colspan="5"><h3 class='text-right text-primary'>Total: <?php echo number_format($total,0);?> VND</h3></td></tr>
                    
                    <tr><td colspan="5"><a href="index.php" class="btn btn-primary">Continue to buy</a></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <!-- <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div> -->
        <div class="row">
            
            <div class="col-sm-6">
                <div class="total_area">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form action="index.php?sub=checkout" method="POST">
                            <input type="text" name="address" placeholder="Input address">
                            <button type="submit" class="btn btn-primary" name="btnCheckout">Checkout</button>
                        </form>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->