<form wire:submit="submitForm" class="card p-4 bg-light shadow-sm">
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
        <label for="password" class="label">Password</label>
        <input type="password" wire:model="password" id="password" class="form-control" required>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="password_confirmation" class="label">Confirm Password</label>
        <input type="password" wire:model="password_confirmation" id="password_confirmation" class="form-control" required>
        @error('password_confirmation')
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
    <div class="p-2 text-center">
        <input type="submit" value="Signup" class="custom-btn-primary">
    </div>
</form>