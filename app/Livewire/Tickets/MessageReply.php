<?php

namespace App\Livewire\Tickets;

use App\Models\Tmessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MessageReply extends Component
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
            $message = new Tmessage();
            $message->ticket_id = $this->ticket_id;
            $message->content = $this->content;
            $message->is_reply_to_customer = true;
            $message->manager_id = Auth::user()->id;
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
        return $this->redirect(route('tickets.show', $this->ticket_id), navigate:true);
    }

    public function render()
    {
        return view('livewire.tickets.message-reply');
    }
}
