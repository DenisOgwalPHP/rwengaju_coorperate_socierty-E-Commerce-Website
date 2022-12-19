<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }
    public function render()
    {
        return view('livewire.wishlist-count-component');
    }
}