<?php get_header(); ?>
<div class="container">
  <div class="contents">
    <?php if(have_posts()): the_post(); ?>
      <article <?php post_class( 'kiji' ); ?>>
      <!--タイトル-->
      <h1><?php the_title(); ?></h1>
      <!--アイキャッチ取得-->
      <?php if( has_post_thumbnail() ): ?>
      <div class="kiji-img">
      <?php the_post_thumbnail( 'large' ); ?>
      </div>
      <?php endif; ?>
      <!--本文取得-->
      <?php the_content(); ?>
      </article>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
