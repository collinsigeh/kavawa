@extends('layouts.portal')

@section('content')

<div class="container">
    <div class="py-4">
        <h2><b>Complaint:</b> <span class="text-muted">{{ $ticket->subject }}</span></h2>
    </div>

    @livewire('portal.support.ticket-messages', ['ticket_id' => $ticket->id ])

    @include('inc.feedback_messages')

    @livewire('portal.support.ticket-reply', ['ticket_id' => $ticket->id ])
</div>

@endsection