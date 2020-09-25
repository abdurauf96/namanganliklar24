@extends('layouts.site')

@section('content')

<section class="posts">
    <div class="container">
      <ul class="posts__list basic-flex">
        @foreach ($posts as $post)
        @if( $post->getTranslatedAttribute('title', \App::getLocale())!='')
        <li class="posts__item">
          <a href="/post/{{ $post->id }}">
            <img src="{{ Voyager::image($post->image) }}" alt="Image" class="posts__img">
            <h2 class="posts__title">{{$post->getTranslatedAttribute('title', \App::getLocale(), 'en')}}</h2>
            <span class="posts__date"> {{ $post->created_at->format('H:i /  d.m.Y') }} &nbsp<i class="far fa-eye"></i>&nbsp {{ $post->view }}</span>
          </a>
        </li>
        @endif
        @endforeach
      </ul>
    </div>
</section>

@include('sections.notification')
@include('sections.latest_posts')
@include('sections.apps')

@endsection