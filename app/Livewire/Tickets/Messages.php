<?php

namespace App\Livewire\Tickets;

use App\Models\Tmessage;
use Livewire\Component;

class Messages extends Component
{
    public $messages = [];

    public function mount($ticket_id = null)
    {
        $unseen_messages = Tmessage::where('ticket_id', $ticket_id)->where('is_seen_by_manager', 0)->get();
        foreach($unseen_messages as $unseen)
        {
            $unseen->is_seen_by_manager = 1;
            $unseen->save();
        }
        $this->messages = Tmessage::where('ticket_id', $ticket_id)->orderBy('created_at', 'asc')->get();
    }
    
    public function render()
    {
        return view('livewire.tickets.messages');
    }
}
