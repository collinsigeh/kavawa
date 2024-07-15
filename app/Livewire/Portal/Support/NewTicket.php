<?php

namespace App\Livewire\Portal\Support;

use App\Helpers\CustomFunction;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Tmessage;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewTicket extends Component
{
    public $entity_id;
    public $entity_slug;
    public $name;
    public $email;
    public $country;
    public $subject;
    public $details;

    public $countries = [];

    public function mount($entity)
    {
        if(session('name') && strlen(session('name') > 0))
        {
            $this->name = session('name');
            session(['name' => '']);
        }
        if(session('email') && strlen(session('email') > 0))
        {
            $this->email = session('email');
            session(['email' => '']);
        }
        if(session('subject') && strlen(session('subject') > 0))
        {
            $this->subject = session('subject');
            session(['subject' => '']);
        }
        if(session('details') && strlen(session('details') > 0))
        {
            $this->details = session('details');
            session(['details' => '']);
        }
        
        $this->entity_id = $entity->id;
        $this->entity_slug = $entity->slug;
        $this->countries = Country::orderBy('name', 'asc')->get();
    }

    public function storeTicket()
    {
        $this->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'country' => 'required|integer|min:1',
            'subject' => 'required|string|min:5|max:255',
            'details' => 'required|string|min:20'
        ]);
        session(['name' => $this->name]);
        session(['email' => $this->email]);
        session(['subject' => $this->subject]);
        session(['details' => $this->details]);
        
        if(!Country::find($this->country))
        {
            session([
                'error_message' => 'Invalid country selection.'
            ]);
            return $this->redirect(route('portal.support.index', $this->entity_slug), navigate:true);
        }

        try 
        {
            $customer = Customer::firstOrCreate(
                [
                    'entity_id' => $this->entity_id,
                    'email' => $this->email
                ],
                [
                    'name' => $this->name,
                    'password' => Hash::make($this->email),
                    'country_id' => $this->country
                ]
            );
            
            $ticket = new Ticket();

            $ticket->subject = $this->subject;
            $ticket->token = CustomFunction::generateTicketToken($this->subject);
            $ticket->entity_id = $this->entity_id;
            $ticket->customer_id = $customer->id;

            $ticket->save();

            $tmessage = new Tmessage();

            $tmessage->ticket_id = $ticket->id;
            $tmessage->content = $this->details;
            $tmessage->is_seen_by_customer = true;

            $tmessage->save();

            session(['name' => '']);
            session(['email' => '']);
            session(['subject' => '']);
            session(['details' => '']);
        }
        catch(\Exception $e)
        {
            session([
                'error_message' => 'ERROR: '.$e->getMessage()
            ]);
            return $this->redirect(route('portal.support.index', $this->entity_slug), navigate:true);
        }
        
        session([
            'success_message' => 'Ticket submitted successfully. Your ticket reference token is: <b>'.$ticket->token.'</b>. Please expect a reply within 72 hours.'
        ]);
        return $this->redirect(route('portal.support.index', $this->entity_slug), navigate:true);
    }

    public function render()
    {
        return view('livewire.portal.support.new-ticket');
    }
}
