<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{
    public $name;
    public $updateMode = false;
  
    public function store(){
        
    }

    public function render()
    {
        return view('livewire.roles');
    }

        
     
}