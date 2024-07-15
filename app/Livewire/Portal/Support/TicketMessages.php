<?php

namespace App\Livewire\Portal\Support;

use App\Models\Tmessage;
use Livewire\Component;

class TicketMessages extends Component
{
    public $messages = [];

    public function mount($ticket_id = null)
    {
        $unseen_messages = Tmessage::where('ticket_id', $ticket_id)->where('is_seen_by_customer', 0)->get();
        foreach($unseen_messages as $unseen)
        {
            $unseen->is_seen_by_customer = 1;
            $unseen->save();
        }
        $this->messages = Tmessage::where('ticket_id', $ticket_id)->orderBy('created_at', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.portal.support.ticket-messages');
    }
}
