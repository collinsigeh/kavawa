<?php

namespace App\Livewire\Portal\Support;

use App\Models\Ticket;
use Livewire\Component;

class TicketReference extends Component
{
    public $entity_slug;
    public $token;

    public function mount($entity)
    {
        $this->entity_slug = $entity->slug;
    }

    public function submitReference()
    {
        $this->validate([
            'token' => 'required|string|min:2'
        ]);
        
        try
        {
            $ticket = Ticket::where('token', $this->token)->first();
            if(!$ticket)
            {
                session([
                    'error_message' => 'The reference token: <b>'.$this->token.'</b> is invalid.'
                ]);
                $this->redirect(route('portal.support.index', $this->entity_slug), navigate:true);
            }
        }
        catch(\Exception $e)
        {
            session([
                'error_message' => 'The reference token: <b>'.$this->token.'</b> is invalid.'
            ]);
            $this->redirect(route('portal.support.index', $this->entity_slug), navigate:true);
        }
        $this->redirect(route('portal.support.ticket.show', [$this->entity_slug, $ticket->id]), navigate:true);
    }

    public function render()
    {
        return view('livewire.portal.support.ticket-reference');
    }
}
