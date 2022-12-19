<div class="sinlge-bar shopping">
    <a href="{{ route('product.wishlist') }}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="total-count">{{ Cart::instance('wishlist')->count() }}</span></a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ Cart::instance('wishlist')->count() }} Items</span>
            <a href="{{ route('product.wishlist') }}">View Wishlist</a>
        </div>
        @if (Cart::instance('wishlist')->count() > 0)
        <ul class="shopping-list">
            @foreach (Cart::instance('wishlist')->content() as $item)
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
            <h3 class="box-title">No items in Wishlist</h3>
        @endif

    </div>
    <!--/ End Shopping Item -->
</div>
