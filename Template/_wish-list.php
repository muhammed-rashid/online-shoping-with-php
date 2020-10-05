<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
   if(isset($_POST['delete_frome_wish'])){
       $user_id = '111';
       $wish_list->delete_wish($_POST['item_id'],$user_id);
   }
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['save_for_later_cart'])){
        $user_id = '111';
        $cart->addtocart($_POST['item_id'],$user_id);
        $wish_list->delete_wish($_POST['item_id'],$user_id);

    }

}?>

<section id="cart" class="py-3">
                    <div class="container-fluid w-75">
                        <h5 class="font-baloo font-size-20">Wish List</h5>

                        <!--  shopping cart items   -->
                            <div class="row">
                                <div class="col-sm-9">
<?php
$user_id = '111';
$result = $wish_list ->get_wish_list($user_id);

foreach($result as $key){
    //var_dump($key['item_id']);
    $result = $product->get_product($key['item_id']);
    foreach($result as $key){
        ?>

<div class="row border-top py-3 mt-3">
                                        <div class="col-sm-2">
                                            <img src="<?php echo $key['item_image'];?>" style="height: 120px;" alt="cart1" class="img-fluid">
                                        </div>
                                        <div class="col-sm-8">
                                            <h5 class="font-baloo font-size-20"><?php echo $key['item_name'];?></h5>
                                            <small>by <?php echo $key['item_brand'];?></small>
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

                                           

                                        </div>

                                        <div class="col-sm-2 text-right">
                                            <div class="font-size-20 text-danger font-baloo">
                                                $<span class="product_price"><?php echo $key['item_price'];?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" action="">
                            <input type="hidden" name="item_id" value="<?php echo $key['item_id'];?>">
                            <button type="submit" class="btn font-baloo text-danger px-3 border-right" name="delete_frome_wish" >Delete</button>
                            </form>
                            <form method = "POST" >
                                <input type="hidden" name="item_id" value="<?php echo $key['item_id'];?>">
                            <button type="submit" class="btn font-baloo text-danger" name="save_for_later_cart">Add to cart</button>

                            </form>



 <?php   }
}

?>


                                   
                                    <!-- cart item -->
                                    
                                <!-- !cart item -->
                                </div>
                                <!-- subtotal section-->
                               
                                <!-- !subtotal section-->
                            </div>
                        <!--  !shopping cart items   -->
                    </div>
                </section>