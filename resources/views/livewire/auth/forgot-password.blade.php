<form wire:submit="requestPassword" class="card p-4 bg-light shadow-sm">
    <div class="form-group mb-4">
        <label for="email" class="label">Email</label>
        <input type="email" wire:model="email" id="email" class="form-control" required>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div>
        <small><a href="{{ route('login') }}" wire:navigate class="custom-link"><b>Login</b></a></small>
    </div>
    <div class="p-2 text-center">
        <input type="submit" value="Recover Password" class="custom-btn-primary">
    </div>
</form>