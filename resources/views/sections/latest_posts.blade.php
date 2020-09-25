<section class="news">
    <div class="container">
      <div class="news__wrapper basic-flex" id="latestPosts">
        <div class="column-news">
          <h2 class="news__title">@lang('messages.latest')</h2>
          <ul class="news__list basic-flex">
            @foreach ($latest_posts as $item)
            @if( $item->getTranslatedAttribute('title', \App::getLocale())!='')
            <li class="news__item">
              <a href="/post/{{ $item->id }}" class="basic-flex news__link">
                <div class="news-image-wrapper"><img src="{{ Voyager::image($item->thumbnail('medium')) }}" alt="Bottom Img"></div>
                <div class="news-box basic-flex">
                  <h4 class="news__title">{{$item->getTranslatedAttribute('title', \App::getLocale())}}</h4>
                  <p class="news__description">{{ $item->getTranslatedAttribute('excerpt', \App::getLocale())}}
                  </p>
                  <span class="news__date basic-flex">{{ $item->created_at->format('H:i /  d.m.Y') }}&nbsp<i class="far fa-eye"></i>&nbsp {{ $item->view }}</span>
                </div>
              </a>
            </li>
            @endif
            @endforeach

          </ul>
          @if(!Request::has('more'))
            <a  href="?more#latestPosts"  class="btn load-more-btn"> @lang('messages.bolshe') </a>
          @endif
        </div>

        @include('sections.top_posts')

      </div>
    </div>
</section>