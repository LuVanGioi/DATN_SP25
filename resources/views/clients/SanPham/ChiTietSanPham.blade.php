@extends("clients.themes")

@section("title")
<title>Sản Phẩm - WD-14</title>
@endsection

@section('main')
<section class="page-section">
    <div class="container">
        <div class="row product-single">
            <div class="col-md-6">
                <div class="badges">
                    <div class="hot">Hot</div>
                </div>
                <div class="owl-carousel img-carousel">
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom" href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto">
                            <img class="img-responsive" src="images/product-1-big.jpg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom"
                            href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto"><i
                                class="fa fa-plus"></i></a>
                        <a href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto"><img
                                class="img-responsive" src="images/product-1-big.jpg" alt=""></a>
                    </div>
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom"
                            href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto"><i
                                class="fa fa-plus"></i></a>
                        <a href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto"><img
                                class="img-responsive" src="images/product-1-big.jpg" alt=""></a>
                    </div>
                    <div class="item">
                        <a class="btn btn-theme btn-theme-transparent btn-zoom"
                            href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto"><i
                                class="fa fa-plus"></i></a>
                        <a href="assets/img/preview/shop/product-1-big.jpg" data-gal="prettyPhoto"><img
                                class="img-responsive" src="images/product-1-big.jpg" alt=""></a>
                    </div>
                </div>
                <div class="row product-thumbnails">
                    <div class="col-xs-2 col-sm-2 col-md-3"><a href="#"
                            onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [0, 300]);"><img
                                src="images/product-thumb-1.jpg" alt=""></a></div>
                    <div class="col-xs-2 col-sm-2 col-md-3"><a href="#"
                            onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [1, 300]);"><img
                                src="images/product-thumb-2.jpg" alt=""></a></div>
                    <div class="col-xs-2 col-sm-2 col-md-3"><a href="#"
                            onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [2, 300]);"><img
                                src="images/product-thumb-3.jpg" alt=""></a></div>
                    <div class="col-xs-2 col-sm-2 col-md-3"><a href="#"
                            onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [3, 300]);"><img
                                src="images/product-thumb-4.jpg" alt=""></a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="back-to-category">
                    <span class="link"><i class="fa fa-angle-left"></i> Back to <a
                            href="category.html">Category</a></span>
                    <div class="pull-right">
                        <a class="btn btn-theme btn-theme-transparent btn-previous" href="#"><i
                                class="fa fa-angle-left"></i></a><!--
                                        --><a class="btn btn-theme btn-theme-transparent btn-next" href="#"><i
                                class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <h2 class="product-title">Standard Product Header Here</h2>
                <div class="product-rating clearfix">
                    <div class="rating">
                        <span class="star"></span><!--
                                        --><span class="star active"></span><!--
                                        --><span class="star active"></span><!--
                                        --><span class="star active"></span><!--
                                        --><span class="star active"></span>
                    </div>
                    <a class="reviews" href="#">16 reviews</a> | <a class="add-review" href="#">Add Your
                        Review</a>
                </div>
                <div class="product-availability">Availability: <strong>In stock</strong> 21 Item(s)</div>
                <hr class="page-divider small">

                <div class="product-price">$400.00</div>
                <hr class="page-divider">

                <div class="product-text">
                    <p>Etiam eu justo ut nisi sollicitudin bibendum. Fusce sed dui ac turpis vulputate
                        tincidunt vel sed magna. Pellentesque <strong>pretium</strong> mollis metus vel
                        feugiat. Cum sociis natoque penatibus <strong>et magnis</strong> dis parturient
                        montes, nascetur ridiculus mus. <strong>Vestibulum</strong> commodo mauris eget
                        sapien posuere, id <a href="#">efficitur mi tristique</a>.</p>
                    <ul>
                        <li>- Cras tristique neque a mauris volutpat, eget sodales neque elementum.</li>
                        <li>- Vestibulum iaculis velit sed dolor suscipit pretium.</li>
                        <li>- Etiam mattis risus id leo imperdiet tincidunt.</li>
                    </ul>
                </div>
                <hr class="page-divider">

                <form action="#" class="row variable">
                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect1">Size</label>
                            <select id="exampleSelect1" class="selectpicker input-price"
                                data-live-search="true" data-width="100%" data-toggle="tooltip"
                                title="Select">
                                <option>Select Your Size</option>
                                <option>Size 1</option>
                                <option>Size 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect2">Color</label>
                            <select id="exampleSelect2" class="selectpicker input-price"
                                data-live-search="true" data-width="100%" data-toggle="tooltip"
                                title="Select">
                                <option>Select Your Color</option>
                                <option>Color 1</option>
                                <option>Color 2</option>
                            </select>
                        </div>
                    </div>
                </form>
                <hr class="page-divider small">


                <div class="buttons">
                    <div class="quantity">
                        <button class="btn"><i class="fa fa-minus"></i></button>
                        <input class="form-control qty" type="number" step="1" min="1" name="quantity"
                            value="1" title="Qty">
                        <button class="btn"><i class="fa fa-plus"></i></button>
                    </div>
                    <button class="btn btn-theme btn-cart btn-icon-left" type="submit"><i
                            class="fa fa-shopping-cart"></i>Add to cart</button>
                    <button class="btn btn-theme btn-wish-list"><i class="fa fa-heart"></i></button>
                    <button class="btn btn-theme btn-compare"><i class="fa fa-exchange"></i></button>
                </div>

                <hr class="page-divider small">

                <table>
                    <tbody>
                        <tr>
                            <td class="title">Category:</td>
                            <td>Men Dress</td>
                        </tr>
                        <tr>
                            <td class="title">Product Code:</td>
                            <td>PS08</td>
                        </tr>
                        <tr>
                            <td class="title">Tags:</td>
                            <td>Fashion - clothes - Dress - Men - jean</td>
                        </tr>
                    </tbody>
                </table>
                <hr class="page-divider small">

                <ul class="social-icons list-inline">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                </ul>

            </div>
        </div>

    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section md-padding">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-gift"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Buy 1 Get 1</h4>
                            Proin dictum elementum velit. Fusce euismod consequat ante.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-comments"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Call to Free</h4>
                            Proin dictum elementum velit. Fusce euismod consequat ante.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-trophy"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Money Back!</h4>
                            Proin dictum elementum velit. Fusce euismod consequat ante.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <div class="tabs-wrapper content-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#item-description" data-toggle="tab">Item Description</a></li>
                <li><a href="#reviews" data-toggle="tab">Reviews (2)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="item-description">
                    <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare
                        massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas.
                        Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis,
                        feugiat sodales ipsum consectetur nec. </p>
                    <p>Morbi imperdiet lacus nec ante blandit, sit amet fermentum magna faucibus. Nunc nec
                        libero id urna vulputate venenatis. Aenean vulputate odio felis, in rhoncus sapien
                        auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh.
                        Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu
                        bibendum molestie vel et metus. Aenean iaculis purus et velit iaculis, nec convallis
                        ipsum ornare. Integer a orci enim.</p>
                </div>
                <div class="tab-pane fade" id="reviews">

                    <div class="comments">
                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="images/avatar-1.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta"><span class="comment-author"><a href="#">User Name
                                            Here</a> <span class="comment-date"> 26 days ago <i
                                                class="fa fa-flag"></i></span></span></p>
                                <p class="comment-text">Donec ullamcorper nulla non metus auctor fringilla.
                                    Etiam porta sem malesuada magna mollis euismd. Curabitur blandit tempus
                                    porttitor. Integer posuere erat a ante venenatis dapibus posuere.</p>
                            </div>
                        </div>
                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="images/avatar-3.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta"><span class="comment-author"><a href="#">User Name
                                            Here</a> <span class="comment-date"> 26 days ago <i
                                                class="fa fa-flag"></i></span></span></p>
                                <p class="comment-text">Donec ullamcorper nulla non metus auctor fringilla.
                                    Etiam porta sem malesuada magna mollis euismd. Curabitur blandit tempus
                                    porttitor. Integer posuere erat a ante venenatis dapibus posuere.</p>
                            </div>
                        </div>
                    </div>
                    <div class="comments-form">
                        <h4 class="block-title">Add a Review</h4>
                        <form method="post" action="#" name="comments-form" id="comments-form">
                            <div class="form-group"><input type="text" placeholder="Your name and surname"
                                    class="form-control" title="comments-form-name"
                                    name="comments-form-name"></div>
                            <div class="form-group"><input type="text" placeholder="Your email adress"
                                    class="form-control" title="comments-form-email"
                                    name="comments-formemail"></div>
                            <div class="form-group"><textarea placeholder="Your message"
                                    class="form-control" title="comments-form-comments"
                                    name="comments-form-comments" rows="6"></textarea></div>
                            <div class="form-group"><button type="submit"
                                    class="btn btn-theme btn-theme-transparent btn-icon-left" id="submit"><i
                                        class="fa fa-comment"></i> Review</button></div>
                        </form>
                    </div>
                    <!-- // -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <h2 class="section-title section-title-lg"><span>Related Products</span></h2>
        <div class="featured-products-carousel">
            <div class="owl-carousel" id="featured-products-carousel">
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-1.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-2.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-3.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-4.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-1.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-2.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-3.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <img src="images/product-4.jpg" alt="">
                            <span class="icon-view">
                                <strong><i class="fa fa-eye"></i></strong>
                            </span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title">Standard Product Header</h4>
                        <div class="rating">
                            <span class="star"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span><!--
                                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                    class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                    class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                    class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="page-divider half">
        <a class="btn btn-theme btn-view-more-block" href="#" style="max-width: 100%;">View More</a>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <h2 class="section-title"><span>Brand & Clients</span></h2>
        <div class="partners-carousel">
            <div class="owl-carousel" id="partners">
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/brand-logo.jpg" alt=""></a></div>
            </div>
        </div>
    </div>
</section>
@endsection