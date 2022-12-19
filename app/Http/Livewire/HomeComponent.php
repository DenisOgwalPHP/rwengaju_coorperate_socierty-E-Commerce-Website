<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];


    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
        // $this->emitTo('home-component', 'refreshComponent');
        return redirect()->route('home');
    }
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        // $this->emitTo('home-component', 'refreshComponent');
        return redirect()->route('home');
    }
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                // $this->emitTo('home-component', 'refreshComponent');
                return redirect()->route('home');
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
                return redirect()->route('home');
            }
        }

    }
    public function render()
    {
        $featured_products = Product::where('type', 'product')->where('featured', 1)->inRandomOrder()->limit(8)->get();
        $featured_inputs = Product::where('type', 'input')->where('featured', 1)->inRandomOrder()->limit(8)->get();
        $blogs = Blog::paginate(12);
        $sliders = HomeSlider::where('status', 1)->get();
        return view('livewire.home-component',[ 'featured_inputs'=> $featured_inputs,'featured_products'=> $featured_products, 'blogs' => $blogs, 'sliders' => $sliders])->layout('layouts.base');
    }
}