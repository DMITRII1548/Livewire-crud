<div>
    <a href="{{ route('posts.index') }}" wire:navigate>Posts<a>
    <h1>Post:</h1>
    <h3>ID</h3>
    {{ $post->id }}

    <h3>Title</h3>
    {{ $post->title }}

    <h3>Content</h3>
    {{ $post->content }}

    <h3>Image</h3>
    <img src="{{ $post->imageUrl }}" style="width: 100px">
</div>
