<div class="card mb-5">
    <div class="card-header">
        <h5 class="custom-title">Managed entities</h5>
        <div style="margin-top: -10px;">
            <small class="text-muted">Business entities managed by me</small>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%; padding: 15px 0; color: #727272;"
          >
            <thead>
              <tr>
                <th>Entity</th>
                <th>Status</th>
                <th>Date assigned</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($managed_entities as $item)
                  <tr>
                      <td>
                          <b>{{ $item->entity->name }}</b>
                      </td>
                      <td>
                          <b>
                              @if ($item->entity->is_active)
                                  <span class="text-success">Active</span>
                              @else
                                <span class="text-danger">Inactive</span>
                              @endif
                          </b>
                      </td>
                      <td>
                          <small>{{ date('d M, Y', strtotime($item->created_at)) }}</small>
                      </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>