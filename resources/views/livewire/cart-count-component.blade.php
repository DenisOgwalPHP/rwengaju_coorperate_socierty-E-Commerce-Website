<div class="sinlge-bar shopping">
    <a href="{{ route('product.cart') }}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ Cart::instance('cart')->count() }}</span></a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ Cart::instance('cart')->count() }} Items</span>
            <a href="{{ route('product.cart') }}">View Cart</a>
        </div>
        @if (Cart::instance('cart')->count() > 0)
        <ul class="shopping-list">
            @foreach (Cart::instance('cart')->content() as $item)
            @if ($item->model->type === "product")
                <li>
                    <a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                    <a class="cart-img" href="{{ route('product.details', ['slug' => $item->model->slug]) }}"><img src="{{ asset('images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
                        <span class="new">product</span></a>
                    <h4><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a></h4>
                    <p class="quantity">{{ $item->qty }}x - <span class="amount">UGs{{ $item->model->regular_price }}</span></p>
                </li>
            @endif
            @if ($item->model->type === "input")
                <li>
                    <a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                    <a class="cart-img" href="{{ route('product.details', ['slug' => $item->model->slug]) }}"><img src="{{ asset('images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
                        <span class="out-of-stock">agri-input</span>
                    <h4><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a></h4>
                    <p class="quantity">{{ $item->qty }}x - <span class="amount">UGs{{ $item->model->regular_price }}</span></p>
                </li>
            @endif
            @endforeach
        </ul>
        @else
            <h3 class="box-title">No items in Cart</h3>
        @endif
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">UGs{{ Cart::instance('cart')->subtotal() }}</span>
            </div>
            <a href="#" wire:click.prevent="checkout" class="btn animate">Checkout</a>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
