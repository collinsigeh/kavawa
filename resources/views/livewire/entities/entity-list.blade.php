<div class="card mb-5">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <h5 class="custom-title">My entities</h5>
                <div style="margin-top: -10px;">
                    <small class="text-muted">Business entities created by me</small>
                </div>
            </div>
            <div class="text-end">
                <button class="custom-btn-sm-primary" data-bs-toggle="modal" data-bs-target="#addEntity">Add new</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div>
            @if ($my_entities->count() < 1)
                You have not created a business entity.
            @else
                <div class="row entity-list">
                    @foreach ($my_entities as $item)
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <div class="entity-item">
                                <div>
                                    <a href="#">{{ $item->name }}</a>
                                    @if ($item->is_active)
                                        <i class="bi bi-check-circle float-end" style="color: #2e844a" title="Active"></i>
                                    @else
                                        <i class="bi bi-x-circle float-end" style="color: #e90000;" title="Inactive"></i>
                                    @endif
                                </div>
                                <div style="background-color: #fff; padding: 8px; margin-top: 15px; font-size: 12px;">
                                    {{ route('portal.support.index', $item->slug)}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    @livewire('entities.new-entity')
</div>