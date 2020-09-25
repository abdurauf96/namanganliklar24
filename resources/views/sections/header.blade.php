<header class="main-header"><meta charset="gb18030">
    <div class="container">
      <div class="basic-flex header__top">
       <div class="logo-wrapper">
            <a href="/" class="logo">
              <img src="/img/logo.png" alt="NAMANGANLIKLAR24">
            </a>
        </div>
        <div class="currencies basic-flex">
          <div class="currency"><span>$</span><span>{{$json['0']['Rate']}} </span></div>
          <div class="currency"><span>P</span><span>{{$json['2']['Rate']}}</span></div>
          <div class="currency"><span>E</span><span>{{$json['1']['Rate']}}</span></div>
        </div>
        <a id="ms-informer-link-76b50af562057c096f2e9cdbf44f373b" class="ms-informer-link" href="https://www.meteoservice.ru/weather/overview/namangan"></a>
        
    
    
        <div class="header__actions basic-flex">
          <form method="GET" class="search-form basic-flex" action="/search">
            @csrf
            <input type="search" name="q" class="search-input">
            <button type="button" class="btn search-btn"></button>
            
          </form>
         <div class="languages">
            @if(\App::getLocale()=='o`z')
            <button type="button" class="btn language__option language__option--uz">Ўзб</button>
            <ul class="languages__list">
              <a href="/lang/ru" type="button" class="btn language__option language__option--active" data-status="disabled">Рус</a>
              <a href="/lang/uz" type="button" class="btn language__option language__option--uz" data-status="disabled">O'zb</a>
            </ul>
            @elseif(\App::getLocale()=='uz')
            <button type="button" class="btn language__option language__option--uz" data-status="disabled">O'zb</button>
            <ul class="languages__list">
              <a href="/lang/ru" type="button" class="btn language__option language__option--ru" data-status="disabled">Рус</a>
              <a href="/lang/o`z" type="button" class="btn language__option language__option--uz" data-status="disabled">Ўзб</a>
            </ul>
            @else
            <button type="button" class="btn language__option language__option--ru" data-status="disabled">Рус</button>
            <ul class="languages__list">
              <a href="/lang/o`z" type="button" class="btn language__option language__option--uz" data-status="disabled">Ўзб</a>
              <a href="/lang/uz" type="button" class="btn language__option language__option--uz" data-status="disabled">O'zb</a>
            </ul>
            @endif
          </div> 
          <div class="telegram-join basic-flex">
            <a href="https://t.me/namanganliklar"><img src="/img/tg.png" alt="Telegram">@lang('messages.podpisatsa')</a>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-menu"><span class="hamburger"></span></button>
      <nav class="navbar">
        <div class="currencies-responsive basic-flex">
          <div class="currency"><span>$</span><span>{{$json['0']['Rate']}} </span></div>
          <div class="currency"><span>P</span><span>{{$json['2']['Rate']}}</span></div>
          <div class="currency"><span>E</span><span>{{$json['1']['Rate']}}</span></div>
        </div>

        <ul class="navbar__menu basic-flex">
          @foreach($menus as $menu)
          <li class="menu__item"><a href="/category/{{ $menu->slug }}">{{ $menu->getTranslatedAttribute('name', \App::getLocale(), 'en') }}</a></li>
          @endforeach
        </ul>

      </nav>
      @if(isset($top_ad))
      <?php 
       $lang=\App::getLocale();
        if ($lang=='uz') {
          $image=Voyager::image($top_ad->image_uzb);
        }elseif ($lang=='en') {
          $image=Voyager::image($top_ad->image_rus);
        }else {
          $image=Voyager::image($top_ad->image_kirill);
        }
      ?>
      <div class="advertisement-box" style="background-image:url({{ $image }})">
      </div>
      @endif
    </div>
  </header>