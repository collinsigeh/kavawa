<?php

namespace App\Livewire\Entities;

use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManagedList extends Component
{
    public $managed_entities = [];

    public function mount()
    {
        $this->managed_entities = Manager::where('user_id', Auth::user()->id)->get();
    }
    
    public function render()
    {
        return view('livewire.entities.managed-list');
    }
}
