<div class="container">
    <h2>Create post</h2>
    <form method="POST" class="form-group" wire:submit.prevent="store">
        <input type="test" class="form-control mt-3" placeholder="Title" wire:model="form.title">
        @error('form.title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <textarea placeholder="Content" class="form-control mt-3" wire:model="form.content"></textarea>
        @error('form.content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="file" class="form-control mt-3" wire:model="form.image">
        @error('form.image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <button class="btn btn-primary mt-4" type="submit">Store</button>
    </form>
</div>
