<div>
    <h1>Posts:</h1>
    <a href="{{ route('posts.create') }}" wire:navigate>Create post</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td><img style="width: 100px" src="{{ $post->imageUrl }}" alt="{{ $post->title }}"></td>
                    <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-success" wire:navigate>Show</a></td>
                    <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary" wire:navigate>Edit</a></td>
                    <td><button wire:click="destroy({{ $post->id }})" class="btn btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
