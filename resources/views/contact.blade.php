@extends('layouts.site')

@section('content')

<section class="contact-details">
    <div class="container">
      <div class="contact-details__wrapper basic-flex">    
        <div class="form__wrapper">
          <h3 class="form__wrapper-title">@lang('messages.napishite')
          </h3>
           @if(Session::has('flash'))
            <div class="alert">
              <p>{{ Session::get('flash') }}</p>
            </div>
            @endif
            @if(Session::has('error_msg'))
            <div class="danger">
              <p>{{ Session::get('error_msg') }}</p>
            </div>
            @endif
          <form method="POST" action="/contact" enctype="multipart/form-data">
            @csrf
            <div class="form__top">
              <label><input type="text" name="name" required placeholder="@lang('messages.name')" value="{{ old('name') }}" ></label>
              <label><input type="email" name="email" placeholder="@lang('messages.email')" value="{{ old('email') }}"></label>
              <label><input type="text" required name="phone" placeholder="@lang('messages.phone')" value="{{ old('phone') }}"></label>
              <label><input type="text" name="theme" placeholder="@lang('messages.tema')" value="{{ old('theme') }}"></label>
              <textarea required class="contact-tetxarea" name="text" placeholder="@lang('messages.text')" >{{ old('text') }}</textarea>
            </div>
            <div class="form__bottom">
              <input type="file" name="file" id="file" class="inputfile">
              <label for="file" class="basic-flex">@lang('messages.upload')</label>
              <label class="basic-flex verification-code-wrapper">
                <input type="text" placeholder="Код" required name="input_kod">
                <input type="hidden" value="4k7Za"  name="kod">
                <span class="verification-code">4 k 7 Z a</span>
              </label>
              <button type="submit" class="btn send-btn">@lang('messages.send')</button>
            </div>
            
          </form>
        </div>
        <div class="business__card">
          <h3 class="card__title">NAMANGANLIKLAR24</h3>
          <div class="card__item basic-flex">
            <span card__item-title> @lang('messages.email') </span>
            <a class="email__link" href="mailto:info@namanganliklar24.uz">info@namanganliklar24.uz</a>
          </div>
          <div class="card__item basic-flex">
            <span card__item-title> @lang('messages.social') </span>
            <div class="card__social-items basic-flex">
              <a href="#" class="social__item"></a>
              <a href="#" class="social__item"></a>
              <a href="#" class="social__item"></a>
            </div>
          </div>
          <div class="card__item basic-flex">
            <span card__item-title> @lang('messages.channel')</span>
            <a class="card-join-telegram basic-flex" href="https://t.me/namanganliklar">@lang('messages.podpisatsa')</a>
          </div>
          <div class="card__item basic-flex">
            <span card__item-title> @lang('messages.mobil') </span>
            <div class="card__apps-wrapper basic-flex">
              <a href="#"><img src="img/googleplay-wh.png" alt="GooglePlay"></a>
              <a href="#"><img src="img/appstore-white.png" alt="AppStore"></a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
</section>

@endsection