@extends('layouts.backend')

@section('content')

    <div class="mb-4">
        <h2 class="custom-title">{{ $ticket->subject }}</h2>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div style="font-size: 27px; font-weight: 700; background-color: #f5f5f5; padding: 20px; margin-bottom: 30px;">
                @if ($ticket->is_open)
                    <span class="text-danger">Open Ticket</span>
                @else
                    <span class="text-success">Closed Ticket</span>
                @endif                
            </div>
        </div>
        <div class="col-md-8">
            <div style="background-color: #f5f5f5; padding: 20px; margin-bottom: 30px;">
                @if ($ticket->manager_id)
                    <span style="font-size: 27px; font-weight: 700;">
                        {{ $ticket->manager->user->name }}
                    </span>
                    <button class="custom-btn-sm-primary float-end">Re-assign ticket</button>
                @else
                    <span class="text-danger" style="font-size: 27px; font-weight: 700;">Unassigned</span>
                    <button class="custom-btn-sm-primary float-end">Assign ticket</button>
                @endif  
            </div>
        </div>
    </div>
    
    @livewire('tickets.messages', ['ticket_id' => $ticket->id ])

    @include('inc.feedback_messages')

    @livewire('tickets.message-reply', ['ticket_id' => $ticket->id ])

@endsection