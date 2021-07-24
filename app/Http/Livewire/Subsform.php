<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Iodev\Whois\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class Subsform extends Component
{
    public $domain;
    public $subdomain;

    public $msg = '';

    public $addon = false;

    

    protected $rules = [
        'domain' => 'required',
    ];



    public function checkavailability(){
           $this->validate();
            $whois = Factory::get()->createWhois();
        if ($whois->isDomainAvailable($this->domain.".com")) {
                $this->msg = "Domain Name Available";
            }
            else{
                $this->msg = "Unavailable, try another name";
            }
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.subsform', compact('categories'));
    }
}