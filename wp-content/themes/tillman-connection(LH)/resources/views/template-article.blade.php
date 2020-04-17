{{--
  Template Name: Article Page Template
--}}

@extends('layouts.app')

@section('content')
<!-- template-article.blade.php -->

@php
	$featured_image = get_field('banner_background_image');
@endphp

<section class="article-title hero is-large article-banner-container" style="background-image:url({{ $featured_image['url'] }})">
	<div class="hero-body">
		<h1 class="title is-size-1 is-size-3-touch">
			{{ the_field('page_title') }}
		</h1>
	</div>
</section>
<section class="hero hero-section">
	<div class="container hero-section-content is-size-2 is-size-4-touch">
		{{ the_field('content_area') }}
	</div>
</section>
@php do_action('get_contact-section') @endphp
@include('partials.contact-section')

@endsection