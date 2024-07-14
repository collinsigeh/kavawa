@extends('layouts.web')

@section('content')

<div class="container">
    @if (!$is_setup_complete)
        <div class="alert alert-danger mt-4">
            ERROR: Some key settings are missing. Please <a href="{{ route('setting.run') }}">run settings</a>.
        </div>
    @endif
    <div class="row">
        <div class="col-xl-6">
            <div  class="p-3 pe-md-5 text-center text-xl-start">
                <div class="welcome-message-larger d-none d-md-block">
                    <h1>
                        We simplify customer service and support
                    </h1>
                    <div class="mt-4">
                        <p>Kavawa is designed with the philosophy that great solutions are intuitive and enjoyable.</p><p>Let's help you improve the way you provide support for your customers.</p>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="custom-btn-lg-primary me-2">Sign up today!</a>
                        <button class="custom-btn-lg-outline-primary">Watch demo</button>
                    </div>
                </div>
                <div class="welcome-message d-block d-md-none">
                    <h1>We simplify customer service and support</h1>
                    <div class="mt-3">
                        <p>Kavawa is designed with the philosophy that great solutions are intuitive and enjoyable.</p><p>Let's help you improve the way you provide support for your customers.</p>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="custom-btn-primary me-2">Sign up today!</a>
                        <button class="custom-btn-outline-primary">Watch demo</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div style="width: 100%" class="pt-lg-5">
                <div class="p-5">
                    <img src="/images/kavawa_customer_service_and_support_app.jpg" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection