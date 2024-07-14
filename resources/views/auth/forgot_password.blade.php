@extends('layouts.web')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div style="padding-top: 50px;" class="text-center">
                <h1 class="custom-title">Password Recovery</h1>
                <p>To recover password, please enter the email address you registered with.</p>
            </div>
            <div class="py-2">
                @include('inc.feedback_messages')
            </div>
            @livewire('auth.forgot-password')
        </div>
    </div>
</div>

@endsection