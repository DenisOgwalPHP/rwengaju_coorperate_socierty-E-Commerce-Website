<div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Product Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop single section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <!-- Images slider -->
                                <div class="flexslider-thumbnails">

                                <div class="flex-viewport" style="position: relative;">
                                    <ul class="slides" >
                                        {{-- <li data-thumb="{{ asset('images/products') }}/{{ $product->image }}"  style="width: 500.5px; float: left; display: block;">
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                        </li> --}}
                                        <li data-thumb="{{ asset('images/products') }}/{{ $product->image }}"  class="" style=" display: block;">
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                        </li>
                                        {{-- <li data-thumb="{{ asset('images/products') }}/{{ $product->image }}" class="" style="width: 500.5px; float: left; display: block;">
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                        </li>
                                        <li data-thumb="{{ asset('images/products') }}/{{ $product->image }}" class="flex-active-slide" style="width: 500.5px; float: left; display: block;">
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                        </li>
                                        <li data-thumb="{{ asset('images/products') }}/{{ $product->image }}" class="" style="width: 500.5px; float: left; display: block;">
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                        </li>
                                        <li data-thumb="{{ asset('images/products') }}/{{ $product->image }}" rel="adjustX:10, adjustY:" class="clone" style="width: 500.5px; float: left; display: block;">
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                        </li> --}}
                                    </ul>
                                </div>
                                    <ol class="flex-control-nav flex-control-thumbs">
                                        <li>
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" class="">
                                        </li>
                                        {{-- <li>
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" class="">
                                        </li>
                                        <li>
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" class="flex-active">
                                        </li>
                                        <li>
                                            <img src="{{ asset('images/products') }}/{{ $product->image }}" class="">
                                        </li> --}}
                                    </ol>
                                    <ul class="flex-direction-nav">
                                            <li><a class="flex-prev" href="#"></a>
                                            </li><li><a class="flex-next" href="#"></a>
                                            </li>
                                        </ul>
                                    </div>
                                <!-- End Images slider -->
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-des">
                                <!-- Description -->
                                <div class="short">
                                    <h4>{{ $product->name }}</h4>
                                    <div class="rating-main">
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                            <li class="dark"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <a href="#" class="total-review">(102) Review</a>
                                    </div>
                                    <p class="price"><span class="discount">UGs{{ $product->regular_price }}
                                        @if ($product->sale_price)
                                            </span><s>UGs{{ $product->sale_price }}</s> </p>

                                        @endif
                                    <p class="description">{{ $product->description }}</p>
                                </div>
                                <!--/ End Description -->

                                <!-- Product Buy -->
                                <div class="product-buy">
                                    <div class="quantity">
                                        <h6>Quantity :</h6>
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]" wire:click.prevent="decreaseQuantity">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="{{ $qty }}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]" wire:click.prevent="increaseQuantity">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    @php
                                        $witem = Cart::instance('wishlist')->content()->pluck('id');
                            $citem = Cart::instance('cart')->content()->pluck('id');
                        @endphp
                                    <div class="add-to-cart">
                                        @if ($citem->contains($product->id))
                                        <a href="#" class="btn" style="background-color: rgb(196, 82, 0)" wire:click.prevent="removeFromCart({{ $product->id }})">Remove from cart</a>
                                        @else
                                        <a href="#" class="btn" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add to cart</a>
                                        @endif

                                        <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                        {{-- <a href="#" class="btn min"><i class="fa fa-compress"></i></a> --}}
                                    </div>
                                    <p class="cat">Category :<a href="#">Clothing</a></p>
                                    <p class="availability">Availability : {{ $product->quantity }} Products In Stock</p>
                                </div>
                                <!--/ End Product Buy -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-info">
                                <div class="nav-main">
                                    <!-- Tab Nav -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
                                    </ul>
                                    <!--/ End Tab Nav -->
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <!-- Description Tab -->
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="tab-single">
                                            <div class="row">
                                                <div class="col-12">
                                                    @if ($product->short_description)
                                                    <div class="single-des">
                                                        <p>{{ $product->short_description }}</p>
                                                    </div>
                                                    @endif

                                                    <div class="single-des">
                                                        <p>{{ $product->description }}</p>
                                                    </div>
                                                    <div class="single-des">
                                                        <h4>Product Features:</h4>
                                                        <ul>
                                                            <li>long established fact.</li>
                                                            <li>has a more-or-less normal distribution. </li>
                                                            <li>lmany variations of passages of. </li>
                                                            <li>generators on the Interne.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Description Tab -->
                                    <!-- Reviews Tab -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="tab-single review-panel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="ratting-main">
                                                        <div class="avg-ratting">
                                                            <h4>4.5 <span>(Overall)</span></h4>
                                                            <span>Based on 1 Comments</span>
                                                        </div>
                                                        <!-- Single Rating -->
                                                        <div class="single-rating">
                                                            <div class="rating-author">
                                                                <img src="images/comments1.jpg" alt="#">
                                                            </div>
                                                            <div class="rating-des">
                                                                <h6>Naimur Rahman</h6>
                                                                <div class="ratings">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-half-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    </ul>
                                                                    <div class="rate-count">(<span>3.5</span>)</div>
                                                                </div>
                                                                <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                                                            </div>
                                                        </div>
                                                        <!--/ End Single Rating -->
                                                        <!-- Single Rating -->
                                                        <div class="single-rating">
                                                            <div class="rating-author">
                                                                <img src="images/comments2.jpg" alt="#">
                                                            </div>
                                                            <div class="rating-des">
                                                                <h6>Advin Geri</h6>
                                                                <div class="ratings">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                    <div class="rate-count">(<span>5.0</span>)</div>
                                                                </div>
                                                                <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                                                            </div>
                                                        </div>
                                                        <!--/ End Single Rating -->
                                                    </div>
                                                    <!-- Review -->
                                                    <div class="comment-review">
                                                        <div class="add-review">
                                                            <h5>Add A Review</h5>
                                                            <p>Your email address will not be published. Required fields are marked</p>
                                                        </div>
                                                        <h4>Your Rating</h4>
                                                        <div class="review-inner">
                                                            <div class="ratings">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ End Review -->
                                                    <!-- Form -->
                                                    <form class="form" method="post" action="mail/mail.php">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Your Name<span>*</span></label>
                                                                    <input type="text" name="name" required="required" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Your Email<span>*</span></label>
                                                                    <input type="email" name="email" required="required" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Write a review<span>*</span></label>
                                                                    <textarea name="message" rows="6" placeholder=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-12">
                                                                <div class="form-group button5">
                                                                    <button type="submit" class="btn">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!--/ End Form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Reviews Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        @foreach ($related_products as $related_product)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" style="height: 250px;" src="{{ asset('images/products') }}/{{ $related_product->image }}" alt="#">
                                    <img class="hover-img" style="height: 250px;" src="{{ asset('images/products') }}/{{ $related_product->image }}" alt="#">
                                    <span class="out-of-stock">Hot</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">{{ $related_product->name }}</a></h3>
                                <div class="product-price">
                                    @if ($related_product->sale_price)
                                    <span class="old">UGs{{ $related_product->sale_price }}</span>
                                    @endif
                                    <span>UGs{{ $related_product->regular_price }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- End Single Product -->

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
