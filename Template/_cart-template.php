<?php
ob_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['delete_frome_cart'])){
      
    
    $user_id = '111';
    $cart->delete_cart($_POST['item_id'],$user_id);
  
    }
}



$result = $product->getData('cart');?>


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['save_for_later_submit'])){
    $user_id = '111';
    $wish_list->add_to_wish_list($_POST['item_id'],$user_id);
    $cart->delete_cart($_POST['item_id'],$user_id);
  
    }
}
?>


   

<!-- Shopping cart section  -->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart item -->
                <?php
foreach ($result as $key){
   
    $val = $product->get_product($key['item_id'])??[];
    
    $product_sub[] = array_map(function($item){
     ?>
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'];?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'];?></h5>
                        <small>by <?php echo $item['item_brand'];?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                            
                            <form method="POST" action="">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                            <button type="submit" class="btn font-baloo text-danger px-3 border-right" name="delete_frome_cart" >Delete</button>
                            </form>
                            <form method = "POST" >
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                            <button type="submit" class="btn font-baloo text-danger" name="save_for_later_submit">Save for Later</button>

                            </form>
                           
                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price "  data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'];?></span>
                        </div>
                    </div>
                </div>
                <?php 
                return $item['item_price'];
            },$val);
            
            
        }
$sum = $cart->get_sum($product_sub??[]);
?>
               
            </div>
           
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (<?php echo count($product->getData('cart'));?>):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo $sum;?>
                        </span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>

            <!-- !subtotal section-->
        </div>
       
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->
