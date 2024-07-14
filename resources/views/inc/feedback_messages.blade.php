@if (session('success_message') && strlen(session('success_message')) > 0)
    <div class="alert alert-success">
        {!! session('success_message') !!}
    </div>
    @php
        session(['success_message' => '']);
    @endphp
@endif
@if (session('error_message') && strlen(session('error_message')) > 0)
    <div class="alert alert-danger">
        {!! session('error_message') !!}
    </div>
    @php
        session(['error_message' => '']);
    @endphp
@endif