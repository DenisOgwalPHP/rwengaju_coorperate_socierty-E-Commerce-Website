<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public $category_slug;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($slug){
        $this->slug = $slug;
        $this->qty = 1;
    }
    public function increaseQuantity(){
       $this->qty++;
    //    return redirect()->route('product.detail', ['slug' => $this->slug]);

    }
    public function decreaseQuantity(){

        $this->qty--;
        // return redirect()->route('product.detail', ['slug' => $this->slug]);

    }
    public function store($product_id, $product_name, $product_price){
        // Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
        // $this->emitTo('details-component', 'refreshComponent');
        // return redirect()->route('product.details', ['slug' => $this->slug]);
    }
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        // $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('details-component', 'refreshComponent');
        // return redirect()->route('product.detail', ['slug' => $this->slug]);

    }
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                // $this->emitTo('wishlist-count-component', 'refreshComponent');
                $this->emitTo('details-component', 'refreshComponent');
                // return redirect()->route('product.detail', ['slug' => $this->slug]);
            }
        }

    }
    public function removeFromCart($product_id){
        foreach(Cart::instance('cart')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('cart')->remove($witem->rowId);
                // $this->emitTo('cart-count-component', 'refreshComponent');
                $this->emitTo('details-component', 'refreshComponent');
                // return redirect()->route('product.detail', ['slug' => $this->slug]);
            }
        }

    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(6)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(8)->get();
        return view('livewire.details-component',['product' => $product, 'popular_products' => $popular_products, 'related_products' => $related_products])->layout('layouts.base');
    }
}