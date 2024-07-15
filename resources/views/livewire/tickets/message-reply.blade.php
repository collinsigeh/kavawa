<div style="background: #f5f5f5; padding: 20px 0; margin-top: 20px;">
    <form wire:submit="saveMessage">
        <div class="form-group mb-3">
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <textarea wire:model="content" cols="30" rows="10" class="form-control" placeholder="Write a reply here"></textarea>
        </div>
        <div class="text-center">
            <input type="submit" value="Send" class="custom-btn-primary">
        </div>
    </form>    
</div>