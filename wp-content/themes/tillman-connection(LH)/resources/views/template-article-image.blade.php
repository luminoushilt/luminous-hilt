{{--
  Template Name: Article With Image Page Template
--}}

@extends('layouts.app')

@section('content')
<!-- template-article.blade.php -->

@php
	$featured_image = get_field('banner_background_image');
	$family_history_image_one 	= get_field('family_image_slot_one');
	$family_history_image_two 	= get_field('family_image_slot_two');
	$family_history_image_three = get_field('family_image_slot_three');
	$family_history_image_four 	= get_field('family_image_slot_four');
@endphp

<section class="article-title hero article-banner-container" style="background-image:url({{ $featured_image['url'] }})">
	<h1 class="title is-size-1 is-size-3-touch">
		{{ the_field('page_title') }}
	</h1>
</section>
<section class="hero hero-section">
	<div class="hero-body">
		<div class="container has-text-centered">
					<h2 class="title is-size-2 is-size-3-touch">
						{{ the_field('section_title') }}
					</h2>
					<span class="linage-subtitle is-size-5 is-size-6-touch">
						{{ the_field('section_sub_title') }}
					</span>
			<div class="columns is-multiline is-desktop is-vcentered is-vertical-mobile">
				<div class="column is-full">
					<img src="{{ $family_history_image_one['url'] }}" alt="{{ $family_history_image_one['alt']}}" />
				</div>
				<div class="column is-one-third-desktop">
					<img class="has-round-corners" src="{{ $family_history_image_two['url'] }}" alt="{{ $family_history_image_two['alt']}}" />
				</div>
				<div class="column is-one-third-desktop">
					<img class="has-round-corners" src="{{ $family_history_image_three['url'] }}" alt="{{ $family_history_image_three['alt']}}" />
				</div>
				<div class="column is-one-third-desktop">
					<img class="has-round-corners" src="{{ $family_history_image_four['url'] }}" alt="{{ $family_history_image_four['alt']}}" />
				</div>
			</div>
		</div>
	</div>
</section>
<section class="hero hero-section pad-t-100 pad-b-100">
	<div class="container hero-section-content-text is-size-2 is-size-4-touch">
		{{ the_field('content_area') }}
	</div>
</section>
@php do_action('get_contact-section') @endphp
@include('partials.contact-section')

@endsection