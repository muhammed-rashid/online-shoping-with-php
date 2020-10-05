<!-- New Phones -->
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>

        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
        <?php foreach ($data as $key){?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="product.php?product_id=<?php echo $key['item_id'];?>"><img src="<?php echo $key['item_image'];?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo $key['item_name'];?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $key['item_price'];?></span>
                        </div>
                        <form action="" method="POST">
                            <input type="hidden" name="item_id" value="<?php echo $key['item_id'];?>">
                            <input type="hidden" name="user_id" value="111">

                            <?php if(in_array($key['item_id'],$cart->get_cart_id('111'))){
                                echo '<button type="submit"disabled class="btn btn-success font-size-12" >already in cart</button>';
                            }else{
                                echo'<button type="submit" class="btn btn-warning font-size-12" name="spesial_price_submit">Add to Cart</button>';
                            }
                           
                            
                            ?>
                            
                            </form>
                    </div>
                </div>
            </div>



      <?php  }?>
        </div>
        <!-- !owl carousel -->

    </div>
</section>
<!-- !New Phones -->