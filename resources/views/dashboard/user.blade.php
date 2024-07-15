@extends('layouts.backend')

@section('content')

    @include('inc.feedback_messages')

    <div class="mb-4">
        <h2 class="custom-title">Dashboard</h2>
    </div>
    
    @livewire('tickets.ticket-notice')

@endsection