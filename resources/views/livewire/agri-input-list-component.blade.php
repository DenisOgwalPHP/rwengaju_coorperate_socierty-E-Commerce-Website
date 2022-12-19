<div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="/">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">Products List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                            <!-- Single Widget -->
                            <div class="single-widget category">
                                <h3 class="title">Categories</h3>
                                <ul class="categor-list">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a></li>

                                    @endforeach

                                </ul>
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Shop By Price -->
                                <div class="single-widget range">
                                    <h3 class="title">Shop by Price</h3>
                                    <div class="price-filter" wire:ignore>
                                        <div class="price-filter-inner">
                                            {{-- <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                <div class="ui-slider-range ui-widget-header ui-corner-all" style="width: auto; left: auto;">
                                                </div>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: auto;"></span>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: auto;"></span>
                                            </div> --}}
                                                <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                                {{-- <div>
                                                  <input type="number" min=0 max="9999" oninput="validity.valid||(value='1000');" id="min_price" class="price-range-field" />
                                                  <input type="number" min=0 max="10000" oninput="validity.valid||(value='8000');" id="max_price" class="price-range-field" />
                                                </div>

                                                <button class="price-range-search" id="price-range-submit">Search</button> --}}

                                                <div class="price_slider_amount">
                                                <div class="label-input">
                                                    <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--/ End Shop By Price -->
                            <!-- Single Widget -->
                            <div class="single-widget recent-post">
                                <h3 class="title">Recent post</h3>
                                <!-- Single Post -->
                                @foreach ($lproducts as $lproduct)

                                <div class="single-post first">
                                    <div class="image">
                                        <img src="{{ asset('images/products') }}/{{ $lproduct->image }}" alt="{{ $lproduct->name }}">
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}">{{ $lproduct->name }}</a></h5>
                                        <p class="price">UGs{{ $lproduct->price }}</p>
                                        <ul class="reviews">
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Post -->
                                @endforeach


                            </div>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->

                            <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top wrap-shop-control" >

                                <div class="">

                                    <div class="sort-item orderby ">
                                        <select name="orderby" id="orderby" class="use-chosen" wire:model="sorting" >
                                            <option value="default" selected="selected">Default</option>
                                            <option value="date">Date</option>
                                            {{-- <option value="name">Name</option> --}}
                                            <option value="price">Price L-H</option>
                                            <option value="price_desc">Price H-L</option>
                                        </select>
                                    </div>

                                    <div class="sort-item product-per-page">
                                        <select name="post-per-page" id="post-per-page" class="use-chosen" wire:model="pagesize">
                                            <option value="6" selected="selected">06</option>
                                            <option value="9" >09</option>
                                            <option value="12" >12</option>
                                            <option value="24">24</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>



                                </div>
                                <ul class="view-mode">
                                    <li ><a href="{{ route('inputs') }}"><i class="fa fa-th-large"></i></a></li>
                                    <li class="active"><a href="#"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                        @php
                            $witem = Cart::instance('wishlist')->content()->pluck('id');
                            $citem = Cart::instance('cart')->content()->pluck('id');
                        @endphp
                        <!-- Start Single List -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                <img class="default-img" style="height: 330px;" src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                                <img class="hover-img" style="height: 310px;" src="{{ asset('images/products') }}/{{ $product->image }}" alt="#">
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    @if ($witem->contains($product->id))
                                                    <a title="Wishlist" href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})"><i class=" ti-heart"  style="color: rgb(210, 123, 0)"></i><span>Remove from Wishlist</span></a>
                                                    @else
                                                    <a title="Wishlist" href="#" wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i class="ti-heart" ></i><span>Add to Wishlist</span></a>
                                                    @endif
                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>

                                                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    @if ($citem->contains($product->id))
                                                    <a href="#" class="add-to-cart " style="color: rgb(210, 123, 0)" wire:click.prevent="removeFromCart({{ $product->id }})">Remove From Cart</a>
                                                    @else
                                                    <a href="#" class="add-to-cart" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add To Cart</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12" style="margin-top: 50px;">
                                    <div class="list-content">
                                        <div class="product-content">
                                            <div class="product-price">
                                                <span>UGx{{ $product->regular_price }}</span>
                                            </div>
                                            <h3 class="title"><a href="product-details.html">{{ $product->name }}</a></h3>

                                        </div>
                                        <p class="des">{{ $product->description }}</p>
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}" class="btn">Buy Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single List -->
                        @endforeach

                    </div>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
                	<!-- Start Most Popular -->
                    <div class="product-area most-popular section">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-title">
                                        <h2>Popular Products</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row" wire:ignore>
                                <div class="col-12">
                                    <div class="owl-carousel popular-slider">
                                        <!-- Start Single Product -->
                                        @foreach ($popular_products as $popular_product)
                                        @php
                                        $witem = Cart::instance('wishlist')->content()->pluck('id');
                                        $citem = Cart::instance('cart')->content()->pluck('id');
                                    @endphp
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{ route('product.details', ['slug' => $popular_product->slug]) }}">
                                                    <img class="default-img" style="height: 280px;" src="{{ asset('images/products') }}/{{ $popular_product->image }}" alt="#">
                                                    <img class="hover-img" style="height: 250px;" src="{{ asset('images/products') }}/{{ $popular_product->image }}" alt="#">
                                                    @if ($popular_product->type == "product")
                                                        <span class="out-of-stock">Product</span>
                                                    @else
                                                        <span class="new">Agri-Input</span>
                                                    @endif
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">

                                                        @if ($witem->contains($popular_product->id))
                                                        <a title="Wishlist" href="#"><i class=" ti-heart" wire:click.prevent="removeFromWishlist({{ $popular_product->id }})" style="color: rgb(210, 123, 0)"></i><span>Remove from Wishlist</span></a>
                                                        @else
                                                        <a title="Wishlist" href="#"><i class="ti-heart" wire:click.prevent="addToWishlist({{ $popular_product->id }},'{{ $popular_product->name }}',{{ $popular_product->regular_price }})"></i><span>Add to Wishlist</span></a>
                                                        @endif
                                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>

                                                    </div>
                                                    <div class="product-action-2">
                                                        @if ($citem->contains($popular_product->id))
                                                        <a href="#" class="add-to-cart " style="color: rgb(210, 123, 0)" wire:click.prevent="removeFromCart({{ $popular_product->id }})">Remove From Cart</a>
                                                        @else
                                                        <a href="#" class="add-to-cart" wire:click.prevent="store({{ $popular_product->id }},'{{ $popular_product->name }}',{{ $popular_product->regular_price }})">Add To Cart</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="{{ route('product.details', ['slug' => $popular_product->slug]) }}">{{ $popular_product->name }}</a></h3>
                                                <div class="product-price">
                                                    @if ($popular_product->sale_price)
                                                    <span class="old">Ugs{{ $popular_product->sale_price }}</span>
                                                    @endif
                                                    <span>{{ $popular_product->regular_price }}</span>
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
                    <!-- End Most Popular Area -->
            </div>
        </div>
    </section>
</div>
@push('scripts')
<script>
       /*=======================
		  Slider Range JS
		=========================*/
        var min_price = {!! json_encode($min_price) !!};
        var max_price = {!! json_encode($max_price) !!};
        $(document).ready(function(){

            var input = document.getElementById("post-per-page");
            var orderby = document.getElementById("orderby");
            $(input).on('change', function() {
                @this.set('pagesize',this.value )
        //   alert( type);
        });
            $(orderby).on('change', function() {
                @this.set('sorting',this.value )
        //   alert( type);
        });

	$('#price-range-submit').hide();

	$("#min_price,#max_price").on('change', function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());

	  if (min_price_range > max_price_range) {
		$('#max_price').val(min_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$("#min_price,#max_price").on("paste keyup", function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());

	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;

			$("#min_price").val(min_price_range);
			$("#max_price").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 1000000,
		values: [1, 1000000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }


		  $("#min_price").val(ui.values[0]);
		  $("#max_price").val(ui.values[1]);
          $("#amount").val(
            "UGx" + ui.values[0] + " - UGx" + ui.values[1]
        );
        @this.set('min_price', ui.values[0]);
        @this.set('max_price', ui.values[1]);
		}
	  });

	  $("#min_price").val($("#slider-range").slider("values", 0));
	  $("#max_price").val($("#slider-range").slider("values", 1));
      $("#amount").val(
                "UGx" +
                    $("#slider-range").slider("values", 0) +
                    " - UGx" +
                    $("#slider-range").slider("values", 1)
            );

	});

	$("#slider-range,#price-range-submit").click(function () {

	  var min_price = $('#min_price').val();
	  var max_price = $('#max_price').val();

	  $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});

});

</script>

@endpush
