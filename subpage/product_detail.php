<div class="container">
			<div class="row">
				<div class="col-sm-3">
                    <?php require_once __DIR__."/category_menu.php";?>
				</div>
				<?php
                    $rs = $conn->query("SELECT * FROM `product` WHERE `product_id` = '{$_GET['id']}'");
                    $p = $rs->fetch_assoc();          
                ?>
                <div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/<?php echo $p["product_image"]; ?>" alt="" />
							
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php echo $p["product_name"]; ?></h2>
								<span>
									<span><?php echo number_format($p["product_price"],0); ?> VND</span>
									<form method="POST">
										<label>Quantity:</label>
										<input type="text" value="1" name="quantity"/>
										<button type="submit" class="btn btn-fefault cart" formaction="index.php?sub=addcart&id=<?php echo $p["product_id"]; ?>">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</form>
								</span>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
                                <p><?php echo $p["product_description"]; ?></p>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
				</div>

					
				</div>
			</div>
		</div>
