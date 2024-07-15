<div class="table-responsive">
    <table
      id="example"
      class="table table-striped data-table with-links"
      style="width: 100%; padding: 15px 0; color: #727272;"
    >
      <thead>
        <tr>
          <th>Complaint</th>
          <th>Status</th>
          <th>Assigned to</th>
          <th>Created at</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tickets as $item)
            @php
                $link = route('tickets.show', $item->id)
            @endphp
            <tr>
                <td>
                    <a href="{{ $link }}">
                        <b style="color: #444;">{{ $item->subject }}</b><br>
                        @php
                            $unattended_messages = 0;
                            foreach ($item->tmessages as $message) {
                                if(!$message->is_seen_by_manager)
                                {
                                    $unattended_messages++;
                                }
                            }
                        @endphp
                        @if ($unattended_messages > 0)
                            <span class="badge bg-danger">Has unseen {{ Str::plural('message', $unattended_messages) }}</span>                        
                        @endif
                    </a>
                </td>
                <td>
                    <a href="{{ $link }}">
                        <b>
                            @if ($item->is_open)
                                <span class="text-danger">Open</span>
                            @else
                                <span class="text-success">Closed</span>
                            @endif
                        </b>
                    </a>
                </td>
                <td>
                    <a href="{{ $link }}">
                        @if ($item->manager_id)
                            {{ $item->manager->user->name }}
                        @else
                            <b><span class="text-danger">Unassigned</span></b>
                        @endif
                    </a>
                </td>
                <td>
                    <small>{{ date('d M, Y', strtotime($item->created_at)) }}</small>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>