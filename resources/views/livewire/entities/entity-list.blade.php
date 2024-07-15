<div>
    @if ($my_entities->count() < 1)
        You have not created a business entity.
    @else
        <div class="row entity-list">
            @foreach ($my_entities as $item)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="entity-item">
                        <a href="#">{{ $item->name }}</a>
                        @if ($item->is_active)
                            <i class="bi bi-check-circle float-end" style="color: #2e844a" title="Active"></i>
                        @else
                            <i class="bi bi-x-circle float-end" style="color: #e90000;" title="Inactive"></i>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
