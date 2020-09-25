@extends('layouts.site')

@section('content')

<section class="article">
    <div class="container">
      <div class="news__wrapper basic-flex">
        <div class="article__wrapper">
          <h2 class="article__title">{{ $post->getTranslatedAttribute('title', \App::getLocale(), 'en') }}
          </h2>
          <span class="article__date basic-flex">{{ $post->created_at->format('H:i /  d.m.Y') }}   &nbsp&nbsp<i class="far fa-eye"></i>&nbsp {{ $post->view }}</span>  
          <img height="400px" src="{{ Voyager::image($post->image) }}" alt="{{ $post->getTranslatedAttribute('title', \App::getLocale(), 'en') }}
          ">
          <p class="">
            {!! $post->getTranslatedAttribute('body', \App::getLocale(), 'en') !!}
          </p>
        
         

          <div class="hashtags basic-flex">
            @foreach ($post->tags as $tag)
            <a href="/posts/{{ $tag->id }}/{{ $tag->getTranslatedAttribute('name','uz') }}">#{{ $tag->getTranslatedAttribute('name', \App::getLocale(), 'en') }}</a>
            @endforeach
            
            
          </div>
        </div>

        @include('sections.top_posts')

        <div class="related-news">
          <h3 class="related-news__title">@lang('messages.poteme')
          </h3>
          <div class="related-posts basic-flex">
            @foreach ($related as $post)
            <div class="posts__item">
              <a href="/post/{{ $post->id }}">
                <img src="{{ Voyager::image($post->image) }}" alt="Image" class="posts__img">
                <h2 class="posts__title">{{ $post->getTranslatedAttribute('title', \App::getLocale()) }}</h2>
                <span class="posts__date">{{ $post->created_at->format('H:i /  d.m.Y') }}</span>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection