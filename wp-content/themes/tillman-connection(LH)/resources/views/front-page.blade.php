{{--
  Page Name: Front Page
--}}

@extends('layouts.app')

@section('content')
<!-- front-page.blade.php -->

@php
	$featured_image = get_field('banner_image');
@endphp

<section class="hero hero-section-container is-flex is-large" style="background-image:url({{ $featured_image['url'] }})">
	<div class="hero-body"></div>
</section>
<section class="hero hero-section">
	<div class="hero-body">
		<div class="container">
			<div class="columns is-multiline">
				<div class="column is-half-desktop family-greeting">
					<h1 class="title is-size-2 is-size-4-touch">
						{{ the_field('page_intro') }}
					</h1>
					<span class="is-size-5-touch">{{ the_field('family_greeting') }}</span>
				</div>
				<div class="column is-half-desktop tillman-connection-logo-section">
					<h2 class="is-size-3-touch">Tillman Connection</h2>
					<i class="fas fa-wifi tillman-connection"></i>
					<span class="is-size-3-touch">21st Century</span>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="hero hero-section">
	<div class="container hero-section-content is-size-2 is-size-4-touch">
		{{ the_field('reunion_mission_statement') }}
	</div>
</section>
<section class="hero hero-section">
	<div class="section-break-image">
		<div class="container is-size-1 is-size-3-touch">
			{{ the_field('location_pitch') }}
		</div>
	</div>
</section>
<section class="hero hero-section">
	<div class="container hero-section-content is-size-2 is-size-4-touch">
		{{ the_field('concluding_statement') }}
	</div>
</section>
@php do_action('get_contact-section') @endphp
@include('partials.contact-section')

@endsection
