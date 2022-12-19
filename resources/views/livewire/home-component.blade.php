
<div>
    <section class="hero-area4">
        <div class="container">
            <div class="col-12">
                <div class="home-slider-4 owl-carousel ">
                    @foreach ($sliders as $slider)
                    <div class="big-content" style="background-image: url('{{ asset('images/sliders') }}/{{ $slider->image }}');     background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;">
                        <div class="inner">
                            <h4 class="title">{{ $slider->title }}</h4>
                            <p class="des">{{ $slider->subtitle }}</p>
                            <p class="price"><strong>{{ $slider->price }}</strong></p>
                            <div class="button">
                                <a href="{{ $slider->link }}" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @php
                    $witem = Cart::instance('wishlist')->content()->pluck('id');
                    $citem = Cart::instance('cart')->content()->pluck('id');
                @endphp
                    <div class="owl-carousel popular-slider">
                        @foreach ($featured_products as $featured_product)

                            <div class="single-product" wire:key="{{ $featured_product->id }}">
                                <div class="product-img">
                                    <a href="{{ route('product.details', ['slug' => $featured_product->slug]) }}">
                                        <img class="default-img" style="height: 280px;" src="{{ asset('images/products') }}/{{ $featured_product->image }}" alt="#">
                                        <img class="hover-img" style="height: 280px;" src="{{ asset('images/products') }}/{{ $featured_product->image }}" alt="#">
                                        <span class="out-of-stock">product</span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            @if ($witem->contains($featured_product->id))
                                            <a title="Wishlist" href="#" wire:click.prevent="removeFromWishlist({{ $featured_product->id }})"><i class=" ti-heart"  style="background-color: rgb(0, 0, 0)"></i><span>Remove from Wishlist</span></a>
                                            @else
                                            <a title="Wishlist" href="#" wire:click.prevent="addToWishlist({{ $featured_product->id }},'{{ $featured_product->name }}',{{ $featured_product->regular_price }})"><i class="ti-heart" ></i><span>Add to Wishlist</span></a>
                                            @endif
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            @if ($citem->contains($featured_product->id))
                                            <a href="#" class="add-to-cart " style="color: rgb(210, 123, 0)" wire:click.prevent="removeFromCart({{ $featured_product->id }})">Remove From Cart</a>
                                            @else
                                            <a href="#" class="add-to-cart" wire:click.prevent="store({{ $featured_product->id }},'{{ $featured_product->name }}',{{ $featured_product->regular_price }})">Add To Cart</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('product.details', ['slug' => $featured_product->slug]) }}">{{ $featured_product->name }}</a></h3>
                                    <div class="product-price">
                                        @if ($featured_product->sale_price)
                                        <span class="old">Ugs{{ $featured_product->sale_price }}</span>
                                        @endif
                                        <span>{{ $featured_product->regular_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <a href="/products" style="color: aliceblue" class="btn">Explore more products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Featured Agro-Inputs</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
                        @foreach ($featured_inputs as $featured_product)
                        @php
                        $witem = Cart::instance('wishlist')->content()->pluck('id');
                        $citem = Cart::instance('cart')->content()->pluck('id');
                    @endphp
						<div class="single-product">
							<div class="product-img">
								<a href="{{ route('product.details', ['slug' => $featured_product->slug]) }}">
									<img class="default-img" style="height: 280px;" src="{{ asset('images/products') }}/{{ $featured_product->image }}" alt="#">
									<img class="hover-img" style="height: 250px;" src="{{ asset('images/products') }}/{{ $featured_product->image }}" alt="#">
									<span class="new">Agri-Input</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        @if ($witem->contains($featured_product->id))
                                        <a title="Wishlist" href="#" wire:click.prevent="removeFromWishlist({{ $featured_product->id }})"><i class=" ti-heart"  style="background-color: rgb(0, 0, 0)"></i><span>Remove from Wishlist</span></a>
                                        @else
                                        <a title="Wishlist" href="#" wire:click.prevent="addToWishlist({{ $featured_product->id }},'{{ $featured_product->name }}',{{ $featured_product->regular_price }})"><i class="ti-heart" ></i><span>Add to Wishlist</span></a>
                                        @endif
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
                                    <div class="product-action-2">
                                        @if ($citem->contains($featured_product->id))
                                        <a href="#" class="add-to-cart " style="color: rgb(210, 123, 0)" wire:click.prevent="removeFromCart({{ $featured_product->id }})">Remove From Cart</a>
                                        @else
                                        <a href="#" class="add-to-cart" wire:click.prevent="store({{ $featured_product->id }},'{{ $featured_product->name }}',{{ $featured_product->regular_price }})">Add To Cart</a>
                                        @endif
                                    </div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="{{ route('product.details', ['slug' => $featured_product->slug]) }}">{{ $featured_product->name }}</a></h3>
								<div class="product-price">
                                    @if ($featured_product->sale_price)
                                    <span class="old">Ugs{{ $featured_product->sale_price }}</span>
                                    @endif
									<span>{{ $featured_product->regular_price }}</span>
								</div>
							</div>
						</div>
                        @endforeach

						<!-- End Single Product -->

                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<a href="/agri-inputs" style="color: aliceblue" class="btn">Explore more Agri-inputs</a>
					</div>
				</div>
            </div>
        </div>
    </div>




	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>From Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach ($blogs as $blog)

				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="{{ asset('images/blogs') }}/{{ $blog->image }}" alt="{{ $blog->name }}">
						<div class="content">
							<p class="date">{{ $blog->created_at }}</p>
							<a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="title">{{ $blog->name }}</a>
							<a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="more-btn">{{ $blog->description }}</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
                @endforeach

			</div>
		</div>
	</section>



	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>

</div>
