<div class="col-lg-8 col-md-7 col-12 center-section">
    {{-- <div class="search-bar-top wrap-search-form">
        <div class="search-bar">
            <select>
                <option selected="selected">All Category</option>
                @foreach ($categories as $category)
                <option data-id="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <form action="{{ route('product.search') }}" id="form-search-top" name="form-search-top">

                <input name="search" value="{{ $search }}" placeholder="Search Products Here....." type="search">
                <input type="hidden" name="product_cat" value="{{ $product_cat }}" id="product-cate">
                <input type="hidden" name="product_cat_id" value="{{ $product_cat_id }}" id="product-cate-id">
                <button class="btnn" type="submit"><i class="ti-search"></i></button>
            </form>
        </div>
    </div> --}}

    <div class="wrap-search-form">
        <form action="{{ route('product.search') }}" id="form-search-top" name="form-search-top">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search here...">
            <button class="btnn" form="form-search-top" type="submit"><i class="fa fa-search"
                    aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                <input type="hidden" name="product_cat" value="{{ $product_cat }}" id="product-cate">
                <input type="hidden" name="product_cat_id" value="{{ $product_cat_id }}" id="product-cate-id">
                <a href="#" class="link-control">{{ str_split($product_cat, 12)[0] }}</a>
                <ul class="list-cate">
                    <li class="level-0">All Category</li>
                    @foreach ($categories as $category)
                    <li class="level-1" data-id="{{ $category->id }}">-{{ $category->name }}</li>
                    @endforeach

                </ul>
            </div>
        </form>
    </div>
</div>
