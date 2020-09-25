@extends('layouts.site')

@section('content')

<section class="news">
    <div class="container">
      <div class="news__wrapper basic-flex">
        <div class="column-news">
          @if(isset($category))
          <h2 class="news__title">{{ $category->getTranslatedAttribute('name', \App::getLocale(), 'en')  }}</h2>
          @endif
          @if(isset($tag))
          <h2 class="news__title"> @lang('messages.result_tag') #{{ $tag->getTranslatedAttribute('name', \App::getLocale(), 'en')  }}</h2>
          @endif
          <ul class="news__list basic-flex">
            @foreach ($posts as $post)
            @if( $post->getTranslatedAttribute('title', \App::getLocale())!='')
            <li class="news__item">
              <a href="/post/{{ $post->id }}" class="basic-flex news__link">
                <div class="news-image-wrapper"><img src="{{ Voyager::image($post->thumbnail('cropped')) }}" alt="Bottom Img"></div>
                <div class="news-box basic-flex">
                  <h4 class="news__title">{{ $post->getTranslatedAttribute('title', \App::getLocale(), 'en')}}</h4>
                  <p class="news__description">{{ $post->getTranslatedAttribute('excerpt', \App::getLocale(), 'en') }}</p>
                  <span class="news__date basic-flex">{{ $post->created_at->format('H:i /  d.m.Y') }} &nbsp<i class="far fa-eye"></i>&nbsp {{ $post->view }}</span>
                  
                </div>
              </a>
            </li>
            @endif
            @endforeach
            
          </ul>
          {{ $posts->links('layouts.pagination') }}
          
        </div>

        @include('sections.top_posts')
        
      </div>
     
    </div>
</section>

@endsection