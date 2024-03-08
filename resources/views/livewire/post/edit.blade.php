<div>
    <h2>Edit post</h2>
    <form method="POST" class="form-group" wire:submit.prevent="update">
        <input type="test" class="form-control mt-3" placeholder="Title" wire:model="form.title">
        @error('form.title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <textarea placeholder="Content" class="form-control mt-3" wire:model="form.content"></textarea>
        @error('form.content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <img src="{{ $post->imageUrl }}" style="width: 100px">
        <input type="file" class="form-control mt-3" wire:model="form.image">
        @error('form.image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <button class="btn btn-primary mt-4" type="submit">Update</button>
    </form>
</div>
