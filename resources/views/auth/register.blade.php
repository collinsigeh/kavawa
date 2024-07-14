@extends('layouts.web')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div style="padding-top: 50px;" class="text-center">
                <h1 class="custom-title">Create an account</h1>
                <p>Already have an account? Please <a href="{{ route('login') }}" wire:navigate class="custom-link">login</a>.</p>
            </div>
            <div class="py-2">
                @include('inc.feedback_messages')
            </div>
            @livewire('auth.signup')
        </div>
    </div>
</div>

@endsection