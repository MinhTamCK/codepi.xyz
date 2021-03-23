@extends('_layouts.master')

@section('title', "Posts tagged '{$page->name()}'")

@section('content')
    <h1>Posts tagged '{{ $page->name() }}'</h1>

    <ul>
        @forelse ($posts->filter->hasTag($page->name()) as $post)
            <li>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
                <small>{{ $post->prettyDate() }}</small>
            </li>
        @empty
            <p>No posts to show.</p>
        @endforelse
    </ul>
@endsection
