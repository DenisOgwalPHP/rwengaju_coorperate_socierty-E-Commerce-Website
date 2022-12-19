<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function cancelOrder(){
        $order = Order::find($this->order_id);
        $order->status = "canceled";
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message', 'Order has been canceled!');
    }
    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.user-order-details-component',['order' => $order]);
    }
}