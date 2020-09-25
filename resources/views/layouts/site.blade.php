<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@lang('messages.title')</title>
  <link rel="stylesheet" href="/css/main.css">
 
  <link rel="stylesheet" href="/fonts/all.css">
  
</head>
<body>
  <div class="layer">
    <div class="modal-box basic-flex">
      <button type="button" class="btn hide-modal-btn">x</button>
      <h4>{{ __('messages.podpis') }}</h4>
      <div class="telegram-join basic-flex">
        <a href="https://t.me/namanganliklar">{{ __('messages.podpisatsa') }}</a>
      </div>
    </div>
  </div>
  <div class="menu-mask"></div>
  <main>
    @include('sections.header')

    @include('sections.covid')

    @yield('content')

  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer__top basic-flex">
        <a href="/" class="footer_logo"><img src="/img/logo-blue.png" alt="NAMANGANLIKLAR24"></a>
        <div class="join-telegram-wrapper basic-flex">
          <p> @lang('messages.podpis'):</p>
          <a href="https://t.me/namanganliklar" class="join-telegram">@lang('messages.podpisatsa')</a>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="about-site">
          <h4>@lang('messages.aboutUs')</h4>
          <p>@lang('messages.sub_aboutUs')</p>
        </div>

        <ul class="footer-menu">
          @foreach($footer_menus as $item)
          <li class="footer-menu__item"><a href="/page/{{ $item->translate(\App::getLocale())->slug }}" class="footer-menu__link">{{ $item->getTranslatedAttribute('name', \App::getLocale()) }}</a></li>
          @if($loop->iteration==1)
            <li class="footer-menu__item"><a href="/contact" class="footer-menu__link"> @lang('messages.napishite') </a></li>
          @endif
          @if($loop->iteration==3)
          </ul>
          <ul class="footer-menu">
          @endif
          @endforeach
        </ul>
      
        <ul class="footer-social-links">
          <h4>@lang('messages.kuzatibbor')</h4>
          <li><a href="https://t.me/namanganliklar"><i class="fab fa-telegram-plane"></i>@lang('messages.telegramkanal')</a></li>
          <li><a href="https://www.youtube.com/channel/UC3qE3XZY4VpzOEAWNxgYrzQ"><i class="fab fa-youtube"></i>@lang('messages.youtubekanalimiz')</a></li>
        </ul>
      </div>
    </div>
  </footer>


  <script src="/js/main.js"></script>
 
<script class="ms-informer-script" src="https://www.meteoservice.ru/informer/script/76b50af562057c096f2e9cdbf44f373b"></script>
</body>
</html>