<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class FeaturedProductsComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];


    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('featured-products-component', 'refreshComponent');
        // return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        // $this->emitTo('home-component', 'refreshComponent');

    }
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                // $this->emitTo('home-component', 'refreshComponent');
            }
        }

    }
    public function removeFromCart($product_id){
        foreach(Cart::instance('cart')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('cart')->remove($witem->rowId);
                $this->emitTo('cart-count-component', 'refreshComponent');
                // $this->emitTo('home-component', 'refreshComponent');
            }
        }

    }
    public function render()
    {
        $featured_products = Product::where('type', 'product')->where('featured', 1)->inRandomOrder()->limit(8)->get();
        return view('livewire.featured-products-component', ['featured_products'=> $featured_products,]);
    }
}