<?php

namespace App\Livewire\Tickets;

use App\Models\Manager;
use App\Models\Tmessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MessageReply extends Component
{
    public $content;
    public $ticket;

    public function mount($ticket)
    {
        $this->ticket = $ticket;
    }

    public function saveMessage()
    {
        $this->validate([
            'content' => 'required|string|min:2'
        ]);

        try
        {
            $manager = Manager::where('user_id', Auth::user()->id)->where('entity_id', $this->ticket->entity->id)->first();

            $message = new Tmessage();
            $message->ticket_id = $this->ticket->id;
            $message->content = $this->content;
            $message->is_reply_to_customer = true;
            $message->manager_id = $manager->id;
            $message->is_seen_by_manager = true;
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
        return $this->redirect(route('tickets.show', $this->ticket->id), navigate:true);
    }

    public function render()
    {
        return view('livewire.tickets.message-reply');
    }
}
