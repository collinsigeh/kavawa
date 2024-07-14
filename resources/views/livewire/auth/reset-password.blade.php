<form wire:submit="resetPassword" class="card p-4 bg-light shadow-sm">
    <div class="form-group mb-4">
        <label for="password" class="label">New Password</label>
        <input type="password" wire:model="password" id="password" class="form-control" required>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="password_confirmation" class="label">Confirm Password</label>
        <input type="password" wire:model="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
    <div class="p-2 text-center">
        <input type="submit" value="Save" class="custom-btn-primary">
    </div>
</form>