@extends('layouts.backend')

@section('content')

    @include('inc.feedback_messages')

    <div class="mb-4">
        <h2 class="custom-title">Entities</h2>
    </div>

    @livewire('entities.entity-list')

    @livewire('entities.managed-list')

    

@endsection