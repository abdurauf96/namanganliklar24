<div class="popular-news">
    <div class="popular-news-wrapper">
      <h4 class="popular-news__title">@lang('messages.popular')</h4>
      <ul class="popular-news__list">
        @foreach ($posts as $post)
        @if( $post->getTranslatedAttribute('title', \App::getLocale())!='')
        <li class="popular-news__item">
          <a href="/post/{{ $post->id }}">
            <p class="popular-news__description"> {{ $post->getTranslatedAttribute('title', \App::getLocale(), 'en') }} </p>
            <span class="popular-news__date">{{ $post->created_at->format('H:i /  d.m.Y') }}&nbsp<i class="far fa-eye"></i>&nbsp {{ $post->view }}</span>
          </a>
        </li>
        @endif
        @endforeach 
      </ul>
    </div>
    @if(isset($right_ad))
      <?php 
       $lang=\App::getLocale();
        if ($lang=='uz') {
          $image=Voyager::image($right_ad->image_uzb);
        }elseif ($lang=='en') {
          $image=Voyager::image($right_ad->image_rus);
        }else {
          $image=Voyager::image($right_ad->image_kirill);
        }
      ?>
    <div class="ads-placeholder" style="background-image:url({{ $image }})">
    </div>
    @endif
</div>