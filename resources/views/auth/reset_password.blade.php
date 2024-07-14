@extends('layouts.web')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div style="padding-top: 50px;" class="text-center">
                <h1 class="custom-title">Reset Password</h1>
            </div>
            <div class="py-2">
                @include('inc.feedback_messages')
            </div>
            @livewire('auth.reset-password', ['token' => $token])
        </div>
    </div>
</div>

@endsection