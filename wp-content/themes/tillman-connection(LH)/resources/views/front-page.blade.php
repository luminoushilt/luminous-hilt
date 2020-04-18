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
<section class="hero hero-section is-large">
	<div class="hero-body">
		<div class="container">
			<div class="columns is-multiline">
				<div class="is-half-desktop path">
					<a class="button is-warning is-outlined" href="#" target="_self" title="">
						Web Development
					</a>
				</div>
				<div class="is-half-desktop path">
					<a class="button is-warning is-outlined" href="#" target="_self" title="">
						Web Hosting
					</a>
				</div>
				<div class="is-half-desktop path">
					<a class="button is-warning is-outlined" href="#" target="_self" title="">
						Computer Repair
					</a>
				</div>
				<div class="is-half-desktop path">
					<a class="button is-warning is-outlined" href="#" target="_self" title="">
						Graphic Design
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@php do_action('get_contact-section') @endphp
@include('partials.contact-section')

@endsection
