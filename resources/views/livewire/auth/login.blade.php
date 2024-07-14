<form wire:submit="loginPost" class="card p-4 bg-light shadow-sm">
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
    <div>
        <small><a href="{{ route('password.forgot') }}" wire:navigate class="custom-link"><b>Forgot password?</b></a></small>
    </div>
    <div class="p-2 text-center">
        <input type="submit" value="Login" class="custom-btn-primary">
    </div>
</form>