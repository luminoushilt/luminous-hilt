<article @php post_class() @endphp>
  @php
    $id = $post->ID;
    $post_img = get_field('banner_background_image', $id);
  @endphp
  <header>
    <h2 class="entry-title is-size-2 is-size-4-touch"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    <section class="fundraise-hero">
      <a href="{{ get_permalink() }}">
        <img src="{{ $post_img['url'] }}" alt="{{ $post_img['alt'] }}">
      </a>
    </section>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>