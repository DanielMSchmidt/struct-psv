<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage STTF
 * @since STTF 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * stylish_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if(get_option('GoogleFont')) : ?><link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?= get_option('GoogleFont'); ?>"><?php endif; ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
?>

<?php if(get_option('Favicon')) : ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_option('Favicon'); ?>" sizes="16x16" />
  <link rel="icon" type="image/x-icon" href="<?php echo get_option('Favicon'); ?>" sizes="16x16" />
<?php endif;
  /* Leave this always before the closing <head> */
	wp_head();
?>:

<?php if(get_option('UseSlider')) : ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/nivo-slider.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.nivo.slider.pack.js"></script>
<?php endif; ?>

<?php if(get_option('UseSlider')) : ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('.grouped_images').fancybox();

        jQuery('#slider').nivoSlider({
          pauseTime: <?php echo get_option('SliderDuration'); ?>,
          directionNav: <?php echo get_option('SliderDirection'); ?>,
          controlNav: <?php echo get_option('SliderControl'); ?>
        });
    });
  </script>
<?php endif; ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/pricing.js"></script>

</head>

<body <?php body_class(); ?> <?php if(get_option('ColorVariant') != '') { echo "id='" . get_option('ColorVariant') . "'"; } ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
  <?php if(get_option('ShareRSS') || get_option('ShareTwitter') || get_option('ShareFacebook') || get_option('ShareXing') || get_option('ShareYoutube')) : ?>
    <div id="metanav">
      <ul>
       <?php if(get_option('ShareRSS')) : ?><li class="rss"><a href="<?php echo home_url( '/' ); ?>feed/" title="<?php _e('RSS-Feed', 'stylish'); ?>"><?php _e('RSS-Feed', 'stylish'); ?></a></li><?php endif; ?>
       <?php if(get_option('ShareTwitter')) : ?><li class="twitter"><a href="http://www.twitter.com/<?php echo get_option('ShareTwitter') ?>" title="<? echo get_option('ShareTwitter') ?> <?php _e('on Twitter', 'stylish'); ?>">Twitter</a></li><?php endif; ?>
       <?php if(get_option('ShareFacebook')) : ?><li class="facebook"><a href="http://www.facebook.com/<?php echo get_option('ShareFacebook') ?>" title="<? echo get_option('ShareFacebook') ?> <?php _e('on Facebook', 'stylish'); ?>">Facebook</a></li><?php endif; ?>
       <?php if(get_option('ShareXing')) : ?><li class="xing"><a href="http://www.xing.com/profile/<?php echo get_option('ShareXing') ?>" title="<?php echo get_option('ShareXing') ?> <?php _e('on Facebook', 'stylish'); ?>">Xing</a></li><?php endif; ?>
       <?php if(get_option('ShareYoutube')) : ?><li class="youtube"><a href="http://www.youtube.com/<?php echo get_option('ShareYoutube') ?>" title="<?php echo get_option('ShareYoutube') ?> <?php _e('on Youtube', 'stylish'); ?>">Youtube</a></li><?php endif; ?>
      </ul>
    </div>
   <?php endif; ?>
		<div id="headerimg">
			<div id="branding" role="banner">
				<h1>
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</h1>
				<p id="site-description"><?php bloginfo( 'description' ); ?></p>
			<div id="access" role="navigation">
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'stylish' ); ?>"><?php _e( 'Skip to content', 'stylish' ); ?></a></div>
				<div id="nav">
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
					<div class="clearfix"> </div>
				</div><!-- #nav -->
			</div><!-- #access -->

       <?php
          if(!get_option('UseSlider')) :
            // Check if this is a post or page, if it has a thumbnail, and if it's a big one
            if ( is_singular() &&
                has_post_thumbnail( $post->ID ) &&
                ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
                $image[1] >= HEADER_IMAGE_WIDTH ) :
              // Houston, we have a new header image!
              echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
            else : ?>
            <div id="header-img">
              <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo( 'description' ); ?>" />
            </div>
          <?php endif;
            else : ?>
              <div id="slider">
                <?php echo st_slider(); ?>
              </div>
          <?php endif; ?>
	     </div>
		</div><!-- #headerimg -->
	</div><!-- #header -->

	<div id="main" class="clearfix">
