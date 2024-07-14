<div class="modal fade" id="addEntity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addEntityLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addEntityLabel">New Entity</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit="storeEntity">
                <div class="form-group mb-4">
                    <label for="name" class="label">Name of entity</label>
                    <input type="text" wire:model="name" id="name" class="form-control" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="country" class="label">Country</label>
                    <select wire:model="country" id="country" class="form-select" required>
                        <option value="">--</option>
                        @foreach ($countries as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status" class="label mb-2">Status of this entity</label>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" wire:model="entity_status" id="is_active">
                      <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
                <div>
                    <input type="submit" value="Save" class="custom-btn-primary">
                    <button type="button" class="custom-btn-outline-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>