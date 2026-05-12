@extends('_layouts.master')

@section('title', "Posts tagged '{$page->name()}'")

@section('content')
    <h1>Tagged <em>{{ $page->name() }}</em></h1>

    <ul class="post-list">
        @forelse ($posts->filter->hasTag($page->name())->sortByDesc('date') as $post)
            <li>
                <span class="date">{{ $post->prettyDate('M j, Y') }}</span>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
            </li>
        @empty
            <p>No posts to show.</p>
        @endforelse
    </ul>
@endsection
