<?php
$carts = (new \Http\Controller\CartController())->index();
$total = 0;
$total_quantity = array_sum(array_column($carts, "quantity"));
//var_dump($carts);
?>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="/View/Frontend/App/img/core-img/bag.svg" alt=""> <span><?= $total_quantity ?></span></a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            <!-- Single Cart Item -->
            <?php foreach ($carts as $key => $cart): ?>

                <div class="single-cart-item">
                    <?php
                    $total += $cart['price'] * $cart['quantity'];
                    $image = unserialize($cart['image']);
                    ?>
                    <form method="post" action="/cart/delete" id="">
                        <input type="hidden" name="id" value="<?= $cart['product_id'] ?>">
                        <button type="submit" class="product-image">
                            <img src="/storage/shop/<?= $image[0] ?>" class="cart-thumb" alt="">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge"><?= $cart['name'] ?></span>
                                <h6>Quantity: <?= $cart['quantity'] ?></h6>
                                <p class="size">Size: <?= $cart['size'] ?></p>
                                <p class="color">Color: <?= $cart['color'] ?></p>
                                <p class="price">$<?= $cart['price'] ?></p>
                            </div>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Summary</h2>
            <ul class="summary-table">
                <li><span>subtotal:</span> <span><?= $total ?></span></li>
                <li><span>delivery:</span> <span>Free</span></li>
                <!--                <li><span>discount:</span> <span>-15%</span></li>-->
                <li><span>total:</span> <span><?= $total ?></span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="checkout.html" class="btn essence-btn">check out</a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Right Side Cart End ##### -->