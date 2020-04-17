@extends('layouts.app')

@section('content')
<!-- 404.blade.php -->
  <section class="article-title hero article-banner-container" style="background-image:url(@asset('images/downtown-washington.jpg'))">
    @include('partials.page-header')
  </section>
  <section class="hero hero-section">
    <div class="container hero-section-content is-size-2 is-size-4-touch">
      @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
          </div>
        {!! get_search_form(false) !!}
      @endif
    </div>
  </section>
@endsection
