<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '&mdash;' ); ?></title>    
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <?php echo '<link rel="alternate" type="' . feed_content_type('atom') . '" title="' . esc_attr(sprintf( $args['feedtitle'], get_bloginfo('name'), $args['separator'] )) . '" href="' . get_feed_link('atom') . "\">\n"; ?>
    <?php if ( is_singular() && get_option( 'thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="container">
      <header id="site-header">
        <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <p id="description"><?php bloginfo( 'description' ); ?></p>
        <?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
          <ul><?php wp_list_pages( 'title_li=&depth=-1' ); ?></ul>
        <?php endif; ?>
      </header><!-- header -->
      <div id="content" role="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_date('l, j F Y', '<h2 class="dateline">', '</h2>'); ?>
          <div <?php post_class(); ?>>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_content(); ?>
            <?php if ( !is_singular() && get_the_title() == '' ) : ?>
              <a href="<?php the_permalink(); ?>">(more...)</a>
            <?php endif; ?>
            <?php if ( is_singular() ) : ?>
              <div class="pagination"><?php wp_link_pages(); ?></div>
            <?php endif; ?>
            <div class="clear"> </div>
          </div><!-- post_class() -->
          <?php if ( is_singular() ) : ?>
            <div class="meta">
              <p>Posted by <?php the_author_posts_link(); ?>
              on <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a>
              in <?php the_category( ', ' ); ?><?php the_tags( ', ' ); ?></p>
            </div><!-- meta -->
            <?php comments_template(); ?>
          <?php endif; ?>
        <?php endwhile; else: ?>
          <div class="hentry"><h2>Sorry, the page you requested cannot be found</h2></div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'widgets' ) ) : ?>
          <div class="widgets"><?php dynamic_sidebar( 'widgets' ); ?></div>
        <?php endif; ?>
        <?php if ( is_singular() || is_404() ) : ?>
          <div class="left"><a href="<?php bloginfo( 'url' ); ?>">&laquo; Home page</a></div>
        <?php else : ?>
          <div class="left"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
          <div class="right"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
        <?php endif; ?>
        <div class="clear"> </div>
      </div><!-- content -->
      <footer id="site-footer">
      </footer>      
    </div><!-- container -->
    <?php wp_footer(); ?>
  </body>
</html>