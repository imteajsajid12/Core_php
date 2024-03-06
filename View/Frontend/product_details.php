<?php
/** @var array $data */
$imagess = $data['image'];
$datas = unserialize($imagess);
?>
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            <?php foreach ($datas as $image) : ?>
                <img src="/storage/shop/<?= $image ?>" alt="">
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <span>mango</span>
        <a href="cart.html">
            <h2><?= $data['name'] ?>
        </a>
        <p class="product-price"><span class="old-price"><?= $data['price'] ?></span> <?= $data['new_price'] ?></p>
        <p class="product-desc"><?= $data['details'] ?></p>

        <!-- Form -->
        <form class="cart-form clearfix" method="post" action="/shop/cart">
            <div class="select-box d-flex mt-50 mb-30">
                <h5 class="mr-3" for="quantity">Quantity:</h5>
                <input type="number" class="form-control" id="quantity" name="quantity" value="1">
                <input hidden="hidden" type="number" class="form-control" id="id" name="id" value="<?= $data['id'] ?>">

            </div>
            <!-- Select Box -->
            <div class="select-box d-flex mt-50 mb-30">
                <h5 class="mr-3">size:</h5>
                <select name="size"  id="productSize" class="mr-5">
                    <option value="value">XL</option>
                    <option value="value">X</option>
                    <option value="value"> M</option>
                    <option value="value"> S</option>
                </select>
                <h5 class="mr-3">color:</h5>
                <select name="color" id="productColor">
                    <option value="value">Black</option>
                    <option value="value"> White</option>
                    <option value="value"> Red</option>
                    <option value="value">Purple</option>
                </select>
            </div>
            <!-- Cart & Favourite Box -->
            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->
                <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                <!-- Favourite -->
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->
