{{--
  Template Name: Banner With Staggered Grid Article Page Template
--}}

@extends('layouts.app')

@section('content')
<!-- template-article-staggered-grid.blade.php -->

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
	<div class="hero-body">
		<div class="container hero-section-content is-size-2 is-size-4-touch">
			{{ the_field('content_area') }}
		</div>
	</div>
</section>
<section class="hero hero-section">
	<div class="hero-body">
		<div class="columns is-multilined">
			@php

				$section_image_one = get_field('web_dev_image');
				$section_image_two = get_field('comp_repair_image');
				$section_image_three = get_field('bus_id_image');

			@endphp
			<div class="column is-one-third-desktop"><img src="{{ $section_image_one['url'] }}" alt="{{ $section_image_one['alt'] }}" /></div>
			<div class="column is-two-third-desktop">{{ the_field('web_dev_desc') }}</div>
			<div class="column is-two-third-desktop">{{ the_field('comp_repair_desc') }}</div>
			<div class="column is-one-third-desktop"><img src="{{ $section_image_two['url'] }}" alt="{{ $section_image_two['alt'] }}" /></div>
			<div class="column is-one-third-desktop"><img src="{{ $section_image_three['url'] }}" alt="{{ $section_image_three['alt'] }}" /></div>
			<div class="column is-two-third-desktop">{{ the_field('bus_id_desc') }}</div>
		</div>
	</div>
</section>
@php do_action('get_contact-section') @endphp
@include('partials.contact-section')

@endsection