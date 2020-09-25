@extends('layouts.site')

@section('content')

<section class="article">
    <div class="container">
      <div class="news__wrapper basic-flex">
        <div class="article__wrapper">
            

            {!! $page->getTranslatedAttribute('body', \App::getLocale()) !!}
            
         
        </div>

      </div>
    </div>
  </section>

@endsection