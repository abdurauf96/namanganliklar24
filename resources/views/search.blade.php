@extends('layouts.site')

@section('content')

<section class="news">
    <div class="container">
      <div class="news__wrapper basic-flex">
        <div class="column-news">
          <h2 class="news__title">@lang('messages.result'): 
              {{ count($posts) }} 
          </h2>
          <ul class="news__list basic-flex">
            @foreach ($posts as $post)
            <li class="news__item">
              <a href="/post/{{ $post->id }}" class="basic-flex news__link">
                <div class="news-image-wrapper"><img src="{{ Voyager::image($post->thumbnail('cropped')) }}" alt="Bottom Img"></div>
                <div class="news-box basic-flex">
                  <h4 class="news__title">{{ $post->getTranslatedAttribute('title', \App::getLocale(), 'en')}}</h4>
                  <p class="news__description">{{ $post->getTranslatedAttribute('excerpt', \App::getLocale(), 'en') }}</p>
                  <span class="news__date basic-flex">{{ $post->created_at->format('H:i /  d.m.y') }}</span>
                </div>
              </a>
            </li>
            @endforeach
            
          </ul>
          
          
        </div>

        @include('sections.top_posts')
        
      </div>
     
    </div>
</section>

@endsection