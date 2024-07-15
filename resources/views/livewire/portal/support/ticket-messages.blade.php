<div>
    @foreach ($messages as $message)
        @if ($message->is_reply_to_customer)
            <div class="customer-message">
                <b><small>{{ $message->manager->user->name }}</small></b>
                <div style="font-size: 12px; margin-top: -2px;">
                    <i>{{ $message->created_at }}</i>
                </div>
                <div class="py-2">
                    {!! $message->content !!}
                </div>
                <i><small>{{ $message->created_at }}</small></i>
            </div>
        @else
            <div class="manager-message">
                <b><small>{{ $message->ticket->customer->name }}</small></b>
                <div style="font-size: 12px; margin-top: -2px;">
                    <i>{{ $message->created_at }}</i>
                </div>
                <div class="py-2">
                    {!! $message->content !!}
                </div>
            </div>
        @endif
    @endforeach
</div>
