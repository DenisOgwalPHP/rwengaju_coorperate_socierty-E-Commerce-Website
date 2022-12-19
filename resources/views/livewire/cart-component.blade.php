<div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="/">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping-cart section">

        <div class="container">
            @if (Cart::instance('cart')->count() > 0)
            <div class="row">
                <div class="col-12">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success : </strong>{{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if (Cart::instance('cart')->count() > 0)
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="image" data-title="No"><img src="{{ asset('images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a></p>
                                        {{-- <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p> --}}
                                    </td>
                                    <td class="price" data-title="Price"><span>UGs{{ $item->model->regular_price }} </span></td>
                                    <td class="qty" data-title="Qty"><!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="100" value="{{ $item->qty }}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]"  wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>UGs{{ $item->subtotal }}</span></td>
                                    <td class="action"  data-title="Remove"><a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="ti-trash remove-icon"></i></a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                    @else
                        <h3 class="box-title">No items in Cart</h3>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">

                                <div class="col-lg-8 col-md-5 col-12">
                                    <div class="left">
                                        @if (!Session::has('coupon'))
                                        <div class="coupon">
                                            <form wire:submit.prevent="applyCouponCode">
                                                @if (Session::has('coupon_message'))
                                                <div class="alert alert-danger">
                                                    <div class="alert alert-danger" role="dander">
                                                        <strong>Success : </strong>{{ Session::get('coupon_message') }}
                                                    </div>
                                                </div>
                                                @endif
                                                <input type="text" name="Coupon" placeholder="Enter Your Coupon" wire:model="couponCode">
                                                <button class="btn">Apply</button>
                                            </form>
                                        </div>
                                        @endif

                                        {{-- <div class="checkbox">
                                            <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                                        </div> --}}
                                    </div>
                                </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>UGs{{ Cart::instance('cart')->subtotal() }}</span></li>
                                        @if (Session::has('coupon'))
                                            <li>DIscount ({{ Session::get('coupon')['code'] }})<span><a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></a></span><b class="index">- UGx{{ number_format($discount,2) }}</b></span></li>
                                            <li>Subtotal With Discount<span><b class="index">UGx{{ number_format($subtotalAfterDiscount,2) }}</b></span></li>
                                            <li>Tax ({{ config('cart.tax') }}%)<span><b class="index">UGx{{ number_format($taxAfterDiscount,2) }}</b></span></li>
                                            <li>Shipping<span>Free</span></li>
                                            <li class="last">You Pay<span>UGs{{  number_format($totalAfterDiscount,2) }}</span></li>
                                        @else
                                            <li>Shipping<span>Free</span></li>
                                            <li>Tax<span>UGs{{ Cart::instance('cart')->tax() }}</span></li>
                                            <li class="last">You Pay<span>UGs{{ Cart::instance('cart')->total() }}</span></li>
                                        @endif

                                    </ul>
                                    <div class="button5">
                                        <a href="#" class="btn" wire:click.prevent="checkout">Checkout</a>
                                        <a href="{{ route('products') }}" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
        @else
        <h3 class="box-title">No items in Cart</h3>
        <a href="{{ route('products') }}" class="btn">Add items to Cart</a>
        @endif
    </div>

</div>
