@extends('layouts.backend')

@section('content')

    @include('inc.feedback_messages')

    <div class="mb-4">
        <h2 class="custom-title">{{ $ticket->subject }}</h2>
    </div>
    
    @livewire('tickets.messages', ['ticket_id' => $ticket->id ])

@endsection