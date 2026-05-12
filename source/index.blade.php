@extends('_layouts.master')

@section('content')
    <p class="intro">
        Hi, I'm Tam — frontend developer based in Ho Chi Minh City.
        I write about web development, AI agents, and ideas worth keeping.
    </p>

    <h2 class="recent-heading">Recent writing</h2>

    <ul class="post-list">
        @foreach ($posts->sortByDesc('date')->take(8) as $post)
            <li>
                <span class="date">{{ $post->prettyDate('M j, Y') }}</span>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

    <p style="margin-top: 24px; font-family: var(--font-sans); font-size: 0.875rem;">
        <a href="/posts">→ All posts</a>
    </p>
@endsection
