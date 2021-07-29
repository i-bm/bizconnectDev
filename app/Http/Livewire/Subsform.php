<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Iodev\Whois\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\WithFileUploads;

class Subsform extends Component
{
    use WithFileUploads;

    public $msg = '';
    public $domainchoice = 1;
    public $regstatus;
    public $acceptpayment;

    // images fields
    public $logo;
    public $cert;
    public $idcard;
    public $proof;


    
    public $domain;
    public $subdomain;
    public $bname;
    public $bdesc;
    public $bslogan;
    public $baddress;
    public $bphone;
    public $bwhatsapp;
    public $bemail;
    public $bfocus = [];
    

    // protected $rules = [
    //     'domain' => 'required',
    // ];
    public function updated($fields)
    {


        $this->validateOnly($fields,[
            'bname' => 'required',
            'bdesc' => 'required',
            'baddress' => 'required',
            'bemail' => 'required|email',
            'bphone' => 'required|numeric',
            'bwhatsapp' => 'required|numeric',
      
        ]);
    }



    public function checkavailability(){
        
        $this->validate([
            'domain' => 'required',
        ]);
        
            $whois = Factory::get()->createWhois();
        if ($whois->isDomainAvailable($this->domain.".com")) {
                $this->msg = "Domain Name Available";
            }
            else{
                $this->msg = "Taken, Try another name";
            }
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.subsform', compact('categories'));
    }
}