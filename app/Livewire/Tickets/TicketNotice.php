<?php

namespace App\Livewire\Tickets;

use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TicketNotice extends Component
{
    public $managed_entities = [];

    public function mount()
    {
        $this->managed_entities = Manager::where('user_id', Auth::user()->id)->get();
    }
    
    public function render()
    {
        return view('livewire.tickets.ticket-notice');
    }
}
