<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ProductsComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;
    protected $listeners = ['refreshComponent' => '$refresh'];
    use WithPagination;


    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 10000000;
    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
        // $this->emitTo('products-component', 'refreshComponent');
        // return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        // $this->emitTo('products-component', 'refreshComponent');

    }
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                // $this->emitTo('products-component', 'refreshComponent');
            }
        }

    }
    public function removeFromCart($product_id){
        foreach(Cart::instance('cart')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('cart')->remove($witem->rowId);
                $this->emitTo('cart-count-component', 'refreshComponent');
                // $this->emitTo('products-component', 'refreshComponent');
            }
        }

    }
    public function render()
    {
        if ($this->sorting=='date') {
            $products = Product::where('type', "product")->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
            $this->emitTo('products-component', 'refreshComponent');
        }
        else if ($this->sorting=='price') {
            $products = Product::where('type', "product")->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
            $this->emitTo('products-component', 'refreshComponent');
        }
        else if ($this->sorting=='price_desc') {
            $products = Product::where('type', "product")->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
            $this->emitTo('products-component', 'refreshComponent');
        }
        else {
            $products = Product::where('type', "product")->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        }
        $categories = Category::where('type', "product")->get();
        $lproducts = Product::where('type', "product")->orderBy('created_at', 'DESC')->get()->take(6);
        $popular_products = Product::inRandomOrder()->limit(8)->get();
        return view('livewire.products-component', ['products' => $products, 'categories' => $categories, 'lproducts' =>$lproducts, 'popular_products'=> $popular_products])->layout('layouts.base');
    }
}