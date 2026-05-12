@extends('_layouts.master')

@section('title', $page->title)

@section('content')
    <h1>{{ $page->title }}</h1>

    <p class="post-meta">
        <time datetime="{{ date('Y-m-d', $page->date) }}">{{ $page->prettyDate('F j, Y') }}</time>
        @if (count($page->tags))
            <span class="sep">·</span>
            @foreach ($page->tags as $tag)
                <a href="/tags/{{ $tag }}">{{ $tag }}</a>{{ $loop->last ? '' : ', ' }}
            @endforeach
        @endif
    </p>

    @if ($page->image)
        <img class="post-image" src="{{ $page->image }}" alt="">
    @endif

    @php
        $yearsOld = floor((time() - $page->date) / 31536000);
    @endphp
    @if ($yearsOld >= 1)
        <p class="post-outdated" data-phpdate="{{ $page->date }}">
            This post is {{ $yearsOld }} {{ $yearsOld === 1.0 ? 'year' : 'years' }} old — some details may be outdated.
        </p>
    @endif

    @yield('postContent')

    <div class="post-footer">
        <p style="margin-bottom: 12px;">Share this post</p>
        @include('_partials.share')

        @if ($page->comments)
            @include('_partials.comments')
        @endif
    </div>
@endsection
