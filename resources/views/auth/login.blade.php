@extends('layouts.web')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div style="padding-top: 50px" class="text-center">
                <h1 class="custom-title">Login</h1>
                <p>Don't have an account yet? <a href="{{ route('register') }}" wire:navigate class="custom-link">Signup now!</a></p>
            </div>
            <div class="py-2">
                @include('inc.feedback_messages')
            </div>
            @livewire('auth.login')
        </div>
    </div>
</div>

@endsection