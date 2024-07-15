<?php

namespace App\Livewire\Portal\Support;

use App\Models\Ticket;
use App\Models\Tmessage;
use Livewire\Component;

class TicketReply extends Component
{
    public $content;
    public $ticket_id;

    public function mount($ticket_id = null)
    {
        $this->ticket_id = $ticket_id;
    }

    public function saveMessage()
    {
        $this->validate([
            'content' => 'required|string|min:2'
        ]);

        try
        {
            $ticket = Ticket::findOrFail($this->ticket_id);

            $message = new Tmessage();
            $message->ticket_id = $this->ticket_id;
            $message->content = $this->content;
            $message->is_seen_by_customer = true;
            $message->save();

            session([
                'success_mesasage' => 'Reply sent'
            ]);
        }
        catch(\Exception $e)
        {
            session([
                'error_message' => 'ERROR: '.$e->getMessage()
            ]);
        }
        return $this->redirect(route('portal.support.ticket.show', [$ticket->entity->slug, $ticket->id]), navigate:true);
    }

    public function render()
    {
        return view('livewire.portal.support.ticket-reply');
    }
}
