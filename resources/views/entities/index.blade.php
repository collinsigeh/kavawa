@extends('layouts.backend')

@section('content')

    @include('inc.feedback_messages')

    <div class="mb-4">
        <h2 class="custom-title">Entities</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="custom-title">My entities</h5>
                    <div style="margin-top: -10px;">
                        <small class="text-muted">Business entities created by me.</small>
                    </div>
                </div>
                <div class="text-end">
                    <button class="custom-btn-sm-primary" data-bs-toggle="modal" data-bs-target="#addEntity">Add new</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            @livewire('entities.entity-list')
        </div>
    </div>

    @livewire('entities.new-entity')

@endsection