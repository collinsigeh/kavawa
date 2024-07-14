<?php

namespace App\Livewire\Entities;

use App\Models\Entity;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EntityList extends Component
{
    public $my_entities;

    public function mount()
    {
        $this->my_entities = Entity::where('user_id', Auth::user()->id)->orderBy('name', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.entities.entity-list');
    }
}
