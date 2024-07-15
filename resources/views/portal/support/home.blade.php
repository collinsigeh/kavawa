@extends('layouts.portal')

@section('content')

<div class="container">
    <div class="py-4">
        <h2>Support tickets</h2>
    </div>

    @include('inc.feedback_messages')

    <div class="row">
        <div class="col-md-6">
            <div class="shadow-sm bg-light support-ticket-option">
                <h5 class="custom-title">Existing support tickets</h5>
                <p class="text-muted">Follow up on submitted complaints</p>
                <div class="mt-4 p-3" style="background-color: #e9e9e9;">
                    <h6 class="custom-title">Do you have the reference token?</h6>
                    <small class="text-muted">If you have the reference token of the ticket provide it to view it's replies.</small>
                    @livewire('portal.support.ticket-reference', ['entity' => $entity])
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="shadow-sm bg-light support-ticket-option">
                <h5 class="custom-title">New support ticket</h5>
                <p class="text-muted">Submit a new complaint</p>
                <div class="mt-4 p-3" style="background-color: #e9e9e9;">
                    @livewire('portal.support.new-ticket', ['entity' => $entity])
                </div>
            </div>
        </div>
    </div>
</div>

@endsection