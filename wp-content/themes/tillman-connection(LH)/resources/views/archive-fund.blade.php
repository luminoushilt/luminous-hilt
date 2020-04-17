{{--
  Archive Name: Fundraiser Archive Page
--}}

@extends('layouts.app')

@section('content')
<!-- archive-fund.blade.php -->	
	<section class="article-title hero article-banner-container" style="background-image:url(@asset('images/us-supreme-court-building.jpg'))">
		<h1 class="title is-size-1 is-size-3-touch">Fundraisers</h1>
	</section>
  <section class="hero hero-section">
		<div class="container hero-section-content is-size-2 is-size-4-touch custom-posts-container">
			@while (have_posts()) @php the_post() @endphp
				@include('partials.content-'.get_post_type())
			@endwhile
			
			{!! get_the_posts_navigation() !!}
			<div class="archive-read-more">
				<a href="{{ get_permalink() }}" class="button is-primary is-large">See Details</a>
			</div>
		</div>
	</section>
@php do_action('get_contact-section') @endphp
@include('partials.contact-section')

@endsection