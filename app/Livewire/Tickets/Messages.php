<?php

namespace App\Livewire\Tickets;

use App\Models\Tmessage;
use Livewire\Component;

class Messages extends Component
{
    public $messages = [];

    public function mount($ticket_id = null)
    {
        $this->messages = Tmessage::where('ticket_id', $ticket_id)->orderBy('created_at', 'asc')->get();
    }
    
    public function render()
    {
        return view('livewire.tickets.messages');
    }
}
