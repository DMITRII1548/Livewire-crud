<div>
    <form class="form-group" wire:submit="register" class="form-control">
        <input type="text" wire:model="form.name" placeholder="Name" class="form-control">
        @error('form.name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="email" wire:model="form.email" placeholder="Email" class="form-control">
        @error('form.email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="password" wire:model="form.password" placeholder="Password" class="form-control">
        @error('form.password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="password" wire:model="form.password_confirmation" placeholder="Password_confirmation" class="form-control">
        @error('form.password_confirmation')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-success">Sign up</button>
    </form>
</div>