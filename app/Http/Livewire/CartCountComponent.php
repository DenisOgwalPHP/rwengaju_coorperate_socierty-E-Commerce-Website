<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }
    public function checkout(){
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }
    public function render()
    {
        return view('livewire.cart-count-component');
    }
}