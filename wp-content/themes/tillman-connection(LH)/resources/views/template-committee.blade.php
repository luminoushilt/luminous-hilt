{{--
  Template Name: Committee Template
--}}

@extends('layouts.app')

@section('content')
<!-- template-committee.blade.php -->

@php
	$featured_image = get_field('banner_background_image');
@endphp

<div class="about committee">
  <section class="article-title hero article-banner-container" style="background-image:url({{ $featured_image['url'] }})">
  	<h1 class="title is-size-1 is-size-3-touch">
  		{{ the_field('page_title') }}
  	</h1>
  </section>
  <section class="hero hero-section">
  	<div class="hero-section-content">
      <h2 class="title is-size-1 is-size-3-touch has-text-centered">Meet The Committee</h2>
      <div class="columns is-multiline card-wrapper">
        @php
          $args = array(
              'post_type' => 'committee-members',
              'post_status' => 'publish',
              'order' => 'ASC',
              'posts_per_page' => -1
          );
  
          $count = 0;
  
          $blog_loop = new WP_Query($args);
  
          if ($blog_loop->have_posts()) :
  
              while ($blog_loop->have_posts()) : $blog_loop->the_post();
  
          $id = $post->ID;
          $count = $blog_loop->post_count;
  
          $name = get_field('full_name');
          $committee_image = get_field('member_picture');
          $role = get_field('member_role');
          $city = get_field('member_city');
        @endphp
        <div class="column is-one-third-desktop card-box">
          <div class="card-info">
            <p>
              Name: {{ $name }}
            </p>
            @php
              if($role != '' || $role != null) {
                echo "<p>
                  Role: {$role}
                </p>";
              }
            @endphp
            <p>
              City: {{ $city }}
            </p>
          </div>
          <div class="card-img">
            <img src="{{ $committee_image['url'] }}" alt="{{ $committee_image['alt'] }}">
          </div>
        </div>
        @php
              $count++;
              endwhile;
              endif;
  
              wp_reset_postdata();
        @endphp
      </div>
  	</div>
  </section>
@php do_action('get_contact-section') @endphp
@include('partials.contact-section')
</div>

@endsection