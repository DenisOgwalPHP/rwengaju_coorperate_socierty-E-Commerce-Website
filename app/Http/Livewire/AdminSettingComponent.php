<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twitter;
    public $instagram;
    public $facebook;
    public $linkedIn;
    public $youtube;

    public function mount(){
        $setting = Setting::find(1);
        if($setting){
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->twitter = $setting->twitter;
            $this->instagram = $setting->instagram;
            $this->facebook = $setting->facebook;
            $this->linkedIn = $setting->linkedIn;
            $this->youtube = $setting->youtube;
        }
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
    }

    public function saveSettings(){
        $this->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $setting = Setting::find(1);
        if (!$setting) {
            $setting = new Setting();
        }
        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        $setting->twitter = $this->twitter;
        $setting->instagram = $this->instagram;
        $setting->facebook = $this->facebook;
        $setting->linkedIn = $this->linkedIn;
        $setting->youtube = $this->youtube;
        $setting->save();
        session()->flash('message', 'Settings saved successfully');


    }
    public function render()
    {
        return view('livewire.admin-setting-component')->layout('layouts.base');
    }
}