<div>
    @foreach ($managed_entities as $item)
        @php
            $unattended_tickets = 0;
            foreach ($item->entity->tickets as $ticket) {
                $unattended_messages = 0;
                foreach ($ticket->tmessages as $tmessage) {
                    if(!$tmessage->is_seen_by_manager)
                    {
                        $unattended_messages++;
                    }
                }
                if($unattended_messages > 0 || !$ticket->manager_id)
                {
                    $unattended_tickets++;
                }
            }
        @endphp
        @if ($unattended_tickets > 0)
            <div class="ticket-notice-item">
                <a href="{{ route('tickets.index', $item->entity) }}">
                    There @if ($unattended_tickets == 1)
                        is
                    @else
                        are
                    @endif
                    {{ $unattended_tickets.' support '.Str::plural('ticket', $unattended_tickets ) }} for {{ $item->entity->name }} that needs attention.
                </a>
            </div>
        @endif
    @endforeach
</div>
