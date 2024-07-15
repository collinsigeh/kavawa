<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Component;

class TicketList extends Component
{
    public $entity;
    public $tickets = [];

    public function mount($entity = null)
    {
        $this->entity = $entity;
        $this->tickets = Ticket::where('entity_id', $entity->id)->orderby('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.tickets.ticket-list');
    }
}
