@extends('_layouts.master')

@section('title', 'Posts')

@section('content')
    <h1>Writing</h1>
    <p class="posts-summary">{{ $posts->count() }} posts since {{ date('Y', $posts->min('date')) }}.</p>

    @php
        $byYear = $posts->sortByDesc('date')->groupBy(function ($p) {
            return date('Y', $p->date);
        });
    @endphp

    @foreach ($byYear as $year => $yearPosts)
        <h2 class="year-heading">{{ $year }}</h2>
        <ul class="post-list">
            @foreach ($yearPosts as $post)
                <li>
                    <span class="date">{{ date('M j', $post->date) }}</span>
                    <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    @endforeach
@endsection
