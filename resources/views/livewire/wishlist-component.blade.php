<div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="/">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success : </strong>{{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if (Cart::instance('wishlist')->count() > 0)
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center"> PRICE</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('wishlist')->content() as $item)
                                <tr>
                                    <td class="image" data-title="No"><img src="{{ asset('images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a></p>
                                        {{-- <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p> --}}
                                    </td>
                                    <td class="price" data-title="Price"><span>UGs{{ $item->model->regular_price }} </span></td>

                                    <td class="action"  data-title="Remove"><a href="#" wire:click.prevent="removeFromWishlist('{{ $item->rowId }}')"><i class="ti-trash remove-icon"></i></a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                    @else
                        <h3 class="box-title">No items in Wishlist</h3>
                    @endif
                </div>
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
                                                <img class="hover-img" style="height: 280px;" src="{{ asset('images/products') }}/{{ $popular_product->image }}" alt="#">
                                                <span class="out-of-stock">Hot</span>
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

</div>
