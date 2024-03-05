
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <!-- ##### Right Side Cart End ##### -->
    <?php
    include(__DIR__ . '/procted/cart.php');
    ?>


    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(/View/Frontend/App/img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2>New Collection</h2>
                        <a href="#" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/View/Frontend/App/img/bg-img/bg-2.jpg);">
                        <div class="catagory-content">
                            <a href="#">Clothing</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/View/Frontend/App/img/bg-img/bg-3.jpg);">
                        <div class="catagory-content">
                            <a href="#">Shoes</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/View/Frontend/App/img/bg-img/bg-4.jpg);">
                        <div class="catagory-content">
                            <a href="#">Accessories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(/View/Frontend/App/img/bg-img/bg-5.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="#" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="/View/Frontend/App/img/product-img/product-1.jpg" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="/View/Frontend/App/img/product-img/product-2.jpg" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php foreach ($products as $product) : ?>
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->

                            <?php $imagess = $product['image'];
                            $data = unserialize($imagess);
                            ?>
                            <div class="product-img">
                                <img src="/storage/shop/<?= $data[0] ?>" alt="" style="height: 350px">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="/storage/shop/<?= $data[1] ?>" alt=""  style="height: 350px">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <a href="/product_details?id=<?= $product['id'] ?>">
                                        <?= $product['name'] ?>
                                </a>
                                    <p class="product-price"><span
                                                class="old-price" style="color: red"><?= $product['price'] ?></span> <?= $product['new_price'] ?>
                                    </p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <form method="post" action="/shop/cart">
                                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                            <input type="hidden" name="color" value="<?= $product['color'] ?>">
                                            <input type="hidden" name="size" value="<?= $product['size'] ?>">

                                            <div class="add-to-cart-btn">
                                                <input hidden="hidden" type="text" value="1" name="quantity">
                                                <button href="" class="btn essence-btn">Add to Cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="/View/Frontend/App/img/core-img/brand1.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="/View/Frontend/App/img/core-img/brand2.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="/View/Frontend/App/img/core-img/brand3.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="/View/Frontend/App/img/core-img/brand4.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="/View/Frontend/App/img/core-img/brand5.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="/View/Frontend/App/img/core-img/brand6.png" alt="">
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->
