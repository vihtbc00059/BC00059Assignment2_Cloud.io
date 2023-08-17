<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php require_once __DIR__."/category_menu.php";?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        <?php
							$rs = null;
							if(isset($_GET['type'])){
								$rs = $conn->query("SELECT * FROM `product` WHERE product_type='{$_GET['type']}'");
							}
							else
                            	$rs = $conn->query("SELECT * FROM `product`");
                            while($p = $rs->fetch_assoc()){          
                        ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="?sub=detail&id=<?php echo $p["product_id"]; ?>">
                                                    <img src="admin/<?php echo $p["product_image"]; ?>" height="200px" alt="" />
                                                    <h2><?php echo number_format($p["product_price"],0); ?> VND</h2>
                                                    <p><?php echo $p["product_name"]; ?></p>
                                                </a>
                                                <a href="index.php?sub=addcart&id=<?php echo $p["product_id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
						
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
