@extends('layouts.backend')

@section('content')

    <div class="mb-4">
        <h2 class="custom-title">{{ $ticket->subject }}</h2>
    </div>
    
    @livewire('tickets.messages', ['ticket_id' => $ticket->id ])

    @include('inc.feedback_messages')

    @livewire('tickets.message-reply', ['ticket_id' => $ticket->id ])

@endsection