<form wire:submit="storeTicket">
    <input type="hidden" wire:model="entity_id">
    <input type="hidden" wire:model="entity_slug">
    <div class="form-group mb-4">
        <label for="name" class="label">Name</label>
        <input type="text" wire:model="name" id="name" class="form-control" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="email" class="label">Email</label>
        <input type="email" wire:model="email" id="email" class="form-control" required>
        @error('email')
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
    <div class="form-group mb-4">
        <label for="subject" class="label">Subject</label>
        <input type="text" wire:model="subject" id="subject" class="form-control" required>
        @error('subject')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="details" class="label">Details</label>
        <textarea wire:model="details" id="details" class="form-control" rows="10" required></textarea>
        @error('details')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div text-center>
        <input type="submit" value="Submit" class="custom-btn-primary">
    </div>
</form>