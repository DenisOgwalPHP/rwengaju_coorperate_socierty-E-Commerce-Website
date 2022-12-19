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
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
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
