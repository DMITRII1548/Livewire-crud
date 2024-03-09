<div>
    <form class="form-group" wire:submit="login" class="form-control">
        <input type="email" wire:model="form.email" placeholder="Email" class="form-control">
        @error('form.email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="password" wire:model="form.password" placeholder="Password" class="form-control">
        @error('form.password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>
