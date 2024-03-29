<?php
include __DIR__.'/procted/message.php';
?>

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="img/product-img/product-1.jpg" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <span class="badge">Mango</span>
                        <h6>Button Through Strap Mini Dress</h6>
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p>
                        <p class="price">$45.00</p>
                    </div>
                </a>
            </div>

            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="img/product-img/product-2.jpg" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <span class="badge">Mango</span>
                        <h6>Button Through Strap Mini Dress</h6>
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p>
                        <p class="price">$45.00</p>
                    </div>
                </a>
            </div>

            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="img/product-img/product-3.jpg" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <span class="badge">Mango</span>
                        <h6>Button Through Strap Mini Dress</h6>
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p>
                        <p class="price">$45.00</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Summary</h2>
            <ul class="summary-table">
                <li><span>subtotal:</span> <span>$<?= $data ?></span></li>
                <li><span>delivery:</span> <span>Free</span></li>
<!--                <li><span>discount:</span> <span>-15%</span></li>-->
                <li><span>total:</span> <span><?= $data ?></span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="checkout.html" class="btn essence-btn">check out</a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(/View/Frontend/App/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<form action="/checkout/create" method="post">
<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Billing Address</h5>
                    </div>


                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="first_name">First Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" id="first_name" value="" required>
                            </div>

<!--                            <div class="col-12 mb-3">-->
<!--                                <label for="country">Country <span>*</span></label>-->
<!--                                <select class="w-100" id="country">-->
<!--                                    <option value="usa">United States</option>-->
<!--                                    <option value="uk">United Kingdom</option>-->
<!--                                    <option value="ger">Germany</option>-->
<!--                                    <option value="fra">France</option>-->
<!--                                    <option value="ind">India</option>-->
<!--                                    <option value="aus">Australia</option>-->
<!--                                    <option value="bra">Brazil</option>-->
<!--                                    <option value="cana">Canada</option>-->
<!--                                </select>-->
<!--                            </div>-->
                            <div class="col-12 mb-3">
                                <label for="street_address">Address <span>*</span></label>
                                <input type="text" name="address" class="form-control mb-3" id="street_address" value="">
                                <input type="text"  name="address2" class="form-control" id="street_address2" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="postcode">Postcode <span>*</span></label>
                                <input type="text" name="postcode" class="form-control" id="postcode" value="">
                            </div>
<!--                            <div class="col-12 mb-3">-->
<!--                                <label for="city">Town/City <span>*</span></label>-->
<!--                                <input type="text" class="form-control" id="city" value="">-->
<!--                            </div>-->
<!--                            <div class="col-12 mb-3">-->
<!--                                <label for="state">Province <span>*</span></label>-->
<!--                                <input type="text" class="form-control" id="state" value="">-->
<!--                            </div>-->
                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <span>*</span></label>
                                <input type="number" name="phone" class="form-control" id="phone_number" min="0" value="">
                                <input hidden="hidden" type="number" class="form-control" id="" name="price" value="<?= $data?>">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control" id="email_address" value="">
                            </div>

                            <!--                            <div class="col-12">-->
                            <!--                                <div class="custom-control custom-checkbox d-block mb-2">-->
                            <!--                                    <input type="checkbox" class="custom-control-input" id="customCheck1">-->
                            <!--                                    <label class="custom-control-label" for="customCheck1">Terms and conitions</label>-->
                            <!--                                </div>-->
                            <!--                                <div class="custom-control custom-checkbox d-block mb-2">-->
                            <!--                                    <input type="checkbox" class="custom-control-input" id="customCheck2">-->
                            <!--                                    <label class="custom-control-label" for="customCheck2">Create an accout</label>-->
                            <!--                                </div>-->
                            <!--                                <div class="custom-control custom-checkbox d-block">-->
                            <!--                                    <input type="checkbox" class="custom-control-input" id="customCheck3">-->
                            <!--                                    <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>

                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Your Order</h5>
                        <p>The Details</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Product</span> <span>Total</span></li>
                        <li><span>Cocktail Yellow dress</span> <span>$<?= $data ?></span></li>
                        <li><span>Subtotal</span> <span>$<?= $data ?></span></li>
                        <li><span>Shipping</span> <span>Free</span></li>
                        <li><span>Total</span> <span>$<?= $data ?></span></li>
                    </ul>

<!--                    <div id="accordion" role="tablist" class="mb-4">-->
<!--                        <div class="card">-->
<!--                            <form role="form" action="/checkout/create" method="post">-->
<!--                            <div class="card-header" role="tab" id="headingOne">-->
<!--                                <h6 class="mb-0">-->
<!--                                    <button type="submit" class="btn" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Stripe</button>-->
<!--                                </h6>-->
<!--                            </div>-->
<!--                            </form>-->
<!---->
<!---->
<!--                            <div class="card-header" role="tab" id="headingOne">-->
<!--                                <h6 class="mb-0">-->
<!--                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>-->
<!--                                </h6>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->

                        <div class="col-12 mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" value="1" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                   Online Payment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" value="0" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Cash On Delivery
                                </label>
                            </div>
                    </div>


                        <button type="submit" class="btn essence-btn">Place Order</button>
                </div>

                </div>
        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->
</div>
</form>